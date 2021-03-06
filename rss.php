<?php
// $Id: rss.php,v 1.8 2005/06/09 11:46:21 RB Exp $
//  ------------------------------------------------------------------------ //
//                        WF-section for XOOPS                               //
//                 Copyright (c) 2005 WF-section Team                        //
//                  <http://www.wf-projects.com/>                            //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //
// Author: RB                                                                //
// URL: http://singchi.no-ip.com/hack                                        //
// Project: Magazine Project                                                 //
// ------------------------------------------------------------------------- //

include '../../mainfile.php';
include_once XOOPS_ROOT_PATH.'/include/functions.php';
include_once XOOPS_ROOT_PATH.'/class/template.php';
include_once XOOPS_ROOT_PATH.'/modules/magazine/class/common.php';
include_once XOOPS_ROOT_PATH.'/modules/magazine/class/article.php';
if (function_exists('mb_http_output')) {
	mb_http_output('pass');
}

$charset = empty($xoopsModuleConfig['rss_charset'])?_CHARSET:'UTF-8';
header ('Content-Type:text/xml; charset='.$charset);
$tpl = new XoopsTpl();
$tpl->xoops_setCaching(2);
$tpl->xoops_setCacheTime(3600);
if (!$tpl->is_cached('db:mag_rss.html')) {

    //$sarray = MagArticle::getAllArticle(10, 0, "online");
    $sarray = MagArticle::getAllArticle(5, 0, 'online', 0, 0, "published DESC");

	if (is_array($sarray)) {
		$encoding = empty($xoopsModuleConfig['rss_charset'])?_CHARSET:'UTF-8';
		$tpl->assign('channel_encoding', $encoding);
                if ($xoopsModuleConfig['rss_charset'] = 1){
                $tpl->assign('channel_title', xoops_utf8_encode(htmlspecialchars($xoopsConfig['sitename'], ENT_QUOTES)));
		$tpl->assign('channel_desc', xoops_utf8_encode(htmlspecialchars($xoopsConfig['slogan'], ENT_QUOTES)));
                $tpl->assign('channel_generator', xoops_utf8_encode(htmlspecialchars(XOOPS_VERSION)));
                } else {
                $tpl->assign('channel_title', htmlspecialchars($xoopsConfig['sitename']));
                $tpl->assign('channel_desc', htmlspecialchars($xoopsConfig['slogan']));
                $tpl->assign('channel_generator', XOOPS_VERSION);
                }
                $tpl->assign('channel_link', XOOPS_URL.'/');
                $tpl->assign('channel_lastbuild', formatTimestamp(time(), 'rss'));
		$tpl->assign('channel_webmaster', $xoopsConfig['adminmail']);
		$tpl->assign('channel_editor', $xoopsConfig['adminmail']);
		$tpl->assign('channel_category', 'Magazine');
		$tpl->assign('channel_language', _LANGCODE);
		$tpl->assign('image_url', XOOPS_URL.'/images/logo.gif');
		$dimention = getimagesize(XOOPS_ROOT_PATH.'/images/logo.gif');
		if (empty($dimention[0])) {
			$width = 88;
		} else {
			$width = ($dimention[0] > 144) ? 144 : $dimention[0];
		}
		if (empty($dimention[1])) {
			$height = 31;
		} else {
			$height = ($dimention[1] > 400) ? 400 : $dimention[1];
		}
		$tpl->assign('image_width', $width);
		$tpl->assign('image_height', $height);
		$count = $sarray;
		foreach ($sarray as $article) {
		        if ($xoopsModuleConfig['rss_charset'] = 1){
			$tpl->append('items', array('title' => xoops_utf8_encode(htmlspecialchars($article->title(), ENT_QUOTES)), 'link' => XOOPS_URL.'/modules/magazine/article.php?articleid='.$article->articleid(), 'guid' => XOOPS_URL.'/modules/magazine/article.php?articleid='.$article->articleid(), 'pubdate' => formatTimestamp($article->published(), 'rss'), 'description' => xoops_convert_encoding(htmlspecialchars($article->maintext(), ENT_QUOTES))));
                        } else {
                        $tpl->append('items', array('title' => htmlspecialchars($article->title()), 'link' => XOOPS_URL.'/modules/magazine/article.php?articleid='.$article->articleid(), 'guid' => XOOPS_URL.'/modules/magazine/article.php?articleid='.$article->articleid(), 'pubdate' => formatTimestamp($article->published(), 'rss'), 'description' => htmlspecialchars($article->maintext())));
                        } 
		}
	}
}
$tpl->display('db:mag_rss.html');
?>

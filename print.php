<?php
// $Id: intro.php,v 1.8 2005/06/09 11:44:49 RB Exp $
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

include 'header.php';
include_once MAG_ROOT_PATH . "/include/functions.php";
include_once MAG_ROOT_PATH . "/include/groupaccess.php";
include_once MAG_ROOT_PATH . "/class/article.php";

global $xoopsConfig, $xoopsDB, $xoopsModule, $xoopsModuleConfig;

$articleid = isset($_GET['articleid']) ? intval($_GET['articleid']) : 0;
$article = new MagArticle($articleid);

include_once XOOPS_ROOT_PATH.'/class/template.php';
$xoopsTpl = new XoopsTpl();

$xoopsTpl->assign(array('xoops_theme' => $xoopsConfig['theme_set'], 'xoops_imageurl' => XOOPS_URL.'/themes/'.$xoopsConfig['theme_set'].'/', 'xoops_themecss'=> xoops_getcss($xoopsConfig['theme_set']), 'xoops_requesturi' => htmlspecialchars($GLOBALS['xoopsRequestUri'], ENT_QUOTES), 'xoops_sitename' => $xoopsConfig['sitename'], 'xoops_slogan' => $xoopsConfig['slogan']));

$print = array();
if (!empty($article->htmlpage))
{
        $includepage = MAG_HTML_PATH . "/" . $article->htmlpage("S");
        $maintext = '';
        $maintext = include($includepage);
        $maintext = str_replace("[pagebreak]","",$maintext);
	//$maintext = preg_replace( "/\[title](.*)\[\/title\]/sU", "", $maintext );
	$maintext = str_replace( "[title]", "<br /><b>", $maintext );
        $maintext = str_replace( "[/title]", "</b><br /><br />", $maintext );
	$maintext = str_replace( "[ssl]", "", $maintext );
	$maintext = str_replace( "[/ssl]", "", $maintext );
} else {
        $maintext = $article->maintext("S");
        $maintext = str_replace("[pagebreak]","",$maintext);
        //$maintext = preg_replace( "/\[title](.*)\[\/title\]/sU", "", $maintext );
        $maintext = str_replace( "[title]", "<br /><b>", $maintext );
        $maintext = str_replace( "[/title]", "</b><br /><br />", $maintext );
        $maintext = str_replace( "[ssl]", "", $maintext );
	$maintext = str_replace( "[/ssl]", "", $maintext );
}

$print['title'] = $article->title();
$print['author'] = $article->uname();
$print['datetime'] = formatTimestamp( $article->published(), $xoopsModuleConfig['timestamp'] );
$print['maintext'] = $maintext;
$print['mark'] = _MAG_RB; 
$xoopsTpl->assign('print', $print);

$xoopsTpl->display('db:mag_print.html');
?>

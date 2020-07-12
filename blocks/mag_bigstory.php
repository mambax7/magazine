<?php
// $Id: mag_bigstory.php,v 1.8 2005/02/21 15:51:56 phppp Exp $
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
// Important change this to the directory path you have choosen.
include_once XOOPS_ROOT_PATH . "/modules/magazine/class/common.php";

include_once MAG_ROOT_PATH . '/include/groupaccess.php';

function b_mag_bigstory_show()
{
    global $xoopsDB, $xoopsUser, $magPathConfig;
    
    $modhandler = &xoops_gethandler('module');
    $xoopsModule = &$modhandler->getByDirname(MODDIR);
    $config_handler = &xoops_gethandler('config');
    $xoopsModuleConfig = &$config_handler->getConfigsByCat(0, $xoopsModule->getVar('mid'));
    
    $myts = &MyTextSanitizer::getInstance();
    $block = array();
    $tdate = time()-86400;
	
	$result = $xoopsDB->query("SELECT articleid, title, summary, groupid, articleimg 
		FROM " . $xoopsDB->prefix(MAG_ARTICLE_DB) . "
		WHERE published > ".$tdate." AND published < " . time() . " 
		AND (expired > " . time() . " OR expired = 0) 
		AND noshowart = 0 
		AND offline = 0 
		ORDER BY published DESC", 1, 0)
	;
    list($farticleid, $ftitle, $fsummary, $fgroupid, $farticleimg ) = $xoopsDB->fetchRow($result);
	
	$block['message'] = _MB_MAG_NOTYET;
        $block['message'] = _MB_MAG_TMRSI;
        $block['story_title'] = "<a href='" . MAG_ROOT_URL . "/article.php?articleid=" . $farticleid . "'>" . $myts->htmlSpecialChars($ftitle) . "</a>";
        $block['story_summary'] = $myts->htmlSpecialChars($fsummary);
        $block['lang_title'] = _MB_MAG_TITLE;
        $block['lang_summary'] = _MB_MAG_SUMMARY;
        
	if ($farticleimg && $farticleimg != "blank.png")
        $block['image'] = MAG_ARTICLEIMG_URL.'/'.$farticleimg;
     	$block["readmore"] = "<a href=\"" . MAG_ROOT_URL . "/article.php?articleid=" . $farticleid . "\">" . _MB_MAG_SPOTREADMORE . "</a>.";;
    return $block;
}

?>

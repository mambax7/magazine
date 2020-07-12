<?php
// $Id: mag_artmenu.php,v 1.5 2005/02/21 15:51:56 phppp Exp $
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
//Important change this to the directory path you have choosen.
include_once XOOPS_ROOT_PATH . "/modules/magazine/class/common.php";
//
include_once MAG_ROOT_PATH . '/include/groupaccess.php';

function b_mag_artmenu( $options )
{
    global $xoopsDB;

    $myts = &MyTextSanitizer::getInstance();

    $block = array();
    $sql = "SELECT articleid, title, groupid FROM " . $xoopsDB->prefix( MAG_ARTICLE_DB ) . " WHERE cmainmenu = 1";
    $result = $xoopsDB->query( $sql );
    while ( $myrow = $xoopsDB->fetchArray( $result ) )
    {
		if ( Mag_checkAccess( $myrow["groupid"] ) )
        {
            $magmenu2 = array();
            $magmenu2['nstitle'] = "<a class=\"menuMain\" href='".MAG_ROOT_URL."/article.php?articleid=".$myrow["articleid"]."'>".$myts->htmlSpecialChars( $myrow["title"] )."</a>";
            $block['nsmenu'][] = $magmenu2;
        } 
    } 
    return $block;
} 
?>

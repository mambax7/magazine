<?php
// $Id: mag_homecenter.php,v 1.4 2004/08/13 12:43:58 phppp Exp $
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
include_once MAG_ROOT_PATH . "/include/functions.php";

function b_MAG_homecenter_show( $options )
{

	global $xoopsDB;
    $myts = & MyTextSanitizer :: getInstance();
    $block = array();
    $sql = "SELECT articleid, title, groupid, articleimg, summary FROM " . $xoopsDB -> prefix( MAG_ARTICLE_DB ) . " WHERE published < " . time() . " AND published > 0 AND (expired = 0 OR expired > " . time() . ") AND noshowart = 0 AND offline = 0 ORDER BY " . $options[0] . " DESC";
    $result = $xoopsDB -> query( $sql, $options[1], 0 );
    while ( $myrow = $xoopsDB -> fetchArray( $result ) )
    {
		if ( Mag_checkAccess( $myrow["groupid"] ) )
        {
            $mag = array();
            $title = $myts -> makeTboxData4Show( $myrow["title"] );
            if ( !XOOPS_USE_MULTIBYTES )
            {
                if ( strlen( $myrow['title'] ) >= $options[2] )
                {
                    $title = $myts -> makeTboxData4Show( substr( $myrow['title'], 0, ( $options[2] -1 ) ) ) . "...";
                } 
            } 
            $mag['id'] = $myrow['articleid'];
            $mag['title'] = "<a href=\"" . XOOPS_URL . "/modules/magazine/article.php?articleid=" . $mag['id'] . "\">" . $title . "</a>";
            $mag['image'] = "thumbs/".$myrow['articleimg'];

            $summary = $myts -> makeTboxData4Show( $myrow["summary"] );
            if ( !XOOPS_USE_MULTIBYTES )
            {
                if ( strlen( $myrow['summary'] ) >= $options[3] )
                {
                    $summary = $myts -> makeTboxData4Show( substr( $myrow['summary'], 0, ( $options[3] -1 ) ) ) . "...";
                } 
            } 
            $mag["summary"] = $summary;
            $mag["more"] = "<a href=\"" . XOOPS_URL . "/modules/magazine/article.php?articleid=" . $mag['id'] . "\">" . _MB_MAG_MORE . "</a>";
            $block[] = $mag;
        } 
    } 
    return $block;
} 

function b_MAG_homecenter_edit( $options )
{
    $form = "" . _MB_MAG_ORDER . "&nbsp;<select name='options[]'>";

    $form .= "<option value='published'";
    if ( $options[0] == "published" )
    {
        $form .= " selected='selected'";
    } 
    $form .= ">" . _MB_MAG_DATE . "</option>\n";

    $form .= "<option value='counter'";
    if ( $options[0] == "counter" )
    {
        $form .= " selected='selected'";
    } 
    $form .= ">" . _MB_MAG_HITS . "</option>\n";

    $form .= "</select>\n";
    $form .= "&nbsp;" . _MB_MAG_DISP . "&nbsp;<input type='text' name='options[]' value='" . $options[1] . "' />&nbsp;" . _MB_MAG_ARTCLS . "";
    $form .= "&nbsp;<br>" . _MB_MAG_CHARS . "&nbsp;<input type='text' name='options[]' value='" . $options[2] . "' />&nbsp;" . _MB_MAG_LENGTH . "";
    $form .= "&nbsp;<br>" . _MB_MAG_CHARS2 . "&nbsp;<input type='text' name='options[]' value='" . $options[3] . "' />&nbsp;" . _MB_MAG_LENGTH . "";

    return $form;
} 

?>

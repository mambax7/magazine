<?php
// $Id: mag_newdown.php,v 1.4 2004/08/13 12:43:59 phppp Exp $
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
include_once XOOPS_ROOT_PATH . "/modules/magazine/class/common.php";

include_once MAG_ROOT_PATH . '/include/groupaccess.php';

function b_mag_down_show( $options )
{
    global $xoopsDB;
    $myts = &MyTextSanitizer::getInstance();
    $block = array();
    $sql = "SELECT * FROM " . $xoopsDB->prefix( MAG_FILES_DB ) . " WHERE submit > 0 ORDER BY " . $options[0] . " DESC";
    $result = $xoopsDB->query( $sql, $options[1], 0 );
    while ( $myrow = $xoopsDB->fetchArray( $result ) )
    {
        if ( Mag_checkAccess( $myrow["groupid"] ) )
        {
            $magd = array();
            $title = $myts->htmlSpecialChars( $myts->makeTboxData4Show( $myrow['fileshowname'] ) );
            $title = substr( $title, 0, ( $options[2] -1 ) ) . "...";

            $magd['titledown'] = "<a href='" . MAG_ROOT_URL . "/download.php?fileid=" . $myrow['fileid'] . "'>" . $title . "</a>";
            if ( $options[0] == "date" )
            {
                $magd['date'] = formatTimestamp( $myrow['date'], "s" );
            } elseif ( $options[0] == "counter" )
            {
                $magd['date'] = $myrow['date'];
            } 
            $block['download'][] = $magd;
        } 
    } 
    return $block;
} 

function b_mag_down_edit( $options )
{
    $form = "" . _MB_MAG_ORDER . "&nbsp;<select name='options[]'>";

    $form .= "<option value='date'";
    if ( $options[0] == "date" )
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

    $form .= "<option value='fileid'";
    if ( $options[0] == "fileid" )
    {
        $form .= " selected='selected'";
    } 
    $form .= ">" . _MB_MAG_ARTICLEID . "</option>\n";

    $form .= "</select>\n";
    $form .= "&nbsp;" . _MB_MAG_DISP . "&nbsp;<input type='text' name='options[]' value='" . $options[1] . "' />&nbsp;" . _MB_MAG_ARTCLS . "";
    $form .= "&nbsp;<br>" . _MB_MAG_CHARS . "&nbsp;<input type='text' name='options[]' value='" . $options[2] . "' />&nbsp;" . _MB_MAG_LENGTH . "";

    return $form;
} 

?>

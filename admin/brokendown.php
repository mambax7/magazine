<?php
// $Id: brokendown.php,v 1.6 2005/02/07 01:25:24 phppp Exp $
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
// Admin Main
include 'admin_header.php';
include_once XOOPS_ROOT_PATH . '/class/pagenav.php';

$op = "";

if ( isset( $_POST ) )
{
    foreach ( $_POST as $k => $v )
    {
        ${$k} = $v;
    } 
} 

if ( isset( $_GET ) )
{
    foreach ( $_GET as $k => $v )
    {
        ${$k} = $v;
    }
}

if ( isset( $_GET['op'] ) ) $op = $_GET['op'];
if ( isset( $_POST['op'] ) ) $op = $_POST['op'];

switch ($op)
{
    case "delbroken":
        global $xoopsDB, $_GET;

        $sql = "DELETE FROM " . $xoopsDB->prefix( MAG_BROKEN_DB ) . " WHERE lid = " . $_GET['fileid'] . "";
        $result = $xoopsDB->queryF( $sql );
        if ( !$result ) mag_error_report( $sql );

	$sql2 = "DELETE FROM " . $xoopsDB->prefix( MAG_FILES_DB ) . " WHERE fileid = " . $_GET['fileid'] . "";
        $result2 = $xoopsDB->queryF( $sql2 );
        if ( !$result2 ) mag_error_report( $sql2 );
        redirect_header("brokendown.php", 2, _AM_MAG_BROKENFILEDELETED);
        exit();
        break;

    case "ignorebroken":
        global $xoopsDB, $_GET;

        $sql = "DELETE FROM " . $xoopsDB->prefix( MAG_BROKEN_DB ) . " WHERE lid =" . $_GET['fileid'] . "";
        $result = $xoopsDB->queryF( $sql );
        if ( !$result ) mag_error_report( $sql );
        redirect_header("brokendown.php", 2, _AM_MAG_BROKENFILEIGNORED);
        exit();
        break;

    //case "listBrokenDownloads":
    //case "default":
    default:

        global $xoopsDB, $deleteimg, $editimg, $ignore;

        $sql = "SELECT * FROM " . $xoopsDB->prefix(MAG_BROKEN_DB) . " ORDER BY reportid";
        $totalbrokendownloads = $xoopsDB->getRowsNum($xoopsDB->query($sql));
        $result = $xoopsDB->query( $sql );
        if ( !$result ) mag_error_report( $sql );

 	xoops_cp_header();
        mag_admin_menu(_AM_MAG_BROKENDOWNLOADS);
        mag_textinfo(_AM_MAG_BROKENDOWNLOADSTEXT, _AM_MAG_BROKENTEXT);
        
        echo"<table width='100%' border='0' cellspacing='1' cellpadding = '2' class='outer'>";
        echo "<tr>";
        echo "<td class='bg3' width = '35%'><b>" . _AM_MAG_FILETITLE . "</b></td>";
        echo "<td class='bg3'><b>" . _AM_MAG_REPORTER . "</b></td>";
        echo "<td class='bg3' align='center'><b>" . _AM_MAG_ACTION . "</b></td>";
        echo "</tr>";

        if ($totalbrokendownloads == 0)
        {
            echo "<tr ><td align = 'center' class='head' colspan = '5'>" . _AM_MAG_NOBROKEN . "</td></tr>";
        }
        else
        {
            while(list($reportid, $lid, $sender, $ip) = $xoopsDB->fetchRow($result))
            {
                $result2 = $xoopsDB->query("SELECT fileshowname FROM " . $xoopsDB->prefix(MAG_FILES_DB) . " WHERE fileid=$lid");
                if ($sender != 0)
                {
                    $result3 = $xoopsDB->query("SELECT uname, email FROM " . $xoopsDB->prefix("users") . " WHERE uid=" . $sender . "");
                    list($sendername, $email) = $xoopsDB->fetchRow($result3);
                }
                list($fileshowname) = $xoopsDB->fetchRow($result2);

                $result4 = $xoopsDB->query("SELECT uname, email FROM " . $xoopsDB->prefix("users") . " WHERE uid=" . $sender . "");
                list($ownername, $owneremail) = $xoopsDB->fetchRow($result4);

                echo "<tr class = 'even'><td ><a href=filesshow.php?op=fileedit&fileid=$lid target='_blank'>" . $fileshowname . "</a></td>";
                if ($email == "")
                {
                    echo "<td >$sendername ($ip)";
                }
                else
                {
                    echo "<td ><a href=mailto:$email>$sendername</a> ($ip)";
                }
                echo "</td>";
                echo "<td align='center'>";
                echo "<a href='brokendown.php?op=ignorebroken&fileid=$lid'>$ignore </a>";
                echo "<a href='filesshow.php?op=fileedit&fileid=$lid'> $editimg </a>";
                echo "<a href='brokendown.php?op=delbroken&fileid=$lid'> $deleteimg</a>";
                echo "</td></tr>";
            }
        }
        echo"</table>";
        break;
}
xoops_cp_footer();

?>

<?php
// $Id: restore.php,v 1.7 2005/02/07 01:25:25 phppp Exp $
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
include_once( 'admin_header.php' );

//accessadmin( "restore" );
// global $xoopsDB, $xoopsUser, $myts;
$op = '';

if ( isset( $_POST['op'] ) )
    $op = $_POST['op'];
else if ( isset( $_GET['op'] ) && !isset( $_POST['op'] ) )
    $op = $_GET['op'];
else
    $op = '';

if ( !$xoopsModuleConfig['use_restore'] )
{
    redirect_header( "allarticles.php", 1, _AM_MAG_ARTRESTORENOTACT );
    exit();
} 

switch ( $op )
{
    case 'delete_restore':

        if ( isset( $_POST['ok'] ) )
        {
            if ( MagArticleRes::delete( $_POST['restoreid'] ) )
                redirect_header( "restore.php", 2, _AM_MAG_RESTOREDELETED );
            else
                redirect_header( "restore.php", 2, _AM_MAG_ERROR_RESTOREDELETED );
            exit();
        } 
        else
        {
            xoops_cp_header();
            $restoreid = $_GET['restoreid'];
            xoops_confirm( array( 'op' => 'delete_restore', 'restoreid' => $restoreid, 'ok' => 1 ), 'restore.php', _AM_MAG_DELETERESTORE );
        } 
        break;

    case 'restore':

        $sql = "SELECT * FROM " . $xoopsDB->prefix( MAG_RESTORE_DB ) . " WHERE restore_id = " . $_GET['restoreid'] . " ";
        $restore_arr = $xoopsDB->fetchArray( $xoopsDB->query( $sql ) );

        if ( $restore_arr['articleid'] )
            $this = new MagArticle( $restore_arr['articleid'] );
        else
            $this = new MagArticle();

        $this->categoryid = $restore_arr['categoryid'];
        $this->groupid = $restore_arr['groupid'];
        $this->title = $restore_arr['title'];
        $this->subtitle = $restore_arr['subtitle'];
        $this->maintext = $restore_arr['maintext'];
        $this->summary = $restore_arr['summary'];
        $this->url = $restore_arr['url'];
        $this->urlname = $restore_arr['urlname'];
        $this->wrapurl = $restore_arr['wrapurl'];
        $this->page = $restore_arr['page'];
        $this->usertype = $restore_arr['usertype'];
        $this->offline = $restore_arr['offline'];
        $this->htmlpage = $restore_arr['htmlpage'];
        $this->isframe = $restore_arr['isframe'];
        $this->expired = $restore_arr['expired'];
        $this->notifypub = $restore_arr['notifypub'];
        $this->weight = $restore_arr['weight'];
        $this->noshowart = $restore_arr['noshowart'];
        $this->weight = $restore_arr['weight'];
        $this->cmainmenu = $restore_arr['cmainmenu'];
        $this->isforumid = $restore_arr['isforumid'];
        $this->isformid = $restore_arr['isformid'];
        $this->isstoreid = $restore_arr['isstoreid'];
        $this->issignid = $restore_arr['issignid'];
        $this->subtitle = $restore_arr['subtitle'];
        $this->articleimg = $restore_arr['articleimg'];
        $this->uid = $restore_arr['uid'];
        $this->spotlight = $restore_arr['spotlight'];
        $this->spotlightmain = $restore_arr['spotlightmain'];
        $this->subtitle = $restore_arr['subtitle'];
        $this->version = $restore_arr['version'];
        $this->published = $restore_arr['published'];
        $this->changed = $restore_arr['changed'];
        $this->created = $restore_arr['created'];
        $this->expired = $restore_arr['expired'];
        $this->nohtml = $restore_arr['nohtml'];
        $this->nosmiley = $restore_arr['nosmiley'];
        $this->noxcodes = $restore_arr['noxcodes'];
        $this->nobreaks = $restore_arr['nobreaks'];
        $this->notifypub = $restore_arr['notifypub'];
        $this->allowcom = $restore_arr['allowcom'];
        $this->page = $restore_arr['page'];
        $this->counter = $restore_arr['counter'];
        $this->wrapurl = $restore_arr['wrapurl'];
        $this->template = $restore_arr['template'];
        $this->isblocks = $restore_arr['isblocks'];

        /*if ( get_magic_quotes_gpc() ) // 2005-05-18 RB ½Ä½X­×¥¿
        {
            $this->title = addSlashes( $this->title );
            $this->maintext = addSlashes( $this->maintext );
            $this->summary = addSlashes( $this->summary );
            $this->url = addSlashes( $this->url );
            $this->urlname = addSlashes( $this->urlname );
            $this->wrapurl = addSlashes( $this->wrapurl );
            $this->usertype = addSlashes( $this->usertype );
            $this->htmlpage = addSlashes( $this->htmlpage );
            $this->subtitle = addSlashes( $this->subtitle );
            $this->articleimg = addSlashes( $this->articleimg );
        }*/

        $this->store( $isRestore = true );
        redirect_header( "restore.php", 3, _AM_MAG_DBUPDATED );
        exit();
        break;

    case 'default':
    default:
        include_once XOOPS_ROOT_PATH . '/class/pagenav.php';

        xoops_cp_header();
        mag_admin_menu( _AM_MAG_ARTICLERESTOREHEADING );
        mag_textinfo( _AM_MAG_ARTICLERESTOREINFO, _AM_MAG_ARTICLERESTORETEXT );

        $start = isset( $_GET['start'] ) ? intval( $_GET['start'] ) : 0;

        $sql = "SELECT * FROM " . $xoopsDB->prefix( MAG_RESTORE_DB ) . "";
        if ( isset( $_GET['articleid'] ) )
        {
            $sql .= " WHERE articleid = " . $_GET['articleid'] . " ";
            $theArticle = new MagArticle( $_GET['articleid'] );
            $theArticle_version = $theArticle->version();
        } 
        $sql .= " ORDER BY restore_date DESC" ;

        $result = $xoopsDB->query( $sql, $xoopsModuleConfig['lastart'], $start );
        $result2 = $xoopsDB->query( $sql );
        $list = $xoopsDB->getRowsNum( $result2 );

        echo "<table width=\"100%\" cellpadding=\"2\" cellspacing=\"1\" class = \"outer\">\n";
        echo "<th align = \"center\" width=\"5%\">" . _AM_MAG_RESTORE_ID . "</th>";
        echo "<th align = \"center\" width=\"20%\">" . _AM_MAG_RESTORE_DATE . "</th>";
        echo "<th align = \"center\" width=\"5%\">" . _AM_MAG_RESTORE_ARTICLEID . "</th>";
        echo "<th align = \"left\">" . _AM_MAG_RESTORE_TITLE . "</th>";
        echo "<th align = \"left\" width=\"5%\">" . _AM_MAG_RESTORE_VERSION . "</th>";
        echo "<th align = \"center\" width=\"10%\">" . _AM_MAG_RESTORE_CREATED . "</th>";
        echo "<th align = \"center\" width=\"5%\">" . _AM_MAG_RESTORE_ACTION . "</th>";

        if ( $list )
        {
            while ( $restore_arr = $xoopsDB->fetchArray( $result ) )
            {
                if ( !isset( $theArticle_version ) )
                {
                    $theArticle = new MagArticle( $restore_arr['articleid'] );
                    $theArticle_version = $theArticle->version();
                    unset( $theArticle );
                } 
                /**
                 * Removed this option here. I found that if you change the category id and the version number was the same it 
                 * would not give a option for restore and delete points.
                 */
                // if($theArticle_version == $restore_arr["version"]) {
                // $restore_action = $blank;
                // $delete_action = $blank;
                // }else{
                $restore_action = "<a href='restore.php?op=restore&amp;restoreid=" . $restore_arr['restore_id'] . "'>$restore</a>";
                $delete_action = "<a href='restore.php?op=delete_restore&amp;restoreid=" . $restore_arr['restore_id'] . "'>$deleteimg</a>"; 
                // }
                unset( $theArticle_version );

                echo "<tr>";
                $view_restore = MagArticleRes::admintextLink( $restore_arr['restore_id'] );
                echo "<td class = \"head\" align = \"center\">" . $view_restore . "</td>";
                echo "<td class = \"even\" align = \"center\">" . formatTimestamp( $restore_arr['restore_date'], "Y-m-d H:s" ) . "</td>";
                echo "<td class = \"head\" align = \"center\"><a href='restore.php?articleid=" . $restore_arr['articleid'] . "'>" . $restore_arr['articleid'] . "</a></td>";
                echo "<td class = \"even\" align = \"left\">" . $restore_arr['title'] . "</td>";
                echo "<td class = \"even\" align = \"center\">v" . $restore_arr['version'] . "</td>";
                echo "<td  class = \"even\" align = \"center\" nowrap>" . formatTimestamp( $restore_arr['created'], "Y-m-d" ) . "</td>\n";
                echo "<td nowrap class = \"even\" align =\"center\">" . $restore_action . $delete_action . "</td>";
                echo "</tr>";
            } 
        } 
        else
        {
            echo "<tr>\n";
            echo "<td colspan =\"7\" class = \"head\" align = \"center\">" . _AM_MAG_NORESTORE_POINTS . "</td>\n";
            echo "</tr>\n";
        } 
        echo "</table><br />";
        $pagenav = new XoopsPageNav( $list, $xoopsModuleConfig['lastart'], $start, 'start', 'action=view_archives', 1 );
        echo "<div style=\"text-align: right;\">" . $pagenav->renderNav() . "</div>";
        xoops_cp_footer();
        break;
} 

?>

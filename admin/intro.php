<?php
// $Id: intro.php,v 1.6 2005/02/07 01:25:25 phppp Exp $
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
// Options setting
// Only for users who have admin right to system
include 'admin_header.php';

//accessadmin( "doclinks" );

include_once XOOPS_ROOT_PATH . '/include/xoopscodes.php';
include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
// global $xoopsDB, $_POST, $myts, $xoopsUser, $num;
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

global $xoopsDB, $_GET, $xoopsModuleConfig;

switch ( $op )
{
    case "saverelated";
        if ( isset( $_POST['intro_id'] ) )
        {
                $query = "UPDATE " . $xoopsDB->prefix( MAG_INTRO ) . "
				SET intro_topicid = " . $_POST['intro_topicid'] . ",
				        intro_mod = '" . $_POST['intro_mod'] . "',
					intro_no = '" . $_POST['intro_no'] . "',
					intro_title = '" . $_POST['intro_title'] . "', 
					intro_text = '" . $_POST['intro_text'] . "'

			 	WHERE intro_id =" . $_POST['intro_id'] . "";
        }
        else
        {
                $query = "INSERT INTO " . $xoopsDB->prefix( MAG_INTRO ) . " (intro_id, intro_topicid, intro_mod, intro_no, intro_title, intro_text) ";
                $query .= "VALUES ('', '" . $_POST['intro_topicid'] . "', '" . $_POST['intro_mod'] . "', '" . $_POST['intro_no'] . "', '" . $_POST['intro_title'] . "', '" . $_POST['intro_text'] . "')";
        }
        $result = $xoopsDB->queryF( $query );
        /* Show error if there is a problem */
        if ( !$result ) mag_error_report( $query );

        redirect_header( "intro.php", 1, _AM_MAG_RELATED_DBUPDATED );
        break;

    case "delete";

        if ( isset( $ok ) && $ok == 1 )
        {
            $sql = "DELETE FROM " . $xoopsDB->prefix( MAG_INTRO ) . " WHERE intro_id=" . $_POST['related'] . "";
            $result = $xoopsDB->query( $sql );
            /* Show error if there is a problem */
            if ( !$result ) mag_error_report( $sql );

            redirect_header( "intro.php", 1, _AM_MAG_RELATED_DELETED );
            exit();
        } 
        else
        {
            xoops_cp_header();
            xoops_confirm( array( 'op' => 'delete', 'related' => $_GET['related'], 'ok' => 1 ), 'intro.php', _AM_MAG_DELETERELEATEDLINK );
        } 
        break;

    case "addintro":

        xoops_cp_header();

        global $num;

        mag_admin_menu( _AM_MAG_INTRO );
        mag_textinfo( _AM_MAG_INTRO, _AM_MAG_INTROADMIN );

        $intro_no = '';
        $intro_title = '';
        $intro_text = '';

        $sform = new XoopsThemeForm( _AM_MAG_ADDINTRO, "op", xoops_getenv( 'PHP_SELF' ) );
        if ( isset( $_GET['related'] ) )
        {
            $sql = "SELECT * FROM " . $xoopsDB->prefix( MAG_INTRO ) . " WHERE intro_id=" . $_GET['related'] . "";
            $intro_arr = $xoopsDB->fetchArray( $xoopsDB->query( $sql ) );
            
            $intro_mod = $intro_arr['intro_mod'];
            $intro_no = $intro_arr['intro_no'];
            $intro_title = $intro_arr['intro_title'];
            $intro_text = $intro_arr['intro_text'];
            $sform->addElement( new XoopsFormHidden( 'intro_id', $_GET['related'] ) );
        } 
        $mod_select = ( $intro_arr['intro_mod'] == 1 ) ? 1 : 0;
        $select_radio = new XoopsFormRadioYN( _AM_MAG_INTRO_MOD, 'intro_mod', $mod_select, ' ' . _AM_MAG_INTRO_BOOK . '', ' ' . _AM_MAG_INTRO_LYRIC . '' );
        $sform->addElement( $select_radio );
        $sform->addElement( new XoopsFormText( _AM_MAG_INTRO_NO, 'intro_no', 4, 4, $intro_no ), true );
        $sform->addElement( new XoopsFormText( _AM_MAG_INTRO_TITLE, 'intro_title', 50, 255, $intro_title ), true );
        $sform->addElement( new XoopsFormDhtmlTextArea( _AM_MAG_INTRO_TEXT, 'intro_text', $intro_text, 7, 60 ), false );

        $articleid = ( isset( $_GET['articleid'] ) ) ? $_GET['articleid'] : $intro_arr['intro_topicid'];
        $sform->addElement( new XoopsFormHidden( 'intro_topicid', $articleid ) );

        $button_tray = new XoopsFormElementTray( '', '' );
        $hidden = new XoopsFormHidden( 'op', 'saverelated' );
        $button_tray->addElement( $hidden );
        $button_tray->setExtra( "onclick='this.form.elements.op.value=\"saverelated\"'" );
        $button_tray->addElement( new XoopsFormButton( '', 'saverelated', _AM_MAG_EDIT, 'submit' ) );

        $butt_canc = new XoopsFormButton( '', '', _CANCEL, 'submit' );
        $butt_canc->setExtra( 'onclick="this.form.elements.op.value=\'default\'"' );
        $button_tray->addElement( $butt_canc );
        $sform->addElement( $button_tray );
        $sform->display();

        if ( isset( $_GET['articleid'] ) )
        {
            echo "<h4>" . _AM_MAG_INTROLIST . "</h4>";
            echo "<table border='0' cellpadding='2' cellspacing='1' width = '100%' class = 'outer'>";
            echo "<tr align='left'>";
            echo "<td align='center' class='bg3' width = '10%'><b>" . _AM_MAG_ARTID . "</b></td>";
            echo "<td align='left' width = '20%'class='bg3'><b>" . _AM_MAG_INTRO_TITLE . "</b></td>";
            echo "<td align='left' width = '50%'class='bg3'><b>" . _AM_MAG_INTRO_TEXT . "</b></td>";
            echo "<td align='center' width = '20%' class='bg3'><b>" . _AM_MAG_ACTION . "</td>";
            echo "</tr>";

            $sql = "SELECT * FROM " . $xoopsDB->prefix( MAG_INTRO ) . "  WHERE intro_topicid = " . $_GET['articleid'] . " ORDER BY intro_id ";
            $result = $xoopsDB->query( $sql );
            $count = $xoopsDB->getRowsNum( $result );

            if ( $count > 0 )
            {
                while ( $arr = $xoopsDB->fetchArray( $result ) )
                {
                    $edit = "<a href='intro.php?op=addintro&related=" . $arr['intro_id'] . "'>$editimg</a>";
                    $delete = "<a href='intro.php?op=delete&related=" . $arr['intro_id'] . "'>$deleteimg</a>";
                    $text = xoops_substr( $arr['intro_text'], 0, 50  );

                    echo "<tr>";
                    echo "<td class='head' align = 'center' width= '3%'>" . $arr['intro_id'] . "</td>";
                    echo "<td class='even' nowrap='nowrap'><a href='javascript:;' onclick='openWithSelfMain(\"".MAG_ROOT_URL."/intro.php?id=" . $arr['intro_id'] . "\",\"intro\",400,430)'>" . $arr['intro_title'] . "</a></td>";
                    echo "<td class='even' align = 'left' nowrap='nowrap'>" . $text . "</td>";
                    echo "<td class='even' align = 'center' nowrap='nowrap'>$edit $delete</td>";
                    echo "</tr>";
                } 
            } 
            else
            {
                echo "<tr>";
                echo "<td class='head' align = 'center' colspan=4>" . _AM_MAG_NOURLFOUND . "</td>";
                echo "</tr>";
            } 
            echo "</table> ";
        } 
        break;

    default:

        $start = isset( $_GET['start'] ) ? intval( $_GET['start'] ) : 0;
        $articlearray = MagArticle::getAllArticle( $xoopsModuleConfig['lastart'], $start, 'online' );
        $totalcount = count( MagArticle::getAllArticle( 0, 0, 'online' ) );

        xoops_cp_header();
        mag_admin_menu( _AM_MAG_INTRO );
        mag_textinfo( _AM_MAG_INTROLIST, _AM_MAG_INTROADMIN );
        if ( $totalcount > 0 )
        {
            echo "<table width='100%' cellspacing=1 cellpadding=3 border=0 class = outer>";
            echo "<tr>";
            echo "<td class='bg3' align='center'><b>" . _AM_MAG_ARTID . "</b></td>";
            echo "<td class='bg3' align='left'><b>" . _AM_MAG_TITLE . "</b></td>";
            echo "<td class='bg3' align='center'><b>" . _AM_MAG_ACTION . "</b></td>";
            echo "</tr>";
            $x = 0;
            foreach ( $articlearray as $article )
            {
                if ( empty( $article->url ) )
                {
                    $addrelated = "<a href='intro.php?op=addintro&articleid=" . $article->articleid() . "'>" . $addart . "</a>";
                    echo "<tr>";
                    echo "<td class='head' align='center' width= '5%'>" . $article->articleid() . "</td>";
                    echo "<td class='even' align='left'>" . $article->textLink( "S" ) . "</td>";
                    echo "<td class='even' align='center' width= '20%'> $addrelated </td>";
                    echo "</tr>";
                    $x++;
                } 
            } 
            echo "</table><br />\n";

            $pagenav = new XoopsPageNav( $totalcount, $xoopsModuleConfig['lastart'], $start, 'start', 'lastarts=' . $xoopsOption, 1 );
            echo "<div style='text-align: right;' >" . $pagenav->renderNav() . "</div>";

            echo "<h4>" . _AM_MAG_INTROLIST . "</h4>";
            echo "<table border='0' cellpadding='2' cellspacing='1' width = '100%' class = 'outer'>";
            echo "<tr align='left'>";
            echo "<td align='center' class='bg3' width = '10%'><b>" . _AM_MAG_ARTID . "</b></td>";
            echo "<td align='left' width = '10%'class='bg3'><b>" . _AM_MAG_INTRO_MOD . "</b></td>";
            echo "<td align='left' width = '10%'class='bg3'><b>" . _AM_MAG_INTRO_NO . "</b></td>";
            echo "<td align='left' width = '50%'class='bg3'><b>" . _AM_MAG_INTRO_TITLE . "</b></td>";
            echo "<td align='center' width = '20%' class='bg3'><b>" . _AM_MAG_ACTION . "</td>";
            echo "</tr>";

            $sql = "SELECT * FROM " . $xoopsDB->prefix( MAG_INTRO ) . "  ORDER BY intro_id ";
            $result = $xoopsDB->query( $sql );
	    $count = $xoopsDB->getRowsNum( $result );

            /**
             * Show error if there is a problem
             */
            if ( !$result ) mag_error_report( $sql );

            if ( $count > 0 )
            {
                while ( $arr = $xoopsDB->fetchArray( $result ) )
                {
                    $edit = "<a href='intro.php?op=addintro&related=" . $arr['intro_id'] . "'>$editimg</a>";
                    $delete = "<a href='intro.php?op=delete&related=" . $arr['intro_id'] . "'>$deleteimg</a>";
                    if ( $arr['intro_mod'] == 0 )
                    {
                         $type = _AM_MAG_INTRO_LYRIC;
                    } else {
                         $type = _AM_MAG_INTRO_BOOK;
                    }
                    echo "<tr>";
                    echo "<td class='head' align = 'center' width= '3%'>" . $arr['intro_id'] . "</td>";
                    echo "<td class='even' nowrap='nowrap'>" . $type . "</td>";
                    echo "<td class='even' nowrap='nowrap'>" . $arr['intro_no'] . "</td>";
                    echo "<td class='even' align = 'left' nowrap='nowrap'><a href='javascript:;' onclick='openWithSelfMain(\"".MAG_ROOT_URL."/intro.php?id=" . $arr['intro_id'] . "\",\"intro\",400,430)'>" . $arr['intro_title'] . "</a></td>";
                    echo "<td class='even' align = 'center' nowrap='nowrap'>$edit $delete</td>";
                    echo "</tr>";
                } 
            } 
            else
            {
                echo "<tr>";
                echo "<td class='head' align = 'center' colspan=4>" . _AM_MAG_NOURLFOUND . "</td>";
                echo "</tr>";
            } 
            echo "</table> ";
        } 
        break;
} 
xoops_cp_footer();

?>

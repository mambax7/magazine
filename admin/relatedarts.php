<?php
// $Id: relatedarts.php,v 1.6 2005/02/07 01:25:25 phppp Exp $
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
include_once XOOPS_ROOT_PATH . '/include/xoopscodes.php';

//accessadmin( "doclinks" );

//global $xoopsDB, $myts, $xoopsUser, $num;
global $relatedtop, $xoopsDB, $myts, $xoopsUser, $_GET, $xoopsModuleConfig, $num;

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

//global $relatedtop, $xoopsDB, $_GET, $xoopsModuleConfig, $num;

switch ( $op )
{
    case "saverelated";

        for ( $i = 0; $i < count( $relatedtop['topic'] ); )
        {
            if ( isset( $relatedtop['related'][$i] ) )
            {
                $result = $xoopsDB->query( "SELECT * FROM " . $xoopsDB->prefix( MAG_RELATED ) . " WHERE related_id =" . $relatedtop['relatedid'][$i] . " " );
                if ( !$xoopsDB->getRowsNum( $result ) )
                {
                    $xoopsDB->query( "INSERT INTO " . $xoopsDB->prefix( MAG_RELATED ) . " (related_id, related_idtopic, related_topicid, related_catid, related_idcheck, related_weight ) VALUES ('', " . $relatedtop['topicID'][$i] . ", " . $relatedtop['topic'][$i] . ", " . $relatedtop['catid'][$i] . ", '1', " . $relatedtop['weight'][$i] . ")" );
                } 
                else
                {
                    $xoopsDB->queryF( "UPDATE " . $xoopsDB->prefix( MAG_RELATED ) . " set related_topicid = " . $relatedtop['topic'][$i] . ", related_weight = " . $relatedtop['weight'][$i] . ", related_catid = " . $relatedtop['catid'][$i] . " WHERE related_id=" . $relatedtop['relatedid'][$i] . "" );
                } 
            } 
            else
            {
                $xoopsDB->query( "DELETE FROM " . $xoopsDB->prefix( MAG_RELATED ) . " WHERE related_idtopic =" . $relatedtop['topicID'][$i] . " AND related_topicid = " . $relatedtop['topic'][$i] . "" );
            } 
            $i++;
        } 
        redirect_header( "relatedarts.php", 1, _AM_MAG_DBUPDATED );
        break;

    case "saverelated_news";

        for ( $i = 0; $i < count( $relatedtop['topic'] ); )
        {
            if ( isset( $relatedtop['related'][$i] ) )
            {
                $result = $xoopsDB->query( "SELECT * FROM " . $xoopsDB->prefix( MAG_RELATEDNEWS ) . " WHERE relatednews_id =" . $relatedtop['relatedid'][$i] . " " );
                if ( !$xoopsDB->getRowsNum( $result ) )
                {
                    $xoopsDB->query( "INSERT INTO " . $xoopsDB->prefix( MAG_RELATEDNEWS ) . " (relatednews_id, relatednews_idtopic, relatednews_topicid, relatednews_catid, relatednews_idcheck, relatednews_weight ) VALUES ('', " . $relatedtop['topicID'][$i] . ", " . $relatedtop['topic'][$i] . ", " . $relatedtop['catid'][$i] . ", '1', " . $relatedtop['weight'][$i] . ")" );
                } 
                else
                {
                    $xoopsDB->queryF( "UPDATE " . $xoopsDB->prefix( MAG_RELATEDNEWS ) . " set relatednews_topicid = " . $relatedtop['topic'][$i] . ", relatednews_weight = " . $relatedtop['weight'][$i] . ", relatednews_catid = " . $relatedtop['catid'][$i] . " WHERE relatednews_id=" . $relatedtop['relatedid'][$i] . "" );
                } 
            } 
            else
            {
                $xoopsDB->query( "DELETE FROM " . $xoopsDB->prefix( MAG_RELATEDNEWS ) . " WHERE relatednews_idtopic =" . $relatedtop['topicID'][$i] . " AND relatednews_topicid = " . $relatedtop['topic'][$i] . "" );
            } 
            $i++;
        } 
        redirect_header( "relatedarts.php", 1, _AM_MAG_DBUPDATED );
        break;

    case "addrelated":

        global $num;

        xoops_cp_header();
        mag_admin_menu( _AM_MAG_RELATEDART );
        mag_textinfo( _AM_MAG_RELATEDDOCUMENTLIST, _AM_MAG_RELATEDNEWSLISTTXT );

        echo "<form name='saverelated' METHOD='post'>";
        echo "<table border='0' cellpadding='2' cellspacing='1' width = '100%' class = 'outer'>";
        echo "<tr align='left'>";
        echo "<td align='center' class='bg3' width = '3%'><b>" . _AM_MAG_ARTID . "</b></td>";
        echo "<td align='left' width = '30%'class='bg3'><b>" . _AM_MAG_TITLE . "</b></td>";
        echo "<td align='center' width = '17%' class='bg3'><b>" . _AM_MAG_RELATEDART_WEIGHT . "</b></td>";
        echo "<td align='center' width = '17%' class='bg3'><b>" . _AM_MAG_RELATEDITEM . "</b></td>";
        echo "</tr>";

        $articlearray = MagArticle::getAllArticle( 0, 0, 'published' );
        $totalcount = count( MagArticle::getAllArticle( 0, 0, 'published' ) );

        $a = 0;
        foreach ( $articlearray as $article )
        {
            if ( $article->articleid == $_GET['articleid'] )
            {
                continue;
            } 

            $result2 = $xoopsDB->query( "SELECT related_id, related_idcheck, related_weight FROM " . $xoopsDB->prefix( MAG_RELATED ) . " WHERE related_topicid = " . $article->articleid() . " AND related_idtopic = " . $_GET['articleid'] . "" );
            list( $related_id, $related_idcheck, $related_weight ) = $xoopsDB->fetchrow( $result2 );

            echo "<tr>";
            echo "<td class='head' align = 'center' width= '3%'>" . $article->articleid() . "</td>";
            echo "<td class='even' nowrap='nowrap'>" . $article->textLink( "S" ) . "</td>";
            echo "<input type='hidden' name='relatedtop[relatedid][$a]' value='" . $related_id . "' />";
            echo "<input type='hidden' name='relatedtop[topic][$a]' value='" . $article->articleid() . "' />";
            echo "<input type='hidden' name='relatedtop[catid][$a]' value='" . $article->categoryid() . "' />";
            echo "<input type='hidden' name='relatedtop[topicID][$a]' value='" . $_GET['articleid'] . "' />";

            if ( !isset ( $related_weight ) ) $related_weight = 0;
            echo "<td class='even' align = 'center' width= '3%'><input type='text' name='relatedtop[weight][$a]' value='$related_weight' size='3' /></td>";
            echo "<td align='center' class='even'>";
            echo "<input type='checkbox' name='relatedtop[related][$a]' value='1'";
            if ( $related_idcheck == 1 ) echo " checked='checked'";
            echo " />";
            echo "</td>";
            echo "</tr>";
            $a++;
        } 
        echo "
			<tr>
			<td class='head' align='right' colspan='3'>" . _AM_MAG_SHOWALL . "</td>
			<td class='even' align='center' colspan='1'><input name='allbox' id='allbox' onclick='xoopsCheckAll(\"saverelated\", \"allbox\");' type='checkbox' value='Check All' /></td>
			</tr>";
        echo "
			<tr><td class='even' align='center' colspan='4'>
			<input type='hidden' name='num' value=" . $num . " />
			<input type='hidden' name='op' value=saverelated />
			<input type='submit' name='submit' value='" . _SUBMIT . "' />
			</td></tr>";
        echo "</table>";
        echo "</form>";
        break;

    case "addrelatednews":

        global $num;

        xoops_cp_header();

        mag_admin_menu( _AM_MAG_RELATEDART );
        mag_textinfo( _AM_MAG_RELATEDNEWSLIST, _AM_MAG_RELATEDNEWSLISTTXT );

        echo "<form name='saverelated_news' METHOD='post'>";
        echo "<table border='0' cellpadding='2' cellspacing='1' width = '100%' class = 'outer'>";
        echo "<tr align='left'>";
        echo "<td align='center' class='bg3' width = '3%'><b>" . _AM_MAG_ARTID . "</b></td>";
        echo "<td align='left' width = '30%'class='bg3'><b>" . _AM_MAG_TITLE . "</b></td>";
        echo "<td align='center' width = '17%' class='bg3'><b>" . _AM_MAG_RELATEDART_WEIGHT . "</b></td>";
        echo "<td align='center' width = '17%' class='bg3'><b>" . _AM_MAG_RELATEDITEM . "</b></td>";
        echo "</tr>";

        $result = $xoopsDB->query( "SELECT storyid, topicid, title FROM " . $xoopsDB->prefix( "stories" ) . " ORDER BY storyid" );
        $a = 0;

		while ( list( $topicID, $catID, $question ) = $xoopsDB->fetchrow( $result ) )
        {
            $result2 = $xoopsDB->query( "SELECT relatednews_id, relatednews_idcheck, relatednews_weight FROM " . $xoopsDB->prefix( MAG_RELATEDNEWS ) . " WHERE relatednews_topicid = " . $topicID . " AND relatednews_idtopic = " . $_GET['articleid'] . "" );
            list( $related_id, $related_idcheck, $related_weight ) = $xoopsDB->fetchrow( $result2 );

            echo "<tr>";
            echo "<td class='head' align = 'center' width= '3%'>" . $topicID . "</td>";
            echo "<td class='even' nowrap='nowrap'>" . $question . "</td>";
            echo "<input type='hidden' name='relatedtop[relatedid][$a]' value='" . $related_id . "' />";
            echo "<input type='hidden' name='relatedtop[topic][$a]' value='" . $topicID . "' />";
            echo "<input type='hidden' name='relatedtop[catid][$a]' value='" . $catID . "' />";
            echo "<input type='hidden' name='relatedtop[topicID][$a]' value='" . $_GET['articleid'] . "' />";

            if ( !isset ( $related_weight ) ) $related_weight = 0;
            echo "<td class='even' align = 'center' width= '3%'><input type='text' name='relatedtop[weight][$a]' value='$related_weight' size='3' /></td>";
            echo "<td align='center' class='even'>";
            echo "<input type='checkbox' name='relatedtop[related][$a]' value='1'";
            if ( $related_idcheck == 1 ) echo " checked='checked'";
            echo " />";
            echo "</td>";
            echo "</tr>";
            $a++;
        } 
        echo "
		<tr>
		<td class='head' align='right' colspan='3'>" . _AM_MAG_SHOWALL . "</td>
		<td class='even' align='center' colspan='1'><input name='allbox_news' id='allbox_news' onclick='xoopsCheckAll(\"saverelated_news\", \"allbox_news\");' type='checkbox' value='Check All' /></td>
		</tr>";
        echo "
		<tr><td class='even' align='center' colspan='4'>
		<input type='hidden' name='num' value=" . $num . " />
		<input type='hidden' name='op' value=saverelated_news />
		<input type='submit' name='submit' value='" . _SUBMIT . "' />
		</td></tr>";
        echo "</table>";
        echo "</form>";
        break;

    default:

        $start = isset( $_GET['start'] ) ? intval( $_GET['start'] ) : 0;
        $articlearray = MagArticle::getAllArticle( $xoopsModuleConfig['lastart'], $start, 'online' );
        $totalcount = count( MagArticle::getAllArticle( 0, 0, 'online' ) );

        xoops_cp_header();
        mag_admin_menu( _AM_MAG_RELATEDART );
        mag_textinfo( _AM_MAG_RELATEDARTADMIN, _AM_MAG_RELATEDARTADMINTXT );

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
                    $addrelated = "<a href='relatedarts.php?op=addrelated&articleid=" . $article->articleid() . "'>" . _AM_MAG_RELATED_DOC . "</a>";
                    $addrelatednews = "<a href='relatedarts.php?op=addrelatednews&articleid=" . $article->articleid() . "'>" . _AM_MAG_RELATED_NEWS . "</a>";

                    echo "<tr>";
                    echo "<td class='head' align='center' width= '5%'>" . $article->articleid() . "</td>";
                    echo "<td class='even' align='left'>" . $article->textLink( "S" ) . "</td>";
                    echo "<td class='even' align='center' width= '20%'> $addrelated | $addrelatednews</td>";
                    echo "</tr>";
                    $x++;
                } 
            } 
            echo "</table>\n"; 
            // Calculates how many pages exist.  Which page one should be on, etc...
            include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
            $pagenav = new XoopsPageNav( $totalcount, $xoopsModuleConfig['lastart'], $start, 'start', 'lastarts=' . $xoopsOption, 1 );
            echo "<div style='text-align: right;' >" . $pagenav->renderNav() . "</div><br />";
        } else {
			echo "<h4>"._AM_MAG_NO_DOCS_CREATEDYET."</h4>";
		}
        break;
} 
xoops_cp_footer();

?>

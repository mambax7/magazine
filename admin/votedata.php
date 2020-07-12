<?php
// $Id: votedata.php,v 1.7 2005/02/07 01:25:25 phppp Exp $
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
include 'admin_header.php';
include_once MAG_ROOT_PATH . "/class/category.php";
include_once MAG_ROOT_PATH . "/class/article.php";

//accessadmin( "moderator" );

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

switch ( $op )
{
    case "delVote":
        global $xoopsDB, $_GET; 
        // $rid = intval($_GET['rid']);
        // $lid = intval($_GET['lid']);
        $sql = $xoopsDB->queryF( "DELETE FROM " . $xoopsDB->prefix( MAG_VOTES ) . " WHERE ratingid = " . intval( $_GET['rid'] ) );
        $xoopsDB->query( $sql );
        mag_updaterating( intval( $_GET['lid'] ) );
        redirect_header( "votedata.php", 1, _AM_MAG_VOTEDELETED );
        break;

    case 'main':
    default:

        global $xoopsDB;

        $useravgrating = 0;
        $uservotes = 0;
        $useravgrating = 0;


        $sql = "SELECT * FROM " . $xoopsDB->prefix( MAG_VOTES ) . " ORDER BY ratingtimestamp DESC";
        $results = $xoopsDB->query( $sql );
        $vote_array = $xoopsDB -> query($sql, 20, $start);
        $vote_num = $xoopsDB -> getRowsNum($xoopsDB -> query($sql));

        $uservotes = $xoopsDB->getRowsNum( $results );

        while ( $arr = $xoopsDB->fetchArray( $results ) )
        {
            $useravgrating = $useravgrating + $arr['rating'];
        } 

        if ( $useravgrating > 0 )
        {
            $useravgrating = $useravgrating / $uservotes;
            $useravgrating = number_format( $useravgrating, 2 );
        } 

        xoops_cp_header();

        mag_admin_menu( _AM_MAG_ARTICLEMANAGEMENT );
        $text_info = "<div>" . _AM_MAG_VOTEDATATEXT . "</div><br />";
        $text_info .= "<div><b>" . _AM_MAG_USERAVG . ": </b>$useravgrating</div>";
        $text_info .= "<div><b>" . _AM_MAG_TOTALRATE . ": </b>$uservotes</div>";
        mag_textinfo( _AM_MAG_VOTEDATA, $text_info );

        echo "<table width=100% cellspacing = 1 cellpadding = 2 class = outer>";
        echo "<tr>";
        echo "<th align = 'center'>" . _AM_MAG_RATINGID . "</th>";
        echo "<th align = 'left'>" . _AM_MAG_ARTICLE . "</th>";
        echo "<th align = 'center'>" . _AM_MAG_USER . "</th>";
        echo "<th align = 'center'>" . _AM_MAG_IP . "</th>";
        echo "<th align = 'center'>" . _AM_MAG_RATING . "</th>";
        echo "<th align = 'center'>" . _AM_MAG_DATE . "</th>";
        echo "<th align = 'center'>" . _AM_MAG_ACTION . "</th></tr>";

        if ( $uservotes == false )
        {
            echo "<tr><td align='center' colspan='7'  class = 'head'>" . _AM_MAG_NOREGVOTES . "</td></tr>";
        } 
        else
        {
            while ( $arr = $xoopsDB -> fetchArray($vote_array) )
            {
                $article = new MagArticle( $arr['lid'] );
                if ( $article )
                {

                    $formatted_date = formatTimestamp( $arr['ratingtimestamp'], $xoopsModuleConfig['timestamp'] );
                    $articletitle = $article->admintextLink();
                    // RB 2005-05-25
                    // $article->uid change to $arr['ratinguser'] 
                    $ratinguname = mag_getLinkedUnameFromId( $arr['ratinguser'], $xoopsModuleConfig['displayname'], 1 ); //$article->uid
                    echo "<tr>";
                    echo "<td class = 'head' align = 'center' >" . $arr['ratingid'] . "</td>";
                    echo "<td class = 'even' align = 'left'>" . $articletitle . "</td>";
                    echo "<td class = 'even' align = 'center' >" . $ratinguname . "</td>";
                    echo "<td class = 'even' align = 'center' >" . $arr['ratinghostname'] . "</td>";
                    echo "<td class = 'even' align = 'center'>" . $arr['rating'] . "</td>";
                    echo "<td class = 'even' align = 'center'>" . $formatted_date . "</td>";
                    echo "<td class = 'even' align = 'center'><b><a href=votedata.php?op=delVote&lid=" . $arr['lid'] . "&rid=" . $arr['ratingid'] . ">$deleteimg</a></b></td>";
                    echo "</tr>";
                } 
            } 
        } 
        echo "</table>";
        include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
        $page = ($vote_num > 20) ? _AM_MAG_MINDEX_PAGE : '';
        $pagenav = new XoopsPageNav($vote_num, 20, $start, 'start');
        echo "<div align='right' style='padding: 8px;'>" . $page . '' . $pagenav -> renderNav() . '</div>';
        break;
}
xoops_cp_footer();

?>

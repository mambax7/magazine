<?php
// $Id: reorder.php,v 1.6 2005/02/07 01:25:25 phppp Exp $
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
include( "admin_header.php" );
//accessadmin( "moderator" );
$op = "";

$catid = ( isset( $_GET['category'] ) && ereg( "^[0-9]{1,}$", $_GET['category'] ) ) ? $_GET['category'] : 0;
$op = isset( $_GET['category'] ) ? "category" : "default";
$start = isset( $_GET['start'] ) ? intval( $_GET['start'] ) : 0;

extract( $_POST );
extract( $_GET );

switch ( $op )
{
    case "reorder":

        global $weight, $cat;
        for ( $i = 0; $i < count( $weight ); $i++ )
        {
            $xoopsDB->queryF( "update " . $xoopsDB->prefix( MAG_CATEGORY_DB ) . " set weight = " . $weight[$i] . " WHERE id=$cat[$i]" );
        } 
        redirect_header( "reorder.php", 1, _AM_MAG_CATREORDER );

        break;

    case "reaorder":

        global $weight, $art, $catid;

        for ( $i = 0; $i < count( $weight ); $i++ )
        {
            $xoopsDB->queryF( "update " . $xoopsDB->prefix( MAG_ARTICLE_DB ) . " set weight = " . $weight[$i] . " WHERE articleid=$art[$i]" );
        } 
        redirect_header( "reorder.php", 1, _AM_MAG_ARTREORDER );

        break;

    case "category":

        global $xoopsDB, $xoopsConfig, $xoopsModuleConfig, $weight, $art;
		
	$articlecount = MagArticle::countByCategory( $catid );
        $articlearray = MagArticle::getAllArticle( $articlecount, 0, 'online', $catid);        

        $weight = array();
        $art = array();

        xoops_cp_header();
        mag_admin_menu( _AM_MAG_CAREORDER);
        mag_textinfo(_AM_MAG_CAREORDER2, _AM_MAG_CATREORDERTEXT);

        echo "<form name='reaorder' METHOD='post'>
        	<table border='0' cellpadding='2' cellspacing='1' width = '100%' class = 'outer'>
        	<tr align='left'>
        	<td align='center' class='bg3' width = '3%'><b>" . _AM_MAG_REORDERID . "</b></td>
        	<td align='left' width = '30%'class='bg3'><b>" . _AM_MAG_REORDERTITLE . "</b></td>
        	<td align='left' width = '60%' class='bg3'><b>" . _AM_MAG_REORDERSUMMARY . "</b></td>
        	<td align='center' width = '17%' class='bg3'><b>" . _AM_MAG_REORDERWEIGHT . "</b></td>
        	</tr>";
        if ( !$articlecount )
        {
            echo "<tr>
            	<td colspan = 4 align = 'center' class='head'>" . _AM_MAG_NOARTICLEFOUND . "</td>
            	</tr>";
        } 
        foreach ( $articlearray as $article )
        {
            $articlelink = "";
            echo "<tr>
            	<td class='head'>$article->articleid</td>
	            <td class='even' nowrap='nowrap'><a href='" . MAG_ROOT_URL . "/admin/index.php?op=edit&articleid=" . $article->articleid() . "'>" . $article->title() . "</a></td>
	            <input type='hidden' name='art[]' value='" . $article->articleid . "' />
	            <td align='left'class='odd'>" . $article->summary . "</td>
	            <td align='center' class='even'><input type='text' name='weight[]' value='" . $article->weight . "' size='5' maxlenght='5'></td>
	            </tr>";
        } 
        if ( $articlecount > 0 )
        {
            echo "
            	<tr><td class='even' align='center' colspan='4'>
            	<input type='hidden' name='op' value=reaorder />
            	<input type='submit' name='submit' value='" . _SUBMIT . "' />
            	</td></tr>";
        } 
        echo "</table>
        	<table border='0' cellpadding='1' cellspacing='1' width='100%'>
	        <br />
	        <tr><td align='center' class='even' >[ <a href='" . MAG_ROOT_URL . "/admin/reorder.php'>" . _AM_MAG_RETCATREORDER . "</a> ]</a></td></tr>
	        </table>";
        break;

    case "default":
    default:

        xoops_cp_header();
        $catarray = array();
        $indexid = 1;

        $xt = new MagCategory();
        $categorys = $xt->getFirstChild(); 
        // Start of HTML Output
        mag_admin_menu( _AM_MAG_CAREORDER );
        mag_textinfo(_AM_MAG_CAREORDER2, _AM_MAG_CATREORDERTEXT);

        echo "<form name='reorder' METHOD='post'>";
        echo "<table border='0' width='100%' cellpadding='2' cellspacing ='1' class='outer' valign='top'>";
        echo "<tr>";
        echo "<td align='center' width=3% height =16 class = bg3><b>" . _AM_MAG_REORDERID . "</b></td>";
        echo "<td align='center' width=3% class = bg3><b>" . _AM_MAG_REORDERPID . "</b></td>";
        echo "<td align='left' width=30% class = bg3><b>" . _AM_MAG_REORDERTITLE . "</b></td>";
        echo "<td align='left' class = bg3><b>" . _AM_MAG_REORDERDESCRIPT . "</b></td>";
        echo "<td align='center' width=5% class = bg3><b>" . _AM_MAG_REORDERWEIGHT . "</b></td>";
        echo "</tr>";

        foreach( $categorys as $onecat )
        {
            $deps = 0;
            $aupdated = 0;
            $num = 0;
            $numsub = 0;
            $title = "";
            $subtitle = "";
            $readmore = "";
            $class = 'even';

            $num = MagArticle::countByCategory( $onecat->id() ) ;
            echo "<tr valign='top'>";
            echo "<td align='center' class = 'head'>" . $onecat->id . "</td>";
            echo "<input type='hidden' name='cat[]' value='" . $onecat->id . "' />";
            echo "<td align='middle' class = $class>" . $onecat->pid . "</td>";
            echo "<td align='left' nowrap='nowrap' class = $class>";
            if ( $num > 0 )
            {
                echo "" . str_repeat( " > ", $deps ) . $onecat->textLink( '', 0, "admin/reorder.php" ) . "</td>";
            } 
            else
            {
                echo "" . str_repeat( " > ", $deps ) . $onecat->title("S") . "</td>";
            } 
            echo "<td align='left' class = $class>" . $onecat->description("E") . "</td>";
            echo "<td align='left' class = $class>";
            echo "<input type='text' name='weight[]' value='" . $onecat->weight() . "' size='5' maxlenght='5'></td>";
            echo "</tr>"; 
            // Start of submenus here
            $childcat = $onecat->getFirstChild();
            foreach( $childcat as $subonecat )
            {
                $numsub = 0;
                $numsub = MagArticle::countByCategory( $subonecat->id() ) ;
                $deps ++;
                echo "<tr>";
                echo "<td align='center' class = 'head'>" . $subonecat->id() . "</td>";
                echo "<input type='hidden' name='cat[]' value='" . $subonecat->id() . "' />";
                echo "<td align='center' class = 'head'>" . $subonecat->pid() . "</td>";
                echo "<td align='left' nowrap='nowrap' class = 'odd'>";
                if ( $numsub > 0 )
                {
                    echo "<i>" . str_repeat( "<li>", $deps ) . $subonecat->textLink( '', 0, "admin/reorder.php" ) . "</li></i></td>";
                } 
                else
                {
                    echo "<i>" . str_repeat( "<li>", $deps ) . $subonecat->title . "</li></i></td>";
                } 
                echo "<td align='left' class = 'odd'>" . $subonecat->description("S") . "</td>";
                echo "<td align='left' class = 'odd'>";
                echo "<input type='text' name='weight[]' value='" . $subonecat->weight . "' size='5' maxlenght='5'></td>";
                echo "</tr>";
            } 
        } 
        echo "<tr><td class='even' align='center' colspan='6'>";
        echo "<input type='hidden' name='op' value=reorder />";
        echo "<input type='submit' name='submit' value='" . _SUBMIT . "' />";
        echo "</td></tr>";
        echo "</table>";
        echo "</form>";
} 
xoops_cp_footer();

?>

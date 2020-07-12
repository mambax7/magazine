<?php
// $Id: reviews.php,v 1.7 2005/02/07 01:25:25 phppp Exp $
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
include_once MAG_ROOT_PATH . "/class/lists.php";

//accessadmin( "reviews" );


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

$op = '';

if ( isset( $_GET['op'] ) ) $op = $_GET['op'];
if ( isset( $_POST['op'] ) ) $op = $_POST['op'];

switch ( $op )
{
    case "saverelated":

        global $myts;

        foreach ( $_POST as $key => $main )
        {
            if ( is_numeric( $main ) )
            {
                $$key = intval( $main );
            } 
            else
            {
                $$key = $myts->addslashes( $main );
            }
        } 

        if ( !$_POST['review_id'] )
        {
            $query = "INSERT INTO " . $xoopsDB->prefix( MAG_REVIEWS ) . " (review_id, article_id,
				title1, desc1, title2, desc2, title3, desc3, title4, desc4,
				title5, desc5, title6, desc6, display) ";
            $query .= "VALUES (0, $article_id, 
                               '$title1', '$desc1', '$title2', '$desc2', '$title3', '$desc3',
                               '$title4', '$desc4', '$title5', '$desc5', '$title6', '$desc6',
                               '$display' )";
        } 
        else
        {
            $query = "UPDATE " . $xoopsDB->prefix( MAG_REVIEWS ) . " SET article_id = $article_id,
                                title1 = '$title1', desc1 = '$desc1',
				title2 = '$title2', desc2 = '$desc2',
                                title3 = '$title3', desc3 = '$desc3', 
                                title4 = '$title4', desc4 = '$desc4', 
                                title5 = '$title5', desc5 = '$desc5',
				title6 = '$title6', desc6 = '$desc6',
                                display = '$display'
			WHERE review_id =" . $_POST['review_id'] . "";
        } 

        $error = "Could not create information: <br /><br />";
        $error .= $query;
        $result = $xoopsDB->queryF( $query );
        if ( !$result )
        {
            trigger_error( $error, E_USER_ERROR );
        } 
        redirect_header( "index.php?op=edit&articleid=$article_id", 2, _AM_UPDATED );
        // review_id  article_id  publisher  developer  website  difficulty  released  genre  players  playonline  family  curve  graphics  sound  gameplay  concept  value  tilt  overall;
        break;

    default:

        $start = isset( $_GET['start'] ) ? intval( $_GET['start'] ) : 0;


        $sql = "SELECT * FROM " . $xoopsDB->prefix( MAG_REVIEWS ) . " WHERE article_id = " . $_GET['articleid'] . "";
        $review_arr = $xoopsDB->fetchArray( $xoopsDB->query( $sql ) );

        xoops_cp_header();
        mag_admin_menu( _AM_MAG_OTHER_INFO, 0 );
        mag_textinfo( _AM_MAG_OTHER_INFOADMIN, _AM_MAG_OTHER_INFOADMINTXT );

        $article = new MagArticle( $_GET['articleid'] );

        $sform = new XoopsThemeForm( _AM_MAG_OTHER_INFO . $article->title , "op", xoops_getenv( 'PHP_SELF' ) ); // . $article->textLink( "S" )

        // 自訂欄位 1 - 標題
        $sform->addElement( new XoopsFormText( _AM_MAG_TITLE_1, 'title1', 50, 255, $review_arr['title1'] ), false );
        // 自訂欄位 1 - 內容
        $sform->addElement( new XoopsFormDhtmlTextArea( _AM_MAG_DESC_1, 'desc1', $review_arr['desc1'], 5, 60 ), false );
        
        // 自訂欄位 2 - 標題
        $sform->addElement( new XoopsFormText( _AM_MAG_TITLE_2, 'title2', 50, 255, $review_arr['title2'] ), false );
        // 自訂欄位 2 - 內容
        $sform->addElement( new XoopsFormDhtmlTextArea( _AM_MAG_DESC_2, 'desc2', $review_arr['desc2'], 5, 60 ), false );
        
        // 自訂欄位 3 - 標題
        $sform->addElement( new XoopsFormText( _AM_MAG_TITLE_3, 'title3', 50, 255, $review_arr['title3'] ), false );
        // 自訂欄位 3 - 內容
        $sform->addElement( new XoopsFormDhtmlTextArea( _AM_MAG_DESC_3, 'desc3', $review_arr['desc3'], 5, 60 ), false );
        
        // 自訂欄位 4 - 標題
        $sform->addElement( new XoopsFormText( _AM_MAG_TITLE_4, 'title4', 50, 255, $review_arr['title4'] ), false );
        // 自訂欄位 4 - 內容
        $sform->addElement( new XoopsFormDhtmlTextArea( _AM_MAG_DESC_4, 'desc4', $review_arr['desc4'], 5, 60 ), false );
        
        // 自訂欄位 5 - 標題
        $sform->addElement( new XoopsFormText( _AM_MAG_TITLE_5, 'title5', 50, 255, $review_arr['title5'] ), false );
        // 自訂欄位 5 - 內容
        $sform->addElement( new XoopsFormDhtmlTextArea( _AM_MAG_DESC_5, 'desc5', $review_arr['desc5'], 5, 60 ), false );
        
        // 自訂欄位 6 - 標題
        $sform->addElement( new XoopsFormText( _AM_MAG_TITLE_6, 'title6', 50, 255, $review_arr['title6'] ), false );
        // 自訂欄位 6 - 內容
        $sform->addElement( new XoopsFormDhtmlTextArea( _AM_MAG_DESC_6, 'desc6', $review_arr['desc6'], 5, 60 ), false );

        $sform->insertBreak( "", "even" );

        $review_display = ( $review_arr['display'] == 1 ) ? 1 : 0;
        $display_radio = new XoopsFormRadioYN( _AM_MAG_DISPLAYREVIEW, 'display', $review_display, ' ' . _AM_MAG_YES . '', ' ' . _AM_MAG_NO . '' );
        $sform->addElement( $display_radio );
        $review_id = ( $review_arr['review_id'] ) ? $review_arr['review_id'] : 0;
        $sform->addElement( new XoopsFormHidden( "review_id", $review_id ) );
        $sform->addElement( new XoopsFormHidden( "article_id", $_GET['articleid'] ) );

        $button_tray = new XoopsFormElementTray( '', '' );
        $hidden = new XoopsFormHidden( 'op', 'saverelated' );
        $button_tray->addElement( $hidden );
        $button_tray->addElement( new XoopsFormButton( '', 'submit', _AM_MAG_SAVE, 'submit' ) );
        $button_tray->addElement( new XoopsFormButton( '', 'reset', _AM_MAG_RESET, 'reset' ) );
        $sform->addElement( $button_tray );
        $sform->display();
        unset( $hidden );
        break;
} 
xoops_cp_footer();

?>

<?php
// $Id: archive.php,v 1.9 2005/05/12 19:22:41 RB Exp $
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
include "header.php";

//global $magTemplates;

$xoopsOption['template_main'] = 'mag_archive.html';

include XOOPS_ROOT_PATH . '/header.php';
include_once MAG_ROOT_PATH . "/include/functions.php" ;
include_once MAG_ROOT_PATH . "/class/article.php";
include_once MAG_ROOT_PATH . "/class/index.php";
include_once XOOPS_ROOT_PATH . '/language/' . $xoopsConfig['language'] . '/calendar.php';

$catarray = array();
$index = new MagIndex( 3 );

$catarray['imageheader'] = $index->imageheader( "S" );
$catarray['indexheading'] = $index->indexheading( "S" );
$catarray['indexheader'] = $index->indexheader( "S" );
$catarray['indexfooter'] = $index->indexfooter( "S" );
$catarray['indexheaderalign'] = $index->indexheaderalign();
$catarray['indexfooteralign'] = $index->indexfooteralign();
$xoopsTpl->assign( 'catarray', $catarray );

//$lastyear = 0;
//$lastmonth = 0;

$months_arr = array( 1 => _CAL_JANUARY,
    2 => _CAL_FEBRUARY,
    3 => _CAL_MARCH,
    4 => _CAL_APRIL,
    5 => _CAL_MAY,
    6 => _CAL_JUNE,
    7 => _CAL_JULY,
    8 => _CAL_AUGUST,
    9 => _CAL_SEPTEMBER,
    10 => _CAL_OCTOBER,
    11 => _CAL_NOVEMBER,
    12 => _CAL_DECEMBER );

$useroffset = "";
if ( is_object( $xoopsUser ) )
{
    $timezone = $xoopsUser->timezone();
    if ( isset( $timezone ) )
    {
        $useroffset = $xoopsUser->timezone();
    } 
    else
    {
        $useroffset = $xoopsConfig['default_TZ'];
    } 
} 
//$result = $xoopsDB->query( "SELECT published FROM " . $xoopsDB->prefix( MAG_ARTICLE_DB ) . " WHERE published > 0 AND published<=" . time() . " AND expired > 0 ORDER BY published DESC" );
$result = $xoopsDB->query( "SELECT published FROM " . $xoopsDB->prefix( MAG_ARTICLE_DB ) . " WHERE published > 0 AND published <= " . time() . " AND expired < " . time() . " ORDER BY published DESC" );

if ( !$result )
{
    exit();
}
else
{
    $years = array();
    $months = array();
    $i = 0;

    while ( list( $time ) = $xoopsDB->fetchRow( $result ) )
    {
        $time = formatTimestamp( $time, "mysql", $useroffset );
        if ( preg_match( "/([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})/", $time, $datetime ) )
        {
            $this_year = intval( $datetime[1] );
            $this_month = intval( $datetime[2] );
            if ( empty( $lastyear ) )
            {
                $lastyear = $this_year;
            } 
            if ( $lastmonth == 0 )
            {
                $lastmonth = $this_month;
                $months[$lastmonth]['string'] = $months_arr[$lastmonth];
                $months[$lastmonth]['number'] = $lastmonth;
            } 
            if ( $lastyear != $this_year )
            {
                $years[$i]['number'] = $lastyear;
                $years[$i]['months'] = $months;
                $months = array();
                $lastmonth = 0;
                $lastyear = $this_year;
                $i++;
            } 
            if ( $lastmonth != $this_month )
            {
                $lastmonth = $this_month;
                $months[$lastmonth]['string'] = $months_arr[$lastmonth];
                $months[$lastmonth]['number'] = $lastmonth;
            } 
        } 
    } 
    $years[$i]['number'] = ( isset( $this_year) ) ? intval ( $this_year ): 0;
    $years[$i]['months'] = $months;
    $xoopsTpl->assign( 'years', $years );
} 
$nowyear = date("Y");
$nowmonth = date("m");
$fromyear = ( isset( $_GET['year'] ) ) ? intval ( $_GET['year'] ): $nowyear;
$frommonth = ( isset( $_GET['month'] ) ) ? intval( $_GET['month'] ) : $nowmonth;

/*if ( $fromyear != 0 && $frommonth != 0 )
{*/
    //$xoopsTpl->assign( 'show_articles', true );
    $xoopsTpl->assign( 'lang_title', _MAG_TITLE );
    $xoopsTpl->assign( 'currentmonth', $months_arr[$frommonth] );
    $xoopsTpl->assign( 'currentyear', $fromyear );
    $xoopsTpl->assign( 'lang_actions', _MAG_ACTIONS );
    $xoopsTpl->assign( 'lang_date', _MAG_DATE );
    $xoopsTpl->assign( 'lang_views', _MAG_VIEWS ); 
    // must adjust the selected time to server timestamp
    $timeoffset = $useroffset - $xoopsConfig['server_TZ'];
    $monthstart = mktime( 0 - $timeoffset, 0, 0, $frommonth, 1, $fromyear );
    $monthend = mktime( 23 - $timeoffset, 59, 59, $frommonth + 1, 0, $fromyear );
    $monthend = ( $monthend > time() ) ? time() : $monthend;
    //$sql = "SELECT * FROM " . $xoopsDB->prefix( MAG_ARTICLE_DB ) . " WHERE published > $monthstart and published < $monthend AND expired > 0 ORDER by published DESC";
    $sql = "SELECT * FROM " . $xoopsDB->prefix( MAG_ARTICLE_DB ) . " WHERE published > $monthstart and published < $monthend AND expired < " . time() . " ORDER by published DESC";
    $result = $xoopsDB->query( $sql );
    $count = 0;
    while ( $myrow = $xoopsDB->fetchArray( $result ) )
    {
        $article = new MagArticle( $myrow );
        $story = array();
        $story['title'] = $article->category->textLink() . ": " . $article->titleLink( "S" );
        $story['counter'] = $article->counter();
        $story['date'] = formatTimestamp( $article->published(), "s", $useroffset );
        $story['print_link'] = 'print.php?articleid=' . $article->articleid();
        $story['mail_link'] = 'mailto:?subject=' . sprintf( _MAG_INTARTICLE, $xoopsConfig['sitename'] ) . '&amp;body=' . sprintf( _MAG_INTARTFOUND, $xoopsConfig['sitename'] ) . ':  ' . XOOPS_URL . '/modules/' . $xoopsModule->dirname() . '/article.php?articleid=' . $article->articleid();
        $story['pdf_link'] = 'makepdf.php?articleid=' . $article->articleid();
        $xoopsTpl->append( 'stories', $story );
        $count++;
    } 
    $xoopsTpl->assign( 'lang_printer', _MAG_PRINTERFRIENDLY );
    $xoopsTpl->assign( 'lang_makepdf', _MAG_MAKEPDF );
    $xoopsTpl->assign( 'lang_sendstory', _MAG_SENDSTORY );
    $xoopsTpl->assign( 'lang_storytotal', sprintf( _MAG_THEREAREINTOTAL, $count ) );
/*}
else
{
    $xoopsTpl->assign( 'show_articles', false );
}*/
$xoopsTpl->assign( 'xoops_pagetitle', $catarray['indexheading'] );
$xoopsTpl->assign( 'lang_newsarchives', _MAG_NEWSARCHIVES );

include "footer.php";
include XOOPS_ROOT_PATH . "/footer.php";
?>

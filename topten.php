<?php
// $Id: topten.php,v 1.5 2005/02/07 01:25:23 phppp Exp $
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
include_once MAG_ROOT_PATH . "/include/functions.php";
include_once MAG_ROOT_PATH."/class/article.php";
include_once MAG_ROOT_PATH."/class/index.php";
include_once XOOPS_ROOT_PATH . "/class/xoopstree.php";

//global $xoopsModuleConfig, $magTemplates;

$xoopsOption['template_main'] = $magTemplates['toptentemp'];

$mytree = new MagTree( $xoopsDB->prefix( MAG_CATEGORY_DB ), "id", "pid" );

//extract($_GET);

include XOOPS_ROOT_PATH . "/header.php";

$xt = new MagCategory();
$categorys = $xt->getFirstChild();
$arr = array();
$rankings = array();
$rankingart = array();
$rank = 1;
$e = 0;
$indid = 2;
$user = 0;
$query_string = 'online';
$limit = 10;

if ( isset( $_GET['rate'] ) )
{
    $sort = _MAG_RATING;
    $orderby = 'rating DESC';
    $xoopsTpl->assign( 'lang_listings' , _MAG_RATING2 );
} 

if ( isset( $_GET['counter'] ) )
{
    $sort = _MAG_HITS;
    $orderby = 'counter DESC';
    $xoopsTpl->assign( 'lang_listings' , _MAG_HITS2 );
} 

if ( isset( $_GET['auth'] ) )
{
    $sort = _MAG_AUTH;
    $orderby = 'uid';
    $query_string = 'all';
    $user = intval( $auth );
    $xoopsTpl->assign( 'lang_listings' , _MAG_AUTH2 );
    $limit = 20;
} 

$index = new MagIndex( 2 );
$catarray['imageheader'] = $index->imageheader();
$catarray['indexheading'] = $index->indexheading( "S" );
$catarray['indexheader'] = $index->indexheader( "S" );
$catarray['indexfooter'] = $index->indexfooter( "S" );
$catarray['indexheaderalign'] = $index->indexheaderalign();
$catarray['indexfooteralign'] = $index->indexfooteralign();
$xoopsTpl->assign( 'catarray', $catarray );

foreach( $categorys as $onecat )
{
    $articlecount = MagArticle::countByCategory( $onecat->id );

    if ( !Mag_checkAccess( $onecat->groupid() ) || !$articlecount )
    {
        continue;
    } 
    //$sarray = MagArticle::getAllArticle( $limit, 0, $onecat->id, $dataselect, $user );
    $sarray = MagArticle::getAllArticle( $limit, 0, $query_string, $onecat->id, $user, $orderby);

    $rankings[$e]['title'] = $onecat->title( "S" );
    $rank = 1;
	foreach ( $sarray as $article )
    {
        
        if ( !Mag_checkAccess( $article->groupid ) )
        {
            continue;
        } 
        $rankings[$e]['file'][] = array('id' => $article->articleid, 'cid' => $article->categoryid, 'rank' => $rank, 'title' => $article->textlink(), 'category' => $onecat->textLink( '', 0 ), 'hits' => $article->counter, 'rating' => number_format( $article->rating, 2 ), 'votes' => $article->votes );
        $xoopsTpl->assign( 'rankings', $rankings );
    	$rank++;
	} 
    $e++;
} 
$xoopsTpl->assign( 'lang_sortby' , $sort );
$xoopsTpl->assign( 'lang_rank' , _MAG_RANK );
$xoopsTpl->assign( 'lang_title' , _MAG_TITLE );
$xoopsTpl->assign( 'lang_category' , _MAG_CATEGORY );
$xoopsTpl->assign( 'lang_hits' , _MAG_HITS );
$xoopsTpl->assign( 'lang_rating' , _MAG_RATING );
$xoopsTpl->assign( 'lang_vote' , _MAG_VOTE );

include XOOPS_ROOT_PATH . '/footer.php';
include "footer.php";

?>

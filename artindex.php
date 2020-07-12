<?php
// $Id: artindex.php,v 1.7 2005/06/09 11:41:23 RB Exp $
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
include 'header.php';
include_once MAG_ROOT_PATH . "/include/functions.php" ;
include_once MAG_ROOT_PATH . "/class/article.php";

$catid = (isset($_GET['category']) && ereg("^[0-9]{1,}$", $_GET['category'])) ? $_GET['category'] : 1;
$op = isset($_GET['category']) ? "category" : "default";
$start = isset($_GET['start']) ? intval($_GET['start']) : 0;
$orderby = (!empty($_GET['orderby'])) ? mag_convertorderbyin($_GET['orderby']) : $xoopsModuleConfig['aidxorder'];

switch ($op)
{
    case "category":
    default:
        $xt = new MagCategory($catid);
//------------------------------------------------------------------------------------------------dqflyer fixed
		if (!$xt->status())
		{
			redirect_header('javascript:history.go(-1)',1,_MAG_WRONGCAT);
			exit;
		}
//----------------------------------------------------------------------------------------------------    

        if (!is_object($xt)) {
            redirect_header('javascript:history.go(-1)', 1 , _MAG_CATNOTEXIST);
            exit();
        }
        
	if (!empty($xt->template)) {
	        $xoopsOption['template_main'] = $xt->template;
	} else {
	        $xoopsOption['template_main'] = $magTemplates['artindex'];
	}
        if (!Mag_checkAccess($xt->groupid)) {
            redirect_header('javascript:history.go(-1)', 2 , _MAG_CATNOPERM);
            exit();
        }
        include_once(XOOPS_ROOT_PATH . "/header.php");
        $artarray['sectionimage'] = '';
        if ($xt->imgurl("S") && $xoopsModuleConfig['showcatpic'] && $xt->displayimg)
        {
            $artarray['sectionimage'] = $xt->imgLink();
        }
        $artarray['headingtitle'] = $xt->title('S');
        $artarray['headertitle'] = $xt->catheadertitle('S');
        $artarray['header'] = $xt->catheader('S');
        $artarray['footertitle'] = $xt->catfootertitle('S');
        $artarray['footer'] = $xt->catfooter('S');
//---------------------------------------------------------------------------------------------------
        // quick menu
        $artarray['qkmenu'] = "<img src='images/up.gif' border='0' align='middle' alt='' />&nbsp;<a href='artindex.php?category=" . $catid . "&start=" . $start . "&orderby=createdA'>" . _MAG_DATEOLD . "</a>&nbsp;&nbsp;<img src='images/down.gif' border='0' align='middle' alt='' />&nbsp;<a href='artindex.php?category=" . $catid . "&start=" . $start . "&orderby=createdD'>" . _MAG_DATENEW . "</a><br />
        <img src='images/up.gif' border='0' align='middle' alt='' />&nbsp;<a href='artindex.php?category=" . $catid . "&start=" . $start . "&orderby=ratingA'>" . _MAG_RATINGLTOH . "</a>&nbsp;&nbsp;<img src='images/down.gif' border='0' align='middle' alt='' />&nbsp;<a href=artindex.php?category=" . $catid . "&start=" . $start . "&orderby=ratingD>" . _MAG_RATINGHTOL . "</a><br />
        <img src='images/up.gif' border='0' align='middle' alt='' />&nbsp;<a href='artindex.php?category=" . $catid . "&start=" . $start . "&orderby=counterA'>" . _MAG_POPULARITYLTOM . "</a>&nbsp;&nbsp;<img src='images/down.gif' border='0' align='middle' alt='' />&nbsp;<a href='artindex.php?category=" . $catid . "&start=" . $start . "&orderby=counterD'>" . _MAG_POPULARITYMTOL . "</a><br />";
//---------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------
//        $artarray['navigation']=_MAG_NAVIGATION."<A href=\"".MAG_ROOT_URL."\">"._MI_MAG_NAME."</a>".$xt->getNicePathToPid("artindex.php?category=");
//-----------------------------------------------------------------------------------------------------------------
        //$artarray['pulldown'] = jumpbox("artindex.php", $xt->id);
        $xoopsTpl->assign('lang_selectsection', _MAG_SELECTSUBSECTION)
        ;
        $sarray = MagArticle::getAllArticle($xoopsModuleConfig['articlesapage'], $start, 'online|spotlight', $xt->id, 0, $orderby);
        foreach ($sarray as $article)
        {
                $feature["title"] = $article->textLink("S");
                //$feature["summary"] = $article->summary("S");
                //$feature["image"] = $article->articleimg("S", 2);
                //$feature["more"] = $article->morelink("S");
		$xoopsTpl->append('feature', $feature);
        }

        $sarray = MagArticle::getAllArticle($xoopsModuleConfig['articlesapage'], $start, 'online', $xt->id, 0, $orderby);
	$articlecount = MagArticle::countByCategory($xt->id, 0, 0);

	foreach ($sarray as $article)
        {
            $articles['articleid'] = $article->articleid("E");
            $articles['title'] = $article->titleLink("S");
            $articles['summary'] = $article->summary("S");
            $articles['username'] = MAG_getLinkedUnameFromId($article -> uid(), $xoopsModuleConfig['displayname'], 0);
            $status = ($article->changed() > 0) ? 1 : 0;
            $articles['icons'] = mag_displayicons($article->created(), $status, $article->counter());
	    
            $articles['filescount'] = strval($article->getFilesCount());
	    $articles['published'] = formatTimestamp($article->published(), $xoopsModuleConfig['timestamp']);
    	    $articles['rating'] = number_format($article->rating(), 1);  // 2
    	    $articles['counter'] = $article->counter();

	    /*
            $articles['commentcount'] = (in_array(1, $xoopsModuleConfig['displayinfolist'])) ? $article->getCommentsCount() : "";
	    $articles['filescount'] = (in_array(2, $xoopsModuleConfig['displayinfolist'])) ? strval($article->getFilesCount()) : "";
	    $articles['counter'] = (in_array(6, $xoopsModuleConfig['displayinfolist'])) ? $article->counter() : "";
	    $articles['published'] = (in_array(5, $xoopsModuleConfig['displayinfolist'])) ? formatTimestamp($article->published(), $xoopsModuleConfig['timestamp']) : "";
	    if ($xoopsModuleConfig['novote']) {
            	$articles['rating'] = (in_array(3, $xoopsModuleConfig['displayinfolist'])) ? number_format($article->rating(), 2) : "";
            	$articles['votes'] = (in_array(4, $xoopsModuleConfig['displayinfolist'])) ? $article->votes() : "";
		$xoopsTpl->assign('mag_novote', true);
	    }
            $articles['readmore'] = $article->morelink("S");
	    $articles['image'] = $article->articleimg("S", $size = 2, 0);
	    */
	    $articles['adminlink'] = $article->adminlink();
            $xoopsTpl->append('articles', $articles);
        }

        $xoopsTpl->assign(
		array(
                'lang_title' => _MAG_TITLE,
                'lang_date' => _MAG_DATE,
                'lang_readmore' => _MAG_READMORE,
                'lang_author' => _MAG_AUTHER,
                'lang_published' => _MAG_PUBLISHEDHOME,
                'lang_views' => _MAG_VIEWS,
                'lang_files' => _MAG_FILES,
                'lang_rated' => _MAG_RATED,
                'lang_votes' => _MAG_VOTES,
                'lang_comments' => _MAG_COMMENT,
                'lang_otherarticles' => _MAG_OTHERARTICLES,
                'lang_published' => _MAG_PUBLISHEDHOME,
                'lang_downloadsfor' => _MAG_DOWNLOADS,
                'lang_pages' => _MAG_PAGES,
                'lang_menu' => _MAG_QKMENU,
                'lang_rb' => _MAG_RB
		)
        );
//------------------------------------------------------------------------------------------------
        /**
         * display categories/sections
         * RB add
         */

        $cat = new MagCategory(0);
        $categorys = $cat->getFirstChild();
        //$categorys = $cat->getAllChild(); // show sub cat
        foreach($categorys as $onecat)
        {
            unset($category);
            if ($onecat->status() != 1) continue;
            $category['catid'] = $onecat->id();
            $category['title'] = $onecat->textLink('', 1, 'artindex.php');
            $category['sectionimage'] = $onecat->imgLink();
            $category['imgalign'] = $onecat->imgalign("S");
            $xoopsTpl->append('categories', $category);
        }
        // RB add start  050729 for cat_list.html
        $subcategorys = $cat->getAllSubChild();
        $i = 0;
        foreach($subcategorys as $onecat)
        {
            unset($subcategory);
            $num = ($xoopsModuleConfig['sectionnums'] - 1);
            $i++;
            if ($i == $num) $i = 0;
            if ($onecat->status() != 1) continue;
            $subcategory['columnwidth'] = intval(1/$num*100);
            $subcategory['i'] = $i;
            $subcategory['catid'] = $onecat->id();
            $subcategory['title'] = $onecat->textLink('', 1, 'artindex.php');
            $subcategory['sectionimage'] = $onecat->imgLink();
            $subcategory['imgalign'] = $onecat->imgalign("S");
            
            $subarray = MagArticle::getAllArticle($xoopsModuleConfig['showartlistamount'], 0, 'online', $onecat->id(), 0, "weight ASC");
            $num = 0;
            foreach ($subarray as $articles)
            {
                $subcategory['content'][] = array('articlelink' => $articles->textLink(), 'num' => $num );
                $num++ ;
                if ($num == 4) $num = 0 ;
                /*$status = ($articles->changed() > 0) ? 1 : 0;
                $subcategory['icons'] = mag_displayicons($articles->created(), $status, $articles->counter());
                $subcategory['content'][] = array('articlelink' => $articles->textLink() ." ". $category['icons'] ."<br>");*/
            }
            $xoopsTpl->append('subcategories', $subcategory);
        }

        // RB add end
//------------------------------------------------------------------------------------------------
        if ($articlecount > 0)
        {
            $sfigure = $start + 1;
            $efigure = $start + $xoopsModuleConfig['articlesapage'];
            if ($efigure >= $articlecount) $efigure = $articlecount;
        }
        else
        {
            $sfigure = 0;
            $articlecount = 0;
            $efigure = 0;
        }
        $artarray['showartamount'] = sprintf(_MAG_SHOWARTAMOUNT, $sfigure,$efigure,$articlecount);

        //if (($articlecount > 0) && $xoopsModuleConfig['orderbox'])
        //if ($xoopsModuleConfig['orderbox'])
        //{
            //$artarray['sortmenu'] = "<center>" . _MAG_SORTBY1 . "&nbsp;";
            $artarray['sortmenu'] = "<center>&nbsp;";
            $artarray['sortmenu'] .= "  " . _MAG_TITLE1 . "&nbsp; <a href='artindex.php?category=$catid&start=" . $start . "&orderby=titleA'><img src='images/up.gif' border='0' align='middle' alt='' /></a>&nbsp;<a href='artindex.php?category=$catid&start=" . $start . "&orderby=titleD'><img src='images/down.gif' border='0' align='middle' alt='' /></a>";
            $artarray['sortmenu'] .= "  " . _MAG_DATE1 . "&nbsp; <a href='artindex.php?category=$catid&start=" . $start . "&orderby=createdA'><img src='images/up.gif' border='0' align='middle' alt='' /></a>&nbsp;<a href='artindex.php?category=$catid&start=" . $start . "&orderby=createdD'><img src='images/down.gif' border='0' align='middle' alt='' /></a>";
            //if (in_array(4, $xoopsModuleConfig['displayinfolist']))
            $artarray['sortmenu'] .= "	" . _MAG_RATING3 . "&nbsp; <a href='artindex.php?category=$catid&start=" . $start . "&orderby=ratingA'><img src='images/up.gif' border='0' align='middle' alt='' /></a>&nbsp;<a href=artindex.php?category=$catid&start=" . $start . "&orderby=ratingD><img src='images/down.gif' border='0' align='middle' alt='' /></a>";

            $artarray['sortmenu'] .= "	" . _MAG_POPULARITY1 . "&nbsp; <a href='artindex.php?category=$catid&start=" . $start . "&orderby=counterA'><img src='images/up.gif' border='0' align='middle' alt='' /></a>&nbsp;<a href='artindex.php?category=$catid&start=" . $start . "&orderby=counterD'><img src='images/down.gif' border='0' align='middle' alt='' /></a>";
            //$artarray['sortmenu'] .= " &nbsp; <a href='artindex.php?category=$catid&start=" . $start . "&orderby=weight'>". _MAG_WEIGHT . "</a>&nbsp;";
            $orderbyTrans = mag_convertorderbytrans($orderby);
            $artarray['sortmenu'] .= "&nbsp;" . _MAG_CURSORTBY1 . " $orderbyTrans ";
            $artarray['sortmenu'] .= "</center>";
        //}
        $artarray['menu'] = "&lt;&lt; <a href='javascript:history.back(1)'>" . _MAG_BACK2 . "</a> | <a href='./index.php'>" . _MAG_RETURN2INDEX . "</a> &gt;&gt;";
        $artarray['usermenu'] = "<a href='./submit.php'><img src='./images/submit.gif'></a> <a href='./archive.php'><img src='./images/archive.gif'></a>";

        include_once XOOPS_ROOT_PATH.'/class/pagenav.php';
        $pagenav = new XoopsPageNav($articlecount, $xoopsModuleConfig['articlesapage'] , $start, "start", "category=$catid");
        $artarray['pagenav'] = '' . $pagenav->renderNav() . '';
        $xoopsTpl->assign('artarray', $artarray);
        break;
}

$xoopsTpl->assign( 'xoops_pagetitle', $artarray['headingtitle'] );
// RB 2005-05-18
if ( isset($xt->isblocks) && $xt->isblocks == 1 ){
$xoopsTpl->assign('xoops_showrblock', 0);
$xoopsTpl->assign('xoops_lblocks', 0);
}elseif ( isset($xt->isblocks) && $xt->isblocks == 2 ) {
$xoopsTpl->assign('xoops_showrblock', 0);
}elseif ( isset($xt->isblocks) && $xt->isblocks == 3 ) {
$xoopsTpl->assign('xoops_lblocks', 0);
}

include_once 'footer.php';
?>

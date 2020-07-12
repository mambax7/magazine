<?php
// $Id: index.php,v 1.10 2005/02/07 01:25:23 RB Exp $
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
include_once MAG_ROOT_PATH . "/include/functions.php" ;
include_once MAG_ROOT_PATH . "/class/article.php";
include_once MAG_ROOT_PATH . "/class/index.php";
include_once XOOPS_ROOT_PATH . "/class/xoopstree.php";

global $xoopsModuleConfig, $magTemplates, $magPathConfig;

$catid = (isset($_GET['category']) && ereg("^[0-9]{1,}$", $_GET['category'])) ? $_GET['category'] : 0;
$op = isset($_GET['category']) ? "category" : "default";
$start = isset($_GET['start']) ? intval($_GET['start']) : 0;
$orderby = (!empty($_GET['orderby'])) ? mag_convertorderbyin($_GET['orderby']) : $xoopsModuleConfig['aidxorder'];

switch ($op)
{
    /**
     * Start of main category index listings
     */
    case "default":
    default:

        include_once(XOOPS_ROOT_PATH . "/header.php");
        $xoopsOption['template_main'] = $magTemplates['catindex'];

        $catarray = array();
        $index = new MagIndex(1);

        $catarray['imageheader'] = $index->imageheader("S");
        $catarray['indexheading'] = $index->indexheading("S");
        $catarray['indexheader'] = $index->indexheader("S");
        $catarray['indexfooting'] = $index->indexfooting("S");
        $catarray['indexfooter'] = $index->indexfooter("S");
        $catarray['indexheaderalign'] = $index->indexheaderalign();
        $catarray['indexfooteralign'] = $index->indexfooteralign();

        $sarray = MagArticle::getAllArticle(5, 0, 'online|spotlightmain', 0, 0, "published DESC");
        $count = 0;
        foreach ($sarray as $articles)
        {
            if ($articles->spotlightmain == 2 && $count == 0)
            {
                $feature["summary"] = $articles->summary("S");
                $feature["artlink"] = $articles->textLink("S");
                $feature["date"] = $articles->published("S");
                $feature["cat"] = $articles->category->textLink('', 0, 'artindex.php');
                $feature["image"] = $articles->articleimg("S", 2);
                $feature["author"] = $articles->uname("S");
                $feature["more"] = $articles->morelink("S");
                $xoopsTpl->assign('featured', $feature);
                $count = 1;
            }
            else
            {
                $features["summary"] = $articles->summary("S");
                $features["artlink"] = $articles->textLink("S");
                $features["date"] = $articles->published("S");
                $features["cat"] = $articles->category->textLink('', 0, 'artindex.php');
                $features["image"] = $articles->articleimg("S", 4);
                $features["author"] = $articles->uname("S");
                $features["more"] = $articles->morelink("S");
                $xoopsTpl->append('features', $features);
            }
        }
        /**
         * display categories/sections
         */

        $xt = new MagCategory();
        $categorys = $xt->getFirstChild();
        $i = 0;
        foreach($categorys as $onecat)
        {
            unset($category);
            if ($onecat->status() != 1) continue;
            //$recurse = 0; //$recurse = ($xoopsModuleConfig['submenus']) ? 0 : 1;
            //$num = MagArticle::countByCategory($onecat->id, 0, $recurse) ;
            $num = $xoopsModuleConfig['sectionnums'];
            $i++;
            if ($i == $num) $i = 0;
            $category['columnwidth'] = intval(1/$num*100);
            $category['i'] = $i;
            //$category['num'] = $num;  // ¤å³¹¼Æ
            $category['catid'] = $onecat->id();
            $category['title'] = $onecat->textLink('', 1, 'artindex.php');
            $category['sectionimage'] = $onecat->imgLink();
            $category['imgalign'] = $onecat->imgalign("S");
            // RB 2005-07-31
            $childarray = array();
            $childarray = $xt->getAllChildId($onecat->id(),"");

            if (count($childarray))
	    {
	        $child = 0;
                foreach ($childarray as $titlearray )
		{
                   $onechild = new MagCategory($titlearray);
                   if ($onechild->status())
		   {
                      $category['subtitle'] .= "<a href='artindex.php?category=".$onechild->id()."'>".$onechild->title()."</a><br />";
                   }
                   $child ++;
	           if ($child == $xoopsModuleConfig['showartlistamount']) break;
		}
            }

            if ($xoopsModuleConfig['showartlistings'] == 1 || $xoopsModuleConfig['showartlistings'] == 3)
            {
                $category['description'] = $onecat->description('S');
            }

            if ($xoopsModuleConfig['showartlistings'] == 2 || $xoopsModuleConfig['showartlistings'] == 3)
            {
                $artarray = MagArticle::getAllArticle($xoopsModuleConfig['showartlistamount'], 0, 'online', $onecat->id(), 0, $orderby);
                foreach ($artarray as $articles)
                {
            	  $status = ($articles->changed() > 0) ? 1 : 0;
                  $category['icons'] = mag_displayicons($articles->created(), $status, $articles->counter());
                  $category['content'][] = array('articlelink' => $articles->textLink() ." ". $category['icons'] ."<br />");
                }
             }

//---------------------------------------------------------------------------------------------------
/*
            if ($xoopsModuleConfig['submenus'] == 1)
            {
                $childarray = array();
                $childarray = $xt->getAllChildId($onecat->id(),"");
                if (count($childarray))
		{
		    $category['subtitle'] = _MAG_SUBSECTION;
		    foreach ($childarray as $titlearray )
		    {
		       $onechild = new MagCategory($titlearray);
		       if ($onechild->status())
		       {
		           $category['subtitle'] .="[<a href='artindex.php?category=".$onechild->id()."'><b>".$onechild->title()."</b></a>]";
		       }
		    }
		}
            }
*/
//-------------------------------------------------------------------------------------------------
        $xoopsTpl->append('categories', $category);
        }
        $xoopsTpl->assign('lang_sponser', _MAG_SPONSER);
        $xoopsTpl->assign('lang_author', _MAG_AUTHER);
        $xoopsTpl->assign('lang_updated', _MAG_LASTUPDATE);
        $xoopsTpl->assign('lang_articles', _MAG_ARTICLES);
        $xoopsTpl->assign('lang_category', _MAG_CATEGORY);
        $xoopsTpl->assign('lang_readmore', _MAG_READMORE);
        $xoopsTpl->assign('lang_listarticles', _MAG_LISTARTICLES);
        $xoopsTpl->assign('lang_listfeatured', _MAG_FEATUREDARTS);
        $xoopsTpl->assign('lang_listsections', _MAG_SECTIONLISTIN);
        $xoopsTpl->assign('lang_qkmenu', _MAG_QKMENU);
        $xoopsTpl->assign('catarray', $catarray);
        break;
}
$xoopsTpl->assign( 'xoops_pagetitle', $catarray['indexheading'] );

/* Select left & right blocks display or no - RB 2005-05-04 */
if ( isset($index->isblocks) && $index->isblocks == 1 ){
$xoopsTpl->assign('xoops_showrblock', 0);
$xoopsTpl->assign('xoops_lblocks', 0);
}elseif ( isset($index->isblocks) && $index->isblocks == 2 ) {
$xoopsTpl->assign('xoops_showrblock', 0);
}elseif ( isset($index->isblocks) && $index->isblocks == 3 ) {
$xoopsTpl->assign('xoops_lblocks', 0);
}

include_once 'footer.php';

?>

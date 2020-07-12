<?php
// $Id: related.php,v 1.6 2004/08/13 12:38:49 RB Exp $
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

/**
 * Get forum details
 */
switch ($xoopsModuleConfig['selectforum'])
{
  case "1":
    $forum = "newbb";
    $forum_path_prefix = "/modules/newbb/viewforum.php?forum=";
    break;
 case "2":
    $forum = "ipboard";
    $forum_path_prefix = "/modules/ipboard/index.php?showforum=";
    break;
 case "3":
    $forum = "pbboard";
    $forum_path_prefix = "/modules/pbboard/viewforum.php?f=";
    break;
}
$xoopsforumModule = &$modhandler->getByDirname( $forum );
if ( is_object( $xoopsforumModule ) && $xoopsforumModule->getVar( 'isactive' ) )
{
  $articletag['isforumid'] = ( $article->isforumid() > 0 ) ? $article->isforumid() : 0;
  $articletag['forum_path'] = $forum_path_prefix . "{$articletag['isforumid']}";
}

/**
 * Get form details
 */
switch ($xoopsModuleConfig['selectform'])
{
  case "1":
    $form = "liaise";
    $form_path_prefix = "/modules/liaise/?form_id=";
    break;
 case "2":
    $form = "eguide";
    $form_path_prefix = "/modules/eguide/event.php?eid=";
    break;
 case "3":
    $form = "okshop";
    $form_path_prefix = "/modules/okshop/?okshop=main&item=";
    break;
}

$xoopsformModule = &$modhandler->getByDirname( $form );
if ( is_object( $xoopsformModule ) && $xoopsformModule->getVar( 'isactive' ) )
{
  $articletag['isformid'] = ( $article->isformid() > 0 ) ? $article->isformid() : 0;
  $articletag['form_path'] = $form_path_prefix . "{$articletag['isformid']}";
}

/**
 * Get store details
 */
switch ($xoopsModuleConfig['selectstore'])
{
  case "1":
    $store = "liaise";
    $store_path_prefix = "/modules/liaise/?form_id=";
    break;
 case "2":
    $store = "eguide";
    $store_path_prefix = "/modules/eguide/event.php?eid=";
    break;
 case "3":
    $store = "okshop";
    $store_path_prefix = "/modules/okshop/?okshop=main&item=";
    break;
}

$xoopsstoreModule = &$modhandler->getByDirname( $store );
if ( is_object( $xoopsstoreModule ) && $xoopsformModule->getVar( 'isactive' ) )
{
  $articletag['isstoreid'] = ( $article->isstoreid() > 0 ) ? $article->isstoreid() : 0;
  $articletag['store_path'] = $store_path_prefix . "{$articletag['isstoreid']}";
}

/**
 * Get sign-up details
 */
switch ($xoopsModuleConfig['selectsign'])
{
  case "1":
    $sign = "liaise";
    $sign_path_prefix = "/modules/liaise/?form_id=";
    break;
 case "2":
    $sign = "eguide";
    $sign_path_prefix = "/modules/eguide/event.php?eid=";
    break;
 case "3":
    $sign = "okshop";
    $sign_path_prefix = "/modules/okshop/?okshop=main&item=";
    break;
}

$xoopssignModule = &$modhandler->getByDirname( $sign );
if ( is_object( $xoopssignModule ) && $xoopsformModule->getVar( 'isactive' ) )
{
  $articletag['issignid'] = ( $article->issignid() > 0 ) ? $article->issignid() : 0;
  $articletag['sign_path'] = $sign_path_prefix . "{$articletag['issignid']}";
}

?>

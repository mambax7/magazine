<?php
// $Id: menu.php,v 1.7 2005/02/07 01:25:24 phppp Exp $
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

$adminmenu[0]['title'] = _MI_MAG_ADMENU1;
$adminmenu[0]['link'] = "admin/allarticles.php";
$adminmenu[1]['title'] = _MI_MAG_ADMENU2;
$adminmenu[1]['link'] = "admin/index.php?op=newarticle";
$adminmenu[2]['title'] = _MI_MAG_ADMENU3;
$adminmenu[2]['link'] = "admin/indexpage.php";
$adminmenu[3]['title'] = _MI_MAG_ADMENU4;
$adminmenu[3]['link'] = "admin/category.php";
$adminmenu[4]['title'] = _MI_MAG_ADMENU5;
$adminmenu[4]['link'] = "admin/reorder.php";
$adminmenu[5]['title'] = _MI_MAG_ADMENU6;
$adminmenu[5]['link'] = "admin/filesshow.php";
$adminmenu[6]['title'] = _MI_MAG_ADMENU7;
$adminmenu[6]['link'] = "admin/relatedarts.php";
$adminmenu[7]['title'] = _MI_MAG_ADMENU8;
$adminmenu[7]['link'] = "admin/relatedlinks.php";
$adminmenu[8]['title'] = _MI_MAG_ADMENU9;
$adminmenu[8]['link'] = "admin/allarticles.php?action=submitted";
$adminmenu[9]['title'] = _MI_MAG_ADMENU10;
$adminmenu[9]['link'] = "admin/brokendown.php?op=listBrokenDownloads";

?>

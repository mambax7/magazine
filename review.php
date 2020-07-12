<?php
// $Id: review.php,v 1.8 2005/06/09 11:44:49 RB Exp $
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

    $review['title1'] = $myts->displayTarea($review_arr['title1']);
    $review['desc1'] = $myts->displayTarea($review_arr['desc1']);
    $review['title2'] = $myts->displayTarea($review_arr['title2']);
    $review['desc2'] = $myts->displayTarea($review_arr['desc2']);
    $review['title3'] = $myts->displayTarea($review_arr['title3']);
    $review['desc3'] = $myts->displayTarea($review_arr['desc3']);
    $review['title4'] = $myts->displayTarea($review_arr['title4']);
    $review['desc4'] = $myts->displayTarea($review_arr['desc4']);
    $review['title5'] = $myts->displayTarea($review_arr['title5']);
    $review['desc5'] = $myts->displayTarea($review_arr['desc5']);
    $review['title6'] = $myts->displayTarea($review_arr['title6']);
    $review['desc6'] = $myts->displayTarea($review_arr['desc6']);
    $review['display'] = intval($review_arr['display']);
    $xoopsTpl->assign('reviews', $review);

?>

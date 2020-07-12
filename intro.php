<?php
// $Id: intro.php,v 1.8 2005/06/09 11:44:49 RB Exp $
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
require_once XOOPS_ROOT_PATH.'/class/template.php';
$xoopsTpl = new XoopsTpl();
$myts =& MyTextSanitizer::getInstance();
$article_id = isset( $_GET['id'] ) ? intval( $_GET['id'] ) : 0;

$result = $xoopsDB->query('SELECT intro_mod, intro_no, intro_title, intro_text FROM '.$xoopsDB->prefix( MAG_INTRO ).' WHERE intro_id='.$article_id);
while (list($intro_mod, $intro_no, $intro_title, $intro_text) = $xoopsDB->fetchRow($result))
{
  if ($intro_mod == 0) {
      $xoopsTpl->assign('lang_title', _MAG_INTRO_LYRIC );
      $xoopsTpl->assign('img_title', 'lyric.gif');
  } else {
      $xoopsTpl->assign('lang_title', _MAG_INTRO_BOOK );
      $xoopsTpl->assign('img_title', 'book.gif');
  }
      $xoopsTpl->assign('intro_no', $intro_no);
      $xoopsTpl->assign('intro_title', $myts->displayTarea($intro_title));
      $xoopsTpl->assign('intro_text', $myts->displayTarea($intro_text));
      $mailto = "mailto:".$xoopsConfig['adminmail']."";
      $xoopsTpl->assign('mail_link', $mailto);
      //$xoopsTpl->assign('css', XOOPS_URL."/themes/".$xoopsConfig['theme_set']."/style.css");
      //$xoopsTpl->assign('copyright', $xoopsConfig['sitename']);
      $xoopsTpl->assign('copyright',  _MAG_COPYRIGHT . " &copy; " . date( "Y" ) . " " . $xoopsConfig['sitename'] );
}

$xoopsTpl->display('db:mag_intro.html');
?>

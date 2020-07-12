<?php
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

include_once XOOPS_ROOT_PATH."/class/xoopslists.php";
include XOOPS_ROOT_PATH."/class/xoopsformloader.php";

Global $xoopsModuleConfig;

$cform = new XoopsThemeForm(_CM_POSTCOMMENT, "commentform", "postcomment.php");
if (!preg_match("/^re:/i", $subject)) {
	$subject = "Re: ".substr($subject,0,56);
}
$cform->addElement(new XoopsFormText(_CM_TITLE, 'subject', 50, 255, $subject), true);
$icons_radio = new XoopsFormRadio(_MESSAGEICON, 'icon', $icon);
$subject_icons = XoopsLists::getSubjectsList();
foreach ($subject_icons as $iconfile) {
	$icons_radio->addOption($iconfile, '<img src="'.XOOPS_URL.'/images/subject/'.$iconfile.'" alt="" />');
}
$cform->addElement($icons_radio);
$cform->addElement(new XoopsFormDhtmlTextArea(_CM_MESSAGE, 'message', $message, 10, 50), true);
$option_tray = new XoopsFormElementTray(_OPTIONS,'<br />');
if ($xoopsUser) {
	if ($xoopsModuleConfig['anoncommpost'] == 1) {
		$noname_checkbox = new XoopsFormCheckBox('', 'noname', $noname);
		$noname_checkbox->addOption(1, _POSTANON);
		$option_tray->addElement($noname_checkbox);
	}
	//if ($xoopsUser->isAdmin($xoopsModule->getVar('mid'))) {
		$nohtml_checkbox = new XoopsFormCheckBox('', 'nohtml', $nohtml);
		$nohtml_checkbox->addOption(1, _DISABLEHTML);
		$option_tray->addElement($nohtml_checkbox);
	//}
}
$smiley_checkbox = new XoopsFormCheckBox('', 'nosmiley', $nosmiley);
$smiley_checkbox->addOption(1, _DISABLESMILEY);
$option_tray->addElement($smiley_checkbox);

$cform->addElement($option_tray);
$cform->addElement(new XoopsFormHidden('pid', intval($pid)));
$cform->addElement(new XoopsFormHidden('comment_id', intval($comment_id)));
$cform->addElement(new XoopsFormHidden('item_id', intval($item_id)));
$cform->addElement(new XoopsFormHidden('order', intval($order)));
$button_tray = new XoopsFormElementTray('' ,'&nbsp;');
$button_tray->addElement(new XoopsFormButton('', 'op', 'preview', 'submit'));
$button_tray->addElement(new XoopsFormButton('', 'op', 'post', 'submit'));
$cform->addElement($button_tray);
$cform->display();
?>

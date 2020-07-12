<?php
// $Id: storyform.inc.php,v 1.7 2005/02/07 01:25:26 phppp Exp $
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
include_once XOOPS_ROOT_PATH . "/class/xoopsformloader.php";
include_once MAG_ROOT_PATH . "/class/lists.php";

/*$editing = ( !$this->articleid ) ? _MAG_CREATEARTICLE : _MAG_MODIFYARTICLE;
$title = ( $this->title ) ? $this->title : _MAG_EDITNEWARTTITLE;
$create = ( $this->articleid ) ? _MAG_MOVETO : _MAG_IN;*/
//--------------------------------------------------------------------------------------------------------------------
$allow_wysiwygeditor = false;

if (is_object($xoopsUser))
{
	$groupsid = $xoopsUser->getGroups();
	if ( array_intersect( $xoopsModuleConfig['groupswysiwygeditor'], $groups ) )
	{
	   $allow_wysiwygeditor = true;
	} 
}
if ( mag_checkBrowser() == true && $allow_wysiwygeditor == 1 && $has_access == true && file_exists(XOOPS_ROOT_PATH."/class/xoopseditor/xoopseditor.php"))
{
	include_once(XOOPS_ROOT_PATH."/class/xoopseditor/xoopseditor.php");
	$editor_name = !empty($_GET['editor_name'])?$_GET['editor_name']:"";
	$editorhandler = new XoopsEditorHandler();
		/*
		 * Select editor
		 */
		$editors = & $editorhandler->getList();
		$selecteditor = new XoopsThemeForm( _MAG_SELECTEDITOR, 'form_selecteditor', xoops_getenv('PHP_SELF'), 'get');
		$option_select = new XoopsFormSelect('', 'editor_name', $editor_name);
		$option_select->setExtra('onchange="if(this.options[this.selectedIndex].value.length > 0 ){ forms[\'form_selecteditor\'].submit() }"');
		$option_select->addOptionArray($editors);
		$button1_tray = new XoopsFormElementTray( _MAG_SELECTEDITOR);
		$button1_tray->addElement(new XoopsFormLabel($option_select->render()));
		$button1_tray->addElement(new XoopsFormButton('', '', _SUBMIT, "submit"));
		$selecteditor->addElement($button1_tray);
		
		if ( isset( $_POST ) )
		{
			foreach ( $_POST as $k => $v )
			{
					$selecteditor->addElement(new XoopsFormHidden($k, $v));
			} 
		}
	        if ( isset($_GET['op']))
		{
					$selecteditor->addElement(new XoopsFormHidden('op', $_GET['op']));
		}
	        if ( isset($_GET['articleid']))
		{
					$selecteditor->addElement(new XoopsFormHidden('articleid', $_GET['articleid']));
		}

		//$selecteditor->display();
		return $selecteditor->render();
		unset($selecteditor);

}
//--------------------------------------------------------------------------------------------------------------------------------------

?>

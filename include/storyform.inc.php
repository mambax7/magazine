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
global $xoopsConfig;
include_once XOOPS_ROOT_PATH . "/class/xoopsformloader.php";
include_once MAG_ROOT_PATH . "/class/lists.php";
include_once MAG_ROOT_PATH . "/language/".$xoopsConfig['language']."/admin.php";

$editing = ( !$this->articleid ) ? _MAG_CREATEARTICLE : _MAG_MODIFYARTICLE;
$title = ( $this->title ) ? $this->title : _MAG_EDITNEWARTTITLE;
$create = ( $this->articleid ) ? _MAG_MOVETO : _MAG_IN;
//--------------------------------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------------------------------------------------
$sform = new XoopsThemeForm( $editing . ": " . $title , "storyform", xoops_getenv( 'PHP_SELF' ) );
$sform->setExtra( 'enctype="multipart/form-data"' );

$movesectiontext = ( $this->articleid ) ? _MAG_EDITSECTION2 : _MAG_EDITSECTION;
$catid = ( $this->categoryid ) ? $this->categoryid : 0;
$mytree = new XoopsTree( $xoopsDB->prefix( MAG_CATEGORY_DB ), "id", "pid" );
ob_start();
$mytree->makeMySelBox( "title", "title", $catid, 0 );
$sform->addElement( new XoopsFormLabel( $movesectiontext, ob_get_contents() ) );
ob_end_clean();;

/**
 * title & subtitle
 */
$sform->addElement( new XoopsFormText( _MAG_EDITARTICLETITLE, "title", 55, 255, $this->title( "E" ) ), true );
$sform->addElement( new XoopsFormText( _MAG_EDITSUBTITLE, "subtitle", 55, 255, $this->subtitle( "E" ) ), false );

/**
 * Group permissions for document
 */
$groupaccess_tray = new XoopsFormElementTray( _AM_MAG_EDITGROUPPROMPT, '' );
$groups = new XoopsFormSelectGroup( '', "groupid", true, $groups, 3, true );
$groupaccess_tray->addElement( $groups );
$catgroup_checkbox = new XoopsFormCheckBox( '', "catgroupid", 0 );
$catgroup_checkbox->addOption( 0, _AM_MAG_USECATEGORYACCESS );
$groupaccess_tray->addElement( $catgroup_checkbox );
$sform->addElement( $groupaccess_tray );

/**
 * Template & Blocksselect
 */
$template_tray = new XoopsFormElementTray( _AM_MAG_ARTTEMPLATE, '' );
$template_array = &MagLists::getListTypeAsArray( MAG_TEMPLATE_PATH, $type = "html" );
$template_select = new XoopsFormSelect( '', 'template', $this->template );
$template_select->addOptionArray( $template_array );
$template_tray->addElement( $template_select );

$blocks_select = new XoopsFormSelect( '', "isblocks", $this->isblocks );
$blocks_select->addOptionArray(array("0" => _AM_MAG_SHOWALLBLOCKS, "1" => _AM_MAG_NOBLOCKS, "2" => _AM_MAG_SHOWLEFTBLOCKS, "3" => _AM_MAG_SHOWRIGHTBLOCKS));
$template_tray->addElement( $blocks_select );
$sform->addElement($template_tray);

/*
$linked_url_tray = new XoopsFormElementTray( _MAG_EDITLINKURL, "<br />" );
$linked_url = new XoopsFormText( _MAG_EDITLINKURLADD, "url", 50, 255, $this->url( "E" ) );
$linked_url_tray->addElement( $linked_url );
$linked_urlname = new XoopsFormText( _MAG_EDITLINKURLNAME, "urlname", 50, 255, $this->urlname( "E" ) );
$linked_url_tray->addElement( $linked_urlname );
$sform->addElement( $linked_url_tray );
*/
if ( mag_checkBrowser() == true && $allow_wysiwygeditor == 1 && $has_access == true && file_exists(XOOPS_ROOT_PATH."/class/xoopseditor/xoopseditor.php"))
{
//---------------------------------------------------------------------------------------------------------------dqflyer fixed
	if (!defined('XOOPS_ROOT_PATH')) {
		exit();
	}
		/*
		 * Edit form with selected editor
		 */
		$options['caption'] =  _MAG_EDITMAINTEXT;
		$options['name'] ='maintext';
		//$options['value'] = empty($_POST['maintext'])?"":$_POST['maintext'];
                $options['value'] =empty($_POST['maintext'])?$this->maintext( "N" ):$_POST['maintext'];
		$options['rows'] = 25;
		$options['cols'] = 60;
		$options['width'] = '100%';
		$options['height'] = '400px';
		$editor = & $editorhandler->get($editor_name, $options, "textarea");
		if($editor){
			$editorhandler->setConfig(
				$editor,
				array(
					"filepath" => XOOPS_UPLOAD_PATH.'/'.$xoopsModule->getVar("dirname"),
					"upload" => true,
					"extensions" => array("txt", "jpg", "zip")
				));
		}
		$sform->addElement($editor, true);
//----------------------------------------------------------------------------------------------------------------------------
/*    include_once XOOPS_ROOT_PATH . "/modules/spaw/spaw_control.class.php";

    $sw = new SPAW_Wysiwyg( 'maintext', $this->maintext( "N" ), $xoopsConfig['language'], 'full', 'default', '50%', '400px' );
    $sw->show();
    $sform->addElement( new XoopsFormLabel( _MAG_EDITMAINTEXT , ob_get_contents(), 1 ) );
    ob_end_clean();
*/
} else {
    $sform->addElement( new XoopsFormDhtmlTextArea( _MAG_EDITMAINTEXT, "maintext", $this->maintext( "N" ), 15, 55 ), false );
}
$sform->insertBreak( _AM_MAG_EXTRADOC_TEXT, "foot" );
$sform->addElement( new XoopsFormTextArea( _MAG_EDITSUMMARY, "summary", $this->summary( "E" ), 5, 55 ) );
$other_options_tray = new XoopsFormElementTray( _MAG_OTHEROPTIONS, '<br />' );
/**
 * if (is_object($xoopsUser) && $xoopsUser->isAdmin($xoopsModule->getVar('mid')))
 * {
 * $html_checkbox = new XoopsFormCheckBox('', "nohtml", $this->nohtml);
 * $html_checkbox->addOption(1, _MAG_EDITDISHTML);
 * $other_options_tray->addElement($html_checkbox);
 * }
 */
$smiley_checkbox = new XoopsFormCheckBox( '', "nosmiley", $this->nosmiley );
$smiley_checkbox->addOption( 1, _MAG_EDITDISAMILEY );
$other_options_tray->addElement( $smiley_checkbox );

$xcodes_checkbox = new XoopsFormCheckBox( '', 'noxcodes', $this->noxcodes );
$xcodes_checkbox->addOption( 1, _MAG_EDITDISCODES );
$other_options_tray->addElement( $xcodes_checkbox );

$notify_checkbox = new XoopsFormCheckBox( '', "notifypub", $this->notifypub );
$notify_checkbox->addOption( 1, _MAG_NOTIFYPUBLISH );
$other_options_tray->addElement( $notify_checkbox );

$breaks_checkbox = new XoopsFormCheckBox( '', 'nobreaks', $this->nobreaks );
$breaks_checkbox->addOption( 1, _AM_MAG_DISABLEBREAK );
$other_options_tray->addElement( $breaks_checkbox );

$sform->addElement( $other_options_tray );

$break_num = ( $allow_wysiwygeditor ) ? 0 : 1;
$sform->addElement( new XoopsFormHidden( "nobreaks", $break_num ) );
$sform->addElement( new XoopsFormHidden( "nohtml", $break_num ) );

/*
ob_start();
MagLists::getforum( $xoopsModuleConfig['selectforum'], $this->isforumid());
//mag_getforum( $this->isforumid() );
$sform->addElement( new XoopsFormLabel( _MAG_EDITDISCUSSINFORUM, ob_get_contents() ) );
ob_end_clean();
*/

if ( $submit_files_access == true )
{
    $sform->insertBreak( _MAG_FILES_CREATE, "head" );
    $sform->addElement( new XoopsFormFile( _MAG_FILES_UPLOAD, 'uploadfile', '' ), false );
    $sform->addElement( new XoopsFormText( _MAG_FILES_TITLE, "fileshowname", 55, 255, '' ), false );
    $sform->addElement( new XoopsFormTextArea( _MAG_FILES_DESCRIPT, 'textfiledescript', '', 3, 55 ), false );
    $sform->addElement( new XoopsFormText( _MAG_FILES_SEARCHTEXT, 'textfilesearch', 55, 255, '' ), false ); //RB 格式變更
    // echo "<br />articleid:".$this->articleid.":uid:$uid";
    $file = false;
    $files = 0;
    if ( $this->articleid )
    {
        $files = MagFiles::getAllfiles( 0, 0, $this->articleid, $uid );
    } 
    // $filecount = count($files);
    if ( $files )
    {
        $upl_tray = new XoopsFormElementTray( _MAG_FILES_ATTACHED, '<br />' );
        $upl_checkbox = new XoopsFormCheckBox( '', 'delupload[]' );
        foreach( $files as $file )
        {
            $link = $file->getLinkedName( XOOPS_URL . "/modules/" . $xoopsModule->dirname() );
            $upl_checkbox->addOption( $file->fileid, _MAG_FILEID . " " . $file->fileid . " " . $link . "<br />" );
        } 
        $upl_tray->addElement( $upl_checkbox, false );
        $dellabel = new XoopsFormLabel( _MAG_FILES_DELETE_SELECTED, '' );
        $upl_tray->addElement( $dellabel, false );
        $sform->addElement( $upl_tray );
    } 
} 
$sform->addElement( new XoopsFormHidden( "is_edit", $is_edit ) );
$sform->addElement( new XoopsFormHidden( "submit_files_access", $submit_files_access ) );

if ( $this->articleid )
    $sform->addElement( new XoopsFormHidden( "articleid", $this->articleid ) );
//if ( intval( $checkin_id ) )
//    $sform->addElement( new XoopsFormHidden( "checkin_id", intval( $checkin_id ) ) );

$button_tray = new XoopsFormElementTray( "", "" );
$hidden = new XoopsFormHidden( "op", "post" );
$button_tray->addElement( $hidden );

$saveit = ( !$this->articleid ) ? _MAG_SUBMIT : _MAG_MODIFY;
$butt_save = new XoopsFormButton( "", "", $saveit, "submit" );
$butt_save->setExtra( "onclick='this.form.elements.op.value=\"post\"'" );
$button_tray->addElement( $butt_save );

if ( $this->articleid )
{
    $butt_del = new XoopsFormButton( "", "", _MAG_DELETE, "submit" );
    $butt_del->setExtra( "onclick='this.form.elements.op.value=\"delete\"'" );
    $button_tray->addElement( $butt_del );
} 
$sform->addElement( $button_tray );
//$sform->display();
return $sform->render();
unset( $hidden );

?>

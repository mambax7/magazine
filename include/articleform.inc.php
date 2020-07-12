<?php
// $Id: articleform.inc.php,v 1.3 2005/02/07 01:25:26 phppp Exp $
// ------------------------------------------------------------------------ //
// WF-section for XOOPS                               //
// Copyright (c) 2005 WF-section Team                        //
// <http://www.wf-projects.com/>                          //
// ------------------------------------------------------------------------ //
// This program is free software; you can redistribute it and/or modify     //
// it under the terms of the GNU General Public License as published by     //
// the Free Software Foundation; either version 2 of the License, or        //
// (at your option) any later version.                                      //
// //
// You may not change or alter any portion of this comment or credits       //
// of supporting developers from this source code or any supporting         //
// source code which is considered copyrighted (c) material of the          //
// original comment or credit authors.                                      //
// //
// This program is distributed in the hope that it will be useful,          //
// but WITHOUT ANY WARRANTY; without even the implied warranty of           //
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
// GNU General Public License for more details.                             //
// //
// You should have received a copy of the GNU General Public License        //
// along with this program; if not, write to the Free Software              //
// Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
// ------------------------------------------------------------------------ //
// Author: RB                                                                //
// URL: http://singchi.no-ip.com/hack                                        //
// Project: Magazine Project                                                 //
// ------------------------------------------------------------------------- //
include_once MAG_ROOT_PATH . '/class/lists.php';
include_once XOOPS_ROOT_PATH . '/class/xoopslists.php';
include_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
include_once XOOPS_ROOT_PATH . '/class/pagenav.php';

$xt = new MagCategory();

global $_SERVER, $_POST, $xoopsConfig, $xoopsModuleConfig, $magPathConfig;

$doc_type = 2;
$autosummary = 0;
$editing = ( !$this->articleid ) ? _AM_MAG_CREATEARTICLE : _AM_MAG_MODIFYARTICLE;
$create = ( $this->articleid ) ? _AM_MAG_MOVETO : _AM_MAG_IN;
$groups = ( $this->articleid ) ? explode( " ", $this->groupid ) : true;
$userstart = isset( $_GET['userstart'] ) ? intval( $_GET['userstart'] ) : 0;
//--------------------------------------------------------------------------------------------------------------------
$allow_wysiwygeditor = false;
$groupsid = $xoopsUser->getGroups();
if ( array_intersect( $xoopsModuleConfig['groupswysiwygeditor'], $groupsid) )
{
    $allow_wysiwygeditor = true;
} 
if ( mag_checkBrowser() == true && $allow_wysiwygeditor && file_exists(XOOPS_ROOT_PATH."/class/xoopseditor/xoopseditor.php") )
{
	include_once(XOOPS_ROOT_PATH."/class/xoopseditor/xoopseditor.php");
	$editor_name = !empty($_GET['editor_name'])?$_GET['editor_name']:"";
	$editorhandler = new XoopsEditorHandler();
		/*
		 * Select editor
		 */
		$editors = & $editorhandler->getList();
		$selecteditor = new XoopsThemeForm(_AM_MAG_SELECTEDITOR, 'form_selecteditor', xoops_getenv('PHP_SELF'), 'get');
		$option_select = new XoopsFormSelect('', 'editor_name', $editor_name);
		$option_select->setExtra('onchange="if(this.options[this.selectedIndex].value.length > 0 ){ forms[\'form_selecteditor\'].submit() }"');
		$option_select->addOptionArray($editors);
		$button1_tray = new XoopsFormElementTray(_AM_MAG_SELECTEDITOR);
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
		$selecteditor->display();
		unset($selecteditor);

}
//--------------------------------------------------------------------------------------------------------------------------------------
$sform = new XoopsThemeForm( $editing . $this->title , "op", "index.php" );
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
/**
 * Section pulldown menu
 */
$mytree = new XoopsTree( $xoopsDB->prefix( MAG_CATEGORY_DB ), "id", "pid" );
$movesectiontext = ( $this->articleid ) ? _AM_MAG_EDITSECTION2 : _AM_MAG_EDITSECTION;
ob_start();
$mytree->makeMySelBox( "title", "title", $this->categoryid, 0 );
$sform->addElement( new XoopsFormLabel( $movesectiontext, ob_get_contents() ) );
ob_end_clean();
/**
 * Document title & subtitle
 */
$sform->addElement( new XoopsFormText( _AM_MAG_EDITARTICLETITLE, "title", 50, 255, $this->title( "E" ) ), true );
$sform->addElement( new XoopsFormText( _AM_MAG_EDITSUBTITLE, "subtitle", 50, 255, $this->subtitle( "E" ) ), false );
/**
 * Document weight
 */
$weight_text = ( $xoopsModuleConfig['autoweight'] ) ? _AM_MAG_GL_WEIGHTON : _AM_MAG_GL_WEIGHTOFF;
$sform->addElement( new XoopsFormText( _AM_MAG_EDITWEIGHT . $weight_text, "weight", 5, 5, $this->weight ), false );
// display user array:  Note User list over 400 will use nav for other user selection
$user_id = ( $this->uid ) ? $this->uid : $xoopsUser->uid();

$member_handler = &xoops_gethandler( 'member' );
$usercount = $member_handler->getUserCount();
$criteria = new CriteriaCompo();
$criteria->setSort( 'uname' );
$criteria->setOrder( 'ASC' );
if ( $usercount < $xoopsModuleConfig["user_amount"] )
{
    $criteria->setStart( 0 );

    $user_select = new XoopsFormSelect( _AM_MAG_EDITCAUTH, 'changeuser', $user_id );
    $user_select->addOption( 0, $xoopsConfig['anonymous'] );
    $user_select->addOptionArray( $member_handler->getUserList( $criteria ) );
    $sform->addElement( $user_select ); 

    // $sform->addElement( new XoopsFormSelect( _AM_MAG_EDITCAUTH, "changeuser", true, $user_id, 1, false ), false );
    $sform->addElement( new XoopsFormHidden( "userset", 1 ) );

} 
else
{
    $criteria->setStart( $userstart );
    $criteria->setLimit( 100 );
    
    $user_name = isset( $user_id ) ? MAG_getLinkedUnameFromId( $user_id, $xoopsModuleConfig['displayname'], 1 ) : _AM_MAG_NODETAILSRECORDED;
    $user_select = new XoopsFormSelect( '', "changeuser", $user_id );
    $user_select->addOption( 0, $xoopsConfig['anonymous'] );
    $nav = ( $this->articleid ) 
		? new XoopsPageNav( $usercount, 100, $userstart, "userstart", "op=edit&articleid=" . $this->articleid . "&users" )
		: new XoopsPageNav( $usercount, 100, $userstart, "userstart" );

    $user_select->addOptionArray( $member_handler->getUserList( $criteria ) );
    $user_select_tray = new XoopsFormElementTray( " Orginal Author: $user_name <br /><br /> New Author:" );
    $user_select_tray->addElement( $user_select );

    if ( $usercount > 100 )
    {
        $user_select_nav = new XoopsFormLabel( 'Nav:', $nav->renderNav( 3 ) );
        $user_select_tray->addElement( $user_select_nav );
    } 

    $user_tray = new XoopsFormElementTray( _AM_MAG_EDITCAUTH2, '<br /><br />' );
    $user_tray->addElement( $user_select_tray );
    $user_checkbox = new XoopsFormCheckBox( ' ', 'userset', 0 );
    $user_checkbox->addOption( 1, _AM_MAG_ADDNEWAUTH );
    $user_tray->addElement( $user_checkbox );
    $sform->addElement( $user_tray );
} 

$image_option_tray = new XoopsFormElementTray( _AM_MAG_SELECT_IMG, '<br />' );
$art_image_array = @MagLists::getListTypeAsArray( MAG_ARTICLEIMG_PATH, $type = "images" );
$indeximage_select = new XoopsFormSelect( '', 'artimage', $this->articleimg );
$indeximage_select->addOptionArray( $art_image_array );
$indeximage_select->setExtra( "onchange='showImgSelected(\"image\", \"artimage\", \"" . $magPathConfig['graphicspath'] . "\", \"\", \"" . XOOPS_URL . "\")'" );
$indeximage_tray = new XoopsFormElementTray( '', '&nbsp;' );
$indeximage_tray->addElement( $indeximage_select );
if ( !empty( $this->articleimg ) )
{
    $indeximage_tray->addElement( new XoopsFormLabel( '', "<div style='padding: 8px;'><img src='" . XOOPS_URL . "/" . $magPathConfig['graphicspath'] . "/" . $this->articleimg . "' name='image' id='image' alt='' /></div>" ) );
} 
else
{
    $indeximage_tray->addElement( new XoopsFormLabel( '', "<div style='padding: 8px;'><img src='" . XOOPS_URL . "/uploads/blank.gif' name='image' id='image' alt='' /></div>" ) );
} 
$image_option_tray->addElement( $indeximage_tray );
$sform->addElement( $image_option_tray );
/**
 * Show different Document entry types
 */
$sform->insertBreak( _AM_MAG_DOCUMENTTYPE, "odd" );
$sform->insertBreak( _AM_MAG_DOCUMENTTYPES, "odd" );
/**
 * Document URL LINKS:  Uses an External Link for document listings. Does not display full document for this
 */
$linked_url_tray = new XoopsFormElementTray( _AM_MAG_EDITLINKURL, "<br />" );
$linked_url = new XoopsFormText( _AM_MAG_EDITLINKURLADD, "url", 50, 255, $this->url( "E" ) );
$linked_url_tray->addElement( $linked_url );
$linked_urlname = new XoopsFormText( _AM_MAG_EDITLINKURLNAME, "urlname", 50, 255, $this->urlname( "E" ) );
$linked_url_tray->addElement( $linked_urlname );
$sform->addElement( $linked_url_tray );
$sform->insertBreak( "", "odd" );
/**
 * Section pulldown menu
 */
$html_tray = new XoopsFormElementTray( _AM_MAG_EDITHTMLFILE, '<br />' );
$html_array = &MagLists::getListTypeAsArray( MAG_HTML_PATH, $type = "html" );
$html_select = new XoopsFormSelect( '', 'htmlpage', $this->htmlpage );
$html_select->addOptionArray( $html_array );
$html_tray->addElement( $html_select );
$doctitle_checkbox = new XoopsFormCheckBox( '', 'doctitle', 0 );
$doctitle_checkbox->addOption( 1, _AM_MAG_DOCTITLE );
$html_tray->addElement( $doctitle_checkbox );
$htmldb_checkbox = new XoopsFormCheckBox( '', 'htmldb', 0 );
$htmldb_checkbox->addOption( 1, _AM_MAG_DOHTMLDB );
$html_tray->addElement( $htmldb_checkbox );
$sform->addElement( $html_tray );
$sform->insertBreak( '', 'odd' );
/**
 * Section pulldown menu
 */
$words_to_count = $maintext = $this->maintext;
$pattern = "/[^(\w|\d|\'|\"|\.|\!|\?|;|,|\\|\/|\-\-|:|\&|@)]+/";
$words_to_count = preg_replace ( $pattern, " ", $words_to_count );
$words_to_count = trim( $words_to_count );
$total_words = ( !empty( $words_to_count ) ) ? count( explode( " ", $words_to_count ) ) : 0;
//-------------------------------------------------------------------------------------------------dqflyer fixed
if ( mag_checkBrowser() == true && $allow_wysiwygeditor && file_exists(XOOPS_ROOT_PATH."/class/xoopseditor/xoopseditor.php")){
	if (!defined('XOOPS_ROOT_PATH')) {
		exit();
	}
		/*
		 * Edit form with selected editor
		 */
		$options['caption'] =  _AM_MAG_EDITMAINTEXT;
		$options['name'] ='maintext';
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
//----------------------------------------------------------------------------------------------------------------
} else {
    $sform->addElement( new XoopsFormDhtmlTextArea( sprintf( _AM_MAG_EDITMAINTEXT, $total_words ), "maintext", $this->maintext( "N" ), 15, 60 ), false );
}
$sform->insertBreak( _AM_MAG_EXTRADOC_TEXT, "odd" );
/**
 * Document Text Formatting options
 */
$options_tray = new XoopsFormElementTray( _AM_MAG_TEXTOPTIONS, '<br />' );
$cleanhtml_checkbox = new XoopsFormCheckBox( '', 'cleanhtml', 0 );
$cleanhtml_checkbox->addOption( 1, _AM_MAG_CLEANHTML );
$options_tray->addElement( $cleanhtml_checkbox );

$striphtml_checkbox = new XoopsFormCheckBox( '', 'striptags', 0 );
$striphtml_checkbox->addOption( 1, _AM_MAG_STRIPHTML );
$options_tray->addElement( $striphtml_checkbox );

$smiley_checkbox = new XoopsFormCheckBox( '', 'nosmiley', $this->nosmiley );
$smiley_checkbox->addOption( 1, _AM_MAG_DISABLESMILEY );
$options_tray->addElement( $smiley_checkbox );

$xcodes_checkbox = new XoopsFormCheckBox( '', 'noxcodes', $this->noxcodes );
$xcodes_checkbox->addOption( 1, _AM_MAG_DISABLEXCODE );
$options_tray->addElement( $xcodes_checkbox );

$html_checkbox = new XoopsFormCheckBox( '', 'nohtml', $this->nohtml );
$html_checkbox->addOption( 1, _AM_MAG_DISABLEHTML );
$options_tray->addElement( $html_checkbox );

$breaks_checkbox = new XoopsFormCheckBox( '', 'nobreaks', $this->nobreaks );
$breaks_checkbox->addOption( 1, _AM_MAG_DISABLEBREAK );
$options_tray->addElement( $breaks_checkbox );

$sform->addElement( $options_tray );
$sform->insertBreak( "<b>" . _AM_MAG_MENU . "</b>", 'odd' );
/**
 * Document Summary
 */
$summary_tray = new XoopsFormElementTray( _AM_MAG_EDITSUMMARY, '<br />' );
$summary = new XoopsFormTextArea( '', "summary", $this->summary( "E" ), 7, 60 );
$summary_tray->addElement( $summary );
$autosummary_checkbox = new XoopsFormCheckBox( '', 'autosummary', 0 );
$autosummary_checkbox->addOption( 1, _AM_MAG_EDITAUTOSUMMARY );
$summary_tray->addElement( $autosummary_checkbox );
$remove_image_checkbox = new XoopsFormCheckBox( '', 'removeimages', 0 );
$remove_image_checkbox->addOption( 1, _AM_MAG_EDITREMOVEIMAGES );
$summary_tray->addElement( $remove_image_checkbox );
if ( isset( $xoopsModuleConfig['summary_type'] ) && $xoopsModuleConfig['summary_type'] == 1 )
{
    $summary_num = 50;
    $summary_text = _AM_MAG_EDITSUMMARYAMOUNTW;
} 
else
{
    $summary_num = 250;
    $summary_text = _AM_MAG_EDITSUMMARYAMOUNTC;
} 
$summary_amount = new XoopsFormText( $summary_text, "summaryamount", 4, 4, $summary_num );
$summary_tray->addElement( $summary_amount );
$sform->addElement( $summary_tray );
$sform->insertBreak( "", "odd" );
/**
 * Published Date: Set or remove the publish date for document
 */
$time = time();
$publishdate = $this->published( "E" );
$published = ( $publishdate > $time ) ? $publishdate : $time ;
$ispublished = ( $publishdate > $time ) ? 1: 0 ;
$publishdates = ( $publishdate > $time ) ? _AM_MAG_PUBLISHDATESET . formatTimestamp( $publishdate, "Y-m-d H:s" ) : _AM_MAG_SETDATETIMEPUBLISH;

$publishdate_checkbox = new XoopsFormCheckBox( '', 'publishdateactivate', $ispublished );
$publishdate_checkbox->addOption( 1, $publishdates . "<br />" );

$publishdate_tray = new XoopsFormElementTray( _AM_MAG_PUBLISHDATE, '' );
$publishdate_tray->addElement( $publishdate_checkbox );
$publishdate_tray->addElement( new XoopsFormDateTime( _AM_MAG_SETPUBLISHDATE, 'publishdates', 15, $published ) );
$publishdate_tray->addElement( new XoopsFormRadioYN( _AM_MAG_CLEARPUBLISHDATE, 'clearpublish', 0, ' ' . _AM_MAG_YES . '', ' ' . _AM_MAG_NO . '' ) );
$sform->addElement( $publishdate_tray );
/**
 * Expired Date:  Set or remove the expire date for document
 */
$expiredate = $this->expired( "E" );
$expired = ( $expiredate < $time ) ? $expiredate : $time ;
$sform->addElement( new XoopsFormHidden( "expiredates", $expired ) );
$sform->addElement( new XoopsFormHidden( "clearexpire", 0 ) );

$isexpired = ( $expiredate > $time ) ? 1: 0 ;
$expiredates = ( $expiredate > $time ) ? _AM_MAG_EXPIREDATESET . formatTimestamp( $expiredate, 'Y-m-d H:s' ) : _AM_MAG_SETDATETIMEEXPIRE;
$warning = ( $publishdate > $expiredate && $expiredate > $time ) ? _AM_MAG_EXPIREWARNING : "";

$expiredate_checkbox = new XoopsFormCheckBox( '', 'expiredateactivate', $isexpired );
$expiredate_checkbox->addOption( 1, $expiredates . "<br />" );
$expiredate_tray = new XoopsFormElementTray( _AM_MAG_EXPIREDATE . $warning, '' );
$expiredate_tray->addElement( $expiredate_checkbox );
$expiredate_tray->addElement( new XoopsFormDateTime( _AM_MAG_SETEXPIREDATE, 'expiredates', 15, $expired ) );
$expiredate_tray->addElement( new XoopsFormRadioYN( _AM_MAG_CLEAREXPIREDATE, 'clearexpire', 0, ' ' . _AM_MAG_YES . '', ' ' . _AM_MAG_NO . '' ) );
$sform->addElement( $expiredate_tray );
$sform->addElement( new XoopsFormHidden( "expiredate", $this->expired ) );
$sform->addElement( $timeset_tray );

$spotsponser = ( $this->spotlightmain == 2 ) ? 1 : 0;
$index_spotlightsp_radio = new XoopsFormRadioYN( _AM_MAG_SPOTLIGHTSPONSER, 'spotlightsponser', $spotsponser, ' ' . _AM_MAG_YES . '', ' ' . _AM_MAG_NO . '' );
$sform->addElement( $index_spotlightsp_radio );
$sform->insertBreak( _AM_MAG_SPOTLIGHTSPONSER_DESC, "odd" );

$spotmain = ( $this->spotlightmain == 1 ) ? 1 : 0;
$index_spotlight_radio = new XoopsFormRadioYN( _AM_MAG_SPOTLIGHTMAIN, 'spotlightmain', $spotmain, ' ' . _AM_MAG_YES . '', ' ' . _AM_MAG_NO . '' );
$sform->addElement( $index_spotlight_radio );
$sform->insertBreak( _AM_MAG_SPOTLIGHTMAIN_DESC, "odd" );

$this->spotlight = 1;
$spotlight_radio = new XoopsFormRadioYN( _AM_MAG_SPOTLIGHT, 'spotlight', $this->spotlight(), ' ' . _AM_MAG_YES . '', ' ' . _AM_MAG_NO . '' );
$sform->addElement( $spotlight_radio );

ob_start();
MagLists::getforum( $xoopsModuleConfig['selectforum'], $this->isforumid() );
$sform->addElement( new XoopsFormLabel( _AM_MAG_EDITDISCUSSINFORUM, ob_get_contents() ) );
ob_end_clean();

ob_start();
MagLists::getform( $xoopsModuleConfig['selectform'], $this->isformid() );
$sform->addElement( new XoopsFormLabel( _AM_MAG_EDITDISCUSSINFORM, ob_get_contents() ) );
ob_end_clean();

ob_start();
MagLists::getstore( $xoopsModuleConfig['selectstore'], $this->isstoreid() );
$sform->addElement( new XoopsFormLabel( _AM_MAG_EDITDISCUSSINSTORE, ob_get_contents() ) );
ob_end_clean();

ob_start();
MagLists::getsign( $xoopsModuleConfig['selectsign'], $this->issignid() );
$sform->addElement( new XoopsFormLabel( _AM_MAG_EDITDISCUSSINSIGN, ob_get_contents() ) );
ob_end_clean();

$sform->insertBreak( "", "odd" );

$other_options_tray = new XoopsFormElementTray( _AM_MAG_OTHEROPTIONS, '<br />' );

$allowcom = ( $this->allowcom ) ? 1 : 0;
$addcomments_checkbox = new XoopsFormCheckBox( '', "allowcom", $allowcom );
$addcomments_checkbox->addOption( 1, _AM_MAG_EDITALLOWCOMENTS );
$other_options_tray->addElement( $addcomments_checkbox );

$isframe = ( $this->isframe ) ? 1 : 0;
$isframe_checkbox = new XoopsFormCheckBox( '', "isframe", $isframe );
$isframe_checkbox->addOption( 1, _AM_MAG_EDITJUSTHTML );
$other_options_tray->addElement( $isframe_checkbox );

$noshowart = ( $this->noshowart ) ? 1 : 0;
$noshowart_checkbox = new XoopsFormCheckBox( '', "noshowart", $noshowart );
$noshowart_checkbox->addOption( 1, _AM_MAG_EDITNOSHOART );
$other_options_tray->addElement( $noshowart_checkbox );

$cmainmenu = ( $this->cmainmenu ) ? 1 : 0;
$cmainmenu_checkbox = new XoopsFormCheckBox( '', "cmainmenu", $cmainmenu );
$cmainmenu_checkbox->addOption( 1, _AM_MAG_EDITMAINMENU );
$other_options_tray->addElement( $cmainmenu_checkbox );

$offline = ( $this->offline ) ? 1 : 0;
$offline_checkbox = new XoopsFormCheckBox( '', "offline", $offline );
$offline_checkbox->addOption( 1, _AM_MAG_EDITOFFLINE );
$other_options_tray->addElement( $offline_checkbox );

$move_checkbox = new XoopsFormCheckBox( '', "movetotop", 0 );
$move_checkbox->addOption( 1, _AM_MAG_EDITMOVETOTOP );
$other_options_tray->addElement( $move_checkbox );

$sform->addElement( $other_options_tray );
$sform->insertBreak( "", "odd" );

/**
 * Version tray
 */
$version_tray = new XoopsFormElementTray( _AM_MAG_EDITVERSIONNUM, ' ' );
$version = new XoopsFormText( '', "version", 10, 50, $this->version() );
$version_tray->addElement( $version );
$version_checkbox = new XoopsFormCheckBox( '', "version_update", 1 );
$version_checkbox->addOption( 1, _AM_MAG_EDITVERSION );
$version_tray->addElement( $version_checkbox );
//if ( accessadmin( "docapprove", 1, 0 ) == true )
//{
    $approved = ( $this->published && $this->articleid ) ? 1 : ( !$this->articleid ) ? 1 : 0;
    $approve_checkbox = new XoopsFormCheckBox( '', "approved", $approved );
    $approve_checkbox->addOption( 1, _AM_MAG_EDITAPPROVE );
    //$sform->addElement( $approve_checkbox );
    $version_tray->addElement( $approve_checkbox );
//}

$sform->addElement( $version_tray );
/**
 * Approve checkbox, is checked first to see if admin user ass access
 */


if ( $this->articleid )
    $sform->addElement( new XoopsFormHidden( "articleid", $this->articleid ) );

if ( isset( $checkin_id ) && intval( $checkin_id ) )
    $sform->addElement( new XoopsFormHidden( "checkin_id", intval( $checkin_id ) ) );
/**
 * form Buttons
 */
$button_tray = new XoopsFormElementTray( "", "" );
$hidden = new XoopsFormHidden( "op", "Save" );
$button_tray->addElement( $hidden );

$saveit = ( !$this->articleid ) ? _AM_MAG_SAVE : _AM_MAG_MODIFY;
$butt_save = new XoopsFormButton( "", "", $saveit, "submit" );
$butt_save->setExtra( "onclick='this.form.elements.op.value=\"Save\"'" );
$button_tray->addElement( $butt_save );
if ( $this->articleid )
{
    //if (accessadmin( "deletearticles", 1 , $this->articleid ))
	//{
	$butt_del = new XoopsFormButton( "", "", _AM_MAG_DELETE, "submit" );
    	$butt_del->setExtra( "onclick='this.form.elements.op.value=\"delete\"'" );
    	$button_tray->addElement( $butt_del );
	//}
    $butt_copy = new XoopsFormButton( "", "", _AM_MAG_COPY1, "submit" );
    $butt_copy->setExtra( "onclick='this.form.elements.op.value=\"Copy\"'" );
    $button_tray->addElement( $butt_copy );
} 
$sform->addElement( $button_tray );
$sform->display();
unset( $hidden );

?>

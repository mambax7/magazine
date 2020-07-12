<?php
// $Id: submit.php,v 1.7 2005/02/07 01:25:23 phppp Exp $
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
include_once "class/common.php";
include_once MAG_ROOT_PATH . "/include/functions.php" ;
include_once MAG_ROOT_PATH . "/class/article.php";
include_once MAG_ROOT_PATH . "/class/index.php";
include_once XOOPS_ROOT_PATH . "/class/xoopstree.php";

$op = '';
$has_access = false;
$submit_files_access = false;
$allow_auto_approve = false;//dqflyer added
$errors="";//dqflyer added

if ( !is_object( $xoopsUser ) )
{
    $has_access = ( $xoopsModuleConfig['anonpost'] ) ? true : false;
    $uid = 0;
}
else
{
    $groups = $xoopsUser->getGroups();
    if ( array_intersect( $xoopsModuleConfig['submitarts'], $groups ) )
    {
        $has_access = true;
    } 
    if ( array_intersect( $xoopsModuleConfig['submitfiles'], $groups ) )
    {
        $submit_files_access = true;
    } 
//------------------------------------------------------------------------------dqflyer fixed bug
//	if (accessadmin('moderator'))
//	{
//		$allow_auto_approve = true;
//	}
//------------------------------------------------------------------------------
    $uid = $xoopsUser->uid();
}

if ( $has_access == false )
{
    redirect_header( "javascript:history.go(-1)", 2, _MAG_NOPERM );
    exit();
}

foreach ( $_POST as $k => $v )
{
    ${$k} = $v;
} 

$op = ( isset( $_POST['op'] ) && !empty( $_POST['op'] ) ) ? "post" : "edit";

if ( isset( $checkin_id ) )
{
    if ( !checkStatus( $checkin_id ) )
    {
        redirect_header( "javascript:history.go(-1)", 2, _MAG_CHECKIN_FAILED );
        exit();
    } 
} 
else if ( isset( $articleid ) )
{
    if ( !$checkin_id = checkin( $articleid ) )
    {
        redirect_header( "javascript:history.go(-1)", 2, _MAG_CHECKIN_FAILED );
        exit();
    } 
    $isMagArticle = new MagArticle( $articleid );
    if ( !is_object( $isMagArticle ) )
    {
        redirect_header( "javascript:history.go(-1)", 2, _MAG_NOARTICLE );
        exit();
    } 
} 

switch ( $op )
{
    case "post": 

        $article = ( isset( $_POST['articleid'] ) && $_POST['articleid'] > 0 ) ? new MagArticle( $_POST['articleid'] ) : new MagArticle();

        if ( ( isset( $_POST['is_edit'] ) && $_POST['is_edit'] > 0 ) && ( isset( $_POST['articleid'] ) && $_POST['articleid'] > 0 ) && !$xoopsModuleConfig['autoapprove'] )
        {
            $catergoryid = '0';
            $title = '0';
            $message = '0';
            $summary = '0';
            $url = '0';
            $urlname = '0';
            $requested = time();
            $published = time();
            $modifysubmitter = '0';

            $catergoryid = intval( $_POST['id'] );
            $title = $_POST['title'];
            $subtitle = $_POST['subtitle'];
            $maintext = $_POST['maintext'];
            $summary = $_POST['summary'];
            $url = $_POST['url'];
            $urlname = $_POST['urlname'];
            $modifysubmitter = $xoopsUser->getvar( 'uid' );

            $newid = $xoopsDB->genId( $xoopsDB->prefix( MAG_ARTICLE_MOD_DB ) . "_requestid_seq" );

            $sql = "INSERT INTO " . $xoopsDB->prefix( MAG_ARTICLE_MOD_DB ) . " (requestid, articleid, categoryid, title, subtitle, maintext, summary, url, urlname, requested, modifysubmitter ) ";
            $sql .= "VALUES ('$newid', '$articleid', '$catergoryid', '$title', '$subtitle', '$maintext', '$summary', '$url', '$urlname', '$requested', '$modifysubmitter')";
        } 
        else
        {
            $article->setUserType( 0 );
            //$article->setGroups( 0, 1 );
            $article->setGroups( $_POST['groupid'], isset( $_POST['catgroupid'] ) );
            $article->setTemplate( $_POST['template'] );
            $article->setIsblocks( $_POST['isblocks'] );
            $article->setCategoryid( $_POST['id'] );
            $article->setUid( $uid );
            $article->setWeight( 0 );
            $article->setTitle( $_POST['title'] );
            $article->setSubTitle( $_POST['subtitle'] );
            $article->setMainText( $_POST['maintext'] );
            $article->setSummary( $_POST['summary'], 0, 0 );
            $nohtml = ( isset( $_POST['nohtml'] ) ) ? intval( $_POST['nohtml'] ) : 0;
            $no_breaks = ( isset( $_POST['nobreaks'] ) ) ? intval( $_POST['nobreaks'] ) : 0;
            $nosmiley = ( isset( $_POST['nosmiley'] ) ) ? intval( $_POST['nosmiley'] ) : 0;
            $noxcodes = ( isset( $_POST['noxcodes'] ) ) ? intval( $_POST['noxcodes'] ) : 0;
            $notifypub = ( isset( $_POST['notifypub'] ) ) ? intval( $_POST['notifypub'] ) : 0;
            $nobreaks = ( isset( $_POST['nobreaks'] ) ) ? intval( $_POST['nobreaks'] ) : 0;
            $isforumid = ( isset( $_POST['isforumid'] ) ) ? intval( $_POST['isforumid'] ) : 0;
            $article->setNohtml( $nohtml );
            $article->setNobreaks( $no_breaks );
            $article->setNosmiley( $nosmiley );
            $article->setNoxcodes( $noxcodes );
            $article->setNotifypub( $notifypub );
            $article->setNobreaks( $nobreaks );
            $article->setForumid( $isforumid );
			if (isset($_POST['url'])){
				$article->setUrl( $_POST['url'] );}
			if (isset($_POST['urlname'])){
	            $article->setUrlname( $_POST['urlname'] );}
            if ( $xoopsModuleConfig['autoapprove'] || $allow_auto_approve) //dqflyer fixed
            {
                $article->setApproved( 1 );
                $article->setPublished( time() );
                $article->setExpired( 0 );
            } 
            $result = $article->store();
            if ( $result ) $articleid = $article->articleid();
        } 

        if ( isset( $_POST['submit_files_access'] ) && $_POST['submit_files_access'] )
        {
            if ( isset( $_POST['delupload'] ) && count( $_POST['delupload'] ) > 0 )
            {
                foreach ( $_POST['delupload'] as $onefile )
                {
                    $sfiles = new MagFiles( $onefile );
                    $sfiles->delete();
                } 
            } 

            if ( !empty( $HTTP_POST_FILES['uploadfile']['name'] ) )
            {
                include_once( MAG_ROOT_PATH . "/class/uploader.php" );
                include_once( MAG_ROOT_PATH . "/class/files.php" );
                $usertype = ($allow_auto_apporve) ? 0:1;
                $allowed_mimetypes = mag_retmime( $_FILES['uploadfile']['name'], $usertype );
                $uploader = new WFuploader( MAG_FILE_PATH,
                    $allowed_mimetypes,
                    $xoopsModuleConfig['maxfilesize'],
                    $xoopsModuleConfig['imgwidth'],
                    $xoopsModuleConfig['imgheight'] 
                    );

                $uploader->setNoFileSizeCheck( $xoopsModuleConfig['nomaxfilesize'] );
                $uploader->setNoImageSizeCheck( $xoopsModuleConfig['noimgsizecheck'] );
                $uploader->setPrefix( $xoopsModuleConfig['file_prefix'] );
                
		if ( $uploader->fetchMedia( $_POST['xoops_upload_file'][0] ) )
                {
                    if ( !$uploader->upload() )
                        $errors = $uploader->getErrors();
                    else
                    {
                        if ( is_file( $uploader->getSavedDestination() ) )
                        {
                            $file = new MagFiles();
                            $file->setByUploadFile( $uploader );

                            $articleid = ( $_POST['articleid'] )?$_POST['articleid']:$articleid;
                            $file->setArticleid( $articleid );
                            $file->setFiledescript( $_POST['textfiledescript'] );
                            $file->setFiletext( $_POST['textfilesearch'] );
                            $file->setgroupid( '1 2' );
                            $fileshowname = ( $_POST['fileshowname'] ) ? $_POST['fileshowname']:$uploader->getMediaName();
                            $file->setFileShowName( $fileshowname );
                            $auto_approve = ( $xoopsModuleConfig['autoapprove'] ) ? 1 : 0;
                            $file->setSubmit( $auto_approve );
                            $file->setUid( $uid );
                            $file->store();
                        } 
                    } 
                } 
                else
                {
                    $errors = $uploader->getErrors();
                } 
            } 
        } 

        if ( $xoopsModuleConfig['notifysubmit'] )
        {
            $xoopsMailer = &getMailer();
            $xoopsMailer->useMail();
            $xoopsMailer->setToEmails( $xoopsConfig['adminmail'] );
            $xoopsMailer->setFromEmail( $xoopsConfig['adminmail'] );
            $xoopsMailer->setFromName( $xoopsConfig['sitename'] );
            $xoopsMailer->setSubject( _MAG_NOTIFYSBJCT );
            $body = _MAG_NOTIFYMSG;
            $body .= "\n\n" . _MAG_TITLE . ": " . $article->title();
            $body .= "\n" . _POSTEDBY . ": " . XoopsUser::getUnameFromId( $uid );
            $body .= "\n" . _MAG_DATE . ": " . formatTimestamp( time(), 'm', $xoopsConfig['default_TZ'] );
            $body .= "\n\n" . MAG_ROOT_URL . '/admin/index.php?op=edit&articleid=' . $article->articleid;
            $xoopsMailer->setBody( $body );
            $xoopsMailer->send();
        } 
		if (isset($xoopsUser->uid))
        if ( $checkin_id ) checkout( intval( $_POST['articleid'] ), $article->uid );

        if ( !$result = $xoopsDB->query( $sql ) )
            redirect_header( "index.php", 2, _MAG_ERROR );
        else
        {
            $message = ( $errors ) ? $errors . "<br />" : "";
            $message .= ( $xoopsModuleConfig['autoapprove'] || $allow_auto_approve) ? _MAG_THANKS : _MAG_THANKS_APPROVE;//dqflyer fixed
            redirect_header( "index.php", 2, $message );
        } 
        break;

    case "edit":
    default:
        include XOOPS_ROOT_PATH . '/header.php';

        $xoopsOption['template_main'] = 'mag_submit.html';
        $this = ( isset( $_GET['articleid'] ) && $_GET['articleid'] > 0 ) ? new MagArticle( $_GET['articleid'] ) : new MagArticle();
        $is_edit = ( isset( $_GET['op'] ) && $_GET['op'] == "edit" ) ? 1 : 0;
        $xt = new MagCategory();
        $index = new MagIndex( 3 );
        $catarray['imageheader'] = $index->imageheader( "S" );
        $catarray['indexheading'] = $index->indexheading( "S" );
        $catarray['indexheader'] = $index->indexheader( "S" );
        $catarray['indexfooter'] = $index->indexfooter( "S" );
        $catarray['indexheaderalign'] = $index->indexheaderalign( "S" );
        $catarray['indexfooteralign'] = $index->indexfooteralign( "S" );
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
        $selecteditor = include 'include/editor.inc.php';
        $xoopsTpl->assign('selecteditor', $selecteditor);
        $sform = include 'include/storyform.inc.php';
        $xoopsTpl->assign('sform', $sform);
        include XOOPS_ROOT_PATH . '/footer.php';
        break;
} 

?>

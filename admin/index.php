<?php
// $Id: index.php,v 1.8 2005/02/21 15:51:52 phppp Exp $
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
// Admin Main
include 'admin_header.php';

$op = "";

if ( isset( $_POST ) )
{
    foreach ( $_POST as $k => $v )
    {
        ${$k} = $v;
    } 
} 

if ( isset( $_GET ) )
{
    foreach ( $_GET as $k => $v )
    {
        ${$k} = $v;
    } 
} 

if ( isset( $articleid ) )
{
    $isMagArticle = new MagArticle( $articleid );
    if ( !is_object( $isMagArticle ) )
    {
        redirect_header( "allarticles.php", 1, _AM_MAG_ARTICLENOTEXIST );
        exit();
    } 
} 
unset( $isMagArticle ); // should be optimized ...

switch ( $op )
{
    case "edit":

        //accessadmin( "editarticle", 0 , $_GET['articleid'] );
        $this = new MagArticle( $_GET['articleid'] );
        if ( !$checkin_id = checkin( $this->articleid ) )
        {
            redirect_header( "javascript:history.go(-1)", 2, _AM_MAG_CHECKIN_FAILED );
            exit();
        } 
        xoops_cp_header();

        mag_admin_menu( _AM_MAG_ARTICLEMANAGEMENT );

        if ( $this->articleid )
        { 

            $result = $xoopsDB->query( "SELECT article_id, user_id, c_out_time FROM " . $xoopsDB->prefix( MAG_CHECKIN_DB ) . " WHERE c_out_time > '0' AND article_id=" . $this->articleid . " ORDER BY c_out_time DESC LIMIT 1" );
            list( $article_id, $user_id, $c_out_time ) = $xoopsDB->fetchrow( $result );
            $user_name = isset( $user_id ) ? MAG_getLinkedUnameFromId( $user_id, $xoopsModuleConfig['displayname'], 1 ) : _AM_MAG_NODETAILSRECORDED;
            $timecreated = isset( $this->created ) ? formatTimestamp( $this->created, "Y-m-d H:i:s" ) : _AM_MAG_NODETAILSRECORDED ;
            $timestarted = isset( $c_out_time ) ? formatTimestamp( $c_out_time, "Y-m-d H:i:s" ) : _AM_MAG_NODETAILSRECORDED ;
            $origauthor = isset( $this->uid ) ? MAG_getLinkedUnameFromId( $this->uid, $xoopsModuleConfig['displayname'], 0 ) : _AM_MAG_NODETAILSRECORDED;

            $intro = "<table width ='100%' cellpadding ='2' cellspacing ='1'>";
            $intro .= "<tr>";
            $intro .= "<td width = 50%>";
            $intro .= "<div><b>" . _AM_MAG_TITLE . ":</b> " . $this->textLink() . "</div>";
            $intro .= "<div><b>" . _AM_MAG_CREATEDBY . "</b>" . $origauthor . "</div>";
            $intro .= "<div><b>" . _AM_MAG_CREATEDON . "</b>" . $timecreated . "</div><br />";
            $intro .= "<div><b>" . _AM_MAG_LASTEDITBY . "</b>" . $user_name . "</div>";
            $intro .= "<div><b>" . _AM_MAG_EDITEDON . "</b>" . $timestarted . "</div>";
            $intro .= "</td>";
            $intro .= "<td width = '50%' valign = 'top'>"; 
            //if (accessadmin( "downloads", 1 ))
	    $intro .= "<div><a href='filesshow.php?op=uploads&amp;articleid=" . $this->articleid . "'>$uploads " . _AM_MAG_ADDAFILETOTHISDOWNLOAD . "</a></div>";
//
            //if (accessadmin( "reviews", 1 )) //dqflyer disabled
            $intro .= "<div><a href='reviews.php?op=default&amp;articleid=" . $this->articleid . "'>$reviews " . _AM_MAG_ADD_REVIEW . "</a></div>";  //dqflyer disabled
//
            //if (accessadmin( "docstats", 1 ))
            $intro .= "<div><a href='allarticles.php?op=stats&amp;articleid=" . $this->articleid . "'>$statsimg " . _AM_MAG_ADD_STATUS . "</a></div>";
            //if ( $xoopsModuleConfig['use_restore'] && accessadmin( "restore", 1 ) ) $intro .= "<div><a href='restore.php?op=default&amp;articleid=" . $this->articleid . "'>$restoreimg " . _AM_MAG_DOC_RESTORE . "</a></div>";
            if ( $xoopsModuleConfig['use_restore'] ) $intro .= "<div><a href='restore.php?op=default&amp;articleid=" . $this->articleid . "'>$restoreimg " . _AM_MAG_DOC_RESTORE . "</a></div>";
            $intro .= "</td>";
            $intro .= "</tr>";
            $intro .= "</table>";

            mag_textinfo( _AM_MAG_EDITARTICLE, $intro );
        } 
        if ( !empty( $articleid ) )
        {
            $isedit = 1;
            include_once MAG_ROOT_PATH . '/include/articleform.inc.php';
        } 
        else
        {
            die( "Article does not exist!" );
        } 
        break;

    case "addword":

        //echo ini_set( 'com.allow_dcom', '0' );
		$this = ( !empty( $articleid ) ) ? new MagArticle( $articleid ) : new MagArticle();

        if ( !preg_match( "/[.doc|.rtf|.txt]$/i", $HTTP_POST_VARS['file'] ) )
        {
            redirect_header( "import.php", 1, _AM_MAG_NOT_WORDDOC );
            exit();
        } 
		include MAG_ROOT_PATH . "/class/wordDocumentHandler.php";
		$w = new wordDocumentHandler();

        $HTMLPath = substr_replace( basename( $HTTP_POST_VARS['file'] ), 'html', -3, 3 );
        $HTMLPath = str_replace(" ","_", $HTMLPath);
		$htmlfile = strtolower( MAG_HTML_PATH . "/" . $HTMLPath );
		if (file_exists($htmlfile)) 
		{
			redirect_header( "import.php", 3, _AM_MAG_ERRORFILEALLREADYEXISITS );
		} else {
        	$w->convertWordDocumentToFile($HTTP_POST_VARS['file'], $htmlfile, $outFormat="html");
        }
		redirect_header( "import.php", 3, _AM_MAG_DBUPDATED );
        break;

    case "Copy":
        unset( $_POST['articleid'] );

    case "save":
    case "Save":

        if ( isset( $_POST['checkin_id'] ) && !checkStatus( $_POST['checkin_id'] ) )
        {
            redirect_header( "javascript:history.go(-1)", 1, _AM_MAG_CHECKIN_FAILED );
            exit();
        } 

        $article = ( isset( $_POST['articleid'] ) && intval( $_POST['articleid'] ) ) ?
        new MagArticle( intval( $_POST['articleid'] ) ) : new MagArticle();

        $article->setPage( isset( $_POST['page'] ) && intval( $_POST['page'] ) );
        $article->setUserType( 1 );

        $article->setGroups( $_POST['groupid'], isset( $_POST['catgroupid'] ) );
        $article->setCategoryid( intval( $_POST['id'] ) );

        $theUid = empty($_POST['userset'])?$article->uid():intval( $_POST['changeuser'] );
        $article->setUid( $theUid );
        $article->setWeight( intval( $_POST['weight'] ), $xoopsModuleConfig['autoweight'] );

        $article->setSubTitle( $_POST['subtitle'] );
        $article->setArtimage( $_POST['artimage'] );

        $article->setNohtml( isset( $_POST['nohtml'] ) );
        $article->setNosmiley( isset( $_POST['nosmiley'] ) );
        $article->setNoxcodes( isset( $_POST['noxcodes'] ) );
        $article->setNobreaks( isset( $_POST['nobreaks'] ) );

        $article->setNotifypub( isset( $_POST['notifypub'] ) );
        $article->setIsframe( isset( $_POST['isframe'] ) );
        $article->setOffline( isset( $_POST['offline'] ) );
        $article->setNoshowart( isset( $_POST['noshowart'] ) );
        $article->setAllowcom( isset( $_POST['allowcom'] ) );
        $article->setCmainmenu( isset( $_POST['cmainmenu'] ) ); 
        // works
        $article->setApproved( isset( $_POST['approved'] ) );
        $article->setVersion( $_POST['version'], intval( $_POST['version_update'] ) );
        //$article->setSpotlight( intval( $_POST['spotlight'] ) );
        $article->setSpotlightMain( $_POST['spotlightmain'], $_POST['spotlightsponser'] );
        $article->isforumid = ( $_POST['isforumid'] ) ? $_POST['isforumid'] : 0;
        // RB add 2005-05-06
        $article->isformid = ( $_POST['isformid'] ) ? $_POST['isformid'] : 0;
        $article->isstoreid = ( $_POST['isstoreid'] ) ? $_POST['isstoreid'] : 0;
        $article->issignid = ( $_POST['issignid'] ) ? $_POST['issignid'] : 0;
        $article->setTemplate( $_POST['template'] );
        $article->setIsblocks( $_POST['isblocks'] );

        $changed = ( isset( $_POST['publishdate'] ) && $_POST['publishdate'] > 0 ) ? time() : 0;
        $article->setChanged( $changed );

        $publishdate = ( isset( $_POST['publishdate'] ) && $_POST['publishdate'] > 0 ) ? $_POST['publishdate'] : time();
        $expiredate = ( isset( $_POST['expiredate'] ) && $_POST['expiredate'] > 0 ) ? $_POST['publishdate'] : 0; 
        // $move_to_top = 1;
        $article->setPublished( $publishdate, ( isset( $_POST['movetotop'] ) && $_POST['movetotop'] == 1 ) );
        $article->setExpired( $expiredate );

        if ( isset( $_POST['publishdateactivate'] ) )
        {
            $publishdate = strtotime( $_POST['publishdates']['date'] ) + $_POST['publishdates']['time'];
            $article->setPublished( $publishdate );
        } 
        if ( $_POST['clearpublish'] )
        {
            $publishdate = $article->created;
            $article->setPublished( $publishdate );
        }

        if ( isset( $_POST['expiredateactivate'] ) )
        {
            $expiredate = strtotime( $_POST['expiredates']['date'] ) + $_POST['expiredates']['time'];
            $article->setExpired( $expiredate );
        } 
        if ( $_POST['clearexpire'] )
        {
            $article->setExpired( 0 );
        } 

        if ( isset( $_POST['doctitle'] ) && $_POST['doctitle'] == 1 )
        {
            $GLOBALS['fileedit'] = mag_loadfile( $_POST["htmlpage"] );
            if ( preg_match( '_<title>(.*)</title>_is', $GLOBALS['fileedit'], $tmp ) )
            {
                $title = $myts->addslashes( trim( $tmp[1] ) );
                $article->setTitle( $title );
                unset( $tmp );
                unset( $GLOBALS );
            } 
            else
            {
                $article->setTitle( $_POST['title'] );
            } 
        } 
        else
        {
            $article->setTitle( $_POST['title'] );
        } 

        if ( !empty( $_POST["htmlpage"] ) && isset( $_POST["htmldb"] ) && $_POST["htmldb"] == 1 )
        {
            $maintext = '';
            $GLOBALS['fileedit'] = mag_loadfile( $_POST["htmlpage"] );
            if ( preg_match( '_<body>(.*)</body>_is', $GLOBALS['fileedit'], $tmp ) )
            {
                $maintext = $tmp[0];
            } 
            else
            {
                $maintext = $GLOBALS['fileedit']; //Dummy entry
            } 
            $maintext = preg_replace( '/\<script[\w\W]*?\<\/script\>/i', '', $maintext );
            $maintext = str_replace( '<P>&nbsp;</P>', '', $maintext );
            $maintext = str_replace( "<img src=\"", "<img src=\"html/images/", $maintext );
            $maintext = preg_replace( array( '/[ \t]{2,}/', '/(\n|\r|\r\n){2,}/' ), array( '', '' ), trim( $maintext ) );
            $article->setHtmlpage( '' );
            unset( $GLOBALS['fileedit'] );
        } 
        else
        {
            $maintext = $_POST["maintext"];
        } 

        if ( isset( $_POST["cleanhtml"] ) && $_POST["cleanhtml"] == 1 )
        {
            $maintext = mag_cleanHtml( $maintext );
        } 

        if ( isset( $_POST["striptags"] ) && $_POST["striptags"] == 1 )
        {
            $maintext = mag_strip_tags( $maintext );
        } 

        if ( !empty( $_POST["htmlpage"] ) && !isset( $_POST["htmldb"] ) )
        {
            $article->setMainText( '' );
            $article->setHtmlpage( $_POST['htmlpage'] );
        }
        else
        {
            $article->setHtmlpage( '' );
            $article->setMainText( $myts->addslashes( $maintext ) );
        } 

        /**
         * Start of other entries
         */
        $auto_summary = ( isset( $_POST['autosummary'] ) && $_POST['autosummary'] == 1 ) ? 1 : 0;
        $summary_amount =  intval( $_POST['summaryamount'] );
        $remove_images = ( isset( $_POST['removeimages'] ) && $_POST['removeimages'] == 1 ) ? 1 : 0;
        $article->setSummary( $_POST['summary'], $auto_summary, $summary_amount, $remove_images );

        $article->setUrl( $_POST['url'] );
        $article->setUrlname( $_POST['urlname'] );
        $article->store();

        if ( !empty( $isnew ) && $article->notifypub() && $article->uid() != 0 )
        {
            $poster = new XoopsUser( $article->uid() );
            $subject = _AM_MAG_ARTPUBLISHED;
            $message = sprintf( _AM_MAG_HELLO, $poster->uname() );
            $message .= "\n\n" . _AM_MAG_YOURARTPUB . "\n\n";
            $message .= _AM_MAG_TITLEC . $article->title() . "\n" . _AM_MAG_URLC . MAG_ROOT_PATH . "/article.php?articleryid=" . $article->articleid() . "\n" . _AM_MAG_PUBLISHEDC . formatTimestamp( $article->published(), "$timestanp", 0 ) . "\n\n";
            $message .= $xoopsConfig['sitename'] . "\n" . XOOPS_URL . "";
            $xoopsMailer = &getMailer();
            $xoopsMailer->useMail();
            $xoopsMailer->setToEmails( $poster->getVar( "email" ) );
            $xoopsMailer->setFromEmail( $xoopsConfig['adminmail'] );
            $xoopsMailer->setFromName( $xoopsConfig['sitename'] );
            $xoopsMailer->setSubject( $subject );
            $xoopsMailer->setBody( $message );
            $xoopsMailer->send();
        } 
        checkout( intval( isset( $_POST['articleid'] ) && intval( $_POST['articleid'] ) ), $article->uid );
        redirect_header( "allarticles.php", 1, _AM_MAG_DBUPDATED );
        exit();
        break;

    case "approve":
        //accessadmin( "docapprove", 0 , $articleid );
	if ( MagArticle::approve( $articleid ) )
            redirect_header( "allarticles.php", 2, _AM_MAG_APPROVED );
        else
            redirect_header( "allarticles.php", 2, _AM_MAG_ERROR_APPROVED );
        exit();
        break;

    case "delete":
        //accessadmin( "deletearticles", 0 , $articleid );
        if ( isset( $_POST['ok'] ) && $_POST['ok'] == 1 )
        {
            $article = new MagArticle( $articleid );
            $article->delete();
            $xoopsDB->query( "DELETE FROM " . $xoopsDB->prefix( MAG_CHECKIN_DB ) . " WHERE article_id=" . $articleid . "" );
            redirect_header( "allarticles.php", 1, _AM_MAG_DBUPDATED );
            exit();
        } 
        else
        {
            xoops_cp_header();
            echo "";
            xoops_confirm( array( 'op' => 'delete', 'articleid' => $articleid, 'ok' => 1 ), 'index.php', _AM_MAG_RUSUREDEL );
        } 
        break;

    case "newarticle":
    case "default":
    default:
        //accessadmin( "createarticles" );

        xoops_cp_header();
        mag_admin_menu( _AM_MAG_ARTICLEMANAGEMENT );

        if ( MagCategory::countCategory() > 0 )
        {
            mag_textinfo( _AM_MAG_EDITARTICLE, _AM_MAG_EDITARTICLETEXT );
            $this = new MagArticle();
            include_once MAG_ROOT_PATH . '/include/articleform.inc.php';
        } 
        else
        {
            echo "<br>";
            xoops_error( "<a href='category.php?op=default'>" . _AM_MAG_CATEGORYTAKEMETO . "</a>", "<h4>" . _AM_MAG_NOCATEGORY . "</h4>" );
        } 
        break;
} 
xoops_cp_footer();

?>

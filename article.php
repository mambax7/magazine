<?php
// $Id: article.php,v 2.1 2005/05/27 11:30:13 RB Exp $
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
include_once MAG_ROOT_PATH . "/include/functions.php";
include_once MAG_ROOT_PATH . "/include/groupaccess.php";
include_once MAG_ROOT_PATH . "/class/article.php";

$article_id = isset( $_GET['articleid'] ) ? intval( $_GET['articleid'] ) : 0;
$page = ( isset( $_GET['page'] ) ) ? intval( $_GET['page'] ) : 0;
$pagenum = ( isset( $_GET['pagenum'] ) ) ? intval( $_GET['pagenum'] ) : 0;

$articletag = array();
include_once( XOOPS_ROOT_PATH . "/header.php" );
$article = new MagArticle( $article_id );

/* If article does't exist return to index.php */
if ( !is_object( $article ) )
{
    redirect_header( "index.php", 2, _MAG_NOARTICLE );
    exit();
} 
/* Check group view article permission */
if ( !Mag_checkAccess( $article->groupid ) )
{
    redirect_header( 'index.php', 2 , _MAG_ARTICLENOPERM );
    exit();
} 

/* Select article templates */
if (!empty($article->template)) {
    $xoopsOption['template_main'] = $article->template;
} else {
    $xoopsOption['template_main'] = $magTemplates['articlepage'];
}
/* Article count number +1 */
$article->updateCounter();

$articletag['adminlink'] = "";
$articletag['pagelink'] = "";
$articletag['articleid'] = $article->articleid();
$articletag['categoryid'] = $article->categoryid();

$title_matches = array();
preg_match_all( "/\[title](.*)\[\/title\]/esU", $article->maintext("S"), $title_matches );
$articletag['firstlinks'] = "1. <a href='article.php?articleid=" . $article->articleid() . "'>" . $article->subtitle . "</a>";
if ( $page > 0 && is_array( $title_matches ) )
{
    //$article->maintext = preg_replace( "/\[subtitle](.*)\[\/subtitle\]/sU", "", $article->maintext );
    if ( is_array( $title_matches ) )
    {
        $page_num = $page + 1;
        //$article->setTitle( $title_matches[1][$page-1] . $article->title . " (" . _MAG_PART . " $page_num)" );
        //$article->setSubTitle( $subtitle_matches[1][$page-1] );
        $article->setTitle( $article->title );
        $article->setSubTitle( $title_matches[1][$page-1] );
    }
} 

if ( is_array( $title_matches ) && count( $title_matches[1] ) > 0 )
{
    $articletag['morelinks'] = "";
    if ( is_array( $title_matches ) )
    {
        for ( $i = 0; $i < count( $title_matches[1] ); $i++ )
        {
            $a = $i + 1;
            $b = $a + 1;
            $articletag['morelinks'][] = array( 'articlelink' => " " . $b . ". <a href='article.php?articleid=" . $article->articleid() . "&amp;page=" . $a . "'>" . $title_matches[1][$i] . "</a>" );
        }
    } 
} 

$articletag['titlemain'] = $article->title( "E" );
$articletag['subtitle'] = $article->subtitle( "S" );
$articletag["image"] = $article->articleimg( "S" );
// SSL Added
if(preg_match( "#\[ssl\](.+?)\[/ssl\]#is", $article->maintext, $ssl_matches))
{
    $ssl_maintext = $ssl_matches[1];
    $ssl_maintext = preg_replace( "#<p>#ie", "<br><br>", $ssl_maintext );
    //$ssl_post = str_replace( chr(13).chr(10), "<br>", $ssl_maintext );
    $ssl_maintext = str_replace( chr(13).chr(10), "<br>", $ssl_maintext );
    $line_array = preg_split("#<br>#", $ssl_maintext);
    $ssl_maintext = "";
    foreach ($line_array as $each_line)
    {
      $addline = "";
      $rand_char = rand(8,10);
      for ($i = 1; $i <= $rand_char; $i++)
      {
        $addline.=chr(rand (97,122));
      }
      $addline = preg_replace( "#\"#", "&quot;", $addline );
      $addline = preg_replace( "#\<#", "&lt;", $addline );
      $addline = preg_replace( "#\>#", "&gt;", $addline );
      $ssl_maintext .= $each_line."<font color='".$xoopsModuleConfig['ssltextcolor']."'>".$xoopsModuleConfig['ssltext']." ". $addline."</font><br>";
    }
    $article->maintext = preg_replace( "#\[ssl\](.+?)\[/ssl\]#is", $ssl_maintext, $article->maintext );
}
// SSL End

/* Document information */
/*
$articletag['commentcount'] = ( in_array( 1, $xoopsModuleConfig['displayinfo'] ) ) ? $article->getCommentsCount() : "";
if ( $xoopsModuleConfig['novote'] )
{
    $articletag['rating'] = ( in_array( 3, $xoopsModuleConfig['displayinfo'] ) ) ? number_format( $article->rating(), 2 ) : "";
    $articletag['votes'] = ( in_array( 4, $xoopsModuleConfig['displayinfo'] ) ) ? $article->votes() : "";
    $xoopsTpl->assign( 'mag_novote', true );
}
$articletag['datetime'] = ( in_array( 5, $xoopsModuleConfig['displayinfo'] ) ) ? formatTimestamp( $article->published(), $xoopsModuleConfig['timestamp'] ) : "";
$articletag['counter'] = ( in_array( 6, $xoopsModuleConfig['displayinfo'] ) ) ? $article->counter() : "";
$articletag['version'] = ( in_array( 9, $xoopsModuleConfig['displayinfo'] ) ) ? $article->version() : "";
$articletag['id'] = ( in_array( 9, $xoopsModuleConfig['displayinfo'] ) ) ? $article->articleid() : "";
*/
$articletag['rating'] = number_format( $article->rating(), 2 );
$articletag['votes'] = $article->votes();
$articletag['datetime'] = formatTimestamp( $article->published(), $xoopsModuleConfig['timestamp'] );
$articletag['counter'] = $article->counter();

$articletag['adminlink'] = $article->adminlink();
$novotevalue = ( $xoopsModuleConfig['novote'] == 1 ) ? true : false;
$xoopsTpl->assign( 'novote', $novotevalue );

/* Author information */
$articletag['username'] = ( $xoopsModuleConfig['displayname'] != 3 ) ? $article->uname() : "";
$articletag['user_intrest'] = $article->user_intrest(); // RB 2005-05-04 
$articletag['user_from'] = $article->user_from(); // RB 2005-05-04
$tempstr = $article->email();
(!$tempstr=='')?$articletag['email'] = $tempstr:'';
/* Select atavar or Section determined by admin choice */
if (intval($article->uid()))
{
  $articletag['userimg'] = '';
  switch ( $xoopsModuleConfig['atavar'] )
  {
    case "1":
		
        $user = new XoopsUser( $article->uid );
        $atavar = $user->user_avatar();
        if ( !empty( $atavar ) && $atavar != 'blank.gif' )
        {
            $articletag["userimg"] = "<img src=" . XOOPS_UPLOAD_URL . "/" . $atavar . ">";
        } 
        break;
    case "2":
        $onecat = new MagCategory( $article->categoryid );
        if ( $onecat->imgurl( "S" ) && $xoopsModuleConfig['showcatpic'] == 1 )
             $articletag['userimg'] = $onecat->imgLink();
        break;
    default:
        $articletag['userimg'] = "";
        break;
  }
}

/* Select related modules link */
include_once MAG_ROOT_PATH . "/modules.php";

/* Select article review info */
$sql = "SELECT * FROM " . $xoopsDB->prefix( MAG_REVIEWS ) . " WHERE article_id = $article_id";
$review_arr = $xoopsDB->fetchArray( $xoopsDB->query( $sql ) );
if ( $review_arr['display'] )
{
   include_once MAG_ROOT_PATH . "/review.php";
} 

/* Get maintext for page */
$pagenum = $article->maintextPages();
if ( $page > $pagenum ) $page = $pagenum;
  if ( $article->htmlpage )
  {
  $ext = ltrim( strrchr( $article->htmlpage, '.' ), '.' );
    if ( $ext == "php" || $ext == "php3" || $ext = "phtml" )
    {
      if ( file_exists( MAG_HTML_PATH . "/" . $article->htmlpage ) && false != $fp = fopen( MAG_HTML_PATH . "/" . $article->htmlpage, 'r' ) )
      {
        $articletag['maintext'] = MAG_HTML_PATH . "/" . $article->htmlpage;
        $xoopsTpl->assign( 'my_template', MAG_HTML_PATH . "/" . $article->htmlpage );
        $articletag['is_include'] = 1;
      } else {
        $xoopsTpl->assign( 'my_template', '' );
        $articletag['is_include'] = 0;
        $articletag['maintext'] = '';
      }
    } else {
      $fileisthis = MAG_HTML_PATH . "/" . $article->htmlpage ;
      if ( file_exists( $fileisthis ) && false !== $fp = fopen( $fileisthis, 'r' ) )
        {
          $articletag['maintext'] = fread( $fp, filesize( $fileisthis ) );
          $articletag['maintext'] = str_replace( $article->htmlpage, "article.php?articleid=$article_id&page=$page", $articletag['maintext'] );
          $articletag['maintext'] = str_replace( "&lt;P&gt;&nbsp;&lt;/P&gt;", "", $articletag['maintext'] );
          $articletag['maintext'] = str_replace( "/<img src=\'\/(.+?)\'/", "<img src='" . MAG_IMAGES_URL . "/\\1'", $articletag['maintext'] );
          $articletag['maintext'] = $articletag['maintext'];
          fclose( $fp );
        }
        if ( preg_match( '/<title>([^<]*)<\/title>/i', $articletag['maintext'], $matches ) )
        {
          $title = $matches[1];
          $article->setTitle( trim( $title ) );
          $articletag['title'] = $article->category->textLink() . ": " . $article->title( "S" );
          $articletag['titlemain'] = $article->title( "E" );
        }
        if ( preg_match( '/<body>([^<]*)<\/body>/i', $articletag['maintext'], $matches ) )
        {
          $matches = preg_replace( $script, "", $matches[1] );
          $matches = str_replace( $style, "", $matches );
          $matches = preg_replace( "/^(.*)<body/si", "", $matches );
          $matches = preg_replace( "/^([^>]*)>/si", "", $matches );
          $matches = preg_replace( "/<\/body>.*/si", "", $matches );
          $articletag['maintext'] = $matches;
        }
      }
    } else {
        $pagenum = $article->maintextPages();
        if ( $page > $pagenum ) $page = $pagenum;
        $articletag['maintext'] = $article->maintext( "S", $page );
}

//$articletag['size'] = ( in_array( 7, $xoopsModuleConfig['displayinfo'] ) ) ? mag_myfilesize( strlen( $articletag['maintext'] ) ) : "";

/* Include navigation menu */
$xoopsTpl->assign( 'pagenav', '' );
if ( $pagenum > 0 )
{
    include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
    $pagenav = new XoopsPageNav( $pagenum, 1, $page, 'page', 'articleid=' . $article->articleid );
    $xoopsTpl->assign( 'pagenav', $pagenav->renderNav() );
}

$articletag['menu'] = "&nbsp; &lt;&lt; <a href='./artindex.php?category=" .$article->categoryid() ."'>" . _MAG_BACK2CAT . "</a> | <a href='./index.php'>" . _MAG_RETURN2INDEX . "</a> | <a href='#top'>" . _MAG_BACK2TOP . "</a> &gt;&gt;";

/* Include download files */
$files = $article->getAllFiles();
if ( count( $files ) )
{
    foreach( $article->files as $file )
    {
        $filename = $file->getFileRealName();
        $filename = MAG_FILE_PATH . "/" . $filename;

        $size = ( is_file( $filename ) ) ? mag_myfilesize( $filename ) : 0;

        $download['downlink'] = $file->getLinkedName( XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "" );
        $download['description'] = $file->getFiledescript( 'S' );
        $download['description'] = ( $download['description'] ) ? $download['description'] : _MAG_NODESCRIPT ;
        $download['mimetype'] = $file->getMimetype( 'S' );
        $download['size'] = $size;
        $download['icon'] = mag_getIcon( $filename );
        $download['counter'] = $file->getCounter();
        $download['date'] = formatTimestamp( $file->date, $xoopsModuleConfig['timestamp'] );
        $download['broken'] = "<a href=" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/brokenfile.php?lid=" .$file->fileid .">" . _MAG_BROKENREPORTED . "</a>" ;
        $xoopsTpl->append( 'downloads', $download );
    } 
    $xoopsTpl->assign( 'lang_description', _MAG_DESCRIPTION );
    $xoopsTpl->assign( 'lang_filesize', _MAG_FILESIZE );
    $xoopsTpl->assign( 'lang_uploaded', _MAG_UPLOADED );
    $xoopsTpl->assign( 'lang_mimetype', _MAG_FILEMIMETYPE );
    $xoopsTpl->assign( 'lang_hits', _MAG_HITS );
} 

/* Get related documents */
$query = "SELECT * FROM " . $xoopsDB->prefix( MAG_RELATED ) . " WHERE related_idtopic = $article_id";
$result = $xoopsDB->query( $query );
$amount = $xoopsDB->getRowsNum( $result );
if ( $amount > 0 )
{
    while ( $related_arr = $xoopsDB->fetchArray( $result ) )
    {
        $ret_article = new MagArticle( $related_arr['related_topicid'] );
        if ( !Mag_checkAccess( $ret_article->groupid ) )
        {
            continue;
        } 
        $related_article['title'] = $ret_article->textLink( "S" );
        $xoopsTpl->append( 'related_article', $related_article );
    } 
    $related_count = ( isset( $related_article ) && $related_article > 0 ) ? 1 : 0;
    $xoopsTpl->assign( 'relatednum', intval( $related_count ) );
    unset( $query );
    unset( $amount );
} 

/* related news story */
$modhandler = &xoops_gethandler( 'module' );
$xoopsNewsModule = &$modhandler->getByDirname( "news" );
if ( is_object($xoopsNewsModule) && $xoopsNewsModule->getVar('isactive') )//dqflyer fixed
{
    include_once XOOPS_ROOT_PATH . "/modules/news/class/class.newsstory.php";
    $query = "SELECT * FROM " . $xoopsDB->prefix( MAG_RELATEDNEWS ) . " WHERE relatednews_idtopic = $article_id";
    $result = $xoopsDB->query( $query );
    $amount = $xoopsDB->getRowsNum( $result );
    if ( $amount > 0 )
    {
	while ( $related_news = $xoopsDB->fetchArray( $result ) )
        {
            $ret_news = new NewsStory( $related_news['relatednews_topicid'] );
            $related_newsstory['title'] = $ret_news->topiclink(); // RB add to class.newsstory.php
            $xoopsTpl->append( 'related_newsstory', $related_newsstory );
        } 
    } 
    unset( $query );
    unset( $amount );
} 
$relatednews_count = ( isset( $related_newsstory ) && $related_newsstory > 0 ) ? 1 : 0;
$xoopsTpl->assign( 'relatednewsnum', intval( $relatednews_count ) );

/* related links */
$query = "SELECT * FROM " . $xoopsDB->prefix(MAG_RELATEDLINKS) . " WHERE relatedlink_topicid = $article_id ORDER by relatedlink_weight";
$result = $xoopsDB->query($query);
$amount = $xoopsDB->getRowsNum($result);
if ($amount > 0)
{
    while ($related_links = $xoopsDB->fetchArray($result))
    {
        $link_url = $myts->htmlSpecialChars($myts->stripSlashesGPC($related_links['relatedlink_url']));
        $link_urlname = $myts->htmlSpecialChars($myts->stripSlashesGPC($related_links['relatedlink_urlname']));
        $related_link['linktitle'] = "<a href='" . formatURL($link_url) . "' target='_blank' title='" . $link_urlname . "'>" . $link_urlname . "</a>";
        $xoopsTpl->append('related_link', $related_link);
    }
    $relatedlink_count = (isset($related_link) && $related_link > 0) ? 1 : 0;
    $xoopsTpl->assign('relatedlink', intval($relatedlink_count));
    unset($query);
    unset($amount);
}
//$xoopsTpl->assign('relatedlink', $article->relatedlink());

/* related intro */
$query = "SELECT * FROM " . $xoopsDB->prefix(MAG_INTRO) . " WHERE intro_topicid = $article_id ORDER by intro_no";
$result = $xoopsDB->query($query);
$amount = $xoopsDB->getRowsNum($result);
if ($amount > 0)
{
    while ($intro_links = $xoopsDB->fetchArray($result))
    {
        $link_id = $intro_links['intro_id'];
        $link_title = $myts->htmlSpecialChars($intro_links['intro_title']);
        $intro_link['linktitle'] = "<a href=\"javascript:openWithSelfMain('".MAG_ROOT_URL."/intro.php?id=".$link_id."', 'intro', '450', '300');\">".$link_title."</a>";
        $xoopsTpl->append('intro_link', $intro_link);
    }
    $intro_count = (isset($intro_link) && $intro_link > 0) ? 1 : 0;
    $xoopsTpl->assign('intro', intval($intro_count));
    unset($query);
    unset($amount);
}

/* Assign the article smarty variables to template */
$xoopsTpl->assign( 'article', $articletag );
$showfilesvalue = ( $article->getFilesCount() > 0 ) ? true : false;
$xoopsTpl->assign( 'showfilesvalue', $showfilesvalue );
$xoopsTpl->assign( array(
        'lang_aboutauthor' => _MAG_ABOUTAUTHER,
        'lang_author' => _MAG_AUTHER,
        'lang_from' => _MAG_FROM,
        'lang_interest' => _MAG_INTEREST,
        'lang_artinfo' => _MAG_ARTINFO,
        'lang_page' => _MAG_PAGES,
        'lang_pagetitle' => _MAG_PAGETITLE,
        'lang_published' => _MAG_PUBLISHEDHOME,
        'lang_downloadsfor' => _MAG_DOWNLOADS,
        'lang_printer' => _MAG_PRINTERFRIENDLY,
        'lang_makepdf' => _MAG_MAKEPDF,
        'lang_subjectsitename' => sprintf( _MAG_INTFILEAT, $xoopsConfig['sitename'] ),
        'lang_subjectfound' => sprintf( _MAG_INTFILEFOUND, $xoopsConfig['sitename'] ),
        'lang_tellafriend' => _MAG_TELLAFRIEND,
        'lang_inforum' => sprintf( _MAG_INFORUMS, $article->title( "S" ) ),
        'lang_rating' => _MAG_RATING,
        'lang_votes' => _MAG_NUMVOTES,
        'lang_views' => _MAG_VIEWS,
        'lang_times' => _MAG_TIMES,
        'lang_relatedart' => _MAG_RELATEDARTS,
        'lang_relatednews' => _MAG_RELATEDNEWS,
        'lang_relatedlinks' => _MAG_RELATEDLINKS,
        'lang_relatedintro' => _MAG_RELATEDINTRO,
        'lang_articleid' => _MAG_ARTICLEID,
        'lang_size' => _MAG_ARTSIZE,
        'lang_version' => _MAG_VERSION,
        'lang_rating1' => _MAG_RATING1,
        'lang_book' => _MAG_INTRO_BOOK,
        'lang_lyric' => _MAG_INTRO_LYRIC,
        'lang_rb' => _MAG_RB
        ) );

$xoopsTpl->assign( 'xoops_pagetitle', $myts->htmlSpecialChars( $article->title() ) );

/* Display copyright info to article */
if ( isset( $xoopsModuleConfig['copyright'] ) && $xoopsModuleConfig['copyright'] == 1 )
{
   $usercopyright = ( $xoopsModuleConfig['displayname'] != 3 ) ? $article->uname()." &" : "";
   $xoopsTpl->assign( 'lang_copyright', "" . $article->title() . " &copy; " . _MAG_COPYRIGHT . " " . date( "Y" ) . " " . $usercopyright . " <a href=" . XOOPS_URL . ">" . $xoopsConfig['sitename'] . "</A>" );
}

/* Allow comment article or no */
if ( $article->allowcom )
{
    include_once XOOPS_ROOT_PATH . '/class/xoopscomments.php';
    include XOOPS_ROOT_PATH . '/include/comment_view.php';
}

/* Select left & right blocks display or no - RB 2005-05-04 */
if ( isset($article->isblocks) && $article->isblocks == 1 ){
$xoopsTpl->assign('xoops_showrblock', 0);
$xoopsTpl->assign('xoops_lblocks', 0);
}elseif ( isset($article->isblocks) && $article->isblocks == 2 ) {
$xoopsTpl->assign('xoops_showrblock', 0);
}elseif ( isset($article->isblocks) && $article->isblocks == 3 ) {
$xoopsTpl->assign('xoops_lblocks', 0);
}
include 'footer.php';
include( XOOPS_ROOT_PATH . "/footer.php" );
?>

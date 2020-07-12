<?php
// $Id: functions.php,v 1.11 2005/02/21 15:52:13 phppp Exp $
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
// Author: WF-section Team                                                   //
// URL: http://www.wf-projects.com                                         //
// Project: WF-section Project                                               //
// ------------------------------------------------------------------------- //
include XOOPS_ROOT_PATH . "/class/xoopslists.php";

/**
 * mag_error_report()
 * 
 * @return 
 */
function mag_error_report( $sql )
{
    $error = "<div>" . _AD_DBERROR . ":</div>" . $sql;
    trigger_error( $error, E_USER_ERROR );
    exit();
} 

/**
 * mag_error_report()
 * 
 * @return 
 */
function mag_dcom_check()
{
    $allow_dcom['ini_set'] = ( ini_get( 'com.allow_dcom' ) ) ? true : false ;
    if ( $allow_dcom['ini_set'] == true )
    {
        $word = new COM( "word.application" ) or false; //false;
        $allow_dcom['word'] = ( $word ) ? true : false;
        if ( $word || $word != false )
        {
            $word->Visible = 0;
            $word->Quit();
            $word->Release();
            $word = null;
            unset( $word );
        } 
    } 
    return $allow_dcom;
} 

function mag_getFileExtension( $filename )
{
    return ltrim( strrchr( $filename, '.' ), '.' );
} 

function mag_cleanHtml( $text = '' )
{
    include MAG_ROOT_PATH . "/class/htmlcleaner.php";
    $text = htmlcleaner::cleanup( $text );
    return $text;
} 

function mag_strip_tags( $text = '', $allowed_tags = "<p><br /><br>" )
{
    $text = strip_tags( $text, $allowed_tags );
    return $text;
} 

function mag_serverstats()
{
    $modhandler = &xoops_gethandler( 'module' );
    $versioninfo = &$modhandler->getByDirname( "system" );

    echo "<fieldset><legend style='font-weight: bold; color: #900;'>" . _AM_MAG_SERVERSTATE . "</legend>";
    echo "<div style='padding: 8px;'>";
    echo "<div><b>" . _AM_MAG_PHP_VERSION . ":</b> " . PHP_VERSION . "</div>";
    echo "<div><b>" . _AM_MAG_XOOPS_VERSION . ":</b> " . XOOPS_VERSION . "</div><br />";
    echo "<div><b>" . _AM_MAG_XOOPS_INSTALLED_PATH . ":</b> " . XOOPS_ROOT_PATH . "</div>";
    echo "<div><b>" . _AM_MAG_XOOPS_URL . ":</b> " . XOOPS_URL . "</div><br />";

    $free_space = disk_free_space( XOOPS_ROOT_PATH );
    $total_space = disk_total_space( XOOPS_ROOT_PATH );
    $used_space = ( $total_space - $free_space );

    echo "<div><b>" . _AM_MAG_DATABASE_TYPE . ":</b> " . XOOPS_DB_TYPE . "</div>";
    echo "<div><b>" . _AM_MAG_DATABASE_NAME . ":</b> " . XOOPS_DB_NAME . "</div>";
    echo "<div><b>" . _AM_MAG_DATABASE_PREFIX . ":</b> " . XOOPS_DB_PREFIX . "</div>";

	$allow_com = mag_dcom_check();	
	if ( !$allow_com['ini_set'] && $allow_com['word'] )
    {
    	$word = new COM( "word.application" ) or false;
        echo "<br /><div><b>MS Word version:</b>{$word->Version}</div>\n";
        $word->Quit();
        $word->Release();
        $word = null;
        unset( $word );
    } 

    echo "<br /><div>" . _AM_MAG_SPHPINI . "</div>\n";
    $safemode = ( ini_get( 'safe_mode' ) ) ? _AM_MAG_ON . _AM_MAG_SAFEMODEPROBLEMS : _AM_MAG_OFF;
    $registerglobals = ( ini_get( 'register_globals' ) == '' ) ? _AM_MAG_OFF : _AM_MAG_ON;
    $magic_quotes_gpc = ( ini_get( 'magic_quotes_gpc' ) == '' ) ? _AM_MAG_OFF : _AM_MAG_ON;
    $downloads = ( ini_get( 'file_uploads' ) ) ? _AM_MAG_ON : _AM_MAG_OFF;

    $gdlib = ( function_exists( 'gd_info' ) ) ? _AM_MAG_GDON : _AM_MAG_GDOFF;
    echo "<li>" . _AM_MAG_GDLIBSTATUS . $gdlib;
    if ( function_exists( 'gd_info' ) )
    {
        if ( true == $gdlib = gd_info() )
        {
            echo "<li>" . _AM_MAG_GDLIBVERSION . "<b>" . $gdlib['GD Version'] . "</b><br /><br />\n\n";
        } 
    } 
    echo "<li>" . _AM_MAG_SAFEMODESTATUS . $safemode;
    echo "<li>" . _AM_MAG_REGISTERGLOBALS . $registerglobals;
    echo "<li>" . _AM_MAG_MAGICQUOTESGPC . $magic_quotes_gpc . " (" . _AM_MAG_BIGUESER . ")<br /><br />\n\n";

    echo "<li>" . _AM_MAG_SERVERUPLOADSTATUS . $downloads . "";
    echo "<li>" . _AM_MAG_MAXUPLOADSIZE . " <b>" . ini_get( 'upload_max_filesize' ) . "</b>\n";
    echo "<li>" . _AM_MAG_MAXPOSTSIZE . " <b>" . ini_get( 'post_max_size' ) . "</b><br /><br />\n\n";
    $output_compression = ( ini_get( 'output_compression' ) ) ? _AM_MAG_ON : _AM_MAG_OFF;
    echo "<li>" . _AM_MAG_ZLIBCOMPRESSION . " <b>{$output_compression}</b>\n";
    echo "<li>" . _AM_MAG_MAXINPUTTIME . " <b>" . ini_get( 'max_input_time' ) . "</b>\n";
    $allow_url_fopen = ( ini_get( 'allow_url_fopen' ) ) ? _AM_MAG_ON : _AM_MAG_OFF;
    echo "<li>" . _AM_MAG_FOPENURL . " <b>{$allow_url_fopen}</b>\n";

    echo "</div>";

    echo "</fieldset><br />";
} 
/**
 * checkBrowser()
 * 
 * @return 
 */
function mag_checkBrowser()
{
	return true;
}

/**
 * mag_loadfile()
 * 
 * @param  $file 
 * @return 
 */
function mag_loadfile( $file )
{
    global $xoopsModuleConfig;

    $file = MAG_HTML_PATH . "/" . $file;
    if ( file_exists( $file ) && false !== $fp = fopen( $file, 'r' ) )
    {
        $file = fread( $fp, filesize( $file ) );
    } 
    fclose( $fp );
    return $file;
} 

/**
 * mag_displayimage()
 * 
 * Displays a image with or without a link and alttext.
 * 
 * @param string $image -  	Defaults to 'blank.gif
 * @param string $path -	If Path empty then it is omitted.
 * @param string $imgsource -	Error check and !empty then display image, else display default image
 * @param string $alttext -	Alttext for images else display nothing
 * @return 
 */
function mag_displayimage( $image = 'blank.png', $path = '', $imgsource = '', $alttext = '', $height = '', $width = '', $vspace = 0, $hspace = 0, $border = 0 )
{
    global $xoopsConfig, $xoopsUser, $xoopsModule, $xoopsModuleConfig;

    $image = trim( $image );
    $path = trim( $path );
    $imgsource = trim( $imgsource );
    $alttext = trim( $alttext );
    $showimage = '';

    if ( empty( $image ) )
    {
        return $showimage;
        exit();
    }

    if ( file_exists( XOOPS_ROOT_PATH . "/" . $imgsource . "/" . $image ) )
    {
        if ( $path ) $showimage = "<a href=" . XOOPS_URL . "/" . $path . ">";
        $showimage .= "<img src=" . XOOPS_URL . "/" . $imgsource . "/" . $image . " border=" . $border . " alt=" . $alttext . "";
        if ( $height )
        {
            $showimage .= " height = " . $height . ",";
        } 
        if ( $width )
        {
            $showimage .= " width = " . $width . "";
        } 
        $showimage .= " vspace = " . $vspace . ", hspace = " . $hspace . " /></a>";
    } 
    else
    {
        if ( is_object( $xoopsUser ) && $xoopsUser->isAdmin( $xoopsModule->mid() ) )
        {
            $showimage .= "<img src='" . MAG_IMAGES_URL . "/brokenimg.jpg' border='0' alt='' /></a>";
        }
    } 
    return $showimage;
} 

/**
 * mag_createthumb()
 * 
 * @param  $img_name 
 * @param  $img_path 
 * @param  $img_savepath 
 * @param integer $img_w 
 * @param integer $img_h 
 * @param integer $quality 
 * @param integer $update 
 * @param integer $aspect 
 * @return 
 */
function mag_createthumb( $img_name, $img_path, $img_savepath, $img_w = 100, $img_h = 100, $quality = 100, $update = 0, $aspect = 1 )
{ 
    // global $xoopsConfig;
    $image_path = XOOPS_ROOT_PATH . "/$img_path/$img_name";
    $image_url = XOOPS_URL . "/$img_path/$img_name";

    if ( !function_exists( 'gd_info' ) ) return $image_url;

    $savefile = XOOPS_ROOT_PATH .  "/" . $img_savepath . "/" . $img_w . "x" . $img_h . "_" . $img_name;
    $savepath = $savefile;

    if ( $update == 0 && file_exists( $savepath ) )
    {
        return XOOPS_URL . "/" . $savefile;
    } 

    list( $width, $height, $type, $attr ) = getimagesize( $image_path, $info );
    if ( $width < $img_w && $height < $img_h ) return $image_url;

    switch ( $type )
    {
        case 1: 
            # GIF image
            if ( function_exists( 'imagecreatefromgif' ) )
            {
                $img = imagecreatefromgif( $image_path );
            } 
            else
            {
                $img = imageCreateFromPNG( $image_path );
            } 
            break;
        case 2: 
            # JPEG image
            $img = imageCreateFromJPEG( $image_path );
            break;
        case 3: 
            # PNG image
            $img = imageCreateFromPNG( $image_path );
            break;
        default:
            return $image_url;
    } 

    if ( !empty( $img ) )
    {
        /**
         * Get image size and scale ratio
         */
        $scale = min( $img_w / $width, $img_h / $height );
        /**
         * If the image is larger than the max shrink it
         */
        if ( $scale < 1 && $aspect == 1 )
        {
            $img_w = floor( $scale * $width );
            $img_h = floor( $scale * $height );
        } 
        $img_w = ( $img_w > $width )?$width:$img_w;
        $img_h = ( $img_h > $width )?$width:$img_h;
        /**
         * Create a new temporary image
         */
        if ( function_exists( 'imagecreatetruecolor' ) )
        {
            $tmp_img = imagecreatetruecolor( $img_w, $img_h );
        } 
        else
        {
            $tmp_img = imagecreate( $img_w, $img_h );
        } 
        /**
         * Copy and resize old image into new image
         */
        ImageCopyResampled( $tmp_img, $img, 0, 0, 0, 0, $img_w, $img_h, $width, $height );
        imagedestroy( $img );
        flush();
        $img = $tmp_img;
    } 
    switch ( $type )
    {
        case 1:
        default: 
            # GIF image
            if ( function_exists( 'imagegif' ) )
            {
                imagegif( $img, $savepath );
            } 
            else
            {
                imagePNG( $img, $savepath );
            } 
            break;
        case 2: 
            # JPEG image
            imageJPEG( $img, $savepath, $quality );
            break;
        case 3: 
            # PNG image
            imagePNG( $img, $savepath );
            break;
    } 
    imagedestroy( $img );
    flush();
    return XOOPS_URL . "/" . $savefile;
} 

/**
 * displayicons()
 * 
 * @param  $time 
 * @param integer $status 
 * @param integer $counter 
 * @return 
 */
function mag_displayicons( $time, $status = 0, $counter = 0 )
{
    global $xoopsModuleConfig;

    $new = '';
    $pop = '';

    $newdate = ( time() - ( 86400 * intval( $xoopsModuleConfig['daysnew'] ) ) );
    $popdate = ( time() - ( 86400 * intval( $xoopsModuleConfig['daysupdated'] ) ) ) ;

    if ( $xoopsModuleConfig['displayicons'] != 3 )
    {
        if ( $newdate < $time )
        {
            if ( intval( $status ) )
            {
                if ( $xoopsModuleConfig['displayicons'] == 1 )
                    $new = "&nbsp;<img src=" . MAG_IMAGES_URL . "/update.gif alt='" . _MAG_ISUPDATED . "' align ='absmiddle'/>";
                if ( $xoopsModuleConfig['displayicons'] == 2 )
                    $new = "<i>Updated!</i>";
            } 
            else
            {
                if ( $xoopsModuleConfig['displayicons'] == 1 )
                    $new = "&nbsp;<img src=" . MAG_IMAGES_URL . "/newred.gif alt='" . _MAG_ISNEW . "' align ='absmiddle'/>";
                if ( $xoopsModuleConfig['displayicons'] == 2 )
                    $new = "<i>New!</i>";
            } 
        } 
        if ( $popdate < $time )
        {
            if ( $counter >= $xoopsModuleConfig['popularamount'] )
            {
                if ( $xoopsModuleConfig['displayicons'] == 1 )
                    $pop = "&nbsp;<img src =" . MAG_IMAGES_URL . "/pop.gif alt='' align ='absmiddle'/>";
                if ( $xoopsModuleConfig['displayicons'] == 2 )
                    $pop = "<i>Popular</i>";
            } 
        } 
    } 
    $icons = $new . " " . $pop;
    return $icons;
} 

/**
 * mag_convertorderbyin()
 * 
 * @param  $orderby 
 * @return 
 */
function mag_convertorderbyin( $orderby )
{
    if ( $orderby == "articleidA" ) $orderby = "articleid ASC";
    if ( $orderby == "titleA" ) $orderby = "title ASC";
    if ( $orderby == "createdA" ) $orderby = "created ASC";
    if ( $orderby == "counterA" ) $orderby = "counter ASC";
    if ( $orderby == "ratingA" ) $orderby = "rating ASC";
    if ( $orderby == "submitA" ) $orderby = "published ASC";
    if ( $orderby == "articleidD" ) $orderby = "articleid DESC";
    if ( $orderby == "titleD" ) $orderby = "title DESC";
    if ( $orderby == "createdD" ) $orderby = "created DESC";
    if ( $orderby == "counterD" ) $orderby = "counter DESC";
    if ( $orderby == "ratingD" ) $orderby = "rating DESC";
    if ( $orderby == "submitD" ) $orderby = "published DESC";
    if ( $orderby == "weight" ) $orderby = "weight";
    return $orderby;
} 

/**
 * mag_convertorderbytrans()
 * 
 * @param  $orderby 
 * @return 
 */
function mag_convertorderbytrans( $orderby )
{
    if ( $orderby == "articleid ASC" ) $orderbyTrans = _MAG_ARTICLEIDLTOM;
    if ( $orderby == "articleid DESC" ) $orderbyTrans = _MAG_ARTICLEIDMTOL;
    if ( $orderby == "counter ASC" ) $orderbyTrans = _MAG_POPULARITYLTOM;
    if ( $orderby == "counter DESC" ) $orderbyTrans = _MAG_POPULARITYMTOL;
    if ( $orderby == "title ASC" ) $orderbyTrans = _MAG_TITLEATOZ;
    if ( $orderby == "title DESC" ) $orderbyTrans = _MAG_TITLEZTOA;
    if ( $orderby == "created ASC" ) $orderbyTrans = _MAG_DATEOLD;
    if ( $orderby == "created DESC" ) $orderbyTrans = _MAG_DATENEW;
    if ( $orderby == "rating ASC" ) $orderbyTrans = _MAG_RATINGLTOH;
    if ( $orderby == "rating DESC" ) $orderbyTrans = _MAG_RATINGHTOL;
    if ( $orderby == "published ASC" ) $orderbyTrans = _MAG_SUBMITLTOH;
    if ( $orderby == "published DESC" ) $orderbyTrans = _MAG_SUBMITHTOL;
    if ( $orderby == "weight" ) $orderbyTrans = _MAG_WEIGHT;
    return $orderbyTrans;
} 

/**
 * mag_convertorderbyout()
 * 
 * @param  $orderby 
 * @return 
 */
function mag_convertorderbyout( $orderby )
{
    if ( $orderby == "articleid ASC" ) $orderby = "articleidA";
    if ( $orderby == "title ASC" ) $orderby = "titleA";
    if ( $orderby == "created ASC" ) $orderby = "createdA";
    if ( $orderby == "counter ASC" ) $orderby = "counterA";
    if ( $orderby == "rating ASC" ) $orderby = "ratingA";
    if ( $orderby == "published ASC" ) $orderby = "submitA";
    if ( $orderby == "articleid DESC" ) $orderby = "articleidD";
    if ( $orderby == "title DESC" ) $orderby = "titleD";
    if ( $orderby == "created DESC" ) $orderby = "createdD";
    if ( $orderby == "counter DESC" ) $orderby = "counterD";
    if ( $orderby == "rating DESC" ) $orderby = "ratingD";
    if ( $orderby == "published DESC" ) $orderby = "submitD";
    if ( $orderby == "weight" ) $orderby = "weight";
    return $orderby;
} 

/**
 * mag_updaterating()
 * 
 * @param  $sel_id 
 * @return 
 */
function mag_updaterating( $sel_id ) // updates rating data in itemtable for a given item
{
    global $xoopsDB;
    $totalrating = 0;
    $votesDB = 0;
    $finalrating = 0;
    $query = "select rating FROM " . $xoopsDB->prefix( MAG_VOTES ) . " WHERE lid = " . $sel_id . "";
    $voteresult = $xoopsDB->query( $query );
    $votesDB = $xoopsDB->getRowsNum( $voteresult );
    while ( list( $rating ) = $xoopsDB->fetchRow( $voteresult ) )
    {
        $totalrating += $rating;
    } 

    if ( ( $totalrating ) != 0 && $votesDB != 0 )
    {
        $finalrating = $totalrating / $votesDB;
        $finalrating = number_format( $finalrating, 4 );
    } 
    $xoopsDB->queryF( "UPDATE " . $xoopsDB->prefix( MAG_ARTICLE_DB ) . " SET rating = '$finalrating', votes = '$votesDB' WHERE articleid = $sel_id" );
} 

/**
 * myfilesize()
 * 
 * @param  $file 
 * @return 
 */
function mag_myfilesize( $file )
{
    $kb = 1024; // Kilobyte
    $mb = 1024 * $kb; // Megabyte
    $gb = 1024 * $mb; // Gigabyte
    $tb = 1024 * $gb; // Terabyte
    if ( is_file( $file ) || is_dir( $file ) )
    {
        $size = filesize( $file );
    } 
    else
    {
        $size = $file;
    } 
    if ( $size < $kb )
    {
        return $size . " Bytes";
    } 
    else if ( $size < $mb )
    {
        return round( $size / $kb, 2 ) . " KB";
    } 
    else if ( $size < $gb )
    {
        return round( $size / $mb, 2 ) . " MB";
    } 
    else if ( $size < $tb )
    {
        return round( $size / $gb, 2 ) . " GB";
    } 
    else
    {
        return round( $size / $tb, 2 ) . " TB";
    } 
} 

/**
 * mag_getIcon()
 * 
 * @param  $file 
 * @return 
 */
function mag_getIcon( $file ) // Get the icon from the filename
{
    global $IconArray;
    reset( $IconArray );
    $extension = mag_getFileExtension( $file );
    if ( $extension == "" ) return "unknown.gif";
    while ( list( $icon, $types ) = each( $IconArray ) )
    {
        foreach ( explode( " ", $types ) as $type )
        {
            if ( $extension == $type ) return $icon;
        } 
    } 
    return "unknown.gif";
} 

/**
 * get_perms()
 * 
 * @param  $file 
 * @param integer $dochmod 
 * @return 
 */
function mag_get_perms( $file, $dochmod = 0 )
{
    $error = '';
    $perms = @base_convert( fileperms( $file ), 10, 8 );
    $perms = substr( $perms, ( strlen( $perms ) - 4 ) );

    if ( $perms != '0777' )
    {
        $perms = _AM_MAG_CMODERROR;
        if ( $dochmod == 1 )
        {
            if ( !@chmod ( $file, 0777 ) )
            {
                $error = _AM_MAG_CMODERRORNOTCORRECTED;
            } 
        } 
        else
        {
            $perms = @base_convert( fileperms( $file ), 10, 8 );
            $perms = @substr( $perms, ( strlen( $perms ) - 4 ) );
        } 
    } 
    return $perms . " " . $error;
} 
/**
 * lastaccess()
 * 
 * @param  $file 
 * @param  $output 
 * @return 
 */
function mag_lastaccess( $file, $output )
{
    global $xoopsModuleConfig;
    if ( !file_exists( realpath( $file ) ) )
    {
        return false;
    } 

    $lastvisit = filectime( $file );
    $currentdate = date( 'U' );
    $difference = $currentdate - $lastvisit;
    if ( $output == "D" )
        $fileaccess = intval( $difference / 84600 );
    elseif ( $output == "S" )
        $fileaccess = $difference;
    elseif ( $output == "E1" )
        $fileaccess = formatTimestamp( $lastvisit, $xoopsModuleConfig['timestamp'] );
    elseif ( $output == "E2" )
        $fileaccess = date( 'd.m Y', $lastvisit );
    return $fileaccess;
} 

function mag_textinfo( $heading = '', $textbody = '' )
{
    echo "<fieldset><legend style='font-weight: bold; color: #900;'>" . $heading . "</legend>";
    echo "<div style='padding: 8px;'>";
    echo "<div>" . $textbody . "</div>";
    echo "</div></fieldset><br />";
} 

/**
 * adminmenu()
 * 
 * @param string $header optional : You can gice the menu a nice header
 * @param string $extra optional : You can gice the menu a nice footer
 * @param array $menu required : This is an array of links. U can
 * @param int $scount required : This will difine the amount of cells long the menu will have.  
 * NB: using a value of 3 at the moment will break the menu where the cell colours will be off display.
 * @return 
 */
function mag_admin_menu( $header = '', $menu = '', $extra = '', $scount = 5, $breadcrumb = '' )
{
    global $xoopsConfig, $xoopsModule, $xoopsUser;

    $sysModule = &XoopsModule::getByDirname( "system" );

    if ( isset( $_SERVER['PHP_SELF'] ) ) $thispage = basename( $_SERVER['PHP_SELF'] );
    $op = ( isset( $_GET['op'] ) ) ? $op = "?op=" . $_GET['op'] : '';

    echo "<table width='100%' cellspacing=0 cellpadding=0 border=0 class = outer>";
    echo "<tr>";
    echo "<td style=\"font-size: 11px; text-align: left; color: #2F5376; padding: 2px 6px; line-height: 18px; \">";

    //if ( $xoopsUser->isAdmin( $sysModule->mid() ) )
    echo "<a href=\"../../system/admin.php?fct=preferences&amp;op=showmod&amp;mod=" . $xoopsModule->getVar( 'mid' ) . "\">" . _AM_MAG_BREADC1 . "</a> | ";

    echo "<a href=\"../admin/allarticles.php\">" . _AM_MAG_BREADC2 . "</a> | ";

    //if ( $xoopsUser->isAdmin( $sysModule->mid() ) )
    echo "<a href=\"../admin/myblocksadmin.php\">" . _AM_MAG_BREADC3 . "</a> | ";
    //if ( accessadmin( "paths", 1 ) )
    echo "<a href=\"../admin/pathconfig.php\">" . _AM_MAG_BREADC4 . "</a> | ";
    //if ( accessadmin( "templates", 1 ) )
    echo "<a href=\"../admin/templates.php\">" . _AM_MAG_BREADC5 . "</a> | ";
    echo "<a href=\"../index.php\">" . _AM_MAG_BREADC6 . "</a> | ";

    echo "<a href='http://singchi.no-ip.com/hack/modules/todomod/' target='_blank'>" . _AM_MAG_BREADC7 . "</a> | \n";
    echo "<a href=\"about.php\">" . _AM_MAG_BREADC8 . "</a> | ";
    echo "<a href=\"../admin/allarticles.php?op=server_status\">" . _AM_MAG_BREADC9 . "</a>";
    echo "</td>";
    echo "</tr>";
    echo "</table><br />";

    if ( empty( $menu ) )
    {
        /**
         * You can change this part to suit your own module. Defining this here will save you form having to do this each time.
         */
        $menu = array( 
            _AM_MAG_ADMENU1 => "indexpage.php",
            _AM_MAG_ADMENU2 => "category.php",
            _AM_MAG_ADMENU3 => "index.php?op=newarticle",
            _AM_MAG_ADMENU4 => "reorder.php",
            _AM_MAG_ADMENU5 => "restore.php",
            _AM_MAG_ADMENU6 => "spotlightblock.php",
            _AM_MAG_ADMENU7 => "relatedarts.php",
            _AM_MAG_ADMENU8 => "relatedlinks.php",
            _AM_MAG_ADMENU9 => "intro.php",
            _AM_MAG_ADMENUA => "../../system/admin.php?module=" . $xoopsModule->mid() . "&status=0&limit=100&fct=comments&selsubmit=Go",
            _AM_MAG_ADMENUB => "votedata.php",
            _AM_MAG_ADMENUC => "brokendown.php",
            _AM_MAG_ADMENUD => "mimetypes.php",
            _AM_MAG_ADMENUE => "filesshow.php",
            _AM_MAG_ADMENUF => "upload.php"
            );
    } 
    if ( !is_array( $menu ) || empty( $menu ) )
    {
        echo "<table width = '100%' cellpadding= '2' cellspacing= '1' class='outer'>";
        echo "<tr><td class = even align = center><b>No items within the menu</b></td></tr></table><br />";
        return false;
    } 
    $oddnum = array( 1 => "1", 3 => "3", 5 => "5", 7 => "7", 9 => "9", 11 => "11", 13 => "13" ); 
    // number of rows per menu
    $menurows = count( $menu ) / $scount; 
    // total amount of rows to complete menu
    $menurow = ceil( $menurows ) * $scount; 
    // actual number of menuitems per row
    $rowcount = $menurow / ceil( $menurows );

    for ( $i = count( $menu ); $i < $menurow; $i++ )
    {
        $tempArray = array( 1 => null );
        $menu = array_merge( $menu, $tempArray ); 
        // $count++;
    } 
    /**
     * Sets up the width of each menu cell
     */
    $width = 100 / $scount;
    $width = ceil( $width );

    $menucount = 0;
    $count = 0;
    /**
     * Menu table output
     */
    echo "<table width = '100%' cellpadding= '2' cellspacing= '1' class='outer'><tr>";
    /**
     * Check to see if $menu is and array
     */
    if ( is_array( $menu ) )
    {
        $classcounts = 0;
        $classcol[0] = "even";

        for ( $i = 1; $i < $menurow; $i++ )
        {
            $classcounts++;
            if ( $classcounts >= $scount )
            {
                if ( $classcol[$i-1] == 'odd' )
                {
                    $classcol[$i] = ( $classcol[$i-1] == 'odd' && in_array( $classcounts, $oddnum ) ) ? "even" : "odd";
                } 
                else
                {
                    $classcol[$i] = ( $classcol[$i-1] == 'even' && in_array( $classcounts, $oddnum ) ) ? "odd" : "even";
                } 
                $classcounts = 0;
            } 
            else
            {
                $classcol[$i] = ( $classcol[$i-1] == 'even' ) ? "odd" : "even";
            } 
        } 
        unset( $classcounts );

        foreach ( $menu as $menutitle => $menulink )
        {
            if ( $thispage . $op == $menulink )
                $classcol[$count] = "outer";

            echo "<td class='" . $classcol[$count] . "' align='center' valign='middle' width= $width%>";
            if ( is_string( $menulink ) )
                echo "<a href='" . $menulink . "'>" . $menutitle . "</a></td>";
            else
                echo "&nbsp;</td>";
            $menucount++;
            $count++;
            /**
             * Break menu cells to start a new row if $count > $scount
             */
            if ( $menucount >= $scount )
            {
                echo "</tr>";
                $menucount = 0;
            } 
        } 
        echo "</table><br />";
        unset( $count );
        unset( $menucount );
    } 
    echo "<h3>" . $header . "</h3>";
    if ( $extra )
        echo "<div>$extra</div>";
} 

/**
 * MAG_getLinkedUnameFromId()
 * 
 * @param string $userid 
 * @param integer $name 
 * @param integer $admin 
 * @return 
 */
function mag_getLinkedUnameFromId( $userid = 0, $name = 0, $admin = 0 )
{
    if ( $name == 3 && $admin == 0 )
        return '';

    if ( intval( $userid ) > 0 )
    {
        $member_handler = &xoops_gethandler( 'member' );
        $user = &$member_handler->getUser( $userid );
        if ( is_object( $user ) )
        {
            $myts = &MyTextSanitizer::getInstance();
            $username = ( $name == 2 && $user->getVar( 'name' ) ) ? $user->getVar( 'name' ) : $user->getVar( 'uname' );
            $linkeduser = "<a href='" . XOOPS_URL . "/userinfo.php?uid=" . $userid . "'>" . $myts->htmlSpecialChars( $username ) . "</a>";
            return $linkeduser;
        } 
    } 
    return $GLOBALS['xoopsConfig']['anonymous'];
} 

function str_chop( $string, $length = 60, $center = false, $append = null ) // Set the default append string
{
    if ( $append === null )
    {
        $append = ( $center === true ) ? ' ... ' : ' ...';
    } // Get some measurements    
    $len_string = strlen( $string );
    $len_append = strlen( $append ); 
    // If the string is longer than the maximum length, we need to chop it
    if ( $len_string > $length )
    { 
        // Check if we want to chop it in half
        if ( $center === true )
        { 
            // Get the lengths of each segment
            $len_start = $length / 2;
            $len_end = $len_start - $len_append; // Get each segment            
            $seg_start = substr( $string, 0, $len_start );
            $seg_end = substr( $string, $len_string - $len_end, $len_end ); // Stick them together            
            $string = $seg_start . $append . $seg_end;
        } 
        else // Otherwise, just chop the end off
            {
                $string = substr( $string, 0, $length - $len_append ) . $append;
        } 
    } 
    return $string;
} 

/**
 * headings()
 * 
 * @param  $headingarray 
 * @param  $widtharray 
 * @param  $alignarray 
 * @param  $classarray 
 * @return 
 */
function mag_headings( $headingarray, $widtharray, $alignarray, $classarray )
{
    for( $i = 0; $i <= count( $headingarray )-1; $i++ )
    {
        echo "<th align = $alignarray[$i] width = $widtharray[$i]% class = $classarray[$i]>$headingarray[$i]</th>";
    } 
} 
/**
 * checkoutstatus()
 * 
 * @param integer $articleid 
 * @param integer $uid 
 * @param integer $edit 
 * @return 
 */
// function checkoutstatus( $article_id = 0 )
function checkout( $article_id = 0, $user_id = 0 )
{
    global $xoopsDB, $xoopsUser;

    if ( $article_id == 0 )
    {
        $userID = $xoopsUser->getvar( 'uid' ); 
        // $last_login = $xoopsUser->getvar( 'last_login' );
        $xoopsDB->queryF( "DELETE FROM " . $xoopsDB->prefix( MAG_CHECKIN_DB ) . " WHERE c_in_time < " . time() . " AND c_out_time = 0 AND user_id=" . $userID . "" );
    } 
    else
    {
        $xoopsDB->queryF( "UPDATE " . $xoopsDB->prefix( MAG_CHECKIN_DB ) . " SET c_out_time = " . time() . " WHERE article_id = " . $article_id );
        return true;
    } 
} 

/**
 * checkStatus()
 * 
 * @param integer $checkin_id 
 * @return 
 */
function checkStatus( $checkin_id = 0 )
{
    global $xoopsDB;

    if ( !$checkin_id ) return true;
    $result = $xoopsDB->queryF( "SELECT * FROM " . $xoopsDB->prefix( MAG_CHECKIN_DB ) . " WHERE ci_id = " . $checkin_id . " AND c_out_time = 0" );
    if ( $xoopsDB->getRowsNum( $result ) ) return true;
    return false;
} 
/**
 * checkinstatus()
 * 
 * @param integer $articleid 
 * @return 
 */
function checkin( $articleid = 0 )
{ 
    // This will be transfered to a checkin checkout class but should do the job just now
    global $xoopsDB, $xoopsUser, $xoopsModuleConfig;

    $uid = $xoopsUser->getvar( 'uid' ); 
    // $last_login = $xoopsUser->getvar( 'last_login' );
    /**
     * Remove any expried unclosed sessions from database!
     */
    // $xoopsModuleConfig["checksession"]==0 indicates no check
    $session_expire = ( isset( $xoopsModuleConfig["checksession"] ) ) ? $xoopsModuleConfig["checksession"] : $xoopsConfig['session_expire'];
    $time = time();
    $last_session = ( $time - $session_expire * 60 );

    $xoopsDB->queryF( "DELETE FROM " . $xoopsDB->prefix( MAG_CHECKIN_DB ) . " WHERE c_in_time <= " . $last_session . " and c_out_time = 0" );
    /**
     * Checks for offline user session and closes them
     */
    $sql = "SELECT user_id FROM " . $xoopsDB->prefix( MAG_CHECKIN_DB ) . " WHERE c_out_time = 0";
    $user_edit_array = $xoopsDB->fetchArray( $xoopsDB->query( $sql ) );
    if ( is_array( $user_edit_array ) )
    {
        $online_handler = &xoops_gethandler( 'online' );
        $online_uid = &$online_handler->getAll();
        $online = array();
        for ( $i = 0; $i < count( $online_uid ); $i++ )
        {
            if ( $online_uid[$i]['online_uid'] > 0 ) $online[] = $online_uid[$i]['online_uid'];
        } 
        foreach ( $user_edit_array as $userID )
        {
            if ( !in_array( $userID, $online ) )
            {
                $xoopsDB->queryF( "DELETE FROM " . $xoopsDB->prefix( MAG_CHECKIN_DB ) . " WHERE user_id=" . $userID . " AND c_out_time = 0" );
            } 
        } 
    } 
    /**
     * Check to see if the user is already editing the article, if so checks out from the previous one
     */
    $query = "DELETE FROM " . $xoopsDB->prefix( MAG_CHECKIN_DB ) . " WHERE user_id=$uid AND c_out_time = 0 AND article_id=" . $articleid;
    $result = $xoopsDB->queryF( $query );
    /**
     * Check to see if someone else is editing the article, return false
     */
    $result = $xoopsDB->query( "SELECT user_id, c_in_time, article_id FROM " . $xoopsDB->prefix( MAG_CHECKIN_DB ) . " WHERE c_out_time = 0 AND article_id=" . $articleid . " and c_in_time > " . $last_session );
    while ( list( $user_id, $c_in_time, $article_id ) = $xoopsDB->fetchrow( $result ) )
    {
        if ( $user_id != $uid )
        {
            $edit_article = new magarticle( $article_id );
            $document = $edit_article->title( "S" );
            unset( $edit_article );

            $user = xoops_getLinkedUnameFromId( $user_id );
            $timestarted = formatTimestamp( $c_in_time, "D d-m-Y h:s" ) ;

            xoops_cp_header();
            echo "<div class='confirmMsg'><br />";
            echo sprintf( _AM_MAG_ISSORRYMESSAGE2, $document, $user, $timestarted );
            echo "<br /></div>";
            echo "<br /><div ></div>";
            xoops_cp_footer();
            exit();
        } 
    } 
    /**
     * create session and return
     */
    $xoopsDB->queryF( "INSERT INTO " . $xoopsDB->prefix( MAG_CHECKIN_DB ) . " (article_id, user_id, c_in_time, c_edit) VALUES ($articleid, $uid, $time, 0)" );
    return $xoopsDB->getInsertId();
} 

/**
 * jumpbox()
 * 
 * @param string $path 
 * @param  $id 
 * @return 
 */
/*
function jumpbox( $path = 'index.php', $id )
{
    global $xoopsModuleConfig;

    $xt = new MagCategory( $id );
    //---------------------------------------------------------------- dqflyer fixed bug
    $xt -> setpid();
    $pid=$xt->pid();
    //----------------------------------------------------------------
    $jump = MAG_ROOT_URL . "/" . $path . "?";
    $tree = new MagTree( $xt->table, "id", "pid" );
    // echo "<br />aidxpathtype".$xoopsModuleConfig['aidxpathtype'];
    switch ( $xoopsModuleConfig['aidxpathtype'] )
    {
        case 1: // Local selectbox
            $ret = $tree->makeMyRootedSelBox( 'title', 'title', 0, true, $xt->id, false, 0, "location.href='{$jump}category='+this.options[this.selectedIndex].value" );
            break;
        case 2: // Linked path
            $ret = preg_replace( '/&id=/', '&category=', $tree->getNicePathFromId( $xt->id, "title", $jump ) );
            break;
        case 3: // Path and local select box
            $ret = preg_replace( '/&id=/', '&category=', $tree->getNicePathFromId( $xt->id, "title", $jump ) );
            $ret .= $tree->makeMyRootedSelBox( 'title', 'title', $xt->pid, true, $xt->id, false, $xt->id, "location.href='{$jump}category='+this.options[this.selectedIndex].value" );//dqflyer fixed
            break;
        case 4: // None
            $ret = '';
            break;
        case 0: // Full selectbox
        default: 
            // echo "<br />id:".$xt->id.";pid:".$xt->pid;
            $ret = $tree->makeMyRootedSelBox( 'title', 'title', $xt->pid, true, $xt->id, false, $xt->id, "location.href='{$jump}category='+this.options[this.selectedIndex].value" );//dqflyer fixed
            break;
    } 
    return $ret;
} 
*/
/**
 * re_direct()
 * 
 * @param  $nonredirect 
 * @return 
 */
function re_direct( $nonredirect )
{
    if ( $nonredirect == 1 )
        return false;

    redirect_header( 'javascript:history.go(-1)', 2, _AM_MAG_NORIGHTS );
    exit();
}

/**
 * mag_summarize()
 *
 * @param  $string 
 * @param integer $word_count 
 * @return 
 */
function mag_summarize( $string, $word_count = 50 )
{
    $stop_array = array( ".", "?", "!" );

    $tok = strtok( $string, " " );

    $words = 0;
    $text = "";

    while ( $tok )
    {
        $text .= " $tok"; 
        // $tok .= substr( $tok, -1 );
        if ( ( $words >= intval( $word_count ) ) && ( in_array ( substr( $tok, -1 ), $stop_array ) ) )
        return trim( $text );
        $tok = strtok( " " );

        $words++;
    } 
    return trim( $text );
} 

/**
 * mag_retmime()
 * 
 * @param  $filename 
 * @param integer $usertype 
 * @return 
 */
function mag_retmime( $filename, $usertype = 1 )
{
    global $xoopsDB;
    $ext = ltrim( strrchr( $filename, '.' ), '.' );
    $sql = "SELECT mime_types, mime_ext FROM " . $xoopsDB->prefix( MAG_MIMETYPE ) . " WHERE mime_ext = '" . strtolower( $ext ) . "'";
    $sql .= ( $usertype == 1 ) ? " AND mime_admin = 1" : " AND mime_user = 1";
    $result = $xoopsDB->query( $sql );
    list( $mime_types , $mime_ext ) = $xoopsDB->fetchrow( $result );
    $mimtypes = explode( ' ', trim( $mime_types ) );
    return $mimtypes;
} 
// Image defines from here
$uploads = "<img src=" . MAG_IMAGES_URL . "/icon/downloads.gif alt='upload' align='middle'>";
$reviews = "<img src=" . MAG_IMAGES_URL . "/icon/reviews.gif alt='review' align='middle'>";
$editimg = "<img src=" . MAG_IMAGES_URL . "/icon/edit.gif alt='edit' align='middle'>";
$editingimg = "<img src=" . MAG_IMAGES_URL . "/icon/editing.gif alt='editing' align='middle'>";
$deleteimg = "<img src=" . MAG_IMAGES_URL . "/icon/delete.gif alt='delete' align='middle'>";
$statsimg = "<img src=" . MAG_IMAGES_URL . "/icon/stats.gif alt='stats' align='middle'>";
$approve = "<img src=" . MAG_IMAGES_URL . "/icon/approve.gif alt='approve' align='middle'>";
$onimg = "<img src=" . MAG_IMAGES_URL . "/icon/on.gif alt='on' align='middle'>";
$offimg = "<img src=" . MAG_IMAGES_URL . "/icon/off.gif alt='off' align='middle'>";
$online = "<img src=" . MAG_IMAGES_URL . "/icon/on.gif alt='online' align='middle'>";
$offline = "<img src=" . MAG_IMAGES_URL . "/icon/off.gif alt='offline' align='middle'>";
$alertimg = "<img src=" . MAG_IMAGES_URL . "/icon/alert.gif alt='alert' align='middle'>";
$arrow = "<img src=" . MAG_IMAGES_URL . "/icon/arrow.gif align = 'absmiddle' alt='' align='middle'>";
$ignore = "<img src=" . MAG_IMAGES_URL . "/icon/ignore.gif align = 'absmiddle' alt='ignore' align='middle'>";
$restore = "<img src=" . MAG_IMAGES_URL . "/icon/restore.gif align = 'absmiddle' alt='restore' align='middle'>";
$relatedart = "<img src=" . MAG_IMAGES_URL . "/icon/link.gif alt='related link' align='middle'>";
$relatedurl = "<img src=" . MAG_IMAGES_URL . "/icon/urllink.gif alt='related url' align='middle'>";
$addart = "<img src=" . MAG_IMAGES_URL . "/icon/add.gif alt='add article' align='middle'>";
$restoreimg = "<img src=" . MAG_IMAGES_URL . "/icon/restore.gif alt='restore' align='middle'>";
$draftimg = "<img src=" . MAG_IMAGES_URL . "/icon/draft.gif alt='draft' align='middle'>";
$blank = "<img src=" . MAG_IMAGES_URL . "/icon/blank.gif alt='' align='middle'>";
$settings = "<img src='../images/icon/settings.gif' alt='' align='middle'>";

/**
 * Change this later to mag_list
 */
function mag_getDirSelectOption( $selected, $dirarray, $namearray )
{
    echo "<select size='1' name='workd' onchange='location.href=\"upload.php?rootpath=\"+this.options[this.selectedIndex].value'>";
    echo "<option value=''>------------------</option>";
    foreach( $namearray as $namearray => $workd )
    {
        if ( $workd === $selected )
        {
            $opt_selected = "selected";
        } 
        else
        {
            $opt_selected = "";
        } 
        echo "<option value='" . htmlspecialchars( $namearray, ENT_QUOTES ) . "' $opt_selected>" . $workd . "</option>";
    } 
    echo "</select>";
} 

function big5_utf8_decode($str)
{
    return iconv("UTF-8",BIG5_ENCODER,$str);
}

?>

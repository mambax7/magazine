<?php
// $Id: common.php,v 1.6 2005/02/07 01:25:25 phppp Exp $
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
// Lets set up defines first
/**
 * Modules name and directory.  
 * 
 * If you want to set up WF-Section as a secondary
 * module this is where you can do it from.
 */
define("MODDIR", "magazine");

/**
 * Define database tables
 */

define('MAG_ARTICLE_DB', "mag_article");
define('MAG_ARTICLE_MOD_DB', "mag_article_mod");
define('MAG_RESTORE_DB', "mag_article_restore");
define('MAG_BROKEN_DB', "mag_broken");
define('MAG_CATEGORY_DB', "mag_category");
define('MAG_CHECKIN_DB', "mag_checkin");
define('MAG_CONFIG_DB', "mag_config");
define('MAG_FILES_DB', "mag_files");
define('MAG_INDEXPAGE', "mag_indexpage");
define('MAG_MAINMENU_DB', "mag_mainmenu");
define('MAG_RELATED', "mag_related");
define('MAG_RELATEDNEWS', "mag_relatednews");
define('MAG_RELATEDLINKS', "mag_relatedlink");
define('MAG_REVIEWS', "mag_reviews");
define('MAG_SPOTLIGHT', "mag_spotlightblock");
define('MAG_TEMPLATES', "mag_templates");
define('MAG_VOTES', "mag_votedata");
define('MAG_MIMETYPE', "mag_mimetypes");
define('MAG_INTRO', "mag_intro");

/**
 * Defines and data for paths
 */
global $xoopsDB, $xoopsConfig, $xoopsModule, $mimetypes, $magPathConfig, $magTemplates, $xoopsUser;

$sql = "SELECT * FROM " . $xoopsDB->prefix(MAG_CONFIG_DB) . "";
$magPathConfig = $xoopsDB->fetchArray($result = $xoopsDB->query($sql));

define('MAG_ROOT_PATH', XOOPS_ROOT_PATH . "/modules/" . MODDIR . "");
define('MAG_ROOT_URL', XOOPS_URL . "/modules/" . MODDIR . "");

//define('MAG_IMAGES_PATH', XOOPS_ROOT_PATH . "/modules/" . MODDIR . "/images");
define('MAG_IMAGES_URL', XOOPS_URL . "/modules/" . MODDIR . "/images");

define('MAG_FILE_PATH', XOOPS_ROOT_PATH . "/" . $magPathConfig['filesbasepath']);
define('MAG_FILE_URL', XOOPS_URL . "/" . $magPathConfig['filesbasepath']);

define('MAG_ARTICLEIMG_PATH', XOOPS_ROOT_PATH . "/" . $magPathConfig['graphicspath']);
define('MAG_ARTICLEIMG_URL', XOOPS_URL . "/" . $magPathConfig['graphicspath']);

define('MAG_SECTIONIMG_PATH', XOOPS_ROOT_PATH . "/" . $magPathConfig['sgraphicspath']);
define('MAG_SECTIONIMG_URL', XOOPS_URL . "/" . $magPathConfig['sgraphicspath']);

define('MAG_HTML_PATH', XOOPS_ROOT_PATH . "/" . $magPathConfig['htmlpath']);
define('MAG_HTML_URL', XOOPS_URL . "/" . $magPathConfig['htmlpath']);

define('MAG_LOGO_PATH', XOOPS_ROOT_PATH . "/" . $magPathConfig['logopath']);
define('MAG_LOGO_URL', XOOPS_URL . "/" . $magPathConfig['logopath']);

define('MAG_TEMPLATE_PATH', XOOPS_ROOT_PATH . "/modules/" . MODDIR . "/templates");
//define('MAG_TEMPLATE_URL', XOOPS_URL . "/modules/" . MODDIR . "/templates");

/**
 * Setup globals for later use
 */
$modhandler = &xoops_gethandler('module');
$magModule = &$modhandler->getByDirname(MODDIR);

if (is_object($magModule) && $magModule->getVar('isactive'))
{
	$config_handler = &xoops_gethandler('config');
    $xoopsModuleConfig = &$config_handler->getConfigsByCat(0, $magModule->getVar('mid'));
    $gperm_handler = &xoops_gethandler('groupperm');
    $groups = is_object($xoopsUser) ? $xoopsUser->getGroups() : XOOPS_GROUP_ANONYMOUS;

    $sql = "SELECT * FROM " . $xoopsDB->prefix(MAG_TEMPLATES) . "";
    $magTemplates = $xoopsDB->fetchArray($result = $xoopsDB->query($sql));
}
else
{
	$magTemplates = array("artmenublock" => "mag_block_artmenu.html",
        "artmenublock" => "mag_block_artmenu.html",
        "mainmenublock" => "mag_block_menu.html",
        "topicsblock" => "mag_block_topics.html",
        "bigartblock" => "mag_block_bigstory.html",
        "topartblock" => "mag_block_top.html",
        "newartblock" => "mag_block_new.html",
	"newdownblock" => "mag_block_newdown.html",
	"authorblock" => "mag_block_author.html",
	"spotlightblock" => "mag_block_spotlight.html"
	);
}

$IconArray = array("css.gif" => "css", "doc.gif" => "doc", "html.gif" => "html htm shtml htm", "pdf.gif" => "pdf", "txt.gif" => "conf sh shar csh ksh tcl cgi",
    "php.gif" => "php php4 php3 phtml phps", "js.gif" => "js", "sql.gif" => "sql", "pl.gif" => "pl", "gif.gif" => "gif",
    "png.gif" => "png", "bmp.gif" => "bmp", "jpg.gif" => "jpeg jpe jpg", "c.gif" => "c cpp", "rar.gif" => "rar", "zip.gif" => "zip tar gz tgz z ace arj cab bz2",
    "mid.gif" => "mid kar", "wav.gif" => "wav", "wax.gif" => "wax", "xm.gif" => "xm", "ram.gif" => "ram", "mpg.gif" => "mp1 mp2 mp3 wma",
    "mp3.gif" => "mpeg mpg mov avi rm", "exe.gif" => "exe com dll bin dat rpm deb", "txt.gif" => "txt ini xml xsl ini inf cfg log nfo ico",
    );

$MagHelperDir['application/pdf'] = "xpdf-win32";
$MagHelperDir['application/vnd.ms-excel'] = "xlhtml-win32";

?>

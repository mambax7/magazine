<?php
// $Id: xoops_version.php,v 2.0 2005/06/09 11:47:25 RB Exp $
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
Global $xoopsDB, $xoopsUser, $xoopsModule, $xoopsModuleConfig, $magTemplates, $magPathConfig, $magModule;

include_once XOOPS_ROOT_PATH . "/modules/magazine/class/common.php";
include_once MAG_ROOT_PATH . "/include/groupaccess.php";
include_once MAG_ROOT_PATH . "/class/article.php";

$modversion['name'] = _MI_MAG_NAME;
$modversion['version'] = 1.2;
$modversion['releasedate'] = "2005-11-15";
$modversion['status'] = "Final";
$modversion['description'] = _MI_MAG_DESC;
$modversion['author'] = "RB";
$modversion['credits'] = "Bugfix of the original WF-section Module by Catzwolf.";
$modversion['teammembers'] = "liquid, bender, phppp(DJ), davidl2, xtheme(RB)";

$modversion['license'] = "GNU see LICENSE";
$modversion['official'] = 0;
$modversion['image'] = "images/slogo.png";
$modversion['dirname'] = MODDIR;

$modversion['author_website_url'] = "http://singchi.no-ip.com/hack/";
$modversion['author_website_name'] = "THE ME";
$modversion['author_email'] = "rb1979@pchome.com.tw";
$modversion['demo_site_url'] = "http://singchi.no-ip.com/hack/modules/magazine/";
$modversion['demo_site_name'] = "THE ME";
$modversion['support_site_url'] = "http://singchi.no-ip.com/hack/modules/ipboard/";
$modversion['support_site_name'] = "Support Forum";
$modversion['submit_bug'] = "http://singchi.no-ip.com/hack/modules/todomod/";
$modversion['submit_feature'] = "http://singchi.no-ip.com/hack/modules/todomod/";

$modversion['sqlfile']['mysql'] = "sql/mysql.sql";

$modversion['tables'][1] = MAG_ARTICLE_DB;
$modversion['tables'][2] = MAG_ARTICLE_MOD_DB;
$modversion['tables'][3] = MAG_RESTORE_DB;
$modversion['tables'][4] = MAG_BROKEN_DB;
$modversion['tables'][5] = MAG_CATEGORY_DB;
$modversion['tables'][6] = MAG_CHECKIN_DB;
$modversion['tables'][7] = MAG_CONFIG_DB;
$modversion['tables'][8] = MAG_FILES_DB;
$modversion['tables'][9] = MAG_INDEXPAGE;
$modversion['tables'][10] = MAG_MAINMENU_DB;
$modversion['tables'][11] = MAG_RELATED;
$modversion['tables'][12] = MAG_RELATEDNEWS;
$modversion['tables'][13] = MAG_RELATEDLINKS;
$modversion['tables'][14] = MAG_REVIEWS;
$modversion['tables'][15] = MAG_SPOTLIGHT;
$modversion['tables'][16] = MAG_TEMPLATES;
$modversion['tables'][17] = MAG_VOTES;
$modversion['tables'][18] = MAG_MIMETYPE;
$modversion['tables'][19] = MAG_INTRO;

$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/allarticles.php";
$modversion['adminmenu'] = "admin/menu.php";

$modversion['blocks'][1]['file'] = "mag_artmenu.php";
$modversion['blocks'][1]['name'] = _MI_MAG_BNAME_ARTMENU;
$modversion['blocks'][1]['description'] = "Shows Article menu";
$modversion['blocks'][1]['show_func'] = "b_mag_artmenu";
$modversion['blocks'][1]['template'] = $magTemplates['artmenublock'];

$modversion['blocks'][2]['file'] = "mag_menu.php";
$modversion['blocks'][2]['name'] = _MI_MAG_BNAME_MENU;
$modversion['blocks'][2]['description'] = "Shows category menu";
$modversion['blocks'][2]['show_func'] = "b_mag_menu";
$modversion['blocks'][2]['template'] = $magTemplates['mainmenublock'];

$modversion['blocks'][3]['file'] = "mag_topics.php";
$modversion['blocks'][3]['name'] = _MI_MAG_TOPICS;
$modversion['blocks'][3]['description'] = "Section Category";
$modversion['blocks'][3]['show_func'] = "b_mag_topics_show";
$modversion['blocks'][3]['template'] = $magTemplates['topicsblock'];

$modversion['blocks'][4]['file'] = "mag_bigstory.php";
$modversion['blocks'][4]['name'] = _MI_MAG_BNAME3;
$modversion['blocks'][4]['description'] = "Shows most read story of the day";
$modversion['blocks'][4]['show_func'] = "b_mag_bigstory_show";
$modversion['blocks'][4]['template'] = $magTemplates['bigartblock'];

$modversion['blocks'][5]['file'] = "mag_new.php";
$modversion['blocks'][5]['name'] = _MI_MAG_BNAME4;
$modversion['blocks'][5]['description'] = "Shows top read news articles";
$modversion['blocks'][5]['show_func'] = "b_mag_new_show";
$modversion['blocks'][5]['edit_func'] = "b_mag_new_edit";
//$modversion['blocks'][5]['options'] = "counter|10|19";
$modversion['blocks'][5]['options'] = "counter|5|0|1|1|1|1|100";
$modversion['blocks'][5]['template'] = $magTemplates['topartblock'];

$modversion['blocks'][6]['file'] = "mag_new.php";
$modversion['blocks'][6]['name'] = _MI_MAG_BNAME5;
$modversion['blocks'][6]['description'] = "Shows recent articles";
$modversion['blocks'][6]['show_func'] = "b_mag_new_show";
$modversion['blocks'][6]['edit_func'] = "b_mag_new_edit";
// $modversion['blocks'][6]['options'] = "published|10|19";
$modversion['blocks'][6]['options'] = "published|5|0|1|1|1|1|100";
$modversion['blocks'][6]['template'] = $magTemplates['newartblock'];

$modversion['blocks'][7]['file'] = "mag_newdown.php";
$modversion['blocks'][7]['name'] = _MI_MAG_BNAME6;
$modversion['blocks'][7]['description'] = "Shows article downloads";
$modversion['blocks'][7]['show_func'] = "b_mag_down_show";
$modversion['blocks'][7]['edit_func'] = "b_mag_down_edit";
$modversion['blocks'][7]['options'] = "date|5|0";
$modversion['blocks'][7]['template'] = $magTemplates['newdownblock'];

$modversion['blocks'][8]['file'] = "mag_author.php";
$modversion['blocks'][8]['name'] = _MI_MAG_BNAME7;
$modversion['blocks'][8]['description'] = "Show Info about Author";
$modversion['blocks'][8]['show_func'] = "b_mag_author_show";
$modversion['blocks'][8]['options'] = "published|5|25|news|newbb|wfdownloads";
$modversion['blocks'][8]['template'] = $magTemplates['authorblock'];


$modversion['blocks'][9]['file'] = 'mag_spotlight.php';
$modversion['blocks'][9]['name'] = _MI_MAG_BNAME8;
$modversion['blocks'][9]['description'] = 'Article Spotlight';
$modversion['blocks'][9]['show_func'] = 'b_mag_spotlight';
$modversion['blocks'][9]['template'] = $magTemplates['spotlightblock'];

$modversion['blocks'][10]['file'] = "mag_new.php";
$modversion['blocks'][10]['name'] = _MI_MAG_BNAME9;
$modversion['blocks'][10]['description'] = "Shows random articles";
$modversion['blocks'][10]['show_func'] = "b_mag_new_show";
$modversion['blocks'][10]['edit_func'] = "b_mag_new_edit";
$modversion['blocks'][10]['options'] = "random|5|0|1|1|1|1|100";
$modversion['blocks'][10]['template'] = $magTemplates['topartblock'];

// Menu
$modversion['hasMain'] = 1;

$sql = $xoopsDB->query("SELECT * FROM " . $xoopsDB->prefix(MAG_MAINMENU_DB)." Order by weight" );
$i = 1;
while (list($mm_id, $ca_id, $title, $type, $groupid) = $xoopsDB->fetchRow($sql))
{
    if (isset($xoopsModuleConfig['shortcatlenmenu']) && $xoopsModuleConfig['shortcatlenmenu'] != 0)
    {
        $title = xoops_substr($title, 0, $xoopsModuleConfig['shortcatlenmenu'], $trimmarker = '...');
    }

    if (Mag_checkAccess($groupid))
    {
        if ($type == 1)
        {
            $modversion['sub'][$i]['name'] = $title;
            $modversion['sub'][$i]['url'] = "article.php?articleid=" . $ca_id . "";
        }
        else
        { 
            $modversion['sub'][$i]['name'] = $title;
            $modversion['sub'][$i]['url'] = "artindex.php?category=" . $ca_id . "";
        }
        $i++;
    }
}

if (is_object($xoopsUser) && isset($xoopsModuleConfig['submitarts']))
{
    if (is_object($magModule) && $magModule->getVar('isactive'))
    {
        $groups = $xoopsUser->getGroups();
        if (array_intersect($xoopsModuleConfig['submitarts'], $groups))
        {
            $modversion['sub'][$i + 1]['name'] = _MI_MAG_SUBMIT;
            $modversion['sub'][$i + 1]['url'] = "submit.php";
        }
    }
}
else
{
    if (is_object($magModule) && $magModule->getVar('isactive'))
    {
        if (isset($xoopsModuleConfig['anonpost']) && $xoopsModuleConfig['anonpost'] == 1)
        {
            $modversion['sub'][$i + 1]['name'] = _MI_MAG_SUBMIT;
            $modversion['sub'][$i + 1]['url'] = "submit.php";
        }
    }
}

$modversion['sub'][$i + 2]['name'] = _MI_MAG_POPULAR;
$modversion['sub'][$i + 2]['url'] = "topten.php?counter=1";
$modversion['sub'][$i + 3]['name'] = _MI_MAG_RATEFILE;
$modversion['sub'][$i + 3]['url'] = "topten.php?rate=1";
$modversion['sub'][$i + 4]['name'] = _MI_MAG_ARCHIVE;
$modversion['sub'][$i + 4]['url'] = "archive.php";
// Search
$modversion['hasSearch'] = 1;
$modversion['search']['file'] = "include/search.inc.php";
$modversion['search']['func'] = "magazine_search";
// Comments
$modversion['hasComments'] = 1;
$modversion['comments']['pageName'] = 'article.php';
$modversion['comments']['itemName'] = 'articleid';
// Comment callback functions
$modversion['comments']['callbackFile'] = 'include/comment_functions.php';
$modversion['comments']['callback']['approve'] = 'magazine_com_approve';
$modversion['comments']['callback']['update'] = 'magazine_com_update';

/**
 * Templates
 */
$templatedir = MAG_TEMPLATE_PATH;
$files = array();
$dir = opendir($templatedir);
while (($file = readdir($dir)) !== false)
{
    if ((!preg_match("/^[.]{1,2}$/", $file) && preg_match("/html/", $file)))
    {
        if (strtolower($file) != 'cvs' && !is_dir($file))
        {
            array_push($files, $file);
        }
    }
}
sort($files);
closedir($dir);

for ($i = 0;$i < Count($files);$i++)
{
    $modversion['templates'][$i]['file'] = $files[$i];
    $modversion['templates'][$i]['description'] = '';
}

$modversion['config'][1]['name'] = 'displayname';
$modversion['config'][1]['title'] = '_MI_MAG_NAMEDISPLAY';
$modversion['config'][1]['description'] = '_MI_MAG_DISPLAYNAMEDSC';
$modversion['config'][1]['formtype'] = 'select';
$modversion['config'][1]['valuetype'] = 'int';
$modversion['config'][1]['default'] = 1;
$modversion['config'][1]['options'] = array('_MI_MAG_DISPLAYNAME1' => 1, '_MI_MAG_DISPLAYNAME2' => 2, '_MI_MAG_DISPLAYNAME3' => 3);

$modversion['config'][2]['name'] = 'atavar';
$modversion['config'][2]['title'] = '_MI_MAG_SHOWATAV';
$modversion['config'][2]['description'] = '_MI_MAG_SHOWATAVDSC';
$modversion['config'][2]['formtype'] = 'select';
$modversion['config'][2]['valuetype'] = 'int';
$modversion['config'][2]['default'] = 1;
$modversion['config'][2]['options'] = array('_MI_MAG_DISPLAYATAV1' => 1, '_MI_MAG_DISPLAYATAV2' => 2, '_MI_MAG_DISPLAYATAV3' => 3);

$modversion['config'][3]['name'] = 'displayemail';
$modversion['config'][3]['title'] = '_MI_MAG_USEREMAILDISPLAY';
$modversion['config'][3]['description'] = '_MI_MAG_DISPLAYUSEREMAILDSC';
$modversion['config'][3]['formtype'] = 'select';
$modversion['config'][3]['valuetype'] = 'int';
$modversion['config'][3]['default'] = 2;
$modversion['config'][3]['options'] = array('_MI_MAG_DISPLAYEMAIL1' => 1, '_MI_MAG_DISPLAYEMAIL2' => 2, '_MI_MAG_DISPLAYEMAIL3' => 3);

$modversion['config'][4]['name'] = 'ssltext';
$modversion['config'][4]['title'] = '_MI_MAG_SSLTEXT';
$modversion['config'][4]['description'] = '_MI_MAG_SSLTEXTDSC';
$modversion['config'][4]['formtype'] = 'textbox';
$modversion['config'][4]['valuetype'] = 'text';
$modversion['config'][4]['default'] = 'copyright';

$modversion['config'][5]['name'] = 'ssltextcolor';
$modversion['config'][5]['title'] = '_MI_MAG_SSLCOLOR';
$modversion['config'][5]['description'] = '_MI_MAG_SSLCOLORDSC';
$modversion['config'][5]['formtype'] = 'textbox';
$modversion['config'][5]['valuetype'] = 'text';
$modversion['config'][5]['default'] = '#FFFFFF';

/*
$modversion['config'][4]['name'] = 'displayinfo';
$modversion['config'][4]['title'] = '_MI_MAG_DISPLAYINFO';
$modversion['config'][4]['description'] = '_MI_MAG_DISPLAYINFODSC';
$modversion['config'][4]['formtype'] = 'select_multi';
$modversion['config'][4]['valuetype'] = 'array';
$modversion['config'][4]['default'] = array(2, 3, 4, 5, 6, 7, 8);
$modversion['config'][4]['options'] = array(
    '_MI_MAG_DISPLAYINFO2' => 2,
    '_MI_MAG_DISPLAYINFO3' => 3, '_MI_MAG_DISPLAYINFO4' => 4,
    '_MI_MAG_DISPLAYINFO5' => 5, '_MI_MAG_DISPLAYINFO6' => 6,
    '_MI_MAG_DISPLAYINFO7' => 7, '_MI_MAG_DISPLAYINFO8' => 8,
    '_MI_MAG_DISPLAYINFO9' => 9);

$modversion['config'][5]['name'] = 'displayinfolist';
$modversion['config'][5]['title'] = '_MI_MAG_DISPLAYINFOLIST';
$modversion['config'][5]['description'] = '_MI_MAG_DISPLAYINFOLISTDSC';
$modversion['config'][5]['formtype'] = 'select_multi';
$modversion['config'][5]['valuetype'] = 'array';
$modversion['config'][5]['default'] = array(1, 2, 3, 4, 5, 6);
$modversion['config'][5]['options'] = array('_MI_MAG_DISPLAYINFO1' => 1, '_MI_MAG_DISPLAYINFO2' => 2, '_MI_MAG_DISPLAYINFO3' => 3, '_MI_MAG_DISPLAYINFO4' => 4, '_MI_MAG_DISPLAYINFO5' => 5, '_MI_MAG_DISPLAYINFO6' => 6);
*/

$modversion['config'][6]['name'] = 'copyright';
$modversion['config'][6]['title'] = '_MI_MAG_ADDCOPYRIGHT';
$modversion['config'][6]['description'] = '_MI_MAG_ADDCOPYRIGHTDSC';
$modversion['config'][6]['formtype'] = 'yesno';
$modversion['config'][6]['valuetype'] = 'int';
$modversion['config'][6]['default'] = 1;

$modversion['config'][7]['name'] = 'novote';
$modversion['config'][7]['title'] = '_MI_MAG_SHOWVOTESINART';
$modversion['config'][7]['description'] = '_MI_MAG_SHOWVOTESINARTDSC';
$modversion['config'][7]['formtype'] = 'yesno';
$modversion['config'][7]['valuetype'] = 'int';
$modversion['config'][7]['default'] = 1;

$modversion['config'][8]['name'] = 'displayicons';
$modversion['config'][8]['title'] = '_MI_MAG_ICONDISPLAY';
$modversion['config'][8]['description'] = '_MI_MAG_DISPLAYICONDSC';
$modversion['config'][8]['formtype'] = 'select';
$modversion['config'][8]['valuetype'] = 'int';
$modversion['config'][8]['default'] = 1;
$modversion['config'][8]['options'] = array('_MI_MAG_DISPLAYICON1' => 1, '_MI_MAG_DISPLAYICON2' => 2, '_MI_MAG_DISPLAYICON3' => 3);

$modversion['config'][9]['name'] = 'daysnew';
$modversion['config'][9]['title'] = '_MI_MAG_DAYSNEW';
$modversion['config'][9]['description'] = '_MI_MAG_DAYSNEWDSC';
$modversion['config'][9]['formtype'] = 'textbox';
$modversion['config'][9]['valuetype'] = 'int';
$modversion['config'][9]['default'] = 7;

$modversion['config'][10]['name'] = 'daysupdated';
$modversion['config'][10]['title'] = '_MI_MAG_DAYSUPDATED';
$modversion['config'][10]['description'] = '_MI_MAG_DAYSUPDATEDDSC';
$modversion['config'][10]['formtype'] = 'textbox';
$modversion['config'][10]['valuetype'] = 'int';
$modversion['config'][10]['default'] = 7;

$modversion['config'][11]['name'] = 'popularamount';
$modversion['config'][11]['title'] = '_MI_MAG_POPULARS';
$modversion['config'][11]['description'] = '_MI_MAG_POPULARSDSC';
$modversion['config'][11]['formtype'] = 'select';
$modversion['config'][11]['valuetype'] = 'int';
$modversion['config'][11]['default'] = 500;
$modversion['config'][11]['options'] = array('200' => 200, '350' => 350, '500' => 500, '1000' => 1000, '1500' => 1500, '2000' => 2000);

$modversion['config'][12]['name'] = 'shortcatlenmenu';
$modversion['config'][12]['title'] = '_MI_MAG_SHORTMENLEN';
$modversion['config'][12]['description'] = '_MI_MAG_SHORTMENLENDSC';
$modversion['config'][12]['formtype'] = 'textbox';
$modversion['config'][12]['valuetype'] = 'int';
$modversion['config'][12]['default'] = 0;

$modversion['config'][13]['name'] = 'shortcatlen';
$modversion['config'][13]['title'] = '_MI_MAG_SHORTCATLEN';
$modversion['config'][13]['description'] = '_MI_MAG_SHORTCATLENDSC';
$modversion['config'][13]['formtype'] = 'textbox';
$modversion['config'][13]['valuetype'] = 'int';
$modversion['config'][13]['default'] = 0;

$modversion['config'][14]['name'] = 'shortartlen';
$modversion['config'][14]['title'] = '_MI_MAG_SHORTARTLEN';
$modversion['config'][14]['description'] = '_MI_MAG_SHORTARTLENDSC';
$modversion['config'][14]['formtype'] = 'textbox';
$modversion['config'][14]['valuetype'] = 'int';
$modversion['config'][14]['default'] = 0;

$modversion['config'][15]['name'] = 'showcatpic';
$modversion['config'][15]['title'] = '_MI_MAG_SHOWCATPIC';
$modversion['config'][15]['description'] = '_MI_MAG_SHOWCATPICDSC';
$modversion['config'][15]['formtype'] = 'yesno';
$modversion['config'][15]['valuetype'] = 'int';
$modversion['config'][15]['default'] = 1;

$modversion['config'][16]['name'] = 'display_default_image';
$modversion['config'][16]['title'] = '_MI_MAG_DIS_DEF_IMAGE';
$modversion['config'][16]['description'] = '_MI_MAG_DIS_DEF_IMAGEDSC';
$modversion['config'][16]['formtype'] = 'select';
$modversion['config'][16]['valuetype'] = 'int';
$modversion['config'][16]['default'] = 4;
$modversion['config'][16]['options'] = array('_MI_MAG_DISPLAYDIMAGE1' => 1, '_MI_MAG_DISPLAYDIMAGE2' => 2,
    '_MI_MAG_DISPLAYDIMAGE3' => 3, '_MI_MAG_DISPLAYDIMAGE4' => 4);

$modversion['config'][17]['name'] = 'default_image';
$modversion['config'][17]['title'] = '_MI_MAG_DEF_IMAGE';
$modversion['config'][17]['description'] = '_MI_MAG_DEF_IMAGEDSC';
$modversion['config'][17]['formtype'] = 'textbox';
$modversion['config'][17]['valuetype'] = 'text';
$modversion['config'][17]['default'] = 'demo.gif';

/*
$modversion['config'][18]['name'] = 'use_thumbs';
$modversion['config'][18]['title'] = '_MI_MAG_USETHUMBS';
$modversion['config'][18]['description'] = '_MI_MAG_USETHUMBSDSC';
$modversion['config'][18]['formtype'] = 'yesno';
$modversion['config'][18]['valuetype'] = 'int';
$modversion['config'][18]['default'] = 1;

$modversion['config'][19]['name'] = 'updatethumbs';
$modversion['config'][19]['title'] = '_MI_MAG_IMGUPDATE';
$modversion['config'][19]['description'] = '_MI_MAG_IMGUPDATEDSC';
$modversion['config'][19]['formtype'] = 'yesno';
$modversion['config'][19]['valuetype'] = 'int';
$modversion['config'][19]['default'] = 1;

$modversion['config'][20]['name'] = 'imagequality';
$modversion['config'][20]['title'] = '_MI_MAG_QUALITY';
$modversion['config'][20]['description'] = '_MI_MAG_QUALITYDSC';
$modversion['config'][20]['formtype'] = 'textbox';
$modversion['config'][20]['valuetype'] = 'int';
$modversion['config'][20]['default'] = 100;

$modversion['config'][21]['name'] = 'keepaspect';
$modversion['config'][21]['title'] = '_MI_MAG_KEEPASPECT';
$modversion['config'][21]['description'] = '_MI_MAG_KEEPASPECTDSC';
$modversion['config'][21]['formtype'] = 'yesno';
$modversion['config'][21]['valuetype'] = 'int';
$modversion['config'][21]['default'] = 0;
*/

$modversion['config'][22]['name'] = 'sectionnums';
$modversion['config'][22]['title'] = '_MI_MAG_SECTIONNUMS';
$modversion['config'][22]['description'] = '_MI_MAG_SECTIONNUMSDSC';
$modversion['config'][22]['formtype'] = 'textbox';
$modversion['config'][22]['valuetype'] = 'text';
$modversion['config'][22]['default'] = 4;

/*
$modversion['config'][22]['name'] = 'submenus';
$modversion['config'][22]['title'] = '_MI_MAG_SHOWSUBMENU';
$modversion['config'][22]['description'] = '_MI_MAG_SHOWSUBMENUDSC';
$modversion['config'][22]['formtype'] = 'yesno';
$modversion['config'][22]['valuetype'] = 'int';
$modversion['config'][22]['default'] = 0;
*/

$modversion['config'][23]['name'] = 'showartlistings';
$modversion['config'][23]['title'] = '_MI_MAG_SHOWARTLISTINGS';
$modversion['config'][23]['description'] = '_MI_MAG_SHOWARTLISTINGSDSC';
$modversion['config'][23]['formtype'] = 'select';
$modversion['config'][23]['valuetype'] = 'int';
$modversion['config'][23]['default'] = 2;
$modversion['config'][23]['options'] = array('_MI_MAG_SHOWARTLISTING1' => 1, '_MI_MAG_SHOWARTLISTING2' => 2, '_MI_MAG_SHOWARTLISTING3' => 3, '_MI_MAG_SHOWARTLISTING4' => 4);

$modversion['config'][24]['name'] = 'showartlistamount';
$modversion['config'][24]['title'] = '_MI_MAG_SHOWARTLISTAMOUNT';
$modversion['config'][24]['description'] = '_MI_MAG_SHOWARTLISTAMOUNTDSC';
$modversion['config'][24]['formtype'] = 'select';
$modversion['config'][24]['valuetype'] = 'int';
$modversion['config'][24]['default'] = 5;
$modversion['config'][24]['options'] = array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7);

$modversion['config'][25]['name'] = 'articlesapage';
$modversion['config'][25]['title'] = '_MI_MAG_ARTICLESAPAGE';
$modversion['config'][25]['description'] = '_MI_MAG_ARTICLESAPAGEDSC';
$modversion['config'][25]['formtype'] = 'select';
$modversion['config'][25]['valuetype'] = 'int';
$modversion['config'][25]['default'] = 20;
$modversion['config'][25]['options'] = array('5' => 5, '10' => 10, '15' => 15, '20' => 20, '25' => 25, '30' => 30, '50' => 50);

$modversion['config'][26]['name'] = 'lastart';
$modversion['config'][26]['title'] = '_MI_MAG_LASTART';
$modversion['config'][26]['description'] = '_MI_MAG_LASTARTDSC';
$modversion['config'][26]['formtype'] = 'select';
$modversion['config'][26]['valuetype'] = 'int';
$modversion['config'][26]['default'] = 30;
$modversion['config'][26]['options'] = array('5' => 5, '10' => 10, '15' => 15, '20' => 20, '25' => 25, '30' => 30, '50' => 50);

/*
$modversion['config'][27]['name'] = 'aidxpathtype';
$modversion['config'][27]['title'] = '_MI_MAG_PATHTYPE';
$modversion['config'][27]['description'] = '_MI_MAG_PATHTYPEDSC';
$modversion['config'][27]['formtype'] = 'select';
$modversion['config'][27]['valuetype'] = 'int';
$modversion['config'][27]['default'] = 0 ;
$modversion['config'][27]['options'] = array(_MI_MAG_SELECTBOX => 0,
    _MI_MAG_SELECTSUBS => 1,
    _MI_MAG_LINKEDPATH => 2,
    _MI_MAG_LINKSANDSELECT => 3,
    _MI_MAG_NONE => 4);

$modversion['config'][28]['name'] = 'orderbox';
$modversion['config'][28]['title'] = '_MI_MAG_SHOWORDERBOX';
$modversion['config'][28]['description'] = '_MI_MAG_SHOWORDERBOXDSC';
$modversion['config'][28]['formtype'] = 'yesno';
$modversion['config'][28]['valuetype'] = 'int';
$modversion['config'][28]['default'] = 0;
*/

$modversion['config'][29]['name'] = 'cidxorder';
$modversion['config'][29]['title'] = '_MI_MAG_SECTIONSORT';
$modversion['config'][29]['description'] = '_MI_MAG_SECTIONSORTDSC';
$modversion['config'][29]['formtype'] = 'select';
$modversion['config'][29]['valuetype'] = 'text';
$modversion['config'][29]['default'] = 'weight';
$modversion['config'][29]['options'] = array(_MI_MAG_TITLE . $qa => 'title ASC',
    _MI_MAG_TITLE . $qd => 'title DESC',
    _MI_MAG_WEIGHT => 'weight');

$modversion['config'][30]['name'] = 'aidxorder';
$modversion['config'][30]['title'] = '_MI_MAG_ARTICLESSORT';
$modversion['config'][30]['description'] = '_MI_MAG_ARTICLESSORTDSC';
$modversion['config'][30]['formtype'] = 'select';
$modversion['config'][30]['valuetype'] = 'text';
$modversion['config'][30]['default'] = 'published DESC';
$modversion['config'][30]['options'] = array(_MI_MAG_TITLE . $qa => 'title ASC',
    _MI_MAG_TITLE . $qd => 'title DESC',
    _MI_MAG_SUBMITTED2 . $qa => 'published ASC' ,
    _MI_MAG_SUBMITTED2 . $qd => 'published DESC',
    _MI_MAG_RATING . $qa => 'rating ASC',
    _MI_MAG_RATING . $qd => 'rating DESC',
    _MI_MAG_POPULARITY . $qa => 'hits ASC',
    _MI_MAG_POPULARITY . $qd => 'hits DESC',
    _MI_MAG_WEIGHT => 'weight');

$modversion['config'][31]['name'] = 'autoweight';
$modversion['config'][31]['title'] = '_MI_MAG_AUTOWEIGHT';
$modversion['config'][31]['description'] = '_MI_MAG_AUTOWEIGHTDSC';
$modversion['config'][31]['formtype'] = 'yesno';
$modversion['config'][31]['valuetype'] = 'int';
$modversion['config'][31]['default'] = 0;

$modversion['config'][32]['name'] = 'autosummary';
$modversion['config'][32]['title'] = '_MI_MAG_AUTOSUMMARY';
$modversion['config'][32]['description'] = '_MI_MAG_AUTOSUMMARYDSC';
$modversion['config'][32]['formtype'] = 'yesno';
$modversion['config'][32]['valuetype'] = 'int';
$modversion['config'][32]['default'] = 0;

$modversion['config'][33]['name'] = 'summary_type';
$modversion['config'][33]['title'] = '_MI_MAG_NAMESUMTYPE';
$modversion['config'][33]['description'] = '_MI_MAG_NAMESUMTYPEDSC';
$modversion['config'][33]['formtype'] = 'select';
$modversion['config'][33]['valuetype'] = 'int';
$modversion['config'][33]['default'] = 1;
$modversion['config'][33]['options'] = array('_MI_MAG_NAMESUMTYPE1' => 1, '_MI_MAG_NAMESUMTYPE2' => 2);

$modversion['config'][34]['name'] = 'summary_amount';
$modversion['config'][34]['title'] = '_MI_MAG_NAMESUMAMOUNT';
$modversion['config'][34]['description'] = '_MI_MAG_NAMESUMAMOUNTDSC';
$modversion['config'][34]['formtype'] = 'textbox';
$modversion['config'][34]['valuetype'] = 'int';
$modversion['config'][34]['default'] = 50;
/*
$modversion['config'][35]['name'] = '';
$modversion['config'][35]['title'] = '';
$modversion['config'][35]['description'] = '';
$modversion['config'][35]['formtype'] = '';
$modversion['config'][35]['valuetype'] = '';
$modversion['config'][35]['default'] = '';
*/
$modversion['config'][36]['name'] = 'phpcoding';
$modversion['config'][36]['title'] = '_MI_MAG_PHPCODING';
$modversion['config'][36]['description'] = '_MI_MAG_PHPCODINGDSC';
$modversion['config'][36]['formtype'] = 'yesno';
$modversion['config'][36]['valuetype'] = 'int';
$modversion['config'][36]['default'] = 1;

$modversion['config'][37]['name'] = 'version_inc';
$modversion['config'][37]['title'] = '_MI_MAG_VERSIONINC';
$modversion['config'][37]['description'] = '_MI_MAG_VERSIONINCDSC';
$modversion['config'][37]['formtype'] = 'textbox';
$modversion['config'][37]['valuetype'] = 'text';
$modversion['config'][37]['default'] = 0.01;

$modversion['config'][38]['name'] = 'use_restore';
$modversion['config'][38]['title'] = '_MI_MAG_USERESTORE';
$modversion['config'][38]['description'] = '_MI_MAG_USERESTOREDSC';
$modversion['config'][38]['formtype'] = 'yesno';
$modversion['config'][38]['valuetype'] = 'int';
$modversion['config'][38]['default'] = 0;

$modversion['config'][39]['name'] = 'timestamp';
$modversion['config'][39]['title'] = '_MI_MAG_DEFAULTTIME';
$modversion['config'][39]['description'] = '_MI_MAG_DEFAULTTIMEDSC';
$modversion['config'][39]['formtype'] = 'textbox';
$modversion['config'][39]['valuetype'] = 'text';
$modversion['config'][39]['default'] = 'Y-m-d';

$modversion['config'][40]['name'] = 'submitarts';
$modversion['config'][40]['title'] = '_MI_MAG_GROUPSUBMITART';
$modversion['config'][40]['description'] = '_MI_MAG_GROUPSUBMITARTDSC';
$modversion['config'][40]['formtype'] = 'group_multi';
$modversion['config'][40]['valuetype'] = 'array';
$modversion['config'][40]['default'] = '1 2 3';

$modversion['config'][41]['name'] = 'anonpost';
$modversion['config'][41]['title'] = '_MI_MAG_ANONPOST';
$modversion['config'][41]['description'] = '_MI_MAG_ANONPOSTDSC';
$modversion['config'][41]['formtype'] = 'yesno';
$modversion['config'][41]['valuetype'] = 'int';
$modversion['config'][41]['default'] = 0;

$modversion['config'][42]['name'] = 'autoapprove';
$modversion['config'][42]['title'] = '_MI_MAG_AUTOAPPROVE';
$modversion['config'][42]['description'] = '_MI_MAG_AUTOAPPROVEDSC';
$modversion['config'][42]['formtype'] = 'yesno';
$modversion['config'][42]['valuetype'] = 'int';
$modversion['config'][42]['default'] = 0;

$modversion['config'][43]['name'] = 'notifysubmit';
$modversion['config'][43]['title'] = '_MI_MAG_NOTIFYSUBMIT';
$modversion['config'][43]['description'] = '_MI_MAG_NOTIFYSUBMITDSC';
$modversion['config'][43]['formtype'] = 'yesno';
$modversion['config'][43]['valuetype'] = 'int';
$modversion['config'][43]['default'] = 0;

$modversion['config'][44]['name'] = 'htmltextarea';
$modversion['config'][44]['title'] = '_MI_MAG_USEHTMLAREA';
$modversion['config'][44]['description'] = '_MI_MAG_USEHTMLAREADSC';
$modversion['config'][44]['formtype'] = 'yesno';
$modversion['config'][44]['valuetype'] = 'int';
$modversion['config'][44]['default'] = 0;

$modversion['config'][45]['name'] = 'submitfiles';
$modversion['config'][45]['title'] = '_MI_MAG_SUBMITFILES';
$modversion['config'][45]['description'] = '_MI_MAG_SUBMITFILESDSC';
$modversion['config'][45]['formtype'] = 'group_multi';
$modversion['config'][45]['valuetype'] = 'array';
$modversion['config'][45]['default'] = '1 2 3';

$modversion['config'][46]['name'] = 'adminmimecheck';
$modversion['config'][46]['title'] = '_MI_MAG_ADMINMIMECHECK';
$modversion['config'][46]['description'] = '_MI_MAG_ADMINMIMECHECKDSC';
$modversion['config'][46]['formtype'] = 'yesno';
$modversion['config'][46]['valuetype'] = 'int';
$modversion['config'][46]['default'] = 1;

$modversion['config'][47]['name'] = 'nomaxfilesize';
$modversion['config'][47]['title'] = '_MI_MAG_NOUPLOADFILESIZE';
$modversion['config'][47]['description'] = '_MI_MAG_NOUPLOADFILESIZEDSC';
$modversion['config'][47]['formtype'] = 'yesno';
$modversion['config'][47]['valuetype'] = 'int';
$modversion['config'][47]['default'] = 0;

$modversion['config'][48]['name'] = 'noimgsizecheck';
$modversion['config'][48]['title'] = '_MI_MAG_NOUPIMGSIZE';
$modversion['config'][48]['description'] = '_MI_MAG_NOUPIMGSIZEDSC';
$modversion['config'][48]['formtype'] = 'yesno';
$modversion['config'][48]['valuetype'] = 'int';
$modversion['config'][48]['default'] = 0;

$modversion['config'][49]['name'] = 'maxfilesize';
$modversion['config'][49]['title'] = '_MI_MAG_UPLOADFILESIZE';
$modversion['config'][49]['description'] = '_MI_MAG_UPLOADFILESIZEDSC';
$modversion['config'][49]['formtype'] = 'textbox';
$modversion['config'][49]['valuetype'] = 'int';
$modversion['config'][49]['default'] = 2097152;

$modversion['config'][50]['name'] = 'imgheight';
$modversion['config'][50]['title'] = '_MI_MAG_IMGHEIGHT';
$modversion['config'][50]['description'] = '_MI_MAG_IMGHEIGHTDSC';
$modversion['config'][50]['formtype'] = 'textbox';
$modversion['config'][50]['valuetype'] = 'int';
$modversion['config'][50]['default'] = 400;

$modversion['config'][51]['name'] = 'imgwidth';
$modversion['config'][51]['title'] = '_MI_MAG_IMGWIDTH';
$modversion['config'][51]['description'] = '_MI_MAG_IMGWIDTHDSC';
$modversion['config'][51]['formtype'] = 'textbox';
$modversion['config'][51]['valuetype'] = 'int';
$modversion['config'][51]['default'] = 400;

$modversion['config'][52]['name'] = 'rss_charset';
$modversion['config'][52]['title'] = '_MI_MAG_RSS_UTF8';
$modversion['config'][52]['description'] = '_MI_MAG_RSS_DESCRIPTION';
$modversion['config'][52]['formtype'] = 'yesno';
$modversion['config'][52]['valuetype'] = 'int';
$modversion['config'][52]['default'] = 0;

$modversion['config'][53]['name'] = 'file_prefix';
$modversion['config'][53]['title'] = '_MI_MAG_FILEPREFIX';
$modversion['config'][53]['description'] = '_MI_MAG_FILEPREFIXDSC';
$modversion['config'][53]['formtype'] = 'textbox';
$modversion['config'][53]['valuetype'] = 'text';
$modversion['config'][53]['default'] = '';

$modversion['config'][54]['name'] = 'checksession';
$modversion['config'][54]['title'] = '_MI_MAG_CHECKSESSION';
$modversion['config'][54]['description'] = '_MI_MAG_CHECKSESSIONDSC';
$modversion['config'][54]['formtype'] = 'textbox';
$modversion['config'][54]['valuetype'] = 'int';
$modversion['config'][54]['default'] = '';

$modversion['config'][55]['name'] = 'user_amount';
$modversion['config'][55]['title'] = '_MI_MAG_USERAMOUNT';
$modversion['config'][55]['description'] = '_MI_MAG_USERAMOUNTDSC';
$modversion['config'][55]['formtype'] = 'textbox';
$modversion['config'][55]['valuetype'] = 'int';
$modversion['config'][55]['default'] = '300';
/*
$modversion['config'][56]['name'] = 'wysiwygeditor';
$modversion['config'][56]['title'] = '_MI_MAG_WYSIWYG';
$modversion['config'][56]['description'] = '_MI_MAG_WYSIWYGDSC';
$modversion['config'][56]['formtype'] = 'yesno';
$modversion['config'][56]['valuetype'] = 'int';
$modversion['config'][56]['default'] = 0;

$modversion['config'][57]['name'] = 'userwysiwygeditor';
$modversion['config'][57]['title'] = '_MI_MAG_USERWYSIWYG';
$modversion['config'][57]['description'] = '_MI_MAG_USERWYSIWYGDSC';
$modversion['config'][57]['formtype'] = 'yesno';
$modversion['config'][57]['valuetype'] = 'int';
$modversion['config'][57]['default'] = 0;
*/
$modversion['config'][58]['name'] = 'groupswysiwygeditor';
$modversion['config'][58]['title'] = '_MI_MAG_GROUPUSERWYSIWYG';
$modversion['config'][58]['description'] = '_MI_MAG_SUBMITARTDSC';
$modversion['config'][58]['formtype'] = 'group_multi';
$modversion['config'][58]['valuetype'] = 'array';
$modversion['config'][58]['default'] = '1 2 3';

$modversion['config'][59]['name'] = 'selectforum';
$modversion['config'][59]['title'] = '_MI_MAG_SELECTFORUM';
$modversion['config'][59]['description'] = '_MI_MAG_SELECTFORUMDSC';
$modversion['config'][59]['formtype'] = 'select';
$modversion['config'][59]['valuetype'] = 'int';
$modversion['config'][59]['default'] = 1;
$modversion['config'][59]['options'] = array('_MI_MAG_DISPLAYFORUM1' => 1, '_MI_MAG_DISPLAYFORUM2' => 2, '_MI_MAG_DISPLAYFORUM3' => 3);

$modversion['config'][60]['name'] = 'selectform';
$modversion['config'][60]['title'] = '_MI_MAG_SELECTFORM';
$modversion['config'][60]['description'] = '_MI_MAG_SELECTFORMDSC';
$modversion['config'][60]['formtype'] = 'select';
$modversion['config'][60]['valuetype'] = 'int';
$modversion['config'][60]['default'] = 1;
$modversion['config'][60]['options'] = array('_MI_MAG_DISPLAYFORM1' => 1, '_MI_MAG_DISPLAYFORM2' => 2, '_MI_MAG_DISPLAYFORM3' => 3);
 
$modversion['config'][61]['name'] = 'selectstore';
$modversion['config'][61]['title'] = '_MI_MAG_SELECTSTORE';
$modversion['config'][61]['description'] = '_MI_MAG_SELECTSTOREDSC';
$modversion['config'][61]['formtype'] = 'select';
$modversion['config'][61]['valuetype'] = 'int';
$modversion['config'][61]['default'] = 1;
$modversion['config'][61]['options'] = array('_MI_MAG_DISPLAYSTORE1' => 1, '_MI_MAG_DISPLAYSTORE2' => 2, '_MI_MAG_DISPLAYSTORE3' => 3);

$modversion['config'][62]['name'] = 'selectsign';
$modversion['config'][62]['title'] = '_MI_MAG_SELECTSIGN';
$modversion['config'][62]['description'] = '_MI_MAG_SELECTSIGNDSC';
$modversion['config'][62]['formtype'] = 'select';
$modversion['config'][62]['valuetype'] = 'int';
$modversion['config'][62]['default'] = 1;
$modversion['config'][62]['options'] = array('_MI_MAG_DISPLAYSIGN1' => 1, '_MI_MAG_DISPLAYSIGN2' => 2, '_MI_MAG_DISPLAYSIGN3' => 3);

?>

<?php
// $Id: brokenfile.php,v 1.8 2005/06/09 11:39:28 RB Exp $
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
include "header.php";
include_once MAG_ROOT_PATH . "/include/functions.php";
include_once MAG_ROOT_PATH . "/class/article.php";
include_once MAG_ROOT_PATH . "/class/index.php";

if (!empty($_POST['submit']))
{
    global $xoopsModule, $xoopsModuleConfig;

    $sender = (is_object($xoopsUser)) ? $xoopsUser->getVar('uid') : 0;
    $ip = getenv("REMOTE_ADDR");
    $lid = intval($_POST['lid']); 
    // Check if REG user is trying to report twice.
    $result = $xoopsDB->query("SELECT COUNT(*) FROM " . $xoopsDB->prefix(MAG_BROKEN_DB) . " WHERE lid=$lid");
    list ($count) = $xoopsDB->fetchRow($result);
    if ($count > 0)
    {
        redirect_header("index.php", 2, _MAG_ALREADYREPORTED);
        exit();
    }
    else
    {
        $newid = $xoopsDB->genId($xoopsDB->prefix(MAG_BROKEN_DB) . "_reportid_seq");
        $sql = sprintf("INSERT INTO %s (reportid, lid, sender, ip, date) VALUES (%u, %u, %u, '%s', %u)", $xoopsDB->prefix(MAG_BROKEN_DB), $newid, $lid, $sender, $ip, time());
        $xoopsDB->query($sql) or exit(); 

        /**
         * Send email to the owner of the download stating that it is broken
         */
        $file = new MagFiles($lid);
        $article = new MagArticle($file->articleid);

        $user = new XoopsUser($article->uid());
        $subdate = formatTimestamp($file->date, $xoopsModuleConfig['timestamp']);
        $title = $file->getFileShowName();
        $subject = _MAG_BROKENREPORTED;

        $xoopsMailer = &getMailer();
        $xoopsMailer->useMail();
        $template_dir = MAG_ROOT_PATH . "/language/" . $xoopsConfig['language'] . "/mail_template";

        $xoopsMailer->setTemplateDir($template_dir);
        $xoopsMailer->setTemplate('filebroken_notify.tpl');
        $xoopsMailer->setToEmails($user->email());
        $xoopsMailer->setFromEmail($xoopsConfig['adminmail']);
        $xoopsMailer->setFromName($xoopsConfig['sitename']);
        $xoopsMailer->assign("X_UNAME", $user->uname());
        $xoopsMailer->assign("SITENAME", $xoopsConfig['sitename']);
        $xoopsMailer->assign("X_ADMINMAIL", $xoopsConfig['adminmail']);
        $xoopsMailer->assign('X_SITEURL', XOOPS_URL . '/');
        $xoopsMailer->assign("X_TITLE", $title);
        $xoopsMailer->assign("X_SUB_DATE", $subdate);
        $xoopsMailer->assign('X_DOWNLOAD', MAG_ROOT_URL . '/download.php?fileid=' . $lid);
        $xoopsMailer->setSubject($subject);
        //$xoopsMailer->setBody($message);
        $xoopsMailer->send();
        redirect_header("index.php", 2, _MAG_THANKSFORINFO);
        exit();
    }
}
else
{
    $xoopsOption['template_main'] = 'mag_brokenfile.html';
    include XOOPS_ROOT_PATH . '/header.php';
    /**
     * Begin Main page Heading etc
     */
    /*
    $index = new MagIndex(5);
    $catarray['imageheader'] = $index->imageheader("S");
    $catarray['indexheading'] = $index->indexheading("S");
    $catarray['indexheader'] = $index->indexheader("S");
    $catarray['indexfooting'] = $index->indexfooting("S");
    $catarray['indexfooter'] = $index->indexfooter("S");
    $catarray['indexheaderalign'] = $index->indexheaderalign();
    $catarray['indexfooteralign'] = $index->indexfooteralign();
    $xoopsTpl->assign('catarray', $catarray);
    */
    $lid = (isset($_GET['lid']) && $_GET['lid'] > 0) ? intval($_GET['lid']) : 0;

    $file = new MagFiles($lid);
    $totalfiles = MagFiles::getfilecount();
    /**
     * file info
     */
    $article = new MagArticle($file->articleid);
    $filename = $file->getFileRealName();
    $filename = MAG_FILE_PATH . "/" . $filename;
    $size = ( is_file( $filename ) ) ? mag_myfilesize( $filename ) : 0;

    $sql = "SELECT * FROM " . $xoopsDB->prefix(MAG_BROKEN_DB) . " WHERE lid = $lid";
    $broke_arr = $xoopsDB->fetchArray($xoopsDB->query($sql));;

    if (is_array($broke_arr))
    {
        global $xoopsModuleConfig;

        $down['arttitle'] = $article->title;
        $down['title'] = $file->getFileShowName("S");
        $down['reporter'] = MAG_getLinkedUnameFromId(intval($broke_arr['sender']), $xoopsModuleConfig['displayname'], 0);
        $down['id'] = trim($broke_arr['reportid']);
        $down['date'] = formatTimestamp($broke_arr['date'], $xoopsModuleConfig['timestamp']);

        $xoopsTpl->assign('down', $down);
        $xoopsTpl->assign('lang_alreadyreported', _MAG_RESOURCEREPORTED);
        $xoopsTpl->assign('lang_arttitle', _MAG_TITLE);
        $xoopsTpl->assign('lang_filetitle', _MAG_FILETITLE);
        $xoopsTpl->assign('lang_reporter', _MAG_REPORTER);
        $xoopsTpl->assign('lang_sourceid', _MAG_RESOURCEID);
        $xoopsTpl->assign('lang_datereported', _MAG_DATEREPORTED);
        $xoopsTpl->assign('lang_cancel', _MAG_BACK);
        $xoopsTpl->assign('brokenreport', true);
        
        //$xoopsTpl->assign('lang_thanksforreporting', _MAG_THANKSFORREPORTING);
    }
    else
    {
        $amount = $xoopsDB->getRowsNum($sql);
        // check file true
        if (!$file->fileid)
        {
            redirect_header('index.php', 0 , _MAG_THISFILEDOESNOTEXIST);
            exit();
        }
        // date
        $down['arttitle'] = $article->title;
        $down['title'] = $file->getFileShowName(); //trim($down_arr['title']);
        $down['size'] = $size;
        $down['updated'] = formatTimestamp($file->date, $xoopsModuleConfig['timestamp']);
        $down['publisher'] = MAG_getLinkedUnameFromId($article->uid, $xoopsModuleConfig['displayname'], 0);

        $xoopsTpl->assign('down', $down);
        $xoopsTpl->assign('lang_beforesubmit', _MAG_BEFORESUBMIT);
        $xoopsTpl->assign('lang_arttitle', _MAG_TITLE);
        $xoopsTpl->assign('lang_filetitle', _MAG_FILETITLE);
        $xoopsTpl->assign('lang_publisher' , _MAG_PUBLISHER);
        $xoopsTpl->assign('lang_size' , _MAG_FILESIZE);
        $xoopsTpl->assign('lang_subdate' , _MAG_SUBMITDATE);
        $xoopsTpl->assign('file_id', $lid);
        $xoopsTpl->assign('lang_submitbroken', _MAG_SUBMITBROKEN);
        $xoopsTpl->assign('lang_cancel', _MAG_CANCEL);

        //$xoopsTpl->assign('lang_reportbroken', _MAG_BROKENREPORT);
        //$xoopsTpl->assign('lang_thanksforhelp', _MAG_THANKSFORHELP);
        //$xoopsTpl->assign('lang_forsecurity', _MAG_FORSECURITY);
    }
    include_once XOOPS_ROOT_PATH . '/footer.php';
}

?>

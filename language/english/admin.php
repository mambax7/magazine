<?php
// $Id: admin.php,v 1.8 2005/05/21 12:46:00 RB Exp $
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

// %%%%%%        Admin Module Name  Documents         %%%%%
Global $xoopsConfig;
// Action Lang defines
define( "_AM_MAG_YES", "Yes" );
define( "_AM_MAG_NO", "No" );
define( "_AM_MAG_SAVE", "Save" );
define( "_AM_MAG_SAVECHANGE", "Save Changes" );
define("_AM_UPDATED", "Database Updated Successfully!");
define( "_AM_MAG_EDIT", "Edit" );
define( "_AM_MAG_MODIFY", "Modify" );
define( "_AM_MAG_DELETE", "Delete" );
define( "_AM_MAG_CANCEL", "Cancel" );
define( "_AM_MAG_ACTION", "Action" );
define( "_AM_MAG_COPY1", "Clone" );
define( "_AM_MAG_NOARTICLEFOUND", "NOTICE: There are no Documents that match this criteria" );
define( "_AM_MAG_DISABLEHTML", " Disable HTML Tags" );
define( "_AM_MAG_DISABLESMILEY", " Disable Smilie Icons" );
define( "_AM_MAG_DISABLEXCODE", " Disable XOOPS Codes" );
define( "_AM_MAG_DISABLEIMAGES", " Disable Images" );
define( "_AM_MAG_DISABLEBREAK", " Use XOOPS linebreak conversion?" );
define( "_AM_MAG_STRIPHTML", " Strip HTML Tags" );
define( "_AM_MAG_CLEANHTML", " Strip unwanted MS Word tags" );
define( "_AM_MAG_NORIGHTS", "You do not have sufficient rights to access this area" );

/**
 * Database defines
 */
define( "_AD_DBERROR", "There is an error while saving information to the database: <br /><br />Please report this to <a href=\"http://http://singchi.no-ip.com/hack/modules/ipboard/index.php?showforum=21\" target=\"_blank\">Magazine support site</a><br /><br />Copy and paste the error below to ensure we can quickly help you." );
define( '_AM_MAG_WFPATHCONFIG', 'Path Configuration Updated' );
define( '_AM_MAG_WFTEMPLATESCONFIG', 'Templates have been Updated' );
define( '_AM_MAG_DBUPDATED', 'Database Updated Successfully!' );
/**
 * Lang defines for breadcrumb system
 */
define( '_AM_MAG_BREADC1', 'Preferences' );
define( '_AM_MAG_BREADC2', 'Main Index' );
define( '_AM_MAG_BREADC3', 'Blocks' );
define( '_AM_MAG_BREADC4', 'Paths' );
define( '_AM_MAG_BREADC5', 'Templates' );
define( '_AM_MAG_BREADC6', 'Go to module' );
define( '_AM_MAG_BREADC7', 'Help' );
define( '_AM_MAG_BREADC8', 'About' );
define( '_AM_MAG_BREADC9', 'Server Stats' );
/**
 * Lang defines for menu system
 */
define( '_AM_MAG_ADMENU1', 'Page Management' );
define( '_AM_MAG_ADMENU2', 'Section Management' );
define( '_AM_MAG_ADMENU3', 'Create Document' );
define( '_AM_MAG_ADMENU4', 'Weight Management' );
define( '_AM_MAG_ADMENU5', 'Document Restore' );
define( '_AM_MAG_ADMENU6', 'Document Downloads' );
define( '_AM_MAG_ADMENU7', 'Related Documents' );
define( '_AM_MAG_ADMENU8', 'Related Links' );
define( '_AM_MAG_ADMENU9', 'Document Spotlight' );
define( '_AM_MAG_ADMENUA', 'Comments' );
define( '_AM_MAG_ADMENUB', 'Import Document' );
define( '_AM_MAG_ADMENUC', 'Vote Information' );
define( '_AM_MAG_ADMENUD', 'Mimetypes Management' );
define( '_AM_MAG_ADMENUE', 'Related Intro' );
define( '_AM_MAG_ADMENUF', 'Upload Images' );
/**
 * Summary information
 */
define( '_AM_MAG_SUMMARYINFO1', 'Summary Information' );
define( '_AM_MAG_SUMMARYINFO2', 'Sections' );
define( '_AM_MAG_SUMMARYINFO3', 'Published' );
define( '_AM_MAG_SUMMARYINFO4', 'Submitted' );
define( '_AM_MAG_SUMMARYINFO5', 'Modified' );
define( '_AM_MAG_SUMMARYINFO6', 'Broken' );
define( '_AM_MAG_SUMMARYINFO7', 'Documents In Edit Mode' );
/**
 * allarticles document management
 */
define( "_AM_MAG_ARTICLEMANAGEMENT", "Document Management" );
define( "_AM_MAG_DOC_SELECTION", "Document Selection" );
define( "_AM_MAG_LIST", "<b>List</b> " );
define( "_AM_MAG_LISTINCAT", " <b>In Section</b> " );
/**
 * List article types
 */
define( "_AM_MAG_ALLARTICLES", "All Documents" );
define( "_AM_MAG_PUBLARTICLES", "Published Documents" );
define( "_AM_MAG_SUBLARTICLES", "Submitted Documents" );
define( "_AM_MAG_ONLINARTICLES", "Online Documents" );
define( "_AM_MAG_OFFLIARTICLES", "Offline Documents" );
define( "_AM_MAG_EXPIREDARTICLES", "Expired Documents" );
define( "_AM_MAG_AUTOEXPIREARTICLES", "Auto Expire Documents" );
define( "_AM_MAG_AUTOARTICLES", "Auto Publish Documents" );
define( "_AM_MAG_NOSHOWARTICLES", "Non Index Documents" );
define( "_AM_MAG_HTMLFILES", "HTML File Documents" );
/**
 * menu lang defines
 */
define( "_AM_MAG_ALLTXTHEAD", "Document Management" );
define( "_AM_MAG_ALLTXT", "<div>With <b>Document Management</b> you can edit, delete or rename any Document. This mode will show every Document within the database." );
define( "_AM_MAG_PUBLISHEDTXTHEAD", "Published Documents" );
define( "_AM_MAG_PUBLISHEDTXT", "<div><b>Document Published Management</b> will show all Documents that have been published (Approved by Webmaster).<br /><br />These are all the Documents that will be shown in section listing of the Magazine index page (including all those controlled by groupaccess)." ); //added
define( "_AM_MAG_SUBMITTEDTXTHEAD", "Submitted Documents" );
define( "_AM_MAG_SUBMITTEDTXT", "<div><b>Document Submission management</b> will show all Documents submitted by your website users and allow you to moderate them.<br /><br />To approve an Document, click on <b>Edit</b> link, then highlight the <b>Approve</b> checkbox and the save the Document. The submitted Document will then be published." ); //added
define( "_AM_MAG_ONLINETXTHEAD", "Online Documents" );
define( "_AM_MAG_ONLINETXT", "<div><b>Document Online Management</b> will show all Documents which status has been set to 'online'.<br /><br />To change the status of an Document, click on the <b>Edit</b> link and highlight the <b>online</b> checkbox off/on." ); //added
define( "_AM_MAG_OFFLINETXTHEAD", "Offline Documents" );
define( "_AM_MAG_OFFLINETXT", "<div><b>Document Offline Management</b> will show all Documents which status has been set to <b>offline</b>.<br /><br />To change the status of an Document, click on the <b>Edit</b> link and highlight the <b>online</b> checkbox off/on." ); //added
define( "_AM_MAG_EXPIREDTXTHEAD", "Expired Document" );
define( "_AM_MAG_EXPIREDTXT", "<div><b>Document Expired Management</b> will show all Documents that have expired.<br /><br />You can easily reset the expire date by clicking on <b>Edit</b> link and by changing the <b>Set the date/time of expiration</b> setting." ); //added
define( "_AM_MAG_AUTOEXPIRETXTHEAD", "Auto Expire Documents" );
define( "_AM_MAG_AUTOEXPIRETXT", "<div><b>Document Auto Expired Management</b> will show all Documents that have been set to expire on a certain date.<br /><br />You can reset the expire date by clicking on <b>Edit</b> link and changing the <b>Set the date/time of expiration</b> setting." ); //added
define( "_AM_MAG_AUTOTXTHEAD", "Auto Documents" );
define( "_AM_MAG_AUTOTXT", "<div><b>Document Auto Publish Management</b> will show all Documents that have been set to publish at a future date.<br /><br />This setting can be changed by clicking on the <b>edit</b> link and changing the 'Set the date/time of publish' setting." ); //added
define( "_AM_MAG_NOSHOWTXTHEAD", "Non Index Documents" );
define( "_AM_MAG_NOSHOWTXT", "<div><b>Non Index Document</b> Theses are a special type of Documents, unlike your normal Documents these will not show up in Document index pages and will not be seen that way.&nbsp;&nbsp; Instead, these Documents will only be shown in the 'Magazine Menu' block.<br /><br />Using this option with 'Connect Selected HTML file to this Document', `No Magazine Frame` and 'Non Index Document' (Options on the edit Document page) you can show just what you want. &nbsp;&nbsp;An example of this would be a `privacy notice` page etc.<br /><br />All other options control these types of Documents also. i.e. published, expired, online/offline." ); //added
define( "_AM_MAG_HTMLFILESTXTHEAD", "HTML Documents" );
define( "_AM_MAG_HTMLFILESTXT", "HTML File Documents.  This will display all Documents that have HTML files that have been 'connected' or attached to an Document." ); //added
/**
 * Article listing defines
 */
define( "_AM_MAG_STORYID", "ID" );
define( "_AM_MAG_TITLE", "Title" );
define( "_AM_MAG_POSTER", "Author" );
define( "_AM_MAG_VERSION", "Version" );
define( "_AM_MAG_SECTION", "Section" );
define( "_AM_MAG_STATUS", "Status" );
define( "_AM_MAG_WEIGHT", "Weight" );

define( "_AM_MAG_SUBMITTED2", "Submission Date" );
define( "_AM_MAG_PUBLISHED", "Published Date" );
define( "_AM_MAG_PUBLISHEDON", "Publication Date" );
define( "_AM_MAG_SUBMITTED", "User submitted Documents" );
define( "_AM_MAG_NOTPUBLISHED", "Not published" );
define( "_AM_MAG_EXPARTS", "Expired Documents" );
define( "_AM_MAG_EXPIRED", "Auto Expire Date" );
define( "_AM_MAG_CREATED", "Created Date" );
/**
 * Blocks Management
 */
define( "_AM_MAG_BLOCKSHEADING", "Blocks Management" );
define( "_AM_MAG_BLOCKSINFO", "Blocks Information" );
define( "_AM_MAG_BLOCKSTEXT", "Blocks can be configured from the sytem=>blocks.<br />Following displays Magazine blocks. You can also edit from \"Edit\" area." );
/**
 * Path Managment
 */
define( "_AM_MAG_PATHCONFIGURATION", "Path Configuration" );
define( "_AM_MAG_PATHCONFIG", "Path and Permission Settings" );
define( "_AM_MAG_FILEPATHWARNING", "<li>Sets the path for directories used by Magazine.
	<li>A warning will be given if a path used is incorrect.
	<li>Leave a field empty if you wish Magazine to use the default path/s." );
define( "_AM_MAG_FILEPATH", "Path Configuration" );
define( "_AM_MAG_FILEUSEPATH", "Change user Path" );
define( "_AM_MAG_PATHEXIST", "Path exists!" );
define( "_AM_MAG_PATHNOTEXIST", "Path does not exist." );
define( "_AM_MAG_THUMBPATHEXIST", "Path exists!" );
define( "_AM_MAG_THUMBPATHNOTEXIST", "Path does not exist." );
define( "_AM_MAG_PATHCHECK", "<b>Path Check:</b> " );
define( "_AM_MAG_PERMISSIONS", "<b>Path Permission Check:</b>" );
define( "_AM_MAG_THUMBPATHCHECK", "<b>Thumbnail Path Check:</b> " );
define( "_AM_MAG_THUMBPERMISSIONS", "<b>Thumbnail Folder Permission Check:</b>" );
define( "_AM_MAG_RESETDEFUALTS", " Reset Path Defaults" );
define( "_AM_MAG_REVERTED", "Paths restored to their orginal settings" );
/**
 * Path Management form defines
 */
define( "_AM_MAG_CMODERROR", "Permissions incorrect: Set permission to 0777 for this path." );
define( "_AM_MAG_CMODERRORNOTCORRECTED", " and permission not corrected." );
define( "_AM_MAG_AGRAPHICPATH", "Document Image Path:<div style='padding-top: 8px;'>Path where images are stored for use as article logos.</div>" );
define( "_AM_MAG_SGRAPHICPATH", "Section Image Path:<div style='padding-top: 8px;'>Path where Section images are stored.</div>" );
define( "_AM_MAG_HTMLCPATH", "HTML Files Path:<div style='padding-top: 8px;'>Path where HTML files are stored.</div>" );
define( "_AM_MAG_LOGOPATH", "Logo Image Path:<div style='padding-top: 8px;'>Path where logo images are stored.</div>" );
define( "_AM_MAG_FILEUPLOADSPATH", "Attached Files Upload Path:<div style='padding-top: 8px;'>Path where attached files are uploaded and stored.</div>" );
define( "_AM_MAG_FILEUPLOADSTEMPPATH", "Attached Files Upload Temp Path:<div style='padding-top: 8px;'>This path is no longer required and will be removed.</div>" );
define( "_AM_MAG_AVATARPATH", "Avatar Thumb folder:<div style='padding-top: 8px;'>This folder is required for the creation of avatar thumb nails. <br />Please create this folder if the path does not exist.</div> " );
/**
 * Template management
 */
define( '_AM_MAG_MODIFYTEMPLATES', 'Template Management' );
define( '_AM_MAG_USINGTEMPLATES', 'Using Templates' );
define( '_AM_MAG_HOWTOUSETEMP', "<li>You can now choose which template to use for your each part Magazine.<br /><li><b>WARNING:</b> Wrong use could have un-desirable affects on your website, if you are unsure, then I strongly suggest you leave this area as default!" );
define( '_AM_MAG_ADDINGATEMPLATE', "<b>Adding A template</b>" );
define( '_AM_MAG_HOWTOUSETEMP2', "<li>To add a new template, copy the template file to the Magazine template folder as normal.<br /><li>Then you MUST update Magazine via <a href='../../../modules/system/admin.php?fct=modulesadmin&op=update&module=Magazine'>System Admin/Modules</a> for these changes to take affect.<br /><li>Failure to do so will result in a blank page." );
define( '_AM_MAG_DISPLAYXOOPSTEMPADMIN', 'Xoops Template Set Manager: ' );
define( '_AM_MAG_ISBLOCKS', 'Block Templates' );
define( '_AM_MAG_TEMPLDOWNLOADS', 'Download Template' );
define( '_AM_MAG_TEMPLPOLL', 'Poll Template' );
define( '_AM_MAG_TEMPLARCHIVES', 'Article Archive Template' );
define( '_AM_MAG_TEMPLARTINDEX', 'Article Index Template' );
define( '_AM_MAG_TEMPLSECINDEX', 'Section Index Template' );
define( '_AM_MAG_TEMPLART', 'Article Page: With information (Default)' );
define( '_AM_MAG_TEMPLART_INFO', 'Article Info' );
define( '_AM_MAG_TEMPLPLAINART', 'Article Page: No Frame Document' );
//define( '_AM_MAG_TEMPLTOPTEN', 'Top Ten Page Template' );
define( '_AM_MAG_ARTMENUBLOCK', 'Article Menu Block' );
define( '_AM_MAG_BIGSTORYBLOCK', 'Big Article Block' );
define( '_AM_MAG_MAINMENUBLOCK', 'Main Menu Block' );
define( '_AM_MAG_NEWARTBLOCK', 'New Article Block' );
define( '_AM_MAG_NEWDOWNBLOCK', 'Magazine Downloads Block' );
define( '_AM_MAG_TOPARTBLOCK', 'Top Article Block' );
define( '_AM_MAG_TOPICSBLOCK', 'Sections Block' );
define( '_AM_MAG_SPOTLIGHTBLOCK', 'Spotlight Block' );
define( '_AM_MAG_NEWDOWNLOADSBLOCK', 'New Downloads Block' );
define( '_AM_MAG_AUTHORBLOCK', 'Author Info Block' );
define( '_AM_MAG_VIEW', 'View' );
/**
 * Indexpage management
 */
define( '_AM_MAG_INDEXPAGE', 'Page Management' );
define( '_AM_MAG_INDEXPAGEINFO', 'Page Management Information' );
define( '_AM_MAG_INDEXPAGEINFOTXT', '<li>This area allows you to \'design\' many pages of Magazine.<li>You can easily change the image logo, heading, main index header and footer text to suit your own look.' );
define( '_AM_MAG_INDEXPAGELISTING', 'Page Management Listing' );

define( "_AM_MAG_PAGENAME2", "Page Name" );
define( "_AM_MAG_MODIFYPAGE", "Modify New Page" );
define( "_AM_MAG_ADDPAGE", "Add New Page" );
define( "_AM_MAG_INDEXHEADING", "Page Header Title:" );
define( "_AM_MAG_INDEXFOOTING", "Page Footer Title" );
define( "_AM_MAG_INDEXPAGEEDIT", "Edit Page" );
define( "_AM_MAG_SECTIONIMAGE", "Page Image:" );
define( "_AM_MAG_SECTIONHEAD", "Page Heading Text:" );
define( "_AM_MAG_SECTIONFOOT", "Page Footer Text:" );
define( "_AM_MAG_ALIGNMENT", "<b>Page Alignment: </b>" );
define( "_AM_MAG_ISDEFAULT", "Default" );
define( "_AM_MAG_PAGENAME", "Page Name:" );

/**
 * include for Magazine icons
 */
include_once 'icons_lang.php';
/**
 * include for Magazine uploader
 */
include_once 'icons_upload.php';
/**
 * not done from here
 */ 
define( "_AM_MAG_MINDEX_ACTION", "Action" );
define( "_AM_MAG_MINDEX_PAGE", "<b>Page:<b> " );
// Database Lang defines
define( "_AM_MAG_RUSUREDEL", "Are you sure you want to delete this Document?" );
// Section Lang Defines
define( "_AM_MAG_CATEGORY", "Section Title" );
define( "_AM_MAG_CATEGORYNAME", "Section Title:" );
define( "_AM_MAG_SECTIONPAGEDETAILS", "Section Page Details" );
define( "_AM_MAG_TEXTOPTIONS", "Text Formatting Options:" );
define( "_AM_MAG_GROUPPROMPT", "Section Access Privileges:<div style='padding-top: 8px;'>Select user groups who will have access to this Section.</div>" );
define( "_AM_MAG_IN", "Create As Sub-Section:<div style='padding-top: 8px;'>Leave as blank to create top level Section.</div>" );
define( "_AM_MAG_MOVETO", "Move To Section:" );
define( "_AM_MAG_CATEGORYWEIGHT", "Section Weight:<div style='padding-top: 8px;'>Determines the section display order: 0 Highest</div>" );
define( "_AM_MAG_CATEGORYDESC", "Section Description:<div style='padding-top: 8px;'>Text Only. No HTML or Xoops Codes</div>" );
define( "_AM_MAG_ADDMCATEGORY", "Create New Section" );
define( "_AM_MAG_CATEGORYTAKEMETO", "Click here to create a new Section." );
define( "_AM_MAG_NOCATEGORY", "ERROR - No Sections created." );
define( "_AM_MAG_MODIFYCATEGORY", "Modify Section" );
define( "_AM_MAG_MOVECATEGORY", "Move Section Documents" );
define( "_AM_MAG_MOVEDEL", "Move Documents" );
define( "_AM_MAG_EDITSECTION2", "Move to Section: Document will appear in the Section." );
define( "_AM_MAG_MOVE", "Move" );
define( "_AM_MAG_MOVEARTICLES", "Move Documents to Section" );
define( '_AM_MAG_DUPLICATECATEGORY', 'Duplicate Section' );
define( '_AM_MAG_COPY', 'Copy Section:' );
define( '_AM_MAG_TO', 'To:' );
define( '_AM_MAG_NEWCATEGORYNAME', 'New Section Title:' );
define( '_AM_MAG_DUPLICATE', 'Duplicate' );
define( '_AM_MAG_DUPLICATEWSUBS', 'Duplicate with Sub-Sections' );
define( "_AM_MAG_SECTIONCOPYARTICLES", "Also Copy Section Documents?" );
define( "_AM_MAG_ADDSECTIONTOMENU", "Add Section to Xoops Main Menu?" );
define( "_AM_MAG_SECTIONTEMPLATE", "Select Section Template:" );
define( "_AM_MAG_SHOWCATEGORYIMG", "<b>Display Section Image:&nbsp;</b>" );
define( "_AM_MAG_SECTIONIMAGEALIGN", "<b>Image alignment:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b>" );
define( "_AM_MAG_SECTIONIMAGEOPTION", "Section Image Options:" );
define( "_AM_MAG_SECTIONSTATUS", "Section Status:<div style='padding-top: 8px;'>Set to display Section in main Section index listing. If set to offline, section will be hidden</div>" );
define("_AM_MAG_CATEGORYHEADTITLE", "Section Heading Title:");
define( "_AM_MAG_CATEGORYHEAD", "Section Heading Text:<div style='padding-top: 8px;'>Leave as blank to create top level Section.</div>" );
define( "_AM_MAG_CATEGORYFOOTTITLE", "Section Footing Title:");
define( "_AM_MAG_CATEGORYFOOT", "Section Footer Text:<div style='padding-top: 8px;'>Leave as blank to create top level Section.</div>" );
define( "_AM_MAG_GROUPCREATEPROMPT", "Article Creation Privileges:<div style='padding-top: 8px;'>Select the user groups who may create article in this Section.</div>" );
// Document Lang defines
define( "_AM_MAG_ADDNEWAUTH", " Select New Author" );
define( "_AM_MAG_EDITARTICLE", "Document Management Information" );
define( "_AM_MAG_EDITARTICLETEXT", "<li>Here You can Add and Edit Articles" );
define( "_AM_MAG_WAYSYWTDTTAL", "WARNING: Are you sure you want to delete this Section and ALL its Documents" );
define( "_AM_MAG_FILEDEL", "WARNING: Are you sure you want to delete this File?" );
define( "_AM_MAG_UPLOADED", "Uploaded!" );
define( "_AM_MAG_SELECTITEM", "Select" );
define( "_AM_MAG_NOSELECT", "No Select");
define( "_AM_MAG_NOSELECTFILE", "No Select File");
define( "_AM_MAG_SPOTLIGHT", "Spotlight This Document in Document Index?" );
define( "_AM_MAG_SPOTLIGHTMAIN", "Spotlight This Document in Main Index?" );
define("_AM_MAG_SPOTLIGHTMAIN_DESC", "");
define( "_AM_MAG_SPOTLIGHTSPONSER", "Sponsered Document in Main Index?" );
define("_AM_MAG_SPOTLIGHTSPONSER_DESC", "");
define( "_AM_MAG_MENU", "Other Settings" );
define( "_AM_MAG_EDITMAINTEXT", "3. Text Document: (Default)<div style='padding-top: 8px;'>Word count: %s</div> " );
define( "_AM_MAG_DOC_RESTORE", "Restore to Previous version of this Document" );
/**
 * all article information text
 */
define( "_AM_MAG_APPROVE", "Approve" );
define( "_AM_MAG_BROKENDOWNLOADS", "Broken Downloads" );
define( "_AM_MAG_BROKENDOWNLOADSTEXT", "Broken Downloads Information" );
define( "_AM_MAG_NOBROKEN", "No reported broken files." );
define( '_AM_MAG_BROKENTEXT', '<li>Ignore (Ignores the report and only deletes the <b>broken file report.</b>
<li>Edit (Edit or Modify the attached file.)
<li>Delete (Deletes <b>the reported download data</b> and <b>broken file reports</b> for the file.)' );
define( "_AM_MAG_BROKENFILEIGNORED", "Report Ignored" );
define( "_AM_MAG_BROKENFILEDELETED", "File Deleted" );
define( "_AM_MAG_REPORTER", "Report Sender" );
define( "_AM_MAG_FILETITLE", "Download Title " );
define( "_AM_MAG_ARTICLETITLE", "Article Title " );
define( "_AM_MAG_ARTICLEMANAGE", "Document Management" );
define( "_AM_MAG_CANNOTHAVECATTHERE", "ERROR: This Section cannot be a child of itself!!" );
define( "_AM_MAG_SECTIONMANAGE", "Section Management" );
define( "_AM_MAG_FILEID", "File" );
define( "_AM_MAG_FILEICON", "Icon" );
define( "_AM_MAG_REALFILENAME", "Real Name");
define( "_AM_MAG_FILEMIMETYPE", "File Type" );
define( "_AM_MAG_FILESIZE", "File Size" );
define( '_AM_MAG_FILESTATS', 'Attached File Stats' );
define( '_AM_MAG_FILESTAT', 'File Stats for Document: ' );
define( '_AM_MAG_CATREORDERTEXT', '<li>You can use this area to change the current section and Document weight.<br /><li>Each section and Documents are listed by their weight.<br /><li>Main Sections are in dark blue, Sub-sections are in a lighter blue and then grey.</li><br /><li>To re-order Documents, click on a Section title and a list of its Documents will be shown.</li>' );
define( '_AM_MAG_ATTACHEDFILE', 'Document Downloads Information' );
define( '_AM_MAG_TDISPLAYSATTACHEDFILES', '<li>All attached files will shown in order of their ID.<br /><li>You can edit or delete the files from here.' );
define( '_AM_MAG_VOTEDATA', 'Display Vote Data' );
define( '_AM_MAG_VOTEDATATEXT', '<li>Vote data will be displayed in order of their ID.' );
define( '_AM_MAG_ATTACHEDFILEM', 'Download Management' );
define( '_AM_MAG_CAREORDER', 'Weight Management' );
define( '_AM_MAG_CAREORDER2', 'Section and Document Weight' );
define( "_AM_MAG_EDITHTMLFILE", "2. HTML Document:<div style='padding-top: 8px;'>This document will be used as the maintext of the page.</div>" );
define( "_AM_MAG_DOCTITLE", " Use HTML Document Title" );
define( "_AM_MAG_DOHTMLDB", " Import to Database" );
define( "_AM_MAG_EDITWORDBROWSE", "Select Word Document" );
define( '_AM_MAG_EDITGROUPPROMPT', "Document Access Permissions:<div style='padding-top: 8px;'>Select user groups who will have access to this Document.</div>" );
define( "_AM_MAG_EDITSECTION", "Create in Section:<div style='padding-top: 8px;'>Document will be created an displayed in this Section.</div>" );
define( "_AM_MAG_EDITWEIGHT", "Document Weight:<div style='padding-top: 8px;'>Determines the document display order: 0 Highest. Only has effect if Default Document Order has been set to weight.</div>" );
define( "_AM_MAG_EDITCAUTH", "Document Author:" );
define( "_AM_MAG_EDITCAUTH2", "Document Author:<div style='padding-top: 8px;font-weight: normal;color:red;'><br />Warning:<br />
If you changed any content of this document please save those changes before using the Navbar to change the author! <br />(Navbar is only used on sites with more than 300 users)</div>" );
define( "_AM_MAG_EDITLINKURL", "1. Linked Document:<div style='padding-top: 8px;'>Displays a link to another website/page in Document listing.</div>" );
define( "_AM_MAG_EDITLINKURLADD", "URL Address:<br />" );
define( "_AM_MAG_EDITLINKURLNAME", "URL Name:<br />" );
define( "_AM_MAG_EDITARTICLETITLE", "Document Title:<div style='padding-top: 8px;'>Name of the Document.</div>" );
define( "_AM_MAG_PUBLISHDATE", "Document Publish Date:" );
define( "_AM_MAG_EXPIREDATESET", " Expire date set: " );
define( "_AM_MAG_EXPIREDATE", "Document Expire Date:" );
define( "_AM_MAG_CLEARPUBLISHDATE", "<br /><br />Remove Publish date:" );
define( "_AM_MAG_CLEAREXPIREDATE", "<br /><br />Remove Expire date:" );
define( "_AM_MAG_PUBLISHDATESET", " Publish date set: " );
define( "_AM_MAG_SETDATETIMEPUBLISH", " Set the date/time of publish" );
define( "_AM_MAG_SETDATETIMEEXPIRE", " Set the date/time of expire" );
define( "_AM_MAG_SETPUBLISHDATE", "<b>Set Publish Date: </b>" );
define( "_AM_MAG_SETEXPIREDATE", "<b>Set Expire Date: </b>" );
define( "_AM_MAG_EXPIREWARNING", "<br />WARNING: Expire date set before publish date! " );
define( "_AM_MAG_EDITSUMMARY", "Document Summary:<div style='padding-top: 8px;'>Summary Text only.</div>
<div style='padding-top: 8px;'>Displays a link to another website/page in Document listing.</div>
" );
define( '_AM_MAG_EDITAUTOSUMMARY', ' Use Auto Summary' );
define( '_AM_MAG_EDITREMOVEIMAGES', ' Remove images with auto summary' );
define( '_AM_MAG_EDITSUMMARYAMOUNTW', 'Auto Summary lenght: (Words)' );
define( '_AM_MAG_EDITSUMMARYAMOUNTC', 'Auto Summary lenght: (Chars)' );
define( "_AM_MAG_EDITMOVETOTOP", " Set Document status as new" );
define( "_AM_MAG_EDITAPPROVE", "Approve This Document?" );
define( "_AM_MAG_EDITALLOWCOMENTS", " Allow Comments for Document" );
define( "_AM_MAG_EDITJUSTHTML", " No Magazine Frame" );
define( "_AM_MAG_EDITNOSHOART", " Non Index Document" );
define( "_AM_MAG_EDITOFFLINE", " Set Document Offline" );
define( "_AM_MAG_EDITMAINMENU", " Add Document to Xoops Mainmenu" );
define( "_AM_MAG_CREATEDBY", "Orginal Author: " );
define( "_AM_MAG_LASTEDITBY", "Last Edited By: " );
define( "_AM_MAG_CREATEDON", "Created On:  " );
define( "_AM_MAG_EDITEDON", "Edited On:  " );
define( "_AM_MAG_ADDAFILETOTHISDOWNLOAD", " Add a file to this Document " );

define( "_AM_MAG_EDITDISCUSSINFORUM", "Add 'Discuss in Forum' to Document?" );
define( "_AM_MAG_EDITDISCUSSINFORM", "Add 'Form Link' to Document?");
define( "_AM_MAG_EDITDISCUSSINSTORE", "Add 'Food Link' to Document?");
define( "_AM_MAG_EDITDISCUSSINSIGN", "Add 'Attendance Link' to Document?");
define( "_AM_MAG_EDITDISBLOCKS", "Selent Show Blocks or not to Document¡H");
define( "_AM_MAG_EDITDISSUMMARYBREAKS", "Disable Linebreak conversion for summary?" );

define( "_AM_MAG_USECATEGORYACCESS", " Use Section Permissions for this document?" );
define( '_AM_MAG_REORDERID', 'ID' );
define( '_AM_MAG_REORDERPID', 'PID' );
define( '_AM_MAG_REORDERTITLE', 'Title' );
define( '_AM_MAG_REORDERDESCRIPT', 'Description' );
define( '_AM_MAG_REORDERWEIGHT', 'Weight' );
define( '_AM_MAG_REORDERSUMMARY', 'Summary' );
define( "_AM_MAG_EXTRADOC_TEXT", "<div style='padding-top: 8px;'><b>Page Break</b>: use [pagebreak] to seperate a document into smaller pages with a normal navigation.</div>
<div style='padding-top: 8px;'><b>PageNav Breaks</b>: Use [title]TitleText[/title] to seperate a document into smaller pages using a title navagation system.</div>
<div style='padding-top:8px;'><b>Encryption</b>:¨Use <b>[ssl]</b>Text<b>[/ssl]</b> to encryption content (need set css).</div>
" );
/**
 * Main Configuration
 */
define( "_AM_MAG_SECTIONSETTINGS", "Section Management Information" );
define( "_AM_MAG_SECTIONSETTINGSTEXT", "<li>Here you can create new sections for your site, these are like 'folders' where you store your Documents.<br /><li>You can create, modify and delete your sections easily from here.<br /><li>Please read the help document for further use of the features here." );
define( "_AM_MAG_MODIFICATION", "Modification Request" );
define( "_AM_MAG_MODIFICATIONINFO", "Modification Request Information" );
define( "_AM_MAG_MODIFICATIONTEXT", "<li>This area will list all Documents that have been modified and re-submitted for approval.<br /><li>You can view, modify or approve these changes." );
/**
 * Index Page management
 */

/**
 * Copyright and Support.  Please do not remove this line as this is part of the only copyright agreement for using Magazine
 */
define( '_AM_MAG_RETCATREORDER', 'Return to Section re-order' );
define( '_AM_MAG_ARTREORDER', 'Documents have been re-ordered!' );
define( '_AM_MAG_CATREORDER', 'Choosen Sections have been re-ordered!' );
define( '_AM_MAG_NOFILESFOUND', 'No Files Found' );
define( '_AM_MAG_TOTALATTFILES', 'Total Downloads: ' );
define( '_AM_MAG_APPROVED', 'Approved' );
define( '_AM_MAG_ERROR_APPROVED', 'Error occurred during approval' );
// votedata
define( "_AM_MAG_USER", "User" );
define( "_AM_MAG_IP", "IP Address" );
define( "_AM_MAG_USERAVG", "Average User Rating" );
define( "_AM_MAG_TOTALRATE", "Total Ratings" );
define( "_AM_MAG_NOREGVOTES", "No User Votes" );
define( "_AM_MAG_DATE", "Date" );
define( "_AM_MAG_ARTICLE", "Document Name" );
define( "_AM_MAG_RATING", "Rating" );
define( "_AM_MAG_VOTEDELETED", "Vote Deleted" );
// Modify Document
define( "_MD_USERMODREQ", "User Modification Requests" );
define( "_AM_MAG_MOVETOART", "Move To Document: (Blank: No Change)" );
// Modified Documents
define( "_AM_MAG_MODIFIED", "Modified" );
define( "_AM_MAG_ORIGINAL", "Original Document" );
define( "_AM_MAG_AUTHOR", "Author:" );
define( "_AM_MAG_MAINTEXT", "Maintext:" );
define( "_AM_MAG_SUBTITLE", "Subtitle:" );
define( "_AM_MAG_SUMMARY", "Summary:" );
define( "_AM_MAG_URL", "URL:" );
define( "_AM_MAG_URLNAME", "URL Name:" );
define( "_AM_MAG_TITLE1", "Title:" );
define( "_AM_MAG_PUBLISHEDDATE", "Published:" );
define( "_AM_MAG_SUMITDATE", "Modified Date:" );
define( "_AM_MAG_PROPOSED", "Proposed Document" );
define( "_AM_MAG_POST", "Save" );
define( "_AM_MAG_POSTNEWARTICLE", "Edit Modified Document" );
define( "_AM_MAG_WAYSYWTDTTAL2", "Delete Modified Document?" );
define( "_AM_MAG_MODREQDELETED", "Modified Document Deleted" );
// Document Stats
define( "_AM_MAG_ARTICLESTATS", "Document Stats" );
define( "_AM_MAG_ARTICLESTATSFOR", "Stats For Document:" );
define( "_AM_MAG_ISLEFT", "Left" );
define( "_AM_MAG_ISCENTER", "Center" );
define( "_AM_MAG_ISRIGHT", "Right" );
define( "_AM_MAG_CREATEARTICLE", "Creating New Document" );
define( "_AM_MAG_MODIFYARTICLE", "Modify Document : " );
define( "_AM_MAG_NODETAILSRECORDED", "No Details recorded" );
//define( "_AM_MAG_ISADMINNOTICE", "Admin Notice: You need to correct this" );
define( "_AM_MAG_ISSORRYMESSAGE2", "<div><b>Sorry</b>, document <i>%s</i> is not available for editing!</div><br /><div>User %s is editing this document at the moment. Editing started at: %s </div>" );
define( "_AM_MAG_STATARTICLEID", "Articleid:" );
define( "_AM_MAG_STATTITLE", "Title:" );
define( "_AM_MAG_STATWEIGHT", "Weight:" );
define( "_AM_MAG_STATSECTION", "Under Section:" );
define( "_AM_MAG_STATAUTHOR", "Orginal Author:" );
define( "_AM_MAG_STATCREATED", "Created Date:" );
define( "_AM_MAG_STATPUBLISHED", "Published Date:" );
define( "_AM_MAG_STATEXPIRED", "Expire Date" );
define( "_AM_MAG_STATLASTEDITED", "On the date:" );
define( "_AM_MAG_STATLASTEDITEDBY", "Last edited By:" );
define( "_AM_MAG_STATTIMESEDITEDBYAUTHOR", "Times edited by the author:" );
define( "_AM_MAG_STATTIMESEDITEDBYLASTEDITOR", "Times edited by the last editor:" );
define( "_AM_MAG_STATTIMESEDITEDTOTAL", "Total times edited" );
define( "_AM_MAG_STATCOUNTER", "Document Read:" );
define( "_AM_MAG_STATRATING", "Document Rating:" );
define( "_AM_MAG_STATRATINGHIGH", "Highest Rating:" );
define( "_AM_MAG_STATRATINGLOW", "Lowest Rating:" );
define( "_AM_MAG_STATVOTES", "Voted times:" );
define( "_AM_MAG_STATDOWNLOADS", "Number Files Attached:" );
define( "_AM_MAG_STATCOMMENTSALLOWED", "Comments Enabled?" );
define( "_AM_MAG_STATCOMMENTS", "Total Comments:" );
define( "_AM_MAG_STATSTATUS", "Document Status:" );
define( "_AM_MAG_RELATEDART", "Related Documents Management" );

define( "_AM_MAG_RELATEDARTADMIN", "Related Documents Information" );
define( "_AM_MAG_RELATEDARTADMINTXT", "A related Document can be either Magazine Document or a News releated article:
<br /><li><b>Document:</b> This will take you to the document selection list.</li>
<li><b>News:</b> This will take you to the News Article selection list.</li>
" );

define( "_AM_MAG_RELATEDDOCLIST", "Related Document Selection list:
<br /><li><b>Document:</b> This will take you to the document selection list.</li>
<li><b>News:</b> This will take you to the News Article selection list.</li>
" );

define( "_AM_MAG_RELATEDNEWSLIST", "Related News Article Selection list" );
define( "_AM_MAG_RELATEDDOCUMENTLIST", "Related Document Selection list" );

define( "_AM_MAG_RELATEDNEWSLISTTXT", "
<li><b>ID:</b> ID of the listed.</li>
<li><b>Title:</b> This dispalys the title of the item in the list.</li>
<li><b>Weight:</b> This is the display order of each item. You can assign new values for each item.</li>
<li><b>Add Releted Item:</b> Checking or unchecking will add or remove an item from the related item listing.</li>
<li><b>Select All/None:</b> Quickly toggle listing items.</li>
" );

define( "_AM_MAG_RELATEDLINKLIST", "Related Links Selection list" );
define( "_AM_MAG_RELATEDLINKLISTTXT", "
<li><b>ID:</b> ID of the listed.</li>
<li><b>Title:</b> This displays the title of the item in the list.</li>
<li><b>Weight:</b> This is the display order of each item.</li>
<li><b>Action:</b> Checking or unchecking will add or remove an item from the related item listing.</li>
" );

define( "_AM_MAG_RELATEDLINKLIST2", "Create New Releated Link" );
define( "_AM_MAG_RELATEDLINKLISTTXT2", "
<li><b>Releated Link:</b> Url Address of the link.</li>
<li><b>Related Link Name:</b> Friendly Name to display in the link listing.</li>
<li><b>Weight:</b> This is the display order of this item in the list.</li>
<li><b>Action:</b> Peform specific tasks such as edit or delete the current link.</li>
" );

define( "_AM_MAG_NO_DOCS_CREATEDYET", "No Documents have been created yet. Please create some and try again." );
define( "_AM_MAG_RELATED_DOC", "Document" );
define( "_AM_MAG_RELATED_NEWS", "News" );
define( "_AM_MAG_ADDRELATEDART", "Add Related Documents" );
define( "_AM_MAG_RELATEDITEM", "Add Releted Item" );
define( "_AM_MAG_RELATEDART_WEIGHT", "Weight" );
define( "_AM_MAG_ARTID", "ID" );
define( "_AM_MAG_SHOWALL", "Select All/None" );
define( "_AM_MAG_FAILTOSEE", "Ok? ERROR!!!! I fail to see the reason of you copying these Documents into the same Section? Do you?" );
define( "_AM_MAG_NOARTICLE", "This article does not exist" );
define( "_AM_MAG_NOARTICLESSELECTED", "No Documents Selected" );
define( "_AM_MAG_ARTICLESMOVED", "Selected Documents have been moved to new Section" );
define( "_AM_MAG_ANDMOVED", "And Move to Section:" );
define( "_AM_MAG_SELECTALLNONE", "Select All/None" );
define( "_AM_MAG_SUBMIT1", "Submitted" );
define( "_AM_MAG_VOTES", "Votes:" );
define( "_AM_MAG_SORTBY1", "Sort by:" );
define( "_AM_MAG_DATE1", "Date" );
define( "_AM_MAG_ARTICLEID1", "Document ID" );
define( "_AM_MAG_RESET", "Reset" );
define( "_AM_MAG_NOSUCHSECTION", "<b>Error</b>: No Such Section" );
define( "_AM_MAG_NOTITLESET", "No Title Set" );
define( "_AM_MAG_EDITSUBTITLE", "Document Sub Title:<div style='padding-top: 8px;'>This text will appear in bold above the maintext in the document.</div>" );
define( "_AM_MAG_SELECT_IMG", "Document Image:" );
define( "_AM_MAG_TOTALNUMARTS", "Total Number Documents: " );
define( "_AM_MAG_STATUSERTYPE", "Document User Type: " );
define( "_AM_MAG_DATEIN", "Editing Time Start: " );
define( "_AM_MAG_DATEOUT", "Editing Time Finished: " );
define( "_AM_MAG_DOCEDITHISTORY", "Document Edit History" );
define( "_AM_MAG_STILLEDITING", "Still Editing Document" );
define( "_AM_MAG_DOCSINEDITING", "Documents being edited" );
define( "_AM_MAG_EDITVERSION", " Increment Version On Save" );
define( "_AM_MAG_EDITVERSIONNUM", "Document Version:" );
define( "_AM_MAG_OTHEROPTIONS", "Other Options:" );
// mag_fileshow defines
define( "_AM_MAG_ATTACHEDFILES", "Attached Files Configuration" );
define( "_AM_MAG_FILEUPLOAD", "Upload File To Document: " );
define( "_AM_MAG_ATTACHEDFILEEDITH", "Create new Upload" );
define( "_AM_MAG_ATTACHFILE", "File to Upload" );
define( "_AM_MAG_FILESHOWNAME", "File name to display" );
define( "_AM_MAG_FILEDESCRIPT", "File Description" );
define( "_AM_MAG_FILETEXT", "File Search Text" );
define( "_AM_MAG_NOT_PUBLISHED", "Not Published" );
define( "_AM_MAG_NOT_SET", "Not Set" );
define( "_AM_MAG_NOT_CHANGED", "Not Changed" );
define( "_AM_MAG_TIMES", " Times" );
define( "_AM_MAG_ONLINE", "Online" );
define( "_AM_MAG_OFFLINE", "Offline" );
define( "_AM_MAG_DISPLAYPAGES", "Display Pages: " );
define( "_AM_MAG_ARTICLERESTOREHEADING", "Document Restore Management" );
define( "_AM_MAG_ARTICLERESTOREINFO", "Document Restore Information" );
define( "_AM_MAG_ARTICLERESTORETEXT", "Restore modified documents from a backuped previous version." );
define( "_AM_MAG_RESTORE_ID", "RID" );
define( "_AM_MAG_RESTORE_DATE", "Restore Date" );
define( "_AM_MAG_RESTORE_ARTICLEID", "ArID" );
define( "_AM_MAG_RESTORE_TITLE", "Restore Title" );
define( "_AM_MAG_RESTORE_VERSION", "Version" );
define( "_AM_MAG_RESTORE_ACTION", "Action" );
define( "_AM_MAG_RESTORE_CREATED", "Created" );
define( "_AM_MAG_RESTORE_PUBLISHED", "Published" );
define( "_AM_MAG_NORESTORE", "Restore id does not exist" );
define( "_AM_MAG_NORESTORE_POINTS", "There are No Restore points for this Document" );
define( "_AM_MAG_DELETERESTORE", "Delete this restore point?" );
define( "_AM_MAG_RESTOREDELETED", "The restore point has been deleted." );
define( "_AM_MAG_ERROR_RESTOREDELETED", "Eorror occurred when deleting restore point." );
define( "_AM_MAG_FILEEXISTS", " (File Exists)" );
define( "_AM_MAG_FILEERROR", "ERROR: " );
define( "_AM_MAG_FILEERRORPLEASECHECK", " Please Check File!" );
define( "_AM_MAG_NUMBER", " NO: " );
define( "_AM_MAG_ATTACHEDARTICLE", "Files Attached To Document: " );
define( "_AM_MAG_RATINGID", "RID" );
// Related LINKS
define( "_AM_MAG_RELATEDLINKS", "Related Links Management" );
define( "_AM_MAG_RELATEDLINKSADMIN", "Related Link Information" );
define( "_AM_MAG_RELATEDLINKSLIST", "Related Link Listing" );
define( "_AM_MAG_ADDRELATEDLINK", "Add Related Document Link" );
define( "_AM_MAG_RELATED_URL", "Related Link" );
define( "_AM_MAG_RELATED_URLNAME", "Related Link Name" );
define( "_AM_MAG_RELATED_WEIGHT", "Weight" );
define( "_AM_MAG_ID", "ID" );
define( '_AM_MAG_NOURLFOUND', 'No Related Links' );
define( '_AM_MAG_DELETERELEATEDLINK', 'Really delete this related link?' );
define( '_AM_MAG_RELATED_DELETED', 'Related Link Deleted!' );
define( '_AM_MAG_RELATED_DBUPDATED', 'Related Link Created/Updated' );
// Reviews
define("_AM_MAG_OTHER_INFOADMIN", "Extra Information Management" );
define("_AM_MAG_OTHER_INFOADMINTXT", "You can use customize content while you need a special field:
<br /><li>A complete set with each title and content.</li>
<li>It would not appear in result page if you leave it blank.</li>" );

define("_AM_MAG_OTHER_INFO","Extra Information: ");
define("_AM_MAG_TITLE_1", "Title 1:" );
define("_AM_MAG_DESC_1", "content 1:" );
define("_AM_MAG_TITLE_2", "Title 2:" );
define("_AM_MAG_DESC_2", "content 2:" );
define("_AM_MAG_TITLE_3", "Title 3:" );
define("_AM_MAG_DESC_3", "content 3:" );
define("_AM_MAG_TITLE_4", "Title 4:" );
define("_AM_MAG_DESC_4", "content 4:" );
define("_AM_MAG_TITLE_5", "Title 5:" );
define("_AM_MAG_DESC_5", "content 5:" );
define("_AM_MAG_TITLE_6", "Title 6:" );
define("_AM_MAG_DESC_6", "content 6:" );
define("_AM_MAG_DISPLAYREVIEW", "Display Extra Info?" );
define("_AM_MAG_ADD_REVIEW", "Add Extra Info" );

// Import settings
define( "_AM_MAG_IMPORT", "Bulk import document files" );
define( "_AM_MAG_IMPORTTEXT", "Bulk import HTML documents into a chosen Section:
<br /><li><b>Section Title:</b> The section title that the new imported documents will be displayed under.</li>
<li><b>Directory name or File name:</b> Directory where the HTML documents are stored.</li>" );

define( "_AM_MAG_ADD_SETTINGS", "Change Other Document Settings" );
define( "_AM_MAG_IMPORTWORD", "Import Word Document" );
define( "_AM_MAG_IMPORTWORDYES", "Com found/enabled on server. It seems you can convert word documents, but you must have word installed on your computer before you can use this feature." );
define( "_AM_MAG_IMPORTWORDNO", "Com not found/enabled on server" );

define( "_AM_MAG_IMPORTWORDINYES", "MS Word seems to be installed on your computer and it seems you can convert a word document." );
define( "_AM_MAG_IMPORTWORDINNO", "MS Word was not found/installed on your computer." );
/**
 * Check for word
 */
define( "_AM_MAG_IMPORTWORDTXT", "Import Word Documents Check:");
define( "_AM_MAG_IMPORTCOMENABLED", "Com Enabled?");
define( "_AM_MAG_IMPORTWORDINSTALL", "MS Word Installed?");
define( "_AM_MAG_IMPORTWORDSELECT", "<b>Select Word Document:</b> Select a Word Document for uploading and importing.");
define( "_AM_MAG_WORDNOTINSTALLED", "Your server or computer does not meet the requirements to convert MS Word documents." );
define( "_AM_MAG_EDITDRAFT", "Save as Draft Document?" );
define( "_AM_MAG_IMPORT_DIRNAME", "Directory name or File name" );
define( "_AM_MAG_IMPORT_HTMLPROC", "Process HTML files" );
define( "_AM_MAG_IMPORT_EXTFILTER", "External filter program name" );
define( "_AM_MAG_IMPORT_BODY", "Import body part of HTML file" );
define( "_AM_MAG_IMPORT_INDEXHTML", "Delete a link to index.html, there are in the same directory or in one upper directory." );
define( "_AM_MAG_IMPORT_LINK", "Change a link to a title = file name" );
define( "_AM_MAG_IMPORT_IMAGE", "Change a link of an image file into an image directory. " );
define( "_AM_MAG_IMPORT_ATMARK", "Change @ to &amp;#064;" );
define( "_AM_MAG_IMPORT_TEXTPROC", "Process Text files" );
define( "_AM_MAG_IMPORT_TEXTPRE", "Surround Text file by &lt;pre&gt; &lt;/pre&gt;" );
define( "_AM_MAG_IMPORT_IMAGEPROC", "Processing of Image files" );
define( "_AM_MAG_IMPORT_IMAGEDIR", "Image directory name" );
define( "_AM_MAG_IMPORT_IMAGECOPY", "Copy image files to a image directory." );
define( "_AM_MAG_IMPORT_TESTMODE", "Test mode" );
define( "_AM_MAG_IMPORT_TESTDB", "Not store in DB. Please remove a check, when you store. " );
define( "_AM_MAG_IMPORT_TESTEXEC", "Test" );
define( "_AM_MAG_IMPORT_TESTTEXT", "Text display" );
define( "_AM_MAG_IMPORT_EXPLANE", "A judgment of the kind of file is performed by the extension.<br>HTML file have extension of html or htm.<br>Text file have extension of txt.<br>Image file have extension of gif, jpg, jpeg, or png.<br>" );
define( "_AM_MAG_IMPORT_ERRDIREXI", "Directory or file does not exist" );
define( "_AM_MAG_IMPORT_ERRFILEXI", "Filter program does not exist" );
define( "_AM_MAG_IMPORT_ERRFILEXEC", "Filter program is not executable" );
define( "_AM_MAG_IMPORT_ERRNOCOPY", "No specification of image copy" );
define( "_AM_MAG_IMPORT_ERRNOIMGDIR", "No specification of image directory" );
define( "_AM_MAG_IMPORT_ERRIMGDIREXI", "Specified image directory is not directory" );
define( "_AM_MAG_IMPORT_ERRFILEEXI", "File does not exist" );
define( "_AM_MAG_ARTRESTORENOTACT", "This feature has not been activated yet." );
define( "_AM_MAG_ERRORFILEALLREADYEXISITS", "File already exists on the server." );
// define("_AM_MAG_RELATEDARTS", "Related Documents Listing");
// define("_AM_MAG_RELATEDNEWS", "Related News Listing");
define( "_AM_MAG_ATTACHEDFILESADMIN", "Edit Attached File Admin" );
define( "_AM_MAG_ATTACHEDFILEPREVIEW", "File Preview" );
define( "_AM_MAG_ATTACHEDFILESTAS", "File Stats" );
define( "_AM_MAG_ATTACHEDFILEEDIT", "File Edit" );
define( "_AM_MAG_ATTACHEDFILEACCESS", "Allow Access For:" );
// Document Spotlight
define( "_AM_MAG_DOCSPOTLIGHTHEADING", "Document Spotlight Management" );
define( "_AM_MAG_DOCSPOTLIGHTINFO", "Document Spotlight Information" );
define( "_AM_MAG_DOCSPOTLIGHTTEXT", "To set an article diplaying in the spotlight block:
<li>Spotlight Image</li>
<li>Spotlight Image max width</li>
<li>Spotlight Image max height</li>
<li>Spotlight document max length</li>
<li>Summary Text Type</li>
<li>Spotlight document: always use the last published article or choose an article</li>
" );
define( "_AM_MAG_DOCSPOTLIGHTFORM", "Spotlight Form" );
define( "_AM_MAG_DOCSPOTLIGHTDOC", "Spotlight Document:" );
define( "_AM_MAG_DOCSPOTLIGHTIMAGE", "Spotlight Preview:" );
define( "_AM_MAG_USE_LASTPUBLISHED", " Use last published article" );
define( "_AM_MAG_CURRENT_SPOT", "Current spotlight article" );
define( "_AM_MAG_OTHERWISE_CHOOSEANARTICLE", "or choose an article from following" );
define( "_AM_MAG_SPOTIT", "Check" ); // select it as spotlight document
define( "_AM_MAG_SPOTIMAGE_MAXWIDTH", "Max Spotlight Width Image:" );
define( "_AM_MAG_SPOTIMAGE_MAXHEIGHT", "Max Spotlight Height Image:" );
define( "_AM_MAG_SPOTDOCUMENT_MAXLENGTH", "Max length of Spotlight Text Area:<div style='padding-top: 8px;'>The size of the text paragraph in words/letters. A setting of 0 will keep orginal length.</div>" );
define( "_AM_MAG_SPOTDOCUMENT_SUMTYPE", "Summary Text Type:" );
define( "_AM_MAG_SPOTDOCUMENT_SUBTITLE", "Document Sub Title" );
define( "_AM_MAG_SPOTDOCUMENT_SUMMARY", "Document Summary" );
define( "_AM_MAG_SPOTDOCUMENT_MAINTEXT", "Document Maintext" ); 
// index.php
define( "_AM_MAG_ARTICLENOTEXIST", "Error: Document doesn't Exist" );
define( "_AM_MAG_NOT_WORDDOC", "Error: This is not a MS WORD document" );
define( "_AM_MAG_NO_FORUM", "No Forum Selected" );
define("_AM_MAG_NO_FORM", "No Form Selected" );
define("_AM_MAG_NO_STORE", "No Good Selected" );
define("_AM_MAG_NO_SIGN", "No Forum Selected" );
define( "_AM_MAG_CHECKIN_FAILED", "Document Checkin failed" );
define( "_AM_MAG_SERVERSTATE", "Server Status" );
define( "_AM_MAG_SPHPINI", "<b>Information taken from PHP ini File:</b>" );
define( "_AM_MAG_SAFEMODESTATUS", "Safe Mode Status: " );
define( "_AM_MAG_REGISTERGLOBALS", "Register Globals: " );
define( "_AM_MAG_MAGICQUOTESGPC", "Magic_quotes State For GPC : " );
define( "_AM_MAG_SERVERUPLOADSTATUS", "Server Uploads Status: " );
define( "_AM_MAG_MAXUPLOADSIZE", "Max Upload Size Permitted: " );
define( "_AM_MAG_MAXPOSTSIZE", "Max Post Size Permitted: " );
define( "_AM_MAG_SAFEMODEPROBLEMS", " (This May Cause Problems)" );
define( "_AM_MAG_GDLIBSTATUS", "GD Library Support: " );
define( "_AM_MAG_GDLIBVERSION", "GD Library Version: " );
define( "_AM_MAG_GDON", "<b>Enabled</b> (Thumbs Nails Available)" );
define( "_AM_MAG_GDOFF", "<b>Disabled</b> (No Thumb Nails Available)" );
define( "_AM_MAG_OFF", "<b>OFF</b>" );
define( "_AM_MAG_ON", "<b>ON</b>" );
define( "_AM_MAG_ZLIBCOMPRESSION", "ZLib Compression:" );
define( "_AM_MAG_MAXINPUTTIME", "Max Input Time:" );
define( "_AM_MAG_FOPENURL", "FOpen URL:" );

define( "_AM_MAG_EXT", "Extension:" );
define( "_AM_MAG_UPDATEDATE", "Last Update:" );
define( "_AM_MAG_DOWNLOADNAME", "Download Name:" );
define( "_AM_MAG_FILEREALNAME", "Stored Name:" );
define( "_AM_MAG_ARTICLEID", "Article ID:" );
define( "_AM_MAG_DESCRIPTION", "File description" );
define( "_AM_MAG_NODESCRIPT", "No description for file." );
define( "_AM_MAG_ERRORCHECK", "File Check:" );
define( "_AM_MAG_ADD_STATUS", "View Status of Document" );
define( "_AM_MAG_FILEPERMISSION", "File Permission:" );
define( "_AM_MAG_DOWNLOADED", "Downloaded times:" );
define( "_AM_MAG_DOWNLOADSIZE", "Download Size:" );
define( "_AM_MAG_LASTACCESS", "Last Access Date:" );
define( "_AM_MAG_LASTUPDATED", "Last Updated On:" );
define( "_AM_MAG_DEL", "Delete" );
// Mimetypes
define("_AM_MAG_MIMETYPE", "Mimetypes:" );
define( "_AM_MAG_MIMETYPES", "Mimetypes Management" );
define( "_AM_MAG_MIME_ID", "ID" );
define( "_AM_MAG_MIME_EXT", "EXT" );
define( "_AM_MAG_MIME_NAME", "Application Type" );
define( "_AM_MAG_MIME_ADMIN", "Admin" );
define( "_AM_MAG_MIME_USER", "User" );
// Mimetype Form
define( "_AM_MAG_MIME_CREATEF", "Create Mimetype" );
define( "_AM_MAG_MIME_MODIFYF", "Modify Mimetype" );
define( "_AM_MAG_MIME_EXTF", "File Extension:" );
define( "_AM_MAG_MIME_NAMEF", "Application Type/Name:<div style='padding-top: 8px;'>Enter application associated with this extension.</div>" );
define( "_AM_MAG_MIME_TYPEF", "Mimetypes:<div style='padding-top: 8px;'>Enter each mimetype associated with the file extension. Each mimetype must be seperated with a space.</div>" );
define( "_AM_MAG_MIME_ADMINF", "Allowed Admin Mimetype" );
define( "_AM_MAG_MIME_ADMINFINFO", "<b>Mimetypes that are available for Admin uploads:</b>" );
define( "_AM_MAG_MIME_USERF", "Allowed User Mimetype" );
define( "_AM_MAG_MIME_USERFINFO", "<b>Mimetypes that are available for User uploads:</b>" );
define( "_AM_MAG_MIME_NOMIMEINFO", "No mimetypes selected." );
define( "_AM_MAG_MIME_FINDMIMETYPE", "Find New Mimetype:" );
define( "_AM_MAG_MIME_EXTFIND", "Search File Extension:<div style='padding-top: 8px;'>Enter file extension you wish to search.</div>" );
define( "_AM_MAG_MIME_INFOTEXT", "<ul><li>New mimetypes can be created, edit or deleted easily via this form.</li> 
	<li>Search for a new mimetypes via an external website.</li> 
	<li>View displayed mimetypes for Admin and User uploads.</li> 
	<li>Change mimetype upload status.</li></ul> 
	" );
// Mimetype Buttons
define( "_AM_MAG_MIME_CREATE", "Create" );
define( "_AM_MAG_MIME_CLEAR", "Reset" );
define( "_AM_MAG_MIME_CANCEL", "Cancel" );
define( "_AM_MAG_MIME_MODIFY", "Modify" );
define( "_AM_MAG_MIME_DELETE", "Delete" );
define( "_AM_MAG_MIME_FINDIT", "Get Extension!" );
// Mimetype Database
define( "_AM_MAG_MIME_DELETETHIS", "Delete Selected Mimetype?" );
define( "_AM_MAG_MIME_MIMEDELETED", "Mimetype %s has been deleted" );
define( "_AM_MAG_MIME_CREATED", "Mimetype Information Created" );
define( "_AM_MAG_MIME_MODIFIED", "Mimetype Information Modified" );

define( "_AM_MAG_GL_WEIGHTON", "<br />Global Weight On" );
define( "_AM_MAG_GL_WEIGHTOFF", "<br />Global Weight Off" );
define( "_AM_MAG_DOCUMENTTYPES", "There are three different document types to choose as your Maintext. <br />If more than one document type has been selected, then the highest priority type will be shown first. (1 = Highest)" );
define( "_AM_MAG_DOCUMENTTYPE", "<b>Document Types</b>" );
define( "_AM_MAG_BIGUESER", "ON is suggested for Big5 users" );

define("_AM_MAG_SELECTEDITOR","Select Editor:");

//Server Status
define("_AM_MAG_PHP_VERSION", "PHP Version" );
define("_AM_MAG_XOOPS_VERSION", "XOOPS Version" );
define("_AM_MAG_XOOPS_INSTALLED_PATH", "XOOPS Path" );
define("_AM_MAG_XOOPS_URL", "XOOPS URL" );
define("_AM_MAG_DATABASE_TYPE", "Database Type" );
define("_AM_MAG_DATABASE_NAME", "Database Name" );
define("_AM_MAG_DATABASE_PREFIX", "Database Prefix" );

//Blocks State
define("_AM_MAG_ARTTEMPLATE", "Select Template and Blocks State:");
define("_AM_MAG_NOBLOCKS", "None Blocks" );
define("_AM_MAG_SHOWALLBLOCKS", "Show All Blocks" );
define("_AM_MAG_SHOWLEFTBLOCKS", "Show Left Blocks" );
define("_AM_MAG_SHOWRIGHTBLOCKS", "Shoe Right Blocks" );

//Related Intro
define("_AM_MAG_INTRO", "More Introduction:");
define("_AM_MAG_INTROADMIN", "Description of more introduction:
<br /><li>Selected type would affect on certain language file.</li>
<li>Content displayed by pop-up window.</li>" );
define("_AM_MAG_ADDINTRO", "Add Introduction:");
define("_AM_MAG_INTROLIST", "Introduction List:");

define("_AM_MAG_INTRO_MOD", "Type" );
define("_AM_MAG_INTRO_LYRIC", "Lyric" );
define("_AM_MAG_INTRO_BOOK", "Book" );
define("_AM_MAG_INTRO_NO", "No.");
define("_AM_MAG_INTRO_TITLE", "Song/Book Title" );
define("_AM_MAG_INTRO_TEXT", "contents" );
?>

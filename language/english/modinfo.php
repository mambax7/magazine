<?php
// $Id: modinfo.php,v 1.8 2005/05/21 17:30:21 RB Exp $
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
// Module Info

// The name of this module
define("_MI_MAG_NAME", "Magazine");

// A brief description of this module
define("_MI_MAG_DESC","Periodical");

// Names of blocks for this module (Not all module has blocks)
define("_MI_MAG_BNAME_MENU","Recent");
define("_MI_MAG_TOPICS","Topics");
define("_MI_MAG_BNAME3","Big Article");
define("_MI_MAG_BNAME4","Top Article");
define("_MI_MAG_BNAME5","Recent Article");
define("_MI_MAG_BNAME6","downloads");
define("_MI_MAG_BNAME7","Author Info");
define("_MI_MAG_BNAME8","Spotlight");
define("_MI_MAG_BNAME9","Random Articles");
define("_MI_MAG_BNAME_ARTMENU","Article Links");

// Sub menus in main menu block
define("_MI_MAG_SUBMIT","Submit Article");
define("_MI_MAG_POPULAR","Popular");
define("_MI_MAG_RATEFILE","Rated");
define("_MI_MAG_ARCHIVE","Archives");

define("_MI_MAG_ADMENU1","Main Index");
define("_MI_MAG_ADMENU2","Create Document");
define("_MI_MAG_ADMENU3","Page Management");
define("_MI_MAG_ADMENU4","Section Management");
define("_MI_MAG_ADMENU5","Weight Management");
define("_MI_MAG_ADMENU6","Document Downloads");
define("_MI_MAG_ADMENU7","Related Documents");
define("_MI_MAG_ADMENU8","Related Links");
define("_MI_MAG_ADMENU9","List submitted articles");
define("_MI_MAG_ADMENU10","List broken downloads");
define("_MI_MAG_ARTICLEINDEXMENU", "Article Index Config:");

//author name
define("_MI_MAG_NAMEDISPLAY","Author's Name:");
define("_MI_MAG_DISPLAYNAMEDSC", "Select how to display the author's name.");
define("_MI_MAG_DISPLAYNAME1", "Username");
define("_MI_MAG_DISPLAYNAME2", "Real Name");
define("_MI_MAG_DISPLAYNAME3", "Do not display author");
//Authour Atavar
define("_MI_MAG_SHOWATAV", "Authors Atavar:");
define("_MI_MAG_SHOWATAVDSC", "Select how to display the author's Atavar in Document.");
define("_MI_MAG_DISPLAYATAV1", "Authors own Atavar");
define("_MI_MAG_DISPLAYATAV2", "Display Section Image");
define("_MI_MAG_DISPLAYATAV3", "Display no image");
//email address
define("_MI_MAG_USEREMAILDISPLAY","Author's Email Address:");
define("_MI_MAG_DISPLAYUSEREMAILDSC", "Select how to display the author's email address.");
define("_MI_MAG_DISPLAYEMAIL1", "Display and Protect");
define("_MI_MAG_DISPLAYEMAIL2", "Display Email icon");
define("_MI_MAG_DISPLAYEMAIL3", "Do Not Display");
//SSL Code Setting
define("_MI_MAG_SSLTEXT","Encryption Setting: ");
define("_MI_MAG_SSLTEXTDSC","Copyright");
define("_MI_MAG_SSLCOLOR","Encryption text color: ");
define("_MI_MAG_SSLCOLORDSC","Please to match your background-color");
//displayInfo document listing
define("_MI_MAG_DISPLAYINFOLIST","Display Document Listing Info:");
define("_MI_MAG_DISPLAYINFOLISTDSC", "<div>Information that will be displayed in document listing.</div><div style='padding-top: 8px;'>NB: Vote information will only be displayed if 'User Votes' is enabled</div>");
//displayInfo document
define("_MI_MAG_DISPLAYINFO","Display Document Info:");
define("_MI_MAG_DISPLAYINFODSC", "<div>Information that will be displayed in the document info box.</div><div style='padding-top: 8px;'>NB: Vote information will only be displayed if 'User Votes' is enabled</div>");
//display info lang defines
define("_MI_MAG_DISPLAYINFO1", "Document Comment Count");
define("_MI_MAG_DISPLAYINFO2", "Document File Count");
define("_MI_MAG_DISPLAYINFO3", "Document Rated Count");
define("_MI_MAG_DISPLAYINFO4", "Document Vote Count");
define("_MI_MAG_DISPLAYINFO5", "Document Published Date");
define("_MI_MAG_DISPLAYINFO6", "Document Read Count");
define("_MI_MAG_DISPLAYINFO7", "Document Size");
define("_MI_MAG_DISPLAYINFO8", "Document ID");
define("_MI_MAG_DISPLAYINFO9", "Document Version"); 
//Copyright Notice
define("_MI_MAG_ADDCOPYRIGHT", "Copyright Notice:");
define("_MI_MAG_ADDCOPYRIGHTDSC", "Select to display a copyright notice on document page.");
//Allow User Votes
define("_MI_MAG_SHOWVOTESINART", "Enable User Votes:");
define("_MI_MAG_SHOWVOTESINARTDSC", "Select to allow user document voting.");
//Display Icons
define("_MI_MAG_ICONDISPLAY","Document Popular and New:");
define("_MI_MAG_DISPLAYICONDSC", "Select how to display the popular and new icons in document listing.");
define("_MI_MAG_DISPLAYICON1", "Display As Icons");
define("_MI_MAG_DISPLAYICON2", "Display As Text");
define("_MI_MAG_DISPLAYICON3", "Do Not Display");
//Amount od days new and popular
define("_MI_MAG_DAYSNEW","Document Days New:");
define("_MI_MAG_DAYSNEWDSC","The number of days a document status will be considered as new.");
define("_MI_MAG_DAYSUPDATED","Document Days Updated:");
define("_MI_MAG_DAYSUPDATEDDSC","The amount of days a document status will be considered as updated.");
define("_MI_MAG_POPULARS","Document Popular Count:");
define("_MI_MAG_POPULARSDSC","The number of hits before a document status will be considered as popular.");
//Title lenght
define("_MI_MAG_SHORTMENLEN", "MainMenu Title Length:");
define("_MI_MAG_SHORTMENLENDSC", "Enter title length of items added to the mainmenu. <div style='padding-top: 8px;'>Keep original length: 0  Default: 19 </div>");
define("_MI_MAG_SHORTCATLEN", "Section Title Length:");
define("_MI_MAG_SHORTCATLENDSC", "Enter title length of Section items. <div style='padding-top: 8px;'>Keep original length: 0  Default: 19 </div>");
define("_MI_MAG_SHORTARTLEN", "Document Title Length:");
define("_MI_MAG_SHORTARTLENDSC", "Enter title length of Document items. <div style='padding-top: 8px;'>Keep original length: 0  Default: 19 </div>");
//Images
define("_MI_MAG_SHOWCATPIC", "Display Section Images?");
define("_MI_MAG_SHOWCATPICDSC", "Global: If set as 'off' no Section images will be displayed.");
define("_MI_MAG_DEF_IMAGE", "Default Document Image:");
define("_MI_MAG_DEF_IMAGEDSC", "Image to be used if document has no image selected.<div style='padding-top: 8px;'>Image must be upload to Magazine image folder.</div>");
define("_MI_MAG_DIS_DEF_IMAGE", "Display Default Document Image?");
define("_MI_MAG_DIS_DEF_IMAGEDSC", "Select how to display default document image.");
define("_MI_MAG_DISPLAYDIMAGE1", "Document listing only");
define("_MI_MAG_DISPLAYDIMAGE2", "Document only");
define("_MI_MAG_DISPLAYDIMAGE3", "Document listing and Document");
define("_MI_MAG_DISPLAYDIMAGE4", "Do not display");
//Thumbs nails
/*
define("_MI_MAG_USETHUMBS", "Use Thumb Nails:");
define("_MI_MAG_USETHUMBSDSC", "Supported file types: JPG, GIF, PNG.<br /><br />Magazine will use thumb nails for images. Set to \'No\' to use orginal image if the server does not support this option.");
define("_MI_MAG_QUALITY", "Thumb Nail Quality: ");
define("_MI_MAG_QUALITYDSC", "Quality Lowest: 0 Highest: 100");
define("_MI_MAG_IMGUPDATE", "Update Thumbnails?");
define("_MI_MAG_IMGUPDATEDSC", "If selected Thumbnail images will be updated at each page render, otherwise the first thumbnail image will be used regardless. <br /><br />");
define("_MI_MAG_KEEPASPECT", "Keep Image Aspect Ratio?");
define("_MI_MAG_KEEPASPECTDSC", "");
*/
//Sections and document listings and navigation
define("_MI_MAG_SECTIONNUMS", "Setting per line appear a specific number of category on Magazine first page:");
define("_MI_MAG_SECTIONNUMSDSC", "Suggest set 2~4");
define("_MI_MAG_SHOWSUBMENU", "Display Sub-Sections:");
define("_MI_MAG_SHOWSUBMENUDSC", "Set to display sub-sections in main section index.");
//artlistings and description
define("_MI_MAG_SHOWARTLISTINGS", "Section Document Listing:");
define("_MI_MAG_SHOWARTLISTINGSDSC", "Set method of displaying Section description and documents listing in main section index.");
define("_MI_MAG_SHOWARTLISTING1", "Description Only");
define("_MI_MAG_SHOWARTLISTING2", "Document Listing Only");
define("_MI_MAG_SHOWARTLISTING3", "Display Both");
define("_MI_MAG_SHOWARTLISTING4", "Display None");
define("_MI_MAG_SHOWARTLISTAMOUNT", "Section Index Document Count:");
define("_MI_MAG_SHOWARTLISTAMOUNTDSC", "The amount of documents to display in main section index. <div style='padding-top: 8px;'>NB: Documents will only be displayed if 'Section document listing' is enabled.</div>");
define("_MI_MAG_ARTICLESAPAGE", "Document Index Listing Count");
define("_MI_MAG_ARTICLESAPAGEDSC", "Number of documents to display in document listing.");
define("_MI_MAG_LASTART", "Admin Index Document Count:");
define("_MI_MAG_LASTARTDSC", "Number of new documents to display in module admin area.");
define("_MI_MAG_SHOWORDERBOX", "Document Order Box:");
define("_MI_MAG_SHOWORDERBOXDSC", "Allow users to change document order with xoops orderbox.");
define("_MI_MAG_PATHTYPE", "Navigation Box:");
define("_MI_MAG_PATHTYPEDSC", "Select the type of navigation for document index listing.");
define("_MI_MAG_SECTIONSORT", "Default Section Order:");
define("_MI_MAG_SECTIONSORTDSC", "Select the default order for the Section index listings.");
define("_MI_MAG_ARTICLESSORT", "Default Document Order:");
define("_MI_MAG_ARTICLESSORTDSC", "Select the default order for the document index listings.");
define("_MI_MAG_TITLE", "Title");
define("_MI_MAG_RATING", "Rating");
define("_MI_MAG_WEIGHT", "Weight");
define("_MI_MAG_POPULARITY", "Popularity");
define("_MI_MAG_SUBMITTED2", "Submission Date");
define("_MI_MAG_SELECTBOX", "Select box");
define("_MI_MAG_SELECTSUBS", "Select box with sub-sections");
define("_MI_MAG_LINKEDPATH", "Linked path");
define("_MI_MAG_LINKSANDSELECT", "Links and select box");
define("_MI_MAG_NONE", "None");
define("_MI_MAG_AUTOWEIGHT", "Auto Weight: ");
define("_MI_MAG_AUTOWEIGHTDSC", "Use Auto weight for Section and Documents on save.");
define("_MI_MAG_AUTOSUMMARY", "Auto Summary: (Global)");
define("_MI_MAG_AUTOSUMMARYDSC", "Use Auto summary for Documents. Only applies to documents with no summary.");
define("_MI_MAG_NAMESUMTYPE", "Auto Summary Type:");
define("_MI_MAG_NAMESUMTYPEDSC", "Select the method type of auto summary.<div style='padding-top: 8px;'><b>Word Count:</b> This method will count to the amount of words choosen in the auto summary feature and end at the nearest paragraph.</div>
<div style='padding-top: 8px;'><b>letter count:</b> This method will count the amount of letters (chars) entered in the auto summary feature and end there.</div>");
define("_MI_MAG_NAMESUMTYPE1", "Auto by Word count");
define("_MI_MAG_NAMESUMTYPE2", "Auto by letter count");
define("_MI_MAG_NAMESUMAMOUNT", "Auto Summary Amount:");
define("_MI_MAG_NAMESUMAMOUNTDSC", "<div style='padding-top: 8px;'>Word Count Default: <b>50</b></div>
<div style='padding-top: 8px;'>letter count default: <b>250</b></div>");

define("_MI_MAG_PHPCODING", "PHP Coding:");
define("_MI_MAG_PHPCODINGDSC", "Set to display PHP coding within document.<div style='padding-top: 8px;'>Wrap text with [php][/php] tags to display as code.</div>");
define("_MI_MAG_VERSIONINC", "Document Version Increment: ");
define("_MI_MAG_VERSIONINCDSC", "The document version will be incremented by this number on save.");
define("_MI_MAG_USERESTORE", "Document Restore:");
define("_MI_MAG_USERESTOREDSC", "This feature will allow backups of modified documents to be restored at a later stage. <br /><br />Using this feature <b>will</b> increase the size of the MySQL database dramatically and older restore points should be removed at regular perodic intervals.");
define("_MI_MAG_DEFAULTTIME", "Timestamp:");
define("_MI_MAG_DEFAULTTIMEDSC", "Default Timestamp for Magazine:");
//submission document and files
define("_MI_MAG_GROUPSUBMITART", "Document Submission:");
define("_MI_MAG_GROUPSUBMITARTDSC", "Select groups that can submit new documents.");
define("_MI_MAG_ANONPOST", "Anonymous Document Submission?");
define("_MI_MAG_ANONPOSTDSC", "Select to allow anonymous users to post new documents.");
define("_MI_MAG_AUTOAPPROVE", "Auto Approve Submitted Documents:");
define("_MI_MAG_AUTOAPPROVEDSC", "Select to approve submitted documents without moderation.");
define("_MI_MAG_NOTIFYSUBMIT", "Webmaster Submission Email:");
define("_MI_MAG_NOTIFYSUBMITDSC", "Send email to Webmaster upon document submission.");
define("_MI_MAG_WYSIWYG", "Spaw WYSIWYG Editor: (Admin Side)");
define("_MI_MAG_WYSIWYGDSC", "Select to allow admin to use Spaw editor instead of Xoops default editor when submiting documents.");
define("_MI_MAG_USERWYSIWYG", "Spaw WYSIWYG Editor: (User Side)");
define("_MI_MAG_USERWYSIWYGDSC", "Select to allow users to use Spaw editor instead of Xoops default editor when submiting documents?");
define("_MI_MAG_GROUPUSERWYSIWYG", "Select user groups who have access to Spaw editor:");
define("_MI_MAG_USEHTMLAREA", "HTMLtextarea Footers:");
define("_MI_MAG_USEHTMLAREADSC", "Select to use XoopsFormDhtmlTextArea instead of XoopsFormTextArea in Page Management and Section Management.<div style='padding-top: 8px;'>Set to 'No' if you find that your browser crashes when using this option.</div>");
//uploads
define("_MI_MAG_SUBMITFILES", "File Submission:");
define("_MI_MAG_SUBMITFILESDSC", "Select groups that can submit new files.");
define("_MI_MAG_ALLOWEDMIMETYPES", "Allowed Admin Mimetypes:");
define("_MI_MAG_ALLOWEDMIMETYPESDSC", "Select the mimetypes that admin can upload.");
define("_MI_MAG_ALLOWEDUSERMIME", "Allowed User Mimetypes:");
define("_MI_MAG_ALLOWEDUSERMIMEDSC", "Select the mimetypes that users can upload");
define("_MI_MAG_ADMINMIMECHECK", "No admin check on upload Mimetypes:");
define("_MI_MAG_NOUPLOADFILESIZE", "No Admin upload file size check:");
define("_MI_MAG_NOUPIMGSIZE", "No Admin upload file width/height check:");
define("_MI_MAG_UPLOADFILESIZE", "MAX Filesize Upload (KB) 1048576 = 1 Meg");
define("_MI_MAG_IMGHEIGHT", "MAX upload Image Height");
define("_MI_MAG_IMGWIDTH", "MAX Upload Image Width");
//define("_MI_MAG_FILEMODE", "CHMOD Files:");
define("_MI_MAG_FILEPREFIX", "Add Prefix:");
define("_MI_MAG_CHECKSESSION","Checkin Session Time");
define("_MI_MAG_CHECKSESSIONDSC","Session time duration for checkin [minutes, 0 for non-check]");
define("_MI_MAG_BY","Dev by");
define('_MI_MAG_AUTHOR_INFO', "Developer Information");
define('_MI_MAG_AUTHOR_NAME', "Developer");
define('_MI_MAG_AUTHOR_DEVTEAM', "Development Team");
define('_MI_MAG_AUTHOR_WEBSITE', "Developer website");
define('_MI_MAG_AUTHOR_EMAIL', "Developer email");

define('_MI_MAG_MODULE_INFO', "Module Development Information");
define('_MI_MAG_MODULE_STATUS', "Development Status");
define('_MI_MAG_MODULE_DEMO', "Demo Site");
define('_MI_MAG_MODULE_SUPPORT', "Official support site");
define('_MI_MAG_MODULE_BUG', "Report a bug for this module");
define('_MI_MAG_MODULE_FEATURE', "Suggest a new feature for this module");

define('_MI_MAG_RELEASE', "Release Date: ");
define('_MI_MAG_AUTHOR_BUGFIXES', "Bug Fix History");

define('_MI_MAG_SELECTFORUM', "Select Forum: ");
define('_MI_MAG_SELECTFORUMDSC', "");
define('_MI_MAG_DISPLAYFORUM1', "Newbb");
define('_MI_MAG_DISPLAYFORUM2', "X-IPBM");
define('_MI_MAG_DISPLAYFORUM3', "X-PBBM");

define('_MI_MAG_SELECTFORM', "Select Form: ");
define('_MI_MAG_SELECTFORMDSC', "");
define('_MI_MAG_DISPLAYFORM1', "Liaise");
define('_MI_MAG_DISPLAYFORM2', "Contact");
define('_MI_MAG_DISPLAYFORM3', "Formulaire");

define('_MI_MAG_SELECTSTORE', "Select Good: ");
define('_MI_MAG_SELECTSTOREDSC', "");
define('_MI_MAG_DISPLAYSTORE1', "OK-shop");
define('_MI_MAG_DISPLAYSTORE2', "Zen-cart");
define('_MI_MAG_DISPLAYSTORE3', "OSC");

define('_MI_MAG_SELECTSIGN', "Select Attendance: ");
define('_MI_MAG_SELECTSIGNDSC', "");
define('_MI_MAG_DISPLAYSIGN1', "Eguide");
define('_MI_MAG_DISPLAYSIGN2', "TheaterMan");
define('_MI_MAG_DISPLAYSIGN3', "MRBS");

define("_MI_MAG_USERAMOUNT","User Amount Display: ");
define("_MI_MAG_USERAMOUNTDSC", "Change this option if your server as problems displaying large amount of users at once.<br /><br />");

define("_MI_MAG_RSS_UTF8", "RSS Encoding with UTF-8");
define("_MI_MAG_RSS_DESCRIPTION", "'UTF-8' will be used if enabled otherwise '"._CHARSET."' will be used.");
?>

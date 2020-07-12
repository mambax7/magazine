<?php
// $Id: main.php,v 2.0 2005/05/21 01:02:43 RB Exp $
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

define("_MAG_NOARTICLE", "Article doesn't exist");
define("_MAG_NODESCRIPT","No description for file.");
define("_MAG_UPLOADED","Uploaded: ");
define("_MAG_FILEMIMETYPE","File Mimetype");

define("_MAG_ISNEW", "new");
define("_MAG_ISUPDATED", "Updated");
define("_MAG_ARTICLENOPERM", "Sorry, You don't have Permission to see");
define("_MAG_BACK","Back");
define("_MAG_CANCEL","Cancel");
define("_MAG_SUBMIT","Submit");
define("_MAG_SUBMITBROKEN", "Submit Broken");
define("_MAG_PRINTERFRIENDLY","Printer Friendly Page");
define("_MAG_MAKEPDF","Export PDF file");
define("_MAG_NOTIFYPUBLISH"," Email notification when published");
define("_MAG_NOSTORY","Sorry, but this Document does not exist on this site.");
define("_MAG_RETURN2INDEX","Home");
define("_MAG_BACK2CAT","List");
define("_MAG_BACK2","Back");
define("_MAG_BACK2TOP","Top");
define("_MAG_TELLAFRIEND","Tell a Friend");
define("_MAG_TITLE","Title");
//define("_MAG_HOMEPAGEC", "Home Page: ");
define("_MAG_CATEGORY","Section");
define("_MAG_ARTICLES","Documents");
define("_MAG_ABOUTAUTHER","About Author");
define("_MAG_AUTHER","Author");
define("_MAG_FROM","From");
define("_MAG_INTEREST","Interest");
define("_MAG_ARTINFO","Article Info");
define("_MAG_VIEWS","Read"); 
define("_MAG_TIMES"," times"); 
define("_MAG_DATE","Date");
define("_MAG_NUMVOTES","Votes");
define("_MAG_FILESIZE","File Size");
define("_MAG_VERSION","Version");
define("_MAG_FILES","Files");
define("_MAG_TOPICC","Section");
define("_MAG_ARTICLE","Document");
define("_MAG_AUTH","Author");
define("_MAG_PUBLISHER","Publisher");
define("_MAG_LASTUPDATE","Updated");
define("_MAG_EDITDISCUSSINFORUM", "Add 'Discuss in Forum' to Document?");
define("_MAG_EDITDISCUSSINFORM", "Add 'Form Link' to Document?");
define("_MAG_EDITDISCUSSINSTORE", "Add 'Good Link' to Document?");
define("_MAG_EDITDISCUSSINSIGN", "Add 'Attendance Link' to Document?");
//define("_MAG_BROKENREPORT", "Report Broken Resource");
define("_MAG_BEFORESUBMIT", "Before submitting a broken resource request, please check that the actual source of the file you intend reporting broken, is no longer there and that the website is not temporally down.");
define("_MAG_SUBMITDATE", "Released");
define("_MAG_NOFILE","There are no 'Files' attached to this article.");
define("_MAG_FILEID","File ID:");
define("_MAG_FILEREALNAME","Stored Name:");
define("_MAG_ARTICLEID","Article ID:");
define("_MAG_OTHERARTICLES","Other Articles");   
define("_MAG_PAGETITLE","&nbsp;Page Title");
define("_MAG_PAGES","Pages");
define("_MAG_RELATEDARTS", "Related Articles");
define("_MAG_RELATEDNEWS", "Related News");
define("_MAG_INFORUMS", "Discuss %s in the forums");
define("_MAG_INFORMS", "Link %s in the form");
define("_MAG_INSTORE", "Link %s in the store");
define("_MAG_INSIGN", "Link %s in the campaign");
define("_MAG_VOTEAPPRE","Your vote is appreciated.");
define("_MAG_THANKYOU","Thank you for taking the time to vote here at %s"); 
define("_MAG_VOTEONCE","Please do not vote for the same resource more than once.");
define("_MAG_NORATING","No rating selected.");
//define("_MAG_THANKSFORHELP","Thank-you for helping to maintain this Articles integrity.");
define("_MAG_THANKSFORINFO","Thanks for your report information.");
define("_MAG_THANKS","Thanks for your submission. ");
define("_MAG_THANKS_APPROVE","Thanks for your submission. A Webmaster will look into this very shortly.");
define("_MAG_ALREADYREPORTED","You have already submitted a broken report for this resource.");
define("_MAG_CANTVOTEOWN","You cannot vote on the resource you submitted.<br>All votes are logged and reviewed.");
define("_MAG_RANK","Rank");
define("_MAG_HITS","Hits"); 
define("_MAG_HITS2","List Documents by Hits"); 
define("_MAG_RATING","Rating");
define("_MAG_RATING2","List Documents by Rating");
define("_MAG_AUTH2","List Documents by Author");
define("_MAG_VOTE","Vote");
define("_MAG_BROKENREPORTED","Broken Report");
 
//define("_MAG_FORSECURITY","For security reasons your user name and IP address will also be temporarily recorded.");
define("_MAG_DOWNLOADS","Downloads for ");
define("_MAG_COMMENT","Comments:");
define("_MAG_RATED","Rated:");
define("_MAG_VOTES","Votes:");
define("_MAG_SORTBY1","Sort by:");
define("_MAG_TITLE1","Title");
define("_MAG_DATE1","Date");
define("_MAG_POPULARITYLTOM","Popularity");
define("_MAG_POPULARITYMTOL","Popularity");
define("_MAG_ARTICLEIDLTOM","Article ID (1 to 9)");
define("_MAG_ARTICLEIDMTOL","Article ID (9 to 1)");
define("_MAG_TITLEZTOA","Title (Z to A)");
define("_MAG_TITLEATOZ","Title (A to Z)");
define("_MAG_DATEOLD","Date");
define("_MAG_DATENEW","Date");
define("_MAG_RATINGLTOH","Rating");
define("_MAG_RATINGHTOL","Rating");
define("_MAG_SUBMITLTOH","Submitted");
define("_MAG_SUBMITHTOL","Submitted");
define("_MAG_WEIGHT","Weight");
define("_MAG_POPULARITY1","Popularity");
define("_MAG_CURSORTBY1","Articles currently sorted by: ");
define("_MAG_RATING1","Rating");
define("_MAG_RATING3","Rate");
define("_MAG_INTFILEAT","Have a look at this article at %s");
define("_MAG_INTFILEFOUND","Here is an interesting article I have found at %s");
define("_MAG_DESCRIPTION","File Description");

define("_MAG_PUBLISHEDHOME","Published");
define("_MAG_ARTSIZE","Article Size: ");
define("_MAG_NOPERM","Sorry, You don't have Permission to download");
define("_MAG_SELECTSUBSECTION","Select Section:");
define("_MAG_READMORE","Read more..");
define("_MAG_LISTARTICLES","Articles List");

//Attached Files
define("_MAG_FEATUREDARTS", "Featured:");
define("_MAG_SECTIONLISTIN", "Section Listings:");
define("_MAG_CATNOTEXIST", "This Section does not exist!");
define("_MAG_CATNOPERM", "You have no permission to access this category!");
//Submission
define("_MAG_EDITSECTION", "Create in Section:");
define("_MAG_CREATEARTICLE", "Creating New Document");
define("_MAG_EDITNEWARTTITLE","New Document Title");
define("_MAG_IN", "Display in Sections:");
define("_MAG_EDITSECTION2", "Move to Section:");
define('_MAG_EDITARTICLETITLE', 'Document Title:');
define("_MAG_EDITSUMMARY", "Document Summary:");
define("_MAG_OTHEROPTIONS", "Document Options:");
define("_MAG_EDITSUBTITLE","Document Sub Title:");
define("_MAG_EDITMAINTEXT", "Edit Document Maintext:");
define("_MAG_EDITDISCODES", " Disable XOOPS Codes");
define("_MAG_EDITDISAMILEY", " Disable Smilie Icons");
define("_MAG_EDITDISHTML", " Disable HTML Tags");
define("_MAG_MODIFYARTICLE", "Modify Document:");
define("_MAG_MOVETO", "Move to Section:");
define("_MAG_MODIFY", "Modify");
define("_MAG_DELETE", "Delete");

//Files
define("_MAG_FILES_CREATE","Create Download");
define("_MAG_FILES_UPLOAD","Upload File:");
define("_MAG_FILES_TITLE", "Download Title: ");
define("_MAG_FILES_DESCRIPT","Download Description:");
define("_MAG_FILES_SEARCHTEXT","Download Search Text:");
define("_MAG_FILES_ATTACHED","Document Downloads:");
define("_MAG_FILES_DELETE_SELECTED","Delete selected downloads");

//constants added by frankblack
define("_MAG_URLFORSTORY","The URL for this article is:");
define("_MAG_THISCOMESFROM","This article comes from %s");

define("_MAG_FILETITLE","File Name");
//define("_MAG_WEBMASTERACKNOW", "Broken Report Acknowledged: ");
//define("_MAG_WEBMASTERCONFIRM", "Broken Report Confirmed: ");
define("_MAG_RESOURCEID", "Resource id#: ");
define("_MAG_REPORTER", "Original Reporter: ");
define("_MAG_DATEREPORTED", "Date Reported: ");
define("_MAG_RESOURCEREPORTED", "Resource Reported Broken");
//define("_MAG_THANKSFORREPORTING", "Thanks for taking the time to report this broken resource, but we have already been informed and are in the process of correcting the information regarding this resource.");
define("_MAG_THISFILEDOESNOTEXIST", "Error: This file does not exist!");
define("_MAG_NEWSARCHIVES","Article Archives");
define("_MAG_ACTIONS","Actions");
define("_MAG_THEREAREINTOTAL","There are %s article(s) in total");
define("_MAG_SENDSTORY","Send this article to a Friend");
define("_MAG_INTARTICLE","Interesting Article at %s");
define("_MAG_INTARTFOUND","Here is an interesting article I have found at %s");
define("_MAG_COPYRIGHT","Copyright");
define("_MAG_ERROR","Error saving information to database");
define("_MAG_NOTIFYSBJCT","Article for my site"); // Notification mail subject
define("_MAG_NOTIFYMSG","Hey! You got a new submission for your site."); // Notification mail message
define("_MAG_VISIT","Visit Website: ");
define("_MAG_RELATEDLINKS","Related Links");
//define("_MAG_SPONSER", "Sponser");

define("_MAG_ROOT_CATEGORY","root category");
define("_MAG_NO_FORUM","No Forum Selected");
define("_MAG_NO_FORM","No Form Selected");
define("_MAG_NO_STORE","No Good Selected");
define("_MAG_NO_SIGN","No Attendance Selected");
define("_MAG_CHECKIN_FAILED","Check in failed");
define("_MAG_SHOWARTAMOUNT","Current aricles: %s - %s Total articles: %s");

define("_MAG_SUBSECTION","Sub Section:");
define("_MAG_QKMENU","Quick Start");
define("_MAG_SELECTEDITOR","Select Editor");

define("_MAG_RB","<a href='http://singchi.no-ip.com/hack/'><img src='./images/magazine.png'></a>");
define("_MAG_RELATEDINTRO","Intro");
define("_MAG_INTRO_BOOK","Book: ");
define("_MAG_INTRO_LYRIC","Song: ");
?>

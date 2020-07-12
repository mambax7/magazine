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

define("_MAG_NOARTICLE", "抱歉, 這篇文章並不存在");
define("_MAG_NODESCRIPT","該文件無描述。");
define("_MAG_UPLOADED","上傳: ");
define("_MAG_FILEMIMETYPE","檔案類型");

define("_MAG_ISNEW", "最新文章");
define("_MAG_ISUPDATED", "最近更新");
define("_MAG_ARTICLENOPERM", "抱歉, 您沒有足夠的權限閱覽此文章");
define("_MAG_BACK","返回");
define("_MAG_CANCEL","取消");
define("_MAG_SUBMIT","確定送出");
define("_MAG_SUBMITBROKEN", "送出失連報告");
define("_MAG_PRINTERFRIENDLY","友善列印");
define("_MAG_MAKEPDF","輸出為 PDF 格式");
define("_MAG_NOTIFYPUBLISH","通過審核時以 Email 通知我");
define("_MAG_NOSTORY","抱歉,資料庫中無發找到此文章");
define("_MAG_RETURN2INDEX","Home");
define("_MAG_BACK2CAT","List");
define("_MAG_BACK2","Back");
define("_MAG_BACK2TOP","Top");
define("_MAG_TELLAFRIEND","轉寄好友");
define("_MAG_TITLE","文章標題");
//define("_MAG_HOMEPAGEC", "文章標題: ");
define("_MAG_CATEGORY","分類");
define("_MAG_ARTICLES","文章數");
define("_MAG_ABOUTAUTHER","作者二三事");
define("_MAG_AUTHER","作者");
define("_MAG_FROM","來自");
define("_MAG_INTEREST","興趣");
define("_MAG_ARTINFO","文章資訊");
define("_MAG_VIEWS","人氣");
define("_MAG_TIMES","次");
define("_MAG_DATE","日期");
define("_MAG_NUMVOTES","評分人數");
define("_MAG_FILESIZE","檔案大小");
define("_MAG_VERSION","版本");
define("_MAG_FILES","附件");
define("_MAG_TOPICC","分類");
define("_MAG_ARTICLE","文章");
define("_MAG_AUTH","作者");
define("_MAG_PUBLISHER","發布者");
define("_MAG_LASTUPDATE","最後更新");
define("_MAG_EDITDISCUSSINFORUM", "新增討論區連結？");
define("_MAG_EDITDISCUSSINFORM", "新增表單連結？");
define("_MAG_EDITDISCUSSINSTORE", "新增商品連結？");
define("_MAG_EDITDISCUSSINSIGN", "新增活動連結？");
//define("_MAG_BROKENREPORT", "提出失連回報");
define("_MAG_BEFORESUBMIT", "在送出檔案失連報告之前, 請您再次確認回報的檔案是否正確, 站長將儘速檢查您的報告, 為了安全考量我們將會記錄您的 IP 位址以供查核.");
define("_MAG_SUBMITDATE", "發表日期");
define("_MAG_NOFILE","這篇文章尚無任何附加檔案.");
define("_MAG_FILEID","附件 ID: ");
define("_MAG_FILEREALNAME","附件名稱: ");
define("_MAG_ARTICLEID","文章 ID: ");
define("_MAG_OTHERARTICLES","其他文章");
define("_MAG_PAGETITLE","分頁目錄");
define("_MAG_PAGES","分頁");
define("_MAG_RELATEDARTS", "相關文章");
define("_MAG_RELATEDNEWS", "相關新聞");
define("_MAG_INFORUMS", "%s 的相關討論區");
define("_MAG_INFORMS", "%s 的相關表單");
define("_MAG_INSTORE", "%s 的相關商品");
define("_MAG_INSIGN", "%s 的相關活動");
define("_MAG_VOTEAPPRE","您的評分已經完成.");
define("_MAG_THANKYOU","感謝您抽空為 %s 評分");
define("_MAG_VOTEONCE","抱歉, 這篇文章你已經評分過了, 每篇文章只能評分一次.");
define("_MAG_NORATING","請先選擇評分.");
//define("_MAG_THANKSFORHELP","謝謝你回報錯誤失效的連結.");
define("_MAG_THANKSFORINFO","謝謝您提供資訊,我們會盡快處理.");
define("_MAG_THANKS","謝謝您的參予. ");
define("_MAG_THANKS_APPROVE","謝謝您發布了新的文章, 我們將在最短的時間內進行審核.");
define("_MAG_ALREADYREPORTED","謝謝您的回報, 但這份檔案已經有人提出報告.");
define("_MAG_CANTVOTEOWN","請不要對您自己發表的文章評分.<br>所有的評分動作都將被記錄與審核.");
define("_MAG_RANK","排行");
define("_MAG_HITS","人氣");
define("_MAG_HITS2","依照閱覽次數排序");
define("_MAG_RATING","推薦");
define("_MAG_RATING2","依照評分高低排序");
define("_MAG_AUTH2","依照作者帳號排序");
define("_MAG_VOTE","票數");
define("_MAG_BROKENREPORTED","檔案失連報告");

//define("_MAG_FORSECURITY","為了安全考量我們將會記錄您的 IP 位址以供查核.");
define("_MAG_DOWNLOADS","下載");
define("_MAG_COMMENT","評論: ");
define("_MAG_RATED","目前評分: ");
define("_MAG_VOTES","評分");
define("_MAG_SORTBY1","排序: ");
define("_MAG_TITLE1","標題");
define("_MAG_DATE1","日期");
define("_MAG_POPULARITYLTOM","人氣升冪");
define("_MAG_POPULARITYMTOL","人氣降冪");
define("_MAG_ARTICLEIDLTOM","文章 ID (1 to 9)");
define("_MAG_ARTICLEIDMTOL","文章 ID (9 to 1)");
define("_MAG_TITLEZTOA","標題 (Z to A)");
define("_MAG_TITLEATOZ","標題 (A to Z)");
define("_MAG_DATEOLD","日期升冪");
define("_MAG_DATENEW","日期降冪");
define("_MAG_RATINGLTOH","評分升冪");
define("_MAG_RATINGHTOL","評分降冪");
define("_MAG_SUBMITLTOH","送出時間 (舊的在前)");
define("_MAG_SUBMITHTOL","送出時間 (新的在前)");
define("_MAG_WEIGHT","排序編號");
define("_MAG_POPULARITY1","人氣");
define("_MAG_CURSORTBY1","目前排序方式: ");
define("_MAG_RATING1","送出評分!");
define("_MAG_RATING3","評分");
define("_MAG_INTFILEAT","在 %s 有個不錯的檔案");
define("_MAG_INTFILEFOUND","我在 %s 找到一個不錯的檔案");
define("_MAG_DESCRIPTION","文章描述");

define("_MAG_PUBLISHEDHOME","日期");
define("_MAG_ARTSIZE","文章大小");
define("_MAG_NOPERM","抱歉,您在本站尚無文章發布權限!");
define("_MAG_SELECTSUBSECTION","選擇分類");
define("_MAG_READMORE","閱讀全文...");
define("_MAG_LISTARTICLES","文章列表");

//Attached Files
define("_MAG_FEATUREDARTS", "推薦佳作");
define("_MAG_SECTIONLISTIN", "分類表列");
define("_MAG_CATNOTEXIST", "錯誤,此分類並不存在!");
define("_MAG_CATNOPERM", "抱歉,您沒有瀏覽此分類的權限!");
//Submission
define("_MAG_EDITSECTION", "所屬分類");
define("_MAG_CREATEARTICLE", "撰寫新文章");
define("_MAG_EDITNEWARTTITLE","新文章標題");
define("_MAG_IN", "於分類中顯示: ");
define("_MAG_EDITSECTION2", "移至此分類: ");
define('_MAG_EDITARTICLETITLE', '文章標題: ');
define("_MAG_EDITSUMMARY", "文章摘要: ");
define("_MAG_OTHEROPTIONS", "其他編輯選項: ");
define("_MAG_EDITSUBTITLE","文章子標題: ");
define("_MAG_EDITMAINTEXT", "編輯內文: ");
define("_MAG_EDITDISCODES", "不使用 BB CODE");
define("_MAG_EDITDISAMILEY", "不使用表情圖示");
define("_MAG_EDITDISHTML", "關閉 HTML 語法");
define("_MAG_MODIFYARTICLE", "修改文章: ");
define("_MAG_MOVETO", "移至此分類: ");
define("_MAG_MODIFY", "修改");
define("_MAG_DELETE", "刪除");

//Files
define("_MAG_FILES_CREATE","附加檔案");
define("_MAG_FILES_UPLOAD","上傳附件: ");
define("_MAG_FILES_TITLE", "附件標題: ");
define("_MAG_FILES_DESCRIPT","附件描述: ");
define("_MAG_FILES_SEARCHTEXT","附件關鍵字: ");
define("_MAG_FILES_ATTACHED","文件下載: ");
define("_MAG_FILES_DELETE_SELECTED","刪除所選擇的下載檔案");

//constants added by frankblack
define("_MAG_URLFORSTORY","本文的 URL 是: ");
define("_MAG_THISCOMESFROM","本文出處: %s");

define("_MAG_FILETITLE","檔案名稱");
//define("_MAG_WEBMASTERACKNOW", "接獲失連回報: ");
//define("_MAG_WEBMASTERCONFIRM", "失連回報確認: ");
define("_MAG_RESOURCEID", "檔案編號");
define("_MAG_REPORTER", "通報者");
define("_MAG_DATEREPORTED", "通報日期");
define("_MAG_RESOURCEREPORTED", "謝謝您告訴我們這份檔案已經無法下載, 但在您之前已經有使用者提出檔案失連報告, 為了避免浪費資源, 我們將不在重複紀錄同一份檔案的失連報告.");
//define("_MAG_THANKSFORREPORTING", "謝謝您告訴我們關於文章(檔案)已經失去連結, 站長將盡速處理您的回報。");
define("_MAG_THISFILEDOESNOTEXIST", "錯誤: 檔案不存在!");
define("_MAG_NEWSARCHIVES","分月文章");
define("_MAG_ACTIONS","動作");
define("_MAG_THEREAREINTOTAL","總共有 %s 篇文章");
define("_MAG_SENDSTORY","轉寄好友");
define("_MAG_INTARTICLE","來自 %s 的有趣文章");
define("_MAG_INTARTFOUND","我在 %s 找到一篇有趣的文章");
define("_MAG_COPYRIGHT","Copyright");
define("_MAG_ERROR","寫入資料庫發生錯誤");
define("_MAG_NOTIFYSBJCT","您的網站有人提供新文章"); // Notification mail subject
define("_MAG_NOTIFYMSG","嘿!您的網站有人提供新文章"); // Notification mail message
define("_MAG_VISIT","造訪相關網站: ");
define("_MAG_RELATEDLINKS","相關連結");
define("_MAG_SPONSER", "贊助廣告");

define("_MAG_ROOT_CATEGORY","--文章類別--");
define("_MAG_NO_FORUM","選擇討論區");
define("_MAG_NO_FORM","選擇表單");
define("_MAG_NO_STORE","選擇商品");
define("_MAG_NO_SIGN","選擇活動");
define("_MAG_CHECKIN_FAILED","檢查失敗");
define("_MAG_SHOWARTAMOUNT","本頁顯示第 %s - %s 篇文章, 共有 %s 篇文章");

define("_MAG_SUBSECTION","子類別:");
define("_MAG_QKMENU","快速導覽");
define("_MAG_SELECTEDITOR","選擇編輯器");
define("_MAG_RB","<a href='http://singchi.no-ip.com/hack/'><img src='./images/magazine.png'></a>");
define("_MAG_RELATEDINTRO","相關資訊");
define("_MAG_INTRO_BOOK","書籍");
define("_MAG_INTRO_LYRIC","歌詞");
?>

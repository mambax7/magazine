<?php
// $Id: modinfo.php,v 1.8 2005/05/21 17:30:21 RB Exp $
//  ------------------------------------------------------------------------ //
//                        WF-section for XOOPS                               //
//                 Copyright (c) 2005 WF-section Team                        //
//                  <http://www.wf-projects.com/>                          //
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
define("_MI_MAG_NAME", "誌");

// A brief description of this module
define("_MI_MAG_DESC","期刊類的出版品");

// Names of blocks for this module (Not all module has blocks)
define("_MI_MAG_BNAME_MENU","分類選單");
define("_MI_MAG_TOPICS","文章分類");
define("_MI_MAG_BNAME3","今日文章");
define("_MI_MAG_BNAME4","人氣排行");
define("_MI_MAG_BNAME5","新進文章");
define("_MI_MAG_BNAME6","附件下載");
define("_MI_MAG_BNAME7","作者資訊");
define("_MI_MAG_BNAME8","焦點文章");
define("_MI_MAG_BNAME9","隨機文章");
define("_MI_MAG_BNAME_ARTMENU","文章連結");

// Sub menus in main menu block
define("_MI_MAG_SUBMIT","提供文章");
define("_MI_MAG_POPULAR","熱門文章");
define("_MI_MAG_RATEFILE","評價排行");
define("_MI_MAG_ARCHIVE","分月文章");

define("_MI_MAG_ADMENU1","文章列表");
define("_MI_MAG_ADMENU2","撰寫文章");
define("_MI_MAG_ADMENU3","頁面管理");
define("_MI_MAG_ADMENU4","類別管理");
define("_MI_MAG_ADMENU5","排序管理");
define("_MI_MAG_ADMENU6","文章附件");
define("_MI_MAG_ADMENU7","關聯文章");
define("_MI_MAG_ADMENU8","相關聯結");
define("_MI_MAG_ADMENU9","待審文章列表");
define("_MI_MAG_ADMENU10","失聯文章列表");
define("_MI_MAG_ARTICLEINDEXMENU", "文章頁面組態: ");

//author name
define("_MI_MAG_NAMEDISPLAY","使用者名稱設定: ");
define("_MI_MAG_DISPLAYNAMEDSC", "設定文章中會員名稱的呈現方式");
define("_MI_MAG_DISPLAYNAME1", "會員帳號");
define("_MI_MAG_DISPLAYNAME2", "真實姓名");
define("_MI_MAG_DISPLAYNAME3", "不顯示任何名稱");
//Authour Atavar
define("_MI_MAG_SHOWATAV", "文章圖片設定: ");
define("_MI_MAG_SHOWATAVDSC", "設定文章圖片的顯示類型");
define("_MI_MAG_DISPLAYATAV1", "顯示作者個人圖片");
define("_MI_MAG_DISPLAYATAV2", "顯示文章類別圖片");
define("_MI_MAG_DISPLAYATAV3", "不顯示任何圖片");
//email address
define("_MI_MAG_USEREMAILDISPLAY","作者 E-mail 顯示設定: ");
define("_MI_MAG_DISPLAYUSEREMAILDSC", "選擇作者 E-mail 在文章中的顯示方式");
define("_MI_MAG_DISPLAYEMAIL1", "顯示完整的 E-mail");
define("_MI_MAG_DISPLAYEMAIL2", "顯示 E-mail 連結圖示");
define("_MI_MAG_DISPLAYEMAIL3", "不顯示 E-mail");
//SSL Code Setting
define("_MI_MAG_SSLTEXT","加密文字: ");
define("_MI_MAG_SSLTEXTDSC","固定顯示的加密文字");
define("_MI_MAG_SSLCOLOR","加密文字顏色: ");
define("_MI_MAG_SSLCOLORDSC","請配合文章背景顏色設定");
//displayInfo document listing
//define("_MI_MAG_DISPLAYINFOLIST","文章列表顯示資訊: ");
//define("_MI_MAG_DISPLAYINFOLISTDSC", "<div>在文章列表頁面中會顯示的相關資訊。</div><div style='padding-top: 8px;'>請先允許「使用者評分」才能顯示「文章得分」與「參與評分人數」項目</div>");
//displayInfo document
//define("_MI_MAG_DISPLAYINFO","文章顯示資訊: ");
//define("_MI_MAG_DISPLAYINFODSC", "<div>在閱讀全文頁面中會顯示的相關資訊。</div><div style='padding-top: 8px;'>請先允許「使用者評分」才能顯示「文章得分」與「參與評分人數」項目</div>");
//display info lang defines
define("_MI_MAG_DISPLAYINFO1", "回應評論數");
define("_MI_MAG_DISPLAYINFO2", "附加檔案數");
define("_MI_MAG_DISPLAYINFO3", "文章得分");
define("_MI_MAG_DISPLAYINFO4", "評分人數");
define("_MI_MAG_DISPLAYINFO5", "發布日期");
define("_MI_MAG_DISPLAYINFO6", "閱覽次數");
define("_MI_MAG_DISPLAYINFO7", "文章大小");
define("_MI_MAG_DISPLAYINFO8", "文章編號");
define("_MI_MAG_DISPLAYINFO9", "文章版本"); 
//Copyright Notice
define("_MI_MAG_ADDCOPYRIGHT", "顯示「著作權宣告」: ");
define("_MI_MAG_ADDCOPYRIGHTDSC", "選擇是否於文章頁尾顯示著作權宣告描述。");
//Allow User Votes
define("_MI_MAG_SHOWVOTESINART", "允許「使用者評分」: ");
define("_MI_MAG_SHOWVOTESINARTDSC", "選擇是否開放使用者對文章進行評分。");
//Display Icons
define("_MI_MAG_ICONDISPLAY","熱門及新進文章狀態標記設定: ");
define("_MI_MAG_DISPLAYICONDSC", "選擇在文章表列頁面中「熱門」及「新進」文章的是否顯示狀態標記。");
define("_MI_MAG_DISPLAYICON1", "以圖示標記");
define("_MI_MAG_DISPLAYICON2", "以文字標記");
define("_MI_MAG_DISPLAYICON3", "不顯示標記");
//Amount od days new and popular
define("_MI_MAG_DAYSNEW","新進文章日期範圍: ");
define("_MI_MAG_DAYSNEWDSC","在指定日期天數內發布的文章會被視為新進文章。");
define("_MI_MAG_DAYSUPDATED","更新文章日期範圍: ");
define("_MI_MAG_DAYSUPDATEDDSC","在指定日期天數內更新過的文章會被視為近期更新。");
define("_MI_MAG_POPULARS","熱門文章人氣值下限: ");
define("_MI_MAG_POPULARSDSC","累積到指定人氣值以上的文章, 會被視為熱門文章。");
//Title lenght
define("_MI_MAG_SHORTMENLEN", "主選單標題長度: ");
define("_MI_MAG_SHORTMENLENDSC", "限定列入主選單的文章標題字元長度。<div style='padding-top: 8px;'>設定 0 將不做字元長度限制</div>");
define("_MI_MAG_SHORTCATLEN", "分類標題長度: ");
define("_MI_MAG_SHORTCATLENDSC", "限定分類標題的字元長度。 <div style='padding-top: 8px;'>設定 0 將不做字元長度限制</div>");
define("_MI_MAG_SHORTARTLEN", "文章標題長度: ");
define("_MI_MAG_SHORTARTLENDSC", "限定文章標題的字元長度。<div style='padding-top: 8px;'>設定 0 將不做字元長度限制</div>");
//Images
define("_MI_MAG_SHOWCATPIC", "顯示分類圖示？");
define("_MI_MAG_SHOWCATPICDSC", "此設定若為「否」, 則以下兩設定值將不生效。");
define("_MI_MAG_DEF_IMAGE", "預設文章圖示: ");
define("_MI_MAG_DEF_IMAGEDSC", "未選定文章搭配圖示時所使用的預設圖示。<div style='padding-top: 8px;'>這個圖示必須上傳至 Magazine 的 image 目錄夾中。</div>");
define("_MI_MAG_DIS_DEF_IMAGE", "啟用預設圖示功能？");
define("_MI_MAG_DIS_DEF_IMAGEDSC", "請選擇預設文章圖示的顯示範圍<br />當您建立文章或分類時若沒有選擇相關圖示將以預設圖示取代。");
define("_MI_MAG_DISPLAYDIMAGE1", "僅於文章表列頁面顯示");
define("_MI_MAG_DISPLAYDIMAGE2", "僅於閱讀全文頁面顯示");
define("_MI_MAG_DISPLAYDIMAGE3", "文章表列與閱讀全文頁面皆顯示");
define("_MI_MAG_DISPLAYDIMAGE4", "不顯示");
//Thumbs nails
/*
define("_MI_MAG_USETHUMBS", "開啟縮圖功能: ");
define("_MI_MAG_USETHUMBSDSC", "可製作縮圖的檔案類型: JPG, GIF, PNG。<br /><br />若您的伺服器上無縮圖程式時, 請選擇「否」, 讓影像以原尺寸顯示。");
define("_MI_MAG_QUALITY", "縮圖壓縮品質: ");
define("_MI_MAG_QUALITYDSC", "最低品質: 0  最高品質: 100");
define("_MI_MAG_IMGUPDATE", "重新製作縮圖？");
define("_MI_MAG_IMGUPDATEDSC", "若選擇「是」, 所有的圖片將重新製作縮圖。<br /><br />");
define("_MI_MAG_KEEPASPECT", "保持影像縮圖時的長寬比例？");
define("_MI_MAG_KEEPASPECTDSC", "");
*/
//Sections and document listings and navigation
define("_MI_MAG_SECTIONNUMS", "首頁每行顯示幾項分類: ");
define("_MI_MAG_SECTIONNUMSDSC", "建議值為 2 ~ 4");
define("_MI_MAG_SHOWSUBMENU", "顯示次分類: ");
define("_MI_MAG_SHOWSUBMENUDSC", "在分類表列中, 設定主分類下, 是否顯示次分類。");
//artlistings and description
define("_MI_MAG_SHOWARTLISTINGS", "首頁類別顯示資訊: ");
define("_MI_MAG_SHOWARTLISTINGSDSC", "設定是否顯示類別描述或文章列表於首頁.");
define("_MI_MAG_SHOWARTLISTING1", "只顯示描述");
define("_MI_MAG_SHOWARTLISTING2", "只顯示文章列表");
define("_MI_MAG_SHOWARTLISTING3", "同時顯示文章列表與描述");
define("_MI_MAG_SHOWARTLISTING4", "不顯示");
define("_MI_MAG_SHOWARTLISTAMOUNT", "模組首頁文章列表中顯示幾篇文章: ");
define("_MI_MAG_SHOWARTLISTAMOUNTDSC", "注意: 您必須允許在模組首頁中顯示分類文章列表");
define("_MI_MAG_ARTICLESAPAGE", "分類文章列表中顯示幾篇文章: ");
define("_MI_MAG_ARTICLESAPAGEDSC", "");
define("_MI_MAG_LASTART", "後台文章列表數: ");
define("_MI_MAG_LASTARTDSC", "後台文章列表每頁顯示幾篇文章.");
define("_MI_MAG_SHOWORDERBOX", "文章排序方式: ");
define("_MI_MAG_SHOWORDERBOXDSC", "允許會員使用文章排序功能.");
define("_MI_MAG_PATHTYPE", "導覽框: ");
define("_MI_MAG_PATHTYPEDSC", "選擇分類文章列表的導覽框類型.");
define("_MI_MAG_SECTIONSORT", "類別頁面預設排序方式: ");
define("_MI_MAG_SECTIONSORTDSC", "選擇類別頁面的文章排序方式.");
define("_MI_MAG_ARTICLESSORT", "文章頁面預設排序方式: ");
define("_MI_MAG_ARTICLESSORTDSC", "選擇文章頁面的文章排序方式.");
define("_MI_MAG_TITLE", "標題");
define("_MI_MAG_RATING", "票選評分");
define("_MI_MAG_WEIGHT", "排序");
define("_MI_MAG_POPULARITY", "人氣");
define("_MI_MAG_SUBMITTED2", "發布日期");
define("_MI_MAG_SELECTBOX", "選擇框");
define("_MI_MAG_SELECTSUBS", "選擇框 (含子類別)");
define("_MI_MAG_LINKEDPATH", "路徑連結");
define("_MI_MAG_LINKSANDSELECT", "路徑連結與選擇框");
define("_MI_MAG_NONE", "無");
define("_MI_MAG_AUTOWEIGHT", "自動排序: ");
define("_MI_MAG_AUTOWEIGHTDSC", "在儲存類別或文章時使用自動排序功能.");
define("_MI_MAG_AUTOSUMMARY", "自動摘要: (整體)");
define("_MI_MAG_AUTOSUMMARYDSC", "自動擷取部分文章內容作為摘要. 僅適用於文章中沒有填寫任何摘要時.");
define("_MI_MAG_NAMESUMTYPE", "自動摘要類型: ");
define("_MI_MAG_NAMESUMTYPEDSC", "選擇自動摘要呈現的方式.<div style='padding-top: 8px;'><b>文字數:</b> 設定擷取內文作為摘要的字數, 不建議中文使用者使用此方式.</div>
<div style='padding-top: 8px;'><b>字元數:</b> 一個中文字為兩個字元.</div>");
define("_MI_MAG_NAMESUMTYPE1", "文字數");
define("_MI_MAG_NAMESUMTYPE2", "字元數");
define("_MI_MAG_NAMESUMAMOUNT", "自動摘要字數設定: ");
define("_MI_MAG_NAMESUMAMOUNTDSC", "<div style='padding-top: 8px;'>預設文字數: <b>50</b></div>
<div style='padding-top: 8px;'>預設字元數: <b>250</b></div>");

define("_MI_MAG_PHPCODING", "PHP 程式碼: ");
define("_MI_MAG_PHPCODINGDSC", "設定顯示文章中包含的 PHP 程式碼.<div style='padding-top: 8px;'>您可以使用 [php][/php] 標籤包住 PHP 語法內容.</div>");
define("_MI_MAG_VERSIONINC", "文章版本遞增值: ");
define("_MI_MAG_VERSIONINCDSC", "每當您重新編輯文章後文章版本自動遞增的格式.");
define("_MI_MAG_USERESTORE", "文章還原: ");
define("_MI_MAG_USERESTOREDSC", "這個功能用來備份您已經編輯過的文章並提供您還原至上一個版本. <br />開啟這個功能 <b>將會</b> 使您的 MySQL 資料庫 <b>佔用很多</b> 空間, 您最好定期更新這項設定.");
define("_MI_MAG_DEFAULTTIME", "時間標記: ");
//define("_MI_MAG_DEFAULTTIMEDSC", "預設時間格式: ");
//submission document and files
define("_MI_MAG_GROUPSUBMITART", "發表文章: ");
define("_MI_MAG_GROUPSUBMITARTDSC", "選擇可以發表文章的會員群組.");
define("_MI_MAG_ANONPOST", "允許訪客發表文章？");
define("_MI_MAG_ANONPOSTDSC", "開啟此設定將允許訪客(匿名者)發表文章.");
define("_MI_MAG_AUTOAPPROVE", "自動核准會員所發表的文章: ");
define("_MI_MAG_AUTOAPPROVEDSC", "當會員發布文章時是否須經過管理者審核.");
define("_MI_MAG_NOTIFYSUBMIT", "文章核准通知: ");
define("_MI_MAG_NOTIFYSUBMITDSC", "當有任何文章被核准發佈時以郵件通知站長.");
define("_MI_MAG_WYSIWYG", "是否在後台發佈文章時使用所見即所得介面？");
define("_MI_MAG_WYSIWYGDSC", "");
define("_MI_MAG_USERWYSIWYG", "是否在前台發佈文章時使用所見即所得介面？");
define("_MI_MAG_USERWYSIWYGDSC", "");
define("_MI_MAG_GROUPUSERWYSIWYG", "選擇可以使用所見即所得編輯器的會員群組: ");
define("_MI_MAG_USEHTMLAREA", "類別頁尾描述使否允許使用 BB CODE 與 HTML 語法: ");
define("_MI_MAG_USEHTMLAREADSC", "若選否您只能以純文字方式撰寫類別頁尾描述.");
//uploads
define("_MI_MAG_SUBMITFILES", "附加檔案: ");
define("_MI_MAG_SUBMITFILESDSC", "請選擇能夠新增文章附件的群組.");
define("_MI_MAG_ALLOWEDMIMETYPES", "允許管理群組使用的檔案類型: ");
define("_MI_MAG_ALLOWEDMIMETYPESDSC", "選擇開放給管理者使用的檔案類型.");
define("_MI_MAG_ALLOWEDUSERMIME", "允許一般會員使用的檔案類型: ");
define("_MI_MAG_ALLOWEDUSERMIMEDSC", "選擇開放給一般會員使用的檔案類型");
define("_MI_MAG_ADMINMIMECHECK", "不檢查上傳附件的檔案類型: ");
define("_MI_MAG_NOUPLOADFILESIZE", "不檢查上傳附件的檔案大小: ");
define("_MI_MAG_NOUPIMGSIZE", "不檢查上傳圖片的長寬: ");
define("_MI_MAG_UPLOADFILESIZE", "最大檔案上傳限制 1048576 KB = 1 MB");
define("_MI_MAG_IMGHEIGHT", "上傳圖片最大長度");
define("_MI_MAG_IMGWIDTH", "上傳圖片最大寬度");
//define("_MI_MAG_FILEMODE", "變更檔案屬性（CHMOD)");
define("_MI_MAG_FILEPREFIX", "檔案前置詞: ");
define("_MI_MAG_CHECKSESSION","檢查 Session 時間");
define("_MI_MAG_CHECKSESSIONDSC","設定檢查 Session 時間的週期, 以分鐘為單位, 設定 0 為不檢查");
define("_MI_MAG_BY","開發團隊: ");
define('_MI_MAG_AUTHOR_INFO', "作者團隊資訊");
define('_MI_MAG_AUTHOR_NAME', "開發團隊");
define('_MI_MAG_AUTHOR_DEVTEAM', "開發成員");
define('_MI_MAG_AUTHOR_WEBSITE', "官方網站");
define('_MI_MAG_AUTHOR_EMAIL', "官方信箱");

define('_MI_MAG_MODULE_INFO', "模組開發資訊");
define('_MI_MAG_MODULE_STATUS', "版本狀態");
define('_MI_MAG_MODULE_DEMO', "Demo 網站");
define('_MI_MAG_MODULE_SUPPORT', "官方討論區");
define('_MI_MAG_MODULE_BUG', "回報錯誤訊息");
define('_MI_MAG_MODULE_FEATURE', "提供建議事項");

define('_MI_MAG_RELEASE', "更新日期: ");
define('_MI_MAG_AUTHOR_BUGFIXES', "更新紀錄");

define('_MI_MAG_SELECTFORUM', "選擇關聯的討論區模組: ");
define('_MI_MAG_SELECTFORUMDSC', "");
define('_MI_MAG_DISPLAYFORUM1', "Newbb");
define('_MI_MAG_DISPLAYFORUM2', "X-IPBM");
define('_MI_MAG_DISPLAYFORUM3', "X-PBBM");

define('_MI_MAG_SELECTFORM', "選擇關聯的表單模組: ");
define('_MI_MAG_SELECTFORMDSC', "");
define('_MI_MAG_DISPLAYFORM1', "Liaise");
define('_MI_MAG_DISPLAYFORM2', "Contact");
define('_MI_MAG_DISPLAYFORM3', "Formulaire");

define('_MI_MAG_SELECTSTORE', "選擇關聯的商店模組: ");
define('_MI_MAG_SELECTSTOREDSC', "");
define('_MI_MAG_DISPLAYSTORE1', "OK-shop");
define('_MI_MAG_DISPLAYSTORE2', "Zen-cart");
define('_MI_MAG_DISPLAYSTORE3', "OSC");

define('_MI_MAG_SELECTSIGN', "選擇關聯的活動模組: ");
define('_MI_MAG_SELECTSIGNDSC', "");
define('_MI_MAG_DISPLAYSIGN1', "Eguide");
define('_MI_MAG_DISPLAYSIGN2', "TheaterMan");
define('_MI_MAG_DISPLAYSIGN3', "MRBS");

define("_MI_MAG_USERAMOUNT","編輯文章時可選擇的作者數: ");
define("_MI_MAG_USERAMOUNTDSC", "設定編輯文章時選擇新作者的名單數量<br />可以選擇的作者數越多對伺服器造成的負荷越重, 太高的值也許會造成當機的情形.<br /><br />建議值為 300");

define('_MI_MAG_RSS_UTF8', "RSS 使用 UTF-8 轉碼");
define('_MI_MAG_RSS_DESCRIPTION', "如果選是, RSS 編碼將轉換 UTF-8, 否則使用 Big5。");
?>

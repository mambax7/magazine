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
define("_AM_MAG_YES", "是");
define("_AM_MAG_NO", "否");
define("_AM_MAG_SAVE", "儲存");
define("_AM_MAG_SAVECHANGE", "儲存變更");
define("_AM_UPDATED", "資料已完成更新");
define("_AM_MAG_EDIT", "編輯");
define("_AM_MAG_MODIFY", "變更");
define("_AM_MAG_DELETE", "刪除");
define("_AM_MAG_CANCEL", "清空");
define("_AM_MAG_ACTION", "動作");
define("_AM_MAG_COPY1", "複製" );
define("_AM_MAG_NOARTICLEFOUND", "通知:目前尚無符合條件的文章" );
define("_AM_MAG_DISABLEHTML", " 不使用 HTML 標籤");
define("_AM_MAG_DISABLESMILEY", " 不使用表情圖示");
define("_AM_MAG_DISABLEXCODE", " 不使用 BB CODE");
define("_AM_MAG_DISABLEIMAGES", " 不顯示圖片");
define("_AM_MAG_DISABLEBREAK", " 自動斷行轉換?");
define("_AM_MAG_STRIPHTML", " 移除 HTML 標籤 (轉為純文字內容)");
define("_AM_MAG_CLEANHTML", " 移除無效的 MS Word 標籤");
define("_AM_MAG_NORIGHTS", "警告:您沒有足夠的權限可以瀏覽此區域" );

/**
 * Database defines
 */
define( "_AD_DBERROR","當您儲存資訊到資料庫時發現一個錯誤:<br /><br />請回報此錯誤至 <a href=\"http://singchi.no-ip.com/hack/\" target=\"_blank\">Magazine 支援網站</a><br /><br />請將錯誤描述複製告訴我們,我們會盡快提出解決方式.");
define( '_AM_MAG_WFPATHCONFIG', '路徑設定已更新' );
define( '_AM_MAG_WFTEMPLATESCONFIG', '樣板已更新' );
define( '_AM_MAG_DBUPDATED', '資料庫已更新完成!' );
/**
 * Lang defines for breadcrumb system
 */
define( '_AM_MAG_BREADC1', '整體設定' );
define( '_AM_MAG_BREADC2', '文章列表' );
define( '_AM_MAG_BREADC3', '區塊管理' );
define( '_AM_MAG_BREADC4', '路徑設定' );
define( '_AM_MAG_BREADC5', '樣版管理' );
define( '_AM_MAG_BREADC6', '模組首頁' );
define( '_AM_MAG_BREADC7', '幫助' );
define( '_AM_MAG_BREADC8', '關於' );
define( '_AM_MAG_BREADC9', '伺服器狀態' );
/**
 * Lang defines for menu system
 */
define( '_AM_MAG_ADMENU1', '頁面管理' );
define( '_AM_MAG_ADMENU2', '分類管理' );
define( '_AM_MAG_ADMENU3', '撰寫文章' );
define( '_AM_MAG_ADMENU4', '排序管理' );
define( '_AM_MAG_ADMENU5', '文章還原' );
define( '_AM_MAG_ADMENU6', '焦點文章' );
define( '_AM_MAG_ADMENU7', '相關文章' );
define( '_AM_MAG_ADMENU8', '相關連結' );
define( '_AM_MAG_ADMENU9', '相關簡介' );
define( '_AM_MAG_ADMENUA', '文章評論' );
define( '_AM_MAG_ADMENUB', '投票資訊' );
define( '_AM_MAG_ADMENUC', '失連檔案' );
define( '_AM_MAG_ADMENUD', '檔案類型' );
define( '_AM_MAG_ADMENUE', '文章附件' );
define( '_AM_MAG_ADMENUF', '圖片管理' );
/**
 * Summary information
 */
define( '_AM_MAG_SUMMARYINFO1', '摘要資訊' );
define( '_AM_MAG_SUMMARYINFO2', '類別' );
define( '_AM_MAG_SUMMARYINFO3', '發表' );
define( '_AM_MAG_SUMMARYINFO4', '待審' );
define( '_AM_MAG_SUMMARYINFO5', '變更' );
define( '_AM_MAG_SUMMARYINFO6', '編輯中' );
define( '_AM_MAG_SUMMARYINFO7', '失連檔案' );
/**
 * allarticles document management
 */
define("_AM_MAG_ARTICLEMANAGEMENT", "文章管理" );
define("_AM_MAG_DOC_SELECTION", "選擇文章" );
define("_AM_MAG_LIST", "<b>列表</b> " );
define("_AM_MAG_LISTINCAT", " <b>於目錄</b> " );
/**
 * List article types
 */
define("_AM_MAG_ALLARTICLES", "所有文章" );
define("_AM_MAG_PUBLARTICLES", "已發布文章" );
define("_AM_MAG_SUBLARTICLES", "等待核准文章" );
define("_AM_MAG_ONLINARTICLES", "在線文章" );
define("_AM_MAG_OFFLIARTICLES", "離線文章" );
define("_AM_MAG_EXPIREDARTICLES", "已過期文章" );
define("_AM_MAG_AUTOEXPIREARTICLES", "自動過期文章" );
define("_AM_MAG_AUTOARTICLES", "自動發布文章" );
define("_AM_MAG_NOSHOWARTICLES", "純文字模式文章" );
define("_AM_MAG_HTMLFILES", "HTML 檔案文章" );
/**
 * menu lang defines
 */
define("_AM_MAG_ALLTXTHEAD", "所有文章模式" );
define("_AM_MAG_ALLTXT", "<div>在 <b>所有文章</b> 模式中您可以編輯,刪除或重新命名任何文章. 在這模式下會將資料庫中的所有文章全部顯示.");
define("_AM_MAG_PUBLISHEDTXTHEAD", "已發布文章" );
define("_AM_MAG_PUBLISHEDTXT", "<div>在 <b>已發布文章</b> 模式中將顯示所有已經通過審核的文章 (經過管理員核准)." ); //added
define("_AM_MAG_SUBMITTEDTXTHEAD", "等待核准文章" );
define("_AM_MAG_SUBMITTEDTXT", "<div>在 <b>等待核准文章</b> 模式中將顯示所有等待管理員審核的文章.<br /><br />若您想核准文章, 只要按下 <b>編輯</b> 連結, 然後將 <b>核准本文章?</b> 勾選框打勾後儲存變更. 這樣就可以將文章發布了." ); //added
define("_AM_MAG_ONLINETXTHEAD", "在線文章" );
define("_AM_MAG_ONLINETXT", "<div>在 <b>在線文章</b> 模式中將顯示所有狀態為 <b>在線</b> 的文章.<br /><br />如果您想變更文章狀態請按下 <b>編輯</b> 連結然後勾選 <b>設定文章狀態為離線文章</b>." ); //added
define("_AM_MAG_OFFLINETXTHEAD", "離線文章" );
define("_AM_MAG_OFFLINETXT", "<div>在 <b>離線文章</b> 模式中將顯示所有狀態為 <b>離線</b> 的文章.<br /><br />如果您想變更文章狀態請按下 <b>編輯</b> 連結然後取消勾選 <b>設定文章狀態為離線文章</b>." ); //added
define("_AM_MAG_EXPIREDTXTHEAD", "已過期文章" );
define("_AM_MAG_EXPIREDTXT", "<div>在 <b>已過期文章</b> 模式中將顯示所有已經被管理員設定為過期的文章 .<br /><br />如果您想變更過期時間請按下 <b>編輯</b> 連結然後設定 <b>文章過期日期</b>." ); //added
define("_AM_MAG_AUTOEXPIRETXTHEAD", "自動過期文章" );
define("_AM_MAG_AUTOEXPIRETXT", "<div>在 <b>自動過期文章</b> 模式中將顯示所有曾經設定為過期日期並已經到期的文章.<br /><br />如果您想重新設定時間請按下 <b>編輯</b> 連結然後設定 <b>文章過期日期</b>." ); //added
define("_AM_MAG_AUTOTXTHEAD", "自動發布文章" );
define("_AM_MAG_AUTOTXT", "<div>在 <b>自動發布文章</b> 模式中將顯示所有曾經預定發佈日期並自動發布的文章.<br /><br />如果您想重新設定發佈日期請按下 <b>編輯</b> 連結然後設定 <b>文章發布日期</b>." ); //added
define("_AM_MAG_NOSHOWTXTHEAD", "純文字模式文章" );
define("_AM_MAG_NOSHOWTXT", "<div>在 <b>純文字模式文章</b> " ); //added
define("_AM_MAG_HTMLFILESTXTHEAD", "HTML 檔案文章" );
define("_AM_MAG_HTMLFILESTXT", "<div>在 <b>HTML 檔案文章</b> 模式中將顯示所有使用連結 HTML 檔案來呈現的文章." ); //added
/**
 * Article listing defines
 */
define("_AM_MAG_STORYID", "ID" );
define("_AM_MAG_TITLE", "標題" );
define("_AM_MAG_POSTER", "作者" );
define("_AM_MAG_VERSION", "版本" );
define("_AM_MAG_SECTION", "類別" );
define("_AM_MAG_STATUS", "狀態" );
define("_AM_MAG_WEIGHT", "排序" );

define("_AM_MAG_SUBMITTED2", "文章撰寫日期" );
define("_AM_MAG_PUBLISHED", "文章發表日期" );
define("_AM_MAG_PUBLISHEDON", "文章發表日期" );
define("_AM_MAG_SUBMITTED", "已發布的文章" );
define("_AM_MAG_NOTPUBLISHED", "<font color='tomato'>尚未發布的文章</font>" );
define("_AM_MAG_EXPARTS", "已過期文章" );
define("_AM_MAG_EXPIRED", "自動過期日期" );
define("_AM_MAG_CREATED", "文章建立日期" );
/**
 * Blocks Management
 */
define("_AM_MAG_BLOCKSHEADING", "區塊管理" );
define("_AM_MAG_BLOCKSINFO", "區塊資訊" );
define("_AM_MAG_BLOCKSTEXT", "您可由「系統管理」→「區塊管理」來調整所有區塊設定.<br />下方主要是關於 Magazine 的區塊. 您也可以在這裡做區塊設定調整." );
/**
 * Path Managment
 */
define("_AM_MAG_PATHCONFIGURATION", "路徑組態" );
define("_AM_MAG_PATHCONFIG", "路逕與權限管理" );
define("_AM_MAG_FILEPATHWARNING", "<li>設定 Magazine 相關目錄路徑.
	<li>假如路徑錯誤將出現警告提示.
	<li>路徑欄位保持空白將使用該欄位預設路徑." );
define("_AM_MAG_FILEPATH", "路徑組態配置" );
define("_AM_MAG_FILEUSEPATH", "變更使用者路徑" );
define("_AM_MAG_PATHEXIST", "路徑存在!" );
define("_AM_MAG_PATHNOTEXIST", "路徑並未存在." );
define("_AM_MAG_THUMBPATHEXIST", "路徑存在!" );
define("_AM_MAG_THUMBPATHNOTEXIST", "路徑並未存在." );
define("_AM_MAG_PATHCHECK", "<b>路徑檢查:</b> " );
define("_AM_MAG_PERMISSIONS", "<b>路徑權限檢查:</b>" );
define("_AM_MAG_THUMBPATHCHECK", "<b>縮圖目錄檢查:</b> " );
define("_AM_MAG_THUMBPERMISSIONS", "<b>縮圖目錄權限檢查:</b>" );
define("_AM_MAG_RESETDEFUALTS", " 重置所有路徑回預設值" );
define("_AM_MAG_REVERTED", "還原路徑組態回預設值" );
/**
 * Path Management form defines
 */
define("_AM_MAG_CMODERROR", "權限錯誤:請將路徑權限設定為 0777." );
define("_AM_MAG_CMODERRORNOTCORRECTED", " 目前的權限數值並不正確." );
define("_AM_MAG_AGRAPHICPATH", "文章圖片路徑:<div style='padding-top:8px;'>文章圖片存放目錄.</div>");
define("_AM_MAG_SGRAPHICPATH", "類別圖片路徑:<div style='padding-top:8px;'>類別圖片存放目錄.</div>");
define("_AM_MAG_HTMLCPATH", "HTML 檔案路徑:<div style='padding-top:8px;'>HTML 檔案存放目錄.</div>");
define("_AM_MAG_LOGOPATH", "Logo 圖片路徑:<div style='padding-top:8px;'>logo 圖片存放目錄.</div>");
define("_AM_MAG_FILEUPLOADSPATH", "附加檔案上傳路徑:<div style='padding-top:8px;'>附加檔案上傳存放目錄.</div>");
define("_AM_MAG_FILEUPLOADSTEMPPATH", "附加檔案 temp 上傳路徑:<div style='padding-top:8px;'>此非必需目錄可以刪除.</div>");
define("_AM_MAG_AVATARPATH", "大頭照縮圖路徑:<div style='padding-top:8px;'>大頭照縮圖存放目錄. <br />假如目錄不存在請您新增這個目錄.</div> " );
/**
 * Template management
 */
define( '_AM_MAG_MODIFYTEMPLATES', '樣版管理' );
define( '_AM_MAG_USINGTEMPLATES', '使用樣版管理' );
define( '_AM_MAG_HOWTOUSETEMP', "<li>您可以選擇 Magazine 相關頁面對應的樣板檔.<br /><li><b>警告:</b>假如您不確定應該如何配置樣板, 那我們強烈的建議您離開與保留此區域的預設值!");
define( '_AM_MAG_ADDINGATEMPLATE', "<b>新增樣板步驟</b>");
define( '_AM_MAG_HOWTOUSETEMP2', "<li>在新增樣板時, 請先由檔案 Magazine 樣版資料中複製.<br /><li>然後您必須 <a href='../../../modules/system/admin.php?fct=modulesadmin&op=update&module=magazine'>更新 Magazine 模組</a> 將檔案寫入資料庫.<br /><li>如果失敗了您會得到空白畫面.");
define( '_AM_MAG_DISPLAYXOOPSTEMPADMIN', 'Xoops 樣板設定管理:' );
define( '_AM_MAG_ISBLOCKS', '區塊樣板' );
define( '_AM_MAG_TEMPLDOWNLOADS', '文章附件樣板' );
define( '_AM_MAG_TEMPLPOLL', '文章投票樣板' );
define( '_AM_MAG_TEMPLARCHIVES', '分月文章樣板' );
define( '_AM_MAG_TEMPLARTINDEX', '分類文章樣板' );
define( '_AM_MAG_TEMPLSECINDEX', '所有類別頁面樣板' );
define( '_AM_MAG_TEMPLART', '文章頁面:包含文章相關資訊 (預設)' );
define( '_AM_MAG_TEMPLART_INFO', '文章相關資訊' );
define( '_AM_MAG_TEMPLPLAINART', '文章頁面:不含文章相關資訊 (純文字模式)' );
define( '_AM_MAG_TEMPLTOPTEN', 'Top 10 頁面樣版' );
define( '_AM_MAG_ARTMENUBLOCK', '文章選單區塊' );
define( '_AM_MAG_BIGSTORYBLOCK', '重大文章區塊' );
define( '_AM_MAG_MAINMENUBLOCK', '主選單區塊' );
define( '_AM_MAG_NEWARTBLOCK', '新進文章區塊' );
define( '_AM_MAG_NEWDOWNBLOCK', '文章附件區塊' );
define( '_AM_MAG_TOPARTBLOCK', '熱門文章區塊' );
define( '_AM_MAG_TOPICSBLOCK', '文章分類區塊' );
define( '_AM_MAG_SPOTLIGHTBLOCK', '焦點文章區塊' );
define( '_AM_MAG_NEWDOWNLOADSBLOCK', '新進附件區塊' );
define( '_AM_MAG_AUTHORBLOCK', '作者資訊區塊' );
define( '_AM_MAG_VIEW', '觀看' );
/**
 * Indexpage management
 */
define( '_AM_MAG_INDEXPAGE', '頁面管理' );
define( '_AM_MAG_INDEXPAGEINFO', '頁面管理資訊' );
define( '_AM_MAG_INDEXPAGEINFOTXT', '<li>「頁面管理」 功能允許您設計各種關於 Magazine 的頁面.<li>您可以輕鬆的改變 logo 圖片,頁首與頁尾描述文字為您所想要的.' );
define( '_AM_MAG_INDEXPAGELISTING', '頁面管理列表' );

define("_AM_MAG_PAGENAME2", "頁面名稱" );
define("_AM_MAG_MODIFYPAGE", "變更新頁面" );
define("_AM_MAG_ADDPAGE", "建立新頁面" );
define("_AM_MAG_INDEXHEADING", "頁首標題:" );
define("_AM_MAG_INDEXFOOTING", "頁尾標題" );
define("_AM_MAG_INDEXPAGEEDIT", "編輯頁面" );
define("_AM_MAG_SECTIONIMAGE", "頁面圖片:" );
define("_AM_MAG_SECTIONHEAD", "頁首描述:" );
define("_AM_MAG_SECTIONFOOT", "頁尾描述:" );
define("_AM_MAG_ALIGNMENT", "<b>對齊方式:</b>" );
define("_AM_MAG_ISDEFAULT", "預設值" );
define("_AM_MAG_PAGENAME", "頁面名稱:" );

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
define("_AM_MAG_MINDEX_ACTION", "動作" );
define("_AM_MAG_MINDEX_PAGE", "<b>頁:<b> " );
// Database Lang defines
define("_AM_MAG_RUSUREDEL", "您確定要刪除這篇文章嗎?" );
// Section Lang Defines
define("_AM_MAG_CATEGORY", "類別名稱" );
define("_AM_MAG_CATEGORYNAME", "類別標題:" );
define("_AM_MAG_SECTIONPAGEDETAILS", "類別描述" );
define("_AM_MAG_TEXTOPTIONS", "文字格式選項:" );
define("_AM_MAG_GROUPPROMPT", "類別瀏覽權限:<div style='padding-top:8px;'>選擇可以瀏覽本類別的會員群組.</div>");
define("_AM_MAG_IN", "所屬主類別:<div style='padding-top:8px;'>選擇所屬主類別將成為該類別的子類別.</div>");
define("_AM_MAG_MOVETO", "搬移類別:" );
define("_AM_MAG_CATEGORYWEIGHT", "類別排序:<div style='padding-top:8px;'>類別文章顯示排序:0 為最優先</div>");
define("_AM_MAG_CATEGORYDESC", "類別描述:<div style='padding-top:8px;'>可使用 HTML 標籤或 XOOPS CODE,ENTER 會自動斷行</div>");
define("_AM_MAG_ADDMCATEGORY", "新增類別" );
define("_AM_MAG_CATEGORYTAKEMETO", "按這裡新增一個類別.");
define("_AM_MAG_NOCATEGORY", "錯誤 - 沒有新增任何類別.");
define("_AM_MAG_MODIFYCATEGORY", "變更類別");
define("_AM_MAG_MOVECATEGORY", "搬移類別所屬文章");
define("_AM_MAG_MOVEDEL", "搬移文章");
define("_AM_MAG_EDITSECTION2", "移至類別:");
define("_AM_MAG_MOVE", "搬移");
define("_AM_MAG_MOVEARTICLES", "搬移文章至類別");
define('_AM_MAG_DUPLICATECATEGORY', '複製類別');
define('_AM_MAG_COPY', '複製類別:');
define('_AM_MAG_TO', '至:');
define('_AM_MAG_NEWCATEGORYNAME', '新類別名稱:');
define('_AM_MAG_DUPLICATE', '複製');
define('_AM_MAG_DUPLICATEWSUBS', '複製時包含子類別');
define("_AM_MAG_SECTIONCOPYARTICLES", "複製時包含類別文章?");
define("_AM_MAG_ADDSECTIONTOMENU", "新增類別至主選單區塊?");
define("_AM_MAG_SECTIONTEMPLATE", "選擇類別樣板:");
define("_AM_MAG_SHOWCATEGORYIMG", "<b>顯示類別圖片:&nbsp;</b>");
define("_AM_MAG_SECTIONIMAGEALIGN", "<b>圖片對齊方式:&nbsp;</b>");
define("_AM_MAG_SECTIONIMAGEOPTION", "類別圖片選項:");
define("_AM_MAG_SECTIONSTATUS", "類別狀態:<div style='padding-top:8px;'>設定類別是否顯示於模組首頁. 假如設定為離線, 該類別將自動隱藏</div>");
define("_AM_MAG_CATEGORYHEADTITLE", "類別頁首標題:");
define("_AM_MAG_CATEGORYHEAD", "類別頁首描述:<div style='padding-top:8px;'>留空將以主類別頁首描述取代.</div>");
define("_AM_MAG_CATEGORYFOOTTITLE", "類別頁尾標題:");
define("_AM_MAG_CATEGORYFOOT", "類別頁尾描述:<div style='padding-top:8px;'>留空將以主類別頁尾描述取代.</div>");
define("_AM_MAG_GROUPCREATEPROMPT", "撰寫文章權限:<div style='padding-top:8px;'>選擇可以在本類別建立文章的會員群組.</div>" );
// Document Lang defines
define("_AM_MAG_ADDNEWAUTH", " 選擇新作者" );
define("_AM_MAG_EDITARTICLE", "文章管理資訊" );
define("_AM_MAG_EDITARTICLETEXT", "<li>在這裡您可以撰寫 / 編輯 / 複製文章" );
define("_AM_MAG_WAYSYWTDTTAL", "警告:您確定要刪除這個類別及其以下所有文章嗎?" );
define("_AM_MAG_FILEDEL", "警告:您確定要刪除這項附件嗎?" );
define("_AM_MAG_UPLOADED", "上傳成功!" );
define("_AM_MAG_SELECTITEM", "選擇");
define("_AM_MAG_NOSELECT", "未選擇");
define("_AM_MAG_NOSELECTFILE", "未選擇檔案");
define("_AM_MAG_SPOTLIGHT", "在該類別中標記為推薦佳作?");
define("_AM_MAG_SPOTLIGHTMAIN", "在首頁標記為推薦佳作?");
define("_AM_MAG_SPOTLIGHTMAIN_DESC", "若標記為贊助廣告此設定將無效");
define("_AM_MAG_SPOTLIGHTSPONSER", "在首頁中標記為贊助廣告?");
define("_AM_MAG_SPOTLIGHTSPONSER_DESC", "此功能只能指定一篇文章");
define("_AM_MAG_MENU", "其他設定");
define("_AM_MAG_EDITMAINTEXT", "3. 文章內容:" );
define("_AM_MAG_DOC_RESTORE", "還原文章到上一個版本" );
/**
 * all article information text
 */
define("_AM_MAG_APPROVE", "核准");
define("_AM_MAG_BROKENDOWNLOADS", "失效檔案");
define("_AM_MAG_BROKENDOWNLOADSTEXT", "失效檔案資訊");
define("_AM_MAG_NOBROKEN", "尚無任合失聯檔案報告" );
define('_AM_MAG_BROKENTEXT', '<li>忽略 (忽略這個回報並刪除這份 <b>失聯檔案報告.</b>)
<li>編輯 (編輯或變此報告的檔案資料.)
<li>刪除 (刪除 <b>此報告的檔案資料</b> 與 <b>失聯檔案報告</b>)' );
define("_AM_MAG_BROKENFILEIGNORED", "這份報告已經被您忽略" );
define("_AM_MAG_BROKENFILEDELETED", "這份檔案已經被您刪除" );
define("_AM_MAG_REPORTER", "回報者" );
define("_AM_MAG_FILETITLE", "檔案名稱 " );
define("_AM_MAG_ARTICLETITLE", "文章標題 ");
define("_AM_MAG_ARTICLEMANAGE", "文章管理" );
define("_AM_MAG_CANNOTHAVECATTHERE", "錯誤:類別不得變更為其所屬子類別!" );
define("_AM_MAG_SECTIONMANAGE", "類別管理" );
define("_AM_MAG_FILEID", "檔案" );
define("_AM_MAG_FILEICON", "圖示" );
define("_AM_MAG_REALFILENAME", "真實名稱");
define("_AM_MAG_FILEMIMETYPE", "檔案類型");
define("_AM_MAG_FILESIZE", "檔案大小");
define( '_AM_MAG_FILESTATS', '附件檔案狀態' );
define('_AM_MAG_FILESTAT', '文章檔案狀態:');
define('_AM_MAG_CATREORDERTEXT', '<li>您可以在此變更目前所有的類別與文章排序.<li>所有的類別與文章順序都是按照排序值排列.<li>若想重新排序類別下的文章,只要點按類別名稱就能顯示該分類文章列表.');
define('_AM_MAG_ATTACHEDFILE', '檔案資訊');
define('_AM_MAG_TDISPLAYSATTACHEDFILES', '<li>所有檔案將依照其 ID 排序.<br /><li>您可以在此編輯或刪除檔案.');
define('_AM_MAG_VOTEDATA', '投票相關資訊');
define('_AM_MAG_VOTEDATATEXT', '<li>投票資料的將依照 RID 排序.');
define('_AM_MAG_ATTACHEDFILEM', '附件管理');
define('_AM_MAG_CAREORDER', '排序管理');
define('_AM_MAG_CAREORDER2', '類別與文章排序');
define("_AM_MAG_EDITHTMLFILE", "2. 選擇 HTML 文章:<div style='padding-top:8px;'>此文章將以內文的方式呈現在該頁中.</div>");
define("_AM_MAG_DOCTITLE"," 使用 HTML 檔案名稱作為文章標題");
define("_AM_MAG_DOHTMLDB"," 將 HTML 檔案內容匯入資料庫");
define("_AM_MAG_EDITWORDBROWSE", "選擇 Word 文章");
define('_AM_MAG_EDITGROUPPROMPT', "文章閱覽權限:<div style='padding-top:8px;'>選擇能夠閱覽本文章的會員群組.</div>");
define("_AM_MAG_EDITSECTION", "所屬類別:");
define("_AM_MAG_EDITWEIGHT", "文章排序:0 為最優先,");
define("_AM_MAG_EDITCAUTH", "文章作者:");
define("_AM_MAG_EDITCAUTH2", "文章作者:<div style='padding-top:8px;font-weight:normal; color:red;'><br />警告:<br />
假如您想要變更這篇文章的任何內容請先設定不使用作者下拉選單! <br />(作者下拉選單中若有超過 300 位作者將會出現錯誤)</div>" );
define("_AM_MAG_EDITLINKURL", "1. 連結文章:<div style='padding-top:8px;'>輸入要作為文章內容的網址.</div>" );
define("_AM_MAG_EDITLINKURLADD", "URL 位址:<br />");
define("_AM_MAG_EDITLINKURLNAME", "URL 名稱:<br />");
define("_AM_MAG_EDITARTICLETITLE", "文章標題:" );
define("_AM_MAG_PUBLISHDATE","文章發布日期:");
define("_AM_MAG_EXPIREDATESET", " 過期日期設定:");
define("_AM_MAG_EXPIREDATE","文章過期日期:");
define("_AM_MAG_CLEARPUBLISHDATE","<br /><br />移除發布日期:");
define("_AM_MAG_CLEAREXPIREDATE","<br /><br />移除過期日期:");
define("_AM_MAG_PUBLISHDATESET"," 發布日期設定:");
define("_AM_MAG_SETDATETIMEPUBLISH"," 設定發布的 時間/日期");
define("_AM_MAG_SETDATETIMEEXPIRE"," 設定過期的 時間/日期");
define("_AM_MAG_SETPUBLISHDATE","<b>設定發布日期:</b>");
define("_AM_MAG_SETEXPIREDATE","<b>設定過期日期:</b>");
define("_AM_MAG_EXPIREWARNING","<br />警告:過期日期不能早於發布日期! ");
define("_AM_MAG_EDITSUMMARY", "文章摘要:<div style='padding-top:8px;'>摘要只允許純文字格式.<br />自動摘要可以擷取文章內容作為摘要.</div>
<div style='padding-top: 8px;'>顯示其他網站連結於文章列表.</div>
" );
define('_AM_MAG_EDITAUTOSUMMARY', ' 使用自動摘要' );
define('_AM_MAG_EDITREMOVEIMAGES', ' 由自動摘要中移除圖片');
define('_AM_MAG_EDITSUMMARYAMOUNTW', '自動摘要長度:(字數)');
define('_AM_MAG_EDITSUMMARYAMOUNTC', '自動摘要長度:(字元數)');
define("_AM_MAG_EDITMOVETOTOP", " 移至文章列表頂端");
define("_AM_MAG_EDITAPPROVE", "核准本文章?");
define("_AM_MAG_EDITALLOWCOMENTS", " 允許評論本文");
define("_AM_MAG_EDITJUSTHTML", " 不顯示任何文章相關資訊");
define("_AM_MAG_EDITNOSHOART", " 不顯示文章於任何文章列表中" );
define("_AM_MAG_EDITOFFLINE", " 設定文章狀態為離線文章" );
define("_AM_MAG_EDITMAINMENU", " 新增文章連結至主選單區塊" );
define("_AM_MAG_CREATEDBY", "原作者:" );
define("_AM_MAG_LASTEDITBY", "最後編輯由: ");
define("_AM_MAG_CREATEDON", "建立於: ");
define("_AM_MAG_EDITEDON", "編輯於: ");
define("_AM_MAG_ADDAFILETOTHISDOWNLOAD", " 附加檔案 ");

define("_AM_MAG_EDITDISCUSSINFORUM", "加入討論區連結?");
define("_AM_MAG_EDITDISCUSSINFORM", "加入表單連結?");
define("_AM_MAG_EDITDISCUSSINSTORE", "加入商品連結?");
define("_AM_MAG_EDITDISCUSSINSIGN", "加入活動連結?");
define("_AM_MAG_EDITDISBLOCKS", "選擇是否在頁面中顯示區塊位置?");
define("_AM_MAG_EDITDISSUMMARYBREAKS", "摘要中是否使用斷行轉換?" );

define("_AM_MAG_USECATEGORYACCESS", " 繼承文章所屬類別讀取權限?" );
define('_AM_MAG_REORDERID', 'ID' );
define('_AM_MAG_REORDERPID', 'PID' );
define('_AM_MAG_REORDERTITLE', '標題');
define('_AM_MAG_REORDERDESCRIPT', '描述');
define('_AM_MAG_REORDERWEIGHT', '排序');
define('_AM_MAG_REORDERSUMMARY', '摘要');
define("_AM_MAG_EXTRADOC_TEXT", "<div style='padding-top:8px;'><b>分頁標籤</b>:文章如果要分頁,請在分頁處加入 <b>[pagebreak]</b>.</div>
<div style='padding-top:8px;'><b>分頁目錄</b>:使用 <b>[title]</b>標題文字<b>[/title]</b> 可以建立文章分頁目錄.</div>
<div style='padding-top:8px;'><b>加密文字</b>:使用 <b>[ssl]</b>文字內容<b>[/ssl]</b> 可將文章內容加入隱碼 (需搭配 css 設定).</div>
" );
/**
 * Main Configuration
 */
define("_AM_MAG_SECTIONSETTINGS", "類別管理資訊" );
define("_AM_MAG_SECTIONSETTINGSTEXT", "<li>在這裡您可以輕鬆的建立, 修改與刪除您所有的文章分類..");
define("_AM_MAG_MODIFICATION", "變更申請");
define("_AM_MAG_MODIFICATIONINFO", "變更申請資訊");
define("_AM_MAG_MODIFICATIONTEXT", "<li>在這個區域你可以瀏覽所有申請變更但尚未通過審核的文章.<br /><li>您可以在此閱覽、變更或核准這些文章." );
/**
 * Index Page management
 */

/**
 * Copyright and Support.  Please do not remove this line as this is part of the only copyright agreement for using Magazine
 */
define('_AM_MAG_RETCATREORDER', '返回類別重新排序');
define('_AM_MAG_ARTREORDER', '文章已重新排序!');
define('_AM_MAG_CATREORDER', '選擇的類別已重新排序!');
define('_AM_MAG_NOFILESFOUND', '尚未發現任何檔案');
define('_AM_MAG_TOTALATTFILES', '檔案總數:');
define('_AM_MAG_APPROVED', '已審核');
define('_AM_MAG_ERROR_APPROVED', '核准時發生錯誤');
// votedata
define("_AM_MAG_USER", "名稱");
define("_AM_MAG_IP", "IP 位址");
define("_AM_MAG_USERAVG", "平均得票");
define("_AM_MAG_TOTALRATE", "總票數");
define("_AM_MAG_NOREGVOTES", "尚無任何投票紀錄");
define("_AM_MAG_DATE", "日期");
define("_AM_MAG_ARTICLE", "文章名稱");
define("_AM_MAG_RATING", "投票");
define("_AM_MAG_VOTEDELETED", "投票已刪除");
// Modify Document
define("_MD_USERMODREQ", "會員文章修改申請");
define("_AM_MAG_MOVETOART", "移至文章:(留空將不做改變)");
// Modified Documents
define("_AM_MAG_MODIFIED", "變更");
define("_AM_MAG_ORIGINAL", "原始文章");
define("_AM_MAG_AUTHOR", "作者:");
define("_AM_MAG_MAINTEXT", "主文:");
define("_AM_MAG_SUBTITLE", "副標題:" );
define("_AM_MAG_SUMMARY", "摘要:" );
define("_AM_MAG_URL", "URL:" );
define("_AM_MAG_URLNAME", "URL 名稱:" );
define("_AM_MAG_TITLE1", "標題:" );
define("_AM_MAG_PUBLISHEDDATE", "已發布:");
define("_AM_MAG_SUMITDATE", "變更日期:");
define("_AM_MAG_PROPOSED", "推薦文章");
define("_AM_MAG_POST", "儲存");
define("_AM_MAG_POSTNEWARTICLE", "編輯修改文章");
define("_AM_MAG_WAYSYWTDTTAL2", "刪除修改文章?");
define("_AM_MAG_MODREQDELETED", "修改文章已刪除");
// Document Stats
define("_AM_MAG_ARTICLESTATS", "文章狀態");
define("_AM_MAG_ARTICLESTATSFOR", "文章狀態:");
define("_AM_MAG_ISLEFT", "左" );
define("_AM_MAG_ISCENTER", "中" );
define("_AM_MAG_ISRIGHT", "右" );
define("_AM_MAG_CREATEARTICLE", "建立新文章");
define("_AM_MAG_MODIFYARTICLE", "變更文章:");
define("_AM_MAG_NODETAILSRECORDED", "沒有詳細說明記錄");
//define("_AM_MAG_ISADMINNOTICE", "管理通知:您需做這些修正");
define("_AM_MAG_ISSORRYMESSAGE2", " 正在編輯這篇文章文章,編輯起始時間:");
define("_AM_MAG_STATARTICLEID", "文章編號:");
define("_AM_MAG_STATTITLE", "標題:");
define("_AM_MAG_STATWEIGHT", "排序:");
define("_AM_MAG_STATSECTION", "所述類別:");
define("_AM_MAG_STATAUTHOR", "原始作者:");
define("_AM_MAG_STATCREATED", "建立日期:");
define("_AM_MAG_STATPUBLISHED", "發布日期:");
define("_AM_MAG_STATEXPIRED", "過期日期");
define("_AM_MAG_STATLASTEDITED", "最後編輯日期:");
define("_AM_MAG_STATLASTEDITEDBY", "最後編輯者:");
define("_AM_MAG_STATTIMESEDITEDBYAUTHOR", "原作者編輯過的次數:");
define("_AM_MAG_STATTIMESEDITEDBYLASTEDITOR", "最後一位編輯者的編輯次數:");
define("_AM_MAG_STATTIMESEDITEDTOTAL", "總編輯次數:");
define("_AM_MAG_STATCOUNTER", "文章閱讀數:");
define("_AM_MAG_STATRATING", "文章得分:");
define("_AM_MAG_STATRATINGHIGH", "最高得分:");
define("_AM_MAG_STATRATINGLOW", "最低得分:");
define("_AM_MAG_STATVOTES", "參與評分人數:");
define("_AM_MAG_STATDOWNLOADS", "附件檔案編號:");
define("_AM_MAG_STATCOMMENTSALLOWED", "能夠評論?");
define("_AM_MAG_STATCOMMENTS", "全部評論:");
define("_AM_MAG_STATSTATUS", "文章狀態:");
define("_AM_MAG_RELATEDART", "關聯文章管理" );

define("_AM_MAG_RELATEDARTADMIN", "關聯文章資訊" );
define("_AM_MAG_RELATEDARTADMINTXT", "關聯文章可以由 Magazine 本身文章或新聞模組中取得:
<br /><li><b>文章:</b> 您可以選擇同為 Magazine 下的文章彼此關聯.</li>
<li><b>新聞:</b> 您可以選擇 News 模組下的文章彼此關聯.</li>
" );

define("_AM_MAG_RELATEDDOCLIST", "關聯文章選擇列表:
<br /><li><b>文章:</b> 請由文章選擇列表中選取.</li>
<li><b>新聞:</b> 請由新聞選擇列表中選取.</li>
" );

define("_AM_MAG_RELATEDNEWSLIST", "關聯新聞欄位說明" );
define("_AM_MAG_RELATEDDOCUMENTLIST", "關聯文章選擇列表說明" );

define("_AM_MAG_RELATEDNEWSLISTTXT", "
<li><b>ID:</b> 列表順序編號.</li>
<li><b>標題:</b> 文章標題名稱.</li>
<li><b>排序:</b> 文章排列順序.</li>
<li><b>新增關聯項目:</b> 核取可以新增文章相關連結,取消核取則移除文章相關連結.</li>
<li><b>選擇全部:</b> 快速選擇或清除文章相關連結.</li>
" );

define("_AM_MAG_RELATEDLINKLIST", "相關連結欄位說明" );
define("_AM_MAG_RELATEDLINKLISTTXT", "
<li><b>ID:</b> 列表順序編號.</li>
<li><b>標題:</b> 文章標題名稱.</li>
<li><b>排序:</b> 文章排列順序.</li>
<li><b>動作:</b> 點按圖示可以幫該文章新增相關連結.</li>
" );

define("_AM_MAG_RELATEDLINKLIST2", "建立新的相關連結" );
define("_AM_MAG_RELATEDLINKLISTTXT2", "
<li><b>相關連結:</b> 相關連結的網址.</li>
<li><b>相關連結名稱:</b> 相關網址的文字描述.</li>
<li><b>排序:</b> 相關連結排列順序.</li>
<li><b>動作:</b> 編輯或刪除相關連結項目.</li>
" );//dqflyer fixed the "Perform" word

define("_AM_MAG_NO_DOCS_CREATEDYET", "尚無任何文章可以選擇." );
define("_AM_MAG_RELATED_DOC", "文章" );
define("_AM_MAG_RELATED_NEWS", "新聞" );
define("_AM_MAG_ADDRELATEDART", "新增關聯文章" );
define("_AM_MAG_RELATEDITEM", "新增關聯項目" );
define("_AM_MAG_RELATEDART_WEIGHT", "排序" );
define("_AM_MAG_ARTID", "ID" );
define("_AM_MAG_SHOWALL", "選擇全部");
define("_AM_MAG_FAILTOSEE", "搞什麼阿笨蛋! 請勿將文章複製到同個類別下好唄!" );
define("_AM_MAG_NOARTICLE", "這篇文章並不存在");
define("_AM_MAG_NOARTICLESSELECTED", "沒有選擇文章");
define("_AM_MAG_ARTICLESMOVED", "選擇的文章已移到新類別");
define("_AM_MAG_ANDMOVED", "移到新類別:");
define("_AM_MAG_SELECTALLNONE", "全選/全不選");
define("_AM_MAG_SUBMIT1", "確定" );
define("_AM_MAG_VOTES","票數:");
define("_AM_MAG_SORTBY1", "分類:" );
define("_AM_MAG_DATE1","日期");
define("_AM_MAG_ARTICLEID1","文章 ID");
define("_AM_MAG_RESET","重置");
define("_AM_MAG_NOSUCHSECTION","<b>錯誤</b>:查無符合的類別");
define("_AM_MAG_NOTITLESET","無標題");
define("_AM_MAG_EDITSUBTITLE","文章副標題:");
define("_AM_MAG_SELECT_IMG","文章圖片:");
define("_AM_MAG_TOTALNUMARTS","文章總數:");
define("_AM_MAG_STATUSERTYPE", "會員所屬群組:" );
define("_AM_MAG_DATEIN", "編輯起始時間:" );
define("_AM_MAG_DATEOUT", "編輯完成時間:" );
define("_AM_MAG_DOCEDITHISTORY","編輯文章紀錄");
define("_AM_MAG_STILLEDITING","仍在編輯中的文章");
define("_AM_MAG_DOCSINEDITING","編輯中的文章");
define("_AM_MAG_EDITVERSION"," 儲存時自動更新版本");
define("_AM_MAG_EDITVERSIONNUM","文章版本:");
define("_AM_MAG_OTHEROPTIONS", "其他項目" );
// mag_fileshow defines
define("_AM_MAG_ATTACHEDFILES","附加檔案組態");
define("_AM_MAG_FILEUPLOAD","上傳檔案至文章:");
define("_AM_MAG_ATTACHEDFILEEDITH","上傳新檔案");
define("_AM_MAG_ATTACHFILE","上傳的檔案");
define("_AM_MAG_FILESHOWNAME","檔案名稱");
define("_AM_MAG_FILEDESCRIPT","檔案描述");
define("_AM_MAG_FILETEXT","搜尋關鍵字");
define("_AM_MAG_NOT_PUBLISHED", "尚未發布" );
define("_AM_MAG_NOT_SET","尚未設定");
define("_AM_MAG_NOT_CHANGED","尚未變更");
define("_AM_MAG_TIMES"," 次");
define("_AM_MAG_ONLINE","在線");
define("_AM_MAG_OFFLINE","離線");
define("_AM_MAG_DISPLAYPAGES", "顯示分頁:" );
define("_AM_MAG_ARTICLERESTOREHEADING", "文章還原管理" );
define("_AM_MAG_ARTICLERESTOREINFO", "文章還原說明" );
define("_AM_MAG_ARTICLERESTORETEXT", "當您開啟文章還原功能後,每當您編輯一次文章便會將文章內容備份進資料庫,方便您恢復文章回較早的狀態.<br />請注意! 如果您經常編輯文章這將使用非常多的資料庫空間,所以請您定期清理布必要的備分資料." );
define("_AM_MAG_RESTORE_ID", "RID" );
define("_AM_MAG_RESTORE_DATE","備份日期");
define("_AM_MAG_RESTORE_ARTICLEID", "AID" );
define("_AM_MAG_RESTORE_TITLE","文章標題");
define("_AM_MAG_RESTORE_VERSION","版本");
define("_AM_MAG_RESTORE_ACTION","動作");
define("_AM_MAG_RESTORE_CREATED","發佈日期");
define("_AM_MAG_RESTORE_PUBLISHED","發布");
define("_AM_MAG_NORESTORE","還原的文章 id 並不存在");
define("_AM_MAG_NORESTORE_POINTS","這份文章尚無還原點");
define("_AM_MAG_DELETERESTORE","刪除還原點?");
define("_AM_MAG_RESTOREDELETED","還原點已被刪除.");
define("_AM_MAG_ERROR_RESTOREDELETED","刪除還原點時發生錯誤.");
define("_AM_MAG_FILEEXISTS", " (檔案已存在)" );
define("_AM_MAG_FILEERROR", "錯誤:" );
define("_AM_MAG_FILEERRORPLEASECHECK", " 請核對檔案!" );
define("_AM_MAG_NUMBER", " NO:" );
define("_AM_MAG_ATTACHEDARTICLE","附加檔案至文章:");
define("_AM_MAG_RATINGID", "RID" );
// Related LINKS
define("_AM_MAG_RELATEDLINKS","相關連結管理");
define("_AM_MAG_RELATEDLINKSADMIN","相關連結資訊");
define("_AM_MAG_RELATEDLINKSLIST","相關連結列表");
define("_AM_MAG_ADDRELATEDLINK","新增相關文章連結");
define("_AM_MAG_RELATED_URL","連結 URL");
define("_AM_MAG_RELATED_URLNAME","連結名稱");
define("_AM_MAG_RELATED_WEIGHT","排序");
define("_AM_MAG_ID", "ID" );
define('_AM_MAG_NOURLFOUND', '沒有相關連結');
define( '_AM_MAG_DELETERELEATEDLINK', '是否刪除此相關連結?' );
define( '_AM_MAG_RELATED_DELETED', '這個相關連結已經刪除!' );
define( '_AM_MAG_RELATED_DBUPDATED', '這個相關連結已經建立或更新' );

// Reviews
define("_AM_MAG_OTHER_INFOADMIN", "自訂內容資訊" );
define("_AM_MAG_OTHER_INFOADMINTXT", "當您有特殊的欄位需求時您可以使用自訂內容功能:
<br /><li>每個標題與內容為一組完整資訊.</li>
<li>若您未填寫內容將不會在前台中呈現該組自訂內容.</li>
" );
define("_AM_MAG_OTHER_INFO","自訂內容: ");
define("_AM_MAG_TITLE_1", "自訂欄位 1 - 標題:" );
define("_AM_MAG_DESC_1", "自訂欄位 1 - 內容:" );
define("_AM_MAG_TITLE_2", "自訂欄位 2 - 標題:" );
define("_AM_MAG_DESC_2", "自訂欄位 2 - 內容:" );
define("_AM_MAG_TITLE_3", "自訂欄位 3 - 標題:" );
define("_AM_MAG_DESC_3", "自訂欄位 3 - 內容:" );
define("_AM_MAG_TITLE_4", "自訂欄位 4 - 標題:" );
define("_AM_MAG_DESC_4", "自訂欄位 4 - 內容:" );
define("_AM_MAG_TITLE_5", "自訂欄位 5 - 標題:" );
define("_AM_MAG_DESC_5", "自訂欄位 5 - 內容:" );
define("_AM_MAG_TITLE_6", "自訂欄位 6 - 標題:" );
define("_AM_MAG_DESC_6", "自訂欄位 6 - 內容:" );
define("_AM_MAG_DISPLAYREVIEW", "顯示自訂內容?" );
define("_AM_MAG_ADD_REVIEW", "補充自訂內容" );

// Import settings
define("_AM_MAG_IMPORT", "匯入文章資訊" );
define("_AM_MAG_IMPORTTEXT", "匯入 HTML 文件至選擇的類別:
<br /><li><b>類別名稱:</b> 匯入文件所屬的類別名稱.</li>
<li><b>目錄/檔案名稱:</b> HTML 文件存放的路徑.</li>" );

define("_AM_MAG_ADD_SETTINGS", "變更其他文章設定" );
define("_AM_MAG_IMPORTWORD", "匯入 Word 文件" );
define("_AM_MAG_IMPORTWORDYES", "已啟用 Com 於伺服器端,您可以使用匯入 Word 文件的功能,但是您的伺服器端還必須安裝 Word 程式." );
define("_AM_MAG_IMPORTWORDNO", "並未啟用 Com 於伺服器端" );

define("_AM_MAG_IMPORTWORDINYES", "MS Word 已經安裝於伺服器端,您可以使用匯入 Word 文件的功能." );
define("_AM_MAG_IMPORTWORDINNO", "伺服器端尚未安裝 MS Word 程式." );
/**
 * Check for word
 */
define("_AM_MAG_IMPORTWORDTXT", "匯入 Word 文件使用說明: ");
define("_AM_MAG_IMPORTCOMENABLED", "伺服器是否為 Windows 系統?");
define("_AM_MAG_IMPORTWORDINSTALL", "是否已安裝 MS Word 程式在伺服器端?");
define("_AM_MAG_IMPORTWORDSELECT", "選擇一份 Word 文件上傳並匯入.");
define("_AM_MAG_WORDNOTINSTALLED", "您的伺服器環境目前不支援將匯入的 MS Word 文件轉換為文章." );
define("_AM_MAG_EDITDRAFT", "儲存為草稿文件?" );
define("_AM_MAG_IMPORT_DIRNAME", "目錄/檔案名稱" );
define("_AM_MAG_IMPORT_HTMLPROC", "處理 HTML 檔案" );
define("_AM_MAG_IMPORT_EXTFILTER", "額外過濾的檔案名稱");
define("_AM_MAG_IMPORT_BODY", "只匯入 HTML 檔案 body 部分");
define("_AM_MAG_IMPORT_INDEXHTML", "將同個目錄或在上層目錄的文件刪除到 index.html 的連結");
define("_AM_MAG_IMPORT_LINK", "以原始檔案名稱作為文章標題");
define("_AM_MAG_IMPORT_IMAGE", "以 image 目錄下的圖片作為連結");
define("_AM_MAG_IMPORT_ATMARK", "將 &amp;#064; 以 @ 符號取代");
define("_AM_MAG_IMPORT_TEXTPROC", "處理文字檔案");
define("_AM_MAG_IMPORT_TEXTPRE", "使用 &lt;pre&gt; &lt;/pre&gt; 圍繞文字檔案");
define("_AM_MAG_IMPORT_IMAGEPROC", "圖檔處理");
define("_AM_MAG_IMPORT_IMAGEDIR", "圖檔目錄路徑");
define("_AM_MAG_IMPORT_IMAGECOPY", "將文章中的圖片複製到圖檔目錄下.");
define("_AM_MAG_IMPORT_TESTMODE", "測試模式");
define("_AM_MAG_IMPORT_TESTDB", "測試模式下文章並不會儲存至資料庫. 當您正式儲存時請取消「啟用測試模式」勾選. ");
define("_AM_MAG_IMPORT_TESTEXEC", "啟用測試模式");
define("_AM_MAG_IMPORT_TESTTEXT", "顯示文字");
define("_AM_MAG_IMPORT_EXPLANE", "檢查檔案類型相關的副檔名.<br>例如 HTML 檔案可同時以 html 或 htm 作為副檔名.<br>文字檔案副檔名為 txt.<br>圖片檔案副檔名可能為 gif, jpg, jpeg, or png.<br>");
define("_AM_MAG_IMPORT_ERRDIREXI", "目錄或檔案並不存在");
define("_AM_MAG_IMPORT_ERRFILEXI", "程式碼過濾並不存在");
define("_AM_MAG_IMPORT_ERRFILEXEC", "程式碼過濾並未執行");
define("_AM_MAG_IMPORT_ERRNOCOPY", "複製圖檔沒有描述");
define("_AM_MAG_IMPORT_ERRNOIMGDIR", "圖檔目錄沒有描述");
define("_AM_MAG_IMPORT_ERRIMGDIREXI", "只訂圖檔目錄並不是一個存在目錄");
define("_AM_MAG_IMPORT_ERRFILEEXI", "檔案並不存在");
define("_AM_MAG_ARTRESTORENOTACT", "這項功能尚未啟用.");
define("_AM_MAG_ERRORFILEALLREADYEXISITS", "檔案已經存在於伺服器.");
//define("_AM_MAG_RELATEDARTS", "關聯文章列表");
//define("_AM_MAG_RELATEDNEWS", "關聯新聞列表");
define("_AM_MAG_ATTACHEDFILESADMIN","編輯附加檔案管理");
define("_AM_MAG_ATTACHEDFILEPREVIEW","預覽檔案");
define("_AM_MAG_ATTACHEDFILESTAS","檔案狀態");
define("_AM_MAG_ATTACHEDFILEEDIT","編輯檔案");
define("_AM_MAG_ATTACHEDFILEACCESS","允許權限:");
// Document Spotlight
define("_AM_MAG_DOCSPOTLIGHTHEADING","焦點文章管理");
define("_AM_MAG_DOCSPOTLIGHTINFO","焦點文章資訊");
define("_AM_MAG_DOCSPOTLIGHTTEXT","設定一篇顯示於焦點文章區塊的文章:
<li>焦點圖片</li>
<li>焦點圖片寬度</li>
<li>焦點圖片長度</li>
<li>焦點文章最大長度</li>
<li>摘要文字類型</li>
<li>焦點文章:自動套用最新發布的文章或自行設定</li>
" );
define("_AM_MAG_DOCSPOTLIGHTFORM","焦點文章設定");
define("_AM_MAG_DOCSPOTLIGHTDOC","焦點文章:");
define("_AM_MAG_DOCSPOTLIGHTIMAGE","文章附圖:");
define("_AM_MAG_USE_LASTPUBLISHED","最新發布的文章預設為為焦點文章");
define("_AM_MAG_CURRENT_SPOT","目前的焦點文章");
define("_AM_MAG_OTHERWISE_CHOOSEANARTICLE","您也能由下列文章列表指定焦點文章");
define("_AM_MAG_SPOTIT","核取"); // select it as spotlight document
define("_AM_MAG_SPOTIMAGE_MAXWIDTH","圖片寬度");
define("_AM_MAG_SPOTIMAGE_MAXHEIGHT","圖片長度");
define("_AM_MAG_SPOTDOCUMENT_MAXLENGTH", "顯示字數限制:<div style='padding-top:8px;'>請設定擷取的最大字數/字元. 設定 0 將顯示所有文字內容.</div>" );
define("_AM_MAG_SPOTDOCUMENT_SUMTYPE", "內容取得類型:" );
define("_AM_MAG_SPOTDOCUMENT_SUBTITLE", "文章副標題" );
define("_AM_MAG_SPOTDOCUMENT_SUMMARY", "文章摘要" );
define("_AM_MAG_SPOTDOCUMENT_MAINTEXT", "文章內容" );
// index.php
define("_AM_MAG_ARTICLENOTEXIST","錯誤:文章並不存在");
define("_AM_MAG_NOT_WORDDOC","錯誤:這不是個正確的 MS WORD 文章");
define("_AM_MAG_NO_FORUM", "沒有選擇討論區" );
define("_AM_MAG_NO_FORM", "沒有選擇表單" );
define("_AM_MAG_NO_STORE", "沒有選擇商品" );
define("_AM_MAG_NO_SIGN", "沒有選擇活動" );
define("_AM_MAG_CHECKIN_FAILED", "檢查文章錯誤");
define("_AM_MAG_SERVERSTATE", "伺服器狀態相關資訊" );
define("_AM_MAG_SPHPINI", "<b>PHP ini 取得資訊:</b>" );
define("_AM_MAG_SAFEMODESTATUS", "安全模式狀態:" );
define("_AM_MAG_REGISTERGLOBALS", "Register Globals:" );
define("_AM_MAG_MAGICQUOTESGPC", "Magic_quotes 狀態:" );
define("_AM_MAG_SERVERUPLOADSTATUS", "伺服器上傳狀態:");
define("_AM_MAG_MAXUPLOADSIZE", "最大上傳限制:");
define("_AM_MAG_MAXPOSTSIZE", "最大發表限制:");
define("_AM_MAG_SAFEMODEPROBLEMS", " (這也許會照成錯誤)");
define("_AM_MAG_GDLIBSTATUS", "GD 函式庫支援:");
define("_AM_MAG_GDLIBVERSION", "GD 函式庫版本:");
define("_AM_MAG_GDON", "<b>啟用</b> (可使用縮圖)");
define("_AM_MAG_GDOFF", "<b>關閉</b> (不可使用縮圖)");
define("_AM_MAG_OFF", "<b>OFF</b>" );
define("_AM_MAG_ON", "<b>ON</b>" );
define("_AM_MAG_ZLIBCOMPRESSION", "ZLib 壓縮:" );
define("_AM_MAG_MAXINPUTTIME", "Max Input Time:" );
define("_AM_MAG_FOPENURL", "FOpen URL:" );

define("_AM_MAG_EXT","副檔名:");
define("_AM_MAG_UPDATEDATE","最後更新:");
define("_AM_MAG_DOWNLOADNAME","附件名稱:");
define("_AM_MAG_FILEREALNAME","儲存名稱:");
define("_AM_MAG_ARTICLEID", "文章 ID:" );
define("_AM_MAG_DESCRIPTION", "檔案描述" );
define("_AM_MAG_NODESCRIPT","尚無檔案描述.");
define("_AM_MAG_ERRORCHECK", "檔案核對:" );
define("_AM_MAG_ADD_STATUS", "觀看文章狀態" );
define("_AM_MAG_FILEPERMISSION", "檔案權限:" );
define("_AM_MAG_DOWNLOADED", "下載次數:" );
define("_AM_MAG_DOWNLOADSIZE", "檔案大小:" );
define("_AM_MAG_LASTACCESS", "最後下載時間:" );
define("_AM_MAG_LASTUPDATED", "最後更新時間:" );
define("_AM_MAG_DEL", "刪除" );
// Mimetypes
define("_AM_MAG_MIMETYPE", "檔案類型:" );
define("_AM_MAG_MIMETYPES", "檔案類型管理" );
define("_AM_MAG_MIME_ID", "ID" );
define("_AM_MAG_MIME_EXT", "副檔名" );
define("_AM_MAG_MIME_NAME", "應用類型" );
define("_AM_MAG_MIME_ADMIN", "管理者" );
define("_AM_MAG_MIME_USER", "一般會員" );
// Mimetype Form
define("_AM_MAG_MIME_CREATEF", "建立檔案類型 (Mimetype)" );
define("_AM_MAG_MIME_MODIFYF", "變更檔案類型 (Mimetype)" );
define("_AM_MAG_MIME_EXTF", "副檔名:" );
define("_AM_MAG_MIME_NAMEF", "應用類別:<div style='padding-top:8px;'>請輸入關於此副檔名的應用描述.</div>" );
define("_AM_MAG_MIME_TYPEF", "檔案類型:<div style='padding-top:8px;'>請輸入各種跟此檔案有關的副檔名類型 (mimetype). 各種檔案類型之間請使用半形空格間隔.</div>" );
define("_AM_MAG_MIME_ADMINF", "允許管理群組使用的副檔名" );
define("_AM_MAG_MIME_ADMINFINFO", "<b>管理群組可以上傳以下副檔名所包含的檔案類型:</b>" );
define("_AM_MAG_MIME_USERF", "允許一般會員使用的副檔名" );
define("_AM_MAG_MIME_USERFINFO", "<b>一般會員可以上傳以下副檔名所包含的檔案類型:</b>" );
define("_AM_MAG_MIME_NOMIMEINFO", "沒有選擇任何檔案類型 (mimetype)." );
define("_AM_MAG_MIME_FINDMIMETYPE", "查詢檔案類型:" );
define("_AM_MAG_MIME_EXTFIND", "請輸入想查詢檔案類型的副檔名<div style='padding-top:8px;'>請輸入想要查詢檔案類型 (mimetype) 的副檔名.</div>" );
define("_AM_MAG_MIME_INFOTEXT", "<ul><li>您可藉由這個表單建立、編輯與刪除各種檔案類型.</li>
	<li>查詢檔案類型將會帶您轉向其他網站取得查詢結果.</li>
	<li>您可點按在線/離線圖示來改變管理者或一般會員的使用狀態.</li> 
	<li>變更檔案類型使用狀態.</li></ul> 
	" );
// Mimetype Buttons
define("_AM_MAG_MIME_CREATE", "建立" );
define("_AM_MAG_MIME_CLEAR", "重置" );
define("_AM_MAG_MIME_CANCEL", "清空" );
define("_AM_MAG_MIME_MODIFY", "變更" );
define("_AM_MAG_MIME_DELETE", "刪除" );
define("_AM_MAG_MIME_FINDIT", "查詢!" );
// Mimetype Database
define("_AM_MAG_MIME_DELETETHIS", "刪除您所選擇的檔案類型?" );
define("_AM_MAG_MIME_MIMEDELETED", "檔案類型 %s 已經被刪除了" );
define("_AM_MAG_MIME_CREATED", "新的檔案類型資訊已經建立" );
define("_AM_MAG_MIME_MODIFIED", "檔案類型資訊已經變更" );

define("_AM_MAG_GL_WEIGHTON", "<font color='tomato'>自動排序開啟</font>" );
define("_AM_MAG_GL_WEIGHTOFF", "<font color='tomato'>自動排序關閉</font>" );
define("_AM_MAG_DOCUMENTTYPES", "這裡共有三種不同的文章類型供您選擇,假如您同時填寫多種文章類型,前台將以類型數字越小者顯示." );
define("_AM_MAG_DOCUMENTTYPE", "<b>文章類型</b>" );
define("_AM_MAG_BIGUESER", "正體中文 (Big5) 語系使用者建議開啟" );

define("_AM_MAG_SELECTEDITOR","選擇編輯器:");

//Server Status
define("_AM_MAG_PHP_VERSION", "PHP 版本" );
define("_AM_MAG_XOOPS_VERSION", "XOOPS 版本" );
define("_AM_MAG_XOOPS_INSTALLED_PATH", "XOOPS 安裝路徑" );
define("_AM_MAG_XOOPS_URL", "XOOPS 對應網址" );
define("_AM_MAG_DATABASE_TYPE", "資料庫類型" );
define("_AM_MAG_DATABASE_NAME", "資料庫名稱" );
define("_AM_MAG_DATABASE_PREFIX", "資料庫字首" );

//Blocks State
define("_AM_MAG_ARTTEMPLATE", "選擇文章樣板及區塊狀態:");
define("_AM_MAG_NOBLOCKS", "不顯示區塊" );
define("_AM_MAG_SHOWALLBLOCKS", "顯示左右區塊" );
define("_AM_MAG_SHOWLEFTBLOCKS", "只顯示左區塊" );
define("_AM_MAG_SHOWRIGHTBLOCKS", "只顯示右區塊" );

//Related Intro
define("_AM_MAG_INTRO", "相關簡介:");
define("_AM_MAG_INTROADMIN", "相關簡介使用說明:
<br /><li>選擇的類型將會影響前台對應的語言檔.</li>
<li>簡介的內容將以彈出視窗顯示.</li>" );
define("_AM_MAG_ADDINTRO", "新增簡介:");
define("_AM_MAG_INTROLIST", "簡介列表:");

define("_AM_MAG_INTRO_MOD", "類型" );
define("_AM_MAG_INTRO_LYRIC", "歌詞" );
define("_AM_MAG_INTRO_BOOK", "書籍簡介" );
define("_AM_MAG_INTRO_NO", "編號");
define("_AM_MAG_INTRO_TITLE", "書名 / 歌名" );
define("_AM_MAG_INTRO_TEXT", "內容" );
?>

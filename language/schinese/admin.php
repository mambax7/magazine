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
define("_AM_MAG_SAVE", "储存");
define("_AM_MAG_SAVECHANGE", "储存变更");
define("_AM_UPDATED", "资料已完成更新");
define("_AM_MAG_EDIT", "编辑");
define("_AM_MAG_MODIFY", "变更");
define("_AM_MAG_DELETE", "删除");
define("_AM_MAG_CANCEL", "清空");
define("_AM_MAG_ACTION", "动作");
define("_AM_MAG_COPY1", "复制" );
define("_AM_MAG_NOARTICLEFOUND", "通知:目前尚无符合条件的文章" );
define("_AM_MAG_DISABLEHTML", " 不使用 HTML 标签");
define("_AM_MAG_DISABLESMILEY", " 不使用表情图示");
define("_AM_MAG_DISABLEXCODE", " 不使用 BB CODE");
define("_AM_MAG_DISABLEIMAGES", " 不显示图片");
define("_AM_MAG_DISABLEBREAK", " 自动断行转换?");
define("_AM_MAG_STRIPHTML", " 移除 HTML 标签 (转为纯文字内容)");
define("_AM_MAG_CLEANHTML", " 移除无效的 MS Word 标签");
define("_AM_MAG_NORIGHTS", "警告:您没有足够的权限可以浏览此区域" );

/**
 * Database defines
 */
define( "_AD_DBERROR","当您储存资讯到资料库时发现一个错误:<br /><br />请回报此错误至 <a href=\"http://singchi.no-ip.com/hack/\" target=\"_blank\">Magazine 支援网站</a><br /><br />请将错误描述复制告诉我们,我们会尽快提出解决方式.");
define( '_AM_MAG_WFPATHCONFIG', '路径设定已更新' );
define( '_AM_MAG_WFTEMPLATESCONFIG', '样板已更新' );
define( '_AM_MAG_DBUPDATED', '资料库已更新完成!' );
/**
 * Lang defines for breadcrumb system
 */
define( '_AM_MAG_BREADC1', '整体设定' );
define( '_AM_MAG_BREADC2', '文章列表' );
define( '_AM_MAG_BREADC3', '区块管理' );
define( '_AM_MAG_BREADC4', '路径设定' );
define( '_AM_MAG_BREADC5', '样版管理' );
define( '_AM_MAG_BREADC6', '模组首页' );
define( '_AM_MAG_BREADC7', '帮助' );
define( '_AM_MAG_BREADC8', '关于' );
define( '_AM_MAG_BREADC9', '伺服器状态' );
/**
 * Lang defines for menu system
 */
define( '_AM_MAG_ADMENU1', '页面管理' );
define( '_AM_MAG_ADMENU2', '分类管理' );
define( '_AM_MAG_ADMENU3', '撰写文章' );
define( '_AM_MAG_ADMENU4', '排序管理' );
define( '_AM_MAG_ADMENU5', '文章还原' );
define( '_AM_MAG_ADMENU6', '焦点文章' );
define( '_AM_MAG_ADMENU7', '相关文章' );
define( '_AM_MAG_ADMENU8', '相关连结' );
define( '_AM_MAG_ADMENU9', '相关简介' );
define( '_AM_MAG_ADMENUA', '文章评论' );
define( '_AM_MAG_ADMENUB', '投票资讯' );
define( '_AM_MAG_ADMENUC', '失连档案' );
define( '_AM_MAG_ADMENUD', '档案类型' );
define( '_AM_MAG_ADMENUE', '文章附件' );
define( '_AM_MAG_ADMENUF', '图片管理' );
/**
 * Summary information
 */
define( '_AM_MAG_SUMMARYINFO1', '摘要资讯' );
define( '_AM_MAG_SUMMARYINFO2', '类别' );
define( '_AM_MAG_SUMMARYINFO3', '发表' );
define( '_AM_MAG_SUMMARYINFO4', '待审' );
define( '_AM_MAG_SUMMARYINFO5', '变更' );
define( '_AM_MAG_SUMMARYINFO6', '编辑中' );
define( '_AM_MAG_SUMMARYINFO7', '失连档案' );
/**
 * allarticles document management
 */
define("_AM_MAG_ARTICLEMANAGEMENT", "文章管理" );
define("_AM_MAG_DOC_SELECTION", "选择文章" );
define("_AM_MAG_LIST", "<b>列表</b> " );
define("_AM_MAG_LISTINCAT", " <b>于目录</b> " );
/**
 * List article types
 */
define("_AM_MAG_ALLARTICLES", "所有文章" );
define("_AM_MAG_PUBLARTICLES", "已发布文章" );
define("_AM_MAG_SUBLARTICLES", "等待核准文章" );
define("_AM_MAG_ONLINARTICLES", "在线文章" );
define("_AM_MAG_OFFLIARTICLES", "离线文章" );
define("_AM_MAG_EXPIREDARTICLES", "已过期文章" );
define("_AM_MAG_AUTOEXPIREARTICLES", "自动过期文章" );
define("_AM_MAG_AUTOARTICLES", "自动发布文章" );
define("_AM_MAG_NOSHOWARTICLES", "纯文字模式文章" );
define("_AM_MAG_HTMLFILES", "HTML 档案文章" );
/**
 * menu lang defines
 */
define("_AM_MAG_ALLTXTHEAD", "所有文章模式" );
define("_AM_MAG_ALLTXT", "<div>在 <b>所有文章</b> 模式中您可以编辑,删除或重新命名任何文章. 在这模式下会将资料库中的所有文章全部显示.");
define("_AM_MAG_PUBLISHEDTXTHEAD", "已发布文章" );
define("_AM_MAG_PUBLISHEDTXT", "<div>在 <b>已发布文章</b> 模式中将显示所有已经通过审核的文章 (经过管理员核准)." ); //added
define("_AM_MAG_SUBMITTEDTXTHEAD", "等待核准文章" );
define("_AM_MAG_SUBMITTEDTXT", "<div>在 <b>等待核准文章</b> 模式中将显示所有等待管理员审核的文章.<br /><br />若您想核准文章, 只要按下 <b>编辑</b> 连结, 然后将 <b>核准本文章?</b> 勾选框打勾后储存变更. 这样就可以将文章发布了." ); //added
define("_AM_MAG_ONLINETXTHEAD", "在线文章" );
define("_AM_MAG_ONLINETXT", "<div>在 <b>在线文章</b> 模式中将显示所有状态为 <b>在线</b> 的文章.<br /><br />如果您想变更文章状态请按下 <b>编辑</b> 连结然后勾选 <b>设定文章状态为离线文章</b>." ); //added
define("_AM_MAG_OFFLINETXTHEAD", "离线文章" );
define("_AM_MAG_OFFLINETXT", "<div>在 <b>离线文章</b> 模式中将显示所有状态为 <b>离线</b> 的文章.<br /><br />如果您想变更文章状态请按下 <b>编辑</b> 连结然后取消勾选 <b>设定文章状态为离线文章</b>." ); //added
define("_AM_MAG_EXPIREDTXTHEAD", "已过期文章" );
define("_AM_MAG_EXPIREDTXT", "<div>在 <b>已过期文章</b> 模式中将显示所有已经被管理员设定为过期的文章 .<br /><br />如果您想变更过期时间请按下 <b>编辑</b> 连结然后设定 <b>文章过期日期</b>." ); //added
define("_AM_MAG_AUTOEXPIRETXTHEAD", "自动过期文章" );
define("_AM_MAG_AUTOEXPIRETXT", "<div>在 <b>自动过期文章</b> 模式中将显示所有曾经设定为过期日期并已经到期的文章.<br /><br />如果您想重新设定时间请按下 <b>编辑</b> 连结然后设定 <b>文章过期日期</b>." ); //added
define("_AM_MAG_AUTOTXTHEAD", "自动发布文章" );
define("_AM_MAG_AUTOTXT", "<div>在 <b>自动发布文章</b> 模式中将显示所有曾经预定发布日期并自动发布的文章.<br /><br />如果您想重新设定发布日期请按下 <b>编辑</b> 连结然后设定 <b>文章发布日期</b>." ); //added
define("_AM_MAG_NOSHOWTXTHEAD", "纯文字模式文章" );
define("_AM_MAG_NOSHOWTXT", "<div>在 <b>纯文字模式文章</b> " ); //added
define("_AM_MAG_HTMLFILESTXTHEAD", "HTML 档案文章" );
define("_AM_MAG_HTMLFILESTXT", "<div>在 <b>HTML 档案文章</b> 模式中将显示所有使用连结 HTML 档案来呈现的文章." ); //added
/**
 * Article listing defines
 */
define("_AM_MAG_STORYID", "ID" );
define("_AM_MAG_TITLE", "标题" );
define("_AM_MAG_POSTER", "作者" );
define("_AM_MAG_VERSION", "版本" );
define("_AM_MAG_SECTION", "类别" );
define("_AM_MAG_STATUS", "状态" );
define("_AM_MAG_WEIGHT", "排序" );

define("_AM_MAG_SUBMITTED2", "文章撰写日期" );
define("_AM_MAG_PUBLISHED", "文章发表日期" );
define("_AM_MAG_PUBLISHEDON", "文章发表日期" );
define("_AM_MAG_SUBMITTED", "已发布的文章" );
define("_AM_MAG_NOTPUBLISHED", "<font color='tomato'>尚未发布的文章</font>" );
define("_AM_MAG_EXPARTS", "已过期文章" );
define("_AM_MAG_EXPIRED", "自动过期日期" );
define("_AM_MAG_CREATED", "文章建立日期" );
/**
 * Blocks Management
 */
define("_AM_MAG_BLOCKSHEADING", "区块管理" );
define("_AM_MAG_BLOCKSINFO", "区块资讯" );
define("_AM_MAG_BLOCKSTEXT", "您可由“系统管理”→“区块管理”来调整所有区块设定.<br />下方主要是关于 Magazine 的区块. 您也可以在这里做区块设定调整." );
/**
 * Path Managment
 */
define("_AM_MAG_PATHCONFIGURATION", "路径组态" );
define("_AM_MAG_PATHCONFIG", "路迳与权限管理" );
define("_AM_MAG_FILEPATHWARNING", "<li>设定 Magazine 相关目录路径.
	<li>假如路径错误将出现警告提示.
	<li>路径栏位保持空白将使用该栏位预设路径." );
define("_AM_MAG_FILEPATH", "路径组态配置" );
define("_AM_MAG_FILEUSEPATH", "变更使用者路径" );
define("_AM_MAG_PATHEXIST", "路径存在!" );
define("_AM_MAG_PATHNOTEXIST", "路径并未存在." );
define("_AM_MAG_THUMBPATHEXIST", "路径存在!" );
define("_AM_MAG_THUMBPATHNOTEXIST", "路径并未存在." );
define("_AM_MAG_PATHCHECK", "<b>路径检查:</b> " );
define("_AM_MAG_PERMISSIONS", "<b>路径权限检查:</b>" );
define("_AM_MAG_THUMBPATHCHECK", "<b>缩图目录检查:</b> " );
define("_AM_MAG_THUMBPERMISSIONS", "<b>缩图目录权限检查:</b>" );
define("_AM_MAG_RESETDEFUALTS", " 重置所有路径回预设值" );
define("_AM_MAG_REVERTED", "还原路径组态回预设值" );
/**
 * Path Management form defines
 */
define("_AM_MAG_CMODERROR", "权限错误:请将路径权限设定为 0777." );
define("_AM_MAG_CMODERRORNOTCORRECTED", " 目前的权限数值并不正确." );
define("_AM_MAG_AGRAPHICPATH", "文章图片路径:<div style='padding-top:8px;'>文章图片存放目录.</div>");
define("_AM_MAG_SGRAPHICPATH", "类别图片路径:<div style='padding-top:8px;'>类别图片存放目录.</div>");
define("_AM_MAG_HTMLCPATH", "HTML 档案路径:<div style='padding-top:8px;'>HTML 档案存放目录.</div>");
define("_AM_MAG_LOGOPATH", "Logo 图片路径:<div style='padding-top:8px;'>logo 图片存放目录.</div>");
define("_AM_MAG_FILEUPLOADSPATH", "附加档案上传路径:<div style='padding-top:8px;'>附加档案上传存放目录.</div>");
define("_AM_MAG_FILEUPLOADSTEMPPATH", "附加档案 temp 上传路径:<div style='padding-top:8px;'>此非必需目录可以删除.</div>");
define("_AM_MAG_AVATARPATH", "大头照缩图路径:<div style='padding-top:8px;'>大头照缩图存放目录. <br />假如目录不存在请您新增这个目录.</div> " );
/**
 * Template management
 */
define( '_AM_MAG_MODIFYTEMPLATES', '样版管理' );
define( '_AM_MAG_USINGTEMPLATES', '使用样版管理' );
define( '_AM_MAG_HOWTOUSETEMP', "<li>您可以选择 Magazine 相关页面对应的样板档.<br /><li><b>警告:</b>假如您不确定应该如何配置样板, 那我们强烈的建议您离开与保留此区域的预设值!");
define( '_AM_MAG_ADDINGATEMPLATE', "<b>新增样板步骤</b>");
define( '_AM_MAG_HOWTOUSETEMP2', "<li>在新增样板时, 请先由档案 Magazine 样版资料中复制.<br /><li>然后您必须 <a href='../../../modules/system/admin.php?fct=modulesadmin&op=update&module=magazine'>更新 Magazine 模组</a> 将档案写入资料库.<br /><li>如果失败了您会得到空白画面.");
define( '_AM_MAG_DISPLAYXOOPSTEMPADMIN', 'Xoops 样板设定管理:' );
define( '_AM_MAG_ISBLOCKS', '区块样板' );
define( '_AM_MAG_TEMPLDOWNLOADS', '文章附件样板' );
define( '_AM_MAG_TEMPLPOLL', '文章投票样板' );
define( '_AM_MAG_TEMPLARCHIVES', '分月文章样板' );
define( '_AM_MAG_TEMPLARTINDEX', '分类文章样板' );
define( '_AM_MAG_TEMPLSECINDEX', '所有类别页面样板' );
define( '_AM_MAG_TEMPLART', '文章页面:包含文章相关资讯 (预设)' );
define( '_AM_MAG_TEMPLART_INFO', '文章相关资讯' );
define( '_AM_MAG_TEMPLPLAINART', '文章页面:不含文章相关资讯 (纯文字模式)' );
define( '_AM_MAG_TEMPLTOPTEN', 'Top 10 页面样版' );
define( '_AM_MAG_ARTMENUBLOCK', '文章选单区块' );
define( '_AM_MAG_BIGSTORYBLOCK', '重大文章区块' );
define( '_AM_MAG_MAINMENUBLOCK', '主选单区块' );
define( '_AM_MAG_NEWARTBLOCK', '新进文章区块' );
define( '_AM_MAG_NEWDOWNBLOCK', '文章附件区块' );
define( '_AM_MAG_TOPARTBLOCK', '热门文章区块' );
define( '_AM_MAG_TOPICSBLOCK', '文章分类区块' );
define( '_AM_MAG_SPOTLIGHTBLOCK', '焦点文章区块' );
define( '_AM_MAG_NEWDOWNLOADSBLOCK', '新进附件区块' );
define( '_AM_MAG_AUTHORBLOCK', '作者资讯区块' );
define( '_AM_MAG_VIEW', '观看' );
/**
 * Indexpage management
 */
define( '_AM_MAG_INDEXPAGE', '页面管理' );
define( '_AM_MAG_INDEXPAGEINFO', '页面管理资讯' );
define( '_AM_MAG_INDEXPAGEINFOTXT', '<li>“页面管理” 功能允许您设计各种关于 Magazine 的页面.<li>您可以轻松的改变 logo 图片,页首与页尾描述文字为您所想要的.' );
define( '_AM_MAG_INDEXPAGELISTING', '页面管理列表' );

define("_AM_MAG_PAGENAME2", "页面名称" );
define("_AM_MAG_MODIFYPAGE", "变更新页面" );
define("_AM_MAG_ADDPAGE", "建立新页面" );
define("_AM_MAG_INDEXHEADING", "页首标题:" );
define("_AM_MAG_INDEXFOOTING", "页尾标题" );
define("_AM_MAG_INDEXPAGEEDIT", "编辑页面" );
define("_AM_MAG_SECTIONIMAGE", "页面图片:" );
define("_AM_MAG_SECTIONHEAD", "页首描述:" );
define("_AM_MAG_SECTIONFOOT", "页尾描述:" );
define("_AM_MAG_ALIGNMENT", "<b>对齐方式:</b>" );
define("_AM_MAG_ISDEFAULT", "预设值" );
define("_AM_MAG_PAGENAME", "页面名称:" );

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
define("_AM_MAG_MINDEX_ACTION", "动作" );
define("_AM_MAG_MINDEX_PAGE", "<b>页:<b> " );
// Database Lang defines
define("_AM_MAG_RUSUREDEL", "您确定要删除这篇文章吗?" );
// Section Lang Defines
define("_AM_MAG_CATEGORY", "类别名称" );
define("_AM_MAG_CATEGORYNAME", "类别标题:" );
define("_AM_MAG_SECTIONPAGEDETAILS", "类别描述" );
define("_AM_MAG_TEXTOPTIONS", "文字格式选项:" );
define("_AM_MAG_GROUPPROMPT", "类别浏览权限:<div style='padding-top:8px;'>选择可以浏览本类别的会员群组.</div>");
define("_AM_MAG_IN", "所属主类别:<div style='padding-top:8px;'>选择所属主类别将成为该类别的子类别.</div>");
define("_AM_MAG_MOVETO", "搬移类别:" );
define("_AM_MAG_CATEGORYWEIGHT", "类别排序:<div style='padding-top:8px;'>类别文章显示排序:0 为最优先</div>");
define("_AM_MAG_CATEGORYDESC", "类别描述:<div style='padding-top:8px;'>可使用 HTML 标签或 XOOPS CODE,ENTER 会自动断行</div>");
define("_AM_MAG_ADDMCATEGORY", "新增类别" );
define("_AM_MAG_CATEGORYTAKEMETO", "按这里新增一个类别.");
define("_AM_MAG_NOCATEGORY", "错误 - 没有新增任何类别.");
define("_AM_MAG_MODIFYCATEGORY", "变更类别");
define("_AM_MAG_MOVECATEGORY", "搬移类别所属文章");
define("_AM_MAG_MOVEDEL", "搬移文章");
define("_AM_MAG_EDITSECTION2", "移至类别:");
define("_AM_MAG_MOVE", "搬移");
define("_AM_MAG_MOVEARTICLES", "搬移文章至类别");
define('_AM_MAG_DUPLICATECATEGORY', '复制类别');
define('_AM_MAG_COPY', '复制类别:');
define('_AM_MAG_TO', '至:');
define('_AM_MAG_NEWCATEGORYNAME', '新类别名称:');
define('_AM_MAG_DUPLICATE', '复制');
define('_AM_MAG_DUPLICATEWSUBS', '复制时包含子类别');
define("_AM_MAG_SECTIONCOPYARTICLES", "复制时包含类别文章?");
define("_AM_MAG_ADDSECTIONTOMENU", "新增类别至主选单区块?");
define("_AM_MAG_SECTIONTEMPLATE", "选择类别样板:");
define("_AM_MAG_SHOWCATEGORYIMG", "<b>显示类别图片:&nbsp;</b>");
define("_AM_MAG_SECTIONIMAGEALIGN", "<b>图片对齐方式:&nbsp;</b>");
define("_AM_MAG_SECTIONIMAGEOPTION", "类别图片选项:");
define("_AM_MAG_SECTIONSTATUS", "类别状态:<div style='padding-top:8px;'>设定类别是否显示于模组首页. 假如设定为离线, 该类别将自动隐藏</div>");
define("_AM_MAG_CATEGORYHEADTITLE", "类别页首标题:");
define("_AM_MAG_CATEGORYHEAD", "类别页首描述:<div style='padding-top:8px;'>留空将以主类别页首描述取代.</div>");
define("_AM_MAG_CATEGORYFOOTTITLE", "类别页尾标题:");
define("_AM_MAG_CATEGORYFOOT", "类别页尾描述:<div style='padding-top:8px;'>留空将以主类别页尾描述取代.</div>");
define("_AM_MAG_GROUPCREATEPROMPT", "撰写文章权限:<div style='padding-top:8px;'>选择可以在本类别建立文章的会员群组.</div>" );
// Document Lang defines
define("_AM_MAG_ADDNEWAUTH", " 选择新作者" );
define("_AM_MAG_EDITARTICLE", "文章管理资讯" );
define("_AM_MAG_EDITARTICLETEXT", "<li>在这里您可以撰写 / 编辑 / 复制文章" );
define("_AM_MAG_WAYSYWTDTTAL", "警告:您确定要删除这个类别及其以下所有文章吗?" );
define("_AM_MAG_FILEDEL", "警告:您确定要删除这项附件吗?" );
define("_AM_MAG_UPLOADED", "上传成功!" );
define("_AM_MAG_SELECTITEM", "选择");
define("_AM_MAG_NOSELECT", "未选择");
define("_AM_MAG_NOSELECTFILE", "未选择档案");
define("_AM_MAG_SPOTLIGHT", "在该类别中标记为推荐佳作?");
define("_AM_MAG_SPOTLIGHTMAIN", "在首页标记为推荐佳作?");
define("_AM_MAG_SPOTLIGHTMAIN_DESC", "若标记为赞助广告此设定将无效");
define("_AM_MAG_SPOTLIGHTSPONSER", "在首页中标记为赞助广告?");
define("_AM_MAG_SPOTLIGHTSPONSER_DESC", "此功能只能指定一篇文章");
define("_AM_MAG_MENU", "其他设定");
define("_AM_MAG_EDITMAINTEXT", "3. 文章内容:" );
define("_AM_MAG_DOC_RESTORE", "还原文章到上一个版本" );
/**
 * all article information text
 */
define("_AM_MAG_APPROVE", "核准");
define("_AM_MAG_BROKENDOWNLOADS", "失效档案");
define("_AM_MAG_BROKENDOWNLOADSTEXT", "失效档案资讯");
define("_AM_MAG_NOBROKEN", "尚无任合失联档案报告" );
define('_AM_MAG_BROKENTEXT', '<li>忽略 (忽略这个回报并删除这份 <b>失联档案报告.</b>)
<li>编辑 (编辑或变此报告的档案资料.)
<li>删除 (删除 <b>此报告的档案资料</b> 与 <b>失联档案报告</b>)' );
define("_AM_MAG_BROKENFILEIGNORED", "这份报告已经被您忽略" );
define("_AM_MAG_BROKENFILEDELETED", "这份档案已经被您删除" );
define("_AM_MAG_REPORTER", "回报者" );
define("_AM_MAG_FILETITLE", "档案名称 " );
define("_AM_MAG_ARTICLETITLE", "文章标题 ");
define("_AM_MAG_ARTICLEMANAGE", "文章管理" );
define("_AM_MAG_CANNOTHAVECATTHERE", "错误:类别不得变更为其所属子类别!" );
define("_AM_MAG_SECTIONMANAGE", "类别管理" );
define("_AM_MAG_FILEID", "档案" );
define("_AM_MAG_FILEICON", "图示" );
define("_AM_MAG_REALFILENAME", "真实名称");
define("_AM_MAG_FILEMIMETYPE", "档案类型");
define("_AM_MAG_FILESIZE", "档案大小");
define( '_AM_MAG_FILESTATS', '附件档案状态' );
define('_AM_MAG_FILESTAT', '文章档案状态:');
define('_AM_MAG_CATREORDERTEXT', '<li>您可以在此变更目前所有的类别与文章排序.<li>所有的类别与文章顺序都是按照排序值排列.<li>若想重新排序类别下的文章,只要点按类别名称就能显示该分类文章列表.');
define('_AM_MAG_ATTACHEDFILE', '档案资讯');
define('_AM_MAG_TDISPLAYSATTACHEDFILES', '<li>所有档案将依照其 ID 排序.<br /><li>您可以在此编辑或删除档案.');
define('_AM_MAG_VOTEDATA', '投票相关资讯');
define('_AM_MAG_VOTEDATATEXT', '<li>投票资料的将依照 RID 排序.');
define('_AM_MAG_ATTACHEDFILEM', '附件管理');
define('_AM_MAG_CAREORDER', '排序管理');
define('_AM_MAG_CAREORDER2', '类别与文章排序');
define("_AM_MAG_EDITHTMLFILE", "2. 选择 HTML 文章:<div style='padding-top:8px;'>此文章将以内文的方式呈现在该页中.</div>");
define("_AM_MAG_DOCTITLE"," 使用 HTML 档案名称作为文章标题");
define("_AM_MAG_DOHTMLDB"," 将 HTML 档案内容汇入资料库");
define("_AM_MAG_EDITWORDBROWSE", "选择 Word 文章");
define('_AM_MAG_EDITGROUPPROMPT', "文章阅览权限:<div style='padding-top:8px;'>选择能够阅览本文章的会员群组.</div>");
define("_AM_MAG_EDITSECTION", "所属类别:");
define("_AM_MAG_EDITWEIGHT", "文章排序:0 为最优先,");
define("_AM_MAG_EDITCAUTH", "文章作者:");
define("_AM_MAG_EDITCAUTH2", "文章作者:<div style='padding-top:8px;font-weight:normal; color:red;'><br />警告:<br />
假如您想要变更这篇文章的任何内容请先设定不使用作者下拉选单! <br />(作者下拉选单中若有超过 300 位作者将会出现错误)</div>" );
define("_AM_MAG_EDITLINKURL", "1. 连结文章:<div style='padding-top:8px;'>输入要作为文章内容的网址.</div>" );
define("_AM_MAG_EDITLINKURLADD", "URL 位址:<br />");
define("_AM_MAG_EDITLINKURLNAME", "URL 名称:<br />");
define("_AM_MAG_EDITARTICLETITLE", "文章标题:" );
define("_AM_MAG_PUBLISHDATE","文章发布日期:");
define("_AM_MAG_EXPIREDATESET", " 过期日期设定:");
define("_AM_MAG_EXPIREDATE","文章过期日期:");
define("_AM_MAG_CLEARPUBLISHDATE","<br /><br />移除发布日期:");
define("_AM_MAG_CLEAREXPIREDATE","<br /><br />移除过期日期:");
define("_AM_MAG_PUBLISHDATESET"," 发布日期设定:");
define("_AM_MAG_SETDATETIMEPUBLISH"," 设定发布的 时间/日期");
define("_AM_MAG_SETDATETIMEEXPIRE"," 设定过期的 时间/日期");
define("_AM_MAG_SETPUBLISHDATE","<b>设定发布日期:</b>");
define("_AM_MAG_SETEXPIREDATE","<b>设定过期日期:</b>");
define("_AM_MAG_EXPIREWARNING","<br />警告:过期日期不能早于发布日期! ");
define("_AM_MAG_EDITSUMMARY", "文章摘要:<div style='padding-top:8px;'>摘要只允许纯文字格式.<br />自动摘要可以撷取文章内容作为摘要.</div>
<div style='padding-top: 8px;'>显示其他网站连结于文章列表.</div>
" );
define('_AM_MAG_EDITAUTOSUMMARY', ' 使用自动摘要' );
define('_AM_MAG_EDITREMOVEIMAGES', ' 由自动摘要中移除图片');
define('_AM_MAG_EDITSUMMARYAMOUNTW', '自动摘要长度:(字数)');
define('_AM_MAG_EDITSUMMARYAMOUNTC', '自动摘要长度:(字元数)');
define("_AM_MAG_EDITMOVETOTOP", " 移至文章列表顶端");
define("_AM_MAG_EDITAPPROVE", "核准本文章?");
define("_AM_MAG_EDITALLOWCOMENTS", " 允许评论本文");
define("_AM_MAG_EDITJUSTHTML", " 不显示任何文章相关资讯");
define("_AM_MAG_EDITNOSHOART", " 不显示文章于任何文章列表中" );
define("_AM_MAG_EDITOFFLINE", " 设定文章状态为离线文章" );
define("_AM_MAG_EDITMAINMENU", " 新增文章连结至主选单区块" );
define("_AM_MAG_CREATEDBY", "原作者:" );
define("_AM_MAG_LASTEDITBY", "最后编辑由: ");
define("_AM_MAG_CREATEDON", "建立于: ");
define("_AM_MAG_EDITEDON", "编辑于: ");
define("_AM_MAG_ADDAFILETOTHISDOWNLOAD", " 附加档案 ");

define("_AM_MAG_EDITDISCUSSINFORUM", "加入讨论区连结?");
define("_AM_MAG_EDITDISCUSSINFORM", "加入表单连结?");
define("_AM_MAG_EDITDISCUSSINSTORE", "加入商品连结?");
define("_AM_MAG_EDITDISCUSSINSIGN", "加入活动连结?");
define("_AM_MAG_EDITDISBLOCKS", "选择是否在页面中显示区块位置?");
define("_AM_MAG_EDITDISSUMMARYBREAKS", "摘要中是否使用断行转换?" );

define("_AM_MAG_USECATEGORYACCESS", " 继承文章所属类别读取权限?" );
define('_AM_MAG_REORDERID', 'ID' );
define('_AM_MAG_REORDERPID', 'PID' );
define('_AM_MAG_REORDERTITLE', '标题');
define('_AM_MAG_REORDERDESCRIPT', '描述');
define('_AM_MAG_REORDERWEIGHT', '排序');
define('_AM_MAG_REORDERSUMMARY', '摘要');
define("_AM_MAG_EXTRADOC_TEXT", "<div style='padding-top:8px;'><b>分页标签</b>:文章如果要分页,请在分页处加入 <b>[pagebreak]</b>.</div>
<div style='padding-top:8px;'><b>分页目录</b>:使用 <b>[title]</b>标题文字<b>[/title]</b> 可以建立文章分页目录.</div>
<div style='padding-top:8px;'><b>加密文字</b>:使用 <b>[ssl]</b>文字内容<b>[/ssl]</b> 可将文章内容加入隐码 (需搭配 css 设定).</div>
" );
/**
 * Main Configuration
 */
define("_AM_MAG_SECTIONSETTINGS", "类别管理资讯" );
define("_AM_MAG_SECTIONSETTINGSTEXT", "<li>在这里您可以轻松的建立, 修改与删除您所有的文章分类..");
define("_AM_MAG_MODIFICATION", "变更申请");
define("_AM_MAG_MODIFICATIONINFO", "变更申请资讯");
define("_AM_MAG_MODIFICATIONTEXT", "<li>在这个区域你可以浏览所有申请变更但尚未通过审核的文章.<br /><li>您可以在此阅览、变更或核准这些文章." );
/**
 * Index Page management
 */

/**
 * Copyright and Support.  Please do not remove this line as this is part of the only copyright agreement for using Magazine
 */
define('_AM_MAG_RETCATREORDER', '返回类别重新排序');
define('_AM_MAG_ARTREORDER', '文章已重新排序!');
define('_AM_MAG_CATREORDER', '选择的类别已重新排序!');
define('_AM_MAG_NOFILESFOUND', '尚未发现任何档案');
define('_AM_MAG_TOTALATTFILES', '档案总数:');
define('_AM_MAG_APPROVED', '已审核');
define('_AM_MAG_ERROR_APPROVED', '核准时发生错误');
// votedata
define("_AM_MAG_USER", "名称");
define("_AM_MAG_IP", "IP 位址");
define("_AM_MAG_USERAVG", "平均得票");
define("_AM_MAG_TOTALRATE", "总票数");
define("_AM_MAG_NOREGVOTES", "尚无任何投票纪录");
define("_AM_MAG_DATE", "日期");
define("_AM_MAG_ARTICLE", "文章名称");
define("_AM_MAG_RATING", "投票");
define("_AM_MAG_VOTEDELETED", "投票已删除");
// Modify Document
define("_MD_USERMODREQ", "会员文章修改申请");
define("_AM_MAG_MOVETOART", "移至文章:(留空将不做改变)");
// Modified Documents
define("_AM_MAG_MODIFIED", "变更");
define("_AM_MAG_ORIGINAL", "原始文章");
define("_AM_MAG_AUTHOR", "作者:");
define("_AM_MAG_MAINTEXT", "主文:");
define("_AM_MAG_SUBTITLE", "副标题:" );
define("_AM_MAG_SUMMARY", "摘要:" );
define("_AM_MAG_URL", "URL:" );
define("_AM_MAG_URLNAME", "URL 名称:" );
define("_AM_MAG_TITLE1", "标题:" );
define("_AM_MAG_PUBLISHEDDATE", "已发布:");
define("_AM_MAG_SUMITDATE", "变更日期:");
define("_AM_MAG_PROPOSED", "推荐文章");
define("_AM_MAG_POST", "储存");
define("_AM_MAG_POSTNEWARTICLE", "编辑修改文章");
define("_AM_MAG_WAYSYWTDTTAL2", "删除修改文章?");
define("_AM_MAG_MODREQDELETED", "修改文章已删除");
// Document Stats
define("_AM_MAG_ARTICLESTATS", "文章状态");
define("_AM_MAG_ARTICLESTATSFOR", "文章状态:");
define("_AM_MAG_ISLEFT", "左" );
define("_AM_MAG_ISCENTER", "中" );
define("_AM_MAG_ISRIGHT", "右" );
define("_AM_MAG_CREATEARTICLE", "建立新文章");
define("_AM_MAG_MODIFYARTICLE", "变更文章:");
define("_AM_MAG_NODETAILSRECORDED", "没有详细说明记录");
//define("_AM_MAG_ISADMINNOTICE", "管理通知:您需做这些修正");
define("_AM_MAG_ISSORRYMESSAGE2", " 正在编辑这篇文章文章,编辑起始时间:");
define("_AM_MAG_STATARTICLEID", "文章编号:");
define("_AM_MAG_STATTITLE", "标题:");
define("_AM_MAG_STATWEIGHT", "排序:");
define("_AM_MAG_STATSECTION", "所述类别:");
define("_AM_MAG_STATAUTHOR", "原始作者:");
define("_AM_MAG_STATCREATED", "建立日期:");
define("_AM_MAG_STATPUBLISHED", "发布日期:");
define("_AM_MAG_STATEXPIRED", "过期日期");
define("_AM_MAG_STATLASTEDITED", "最后编辑日期:");
define("_AM_MAG_STATLASTEDITEDBY", "最后编辑者:");
define("_AM_MAG_STATTIMESEDITEDBYAUTHOR", "原作者编辑过的次数:");
define("_AM_MAG_STATTIMESEDITEDBYLASTEDITOR", "最后一位编辑者的编辑次数:");
define("_AM_MAG_STATTIMESEDITEDTOTAL", "总编辑次数:");
define("_AM_MAG_STATCOUNTER", "文章阅读数:");
define("_AM_MAG_STATRATING", "文章得分:");
define("_AM_MAG_STATRATINGHIGH", "最高得分:");
define("_AM_MAG_STATRATINGLOW", "最低得分:");
define("_AM_MAG_STATVOTES", "参与评分人数:");
define("_AM_MAG_STATDOWNLOADS", "附件档案编号:");
define("_AM_MAG_STATCOMMENTSALLOWED", "能够评论?");
define("_AM_MAG_STATCOMMENTS", "全部评论:");
define("_AM_MAG_STATSTATUS", "文章状态:");
define("_AM_MAG_RELATEDART", "关联文章管理" );

define("_AM_MAG_RELATEDARTADMIN", "关联文章资讯" );
define("_AM_MAG_RELATEDARTADMINTXT", "关联文章可以由 Magazine 本身文章或新闻模组中取得:
<br /><li><b>文章:</b> 您可以选择同为 Magazine 下的文章彼此关联.</li>
<li><b>新闻:</b> 您可以选择 News 模组下的文章彼此关联.</li>
" );

define("_AM_MAG_RELATEDDOCLIST", "关联文章选择列表:
<br /><li><b>文章:</b> 请由文章选择列表中选取.</li>
<li><b>新闻:</b> 请由新闻选择列表中选取.</li>
" );

define("_AM_MAG_RELATEDNEWSLIST", "关联新闻栏位说明" );
define("_AM_MAG_RELATEDDOCUMENTLIST", "关联文章选择列表说明" );

define("_AM_MAG_RELATEDNEWSLISTTXT", "
<li><b>ID:</b> 列表顺序编号.</li>
<li><b>标题:</b> 文章标题名称.</li>
<li><b>排序:</b> 文章排列顺序.</li>
<li><b>新增关联项目:</b> 核取可以新增文章相关连结,取消核取则移除文章相关连结.</li>
<li><b>选择全部:</b> 快速选择或清除文章相关连结.</li>
" );

define("_AM_MAG_RELATEDLINKLIST", "相关连结栏位说明" );
define("_AM_MAG_RELATEDLINKLISTTXT", "
<li><b>ID:</b> 列表顺序编号.</li>
<li><b>标题:</b> 文章标题名称.</li>
<li><b>排序:</b> 文章排列顺序.</li>
<li><b>动作:</b> 点按图示可以帮该文章新增相关连结.</li>
" );

define("_AM_MAG_RELATEDLINKLIST2", "建立新的相关连结" );
define("_AM_MAG_RELATEDLINKLISTTXT2", "
<li><b>相关连结:</b> 相关连结的网址.</li>
<li><b>相关连结名称:</b> 相关网址的文字描述.</li>
<li><b>排序:</b> 相关连结排列顺序.</li>
<li><b>动作:</b> 编辑或删除相关连结项目.</li>
" );//dqflyer fixed the "Perform" word

define("_AM_MAG_NO_DOCS_CREATEDYET", "尚无任何文章可以选择." );
define("_AM_MAG_RELATED_DOC", "文章" );
define("_AM_MAG_RELATED_NEWS", "新闻" );
define("_AM_MAG_ADDRELATEDART", "新增关联文章" );
define("_AM_MAG_RELATEDITEM", "新增关联项目" );
define("_AM_MAG_RELATEDART_WEIGHT", "排序" );
define("_AM_MAG_ARTID", "ID" );
define("_AM_MAG_SHOWALL", "选择全部");
define("_AM_MAG_FAILTOSEE", "搞什么阿笨蛋! 请勿将文章复制到同个类别下好呗!" );
define("_AM_MAG_NOARTICLE", "这篇文章并不存在");
define("_AM_MAG_NOARTICLESSELECTED", "没有选择文章");
define("_AM_MAG_ARTICLESMOVED", "选择的文章已移到新类别");
define("_AM_MAG_ANDMOVED", "移到新类别:");
define("_AM_MAG_SELECTALLNONE", "全选/全不选");
define("_AM_MAG_SUBMIT1", "确定" );
define("_AM_MAG_VOTES","票数:");
define("_AM_MAG_SORTBY1", "分类:" );
define("_AM_MAG_DATE1","日期");
define("_AM_MAG_ARTICLEID1","文章 ID");
define("_AM_MAG_RESET","重置");
define("_AM_MAG_NOSUCHSECTION","<b>错误</b>:查无符合的类别");
define("_AM_MAG_NOTITLESET","无标题");
define("_AM_MAG_EDITSUBTITLE","文章副标题:");
define("_AM_MAG_SELECT_IMG","文章图片:");
define("_AM_MAG_TOTALNUMARTS","文章总数:");
define("_AM_MAG_STATUSERTYPE", "会员所属群组:" );
define("_AM_MAG_DATEIN", "编辑起始时间:" );
define("_AM_MAG_DATEOUT", "编辑完成时间:" );
define("_AM_MAG_DOCEDITHISTORY","编辑文章纪录");
define("_AM_MAG_STILLEDITING","仍在编辑中的文章");
define("_AM_MAG_DOCSINEDITING","编辑中的文章");
define("_AM_MAG_EDITVERSION"," 储存时自动更新版本");
define("_AM_MAG_EDITVERSIONNUM","文章版本:");
define("_AM_MAG_OTHEROPTIONS", "其他项目" );
// mag_fileshow defines
define("_AM_MAG_ATTACHEDFILES","附加档案组态");
define("_AM_MAG_FILEUPLOAD","上传档案至文章:");
define("_AM_MAG_ATTACHEDFILEEDITH","上传新档案");
define("_AM_MAG_ATTACHFILE","上传的档案");
define("_AM_MAG_FILESHOWNAME","档案名称");
define("_AM_MAG_FILEDESCRIPT","档案描述");
define("_AM_MAG_FILETEXT","搜寻关键字");
define("_AM_MAG_NOT_PUBLISHED", "尚未发布" );
define("_AM_MAG_NOT_SET","尚未设定");
define("_AM_MAG_NOT_CHANGED","尚未变更");
define("_AM_MAG_TIMES"," 次");
define("_AM_MAG_ONLINE","在线");
define("_AM_MAG_OFFLINE","离线");
define("_AM_MAG_DISPLAYPAGES", "显示分页:" );
define("_AM_MAG_ARTICLERESTOREHEADING", "文章还原管理" );
define("_AM_MAG_ARTICLERESTOREINFO", "文章还原说明" );
define("_AM_MAG_ARTICLERESTORETEXT", "当您开启文章还原功能后,每当您编辑一次文章便会将文章内容备份进资料库,方便您恢复文章回较早的状态.<br />请注意! 如果您经常编辑文章这将使用非常多的资料库空间,所以请您定期清理布必要的备分资料." );
define("_AM_MAG_RESTORE_ID", "RID" );
define("_AM_MAG_RESTORE_DATE","备份日期");
define("_AM_MAG_RESTORE_ARTICLEID", "AID" );
define("_AM_MAG_RESTORE_TITLE","文章标题");
define("_AM_MAG_RESTORE_VERSION","版本");
define("_AM_MAG_RESTORE_ACTION","动作");
define("_AM_MAG_RESTORE_CREATED","发布日期");
define("_AM_MAG_RESTORE_PUBLISHED","发布");
define("_AM_MAG_NORESTORE","还原的文章 id 并不存在");
define("_AM_MAG_NORESTORE_POINTS","这份文章尚无还原点");
define("_AM_MAG_DELETERESTORE","删除还原点?");
define("_AM_MAG_RESTOREDELETED","还原点已被删除.");
define("_AM_MAG_ERROR_RESTOREDELETED","删除还原点时发生错误.");
define("_AM_MAG_FILEEXISTS", " (档案已存在)" );
define("_AM_MAG_FILEERROR", "错误:" );
define("_AM_MAG_FILEERRORPLEASECHECK", " 请核对档案!" );
define("_AM_MAG_NUMBER", " NO:" );
define("_AM_MAG_ATTACHEDARTICLE","附加档案至文章:");
define("_AM_MAG_RATINGID", "RID" );
// Related LINKS
define("_AM_MAG_RELATEDLINKS","相关连结管理");
define("_AM_MAG_RELATEDLINKSADMIN","相关连结资讯");
define("_AM_MAG_RELATEDLINKSLIST","相关连结列表");
define("_AM_MAG_ADDRELATEDLINK","新增相关文章连结");
define("_AM_MAG_RELATED_URL","连结 URL");
define("_AM_MAG_RELATED_URLNAME","连结名称");
define("_AM_MAG_RELATED_WEIGHT","排序");
define("_AM_MAG_ID", "ID" );
define('_AM_MAG_NOURLFOUND', '没有相关连结');
define( '_AM_MAG_DELETERELEATEDLINK', '是否删除此相关连结?' );
define( '_AM_MAG_RELATED_DELETED', '这个相关连结已经删除!' );
define( '_AM_MAG_RELATED_DBUPDATED', '这个相关连结已经建立或更新' );

// Reviews
define("_AM_MAG_OTHER_INFOADMIN", "自订内容资讯" );
define("_AM_MAG_OTHER_INFOADMINTXT", "当您有特殊的栏位需求时您可以使用自订内容功能:
<br /><li>每个标题与内容为一组完整资讯.</li>
<li>若您未填写内容将不会在前台中呈现该组自订内容.</li>
" );
define("_AM_MAG_OTHER_INFO","自订内容: ");
define("_AM_MAG_TITLE_1", "自订栏位 1 - 标题:" );
define("_AM_MAG_DESC_1", "自订栏位 1 - 内容:" );
define("_AM_MAG_TITLE_2", "自订栏位 2 - 标题:" );
define("_AM_MAG_DESC_2", "自订栏位 2 - 内容:" );
define("_AM_MAG_TITLE_3", "自订栏位 3 - 标题:" );
define("_AM_MAG_DESC_3", "自订栏位 3 - 内容:" );
define("_AM_MAG_TITLE_4", "自订栏位 4 - 标题:" );
define("_AM_MAG_DESC_4", "自订栏位 4 - 内容:" );
define("_AM_MAG_TITLE_5", "自订栏位 5 - 标题:" );
define("_AM_MAG_DESC_5", "自订栏位 5 - 内容:" );
define("_AM_MAG_TITLE_6", "自订栏位 6 - 标题:" );
define("_AM_MAG_DESC_6", "自订栏位 6 - 内容:" );
define("_AM_MAG_DISPLAYREVIEW", "显示自订内容?" );
define("_AM_MAG_ADD_REVIEW", "补充自订内容" );

// Import settings
define("_AM_MAG_IMPORT", "汇入文章资讯" );
define("_AM_MAG_IMPORTTEXT", "汇入 HTML 文件至选择的类别:
<br /><li><b>类别名称:</b> 汇入文件所属的类别名称.</li>
<li><b>目录/档案名称:</b> HTML 文件存放的路径.</li>" );

define("_AM_MAG_ADD_SETTINGS", "变更其他文章设定" );
define("_AM_MAG_IMPORTWORD", "汇入 Word 文件" );
define("_AM_MAG_IMPORTWORDYES", "已启用 Com 于伺服器端,您可以使用汇入 Word 文件的功能,但是您的伺服器端还必须安装 Word 程式." );
define("_AM_MAG_IMPORTWORDNO", "并未启用 Com 于伺服器端" );

define("_AM_MAG_IMPORTWORDINYES", "MS Word 已经安装于伺服器端,您可以使用汇入 Word 文件的功能." );
define("_AM_MAG_IMPORTWORDINNO", "伺服器端尚未安装 MS Word 程式." );
/**
 * Check for word
 */
define("_AM_MAG_IMPORTWORDTXT", "汇入 Word 文件使用说明: ");
define("_AM_MAG_IMPORTCOMENABLED", "伺服器是否为 Windows 系统?");
define("_AM_MAG_IMPORTWORDINSTALL", "是否已安装 MS Word 程式在伺服器端?");
define("_AM_MAG_IMPORTWORDSELECT", "选择一份 Word 文件上传并汇入.");
define("_AM_MAG_WORDNOTINSTALLED", "您的伺服器环境目前不支援将汇入的 MS Word 文件转换为文章." );
define("_AM_MAG_EDITDRAFT", "储存为草稿文件?" );
define("_AM_MAG_IMPORT_DIRNAME", "目录/档案名称" );
define("_AM_MAG_IMPORT_HTMLPROC", "处理 HTML 档案" );
define("_AM_MAG_IMPORT_EXTFILTER", "额外过滤的档案名称");
define("_AM_MAG_IMPORT_BODY", "只汇入 HTML 档案 body 部分");
define("_AM_MAG_IMPORT_INDEXHTML", "将同个目录或在上层目录的文件删除到 index.html 的连结");
define("_AM_MAG_IMPORT_LINK", "以原始档案名称作为文章标题");
define("_AM_MAG_IMPORT_IMAGE", "以 image 目录下的图片作为连结");
define("_AM_MAG_IMPORT_ATMARK", "将 &amp;#064; 以 @ 符号取代");
define("_AM_MAG_IMPORT_TEXTPROC", "处理文字档案");
define("_AM_MAG_IMPORT_TEXTPRE", "使用 &lt;pre&gt; &lt;/pre&gt; 围绕文字档案");
define("_AM_MAG_IMPORT_IMAGEPROC", "图档处理");
define("_AM_MAG_IMPORT_IMAGEDIR", "图档目录路径");
define("_AM_MAG_IMPORT_IMAGECOPY", "将文章中的图片复制到图档目录下.");
define("_AM_MAG_IMPORT_TESTMODE", "测试模式");
define("_AM_MAG_IMPORT_TESTDB", "测试模式下文章并不会储存至资料库. 当您正式储存时请取消“启用测试模式”勾选. ");
define("_AM_MAG_IMPORT_TESTEXEC", "启用测试模式");
define("_AM_MAG_IMPORT_TESTTEXT", "显示文字");
define("_AM_MAG_IMPORT_EXPLANE", "检查档案类型相关的副档名.<br>例如 HTML 档案可同时以 html 或 htm 作为副档名.<br>文字档案副档名为 txt.<br>图片档案副档名可能为 gif, jpg, jpeg, or png.<br>");
define("_AM_MAG_IMPORT_ERRDIREXI", "目录或档案并不存在");
define("_AM_MAG_IMPORT_ERRFILEXI", "程式码过滤并不存在");
define("_AM_MAG_IMPORT_ERRFILEXEC", "程式码过滤并未执行");
define("_AM_MAG_IMPORT_ERRNOCOPY", "复制图档没有描述");
define("_AM_MAG_IMPORT_ERRNOIMGDIR", "图档目录没有描述");
define("_AM_MAG_IMPORT_ERRIMGDIREXI", "只订图档目录并不是一个存在目录");
define("_AM_MAG_IMPORT_ERRFILEEXI", "档案并不存在");
define("_AM_MAG_ARTRESTORENOTACT", "这项功能尚未启用.");
define("_AM_MAG_ERRORFILEALLREADYEXISITS", "档案已经存在于伺服器.");
//define("_AM_MAG_RELATEDARTS", "关联文章列表");
//define("_AM_MAG_RELATEDNEWS", "关联新闻列表");
define("_AM_MAG_ATTACHEDFILESADMIN","编辑附加档案管理");
define("_AM_MAG_ATTACHEDFILEPREVIEW","预览档案");
define("_AM_MAG_ATTACHEDFILESTAS","档案状态");
define("_AM_MAG_ATTACHEDFILEEDIT","编辑档案");
define("_AM_MAG_ATTACHEDFILEACCESS","允许权限:");
// Document Spotlight
define("_AM_MAG_DOCSPOTLIGHTHEADING","焦点文章管理");
define("_AM_MAG_DOCSPOTLIGHTINFO","焦点文章资讯");
define("_AM_MAG_DOCSPOTLIGHTTEXT","设定一篇显示于焦点文章区块的文章:
<li>焦点图片</li>
<li>焦点图片宽度</li>
<li>焦点图片长度</li>
<li>焦点文章最大长度</li>
<li>摘要文字类型</li>
<li>焦点文章:自动套用最新发布的文章或自行设定</li>
" );
define("_AM_MAG_DOCSPOTLIGHTFORM","焦点文章设定");
define("_AM_MAG_DOCSPOTLIGHTDOC","焦点文章:");
define("_AM_MAG_DOCSPOTLIGHTIMAGE","文章附图:");
define("_AM_MAG_USE_LASTPUBLISHED","最新发布的文章预设为为焦点文章");
define("_AM_MAG_CURRENT_SPOT","目前的焦点文章");
define("_AM_MAG_OTHERWISE_CHOOSEANARTICLE","您也能由下列文章列表指定焦点文章");
define("_AM_MAG_SPOTIT","核取"); // select it as spotlight document
define("_AM_MAG_SPOTIMAGE_MAXWIDTH","图片宽度");
define("_AM_MAG_SPOTIMAGE_MAXHEIGHT","图片长度");
define("_AM_MAG_SPOTDOCUMENT_MAXLENGTH", "显示字数限制:<div style='padding-top:8px;'>请设定撷取的最大字数/字元. 设定 0 将显示所有文字内容.</div>" );
define("_AM_MAG_SPOTDOCUMENT_SUMTYPE", "内容取得类型:" );
define("_AM_MAG_SPOTDOCUMENT_SUBTITLE", "文章副标题" );
define("_AM_MAG_SPOTDOCUMENT_SUMMARY", "文章摘要" );
define("_AM_MAG_SPOTDOCUMENT_MAINTEXT", "文章内容" );
// index.php
define("_AM_MAG_ARTICLENOTEXIST","错误:文章并不存在");
define("_AM_MAG_NOT_WORDDOC","错误:这不是个正确的 MS WORD 文章");
define("_AM_MAG_NO_FORUM", "没有选择讨论区" );
define("_AM_MAG_NO_FORM", "没有选择表单" );
define("_AM_MAG_NO_STORE", "没有选择商品" );
define("_AM_MAG_NO_SIGN", "没有选择活动" );
define("_AM_MAG_CHECKIN_FAILED", "检查文章错误");
define("_AM_MAG_SERVERSTATE", "伺服器状态相关资讯" );
define("_AM_MAG_SPHPINI", "<b>PHP ini 取得资讯:</b>" );
define("_AM_MAG_SAFEMODESTATUS", "安全模式状态:" );
define("_AM_MAG_REGISTERGLOBALS", "Register Globals:" );
define("_AM_MAG_MAGICQUOTESGPC", "Magic_quotes 状态:" );
define("_AM_MAG_SERVERUPLOADSTATUS", "伺服器上传状态:");
define("_AM_MAG_MAXUPLOADSIZE", "最大上传限制:");
define("_AM_MAG_MAXPOSTSIZE", "最大发表限制:");
define("_AM_MAG_SAFEMODEPROBLEMS", " (这也许会照成错误)");
define("_AM_MAG_GDLIBSTATUS", "GD 函式库支援:");
define("_AM_MAG_GDLIBVERSION", "GD 函式库版本:");
define("_AM_MAG_GDON", "<b>启用</b> (可使用缩图)");
define("_AM_MAG_GDOFF", "<b>关闭</b> (不可使用缩图)");
define("_AM_MAG_OFF", "<b>OFF</b>" );
define("_AM_MAG_ON", "<b>ON</b>" );
define("_AM_MAG_ZLIBCOMPRESSION", "ZLib 压缩:" );
define("_AM_MAG_MAXINPUTTIME", "Max Input Time:" );
define("_AM_MAG_FOPENURL", "FOpen URL:" );

define("_AM_MAG_EXT","副档名:");
define("_AM_MAG_UPDATEDATE","最后更新:");
define("_AM_MAG_DOWNLOADNAME","附件名称:");
define("_AM_MAG_FILEREALNAME","储存名称:");
define("_AM_MAG_ARTICLEID", "文章 ID:" );
define("_AM_MAG_DESCRIPTION", "档案描述" );
define("_AM_MAG_NODESCRIPT","尚无档案描述.");
define("_AM_MAG_ERRORCHECK", "档案核对:" );
define("_AM_MAG_ADD_STATUS", "观看文章状态" );
define("_AM_MAG_FILEPERMISSION", "档案权限:" );
define("_AM_MAG_DOWNLOADED", "下载次数:" );
define("_AM_MAG_DOWNLOADSIZE", "档案大小:" );
define("_AM_MAG_LASTACCESS", "最后下载时间:" );
define("_AM_MAG_LASTUPDATED", "最后更新时间:" );
define("_AM_MAG_DEL", "删除" );
// Mimetypes
define("_AM_MAG_MIMETYPE", "档案类型:" );
define("_AM_MAG_MIMETYPES", "档案类型管理" );
define("_AM_MAG_MIME_ID", "ID" );
define("_AM_MAG_MIME_EXT", "副档名" );
define("_AM_MAG_MIME_NAME", "应用类型" );
define("_AM_MAG_MIME_ADMIN", "管理者" );
define("_AM_MAG_MIME_USER", "一般会员" );
// Mimetype Form
define("_AM_MAG_MIME_CREATEF", "建立档案类型 (Mimetype)" );
define("_AM_MAG_MIME_MODIFYF", "变更档案类型 (Mimetype)" );
define("_AM_MAG_MIME_EXTF", "副档名:" );
define("_AM_MAG_MIME_NAMEF", "应用类别:<div style='padding-top:8px;'>请输入关于此副档名的应用描述.</div>" );
define("_AM_MAG_MIME_TYPEF", "档案类型:<div style='padding-top:8px;'>请输入各种跟此档案有关的副档名类型 (mimetype). 各种档案类型之间请使用半形空格间隔.</div>" );
define("_AM_MAG_MIME_ADMINF", "允许管理群组使用的副档名" );
define("_AM_MAG_MIME_ADMINFINFO", "<b>管理群组可以上传以下副档名所包含的档案类型:</b>" );
define("_AM_MAG_MIME_USERF", "允许一般会员使用的副档名" );
define("_AM_MAG_MIME_USERFINFO", "<b>一般会员可以上传以下副档名所包含的档案类型:</b>" );
define("_AM_MAG_MIME_NOMIMEINFO", "没有选择任何档案类型 (mimetype)." );
define("_AM_MAG_MIME_FINDMIMETYPE", "查询档案类型:" );
define("_AM_MAG_MIME_EXTFIND", "请输入想查询档案类型的副档名<div style='padding-top:8px;'>请输入想要查询档案类型 (mimetype) 的副档名.</div>" );
define("_AM_MAG_MIME_INFOTEXT", "<ul><li>您可藉由这个表单建立、编辑与删除各种档案类型.</li>
	<li>查询档案类型将会带您转向其他网站取得查询结果.</li>
	<li>您可点按在线/离线图示来改变管理者或一般会员的使用状态.</li> 
	<li>变更档案类型使用状态.</li></ul> 
	" );
// Mimetype Buttons
define("_AM_MAG_MIME_CREATE", "建立" );
define("_AM_MAG_MIME_CLEAR", "重置" );
define("_AM_MAG_MIME_CANCEL", "清空" );
define("_AM_MAG_MIME_MODIFY", "变更" );
define("_AM_MAG_MIME_DELETE", "删除" );
define("_AM_MAG_MIME_FINDIT", "查询!" );
// Mimetype Database
define("_AM_MAG_MIME_DELETETHIS", "删除您所选择的档案类型?" );
define("_AM_MAG_MIME_MIMEDELETED", "档案类型 %s 已经被删除了" );
define("_AM_MAG_MIME_CREATED", "新的档案类型资讯已经建立" );
define("_AM_MAG_MIME_MODIFIED", "档案类型资讯已经变更" );

define("_AM_MAG_GL_WEIGHTON", "<font color='tomato'>自动排序开启</font>" );
define("_AM_MAG_GL_WEIGHTOFF", "<font color='tomato'>自动排序关闭</font>" );
define("_AM_MAG_DOCUMENTTYPES", "这里共有三种不同的文章类型供您选择,假如您同时填写多种文章类型,前台将以类型数字越小者显示." );
define("_AM_MAG_DOCUMENTTYPE", "<b>文章类型</b>" );
define("_AM_MAG_BIGUESER", "正体中文 (Big5) 语系使用者建议开启" );

define("_AM_MAG_SELECTEDITOR","选择编辑器:");

//Server Status
define("_AM_MAG_PHP_VERSION", "PHP 版本" );
define("_AM_MAG_XOOPS_VERSION", "XOOPS 版本" );
define("_AM_MAG_XOOPS_INSTALLED_PATH", "XOOPS 安装路径" );
define("_AM_MAG_XOOPS_URL", "XOOPS 对应网址" );
define("_AM_MAG_DATABASE_TYPE", "资料库类型" );
define("_AM_MAG_DATABASE_NAME", "资料库名称" );
define("_AM_MAG_DATABASE_PREFIX", "资料库字首" );

//Blocks State
define("_AM_MAG_ARTTEMPLATE", "选择文章样板及区块状态:");
define("_AM_MAG_NOBLOCKS", "不显示区块" );
define("_AM_MAG_SHOWALLBLOCKS", "显示左右区块" );
define("_AM_MAG_SHOWLEFTBLOCKS", "只显示左区块" );
define("_AM_MAG_SHOWRIGHTBLOCKS", "只显示右区块" );

//Related Intro
define("_AM_MAG_INTRO", "相关简介:");
define("_AM_MAG_INTROADMIN", "相关简介使用说明:
<br /><li>选择的类型将会影响前台对应的语言档.</li>
<li>简介的内容将以弹出视窗显示.</li>" );
define("_AM_MAG_ADDINTRO", "新增简介:");
define("_AM_MAG_INTROLIST", "简介列表:");

define("_AM_MAG_INTRO_MOD", "类型" );
define("_AM_MAG_INTRO_LYRIC", "歌词" );
define("_AM_MAG_INTRO_BOOK", "书籍简介" );
define("_AM_MAG_INTRO_NO", "编号");
define("_AM_MAG_INTRO_TITLE", "书名 / 歌名" );
define("_AM_MAG_INTRO_TEXT", "内容" );
?>

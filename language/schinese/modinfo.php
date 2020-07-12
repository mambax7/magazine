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
define("_MI_MAG_NAME", "志");

// A brief description of this module
define("_MI_MAG_DESC","期刊类的出版品");

// Names of blocks for this module (Not all module has blocks)
define("_MI_MAG_BNAME_MENU","分类选单");
define("_MI_MAG_TOPICS","文章分类");
define("_MI_MAG_BNAME3","今日文章");
define("_MI_MAG_BNAME4","人气排行");
define("_MI_MAG_BNAME5","新进文章");
define("_MI_MAG_BNAME6","附件下载");
define("_MI_MAG_BNAME7","作者资讯");
define("_MI_MAG_BNAME8","焦点文章");
define("_MI_MAG_BNAME9","随机文章");
define("_MI_MAG_BNAME_ARTMENU","文章连结");

// Sub menus in main menu block
define("_MI_MAG_SUBMIT","提供文章");
define("_MI_MAG_POPULAR","热门文章");
define("_MI_MAG_RATEFILE","评价排行");
define("_MI_MAG_ARCHIVE","分月文章");

define("_MI_MAG_ADMENU1","文章列表");
define("_MI_MAG_ADMENU2","撰写文章");
define("_MI_MAG_ADMENU3","页面管理");
define("_MI_MAG_ADMENU4","类别管理");
define("_MI_MAG_ADMENU5","排序管理");
define("_MI_MAG_ADMENU6","文章附件");
define("_MI_MAG_ADMENU7","关联文章");
define("_MI_MAG_ADMENU8","相关联结");
define("_MI_MAG_ADMENU9","待审文章列表");
define("_MI_MAG_ADMENU10","失联文章列表");
define("_MI_MAG_ARTICLEINDEXMENU", "文章页面组态: ");

//author name
define("_MI_MAG_NAMEDISPLAY","使用者名称设定: ");
define("_MI_MAG_DISPLAYNAMEDSC", "设定文章中会员名称的呈现方式");
define("_MI_MAG_DISPLAYNAME1", "会员帐号");
define("_MI_MAG_DISPLAYNAME2", "真实姓名");
define("_MI_MAG_DISPLAYNAME3", "不显示任何名称");
//Authour Atavar
define("_MI_MAG_SHOWATAV", "文章图片设定: ");
define("_MI_MAG_SHOWATAVDSC", "设定文章图片的显示类型");
define("_MI_MAG_DISPLAYATAV1", "显示作者个人图片");
define("_MI_MAG_DISPLAYATAV2", "显示文章类别图片");
define("_MI_MAG_DISPLAYATAV3", "不显示任何图片");
//email address
define("_MI_MAG_USEREMAILDISPLAY","作者 E-mail 显示设定: ");
define("_MI_MAG_DISPLAYUSEREMAILDSC", "选择作者 E-mail 在文章中的显示方式");
define("_MI_MAG_DISPLAYEMAIL1", "显示完整的 E-mail");
define("_MI_MAG_DISPLAYEMAIL2", "显示 E-mail 连结图示");
define("_MI_MAG_DISPLAYEMAIL3", "不显示 E-mail");
//SSL Code Setting
define("_MI_MAG_SSLTEXT","加密文字: ");
define("_MI_MAG_SSLTEXTDSC","固定显示的加密文字");
define("_MI_MAG_SSLCOLOR","加密文字颜色: ");
define("_MI_MAG_SSLCOLORDSC","请配合文章背景颜色设定");
//displayInfo document listing
//define("_MI_MAG_DISPLAYINFOLIST","文章列表显示资讯: ");
//define("_MI_MAG_DISPLAYINFOLISTDSC", "<div>在文章列表页面中会显示的相关资讯。</div><div style='padding-top: 8px;'>请先允许“使用者评分”才能显示“文章得分”与“参与评分人数”项目</div>");
//displayInfo document
//define("_MI_MAG_DISPLAYINFO","文章显示资讯: ");
//define("_MI_MAG_DISPLAYINFODSC", "<div>在阅读全文页面中会显示的相关资讯。</div><div style='padding-top: 8px;'>请先允许“使用者评分”才能显示“文章得分”与“参与评分人数”项目</div>");
//display info lang defines
define("_MI_MAG_DISPLAYINFO1", "回应评论数");
define("_MI_MAG_DISPLAYINFO2", "附加档案数");
define("_MI_MAG_DISPLAYINFO3", "文章得分");
define("_MI_MAG_DISPLAYINFO4", "评分人数");
define("_MI_MAG_DISPLAYINFO5", "发布日期");
define("_MI_MAG_DISPLAYINFO6", "阅览次数");
define("_MI_MAG_DISPLAYINFO7", "文章大小");
define("_MI_MAG_DISPLAYINFO8", "文章编号");
define("_MI_MAG_DISPLAYINFO9", "文章版本"); 
//Copyright Notice
define("_MI_MAG_ADDCOPYRIGHT", "显示“著作权宣告”: ");
define("_MI_MAG_ADDCOPYRIGHTDSC", "选择是否于文章页尾显示著作权宣告描述。");
//Allow User Votes
define("_MI_MAG_SHOWVOTESINART", "允许“使用者评分”: ");
define("_MI_MAG_SHOWVOTESINARTDSC", "选择是否开放使用者对文章进行评分。");
//Display Icons
define("_MI_MAG_ICONDISPLAY","热门及新进文章状态标记设定: ");
define("_MI_MAG_DISPLAYICONDSC", "选择在文章表列页面中“热门”及“新进”文章的是否显示状态标记。");
define("_MI_MAG_DISPLAYICON1", "以图示标记");
define("_MI_MAG_DISPLAYICON2", "以文字标记");
define("_MI_MAG_DISPLAYICON3", "不显示标记");
//Amount od days new and popular
define("_MI_MAG_DAYSNEW","新进文章日期范围: ");
define("_MI_MAG_DAYSNEWDSC","在指定日期天数内发布的文章会被视为新进文章。");
define("_MI_MAG_DAYSUPDATED","更新文章日期范围: ");
define("_MI_MAG_DAYSUPDATEDDSC","在指定日期天数内更新过的文章会被视为近期更新。");
define("_MI_MAG_POPULARS","热门文章人气值下限: ");
define("_MI_MAG_POPULARSDSC","累积到指定人气值以上的文章, 会被视为热门文章。");
//Title lenght
define("_MI_MAG_SHORTMENLEN", "主选单标题长度: ");
define("_MI_MAG_SHORTMENLENDSC", "限定列入主选单的文章标题字元长度。<div style='padding-top: 8px;'>设定 0 将不做字元长度限制</div>");
define("_MI_MAG_SHORTCATLEN", "分类标题长度: ");
define("_MI_MAG_SHORTCATLENDSC", "限定分类标题的字元长度。 <div style='padding-top: 8px;'>设定 0 将不做字元长度限制</div>");
define("_MI_MAG_SHORTARTLEN", "文章标题长度: ");
define("_MI_MAG_SHORTARTLENDSC", "限定文章标题的字元长度。<div style='padding-top: 8px;'>设定 0 将不做字元长度限制</div>");
//Images
define("_MI_MAG_SHOWCATPIC", "显示分类图示？");
define("_MI_MAG_SHOWCATPICDSC", "此设定若为“否”, 则以下两设定值将不生效。");
define("_MI_MAG_DEF_IMAGE", "预设文章图示: ");
define("_MI_MAG_DEF_IMAGEDSC", "未选定文章搭配图示时所使用的预设图示。<div style='padding-top: 8px;'>这个图示必须上传至 Magazine 的 image 目录夹中。</div>");
define("_MI_MAG_DIS_DEF_IMAGE", "启用预设图示功能？");
define("_MI_MAG_DIS_DEF_IMAGEDSC", "请选择预设文章图示的显示范围<br />当您建立文章或分类时若没有选择相关图示将以预设图示取代。");
define("_MI_MAG_DISPLAYDIMAGE1", "仅于文章表列页面显示");
define("_MI_MAG_DISPLAYDIMAGE2", "仅于阅读全文页面显示");
define("_MI_MAG_DISPLAYDIMAGE3", "文章表列与阅读全文页面皆显示");
define("_MI_MAG_DISPLAYDIMAGE4", "不显示");
//Thumbs nails
/*
define("_MI_MAG_USETHUMBS", "开启缩图功能: ");
define("_MI_MAG_USETHUMBSDSC", "可制作缩图的档案类型: JPG, GIF, PNG。<br /><br />若您的伺服器上无缩图程式时, 请选择“否”, 让影像以原尺寸显示。");
define("_MI_MAG_QUALITY", "缩图压缩品质: ");
define("_MI_MAG_QUALITYDSC", "最低品质: 0  最高品质: 100");
define("_MI_MAG_IMGUPDATE", "重新制作缩图？");
define("_MI_MAG_IMGUPDATEDSC", "若选择“是”, 所有的图片将重新制作缩图。<br /><br />");
define("_MI_MAG_KEEPASPECT", "保持影像缩图时的长宽比例？");
define("_MI_MAG_KEEPASPECTDSC", "");
*/
//Sections and document listings and navigation
define("_MI_MAG_SECTIONNUMS", "首页每行显示几项分类: ");
define("_MI_MAG_SECTIONNUMSDSC", "建议值为 2 ~ 4");
define("_MI_MAG_SHOWSUBMENU", "显示次分类: ");
define("_MI_MAG_SHOWSUBMENUDSC", "在分类表列中, 设定主分类下, 是否显示次分类。");
//artlistings and description
define("_MI_MAG_SHOWARTLISTINGS", "首页类别显示资讯: ");
define("_MI_MAG_SHOWARTLISTINGSDSC", "设定是否显示类别描述或文章列表于首页.");
define("_MI_MAG_SHOWARTLISTING1", "只显示描述");
define("_MI_MAG_SHOWARTLISTING2", "只显示文章列表");
define("_MI_MAG_SHOWARTLISTING3", "同时显示文章列表与描述");
define("_MI_MAG_SHOWARTLISTING4", "不显示");
define("_MI_MAG_SHOWARTLISTAMOUNT", "模组首页文章列表中显示几篇文章: ");
define("_MI_MAG_SHOWARTLISTAMOUNTDSC", "注意: 您必须允许在模组首页中显示分类文章列表");
define("_MI_MAG_ARTICLESAPAGE", "分类文章列表中显示几篇文章: ");
define("_MI_MAG_ARTICLESAPAGEDSC", "");
define("_MI_MAG_LASTART", "后台文章列表数: ");
define("_MI_MAG_LASTARTDSC", "后台文章列表每页显示几篇文章.");
define("_MI_MAG_SHOWORDERBOX", "文章排序方式: ");
define("_MI_MAG_SHOWORDERBOXDSC", "允许会员使用文章排序功能.");
define("_MI_MAG_PATHTYPE", "导览框: ");
define("_MI_MAG_PATHTYPEDSC", "选择分类文章列表的导览框类型.");
define("_MI_MAG_SECTIONSORT", "类别页面预设排序方式: ");
define("_MI_MAG_SECTIONSORTDSC", "选择类别页面的文章排序方式.");
define("_MI_MAG_ARTICLESSORT", "文章页面预设排序方式: ");
define("_MI_MAG_ARTICLESSORTDSC", "选择文章页面的文章排序方式.");
define("_MI_MAG_TITLE", "标题");
define("_MI_MAG_RATING", "票选评分");
define("_MI_MAG_WEIGHT", "排序");
define("_MI_MAG_POPULARITY", "人气");
define("_MI_MAG_SUBMITTED2", "发布日期");
define("_MI_MAG_SELECTBOX", "选择框");
define("_MI_MAG_SELECTSUBS", "选择框 (含子类别)");
define("_MI_MAG_LINKEDPATH", "路径连结");
define("_MI_MAG_LINKSANDSELECT", "路径连结与选择框");
define("_MI_MAG_NONE", "无");
define("_MI_MAG_AUTOWEIGHT", "自动排序: ");
define("_MI_MAG_AUTOWEIGHTDSC", "在储存类别或文章时使用自动排序功能.");
define("_MI_MAG_AUTOSUMMARY", "自动摘要: (整体)");
define("_MI_MAG_AUTOSUMMARYDSC", "自动撷取部分文章内容作为摘要. 仅适用于文章中没有填写任何摘要时.");
define("_MI_MAG_NAMESUMTYPE", "自动摘要类型: ");
define("_MI_MAG_NAMESUMTYPEDSC", "选择自动摘要呈现的方式.<div style='padding-top: 8px;'><b>文字数:</b> 设定撷取内文作为摘要的字数, 不建议中文使用者使用此方式.</div>
<div style='padding-top: 8px;'><b>字元数:</b> 一个中文字为两个字元.</div>");
define("_MI_MAG_NAMESUMTYPE1", "文字数");
define("_MI_MAG_NAMESUMTYPE2", "字元数");
define("_MI_MAG_NAMESUMAMOUNT", "自动摘要字数设定: ");
define("_MI_MAG_NAMESUMAMOUNTDSC", "<div style='padding-top: 8px;'>预设文字数: <b>50</b></div>
<div style='padding-top: 8px;'>预设字元数: <b>250</b></div>");

define("_MI_MAG_PHPCODING", "PHP 程式码: ");
define("_MI_MAG_PHPCODINGDSC", "设定显示文章中包含的 PHP 程式码.<div style='padding-top: 8px;'>您可以使用 [php][/php] 标签包住 PHP 语法内容.</div>");
define("_MI_MAG_VERSIONINC", "文章版本递增值: ");
define("_MI_MAG_VERSIONINCDSC", "每当您重新编辑文章后文章版本自动递增的格式.");
define("_MI_MAG_USERESTORE", "文章还原: ");
define("_MI_MAG_USERESTOREDSC", "这个功能用来备份您已经编辑过的文章并提供您还原至上一个版本. <br />开启这个功能 <b>将会</b> 使您的 MySQL 资料库 <b>占用很多</b> 空间, 您最好定期更新这项设定.");
define("_MI_MAG_DEFAULTTIME", "时间标记: ");
//define("_MI_MAG_DEFAULTTIMEDSC", "预设时间格式: ");
//submission document and files
define("_MI_MAG_GROUPSUBMITART", "发表文章: ");
define("_MI_MAG_GROUPSUBMITARTDSC", "选择可以发表文章的会员群组.");
define("_MI_MAG_ANONPOST", "允许访客发表文章？");
define("_MI_MAG_ANONPOSTDSC", "开启此设定将允许访客(匿名者)发表文章.");
define("_MI_MAG_AUTOAPPROVE", "自动核准会员所发表的文章: ");
define("_MI_MAG_AUTOAPPROVEDSC", "当会员发布文章时是否须经过管理者审核.");
define("_MI_MAG_NOTIFYSUBMIT", "文章核准通知: ");
define("_MI_MAG_NOTIFYSUBMITDSC", "当有任何文章被核准发布时以邮件通知站长.");
define("_MI_MAG_WYSIWYG", "是否在后台发布文章时使用所见即所得介面？");
define("_MI_MAG_WYSIWYGDSC", "");
define("_MI_MAG_USERWYSIWYG", "是否在前台发布文章时使用所见即所得介面？");
define("_MI_MAG_USERWYSIWYGDSC", "");
define("_MI_MAG_GROUPUSERWYSIWYG", "选择可以使用所见即所得编辑器的会员群组: ");
define("_MI_MAG_USEHTMLAREA", "类别页尾描述使否允许使用 BB CODE 与 HTML 语法: ");
define("_MI_MAG_USEHTMLAREADSC", "若选否您只能以纯文字方式撰写类别页尾描述.");
//uploads
define("_MI_MAG_SUBMITFILES", "附加档案: ");
define("_MI_MAG_SUBMITFILESDSC", "请选择能够新增文章附件的群组.");
define("_MI_MAG_ALLOWEDMIMETYPES", "允许管理群组使用的档案类型: ");
define("_MI_MAG_ALLOWEDMIMETYPESDSC", "选择开放给管理者使用的档案类型.");
define("_MI_MAG_ALLOWEDUSERMIME", "允许一般会员使用的档案类型: ");
define("_MI_MAG_ALLOWEDUSERMIMEDSC", "选择开放给一般会员使用的档案类型");
define("_MI_MAG_ADMINMIMECHECK", "不检查上传附件的档案类型: ");
define("_MI_MAG_NOUPLOADFILESIZE", "不检查上传附件的档案大小: ");
define("_MI_MAG_NOUPIMGSIZE", "不检查上传图片的长宽: ");
define("_MI_MAG_UPLOADFILESIZE", "最大档案上传限制 1048576 KB = 1 MB");
define("_MI_MAG_IMGHEIGHT", "上传图片最大长度");
define("_MI_MAG_IMGWIDTH", "上传图片最大宽度");
//define("_MI_MAG_FILEMODE", "变更档案属性（CHMOD)");
define("_MI_MAG_FILEPREFIX", "档案前置词: ");
define("_MI_MAG_CHECKSESSION","检查 Session 时间");
define("_MI_MAG_CHECKSESSIONDSC","设定检查 Session 时间的周期, 以分钟为单位, 设定 0 为不检查");
define("_MI_MAG_BY","开发团队: ");
define('_MI_MAG_AUTHOR_INFO', "作者团队资讯");
define('_MI_MAG_AUTHOR_NAME', "开发团队");
define('_MI_MAG_AUTHOR_DEVTEAM', "开发成员");
define('_MI_MAG_AUTHOR_WEBSITE', "官方网站");
define('_MI_MAG_AUTHOR_EMAIL', "官方信箱");

define('_MI_MAG_MODULE_INFO', "模组开发资讯");
define('_MI_MAG_MODULE_STATUS', "版本状态");
define('_MI_MAG_MODULE_DEMO', "Demo 网站");
define('_MI_MAG_MODULE_SUPPORT', "官方讨论区");
define('_MI_MAG_MODULE_BUG', "回报错误讯息");
define('_MI_MAG_MODULE_FEATURE', "提供建议事项");

define('_MI_MAG_RELEASE', "更新日期: ");
define('_MI_MAG_AUTHOR_BUGFIXES', "更新纪录");

define('_MI_MAG_SELECTFORUM', "选择关联的讨论区模组: ");
define('_MI_MAG_SELECTFORUMDSC', "");
define('_MI_MAG_DISPLAYFORUM1', "Newbb");
define('_MI_MAG_DISPLAYFORUM2', "X-IPBM");
define('_MI_MAG_DISPLAYFORUM3', "X-PBBM");

define('_MI_MAG_SELECTFORM', "选择关联的表单模组: ");
define('_MI_MAG_SELECTFORMDSC', "");
define('_MI_MAG_DISPLAYFORM1', "Liaise");
define('_MI_MAG_DISPLAYFORM2', "Contact");
define('_MI_MAG_DISPLAYFORM3', "Formulaire");

define('_MI_MAG_SELECTSTORE', "选择关联的商店模组: ");
define('_MI_MAG_SELECTSTOREDSC', "");
define('_MI_MAG_DISPLAYSTORE1', "OK-shop");
define('_MI_MAG_DISPLAYSTORE2', "Zen-cart");
define('_MI_MAG_DISPLAYSTORE3', "OSC");

define('_MI_MAG_SELECTSIGN', "选择关联的活动模组: ");
define('_MI_MAG_SELECTSIGNDSC', "");
define('_MI_MAG_DISPLAYSIGN1', "Eguide");
define('_MI_MAG_DISPLAYSIGN2', "TheaterMan");
define('_MI_MAG_DISPLAYSIGN3', "MRBS");

define("_MI_MAG_USERAMOUNT","编辑文章时可选择的作者数: ");
define("_MI_MAG_USERAMOUNTDSC", "设定编辑文章时选择新作者的名单数量<br />可以选择的作者数越多对伺服器造成的负荷越重, 太高的值也许会造成当机的情形.<br /><br />建议值为 300");

define('_MI_MAG_RSS_UTF8', "RSS 使用 UTF-8 转码");
define('_MI_MAG_RSS_DESCRIPTION', "如果选是, RSS 编码将转换 UTF-8, 否则使用 Big5。");
?>

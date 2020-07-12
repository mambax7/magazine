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

define("_MAG_NOARTICLE", "抱歉, 这篇文章并不存在");
define("_MAG_NODESCRIPT","该文件无描述。");
define("_MAG_UPLOADED","上传: ");
define("_MAG_FILEMIMETYPE","档案类型");

define("_MAG_ISNEW", "最新文章");
define("_MAG_ISUPDATED", "最近更新");
define("_MAG_ARTICLENOPERM", "抱歉, 您没有足够的权限阅览此文章");
define("_MAG_BACK","返回");
define("_MAG_CANCEL","取消");
define("_MAG_SUBMIT","确定送出");
define("_MAG_SUBMITBROKEN", "送出失连报告");
define("_MAG_PRINTERFRIENDLY","友善列印");
define("_MAG_MAKEPDF","输出为 PDF 格式");
define("_MAG_NOTIFYPUBLISH","通过审核时以 Email 通知我");
define("_MAG_NOSTORY","抱歉,资料库中无发找到此文章");
define("_MAG_RETURN2INDEX","Home");
define("_MAG_BACK2CAT","List");
define("_MAG_BACK2","Back");
define("_MAG_BACK2TOP","Top");
define("_MAG_TELLAFRIEND","转寄好友");
define("_MAG_TITLE","文章标题");
//define("_MAG_HOMEPAGEC", "文章标题: ");
define("_MAG_CATEGORY","分类");
define("_MAG_ARTICLES","文章数");
define("_MAG_ABOUTAUTHER","作者二三事");
define("_MAG_AUTHER","作者");
define("_MAG_FROM","来自");
define("_MAG_INTEREST","兴趣");
define("_MAG_ARTINFO","文章资讯");
define("_MAG_VIEWS","人气");
define("_MAG_TIMES","次");
define("_MAG_DATE","日期");
define("_MAG_NUMVOTES","评分人数");
define("_MAG_FILESIZE","档案大小");
define("_MAG_VERSION","版本");
define("_MAG_FILES","附件");
define("_MAG_TOPICC","分类");
define("_MAG_ARTICLE","文章");
define("_MAG_AUTH","作者");
define("_MAG_PUBLISHER","发布者");
define("_MAG_LASTUPDATE","最后更新");
define("_MAG_EDITDISCUSSINFORUM", "新增讨论区连结？");
define("_MAG_EDITDISCUSSINFORM", "新增表单连结？");
define("_MAG_EDITDISCUSSINSTORE", "新增商品连结？");
define("_MAG_EDITDISCUSSINSIGN", "新增活动连结？");
//define("_MAG_BROKENREPORT", "提出失连回报");
define("_MAG_BEFORESUBMIT", "在送出档案失连报告之前, 请您再次确认回报的档案是否正确, 站长将尽速检查您的报告, 为了安全考量我们将会记录您的 IP 位址以供查核.");
define("_MAG_SUBMITDATE", "发表日期");
define("_MAG_NOFILE","这篇文章尚无任何附加档案.");
define("_MAG_FILEID","附件 ID: ");
define("_MAG_FILEREALNAME","附件名称: ");
define("_MAG_ARTICLEID","文章 ID: ");
define("_MAG_OTHERARTICLES","其他文章");
define("_MAG_PAGETITLE","分页目录");
define("_MAG_PAGES","分页");
define("_MAG_RELATEDARTS", "相关文章");
define("_MAG_RELATEDNEWS", "相关新闻");
define("_MAG_INFORUMS", "%s 的相关讨论区");
define("_MAG_INFORMS", "%s 的相关表单");
define("_MAG_INSTORE", "%s 的相关商品");
define("_MAG_INSIGN", "%s 的相关活动");
define("_MAG_VOTEAPPRE","您的评分已经完成.");
define("_MAG_THANKYOU","感谢您抽空为 %s 评分");
define("_MAG_VOTEONCE","抱歉, 这篇文章你已经评分过了, 每篇文章只能评分一次.");
define("_MAG_NORATING","请先选择评分.");
//define("_MAG_THANKSFORHELP","谢谢你回报错误失效的连结.");
define("_MAG_THANKSFORINFO","谢谢您提供资讯,我们会尽快处理.");
define("_MAG_THANKS","谢谢您的参予. ");
define("_MAG_THANKS_APPROVE","谢谢您发布了新的文章, 我们将在最短的时间内进行审核.");
define("_MAG_ALREADYREPORTED","谢谢您的回报, 但这份档案已经有人提出报告.");
define("_MAG_CANTVOTEOWN","请不要对您自己发表的文章评分.<br>所有的评分动作都将被记录与审核.");
define("_MAG_RANK","排行");
define("_MAG_HITS","人气");
define("_MAG_HITS2","依照阅览次数排序");
define("_MAG_RATING","推荐");
define("_MAG_RATING2","依照评分高低排序");
define("_MAG_AUTH2","依照作者帐号排序");
define("_MAG_VOTE","票数");
define("_MAG_BROKENREPORTED","档案失连报告");

//define("_MAG_FORSECURITY","为了安全考量我们将会记录您的 IP 位址以供查核.");
define("_MAG_DOWNLOADS","下载");
define("_MAG_COMMENT","评论: ");
define("_MAG_RATED","目前评分: ");
define("_MAG_VOTES","评分");
define("_MAG_SORTBY1","排序: ");
define("_MAG_TITLE1","标题");
define("_MAG_DATE1","日期");
define("_MAG_POPULARITYLTOM","人气升幂");
define("_MAG_POPULARITYMTOL","人气降幂");
define("_MAG_ARTICLEIDLTOM","文章 ID (1 to 9)");
define("_MAG_ARTICLEIDMTOL","文章 ID (9 to 1)");
define("_MAG_TITLEZTOA","标题 (Z to A)");
define("_MAG_TITLEATOZ","标题 (A to Z)");
define("_MAG_DATEOLD","日期升幂");
define("_MAG_DATENEW","日期降幂");
define("_MAG_RATINGLTOH","评分升幂");
define("_MAG_RATINGHTOL","评分降幂");
define("_MAG_SUBMITLTOH","送出时间 (旧的在前)");
define("_MAG_SUBMITHTOL","送出时间 (新的在前)");
define("_MAG_WEIGHT","排序编号");
define("_MAG_POPULARITY1","人气");
define("_MAG_CURSORTBY1","目前排序方式: ");
define("_MAG_RATING1","送出评分!");
define("_MAG_RATING3","评分");
define("_MAG_INTFILEAT","在 %s 有个不错的档案");
define("_MAG_INTFILEFOUND","我在 %s 找到一个不错的档案");
define("_MAG_DESCRIPTION","文章描述");

define("_MAG_PUBLISHEDHOME","日期");
define("_MAG_ARTSIZE","文章大小");
define("_MAG_NOPERM","抱歉,您在本站尚无文章发布权限!");
define("_MAG_SELECTSUBSECTION","选择分类");
define("_MAG_READMORE","阅读全文...");
define("_MAG_LISTARTICLES","文章列表");

//Attached Files
define("_MAG_FEATUREDARTS", "推荐佳作");
define("_MAG_SECTIONLISTIN", "分类表列");
define("_MAG_CATNOTEXIST", "错误,此分类并不存在!");
define("_MAG_CATNOPERM", "抱歉,您没有浏览此分类的权限!");
//Submission
define("_MAG_EDITSECTION", "所属分类");
define("_MAG_CREATEARTICLE", "撰写新文章");
define("_MAG_EDITNEWARTTITLE","新文章标题");
define("_MAG_IN", "于分类中显示: ");
define("_MAG_EDITSECTION2", "移至此分类: ");
define('_MAG_EDITARTICLETITLE', '文章标题: ');
define("_MAG_EDITSUMMARY", "文章摘要: ");
define("_MAG_OTHEROPTIONS", "其他编辑选项: ");
define("_MAG_EDITSUBTITLE","文章子标题: ");
define("_MAG_EDITMAINTEXT", "编辑内文: ");
define("_MAG_EDITDISCODES", "不使用 BB CODE");
define("_MAG_EDITDISAMILEY", "不使用表情图示");
define("_MAG_EDITDISHTML", "关闭 HTML 语法");
define("_MAG_MODIFYARTICLE", "修改文章: ");
define("_MAG_MOVETO", "移至此分类: ");
define("_MAG_MODIFY", "修改");
define("_MAG_DELETE", "删除");

//Files
define("_MAG_FILES_CREATE","附加档案");
define("_MAG_FILES_UPLOAD","上传附件: ");
define("_MAG_FILES_TITLE", "附件标题: ");
define("_MAG_FILES_DESCRIPT","附件描述: ");
define("_MAG_FILES_SEARCHTEXT","附件关键字: ");
define("_MAG_FILES_ATTACHED","文件下载: ");
define("_MAG_FILES_DELETE_SELECTED","删除所选择的下载档案");

//constants added by frankblack
define("_MAG_URLFORSTORY","本文的 URL 是: ");
define("_MAG_THISCOMESFROM","本文出处: %s");

define("_MAG_FILETITLE","档案名称");
//define("_MAG_WEBMASTERACKNOW", "接获失连回报: ");
//define("_MAG_WEBMASTERCONFIRM", "失连回报确认: ");
define("_MAG_RESOURCEID", "档案编号");
define("_MAG_REPORTER", "通报者");
define("_MAG_DATEREPORTED", "通报日期");
define("_MAG_RESOURCEREPORTED", "谢谢您告诉我们这份档案已经无法下载, 但在您之前已经有使用者提出档案失连报告, 为了避免浪费资源, 我们将不在重复纪录同一份档案的失连报告.");
//define("_MAG_THANKSFORREPORTING", "谢谢您告诉我们关于文章(档案)已经失去连结, 站长将尽速处理您的回报。");
define("_MAG_THISFILEDOESNOTEXIST", "错误: 档案不存在!");
define("_MAG_NEWSARCHIVES","分月文章");
define("_MAG_ACTIONS","动作");
define("_MAG_THEREAREINTOTAL","总共有 %s 篇文章");
define("_MAG_SENDSTORY","转寄好友");
define("_MAG_INTARTICLE","来自 %s 的有趣文章");
define("_MAG_INTARTFOUND","我在 %s 找到一篇有趣的文章");
define("_MAG_COPYRIGHT","Copyright");
define("_MAG_ERROR","写入资料库发生错误");
define("_MAG_NOTIFYSBJCT","您的网站有人提供新文章"); // Notification mail subject
define("_MAG_NOTIFYMSG","嘿!您的网站有人提供新文章"); // Notification mail message
define("_MAG_VISIT","造访相关网站: ");
define("_MAG_RELATEDLINKS","相关连结");
define("_MAG_SPONSER", "赞助广告");

define("_MAG_ROOT_CATEGORY","--文章类别--");
define("_MAG_NO_FORUM","选择讨论区");
define("_MAG_NO_FORM","选择表单");
define("_MAG_NO_STORE","选择商品");
define("_MAG_NO_SIGN","选择活动");
define("_MAG_CHECKIN_FAILED","检查失败");
define("_MAG_SHOWARTAMOUNT","本页显示第 %s - %s 篇文章, 共有 %s 篇文章");

define("_MAG_SUBSECTION","子类别:");
define("_MAG_QKMENU","快速导览");
define("_MAG_SELECTEDITOR","选择编辑器");
define("_MAG_RB","<a href='http://singchi.no-ip.com/hack/'><img src='./images/magazine.png'></a>");
define("_MAG_RELATEDINTRO","相关资讯");
define("_MAG_INTRO_BOOK","书籍");
define("_MAG_INTRO_LYRIC","歌词");
?>

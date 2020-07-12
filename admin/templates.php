<?php
// $Id: templates.php,v 1.4 2004/08/13 12:41:45 phppp Exp $
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
include("admin_header.php");
include_once XOOPS_ROOT_PATH . "/class/xoopslists.php";
include_once MAG_ROOT_PATH . "/class/lists.php";

//accessadmin("templates");

$op = '';

if (isset($_POST))
{
    foreach ($_POST as $k => $v)
    {
        ${$k} = $v;
    }
}

if (isset($_POST['op'])) $op = $_POST['op'];

switch ($op)
{
    case "save":
        global $xoopsConfig, $xoopsDB, $myts;

        $xoopsDB->query("update " . $xoopsDB->prefix(MAG_TEMPLATES) . " set 
			downloads = '" . $_POST['downloads'] . "',
			poll = '" . $_POST['poll'] . "',
                        archives = '" . $_POST['archives'] . "',
			artindex = '" . $_POST['artindex'] . "', 
			catindex = '" . $_POST['catindex'] . "', 
			articlepage = '" . $_POST['articlepage'] . "',
                        articleinfo = '" . $_POST['articleinfo'] . "', 
			articleplainpage = '" . $_POST['articleplainpage'] . "',
                        toptentemp = '" . $_POST['toptentemp'] . "',
			artmenublock = '" . $_POST['artmenublock'] . "',
			bigartblock = '" . $_POST['bigartblock'] . "', 
			mainmenublock = '" . $_POST['mainmenublock'] . "', 
			newartblock = '" . $_POST['newartblock'] . "', 
			newdownblock = '" . $_POST['newdownblock'] . "', 
			topartblock = '" . $_POST['topartblock'] . "', 
			topicsblock = '" . $_POST['topicsblock'] . "', 
			authorblock = '" . $_POST['authorblock'] . "', 
			spotlightblock = '" . $_POST['spotlightblock'] . "'
			");
        redirect_header("templates.php", 1, _AM_MAG_WFTEMPLATESCONFIG);
        exit();
        break;

    case "default":
    default:
        xoops_cp_header();
        mag_admin_menu(_AM_MAG_MODIFYTEMPLATES);

        global $xoopsModule;

        include_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';

        $sql = "SELECT downloads, poll, archives, artindex, catindex, articlepage, articleinfo, articleplainpage, toptentemp,
                       artmenublock, bigartblock, mainmenublock, newartblock, newdownblock, topartblock, topicsblock, authorblock, spotlightblock
			FROM " . $xoopsDB->prefix(MAG_TEMPLATES) . "";
        $magTempl = $xoopsDB->fetchArray($result = $xoopsDB->query($sql));

        $template_array = &MagLists::getListTypeAsArray(MAG_TEMPLATE_PATH, "html");
        $blocks_array = &MagLists::getListTypeAsArray(MAG_TEMPLATE_PATH. '/blocks', "html");
        $lang_temp_array = array(_AM_MAG_TEMPLDOWNLOADS, _AM_MAG_TEMPLPOLL, _AM_MAG_TEMPLARCHIVES, _AM_MAG_TEMPLARTINDEX, _AM_MAG_TEMPLSECINDEX, _AM_MAG_TEMPLART, _AM_MAG_TEMPLART_INFO,
            _AM_MAG_TEMPLPLAINART, _AM_MAG_TEMPLTOPTEN, _AM_MAG_ARTMENUBLOCK, _AM_MAG_BIGSTORYBLOCK, _AM_MAG_MAINMENUBLOCK, _AM_MAG_NEWARTBLOCK, _AM_MAG_NEWDOWNLOADSBLOCK,
            _AM_MAG_TOPARTBLOCK, _AM_MAG_TOPICSBLOCK, _AM_MAG_AUTHORBLOCK, _AM_MAG_SPOTLIGHTBLOCK
            ); 
        echo "<fieldset><legend style='font-weight: bold; color: #900;'>" . _AM_MAG_USINGTEMPLATES . "</legend>";
        echo "<div style='padding: 8px;'>";
        echo "<div style='padding-bottom: 8px;'>" . _AM_MAG_HOWTOUSETEMP . "</div>";
        echo "<div style='padding-bottom: 8px;'>" . _AM_MAG_ADDINGATEMPLATE . "</div>";
        echo "<div style='padding-bottom: 8px;'>" . _AM_MAG_HOWTOUSETEMP2 . "</div>";
        echo "<div style='padding-bottom: 8px;'>" . _AM_MAG_DISPLAYXOOPSTEMPADMIN . "<a href='" . XOOPS_URL . "/modules/system/admin.php?fct=tplsets&op=listtpl&tplset=default&moddir=" . $xoopsModule->dirname() . "' target=\"_blank\">"._AM_MAG_VIEW."</a></div>";
        echo "</div></fieldset><br />";

        $sform = new XoopsThemeForm(_AM_MAG_MODIFYTEMPLATES, "op", xoops_getenv('PHP_SELF'));
        $i = 0;
        foreach ($magTempl as $key => $content)
        {
            if ($i < 9)
            {
                $key_select[$i] = new XoopsFormSelect("<a href=\"" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/templates/$content\" target=\"_blank\">"._AM_MAG_VIEW."</a>", $key, $content);
                $key_select[$i]->addOptionArray($template_array);
                $key_tray[$i] = new XoopsFormElementTray($lang_temp_array[$i], '&nbsp;');
                $key_tray[$i]->addElement($key_select[$i]);
                $sform->addElement($key_tray[$i]);
            }
            else
            {
                if ($i == 9)
                {
                    $sform->insertBreak('&nbsp;', 'odd');
                    $sform->insertBreak("<b>" . _AM_MAG_ISBLOCKS . "</b>", 'even');
                }
                $key_select[$i] = new XoopsFormSelect("<a href=\"" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/templates/blocks/$content\" target=\"_blank\">"._AM_MAG_VIEW."</a>", $key, $content);
                $key_select[$i]->addOptionArray($blocks_array);
                $key_tray[$i] = new XoopsFormElementTray($lang_temp_array[$i], '&nbsp;');
                $key_tray[$i]->addElement($key_select[$i]);
                $sform->addElement($key_tray[$i]);
            }
            $i++;
        }
        $button_tray = new XoopsFormElementTray('', '');
        $hidden = new XoopsFormHidden('op', 'save');
        $button_tray->addElement($hidden);
        $button_tray->addElement(new XoopsFormButton('', 'post', _AM_MAG_SAVECHANGE, 'submit'));
        $sform->addElement($button_tray);
        $sform->display();
        unset($hidden);
}
xoops_cp_footer();

?>

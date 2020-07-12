<?php
// $Id: category.php,v 1.7 2005/02/07 01:25:26 phppp Exp $
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

class MagCategory
{
    var $db;
    var $table;
    var $id;
    var $pid = 0;
    var $title = "";
    var $imgurl = "";
    var $displayimg = 1;
    var $description = "";
    var $catheadertitle = "";
    var $catheader = "";
    var $catfootertitle = "";
    var $catfooter = "";
    var $groupid = "1 2 3";
    var $weight = 0;
    var $nohtml = 0;
    var $nosmileys = 0;
    var $noxcodes = 0;
    var $noimages = 0;
    var $nobreaks = 1;
    var $imgalign = 1;
    var $cmainmenu = 0;
    var $template = 'mag_artindex.html';
    var $isblocks = 1;
    var $status = 1;
    var $newid;
    var $groupcreate = '1 2 3';

    function MagCategory($catid = 0)
    {
        $this->db = &Database::getInstance();
        $this->table = $this->db->prefix(MAG_CATEGORY_DB);
        $this->mainmenutable = $this->db->prefix(MAG_MAINMENU_DB);
        if (is_array($catid))
        {
            $this->makeCategory($catid);
        }elseif ($catid != 0)
        {
            $this->loadCategory($catid);
        }
        else
        {
            $this->id = $catid ;
        }
    }

    function setPid($id=-1)
    {
//----------------------------------------------------------------------------------------Dqflyer fixed bug
        if ($id==-1)
		{
          $sql = "SELECT pid FROM " . $this->table . " WHERE id=" . $id . "";
          $tmppid = $this->db->query($sql);
          $this->pid = (!isset($tmppid) || !is_numeric($tmppid)) ? 0 : $tmppid;
		}
		else
//-----------------------------------------------------------------------------------------
          $this->pid=$id; 
    }

    function setTitle($value)
    {
        $this->title = (isset($value) && !empty($value)) ? xoops_trim($value) : AM_NOTITLESET ;
    }
    function setDescription($value, $strip = 0)
    {
        $this->description = $value;
        if ($strip == 1)
        {
            $this->description = &strip_tags($this->description);
        }
    }
    function setCatheaderTitle($value, $strip = 0)
    {
        $this->catheadertitle = $value;
        if ($strip == 1)
        {
            $this->catheadertitle = &strip_tags($this->catheadertitle);
        }
    }
    function setCatheader($value, $strip = 0)
    {
        $this->catheader = $value;
        if ($strip == 1)
        {
            $this->catheader = &strip_tags($this->catheader);
        }
    }
    function setCatfooterTitle($value, $strip = 0)
    {
        $this->catfootertitle = $value;
		if ($strip == 1)
        {
            $this->catfootertitle = &strip_tags($this->catfootertitle);
        }
    }
    function setCatfooter($value, $strip = 0)
    {
        $this->catfooter = $value;
		if ($strip == 1)
        {
            $this->catfooter = &strip_tags($this->catfooter);
        }
    }
    function setGroups($value)
    {
        $this->groupid = mag_saveAccess($value);
    }

    function setGroupcreate($value)
    {
        $this->groupcreate = mag_saveAccess($value);
    }

    function setImgurl($value)
    {
        global $myts;
        $this->imgurl = (!empty($value) && $value != 'blank.png') ? xoops_trim($value) : '' ;
    }
    function setDisplayimg($value = 0)
    {
        $this->displayimg = (isset($value) && $value == 1) ? 1 : 0;
    }
    function setWeight($value = 0)
    {
        global $xoopsModuleConfig;
		
		$this->weight = (isset($value) && $value > 0) ? intval($value) : 0;

        if ($xoopsModuleConfig['autoweight'] && $this->weight == 0)
        {
            $sql = "SELECT weight FROM " . $this->table . " LIMIT 1";
            $result = $this->db->query($sql);
            $this->weight = $count = $this->db->getRowsNum($result) + 1;
        }

    }
    function setImgalign($value = 0)
    {
        $this->imgalign = (isset($value) && $value == 1) ? 1 : 0;
    }
    function setHtml($value = 0)
    {
        $this->nohtml = (isset($value) && $value == 1) ? 1 : 0;
    }
    function setSmileys($value = 0)
    {
        $this->nosmileys = (isset($value) && $value == 1) ? 1 : 0;
    }
    function setXcodes($value = 0)
    {
        $this->noxcodes = (isset($value) && $value == 1) ? 1 : 0;
    }
    function setBreaks($value = 1)
    {
        $this->nobreaks = (isset($value) && $value == 1) ? 1 : 0;
    }
    function setImages($value = 0)
    {
        $this->noimages = (isset($value) && $value == 1) ? 1 : 0;
    }
    function setStatus($value)
    {
        $this->status = (isset($value) && $value == 1) ? 1 : 0;
    }	
    function setCmainmenu($value)
    {
        $this->cmainmenu = (isset($value) && $value == 1) ? 1 : 0 ;
    }
    function setTemplate($value)
    {
        $this->template = xoops_trim($value);
    }
    function setIsblocks($value)
    {
        $this->isblocks = xoops_trim($value);
    }
    /**
     * Start the procress
     */
    function loadCategory($id)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE id=" . $id . "";
        $array = $this->db->fetchArray($this->db->query($sql));
        if (!$array){
	        $this = false;
            return false;
        }

        $this->makeCategory($array);
    }

    function makeCategory($array)
    {
        foreach($array as $key => $value)
        {
            $this->$key = $value;
        }
    }

    function store()
    {
        global $myts;
        $title = $myts->censorString($this->title);
        $title = $myts->addSlashes($title);
        $description = $myts->censorString($this->description);
        $description = $myts->addSlashes($description);
        $catheadertitle = $myts->censorString($this->catheadertitle);
        $catheadertitle = $myts->addSlashes($catheadertitle);
        $catheader = $myts->censorString($this->catheader);
        $catheader = $myts->addSlashes($catheader);
        $catfootertitle = $myts->censorString($this->catfootertitle);
        $catfootertitle = $myts->addSlashes($catfootertitle);
        $catfooter = $myts->censorString($this->catfooter);
        $catfooter = $myts->addSlashes($catfooter);

        $template = $myts->addSlashes($this->template);
        $isblocks = $myts->addSlashes($this->isblocks);
        $groupid = $this->groupid;
	$groupcreate = $this->groupcreate;
		
        $weight = $this->weight;
        $imgurl = $this->imgurl;
        $displayimg = $this->displayimg;
        $cmainmenu = $this->cmainmenu;
        $imgalign = $this->imgalign;
	$status = $this->status;
        
		if (!$this->id)
        {
            $sql = "INSERT INTO " . $this->table . " (id, pid, imgurl, displayimg, title, description, catheadertitle, catheader, groupid, catfootertitle, catfooter, weight, cmainmenu, nohtml, nosmileys, noxcodes, noimages, nobreaks, imgalign, template, status, groupcreate, isblocks) 
				VALUES (0, " . $this->pid . ", '" . $imgurl . "', " . $displayimg . ", '" . $title . "', '" . $description . "', '" . $catheadertitle . "', '" . $catheader . "','" . $groupid . "', '" . $catfootertitle . "', '" . $catfooter . "', " . $weight . ",  " . $cmainmenu . "," . $this->nohtml . "," . $this->nosmileys . "," . $this->noxcodes . "," . $this->noimages . "," . $this->nobreaks . ", " . $imgalign . ", '" . $template . "', ".$status.", '".$groupcreate."', ".$isblocks.")";
            $error = "Error while creating magazine category: <br /><br />" . $sql;
        }
        else
        {
            $sql = "UPDATE " . $this->table . " SET pid=" . $this->pid . ", imgurl='" . $imgurl . "', displayimg=" . $displayimg . ", title='" . $title . "', description='" . $description . "', catheadertitle='" . $catheadertitle . "', catheader='" . $catheader . "', groupid='" . $groupid . "', catfootertitle='" . $catfootertitle . "', catfooter='" . $catfooter . "', weight=" . $weight . ", cmainmenu=" . $cmainmenu . ", nohtml=" . $this->nohtml . ", nosmileys=" . $this->nosmileys . ", noxcodes=" . $this->noxcodes . ", noimages=" . $this->noimages . ", nobreaks=" . $this->nobreaks . ", imgalign=" . $imgalign . ", template = '" . $template . "', status = ".$status.", groupcreate = '" . $groupcreate . "', isblocks = " . $isblocks . "   WHERE id=" . $this->id . "";
            $error = "Error while updating magazine category: <br /><br />" . $sql;
        }
        if (!$result = $this->db->query($sql))
        {
            trigger_error($error, E_USER_ERROR);
        }
        $newid = $this->db->getInsertId();
        $id = ($this->id) ? $this->id : $newid;
        $this->updatemainmenu($id);
        return true;
    }

    function delete()
    {
        $sql = "DELETE FROM " . $this->table . " WHERE id=" . $this->id . "";
        if (!$result = $this->db->query($sql))
        {
            trigger_error("Could not delete category item from database", E_USER_ERROR);
        }

        $sql = "DELETE FROM " . $this->mainmenutable . " WHERE ca_id = '" . $this->id . "' AND istype = '2' " ;
        if (!$result2 = $this->db->query($sql))
        {
            trigger_error("Could not delete mainmenu item from database", E_USER_ERROR);
        }

        $sql = "UPDATE " . $this->table . " SET cmainmenu='0'";
        if (!$result3 = $this->db->query($sql))
        {
            trigger_error("Could not delete mainmenu item from category database", E_USER_ERROR);
        }
    }

    function id()
    {
        return $this->id;
    }

    function pid()
    {
        return $this->pid;
    }

    function title($format = "S")
    {
        global $myts, $xoopsModuleConfig;

        switch ($format)
        {
            case "S":
                $title = $myts->htmlSpecialChars($this->title);
                if (isset($xoopsModuleConfig['shortcatlen']) && $xoopsModuleConfig['shortcatlen'] != 0)
                {
                    $title = xoops_substr($title, 0, $xoopsModuleConfig['shortcatlen']);
                }
                break;
            case "E":
                $title = $myts->htmlSpecialChars($this->title);
                break;
        }
        return $title;
    }

    function imgurl($format = "S")
    {
        global $myts, $xoopsModuleConfig;

        switch ($format)
        {
            case "S":
                $image = $myts->htmlSpecialChars($this->imgurl);
                break;
            case "E":
                $image = (empty($this->imgurl) || $this->imgurl == "") ? "blank.png" : $this->imgurl;
				$image = $myts->htmlSpecialChars($image);
                break;
        }
        return $image;
    }

    function description($format = "S")
    {
        global $myts;

        switch ($format)
        {
            case "S":
                $html = ($this->nohtml) ? 0 : 1;
                $smiley = ($this->nosmileys) ? 0 : 1;
                $xcodes = ($this->noxcodes) ? 0 : 1;
                $images = ($this->noimages) ? 0 : 1;
                $breaks = ($this->nobreaks) ? 1 : 0;

                if ($images == 0)
                {
                    $this->description = preg_replace("/<img[^>]+>/i", "", $this->description);
                }
				$description = $myts->displayTarea($this->description, $html, $smiley, $xcodes, $images, $breaks);	//add by RB
                break;

            case "E":
                $description = $myts->htmlSpecialChars($this->description);
                break;
        }
        return $description;
    }

    function catheadertitle($format = "S")
    {
        global $myts, $xoopsModuleConfig;

        switch ($format)
        {
            case "S":
                $catheadertitle = $myts->htmlSpecialChars($this->catheadertitle);
                if (isset($xoopsModuleConfig['shortcatlen']) && $xoopsModuleConfig['shortcatlen'] != 0)
                {
                    $catheadertitle = xoops_substr($title, 0, $xoopsModuleConfig['shortcatlen']);
                }
                break;
            case "E":
                $catheadertitle = $myts->htmlSpecialChars($this->catheadertitle);
                break;
        }
        return $catheadertitle;
    }

    function catheader($format = "S")
    {
        global $myts;

        switch ($format)
        {
            case "S":
                $html = ($this->nohtml == 1) ? 0 : 1;
                $smiley = ($this->nosmileys == 1) ? 0 : 1;
                $xcodes = ($this->noxcodes == 1) ? 0 : 1;
                $images = ($this->noimages == 1) ? 0 : 1;
                $breaks = ($this->nobreaks == 1) ? 1 : 0;

                if ($images == 0)
                {
                	$this->catheader = preg_replace("/<img[^>]+>/i", "", $this->catheader);
                }                
				$catheader = $myts->displayTarea($this->catheader, $html, $smiley, $xcodes, $images, $breaks);
                break;
            case "E":
                $catheader = $myts->htmlSpecialChars($this->catheader);
                break;
        }
        return $catheader;
    }

    function catfootertitle($format = "S")
    {
        global $myts, $xoopsModuleConfig;

        switch ($format)
        {
            case "S":
                $catfootertitle = $myts->htmlSpecialChars($this->catfootertitle);
                if (isset($xoopsModuleConfig['shortcatlen']) && $xoopsModuleConfig['shortcatlen'] != 0)
                {
                    $catfootertitle = xoops_substr($title, 0, $xoopsModuleConfig['shortcatlen']);
                }
                break;
            case "E":
                $catfootertitle = $myts->htmlSpecialChars($this->catfootertitle);
                break;
        }
        return $catfootertitle;
    }

    function catfooter($format = "S")
    {
        global $myts;

        switch ($format)
        {
            case "S":
                $html = ($this->nohtml) ? 0 : 1;
                $smiley = ($this->nosmileys) ? 0 : 1;
                $xcodes = ($this->noxcodes) ? 0 : 1;
                $images = ($this->noimages) ? 0 : 1;
                $breaks = ($this->nobreaks) ? 0 : 1;

                if ($images == 0)
                {
                    $this->catfooter = preg_replace("/<img[^>]+>/i", "", $this->catfooter);
                }
                $catfooter = $myts->displayTarea($this->catfooter, $html, $smiley, $xcodes, $images, $breaks);
                break;
            case "E":
                $catfooter = $myts->htmlSpecialChars($this->catfooter);
                break;
        }
        return $catfooter;
    }

    function weight()
    {
        return $this->weight;
    }

    function nohtml()
    {
        return $this->nohtml;
    }

    function nosmiley()
    {
        return $this->nosmiley;
    }

    function noxcodes()
    {
        return $this->noxcodes;
    }
    function noimages()
    {
        return $this->noimages;
    }
    function nobreaks()
    {
        return $this->breaks;
    }

    function imgalign()
    {
        return $this->imgalign;
    }

    function cmainmenu()
    {
        return $this->cmainmenu;
    }

    function groupid()
    {
        return $this->groupid;
    }

    function groupcreate()
    {
        return $this->groupcreate;
    }

    function template($format = "S")
    {
        global $myts;

        $template = ($this->template) ? $this->template : 'mag_artindex.html';
        return $myts->htmlSpecialChars($myts->stripSlashesGPC($template));
    }

    function isblocks()
    {
        return $this->isblocks;
    }

    function status()
    {
        return $this->status;
    }

    function getFirstChild()
    {
        global $xoopsModuleConfig;
		
        $ret = array();
        $xt = new XoopsTree($this->table, "id", "pid");
        $category_arr = $xt->getFirstChild($this->id, $xoopsModuleConfig['cidxorder']);
        if (is_array($category_arr) && count($category_arr))
        {
            foreach($category_arr as $category)
            {
                if (!Mag_checkAccess($category['groupid']))
                	continue;
		$ret[] = new MagCategory($category);
            }
        }
        return $ret;
    }


    function getAllChild()
    {
        global $xoopsModuleConfig;
        $ret = array();
        $xt = new XoopsTree($this->table, "id", "pid");
        $category_arr = $xt->getAllChild($this->pid, $xoopsModuleConfig['cidxorder']);
        if (is_array($category_arr) && count($category_arr))
        {
            foreach($category_arr as $category)
            {
                if (!Mag_checkAccess($category['groupid']))
                	continue;
                $ret[] = new MagCategory($category);
            }
        }
        return $ret;
    }

    function getAllSubChild()  // RB add 2005-07-29
    {
        global $xoopsModuleConfig;
        $catid = (isset($_GET['category']) && ereg("^[0-9]{1,}$", $_GET['category'])) ? $_GET['category'] : 1;
        $ret = array();
        $xt = new XoopsTree($this->table, "id", "pid");
        $category_arr = $xt->getAllChild($catid, $xoopsModuleConfig['cidxorder']);  //$this->pid
        if (is_array($category_arr) && count($category_arr))
        {
            foreach($category_arr as $category)
            {
                if (!Mag_checkAccess($category['groupid']))
                	continue;
                $ret[] = new MagCategory($category);
            }
        }
        return $ret;
    }

    function getChildTreeArray()
    {
        global $xoopsModuleConfig;

        $ret = array();
        $xt = new XoopsTree($this->table, "id", "pid");
        $category_arr = $xt->getChildTreeArray($this->id, $xoopsModuleConfig['cidxorder']);
        if (is_array($category_arr) && count($category_arr))
        {
            foreach($category_arr as $category)
            {
                if (!Mag_checkAccess($category['groupid']))
                	continue;
                $ret[] = new MagCategory($category);
            }
        }
        return $ret;
    }

    function getAllChildId($sel_id = 0, $order = "", $parray = array())
    {
        global $xoopsModuleConfig;
	
        $sql = "SELECT id, groupid FROM " . $this->table . " WHERE pid= " . intval($sel_id) . "";
        if ($order != "")
        {
            $sql .= " ORDER BY ".$xoopsModuleConfig['cidxorder']."";
        }
        $result = $this->db->query($sql);
        $count = $this->db->getRowsNum($result);
        if ($count == 0)
        {
            return $parray;
        }
        while ($row = $this->db->fetchArray($result))
        {
           	if (!Mag_checkAccess($row['groupid']))
           		continue;

			array_push($parray, $row['id']);
            $parray = $this->getAllChildId($row['id'], $order, $parray);
        }
        return $parray;
    }

    function isInChild($sel_id)
    {
        if (empty($this->id)) return false;
        if ($sel_id == $this->id) return true;
        $child = $this->getAllChildId();
        if (in_array($sel_id, $child)) return true;
        return false;
    }

    function countCategory($id = 0)
    {
        $db = &Database::getInstance();
        $sql = "SELECT COUNT(*) FROM " . $db->prefix( MAG_CATEGORY_DB ) . "";
        $result = $db->query($sql);
        list($count) = $db->fetchRow($result);
        return $count;
    }

    function makeSelBox($none = 0, $selcategory = -1, $selname = "", $onchange = "", $size = 1, $multipule = '')
    {
        $xt = new MagTree($this->table, "id", "pid");
        if ($selcategory != -1)
        {
            $ret = $xt->makeMySelBox("title", "title", $selcategory, $none, $selname, $onchange, $size, $multipule);
        }elseif (!empty($this->id))
        {
            $ret = $xt->makeMySelBox("title", "title", $this->id, $none, $selname, $onchange, $size, $multipule);
        }
        else
        {
            $ret = $xt->makeMySelBox("title", "title", 0, $none, $selname, $onchange, $size, $multipule);
        }
        return $ret;
    }

    function getNicePathFromId($funcURL)
    {
        $xt = new XoopsTree($this->table, "id", "pid");
        $ret = $xt->getNicePathFromId($this->id, "title", $funcURL);
        return $ret;
    }

    function getNicePathToPid($funcURL)
    {
        $ret = "";
        if ($this->pid() != 0)
        {
            $xt = new MagCategory($this->pid());
            $ret = $xt->getNicePathToPid($funcURL) . " >> <a href='" . $funcURL . $this->pid() . "'>" . trim($xt->title()) . "</a>";
        }
        return $ret;
    }

    function adminlink()
    {
        global $xoopsModule, $xoopsUser;
        $ret = "";
        if (is_object($xoopsUser) && $xoopsUser->isAdmin($xoopsModule->getVar('mid')))
        {
            $ret .= "&nbsp;[ <a href='" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/admin/category.php?op=mod&amp;id=" . $this->id . "'>" . _EDIT . "</a> | <a href='" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/admin/category.php?op=delete&amp;id=" . $this->id . "'>" . _DELETE . "</a> ]";
        }
        return $ret;
    }

    function imgLink($path = 'artindex.php', $align = "", $height = '89', $width = '89', $vspace = 0, $hspace = 0)
    {
        global $magPathConfig, $xoopsModuleConfig;

        $ret = "";
		
		if (empty($this->imgurl))
		{
			return $ret;
		}
		
        if (!file_exists(MAG_SECTIONIMG_PATH . "/" . $this->imgurl) || $xoopsModuleConfig['showcatpic'] == 0)
        {
            return $ret;
        }
        else
        {
            $section_img = MAG_SECTIONIMG_URL.'/'.$this->imgurl('S');
            $ret = "<a href='" . MAG_ROOT_URL . "/" . $path . "?category=" . $this->id() . "'>" . "<img src='" . $section_img . "'
				alt='" . $this->title("S") . "'  vspace=" . $vspace . " hspace=" . $hspace . "/></a>";
        }
        return $ret;
    }

    function textLink($title = '', $admin = 0, $path = 'artindex.php')
    {
        global $xoopsModule;

        $title = $this->title("S");
        $ret = "<a href='" . XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/" . $path . "?category=" . $this->id . "'>" . $title . "</a>";
        /*if ($admin)
		{
			$ret .= $this->adminlink();
        }*/
		return $ret;
    }

    function updatemainmenu($thisid)
    {
        $db = &Database::getInstance();
        $sql = "SELECT mm_id FROM " . $this->mainmenutable . " WHERE ca_id =" . $thisid . " AND istype = '2' ";
        $mm_id = $this->db->fetchrow($this->db->query($sql));

        if ($this->cmainmenu == 0)
        {
            $this->deletemainmenu($thisid);
            return true;
        }

        if ($mm_id)
        {
            $sql = "UPDATE " . $this->mainmenutable . " SET mm_title = '" . $this->title . "', istype = '2', groupid = '" . $this->groupid . "' WHERE ca_id = " . $this->id . " AND istype ='2' ";
            if (!$result = $this->db->query($sql))
            {
                trigger_error("Could not update menu item from database" . $this->mainmenutable . " <br />" . $sql, E_USER_ERROR);
            }
        }
        else
        {
            $mm_id = $this->db->genId($this->table . "_mm_id_seq");
            $sql = "INSERT INTO " . $this->mainmenutable . " (mm_id, ca_id, mm_title, istype, groupid) VALUES ( " . $mm_id . ", " . $thisid . ", '" . $this->title . "', '2' , '" . $this->groupid . "')";
            if (!$result = $this->db->query($sql))
            {
                trigger_error("Could not create menu item from database " . $this->mainmenutable . " <br />" . $sql, E_USER_ERROR);
            }
        }
    }

    function deletemainmenu($thisid)
    {
        $db = &Database::getInstance();

        $sql = "SELECT mm_id FROM " . $this->mainmenutable . " WHERE ca_id =" . $thisid . " AND istype = '2' ";
        $mm_id = $this->db->fetchrow($this->db->query($sql));

        if (!$mm_id)
        {
            return true;
        }

        $sql = "DELETE FROM " . $this->mainmenutable . " WHERE ca_id=" . $thisid . "";
        if (!$result = $this->db->query($sql))
        {
            trigger_error("Could not delete menu item from database" . $this->mainmenutable . " <br />" . $sql, E_USER_ERROR);
        }
    }
}

?>

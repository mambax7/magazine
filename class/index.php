<?php
// $Id: index.php,v 1.4 2004/08/13 12:46:08 phppp Exp $
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

class MagIndex
{
    var $db;
    var $indid;
    var $table;
    var $pagename = "";
    var $indeximage = "blank.png";
    var $indexheading = "";
    var $indexheader = "";
    var $indexfooting = "";
    var $indexfooter = "";
    var $nohtml = 0;
    var $nosmileys = 0;
    var $noxcodes = 0;
    var $noimages = 0;
    var $nobreaks = 1;
    var $indexheaderalign = "left";
    var $indexfooteralign = "left";
    var $isdefault = 0;
    var $isblocks = 1;

    function MagIndex($indid = 0)
    {
        $this->db = &Database::getInstance();
        $this->table = $this->db->prefix(MAG_INDEXPAGE);
        if (is_array($indid))
        {
            $this->makeIndex($indid);
        }
        elseif ($indid != 0)
        {
            $this->loadIndex($indid);
        }
        else
        {
            $this->indid = $indid ;
        }
    }

    function loadIndex($indid)
    {
        $sql = sprintf("SELECT * FROM " . $this->table . " WHERE indid=" . $indid . "");
        $error = "Error while creating magazine pages: <br /><br />" . $sql;
        if (!$result = $this->db->query($sql))
        {
            trigger_error($error, E_USER_ERROR);
        }

        $array = $this->db->fetchArray($this->db->query($sql));
        $this->makeIndex($array);
    }

    function makeIndex($array)
    {
        foreach($array as $key => $value)
        {
            $this->$key = $value;
        }
    }

    /**
     * Code to setup and clean items before saving to database
     */
    function setPagename($value)
    {
        $this->pagename = (isset($value) && !empty($value)) ? xoops_trim($value) : _AM_MAG_NOTITLESET ;
    }
    function setIndexheading($value)
    {
        $this->indexheading = (isset($value) && !empty($value)) ? xoops_trim($value) : _AM_MAG_NOTITLESET ;
    }
    function setIndeximage($value)
    {
        $this->indeximage = (!empty($value) && $value != 'blank.png') ? xoops_trim($value) : '';
    }
    function setIndexheader($value, $strip = 0)
    {
        $this->indexheader = $value;
        if ($strip)
        {
            $this->indexheader = &mag_strip_tags($this->indexheader);
        }
    }
    function setIndexfooting($value)
    {
        $this->indexfooting = (isset($value) && !empty($value)) ? xoops_trim($value) : _AM_MAG_NOTITLESET ;
    }
    function setIndexfooter($value, $strip = 0)
    {
        $this->indexfooter = $value;
        if ($strip)
        {
            $this->indexfooter = &mag_strip_tags($this->indexfooter);
        }
    }
    function setIndexheaderalign($value)
    {
        $this->indexheaderalign = (!empty($value)) ? xoops_trim($value) : "left" ;
    }
    function setIndexfooteralign($value)
    {
        $this->indexfooteralign = (!empty($value)) ? xoops_trim($value) : "left" ;
    }

    function setIsdefault($value)
    {
        $this->isdefault = (isset($value) && $value == 1) ? 1 : 0 ;
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
    function setIsblocks($value)
    {
        $this->isblocks = $value;
    }

    /**
     * MagIndex::store()
     *
     * Store information into database
     *
     * @return
     */
    function store()
    {
        global $myts;

        $id = intval($this->indid);
        $pagename = $myts->censorString($this->pagename);
        $indexheading = $myts->censorString($this->indexheading);
        $indexheader = $myts->censorString($this->indexheader);
        $indexfooting = $myts->censorString($this->indexfooting);
        $indexfooter = $myts->censorString($this->indexfooter);

        //if (get_magic_quotes_gpc()) // if get_magic_quotes_gpc enabled, module.textsanitizer::addSlashes will skip
        //{
         //$indeximage = addSlashes($this->indeximage);
         //$pagename = addSlashes($pagename);
         //$indexheading = addSlashes($indexheading);
         //$indexheader = addSlashes($indexheader);
         //$indexfooter = addSlashes($indexfooter);
        //}else {
         $indeximage = $this->indeximage;
         //$pagename = $pagename;
         //$indexheading = $indexheading;
         //$indexheader = $indexheader;
         //$indexfooter = $indexfooter;
        //}

        $indexheaderalign = $this->indexheaderalign;
        $indexfooteralign = $this->indexfooteralign;

        $nosmileys = intval($this->nosmileys);
        $nohtml = intval($this->nohtml);
        $noxcodes = intval($this->noxcodes);
        $images = intval($this->noimages);
        $noimages = intval($this->noimages);
        $isdefault = intval($this->isdefault);
        $isblocks = $this->isblocks;

        if (empty($id))
        {
            $id = $this->db->genId($this->table . "_id_seq");
            $sql = sprintf("INSERT INTO " . $this->table . " (indid, pagename, indeximage, indexheading, indexheader, indexfooting, indexfooter, nohtml, nosmileys, noxcodes, noimages, nobreaks, indexheaderalign, indexfooteralign,  isdefault, isblocks ) VALUES (" . $id . ", '" . $pagename . "', '" . $indeximage . "', '" . $indexheading . "', '" . $indexheader . "', '" . $indexfooting . "', '" . $indexfooter . "', '" . $indexheaderalign . "', '" . $indexfooteralign . "', " . $nohtml . ", " . $nosmileys . ", " . $this->noxcodes . ", " . $this->noimages . ", " . $this->nobreaks . ", 0, " . $this->isblocks . ")");
            $error = "Error while creating magazine pages: <br /><br />" . $sql;
        }
        else
        {
            $sql = sprintf("UPDATE " . $this->table . " set pagename = '" . $pagename . "', indexheading='" . $indexheading . "', indexheader='" . $indexheader . "', indexfooting='" . $indexfooting . "', indexfooter='" . $indexfooter . "', indeximage='" . $indeximage . "', indexheaderalign='" . $indexheaderalign . "', indexfooteralign='" . $indexfooteralign . "', nohtml = " . $nohtml . ", nosmileys = " . $this->nosmileys . ", noxcodes = " . $this->noxcodes . ", noimages=" . $this->noimages . ", nobreaks=" . $this->nobreaks . " , nobreaks=" . $this->nobreaks . ", isblocks=" . $this->isblocks . " WHERE indid=" . $id . "");
            $error = "Error while updating magazine pages: <br /><br />" . $sql;
        }
        if (!$result = $this->db->query($sql))
        {
            trigger_error($error, E_USER_ERROR);
        }
        return true;
    }

    function delete()
    {
        global $xoopsDB, $xoopsConfig;

        $sql = "DELETE FROM " . $this->table . " WHERE indid=" . $this->indid . "";
        if (!$result = $this->db->query($sql))
        {
            trigger_error("Could not delete magazine page item from database", E_USER_ERROR);
        }
    }

    function getAllPages($limit = 0, $start = 0, $asobject = true)
    {
        global $xoopsDB, $xoopsConfig, $orderby;

        $db = &Database::getInstance();
        $myts = &MyTextSanitizer::getInstance();
        $ret = array();

        $sql = "SELECT * FROM " . $db->prefix(MAG_INDEXPAGE) . " ORDER BY indid";
        $result = $db->query($sql, $limit, $start);
        while ($myrow = $db->fetchArray($result))
        {
            if ($asobject)
            {
                $ret[] = new MagIndex($myrow);
            }
            else
            {
                $ret[$myrow['indid']] = $myts->makeTboxData4Show($myrow['pagename']);
            }
        }
        return $ret;
    }

    /**
     * Code to display items from database
     */
    function indid()
    {
        return $this->indid;
    }

    function pagename($format = "S")
    {
        global $myts;

        switch ($format)
        {
            case "S":
                $pagename = $myts->htmlSpecialChars($this->pagename);
                break;
            case "E":
                $pagename = $myts->htmlSpecialChars($this->pagename);
                break;
        }
        return $pagename;
    }

    function indexheading($format = "S")
    {
        global $myts;
		$indexheading = $this->indexheading;
		switch ($format)
        {
            case "S":
                $indexheading = $myts->htmlSpecialChars($indexheading);
                break;
            case "E":
                $indexheading = $myts->htmlSpecialChars($indexheading);
                break;
        }
        return $indexheading;
    }

    function indeximage($format = "S")
    {
        global $myts;
		$indeximage = $this->indeximage;
        switch ($format)
        {
            case "S":
                $indeximage = "blank.png";
                if ($this->imagecheck($this->indeximage))
                {
                    if (!empty($this->indeximage) || $this->indeximage != "blank.png")
                    {
                        $indeximage = $myts->htmlSpecialChars($this->indeximage);
                    }
                }
                break;
            case "E":
                $indeximage = "blank.png";
                $indeximage = $myts->htmlSpecialChars($this->indeximage);
                break;
        }
        return $indeximage;
    }

    function indexheader($format = "S")
    {
        if (empty($this->indexheader)) return "";

        global $myts;
        switch ($format)
        {
            case "S":

                $html = ($this->nohtml == 1) ? 0 : 1;
                $smiley = ($this->nosmileys == 1) ? 0 : 1;
                $xcodes = ($this->noxcodes == 1) ? 0 : 1;
                $images = ($this->noimages == 1) ? 0 : 1;
                $breaks = ($this->nobreaks == 1) ? 1 : 0;
                if ($this->noimages == 0) $this->indexheader = preg_replace("/<img[^>]+>/i", "", $this->indexheader);

                $catdescription = $myts->displayTarea($this->indexheader, $html, $smiley, $xcodes, $images, $breaks);
                break;
            case "E":
                $catdescription = $myts->htmlSpecialChars($this->indexheader);
                break;
        }
        return $catdescription;
    }

    function indexfooting($format = "S")
    {
        global $myts;
		$indexfooting = $this->indexfooting;
		switch ($format)
        {
            case "S":
                $indexfooting = $myts->htmlSpecialChars($indexfooting);
                break;
            case "E":
                $indexfooting = $myts->htmlSpecialChars($indexfooting);
                break;
        }
        return $indexfooting;
    }

    function indexfooter($format = "S")
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

                if ($this->noimages == 0) $this->indexfooter = preg_replace("/<img[^>]+>/i", "", $this->indexfooter);
                $catfooter = $myts->displayTarea($this->indexfooter, $html, $smiley, $xcodes, $images, $breaks);
                break;
            case "E":
                $catfooter = $myts->htmlSpecialChars($this->indexfooter);
                break;
        }
        return $catfooter;
    }

    function indexheaderalign()
    {
        return $this->indexheaderalign;
    }

    function indexfooteralign()
    {
        return $this->indexfooteralign;
    }

    function isblocks()
    {
        return $this->isblocks;
    }

    /**
     * HTML stuff
     */
    function imageheader()
    {
        global $xoopsDB, $xoopsModule, $magPathConfig;
        $image = mag_displayimage($this->indeximage, "modules/" . MODDIR . "/index.php", $magPathConfig["logopath"], $this->indexheading);
        return $image;
    }

    function imagecheck($image)
    {
        global $magPathConfig;

        $image = XOOPS_ROOT_PATH . "/" . $magPathConfig["logopath"] . "/" . $image;
        $ifexisits = file_exists($image) ? TRUE : FALSE;
        return $ifexisits;
    }
}

?>

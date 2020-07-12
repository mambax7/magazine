<?php
// $Id: search.inc.php,v 1.5 2005/02/07 01:25:26 phppp Exp $
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
global $xoopsModule;
function magazine_search($queryarray, $andor, $limit, $offset, $userid)
{
    global $xoopsDB,$xoopsUser;

    $articles_arr = array(); 
    // search in attached files
    if (!empty($queryarray))
    {
        $sql = "SELECT articleid,fileshowname FROM " . $xoopsDB->prefix( MAG_FILES_DB );
        if (is_array($queryarray) && $count = count($queryarray))
        {
            $sql .= " WHERE filetext LIKE '%$queryarray[0]%' OR filedescript LIKE '%$queryarray[0]%'";
            for($i = 1;$i < $count;$i++)
            {
                $sql .= " $andor ";
                $sql .= "filetext LIKE '%$queryarray[$i]%' OR filedescript LIKE '%$queryarray[0]%'";
            }
        }
        $result = $xoopsDB->query($sql);

        $filename_arr = array();
        while($row = $xoopsDB->fetchArray($result))
        {
            $filename_arr[$row['articleid']][] = $row['fileshowname'];
            if (!in_array($row['articleid'], $articles_arr)) $articles_arr[] = $row['articleid'];
        }
    } 
    // search in articles
    $sql = "SELECT articleid,uid,title,published,summary,groupid FROM " . $xoopsDB->prefix( MAG_ARTICLE_DB ) . " WHERE published>0 AND published<=" . time() . "";
    if ($userid != 0)
    {
        $sql .= " AND uid=" . $userid . " ";
    } 
    // because count() returns 1 even if a supplied variable
    // is not an array, we must check if $querryarray is really an array
    if (is_array($queryarray) && $count = count($queryarray))
    {
        $sql .= " AND ((maintext LIKE '%$queryarray[0]%' OR title LIKE '%$queryarray[0]%' OR summary LIKE '%$queryarray[0]%')";
        for($i = 1;$i < $count;$i++)
        {
            $sql .= " $andor ";
            $sql .= "(maintext LIKE '%$queryarray[$i]%' OR title LIKE '%$queryarray[$i]%' OR summary LIKE '%$queryarray[$i]%')";
        }
        $sql .= ") ";
    }

   	$sql .= " ORDER BY published DESC"; 
    $result = $xoopsDB->query($sql, $limit, $offset);
    $ret = array();
    $i = 0;
    while($myrow = $xoopsDB->fetchArray($result))
    {
		$ugroupid=(is_object($xoopsUser))?$xoopsUser->getGroups():0;
		$groupidarray=explode(" ", $myrow['groupid']);
		if (array_intersect($groupidarray,$ugroupid ))
		{
        if (in_array($myrow['articleid'], $articles_arr))
        {
            $ret[$i]['image'] = "images/download.gif";
            $ret[$i]['title'] = $myrow['title'];
            foreach($filename_arr[$myrow['articleid']] as $value)
            {
                $ret[$i]['title'] .= " [ " . $value . " ]";
            }
        }
        else
        {
            $ret[$i]['image'] = "images/date.gif";
            $ret[$i]['title'] = $myrow['title'];
        }
        $ret[$i]['link'] = "article.php?articleid=" . $myrow['articleid'] . "";
        $ret[$i]['time'] = $myrow['published'];
        $ret[$i]['uid'] = $myrow['uid'];
        $i++;
		}
//		else
//			$i++;
    }
    return $ret;
}
?>

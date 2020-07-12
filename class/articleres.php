<?php
// $Id: articleres.php,v 1.7 2005/02/07 01:25:26 phppp Exp $
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
// include_once 'common.php';
include_once MAG_ROOT_PATH . "/class/article.php";

/**
 * MagArticleRes
 * 
 * @package 
 * @author phppp 
 * @copyright Copyright (c) 2005
 * @access public 
 */ 
// This class needs to be re-written based on kernel object class ... - phppp
class MagArticleRes extends MagArticle
{
    var $restore_id;
    var $restore_date = 0; 
    // constructor
    function MagArticleRes( $restore_id = -1 )
    {
        $this->db = &Database::getInstance();
        $this->table = $this->db->prefix( MAG_RESTORE_DB ); 
        // $this->MagArticle();
        if ( is_array( $restore_id ) ) // assign values for the article
        {
            $this->makeArticle( $restore_id );
            $this->category = $this->category();
        } elseif ( $restore_id != -1 )
        {
            $this->getArticle( $restore_id );
            if ( $this ) // if the article exists in database and loaded
                 $this->category = $this->category();
        } 
    } 

    function getArticle( $restore_id )
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE restore_id=" . $restore_id . " ";
        $array = $this->db->fetchArray( $this->db->query( $sql ) );
        if ( !is_array( $array ) )
        {
            $this = false;
            return false;
        } 
        $this->makeArticle( $array );
    } 

    function delete( $restore_id = 0 )
    {
        $db = &Database::getInstance();
        $restore_id = ( $restore_id )?$restore_id:$this->restore_id;
        $sql = "DELETE FROM " . $db->prefix( MAG_RESTORE_DB ) . " WHERE restore_id=$restore_id";
        if ( !$result = $db->query( $sql ) ) return false;
        return true;
    } 

    // public - MagArticle::* style
    function getAllArticle( $limit = 0, $start = 0, $query_sting = '', $articleid = '', $category = '', $user = '', $orderby = '', $asobject = true )
    {
        global $xoopsModuleConfig;

        $sql_queries = array( 'all' => '',
            'published' => "published > 0 and published <= " . time() . " and expired = 0",
            'autoart' => "published > " . time(),
            'submitted' => "published = 0 and offline = 0",
            'online' => "published > 0 AND published <= " . time() . " AND noshowart = 0 AND offline = 0 AND (expired = 0 OR expired > " . time() . ")",
            'offline' => "published > 0 and offline = 1",
            'expired' => "expired > 0 and expired < " . time(),
            'autoexpire' => "expired > " . time(),
            'noshowart' => "noshowart = 1",
            'ishtml' => "htmlpage != ''",
            'spotlight' => "spotlight >=1",
            'spotlightmain' => "spotlightmain >=1",
            'nospotlight' => "spotlight =0 ",
            'nospotlightmain' => "spotlightmain =0" 
            );

        $queries = explode( "|", $query_sting );
        $sql_query = "";
        foreach( $queries as $query )
        {
            $sql_query .= ( trim( $sql_query ) )?" AND ":"";
            $sql_query .= $sql_queries[$query];
        } 
        $query_category = ( $articleid )?" articleid = $articleid":"";
        $query_category = ( $category )?" categoryid = $category":"";
        $query_user = ( $user )?" uid=$user":"";
        $query_orderby = ( $orderby ) ? " ORDER BY $orderby": ( $xoopsModuleConfig['cidxorder']?" ORDER BY " . $xoopsModuleConfig['cidxorder'] . "":"" );

        if ( trim( $query_category ) )
        {
            if ( trim( $sql_query ) ) $sql_query .= " AND " . $query_category;
            else $sql_query .= $query_category;
        } 
        if ( trim( $query_user ) )
        {
            if ( trim( $sql_query ) ) $sql_query .= " AND " . $query_user;
            else $sql_query .= $query_user;
        } 
        if ( trim( $sql_query ) ) $sql_query = "WHERE " . $sql_query;
        if ( trim( $query_orderby ) )
        {
            if ( trim( $sql_query ) ) $sql_query .= " " . $query_orderby;
            else $sql_query .= $query_orderby;
        } 

        $db = &Database::getInstance();
        $myts = &MyTextSanitizer::getInstance();
        $ret = array();

        $sql = "SELECT * FROM " . $db->prefix( MAG_RESTORE_DB ) . " " . $sql_query; 
        // echo "<br />sql query:".$sql;
        $result = $db->query( $sql, $limit, $start );

        while ( $myrow = $db->fetchArray( $result ) )
        {
            if ( !Mag_checkAccess( $myrow['groupid'] ) )
                 Continue;

            if ( $asobject == true )
            {
                $ret[] = new MagArticle( $myrow );
            } 
            else
            {
                $ret[$myrow['restore']] = $myts->makeTboxData4Show( $myrow['title'] );
            } 
        } 
        return $ret;
    } 

    function getByCategory( $categoryid )
    {
        $db = &Database::getInstance();
        $ret = array();
        $result = $db->query( "SELECT * FROM " . $db->prefix( MAG_RESTORE_DB ) . " WHERE categoryid=$categoryid ORDER BY restore DESC" );
        while ( $myrow = $db->fetchArray( $result ) )
        {
            if ( !Mag_checkAccess( $myrow['groupid'] ) )
                Continue;
            $ret[] = new MagArticle( $myrow );
        } 
        return $ret;
    } 

    /**
     * MagArticle::countByCategory()
     * 
     * @param integer $categoryid 
     * @param integer $nonspotlight 
     * @return 
     */
    function countByCategory( $categoryid = 0, $recurse = 1 )
    {
        $count = 0;
        $db = &Database::getInstance();
        $sql = "SELECT groupid FROM " . $db->prefix( MAG_RESTORE_DB ) . " where offline = 0 ";
        if ( $categoryid ) $sql .= " and categoryid=$categoryid";
        $result = $db->query( $sql );

        if ( $result )
        {
            while ( $myrow = $db->fetchArray( $result ) )
            {
                $count++;
            } 
            if ( $recurse == 1 )
            {
                $xt = new MagCategory( $categoryid );
                $arr = $xt->getAllChildId( $categoryid );
                $newcount = 0;
                for( $i = 0;$i < count( $arr );$i++ )
                {
                    $sql2 = "SELECT restoreid FROM " . $db->prefix( MAG_RESTORE_DB ) . " offline = 0  AND categoryid =" . $arr[$i] . "";
                    $result2 = $db->query( $sql2 );
                    while ( $myrow2 = $db->fetchArray( $result2 ) )
                    {
                        $newcount++;
                    } 
                    $count += $newcount;
                } 
            } 
            return $count;
        } 
    } 

    function admintextLink( $restore_id )
    {
        if ( $restore_id )
        {
            $title = $restore_id;
        } 
        else
        {
            $restore_id = $this->restore_id;
            $title = $this->title("S");
        } 
        $ret = "<a href='" . MAG_ROOT_URL . "/admin/articleres.php?restore_id=" . $restore_id . "' target='_blank'>" . $title . "</a>";
        return $ret;
    } 
} 

?>

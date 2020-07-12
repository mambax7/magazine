<?php
// $Id: allarticles.php,v 1.8 2005/02/07 01:25:24 phppp Exp $
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
include 'admin_header.php';

$op = '';
$category = 0;
$user = 0;

if ( isset( $_POST ) )
{
    foreach ( $_POST as $k => $v )
    {
        ${$k} = $v;
    } 
} 

if ( isset( $_GET ) )
{
    foreach ( $_GET as $k => $v )
    {
        ${$k} = $v;
    } 
} 

$start = isset( $_GET['start'] ) ? intval( $_GET['start'] ) : 0;
$orderby = 'articleid DESC';
$xoopsOption = ( isset( $_GET['lastarts'] ) ) ? intval( $_GET['lastarts'] ) : 0 ;

if ( $xoopsOption > 30 ) $xoopsOption = 0;

switch ( $op )
{
    case "server_status":
        //accessadmin("adminrights");
	xoops_cp_header();
        mag_admin_menu( _AM_MAG_SERVERSTATE );
        mag_serverstats();

        break;

    case "edit_docs";

        global $xoopsUser; 
        xoops_cp_header();
        mag_admin_menu( _AM_MAG_ARTICLEMANAGEMENT, '', $extra = "<h4>" . _AM_MAG_DOCSINEDITING . "</h4>" );

        $sql = "SELECT * FROM " . $xoopsDB->prefix( MAG_CHECKIN_DB ) . " WHERE c_out_time = '0' ORDER BY ci_id" ;
        $result = $xoopsDB->query( $sql );
        $count = $xoopsDB->getRowsNum( $result );

        $heading = array( _AM_MAG_STORYID, _AM_MAG_TITLE, _AM_MAG_POSTER, _AM_MAG_DATE );

        echo "<table border='0' width='100%' cellpadding ='2' cellspacing='1' class = 'outer'>";
        echo "<tr >";
        for ( $i = 0; $i < count( $heading ); $i++ )
        {
            $aligntype = ( $i == 1 ) ? 'left' : 'center';
            echo "<th align='$aligntype'><b>" . $heading[$i] . "</th>";
        } 
        echo "</tr>";
        if ( !$count )
        {
            echo "<tr>\n";
            echo "<td colspan =\"7\" class = \"head\" align = \"center\">" . _AM_MAG_NOARTICLEFOUND . "</td>\n";
            echo "</tr>\n";
        } 
        else
        {
            while ( $arr = $xoopsDB->fetchArray( $result ) )
            {
                $article = new MagArticle( $arr['article_id'] );

                echo "<tr>";
                echo "<td class = \"head\" align = \"center\">" . $arr['ci_id'] . "</td>";
                echo "<td class = \"even\" align = \"center\">" . $article->admintextLink( "S" ) . "</td>";
                echo "<td class = \"even\" align = \"center\">" . mag_getLinkedUnameFromId( $arr['user_id'], '' ) . "</td>";
                echo "<td  class = \"even\" align = \"center\" nowrap>" . formatTimestamp( $arr['c_in_time'], "d-M-Y H:m a" ) . "</td>\n";
                echo "</tr>";
            } 
        } 
        echo "</table>";
        break;

    case "stats":
		
        //accessadmin( "docstats" );
        global $xoopsDB, $xoopsUser, $xoopsModuleConfig;

        $article = new magarticle( $articleid );
        $files = new magfiles( $articleid );
        $xt = new magcategory();

        xoops_cp_header();
        mag_admin_menu( _AM_MAG_ARTICLEMANAGEMENT, '', $extra = "<h4>" . _AM_MAG_ARTICLESTATS . "</h4>" ); 
        /*
		*  The last edition
		*/ 
        $result = $xoopsDB->query( "SELECT user_id, c_out_time FROM " . $xoopsDB->prefix( MAG_CHECKIN_DB ) . " WHERE article_id=" . $article->articleid . " ORDER BY c_out_time DESC LIMIT 1" );
        if ( $result ) list( $userId_lastEdition, $time_lastEdition ) = $xoopsDB->fetchrow( $result ); 
        /*
		*  times of the article edited by this author
		*/ 
        $result = $xoopsDB->query( "SELECT * FROM " . $xoopsDB->prefix( MAG_CHECKIN_DB ) . " WHERE c_out_time > '0' AND article_id=" . $article->articleid . " AND user_id=" . $article->uid );
        if ( $result ) $CountEditionByTheAuthor = $xoopsDB->getRowsNum( $result );
        else $CountEditionByTheAuthor = 0; 
        /* 
		* total times of edition of this article
		*/ 
        $result = $xoopsDB->query( "SELECT * FROM " . $xoopsDB->prefix( MAG_CHECKIN_DB ) . " WHERE c_out_time > '0' AND article_id=" . $article->articleid );
        if ( $result ) $CountTotalEdition = $xoopsDB->getRowsNum( $result );
        else $CountTotalEdition = 0; 
        /*
		*  total times of edition of this article by the last editor
		*/ 
        $result = $xoopsDB->query( "SELECT * FROM " . $xoopsDB->prefix( MAG_CHECKIN_DB ) . " WHERE c_out_time > '0' AND article_id=" . $article->articleid . " AND user_id=" . $userId_lastEdition );
        if ( $result ) $CountTotalEditionByTheLastEditor = $xoopsDB->getRowsNum( $result );
        else $CountTotalEditionByTheLastEditor = 0;

        $sform = new XoopsThemeForm( _AM_MAG_ARTICLESTATSFOR . " " . $article->title(), "op", xoops_getenv( 'PHP_SELF' ) );
        $sform->addElement( new XoopsFormLabel( _AM_MAG_STATARTICLEID, $article->articleid() ) );
        $sform->addElement( new XoopsFormLabel( _AM_MAG_STATTITLE, $article->admintextLink( "S" ) ) );
        $sform->addElement( new XoopsFormLabel( _AM_MAG_STATSECTION, $article->category->textLink() ) );
        $sform->addElement( new XoopsFormLabel( _AM_MAG_STATWEIGHT, $article->weight( "S" ) ) );

        $sform->insertBreak( "", "even" );
        $sform->addElement( new XoopsFormLabel( _AM_MAG_STATAUTHOR, mag_getLinkedUnameFromId( $article->uid() ) ) );
        $sform->addElement( new XoopsFormLabel( _AM_MAG_STATUSERTYPE, $article->usertype ) );
        $sform->addElement( new XoopsFormLabel( _AM_MAG_STATCREATED, $article->created( "S" ) ) );
        $published = $article->published > 0 ? formatTimestamp( $article->published(), "$xoopsModuleConfig[timestamp]" ) : _AM_MAG_NOT_PUBLISHED;
        $sform->addElement( new XoopsFormLabel( _AM_MAG_STATPUBLISHED, $published ) );
        $expired = $article->expired > 0 ? formatTimestamp( $article->expired(), "$xoopsModuleConfig[timestamp]" ) : _AM_MAG_NOT_SET;
        $sform->addElement( new XoopsFormLabel( _AM_MAG_STATEXPIRED, $expired ) );
        $sform->addElement( new XoopsFormLabel( _AM_MAG_STATTIMESEDITEDBYAUTHOR, $CountEditionByTheAuthor . _AM_MAG_TIMES ) );
        $sform->addElement( new XoopsFormLabel( _AM_MAG_STATTIMESEDITEDTOTAL, $CountTotalEdition . _AM_MAG_TIMES ) );

        $sform->insertBreak( "", "even" );
        $sform->addElement( new XoopsFormLabel( _AM_MAG_STATLASTEDITEDBY, mag_getLinkedUnameFromId( $userId_lastEdition ) ) );
        $changed = $article->changed > 0 ? formatTimestamp( $time_lastEdition, "$xoopsModuleConfig[timestamp]" ) : _AM_MAG_NOT_CHANGED;
        $sform->addElement( new XoopsFormLabel( _AM_MAG_STATLASTEDITED, $changed ) );
        $sform->addElement( new XoopsFormLabel( _AM_MAG_STATTIMESEDITEDBYLASTEDITOR, $CountTotalEditionByTheLastEditor . _AM_MAG_TIMES ) );

        $sform->insertBreak( "", "even" );
        $sform->addElement( new XoopsFormLabel( _AM_MAG_STATCOUNTER, $article->counter() . _AM_MAG_TIMES ) );
        $sform->addElement( new XoopsFormLabel( _AM_MAG_STATRATING, $article->rating() ) );

        $result = $xoopsDB->query( "SELECT rating FROM " . $xoopsDB->prefix( MAG_VOTES ) . " WHERE lid = " . $article->articleid . " ORDER BY rating DESC LIMIT 1" );
        list( $rating_high ) = $xoopsDB->fetchrow( $result );
        $rating_high = ( !empty( $rating_high ) ) ? $rating_high : 0;
        $sform->addElement( new XoopsFormLabel( _AM_MAG_STATRATINGHIGH, $rating_high ) );

        $result = $xoopsDB->query( "SELECT rating FROM " . $xoopsDB->prefix( MAG_VOTES ) . " WHERE lid = " . $article->articleid . " ORDER BY rating ASC LIMIT 1" );
        list( $rating_low ) = $xoopsDB->fetchrow( $result );
        $rating_low = ( !empty( $rating_low ) ) ? $rating_low : 0;
        $sform->addElement( new XoopsFormLabel( _AM_MAG_STATRATINGLOW, $rating_low ) );
        $sform->addElement( new XoopsFormLabel( _AM_MAG_STATVOTES, $article->votes() . _AM_MAG_TIMES ) );
        $sform->addElement( new XoopsFormLabel( _AM_MAG_STATDOWNLOADS, $article->getFilesCount() ) );

        $comallowed = isset( $article->allowcom ) ? _YES : _NO;
        $sform->addElement( new XoopsFormLabel( _AM_MAG_STATCOMMENTSALLOWED, $comallowed ) );
        $sform->addElement( new XoopsFormLabel( _AM_MAG_STATCOMMENTS, $article->getCommentsCount() ) );

        $artstatus = isset( $article->offline ) ? _AM_MAG_ONLINE : _AM_MAG_OFFLINE;
        $sform->addElement( new XoopsFormLabel( _AM_MAG_STATSTATUS, $artstatus ) );
        $sform->display();

        $sql = "SELECT * FROM " . $xoopsDB->prefix( MAG_CHECKIN_DB ) . " WHERE article_id = '" . $article->articleid . "' AND c_out_time > '0' ORDER BY ci_id DESC" ;
        $total_request = $xoopsDB->getRowsNum( $xoopsDB->query( $sql ) );
        $result = $xoopsDB->query( $sql, 10 , $start );

        $heading = array( _AM_MAG_STORYID, _AM_MAG_LASTEDITBY, _AM_MAG_DATEIN, _AM_MAG_DATEOUT );
        echo "<div><h4>" . _AM_MAG_DOCEDITHISTORY . "</h4></div>";
        echo "<table border='0' width='100%' cellpadding ='2' cellspacing='1' class = 'outer'>";
        echo "<tr >";
        for ( $i = 0; $i < count( $heading ); $i++ )
        {
            $aligntype = ( $i == 1 ) ? 'left' : 'center';
            echo "<th align='center'><b>" . $heading[$i] . "</th>";
        } 
        echo "</tr>";

        if ( $result )
        {
            while ( $arr = $xoopsDB->fetchArray( $result ) )
            {
                $article = new MagArticle( $arr['article_id'] );

                echo "<tr>";
                echo "<td class = \"head\" align = \"center\">" . $arr['ci_id'] . "</td>"; 
                // echo "<td class = \"even\" align = \"center\">" . $article->admintextLink("S") . "</td>";
                echo "<td class = \"even\" align = \"center\">" . MAG_getLinkedUnameFromId( $arr['user_id'], '' ) . "</td>";
                echo "<td  class = \"even\" align = \"center\" nowrap>" . formatTimestamp( $arr['c_in_time'], "d-M-Y h:m a" ) . "</td>\n";
                if ( $arr['c_in_time'] > 0 )
                {
                    echo "<td  class = \"even\" align = \"center\" nowrap>" . formatTimestamp( $arr['c_out_time'], "d-M-Y h:m a" ) . "</td>\n";
                } 
                else
                {
                    echo "<td  class = \"even\" align = \"center\" nowrap>" . _AM_MAG_STILLEDITING . "</td>\n";
                } 
                echo "</tr>";
            } 
        } 
        else
        {
            echo "<tr>\n";
            echo "<td colspan =\"7\" class = \"head\" align = \"center\">" . _AM_MAG_NOARTICLEFOUND . "</td>\n";
            echo "</tr>\n";
        } 
        echo "</table>";
        /**
         * show page navigation
         */
        if ( $total_request > 10 )
        {
            include XOOPS_ROOT_PATH . '/class/pagenav.php';
            $pagenav = new XoopsPageNav( $total_request, 10, $start, 'start', "op=stats&articleid=" . $article->articleid . "" );
            $page = ( $total_request > 10 ) ? _AM_MAG_MINDEX_PAGE : '';
            echo "<div align='right' style='padding: 8px;'>" . $page . '' . $pagenav->renderSelect() . '</div>';
        } 
        break;

    /**
     * Display articles
     */
    case "allarticles":
    case "default":

    default: 
        // Get status of document
        checkout( 0 );

        $action = ( isset( $action ) && trim( $action ) ) ? $action : 'all';

        $action_value = array( 'all', 'published', 'autoart', 'submitted',
            'online', 'offline', 'expired', 'autoexpire',
            'noshowart', 'ishtml' );

        $action_title = array( 
            _AM_MAG_ALLARTICLES, _AM_MAG_PUBLARTICLES, _AM_MAG_AUTOARTICLES, _AM_MAG_SUBLARTICLES,
            _AM_MAG_ONLINARTICLES, _AM_MAG_OFFLIARTICLES, _AM_MAG_EXPIREDARTICLES, _AM_MAG_AUTOEXPIREARTICLES,
            _AM_MAG_NOSHOWARTICLES, _AM_MAG_HTMLFILES );

        $action_head = array( 
            _AM_MAG_ALLTXTHEAD, _AM_MAG_PUBLISHEDTXTHEAD, _AM_MAG_AUTOTXTHEAD, _AM_MAG_SUBMITTEDTXTHEAD,
            _AM_MAG_ONLINETXTHEAD, _AM_MAG_OFFLINETXTHEAD, _AM_MAG_EXPIREDTXTHEAD, _AM_MAG_AUTOEXPIRETXTHEAD,
            _AM_MAG_NOSHOWTXTHEAD, _AM_MAG_HTMLFILESTXTHEAD );

        $action_info = array( 
            _AM_MAG_ALLTXT, _AM_MAG_PUBLISHEDTXT, _AM_MAG_SUBMITTEDTXT, _AM_MAG_AUTOTXT,
            _AM_MAG_ONLINETXT, _AM_MAG_OFFLINETXT, _AM_MAG_EXPIREDTXT, _AM_MAG_AUTOEXPIRETXT,
            _AM_MAG_NOSHOWTXT, _AM_MAG_HTMLFILESTXT );

        $action_datatype = array( 
            _AM_MAG_PUBLISHED, _AM_MAG_PUBLISHED, _AM_MAG_PUBLISHED, _AM_MAG_SUBMITTED,
            _AM_MAG_CREATED, _AM_MAG_CREATED, _AM_MAG_EXPIRED, _AM_MAG_EXPIRED,
            _AM_MAG_CREATED, _AM_MAG_CREATED );

        for( $i = 0;$i < count( $action_value );$i++ )
        {
            $actions[$action_value[$i]] = array( 'title' => $action_title[$i],
                'head' => $action_head[$i],
                'info' => $action_info[$i],
                'head' => $action_head[$i],
                'datatype' => $action_datatype[$i], 
                );
        } 

        $cattree = new XoopsTree( $xoopsDB->prefix( MAG_CATEGORY_DB ), "id", "pid" );

        $article = MagArticle::getAllArticle( $xoopsModuleConfig['lastart'], $start, $action, $category, $user, $orderby );
        $scount = count( $article );
        $totalcount = count( MagArticle::getAllArticle( 0, 0, $action, $category, $user ) );

        $edit_count = $xoopsDB->query( "SELECT COUNT(*) FROM " . $xoopsDB->prefix( MAG_CHECKIN_DB ) . " WHERE c_out_time = '0'" );
        list( $edited_count ) = $xoopsDB->fetchRow( $edit_count );

        $mod_requests = $xoopsDB->query( "SELECT COUNT(*) FROM " . $xoopsDB->prefix( MAG_ARTICLE_MOD_DB ) . "" );
        list( $modrequests ) = $xoopsDB->fetchRow( $mod_requests );

        $submitted_count = count( MagArticle::getAllArticle( 0, 0, 'submitted' ) );
        $published_count = count( MagArticle::getAllArticle( 0, 0, 'published' ) );

        $broken_count = $xoopsDB->query( "SELECT COUNT(*) FROM " . $xoopsDB->prefix( MAG_BROKEN_DB ) . "" );
        list( $brokencount ) = $xoopsDB->fetchRow( $broken_count );

        $section_count = $xoopsDB->query( "SELECT COUNT(*) FROM " . $xoopsDB->prefix( MAG_CATEGORY_DB ) . "" );
        list( $sectioncount ) = $xoopsDB->fetchRow( $section_count );

        $helpheading = array( _AM_MAG_PUBLISHEDTXTHEAD, _AM_MAG_SUBMITTEDTXTHEAD, _AM_MAG_ALLTXTHEAD, _AM_MAG_ONLINETXTHEAD,
            _AM_MAG_OFFLINETXTHEAD, _AM_MAG_AUTOEXPIRETXTHEAD, _AM_MAG_EXPIREDTXTHEAD, _AM_MAG_AUTOTXTHEAD, _AM_MAG_NOSHOWTXTHEAD,
            _AM_MAG_HTMLFILESTXTHEAD );
        $helptext = array( _AM_MAG_PUBLISHEDTXT, _AM_MAG_SUBMITTEDTXT, _AM_MAG_ALLTXT, _AM_MAG_ONLINETXT, _AM_MAG_OFFLINETXT, _AM_MAG_AUTOEXPIRETXT, _AM_MAG_EXPIREDTXT, _AM_MAG_AUTOTXT, _AM_MAG_NOSHOWTXT, _AM_MAG_HTMLFILESTXT );
        $datatype = array( _AM_MAG_PUBLISHED, _AM_MAG_SUBMITTED2, _AM_MAG_CREATED, _AM_MAG_CREATED, _AM_MAG_CREATED, _AM_MAG_EXPIRED, _AM_MAG_PUBLISHEDON, _AM_MAG_EXPARTS, _AM_MAG_CREATED, _AM_MAG_CREATED );
        
		$heading = array( _AM_MAG_STORYID, _AM_MAG_TITLE, _AM_MAG_POSTER, _AM_MAG_VERSION, $actions[$action]['datatype'], _AM_MAG_SECTION, _AM_MAG_STATUS, _AM_MAG_WEIGHT, _AM_MAG_ACTION );

        xoops_cp_header();
        mag_admin_menu( _AM_MAG_ARTICLEMANAGEMENT );

        echo "<fieldset><legend style='font-weight: bold; color: #900;'>" . _AM_MAG_SUMMARYINFO1 . "</legend>";
        echo "<div style='padding: 8px;'>";
        echo "<a href='category.php'>" . _AM_MAG_SUMMARYINFO2 . "</a>: <b>" . $sectioncount . "</b> | ";
        echo "<a href='allarticles.php'>" . _AM_MAG_SUMMARYINFO3 . "</a>: <b>" . $published_count . "</b> | ";
        echo "<a href='allarticles.php?action=submitted'>" . _AM_MAG_SUMMARYINFO4 . "</a>: <b>" . $submitted_count . "</b> | ";
        echo "<a href='modified.php'>" . _AM_MAG_SUMMARYINFO5 . "</a>: <b>" . $modrequests . "</b> | ";
        echo "<a href='allarticles.php?op=edit_docs'>" . _AM_MAG_SUMMARYINFO6 . "</a>: <b>" . $edited_count . "</b> | ";
        echo "<a href='brokendown.php'>" . _AM_MAG_SUMMARYINFO7 . "</a>: <b>" . $brokencount . "</b>";
        echo "</div></fieldset><br />";

        echo "<h4>" . _AM_MAG_DOC_SELECTION . "</h4>";
        echo "<table width='100%' border='0' cellpadding ='2' cellspacing='1' class='outer'>";
        echo "<tr><td class='even'>";
        echo "" . _AM_MAG_LIST . "";
        MagArticle::articleselection( $action, $category, $actions );
        echo " " . _AM_MAG_LISTINCAT . " ";
        $cattree->makeMySelBox( "title", "title", $category , 1, 0, "location.href=\"allarticles.php?action=" . $action . "&category=\"+this.options[this.selectedIndex].value" );
	    echo "</td></tr></table><br />";

        mag_textinfo( $actions[$action]['head'], $actions[$action]['info'] );

        echo "<table border='0' width='100%' cellpadding ='2' cellspacing='1' class = 'outer'>";
        echo "<tr >";
        for ( $i = 0; $i < count( $heading ); $i++ )
        {
            $aligntype = ( $i == 1 ) ? 'left' : 'center';
            echo "<th align='$aligntype'><b>" . $heading[$i] . "</th>";
        } 
        echo "</tr>";

        /**
         * List documents
         */
        $admin_icons = "";
        if ( count( $article ) == '0' )
        {
            echo "<tr ><td align='center' colspan ='11' class = 'head'><b>" . _AM_MAG_NOARTICLEFOUND . "</b></td></tr>";
        } 
        else
        {
            for ( $i = 0; $i < count( $article ); $i++ )
            {
                switch ( trim( $action ) )
                {
                    case "submitted":
                        $date = ( $article[$i]->published() == 0 ) ? formatTimestamp( $article[$i]->created(), "s" ) : "" . _AM_MAG_NOTPUBLISHED . "";
                        break;
                    case "published":
                    default:
                        $date = ( $article[$i]->published() > 0 ) ? formatTimestamp( $article[$i]->published(), "s" ) : "" . _AM_MAG_NOTPUBLISHED . "";
                        break;
                    case "created":
                        $date = ( $article[$i]->created() > 0 ) ? formatTimestamp( $article[$i]->created(), "s" ) : "" . _AM_MAG_NOTPUBLISHED . "";
                        break;
                    case "autoart":
                        $date = ( $article[$i]->published() >= time() ) ? formatTimestamp( $article[$i]->published(), "s" ) : "" . _AM_MAG_NOTPUBLISHED . "";
                        break;
                    case "autoexpire":
                        $date = ( $article[$i]->expired() > time() ) ? formatTimestamp( $article[$i]->expired(), "s" ) : " ----- ";
                        break;
                    case "expired":
                        $date = ( $article[$i]->expired() < time() ) ? formatTimestamp( $article[$i]->expired(), "s" ) : " ----- ";
                        break;
                } 

                $status = ( $article[$i]->offline == 0 ) ? $online : $offline;
                echo "<tr>";
                echo "<td align='center' class = 'head'>" . $article[$i]->articleid() . "</td>";
                echo "<td align='left' class = 'even'>" . $article[$i]->admintextLink() . "</td>";
                echo "</td><td align='center' class = 'even'>" . $article[$i]->uname() . "</td>";
                echo "</td><td align='center' class = 'even'>" . $article[$i]->version() . "</td>";
                echo "</td><td align='center' class='even'>" . $date . "</td>";
                echo "</td><td align='left' class='even' nowrap>" . $article[$i]->category->textLink() . "</td>";
                echo "</td><td align='center' class='even'>" . $status . "</td>";
                echo "</td><td align='center' class='even'>" . $article[$i]->weight() . "</td>";

                //$approve_icon = ( $article[$i]->published() == 0 && accessadmin( "docapprove", 1, $article[$i]->articleid ) ) ? $approve : "";
                $approve_icon = $article[$i]->published() == 0 ? $approve : "";
                $edit_icon = $editimg;
                $sql = "SELECT COUNT(*) FROM " . $xoopsDB->prefix( MAG_CHECKIN_DB ) . " WHERE c_out_time = '0' AND article_id ='" . $article[$i]->articleid . "'";
                list( $c_out_time ) = $xoopsDB->fetchRow( $xoopsDB->query( $sql ) );
                if ( $c_out_time > 0 ) $edit_icon = $editingimg;
                	$admin_icons = "<a href='index.php?op=approve&articleid=" . $article[$i]->articleid() . "'>$approve_icon</a>";
					$admin_icons .= "<a href='index.php?op=edit&articleid=" . $article[$i]->articleid() . "'>$edit_icon</a>";    
				    $admin_icons .= "<a href='index.php?op=delete&articleid=" . $article[$i]->articleid() . "'>$deleteimg</a>"; 
					$admin_icons .= "<a href='allarticles.php?op=stats&articleid=" . $article[$i]->articleid() . "'>$statsimg</a>";
                echo "</td><td align='center' class='even'>" . $admin_icons . "</td>";
                echo "</tr>";
            } 
        } 
        echo "</table><br />";
        /**
         * show page navigation
         */
        if ( $totalcount > $scount )
        {
            include_once XOOPS_ROOT_PATH . '/class/pagenav.php';
            $pagenav = new XoopsPageNav( $totalcount, $xoopsModuleConfig['lastart'], $start, 'start', "lastarts=$scount&action=$action&category=$category&user=$user" );
            echo "<div style='text-align: right;' >" . $pagenav->renderNav() . "</div><br />";
        } 
} 
xoops_cp_footer();

?>

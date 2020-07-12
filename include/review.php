<?php
// $Id: review.php,v 1.6 2005/02/07 01:25:26 phppp Exp $
//  ------------------------------------------------------------------------ //
//                        WF-section for XOOPS                               //
//                 Copyright (c) 2005 WF-section Team                        //
//                    <http://www.wf-projects.com/>                          //
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
// Author: WF-section Team                                                   //
// URL: http://www.wf-projects.com                                           //
// Project: WF-section Project                                               //
// ------------------------------------------------------------------------- //


/**
 * Get reviews for document
 */
$sql = "SELECT * FROM " . $xoopsDB->prefix(MAG_REVIEWS) . " WHERE article_id = $article_id";
$review_arr = $xoopsDB->fetchArray($xoopsDB->query($sql));

if (is_array($review_arr))
{
	if ($review_arr['display'] == 1)
    {
        $diff_array = array('None', 'Easy', 'Medium', 'Hard');
        $online_array = array('No', 'Yes');

        $review['publisher'] = $myts->htmlSpecialChars($myts->stripSlashesGPC($review_arr['publisher']));
        $review['developer'] = $myts->htmlSpecialChars($myts->stripSlashesGPC($review_arr['developer']));
        $review['website'] = $myts->makeClickable($myts->stripSlashesGPC($review_arr['website']));
        $review['platform'] = $myts->htmlSpecialChars($myts->stripSlashesGPC($review_arr['platform']));
        $review['difficulty'] = $diff_array[intval($review_arr['difficulty'])];
        $review['released'] = $myts->htmlSpecialChars($myts->stripSlashesGPC($review_arr['released']));
        $review['genre'] = $myts->htmlSpecialChars($myts->stripSlashesGPC($review_arr['genre']));
        $review['players'] = $myts->htmlSpecialChars($myts->stripSlashesGPC($review_arr['players']));
        $review['playonline'] = $online_array[intval($review_arr['playonline'])];
        $review['family'] = $myts->htmlSpecialChars($myts->stripSlashesGPC($review_arr['family']));
        $review['curve'] = $myts->htmlSpecialChars($myts->stripSlashesGPC($review_arr['curve']));

        $rating = round(number_format($review_arr['graphics'], 0) / 2);
        $review['graphics'] = "rate$rating.gif";
        $rating = round(number_format($review_arr['sound'], 0) / 2);
        $review['sound'] = "rate$rating.gif";
        $rating = round(number_format($review_arr['gameplay'], 0) / 2);
        $review['gameplay'] = "rate$rating.gif";
        $rating = round(number_format($review_arr['concept'], 0) / 2);
        $review['concept'] = "rate$rating.gif";
        $rating = round(number_format($review_arr['value'], 0) / 2);
        $review['value'] = "rate$rating.gif";
        $rating = round(number_format($review_arr['tilt'], 0) / 2);
        $review['tilt'] = "rate$rating.gif";
        $review['overall'] = ($review_arr['graphics'] + $review_arr['sound'] + $review_arr['gameplay'] + $review_arr['concept'] + $review_arr['value']);
        $review['conclusion'] = $myts->htmlSpecialChars($myts->stripSlashesGPC($review_arr['conclusion']));
        $review['display'] = intval($review_arr['display']);

        $xoopsTpl->assign('lang_publisher', _MAG_PUBLISHER);
        $xoopsTpl->assign('lang_developer', _MAG_DEVELOPER);
        $xoopsTpl->assign('lang_website', _MAG_WEBSITE);
        $xoopsTpl->assign('lang_platform', _MAG_PLATFORM);
        $xoopsTpl->assign('lang_difficult', _MAG_DIFFICULTY);
        $xoopsTpl->assign('lang_released', _MAG_RELEASED);
        $xoopsTpl->assign('lang_genre', _MAG_GENRE);
        $xoopsTpl->assign('lang_players', _MAG_PLAYERS);
        $xoopsTpl->assign('lang_playonline', _MAG_PLAYONLINE);
        $xoopsTpl->assign('lang_esrb', _MAG_ESRB);
        $xoopsTpl->assign('lang_learningcurve', _MAG_LEARNINGCURVE);
        $xoopsTpl->assign('lang_sound', _MAG_SOUND);
        $xoopsTpl->assign('lang_gameplay', _MAG_GAMEPLAY);
        $xoopsTpl->assign('lang_concept', _MAG_CONCEPT);
        $xoopsTpl->assign('lang_value', _MAG_VALUE);
        $xoopsTpl->assign('lang_tilt', _MAG_TILT);
        $xoopsTpl->assign('lang_overall', _MAG_OVERALL);
        $xoopsTpl->assign('lang_conclusion', _MAG_CONCLUSION);
        $xoopsTpl->assign('reviews', $review);
    }
}
// REMOVED 
 
?>

<?php
// $Id: admin.php,v 1.7 2005/02/07 01:25:24 phppp Exp $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
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
// Author: Kazumi Ono (AKA onokazu)                                          //
// URL: http://www.myweb.ne.jp/, http://www.xoops.org/, http://jp.xoops.org/ //
// Project: The XOOPS Project                                                //
// ------------------------------------------------------------------------- //

if (isset($HTTP_POST_VARS['fct'])) {
	$fct = trim($HTTP_POST_VARS['fct']);
}
if (isset($HTTP_GET_VARS['fct'])) {
	$fct = trim($HTTP_GET_VARS['fct']);
}

if (empty($fct)) $fct = 'preferences' ;
include "../../../mainfile.php";
include XOOPS_ROOT_PATH."/include/cp_functions.php";

if ( file_exists(XOOPS_ROOT_PATH."/modules/system/language/".$xoopsConfig['language']."/admin.php") ) {
	include XOOPS_ROOT_PATH."/modules/system/language/".$xoopsConfig['language']."/admin.php";
} else {
	include XOOPS_ROOT_PATH."/modules/system/language/english/admin.php";
}

include_once XOOPS_ROOT_PATH."/class/xoopsmodule.php";

if (is_object($xoopsUser)) {
	$xoopsModule =& XoopsModule::getByDirname("system");
	if ( !$xoopsUser->isAdmin($xoopsModule->mid()) ) {
		redirect_header(XOOPS_URL.'/user.php',3,_NOPERM);
		exit();
	}
	$admintest=1;
} else {
	redirect_header(XOOPS_URL.'/user.php',3,_NOPERM);
	exit();
}

// include system category definitions
include_once XOOPS_ROOT_PATH."/modules/system/constants.php";
$error = false;
if ($admintest != 0) {
	if (isset($fct) && $fct != '') {
		if (file_exists(XOOPS_ROOT_PATH."/modules/system/admin/".$fct."/xoops_version.php")) {
		
			if (file_exists(XOOPS_ROOT_PATH."/modules/system/language/".$xoopsConfig['language']."/admin/".$fct.".php")) {
				include XOOPS_ROOT_PATH."/modules/system/language/".$xoopsConfig['language']."/admin/".$fct.".php";
			} elseif (file_exists(XOOPS_ROOT_PATH."/modules/system/language/english/admin/".$fct.".php")) {
				include XOOPS_ROOT_PATH."/modules/system/language/english/admin/".$fct.".php";
			}
			include XOOPS_ROOT_PATH."/modules/system/admin/".$fct."/xoops_version.php";
			$sysperm_handler =& xoops_gethandler('groupperm');
			$category = !empty($modversion['category']) ? intval($modversion['category']) : 0;
			unset($modversion);
			if ($category > 0) {
				$groups =& $xoopsUser->getGroups();
				if (in_array(XOOPS_GROUP_ADMIN, $groups) || false != $sysperm_handler->checkRight('system_admin', $category, $groups, $xoopsModule->getVar('mid'))){
					if (file_exists("../include/{$fct}.inc.php")) {
						include_once "../include/{$fct}.inc.php" ;
					} else {
						$error = true;
					}
				} else {
					$error = true;
				}
			} elseif ($fct == 'version') {
				if (file_exists(XOOPS_ROOT_PATH."/modules/system/admin/version/main.php")) {
					include_once XOOPS_ROOT_PATH."/modules/system/admin/version/main.php";
				} else {
					$error = true;
				}
			} else {
				$error = true;
			}
		} else {
			$error = true;
		}
	} else {
		$error = true;
	}
}
?>
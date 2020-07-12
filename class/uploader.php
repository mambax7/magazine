<?php
// $Id: uploader.php,v 1.8 2005/02/21 15:51:58 phppp Exp $
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
/**
 * !
 * Example
 * 
 * include_once 'uploader.php';
 * $allowed_mimetypes = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/x-png');
 * $maxfilesize = 50000;
 * $maxfilewidth = 120;
 * $maxfileheight = 120;
 * $uploader = new XoopsMediaUploader('/home/xoops/uploads', $allowed_mimetypes, $maxfilesize, $maxfilewidth, $maxfileheight);
 * if ($uploader->fetchMedia($HTTP_POST_VARS['uploade_file_name'])) {
 * if (!$uploader->upload()) {
 * echo $uploader->getErrors();
 * } else {
 * echo '<h4>File uploaded successfully!</h4>'
 * echo 'Saved as: ' . $uploader->getSavedFileName() . '<br />';
 * echo 'Full path: ' . $uploader->getSavedDestination();
 * }
 * } else {
 * echo $uploader->getErrors();
 * }
 */

/**
 * Upload Media files
 * 
 * Example of usage:
 * <code>
 * include_once 'uploader.php';
 * $allowed_mimetypes = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/x-png');
 * $maxfilesize = 50000;
 * $maxfilewidth = 120;
 * $maxfileheight = 120;
 * $uploader = new XoopsMediaUploader('/home/xoops/uploads', $allowed_mimetypes, $maxfilesize, $maxfilewidth, $maxfileheight);
 * if ($uploader->fetchMedia($HTTP_POST_VARS['uploade_file_name'])) {
 *               if (!$uploader->upload()) {
 *                  echo $uploader->getErrors();
 *               } else {
 *                  echo '<h4>File uploaded successfully!</h4>'
 *                  echo 'Saved as: ' . $uploader->getSavedFileName() . '<br />';
 *                  echo 'Full path: ' . $uploader->getSavedDestination();
 *               }
 * } else {
 *               echo $uploader->getErrors();
 * 
 * }
 * </code>
 * 
 * @package kernel
 * @subpackage core
 * @author Kazumi Ono <onokazu@xoops.org> 
 * @copyright (c) 2000-2003 The Xoops Project - www.xoops.org
 */
mt_srand( ( double ) microtime() * 1000000 );

class WFUploader
{
    var $mediaName;
    var $mediaType;
    var $mediaSize;
    var $mediaTmpName;
    var $mediaError;
    var $uploadDir = '';
    var $allowedMimeTypes = array();
    var $maxFileSize = 0;
    var $maxWidth;
    var $maxHeight;
    var $targetFileName;
    var $prefix;
    var $ext = "";
    var $dimension;
    var $errors = array();

    var $savedDestination;
    var $savedFileName;

    var $noImageSizeCheck = true;
    var $noFileSizeCheck = true;
    /**
     * No admin check for uploads
     */
    var $noadmin_sizecheck;

    var $upload_image;
    /**
     * Constructor
     * 
     * @param string $uploadDir 
     * @param array $allowedMimeTypes 
     * @param int $maxFileSize 
     * @param int $maxWidth 
     * @param int $maxHeight 
     * @param int $cmodvalue 
     */
    function WFUploader( $uploadDir, $allowedMimeTypes = 0, $maxFileSize, $maxWidth = 0, $maxHeight = 0 )
    {
        if ( is_array( $allowedMimeTypes ) )
        {
            $this->allowedMimeTypes = &$allowedMimeTypes;
        } 
        $this->uploadDir = ( !empty( $uploadDir ) ) ? $uploadDir : XOOPS_UPLOAD_PATH;
        $this->maxFileSize = intval( $maxFileSize );
        if ( isset( $maxWidth ) )
        {
            $this->maxWidth = intval( $maxWidth );
        } 
        if ( isset( $maxHeight ) )
        {
            $this->maxHeight = intval( $maxHeight );
        } 
    } 

    /**
     * Fetch the uploaded file
     * 
     * @param string $media_name Name of the file field
     * @param int $index Index of the file (if more than one uploaded under that name)
     * @global $HTTP_POST_FILES
     * @return bool 
     */
    function fetchMedia( $media_name, $index = null )
    {
        global $_FILES;

        if ( !isset( $_FILES[$media_name] ) )
        {
            $this->setErrors( 'You either did not choose a file to upload or the server has insufficient read/writes to upload this file.!' );
            return false;
        } elseif ( is_array( $_FILES[$media_name]['name'] ) && isset( $index ) )
        {
            $index = intval( $index );
            $this->mediaName = $_FILES[$media_name]['name'][$index];
            $this->mediaType = $_FILES[$media_name]['type'][$index];
            $this->mediaSize = $_FILES[$media_name]['size'][$index];
            $this->mediaTmpName = $_FILES[$media_name]['tmp_name'][$index];
            $this->mediaError = !empty( $_FILES[$media_name]['error'][$index] ) ? $_FILES[$media_name]['errir'][$index] : 0;
        } 
        else
        {
            $media_name = @$_FILES[$media_name];
            $this->mediaName = $media_name['name'];
            $this->mediaName = $media_name['name'];
            $this->mediaType = $media_name['type'];
            $this->mediaSize = $media_name['size'];
            $this->mediaTmpName = $media_name['tmp_name'];
            $this->mediaError = !empty( $media_name['error'] ) ? $media_name['error'] : 0;
        } 
        $this->dimension = getimagesize( $this->mediaTmpName );
        $this->errors = array();
        if ( intval( $this->mediaSize ) < 0 )
        {
            $this->setErrors( '錯誤︰無效的檔案大小' );
            return false;
        } 
        if ( $this->mediaName == '' )
        {
            $this->setErrors( '錯誤︰請輸入檔案名稱' );
            return false;
        } 
        if ( $this->mediaTmpName == 'none' )
        {
            $this->setErrors( '錯誤︰檔案上傳失敗' );
            return false;
        } 

        if ( !is_uploaded_file( $this->mediaTmpName ) )
        {
			$savedFileName=basename($this->mediaName);
            switch ( $this->mediaError )
            {
                case 0: // no error; possible file attack!
                    $this->setErrors( '上傳時發生錯誤. Error: 0' );
                    break;
                case 1: // uploaded file exceeds the upload_max_filesize directive in php.ini
                    $this->setErrors( '上傳的檔案大小超過限制. Error: 1' );
                    break;
                case 2: // uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the html form
                    $this->setErrors( '上傳的檔案大小超過限制. Error: 2' );
                    break;
                case 3: // uploaded file was only partially uploaded
                    $this->setErrors( '上傳的檔案已經存在. Error: 3' );
                    break;
                case 4: // no file was uploaded
                    $this->setErrors( '沒有選擇要上傳的檔案. Error: 4' );
                    break;
                default: // a default error, just in case!  :)
                    $this->setErrors( '沒有選擇要上傳的檔案. Error: 5' );
                    break;
            } 
            return false;
        } 
        return true;
    } 

    /**
     * Set the target filename
     * 
     * @param string $value 
     */
    function setTargetFileName( $value )
    {
        $this->targetFileName = strval( trim( $value ) );
    } 

    /**
     * Set the prefix
     * 
     * @param string $value 
     */
    function setPrefix( $value )
    {
        $value = strval( trim( $value ) );
        $value = ( $value ) ? $value : 'mag_';
        $this->prefix = strval( trim( $value ) );
	//echo $this->prefix;  // jsliu 051108 
    } 

    function setImageupload( $value )
    {
        $this->upload_image = intval( $value );
    } 

    /**
     * Set the imageSizeCheck
     * 
     * @param string $value 
     */
    function setNoImageSizeCheck( $value )
    {
        $this->noImageSizeCheck = $value;
    } 

    /**
     * Set the fileSizeCheck
     * 
     * @param string $value 
     */
    function setNoFileSizeCheck( $value )
    {
        $this->noFileSizeCheck = $value;
    } 

    /**
     * Get the uploaded filename
     * 
     * @return string 
     */
    function getMediaName()
    {
        return $this->mediaName;
    } 

    /**
     * Get the type of the uploaded file
     * 
     * @return string 
     */
    function getMediaType()
    {
        return $this->mediaType;
    } 

    /**
     * Get the size of the uploaded file
     * 
     * @return int 
     */
    function getMediaSize()
    {
        return $this->mediaSize;
    } 

    /**
     * Get the temporary name that the uploaded file was stored under
     * 
     * @return string 
     */
    function getMediaTmpName()
    {
        return $this->mediaTmpName;
    } 

    /**
     * Get the saved filename
     * 
     * @return string 
     */
    function getSavedFileName()
    {
        return $this->savedFileName;
    } 

    /**
     * Get the destination the file is saved to
     * 
     * @return string 
     */
    function getSavedDestination()
    {
        return $this->savedDestination;
    } 

    /**
     * Get the file extension
     * 
     * @return string 
     */
    function getExt()
    {
        $this->ext = ltrim( strrchr( $this->mediaName, '.' ), '.' );
        return $this->ext;
    } 
    /**
     * Check the file and copy it to the destination
     * 
     * @return bool 
     */
    function upload( $chmod = 0644 )
    {
        if ( $this->uploadDir == '' )
        {
            $this->setErrors( '上傳目錄的權限請修改為 0777' );
            return false;
        } 

        if ( !is_dir( $this->uploadDir ) )
        {
            $this->setErrors( '無法正確的找到資料夾所在路徑: ' . $this->uploadDir );
        } 

        if ( !is_writeable( $this->uploadDir ) )
        {
            $this->setErrors( '沒有足夠的權限寫入上傳目錄: ' . $this->uploadDir );
        } 

        if ( !$this->checkMaxFileSize() )
        {
            $this->setErrors( sprintf( '檔案大小: %u. 允許最大的檔案大小為: %u' , $this->mediaSize, $this->maxFileSize ) );
        } 

        if ( is_array( $this->dimension ) )
        {
            if ( !$this->checkMaxWidth( $this->dimension[0] ) )
            {
                $this->setErrors( sprintf( '檔案寬度: %u. 允許最大的檔案寬度為: %u', $this->dimension[0], $this->maxWidth ) );
            } 
            if ( !$this->checkMaxHeight( $this->dimension[1] ) )
            {
                $this->setErrors( sprintf( '檔案長度: %u. 允許最大的檔案長度為: %u', $this->dimension[1], $this->maxHeight ) );
            } 
        } 

        if ( !$this->checkMimeType() )
        {
            $this->setErrors( 'MIME 類型不被允許: ' . $this->mediaType );
        } 

        if ( !$this->_copyFile( $chmod ) )
        {
            $this->setErrors( '上傳檔案失敗: ' . $this->mediaName );
        } 

        if ( count( $this->errors ) > 0 )
        {
            return false;
        } 
        return true;
    } 

    /**
     * Copy the file to its destination
     * 
     * @return bool 
     */
    function _copyFile( $chmod )
    {
        $matched = array();
       
	    if ( !preg_match( "/\.([a-zA-Z0-9]+)$/", $this->mediaName, $matched ) )
            return false;

        if ( $this->upload_image )
            $this->savedFileName = $this->doUploadToRandumFile( 1 );
        else
            $this->savedFileName = $this->mediaName;

        if ( $this->prefix )		
			$this->savedFileName = $this->prefix.".".$this->mediaName;
		
        $this->savedFileName = preg_replace( '!\s+!', '_', $this->savedFileName );
        $this->savedDestination = $this->uploadDir . "/" . $this->savedFileName;

        if ( is_file( $this->savedDestination ) && !!is_dir( $this->savedDestination ) )
        {
            $this->setErrors( '檔案 ' . $this->mediaName . ' 已經存在於伺服器中. 請先將檔案重新命名再做上傳.<br />' );
            return false;
        } 
        if ( !move_uploaded_file( $this->mediaTmpName, $this->savedDestination ) )
            return false;
 
        @chmod( $this->savedDestination, $chmod );
        return true;
    } 

    /**
     * Is the file the right size?
     * 
     * @return bool 
     */
    function checkMaxFileSize()
    {
        if ( $this->noFileSizeCheck )
        {
            return true;
        } 
        if ( $this->mediaSize > $this->maxFileSize )
        {
            return false;
        } 
        return true;
    } 

    /**
     * Is the picture the right width?
     * 
     * @return bool 
     */
    function checkMaxWidth( $dimension )
    {
        if ( !isset( $this->maxWidth ) || $this->noImageSizeCheck )
        {
            return true;
        } 
        if ( $dimension > $this->maxWidth )
        {
            return false;
        } 
        return true;
    } 

    /**
     * Is the picture the right height?
     * 
     * @return bool 
     */
    function checkMaxHeight( $dimension )
    {
        if ( !isset( $this->maxHeight ) || $this->noImageSizeCheck )
        {
            return true;
        } 
        if ( $dimension > $this->maxWidth )
        {
            return false;
        } 
        return true;
    } 

    /**
     * Is the file the right Mime type 
     * 
     * (is there a right type of mime? ;-)
     * 
     * @return bool 
     */
    function checkMimeType()
    {
        if ( count( $this->allowedMimeTypes ) > 0 && !in_array( $this->mediaType, $this->allowedMimeTypes ) )
        {
            return false;
        } 
        else
        {
            return true;
        } 
    } 

    /**
     * Add an error
     * 
     * @param string $error 
     */
    function setErrors( $error )
    {
        $this->errors[] = trim( $error );
    } 

    /**
     * Get generated errors
     * 
     * @param bool $ashtml Format using HTML?
     * @return array |string    Array of array messages OR HTML string
     */
    function &getErrors( $ashtml = true )
    {
        if ( !$ashtml )
        {
            return $this->errors;
        } 
        else
        {
            $ret = '';
            if ( count( $this->errors ) > 0 )
            {
                $ret = '<h4>上傳時發生錯誤</h4>';
                foreach ( $this->errors as $error )
                {
                    $ret .= $error . '<br />';
                } 
            } 
            return $ret;
        } 
    } 
    /**
     * UploadFile::doUploadToRandumFile()
     * 
     * @param  $distpath 
     * @param string $prefix 
     * @return 
     */
    function &doUploadToRandumFile( $addext = 1 )
    {
        $temp_filename = $this->prefix . mt_rand( 100000, 999999 );
        $temp_filename = ( $addext == 1 ) ? $temp_filename . "." . $this->getExt() : $temp_filename;
        return $temp_filename;
    } 
} 

?>

<?php

use Illuminate\Support\Facades\Auth;

/**
 * XTREMIS INFOTECH
 * ------------------------------------------------------------------------------
 * This file contains functions which are helphul for any project.
 * Add new function here which are mostly used in any project.
 * 
 * @package     Xtremis Infotech Constant Helpers
 * @author      Mahiman Parmar
 * @copyright	Copyright (c) 2021, Xtremis Infotech. (http://xtremis.in)
 * @link        http://xtremis.in
 * @version     1.0
 * 
 * NOTES:
 * - Don't add any function here which have perpose only for perticuler project.
 * - Follow function declaration format while adding any new function.
 * - Don't add function which could cause error for the project.
 * - This file is developed by the Xtremis Infotech Team.
 */


/*
 *---------------------------------------------------------------
 * CONSTANT HELPER FUNCTIONS
 *---------------------------------------------------------------
 */

function XI_ADMIN()
{
    return Auth::guard('admin')->User();
}

/**
 * Returns minimum char limit
 * @param []
 * @return string
 * @author Mahiman Parmar
 */
function getMinCharLimit()
{
    return '3';
}

/**
 * Returns maximum char limit
 * @param []
 * @return string
 * @author Mahiman Parmar
 */
function getMaxCharLimit()
{
    return '250';
}

/**
 * Returns php date formate.
 * @param []
 * @return string
 * @author Mahiman Parmar
 */
function getDatePHP()
{
    return 'd-m-Y';
}

/**
 * Returns PHP datetime formate.
 * @param []
 * @return string
 * @author Mahiman Parmar
 */
function getDateTimePHP()
{
    return 'd-m-Y h:i:s';
}

/**
 * Returns JavaScript date formate.
 * @param []
 * @return string
 * @author Mahiman Parmar
 */
function getDateJS()
{
    return 'dd-mm-yy';
}

/**
 * Returns JavaScript datetime formate.
 * @param []
 * @return string
 * @author Mahiman Parmar
 */
function getDateTimeJS()
{
    return 'dd-mm-yy hh:mm:ss';
}

/**
 * Returns SQL date formate.
 * @param []
 * @return string
 * @author Mahiman Parmar
 */
function getDateSQL()
{
    return '%d-%m-%Y';
}

/**
 * Returns Full date formate for show/display.
 * @param []
 * @return string
 * @author Mahiman Parmar
 */
function getDateToShow()
{
    return 'dd-mm-yyyy';
}

/**
 * Returns unique string of specified length.
 * @param []
 * @return string
 * @author Mahiman Parmar
 */
function getUniqueString($strlen=null)
{
    $uniqeStr = uniqid();
    $uniqeStrLen = strlen($uniqeStr);
    
    if (!empty($strlen) && is_int($strlen) && $strlen < $uniqeStrLen) {
        $uniqeStr = substr($uniqeStr, ($uniqeStrLen - $strlen), $uniqeStrLen);
    }

    return $uniqeStr;
}

/**
 * Returns custom generated unique string.
 * @param []
 * @return string
 * @author Mahiman Parmar
 */
function generateToken()
{
    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $token = '';
    
    for ($i = 0; $i < 6; $i++) {
        $token .= $characters[rand(0, strlen($characters) - 1)];
    }
    
    $token = time().$token.time();
    
    return $token;
}

/**
 * Returns csrf token hidden input field.
 * @param []
 * @return string
 * @author Mahiman Parmar
 */
function generateCsrfTokenInput()
{
    return "<input type='hidden' name='_token' value='".csrf_token()."'>";
}

/**
 * Returns ordinal suffix for given parameter
 * @param int value
 * @return string number with suffix
 * @author Mahiman Parmar
 */
function ordinal($number)
{
    $ends = ['th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th'];
    
    if ((($number % 100) >= 11) && (($number % 100) <= 13)) {
        return $number. 'th';
    } else {
        return $number. $ends[$number % 10];
    }
}

/**
 * Print data in output and based on exit flag terminate the script.
 * @param []
 * @return null
 * @author Mahiman Parmar
 */
function pre($data, $isExit = false)
{
    print_r("<pre>".$data."</pre>");
    
    if (!$isExit) {
        exit;
    }
}

/**
 * Returns client machine's IP Address.
 * @param []
 * @return null
 * @author Mahiman Parmar
 */
function getClientIpAddress() {
    $ipaddress = null;

    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } else if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if(isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    } else if(isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if(isset($_SERVER['HTTP_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    } else if(isset($_SERVER['REMOTE_ADDR'])) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    } else {
        $ipaddress = 'UNKNOWN';
    }

    return $ipaddress;
}

/**
 * Returns unique number of specified length.
 * @param []
 * @return int
 * @author Mahiman Parmar
 */
function generateUniqueNumber($numlen=null)
{
    $uniqeNum = str_replace(".", "", microtime(true));
    $uniqeNumLen = strlen($uniqeNum);

    if (!empty($numlen) && is_int($numlen) && $numlen < $uniqeNumLen) {
        $uniqeNum = substr($uniqeNum, ($uniqeNumLen - $numlen), $uniqeNumLen);
    }

    return (int)$uniqeNum;
}

/**
 * Returns unique password string of specified length.
 * @param []
 * @return string
 * @author Mahiman Parmar
 */
function getRandomPassword($strlen=null)
{
    $passLen = 8;
    if (!empty($numlen) && is_int($numlen)) {
        $passLen = $strlen;
    }

    return getUniqueString($passLen);
}

/**
 * Creates image file from base64 string.
 * @param string base string, string file
 * @return File
 * @author Mahiman Parmar
 */
function BASE64_TO_JPG($base64_string, $File)
{
    if(file_exists($File)) {
        unlink($File);
    }
    
    $ifp = fopen($File, 'wb');
    $data = explode(',', $base64_string);

    fwrite($ifp, base64_decode($data[1]));
    fclose($ifp);

    return $File; 
}

/**
 * Returns JSON Read data.
 * @param File
 * @return string
 * @author Mahiman Parmar
 */
function readJSON($filePath)
{
    $fileContent    = file_get_contents($filePath);
    $resultData     = json_decode($fileContent);

    return $resultData; 
}

/**
 * Return true/false based on value is empty or not.
 * @param Object
 * @return boolean
 * @author Mahiman Parmar
 */
function cEmpty($val)
{
    return !empty($val) ? true : false;
}

/**
 * Return file validation array based on type
 * @param String
 * @return String
 * @author Mahiman Parmar
 */
function getImageFileExt($type="client")
{
    if($type == "client") {
        return 'jpg|jpeg|png|pdf|doc|docx';
    } elseif($type == "server") {
        return 'jpg,jpeg,png,pdf,doc,docx';
    }
}

/**
 * Returns month name of given index and full name flag.
 * @param Integer
 * @param Boolean
 * @return String
 * @author Mahiman Parmar
 */
function getMonthName($key=null, $fullname=true)
{
    $months = [];
    for ($m=1; $m<=12; $m++) {
        $months[] = date((($fullname)?'F':'M'), mktime(0,0,0,$m, 1, date('Y')));
    }

    if($key) {
        if(isset($months[$key])) {
            return $months[$key];
        } else {
            return $key;
        }
    } else {
        return $months;
    }
}

/**
 * Return Days based on the given key
 * @param Integer
 * @return Array/String
 * @author Mahiman Parmar
 */
function getDayName($key=NULL)
{
    $dayNames = ['1' => 'Monday', '2' => 'Tuesday', '3' => 'Wednesday', '4' => 'Thursday', '5' => 'Friday', '6' => 'Saturday', '7' => 'Sunday'];
    
    if(!empty($key)) {
        return $dayNames[$key];
    } else {
        return $dayNames;
    }
}
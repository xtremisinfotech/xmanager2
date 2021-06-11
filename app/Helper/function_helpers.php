<?php

use App\Models\Firms;

/**
 * XTREMIS INFOTECH
 * ------------------------------------------------------------------------------
 * This file contains functions which are helphul for perticular project only.
 * Add new function here which are mostly used in the project itself.
 * 
 * @package     XManager Function Helpers
 * @author      Mahiman Parmar
 * @copyright	Copyright (c) 2021, Xtremis Infotech. (http://xtremis.in)
 * @link        http://xtremis.in
 * @version     1.0
 * 
 * NOTES:
 * - Don't add any function constant here.
 * - Follow function declaration format while adding any new function.
 * - Don't add function which could cause error for the project.
 * - This file is developed by the Xtremis Infotech Team.
 */


/*
 *---------------------------------------------------------------
 * HELPER FUNCTIONS
 *---------------------------------------------------------------
 */

/**
 * Returns minimum char limit
 * @param []
 * @return []
 * @author Mahiman Parmar
 */
function getFirmList()
{
    return Firms::all();
}

function getFirm($id)
{
    return Firms::find($id);
}
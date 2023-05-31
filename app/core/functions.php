<?php
/*
    This file is used to add any custom functions to this framework.
    You are free to delete the ones that have been put in this file if you desire so.
*/
function show($stuff)
{
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
}

function esc($str): string
{
    return htmlspecialchars($str);
}

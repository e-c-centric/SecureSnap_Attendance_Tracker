<?php

function Weekday()
{
    $date = date('Y-m-d');
    $date = strtotime($date);
    $date = date('l', $date);
    return $date;
}

function Hour()
{
    date_default_timezone_set('UTC');

    return date('H');
}

function Minute()
{
    date_default_timezone_set('UTC');

    return date('i');
}

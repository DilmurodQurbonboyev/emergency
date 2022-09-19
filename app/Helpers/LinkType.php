<?php

use Carbon\Carbon;

function hrefType($link_type, $result)
{
    if ($link_type == 1) {
        return '#';
    }
    if ($link_type == 2) {
        return $result;
    }
    if ($link_type == 3) {
        return $result;
    }
    if ($link_type == 4) {
        return $result;
    }
    if ($link_type == 5) {
        return $result;
    }
    return $result;
}

function targetType($link_type)
{
    $result = '';
    $self = '_self';
    $blank = '_blank';

    if ($link_type == 2) {
        $result = $self;
        return $result;
    }
    if ($link_type == 3) {
        $result = $blank;
        return $result;
    }
    if ($link_type == 4) {
        $result = $self;
        return $result;
    }
    if ($link_type == 5) {
        $result = $blank;
        return $result;
    }
    return $result;
}

function displayDateOnly($date)
{
    return Carbon::parse($date)->format('d.m.Y');
}

function displayDateTime($date)
{
    return Carbon::parse($date)->format('d.m.Y H:i');
}

function average($required, $collected)
{
    return round($collected * 100 / $required);
}

function countYearOld($birth_date)
{
    return now()->format('Y') - Carbon::parse($birth_date)->format('Y');
}

function countDiff($last, $current)
{
    return $last > 0 ? round(((100 * $current) / $last) - 100) : 100;
}

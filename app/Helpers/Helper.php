<?php

function setActive($uri, $output = 'active')
{
    if (is_array($uri)) {
        foreach ($uri as $row) {
            if (Route::is($row)) {
                return $output;
            }
        }
    } else {
        if (Route::is($uri)) {
            return $output;
        }
    }
}

function setOpenMenu($uri, $output = 'menu-open')
{
    if (is_array($uri)) {
        foreach ($uri as $row) {
            if (Route::is($row)) {
                return $output;
            }
        }
    } else {
        if (Route::is($uri)) {
            return $output;
        }
    }
}

function setSegment($segment, $output)
{
    if (is_array($segment)) {
        foreach ($segment as $row) {
            if (Request::segment(1) == $row) {
                return $output;
            }
        }
    } else {
        if (Request::segment(1) == $segment) {
            return $output;
        }
    }
}

function rupiah($nominal)
{
    return "Rp. " . number_format($nominal, 0, ',', '.');
}

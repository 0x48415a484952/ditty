<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Lang;

function text_in_url($text) {
    $text = str_replace(['؟', '؛', '-', '/', '\\'], '', $text);
    $text = preg_replace('/\s+/', "-", $text);

    return preg_replace('/[^A-Za-z\s\x{0600}-\x{06FF}0-9‌_-]/u', '', $text);
}

function prettifyString($value, $line_breaks = false){
    if ($value == '') return;
    $value = strip_tags($value);

    if ($line_breaks == true) {
        $value = preg_replace('/[ \t]+/', ' ', preg_replace("/[\n|\n\r|\r]{3,}/", "\n\n", $value));
    } else {
        $value = preg_replace('/\s+/', " ",$value);
    }

    $value = preg_replace("/[^A-Za-z\s\x{0600}-\x{06FF}0-9_‌:\/«+-»?!.()@#$%&*]/u", "", $value);

    return $value;
}

function j_date($item) {
    return jdate($item->created_at)->format('y/m/d H:i');
}

function mb_json_encode($input) {
    return preg_replace_callback('/\\\\u([0-9a-zA-Z]{4})/', function ($matches) {
            return mb_convert_encoding(pack('H*', $matches[1]), 'UTF-8', 'UTF-16');
        },
        json_encode($input, JSON_UNESCAPED_UNICODE)
    );
}

function randomHexCharacters($length) {
    $length = $length > 32 ? 32 : $length;
    return substr(md5(generateRandomCharacters($length)), 0, $length);
}

function toNum($str) {
    return preg_replace('/[^0-9]/', '', $str);
}


function validate_date($date, $is_past = false) {
    $date = explode('/', $date);

    if (count($date) == 3) {
        if (is_valid_id($date[0], 4) && is_valid_id($date[1], 2) && is_valid_id($date[2], 2) &&
            $date[0] >= 1390 && $date[0] <= 1420 &&
            $date[1] >= 1 && $date[1] <= 12 &&
            $date[2] >= 1 && $date[2] <= 31
        ) {
            if ($is_past == false) {
                $expiration_time = new \Carbon\Carbon(implode('-', \Morilog\Jalali\jDateTime::toGregorian($date[0], $date[1], $date[2])). " 23:59:59");
                $now = \Carbon\Carbon::now();

                if ($expiration_time > $now) {
                    return $expiration_time;
                }
            } else {
                return true;
            }
        }
    }
    return false;
}


function jalaliDates($items) {
    foreach($items as $item) {
        $item->time = jdate($item->created_at)->format('y/m/d H:i');
    }

    return $items;
}

function to_gregorian($date, $month = null, $day = null, $hour = null, $minute = null, $second = null) {
    if (is_array($date)) {
        list($year, $month, $day) = $date;
    } else if (is_null($month)) {
        list($year, $month, $day) = explode('/', $date);
    } else $year = $date;
    $gregorian_bd = \Morilog\Jalali\jDateTime::toGregorian($year, $month, $day);

    return \Carbon\Carbon::createSafe($gregorian_bd[0], $gregorian_bd[1], $gregorian_bd[2], $hour, $minute, $second);
}

function get_post_id($id) {
    return \Hashids::connection(\App\Models\Post::class)->decode($id);
}

function p($array) {
    return print_r($array);
}

function pd($array) {
    print_r($array);
    die();
}

function eq() {
    DB::enableQueryLog();
}

function gq() {
    dd(\DB::getQueryLog());
}

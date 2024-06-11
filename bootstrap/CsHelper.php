<?php

use Carbon\Carbon;

class CsHelper
{
    static function data_id()
    {
        $randomString = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 8);
        $new_id = Carbon::now()->format('YmdHis') . '-' . $randomString;
        return $new_id;
    }

    static function stringRandom($jumlahString) {
        $randomString = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'), 0, $jumlahString);
        return $randomString;
    }

    static function api_respons($status_code, $status_string, $data)
    {
        $message = array(
            "status" => $status_code,
            "message" => $status_string,
            "data" => $data
        );
        return response()->json($message);
    }

    static function token()
    {
        $randomString = substr(str_shuffle(md5(microtime())), 0, 6);
        return strtoupper($randomString);
    }

    static function numbering($the_number, $lenght)
    {
        $number = sprintf("%0{$lenght}d", $the_number);
        return $number; 
    }

    static function randomNumber() {
        $randomNumbers = [
            mt_rand(0, 9),
            mt_rand(0, 9),
            mt_rand(0, 9),
        ];
        $random = implode('', $randomNumbers);
        return $random;
    }
}

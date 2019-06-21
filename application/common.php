<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function create_sequence() {
        $suffix = rand(10000000, 99999999);
        $now_time = microtime(true);
        $di_str = strval($now_time);
        $di_arr = explode('.', $di_str);
        $d2 = date('YmdHis');
        if(!is_array($di_arr)){
            $round = rand(0000,9999);
            $number = $d2 .$round . $suffix;
        }else{
            $number = $d2 . $di_arr[1] . $suffix;
        }
        return $number;
    }
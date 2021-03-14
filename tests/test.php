<?php

/*
 * This file is part of the php127/websiteinfo.
 *
 * (c) 读心印 <aa24615@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

require '../vendor/autoload.php';


use Php127\WebsiteInfo;


use Php127\Seek\EmailSeek;

//$str = file_get_contents('tests/file/94sc.txt');
//
//$qq =  EmailSeek::mailto($str);
//
//print_r($qq);
//exit;


$urls = [
    'www.joy127.com',
    'www.baidu.com',
    'www.qq.com',
    "www.94sc.net",
    "www.qadmin.net",
    "www.php.cn",
];

foreach ($urls as $url) {
    echo $url.PHP_EOL;
    $str = file_get_contents('http://'.$url);

    $web = new WebsiteInfo($str);


    $a = $web->get();

    print_r($a);
}

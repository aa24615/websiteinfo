<?php

require '../vendor/autoload.php';


use Php127\WebsiteInfo\WebsiteInfo;


use Php127\WebsiteInfo\Seek\EmailSeek;

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
];

foreach ($urls as $url) {
    echo $url.PHP_EOL;
    $str = file_get_contents('http://'.$url);

    $web = new WebsiteInfo($str);


    $a = $web->get();

    print_r($a);
}

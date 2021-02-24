<?php

/*
 * This file is part of the php127/websiteinfo.
 *
 * (c) 读心印 <aa24615@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Php127\Seek;

/**
 * EmailSeek.
 *
 * @author 读心印 <aa24615@qq.com>
 */

class EmailSeek
{
    /**
     * 通过html获取Email
     *
     * @param string $str
     * @param bool $accurate
     *
     * @return array
     */
    public static function find(string $str, bool $accurate = false)
    {
        $email = [];

        $email = array_merge($email, self::mailto($str));


        if (!$accurate) {
            $email = array_merge($email, self::regular($str));
        }



        return array_unique($email);
    }
    /**
     * @Description 通过html获取Email
     *
     * @Params string $str
     * @Params bool $accurate
     *
     * @return array
     */
    public static function mailto(string $str)
    {
        preg_match_all('/href="mailto:(.*?)"/im', $str, $matches);
        if (isset($matches[1])) {
            return $matches[1];
        }
        return [];
    }

    public static function regular(string $str)
    {
        preg_match_all('/\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}/im', $str, $matches);

        if (isset($matches[0])) {
            return $matches[0];
        }
        return [];
    }
}

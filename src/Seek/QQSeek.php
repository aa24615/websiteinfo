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
 * QQSeek.
 *
 * @author 读心印 <aa24615@qq.com>
 */
class QQSeek
{
    /**
     * 通过html获取QQ号
     *
     * @param string $str
     * @param bool $accurate
     *
     * @return array
     */

    public static function find(string $str, bool $accurate = false)
    {
        $qq = [];

        $qq = array_merge($qq, self::uin($str));

        if (!$accurate) {
            $qq = array_merge($qq, self::initial($str));
        }

        return array_unique($qq);
    }
    public static function uin(string $str)
    {
        preg_match_all('/Uin=([1-9][0-9]{4,11})&/im', $str, $matches);
        if (isset($matches[1])) {
            return $matches[1];
        }
        return [];
    }

    public static function initial(string $str)
    {
        $qq = [];
        preg_match_all('/(qq|扣扣)(.{0,5})([^1-9][0-9]{4,10})/im', $str, $matches);
        if (isset($matches[0])) {
            foreach ($matches[0] as $str) {
                $qq = array_merge($qq, self::elaboration($str));
            }
        }
        return $qq;
    }

    public static function elaboration(string $str)
    {
        preg_match_all('/[1-9][0-9]{4,10}/im', $str, $matches);
        $qq = [];
        if (isset($matches[0])) {
            $q = end($matches[0]);
            if (strlen($q) <= 11 && strlen($q) > 0) {
                $qq[] = $q;
            }
        }
        return $qq;
    }
}

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
 * WeiwinSeek.
 *
 * @author 读心印 <aa24615@qq.com>
 */
class WeiwinSeek
{
    /**
     * 通过html获取微信号
     *
     * @param string $str
     *
     * @return array
     */

    public static function find(string $str)
    {
        $weixin = [];
        preg_match_all('/(微信)(.{0,10})([^a-zA-Z][-_a-zA-Z0-9]{5,19}+)/im', $str, $matches);
        if (isset($matches[3])) {
            foreach ($matches[3] as $wx) {
                $wx = trim($wx);
                if (!empty($wx)) {
                    $weixin[] = $wx;
                }
            }
        }
        return $weixin;
    }
}

<?php

namespace Php127\WebsiteInfo\Seek;

class WeiwinSeek
{
    /**
     * @Description 通过html获取微信号
     *
     * @Params string $str
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

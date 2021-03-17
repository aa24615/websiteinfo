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
 * Class NameSeek.
 *
 * @package Php127\Seek
 *
 * @author 读心印 <aa24615@qq.com>
 */

class NameSeek
{
    /**
     * 将标题分割为数组.
     *
     * @param string $str
     *
     * @return array
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public static function setStr(string $str)
    {
        $arr1 = explode('-', $str);
        $arr2 = explode('_', $str);
        $arr3 = explode('|', $str);
        $arr4 = explode(' ', $str);
        $arr5 = explode('#', $str);
        $arr6 = explode(',', $str);
        $arr7 = explode('，', $str);

        $arr = array_merge($arr1, $arr2, $arr3, $arr4, $arr5, $arr6, $arr7);

        $arr = array_unique($arr);
        $newArr = [];
        foreach ($arr as $str) {
            $str = trim($str);
            $c = preg_match('/[-_\|#\,，\r\t \n]/', $str, $matches);
            if ($c == 0) {
                $newArr[] = $str;
            }
        }

        $newArr = array_unique($newArr);
        return $newArr;
    }


    /**
     * 过滤无效字符.
     *
     * @param string $str
     *
     * @return string
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public static function filterStr(string $str)
    {
        $str = str_replace('[', '', $str);
        $str = str_replace(']', '', $str);
        $str = str_replace('】', '', $str);
        $str = str_replace('【', '', $str);
        return $str;
    }

    /**
     * 获取网站名.
     *
     * @param string $str
     *
     * @return string
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public static function find(string $str)
    {
        $xxWang = self::xxWang($str);

        if ($xxWang) {
            return self::filterStr($xxWang[0]);
        }

        $endStr = self::endStr($str);

        if ($endStr) {
            return $endStr[0];
        }

        return '';
    }

    /**
     * 以某某网匹配.
     *
     * @param string $str
     *
     * @return array
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public static function xxWang(string $str)
    {
        $arr = self::setStr($str);

        $data = [];
        foreach ($arr as $str) {
            preg_match('/(\S{2,}网)/im', $str, $matches);
            if (isset($matches[0])) {
                $data[] = $matches[0];
            }
        }
        $data = array_unique($data);
        return $data;
    }

    /**
     * 以最后一个字符匹配.
     *
     * @param string $str
     *
     * @return array
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public static function endStr(string $str)
    {
        $arr1 = explode('-', $str);
        $arr2 = explode('_', $str);
        $arr3 = explode('|', $str);
        $arr4 = explode(' ', $str);
        $arr5 = explode('#', $str);
        $arr6 = explode(',', $str);
        $arr7 = explode('，', $str);


        $arr[] = end($arr1);
        $arr[] = end($arr2);
        $arr[] = end($arr3);
        $arr[] = end($arr4);
        $arr[] = end($arr5);
        $arr[] = end($arr6);
        $arr[] = end($arr7);

        $arr = array_unique($arr);

        $newArr = [];
        foreach ($arr as $str) {
            $str = trim($str);
            $c = preg_match('/[-_\|#\,，\r\t \n]/', $str, $matches);
            if ($c == 0) {
                $newArr[] = $str;
            }
        }

        $newArr = array_unique($newArr);

        return $newArr;
    }
}

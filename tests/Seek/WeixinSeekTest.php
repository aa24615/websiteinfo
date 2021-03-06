<?php

/*
 * This file is part of the php127/websiteinfo.
 *
 * (c) 读心印 <aa24615@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Php127\Tests\Seek;

use Php127\Seek\WeiwinSeek;
use PHPUnit\Framework\TestCase;

/**
 * WeixinSeekTest.
 *
 * @author 读心印 <aa24615@qq.com>
 */
class WeixinSeekTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->str = "微信客服 aa24615 联系微信 aa23232";
    }

    public function testFind()
    {
        $res = WeiwinSeek::find($this->str);
        $this->assertTrue(count($res) == 2);
    }
}

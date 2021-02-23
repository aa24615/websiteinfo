<?php

namespace Php127\Tests\Seek;

use Php127\WebsiteInfo\Seek\EmailSeek;
use PHPUnit\Framework\TestCase;

class EmailSeekTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->str = '联系qq admin@126.com 联系扣扣 haoRoom2s@126.com';
        $this->mailto = '<a href="mailto:haoroom322s@126.com">给haorooms发送邮件</a><a href="mailto:ha444orooms@126.com">给haorooms发送邮件</a>';
    }


    public function testFind()
    {
        //模糊匹配
        $email = EmailSeek::find($this->mailto.$this->str);
        $this->assertTrue(count($email) == 4);

        //精准匹配
        $email = EmailSeek::find($this->mailto.$this->str, 1);
        $this->assertTrue(count($email) == 2);
    }

    public function testMailto()
    {
        $email = EmailSeek::mailto($this->mailto);
        $this->assertTrue(count($email) == 2);
    }
    public function testRegular()
    {
        $email = EmailSeek::regular($this->str);
        $this->assertTrue(count($email) == 2);
    }
}

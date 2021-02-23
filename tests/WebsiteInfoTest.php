<?php

namespace Php127\Tests;

use Php127\WebsiteInfo\WebsiteInfo;
use PHPUnit\Framework\TestCase;

class WebsiteInfoTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->html = file_get_contents('./tests/file/94sc.html');
//        $this->html = file_get_contents('http://www.rayli.com.cn/');
    }


    public function testGetBeian(): void
    {
        $webinfo = new WebsiteInfo($this->html);
        $res = $webinfo->getBeian();

        $this->assertTrue(!empty($res));
    }


    public function testGetSecurity(): void
    {
        $webinfo = new WebsiteInfo($this->html);
        $res = $webinfo->getSecurity();

        $this->assertTrue(!empty($res));
    }



    public function testGetQQ(): void
    {
        $webinfo = new WebsiteInfo($this->html);

        $res = $webinfo->getQQ();

        $this->assertTrue(true);
    }

    public function testGetEmail(): void
    {
        $webinfo = new WebsiteInfo($this->html);

        $res = $webinfo->getEmail();

        $this->assertTrue(count($res) > 0);
    }

    public function testIsCnzzTongji(): void
    {
        $webinfo = new WebsiteInfo($this->html);

        $this->assertTrue($webinfo->isCnzzTongji());

        $webinfo->setHtml(str_replace('cnzz.com', '', $this->html));

        $this->assertTrue(!$webinfo->isCnzzTongji());
    }

    public function testIsBaiduTongji(): void
    {
        $webinfo = new WebsiteInfo($this->html);

        $this->assertTrue($webinfo->isBaiduTongji());

        $webinfo->setHtml('');

        $this->assertTrue(!$webinfo->isBaiduTongji());
    }



    public function testIsWuyiTongji(): void
    {
        $webinfo = new WebsiteInfo($this->html);

        $this->assertTrue($webinfo->isWuyilaTongji());

        $webinfo->setHtml('');

        $this->assertTrue(!$webinfo->isWuyilaTongji());
    }


    public function testGetTitle(): void
    {
        $webinfo = new WebsiteInfo($this->html);

        $this->assertTrue(!empty($webinfo->getTitle()));
    }

    public function testGetKeywords(): void
    {
        $webinfo = new WebsiteInfo($this->html);

        $this->assertTrue(!empty($webinfo->getKeywords()));
    }

    public function testGetDescription(): void
    {
        $webinfo = new WebsiteInfo($this->html);

        $this->assertTrue(!empty($webinfo->getDescription()));
    }

    public function testGetLogo(): void
    {
        $webinfo = new WebsiteInfo($this->html);
        $this->assertTrue(is_array($webinfo->getLogo()));
        $this->assertTrue(!empty($webinfo->getLogo()));
    }

    public function testGetIcon(): void
    {
        $webinfo = new WebsiteInfo($this->html);

        $this->assertTrue(!empty($webinfo->getIcon()));

        $webinfo->setHtml('');

        $this->assertTrue(empty($webinfo->getIcon()));
    }
}
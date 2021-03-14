<?php


/*
 * This file is part of the php127/websiteinfo.
 *
 * (c) 读心印 <aa24615@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Php127;

use Php127\Seek\EmailSeek;
use Php127\Seek\NameSeek;
use Php127\Seek\QQSeek;
use Php127\Seek\WeiwinSeek;
use QL\QueryList;

/**
 * WebsiteInfo.
 *
 * @author 读心印 <aa24615@qq.com>
 */
class WebsiteInfo
{
    public $html = null;
    public $ql = null;


    public function __construct(string $str)
    {
        $this->setHtml($str);
    }

    /**
     * 设置html
     *
     * @param string $str
     *
     * @return void
     */
    public function setHtml(string $str): void
    {
        $this->ql = null;
        $this->html = $str;
    }


    /**
     * 获取所有信息
     *
     * @return array
     */
    public function get()
    {
        return [
            'name' => $this->getName(),
            'title' => $this->getTitle(),
            'keywords' => $this->getKeywords(),
            'description' => $this->getDescription(),
            'logo' => $this->getLogo(),
            'icon' => $this->getIcon(),
            'qq' => $this->getQQ(),
            'weixin' => $this->getWeixin(),
            'beian' => $this->getBeian(),
            'security' => $this->getSecurity(),
            'isCnzzTongji' => $this->isCnzzTongji(),
            'isBaiduTongji' => $this->isBaiduTongji(),
            'isWuyilaTongji' => $this->isWuyilaTongji(),

        ];
    }

    public function ql(): QueryList
    {
        if (is_null($this->ql)) {
            $this->ql = QueryList::html($this->html);
        }

        return $this->ql;
    }

    public function getName(): string
    {
        return NameSeek::find($this->getTitle());
    }

    public function getTitle(): string
    {
        return $this->ql()->find('title')->text();
    }

    public function getKeywords(): string
    {
        return $this->ql()->find('meta[name=keywords]')->attr('content');
    }

    public function getDescription(): string
    {
        return $this->ql()->find('meta[name=description]')->attr('content');
    }


    public function getLogo(): array
    {
        $list = $this->ql()->find('img')->attrs('src');

        $urls = [];
        foreach ($list as $url) {
            if (strpos($url, 'logo') !== false) {
                $urls[] = $url;
            }
        }
        return $urls;
    }
    public function getIcon(): string
    {
        return $this->ql()->find('link[rel=icon]')->attr('href');
    }

    public function getBeian(): string
    {
        return $this->ql()->find('a[href*="beian.miit.gov.cn"]')->text();
    }

    public function getSecurity(): string
    {
        return $this->ql()->find('a[href*="beian.gov.cn"]')->text();
    }

    public function getQQ(): array
    {
        return QQSeek::find($this->html);
    }

    public function getWeixin(): array
    {
        return WeiwinSeek::find($this->html);
    }

    public function getEmail(): array
    {
        $email = EmailSeek::find($this->html);

        return $email;
    }

    public function isCnzzTongji(): bool
    {
        $is = strpos($this->html, 'cnzz.com');
        if ($is !== false) {
            return true;
        } else {
            return false;
        }
    }

    public function isBaiduTongji(): bool
    {
        $is = strpos($this->html, 'hm.baidu.com');
        if ($is !== false) {
            return true;
        } else {
            return false;
        }
    }

    public function isWuyilaTongji(): bool
    {
        $is = strpos($this->html, '51.la');
        if ($is !== false) {
            return true;
        } else {
            return false;
        }
    }
}



# php127/websiteinfo

从html代码中分析网站信息


## 安装

```shell
composer install php127/webinfo -vvv
```
## 用法

```php
use Php127\WebsiteInfo\WebsiteInfo;

$str = file_get_contents('http://www.test.com');

$webinfo = new WebsiteInfo($str);

//


```

- 获取所有信息



```php

$webinfo->get();


/*
返回值
Array
(
    [title] => test标题
    [keywords] => test关健词
    [description] => test描述
    [logo] => Array
        (
            [0] => https://www.test.com/images/logo.svg
            [1] => https://www.test.com/images/logo.svg
        )

    [icon] => 
    [qq] => Array
        (
            [0] => 537007950
        )

    [beian] => 沪ICP备202xxx722号-1
    [security] => 皖公网安备 340xxx000334号
    [isCnzzTongji] => 
    [isBaiduTongji] => 1
    [isWuyilaTongji] => 1
)
*/

```

单个获取

```php
//获取网站title
$webinfo->getTitle();

//获取网站keywords
$webinfo->getKeywords();

//获取网站description
$webinfo->getDescription();

//获取网站logo
$webinfo->getLogo();

//获取网站icon
$webinfo->getIcon();

//获取网站ICP备案号
$webinfo->getBeian();

//获取网站公安备案号
$webinfo->getSecurity();

//获取网站联系QQ
$webinfo->getQQ();

//获取网站联系微信
$webinfo->getWeixin();

//获取网站联系邮箱
$webinfo->getEmail();

//网站是否使用cnzz统计
$webinfo->isCnzzTongji();

//网站是否使用百度统计
$webinfo->isBaiduTongji();

//网站是否使用51.la统计
$webinfo->isWuyilaTongji();
```

## 参与贡献

1. fork 当前库到你的名下
3. 在你的本地修改完成审阅过后提交到你的仓库
4. 提交 PR 并描述你的修改，等待合并
> 注: 本项目同时发布在gitee 请使用github提交
> github: https://github.com/aa24615/websiteinfo

## License

[MIT license](https://opensource.org/licenses/MIT).
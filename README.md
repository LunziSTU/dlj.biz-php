# dlj.biz-php
[dlj.biz](https://dlj.biz) 短链接 API 扩展包


## 安装

> composer require lunzi/dlj

## 使用

### 短链接生成

~~~
use lunzi\DljBiz;

DljBiz::create("长链接");

// 示例
DljBiz::create("https://newphper.com/tool/layuitheme.html");

~~~

### 短链接还原

~~~
use lunzi\DljBiz;

DljBiz::create("长链接");

// 示例
DljBiz::query("https://dlj.biz/2Bw");

~~~

## 返回示例（数组）

~~~

array(4) {
  'Code' => int(0)
  'ShortUrl' => string(19) "https://dlj.biz/2Bw"
  'LongUrl' => string(41) "https://newphper.com/tool/layuitheme.html"
  'ErrMsg' => string(0) ""
}

~~~

详细文档见(https://dlj.biz/doc)

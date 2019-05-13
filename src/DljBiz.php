<?php
// +----------------------------------------------------------------------
// | DLJ.BIZ [ 可靠的短链接服务 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2019 https://dlj.biz All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: Lunzi STU <service@newphper.com>
// +----------------------------------------------------------------------

namespace lunzi;


class DljBiz
{
    const HOST = 'https://dlj.biz';

    /**
     * 网址缩短接口
     * @param $long_url
     * @return bool|string
     */
    public static function create($long_url)
    {
        $path = '/api/create';

        $bodys = array('url'=>$long_url);

        return self::req($path,$bodys);
    }

    /**
     * 网址还原接口
     * @param $short_url
     * @return bool|string
     */
    public static function query($short_url)
    {
        $path = '/api/query';

        // 短网址
        $bodys = array('shortUrl'=>$short_url);

        return self::req($path,$bodys);
    }

    /**
     * 请求函数
     * @param $path
     * @param $bodys
     * @return bool|string
     */
    protected static function req($path,$bodys)
    {
        $content_type = 'application/json';
        // 创建连接
        $curl = curl_init(self::HOST . $path);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:'.$content_type));
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($bodys));

        // 发送请求
        $response = curl_exec($curl);
        curl_close($curl);

        return json_decode($response,1);
    }

}
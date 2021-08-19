<?php


namespace cccdl\apple_sdk\Util;


use cccdl\apple_sdk\Exceptions\cccdlException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;

/**
 * 请求服务类
 * Trait Request
 * @package cccdl\ali_sdk\Util
 */
trait Request
{
    /**
     * post请求
     * @return mixed
     * @throws GuzzleException
     * @throws cccdlException
     */
    protected function post($url, $param)
    {
        $client = new Client([
            'timeout' => 10,
        ]);

        $response = $client->post($url, [RequestOptions::BODY => $param]);

        if ($response->getStatusCode() != 200) {
            throw new cccdlException('请求失败: ' . $response->getStatusCode());
        }

        return json_decode($response->getBody(), true);

    }
}

<?php

namespace cccdl\apple_sdk\Core;

use cccdl\apple_sdk\Exceptions\cccdlException;
use Firebase\JWT\JWT;
use GuzzleHttp\Client;

class AppleBase
{
    /**
     * 正式地址
     * @var string
     */
    protected string $url = 'https://api.storekit-sandbox.itunes.apple.com';

    /**
     * 沙盒地址
     * @var string
     */
    protected string $sandboxUrl = 'https://api.storekit-sandbox.itunes.apple.com';

    /**
     * 是否沙盒模式
     * @var bool
     */
    private bool $isSandbox;

    /**
     * 来自 App Store Connect 的私钥 ID
     * @var string
     */
    private string $keyId;

    /**
     * @var string 生成私钥时下载的私钥
     */
    private string $key;

    /**
     * App Store Connect 中“密钥”页面中的颁发者 ID（例如：“57246542-96fe-1a63-e053-0824d011072a”）
     * @var string
     */
    private string $iss;

    /**
     * @var mixed
     */
    private $bid;


    /**
     * @param array $config 传入配置
     * @param bool $isSandbox 是否沙盒模式 默认为 false
     * @throws cccdlException
     */
    public function __construct(array $config, bool $isSandbox = false)
    {

        if (!isset($config['keyId'])) {
            throw new cccdlException('keyId为必填项');
        }

        if (!isset($config['key'])) {
            throw new cccdlException('key为必填项');
        }

        if (!isset($config['iss'])) {
            throw new cccdlException('iss为必填项');
        }

        if (!isset($config['bid'])) {
            throw new cccdlException('bid为必填项');
        }

        if (empty($config['keyId'])) {
            throw new cccdlException('keyId 不能为空');
        }

        if (empty($config['key'])) {
            throw new cccdlException('key 不能为空');
        }

        if (empty($config['iss'])) {
            throw new cccdlException('iss 不能为空');
        }

        if (empty($config['bid'])) {
            throw new cccdlException('bid 不能为空');
        }

        $this->isSandbox = $isSandbox;
        $this->keyId = $config['keyId'];
        $this->key = $config['key'];
        $this->iss = $config['iss'];
        $this->bid = $config['bid'];
    }


    /**
     * @return Client
     */
    protected function createClient(): Client
    {
        //设置请求地址
        if ($this->isSandbox) {
            $url = $this->sandboxUrl;
        } else {
            $url = $this->url;
        }


        return new Client([
            'base_uri' => $url,
            'timeout' => 10,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->generateJwtToken(),
            ]
        ]);
    }


    /**
     * 创建jwt
     * @return string
     */
    public function generateJwtToken(): string
    {
        $iat = time();
        $payload = [
            'iss' => $this->iss,
            'iat' => $iat,
            'exp' => $iat + 3600,
            'aud' => 'appstoreconnect-v1',
            'bid' => $this->bid
        ];

        return JWT::encode($payload, $this->key, 'ES256', $this->keyId);
    }

    /**
     * 解码signedTransactions Apple 签名的 JSON Web 签名 （JWS） 格式的一系列客户 App 内购买交易。
     * @param $signedTransactions
     * @return array
     */
    public function decodeSignedTransactions($signedTransactions): array
    {

        //分割内容
        $sign = explode('.', $signedTransactions);

        // 解密有效负载
        return json_decode(base64_decode($sign[1]), true);
    }
}
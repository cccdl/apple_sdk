<?php


namespace cccdl\apple_sdk\Pay;

use cccdl\apple_sdk\Exceptions\cccdlException;
use cccdl\apple_sdk\Util\Request;
use GuzzleHttp\Exception\GuzzleException;

class Verify
{
    use Request;

    /**
     * 正式验证地址
     * @var string
     */
    private string $url = 'https://buy.itunes.apple.com/verifyReceipt';

    /**
     * 沙盒验证地址
     * @var string
     */
    private string $sandboxUrl = 'https://sandbox.itunes.apple.com/verifyReceipt';

    /**
     * 是否沙盒模式
     * @var bool
     */
    private bool $isSandbox;

    /**
     * 设置沙盒模式
     * @param bool $sandbox
     */
    public function setSandBox(bool $sandbox)
    {
        $this->isSandbox = $sandbox;
    }

    /**
     * 验证凭据
     * @param $receipt
     * @return mixed
     * @throws GuzzleException
     * @throws cccdlException
     */
    public function doVerify($receipt)
    {
        if ($this->isSandbox) {
            return $this->post($this->sandboxUrl, '{"receipt-data":"' . $receipt . '"}');
        } else {
            return $this->post($this->url, '{"receipt-data":"' . $receipt . '"}');
        }

    }


}

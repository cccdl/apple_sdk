<?php

namespace cccdl\apple_sdk\Core\Transaction;

use cccdl\apple_sdk\Core\AppleBase;
use cccdl\apple_sdk\Exceptions\cccdlException;
use cccdl\apple_sdk\Util\Request;
use GuzzleHttp\Exception\GuzzleException;

class Transaction extends AppleBase
{
    use Request;

    /**
     * @param $transactionId
     *  文档地址：https://developer.apple.com/documentation/appstoreserverapi/get_transaction_info
     *
     * @return array
     * @throws GuzzleException
     * @throws cccdlException
     */
    public function getTransactionInfo($transactionId): array
    {
        $url = '/inApps/v1/transactions/' . $transactionId;
        return $this->get($url, []);
    }
}
<?php

namespace cccdl\apple_sdk\Test\Transaction;

use cccdl\apple_sdk\Core\Transaction\Transaction;
use cccdl\apple_sdk\Exceptions\cccdlException;
use cccdl\apple_sdk\Test\Config;
use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\TestCase;

require '../../../vendor/autoload.php';

class TransactionTest extends TestCase
{
    /**
     * @return void
     * @throws GuzzleException
     * @throws cccdlException
     */
    public function testGetTransactionInfo()
    {
        $config = Config::getConfig();
        $app = new Transaction($config, true);
        $res = $app->getTransactionInfo('transactionId');
        $this->assertIsArray($res);
//        $this->assertArrayHasKey('status', $res);
//        $this->assertSame(0, $res['status']);
    }


}
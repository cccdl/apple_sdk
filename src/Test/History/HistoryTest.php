<?php

namespace cccdl\apple_sdk\Test\History;

use cccdl\apple_sdk\Core\History\History;
use cccdl\apple_sdk\Exceptions\cccdlException;
use cccdl\apple_sdk\Test\Config;
use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\TestCase;

require '../../../vendor/autoload.php';

class HistoryTest extends TestCase
{
    /**
     * @return void
     * @throws GuzzleException
     * @throws cccdlException
     */
    public function testGetTransactionHistory()
    {
        $config = Config::getConfig();
        $app = new History($config, true);
        $res = $app->getTransactionHistory('aaaa', []);
        $data = $app->decodeSignedTransactions($res['signedTransactions']);
        $this->assertIsArray($data);
//        $this->assertArrayHasKey('status', $res);
//        $this->assertSame(0, $res['status']);
    }


}
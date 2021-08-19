<?php

namespace cccdl\apple_sdk\Test\Member;

use cccdl\apple_sdk\Pay\Verify;
use PHPUnit\Framework\TestCase;

require '../../../vendor/autoload.php';

class ClientTest extends TestCase
{
    public function testVerify()
    {

        $app = new Verify();
        $app->setSandBox(true);
        $res = $app->doVerify('苹果凭据');
        var_dump($res);
        $this->assertIsArray($res);
        $this->assertArrayHasKey('status', $res);
        $this->assertSame(0, $res['status']);
    }


}

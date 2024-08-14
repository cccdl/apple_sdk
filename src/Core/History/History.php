<?php

namespace cccdl\apple_sdk\Core\History;

use cccdl\apple_sdk\Core\AppleBase;
use cccdl\apple_sdk\Exceptions\cccdlException;
use cccdl\apple_sdk\Util\Request;
use GuzzleHttp\Exception\GuzzleException;

class History extends AppleBase
{
    use Request;

    /**
     * @param $transactionId
     * @param $params
     *      revision: string
     *      您提供的令牌用于获取下一组（最多 20 笔）交易。所有响应都包含revision令牌。使用先前History Response中的revision令牌。
     *      注意：除初始请求外，所有请求都需要revision令牌。对于使用revision令牌的请求，请包含与初始请求相同的查询参数。
     *      在查询中使用的令牌，用于请求客户的下一组事务。
     *
     *      startDate: timestamp
     *      您请求的交易历史记录的时间跨度的可选开始日期。如果您指定了两个日期，则start Date需要早于end Date 。如果purchase Date等于或大于start Date ，则结果包括交易。
     *      时间跨度的开始日期，以 UNIX 时间表示，以毫秒为单位。
     *
     *      endDate: timestamp
     *      您请求的交易历史记录的时间跨度的可选结束日期。如果您指定了两个日期，请选择晚于start Date的end Date 。使用未来的end Date是有效的。如果purchase Date早于end Date ，则结果包括交易。
     *      时间跨度的结束日期，以 UNIX 时间表示，以毫秒为单位。
     *
     *      productId: string[]
     *      可选过滤器，指示要包含在交易历史记录中的产品标识符。您的查询可能指定多个product ID 。
     *      您在 App Store Connect 中创建的产品的唯一标识符。
     *
     *      productType: string[]
     *      可选过滤器，指示要包含在交易历史记录中的产品类型。您的查询可能指定多个product Type 。
     *      可能的值： AUTO_RENEWABLE, NON_RENEWABLE, CONSUMABLE, NON_CONSUMABLE
     *
     *      inAppOwnershipType: string
     *      一个可选的过滤器，通过应用内所有权类型限制交易历史记录。
     *      一个字符串，描述交易是由客户购买的，还是通过“家人共享”可供他们使用的。
     *
     *      sort: string
     *      事务历史记录的可选排序顺序。响应按事务记录的最近修改日期对事务记录进行排序。默认值为 ASCENDING，因此您首先收到最早的记录。
     *      可能的值：ASCENDING、DESCENDING
     *
     *      revoked: boolean
     *      一个可选的布尔值，当值为 true 时，该值指示响应是仅包含已撤销的事务，还是当值为 false 时仅包含未撤销的事务。默认情况下，请求不包含此参数。
     *      可能的值：true、false
     *
     *      subscriptionGroupIdentifier: string
     *      订阅所属的订阅组的标识符
     *
     *  文档地址：https://developer.apple.com/documentation/appstoreserverapi/get_transaction_history
     *
     *
     * @return void
     * @throws GuzzleException
     * @throws cccdlException
     */
    public function getTransactionHistory($transactionId, array $params = [])
    {
        $url = '/inApps/v2/history/' . $transactionId;
        return $this->get($url, $params);
    }
}
# 苹果内购 SDK for PHP  !

### 主要新特性

* 简化使用方法
* 调用简单，统一原样返回
* 可执行单元测试

### 更新日志

- 1.0.0 增加验证苹果内购凭据，支持沙盒模式

## 安装

> 运行环境要求PHP7.1+。

```shell
$ composer require cccdl/apple_sdk
```

### 使用

```php
$app = new Verify();
//开启沙盒模式 true=沙盒 false=生产正式
$app->setSandBox(true);
$res = $app->doVerify('苹果凭据');
```

## 文档

[苹果开发者官网](https://developer.apple.com/)
[苹果开发者文档](https://developer.apple.com/cn/develop/)
[通过 App Store 验证收据](https://developer.apple.com/cn/documentation/storekit/in-app_purchase/validating_receipts_with_the_app_store/)
[verifyReceipt](https://developer.apple.com/documentation/appstorereceipts/verifyreceipt)
[requestBody](https://developer.apple.com/documentation/appstorereceipts/requestbody)

## 问题

[提交 Issue](https://github.com/cccdl/apple_sdk/issues)，不符合指南的问题可能会立即关闭。

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/cccdl/apple_sdk/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/cccdl/apple_sdk/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and
PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT

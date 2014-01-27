# StatusPage.io PHP SDK
[![Latest Stable Version](https://poser.pugx.org/statuspage/statuspage-sdk-php/v/stable.png)](https://packagist.org/packages/statuspage/statuspage-sdk-php)
[![Build Status](https://travis-ci.org/xsolla/statuspage-sdk-php.png?branch=master)](https://travis-ci.org/xsolla/statuspage-sdk-php)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/xsolla/statuspage-sdk-php/badges/quality-score.png?s=dca30463554894e9b09050c5bce2799b74785906)](https://scrutinizer-ci.com/g/xsolla/statuspage-sdk-php/)
[![Code Coverage](https://scrutinizer-ci.com/g/xsolla/statuspage-sdk-php/badges/coverage.png?s=a1dc72e1868241f8af46c2415f1e99c42c09018f)](https://scrutinizer-ci.com/g/xsolla/statuspage-sdk-php/)

A PHP SDK for StatusPage.io

## Requirements

* PHP 5.3.3+
* PHP [cURL extension](http://php.net/manual/en/curl.installation.php) with SSL enabled (it's usually built-in).

## Instalation

The recommended way to install StatusPage SDK for PHP is through [Composer](http://getcomposer.org).

``` bash
$ cd /path/to/your/project
$ composer require statuspage/statuspage-sdk-php:~1.0
```

## Usage

### [Subscriptions endpoint](http://doers.statuspage.io/api/v1/subscribers/)

``` php
<php

use Guzzle\Http\Client as GuzzleClient;
use StatusPage\SDK\Client;
use StatusPage\SDK\Subscribers\Subscriber;

$client = new Client(new GuzzleClient, 'YOUR_PAGE_ID', 'YOUR_SECRET_KEY');

$subscriber = new Subscriber;
$subscriber->setEmail('example@example.com');

$client->subscriptions()->addSubscriber($subscriber);

```

### [Metrics endpoint](http://doers.statuspage.io/api/v1/metrics/)

``` php
<php

use Guzzle\Http\Client as GuzzleClient;
use StatusPage\SDK\Client;

$client = new Client(new GuzzleClient, 'YOUR_PAGE_ID', 'YOUR_SECRET_KEY');
$client->metrics()->submitData('YOUR_METRIC_ID', time(), mt_rand(1, 100));

```

## Additional resources

* [Statuspage API](http://doers.statuspage.io)
* [Xsolla status](http://status.xsolla.com)
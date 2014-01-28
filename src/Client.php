<?php
namespace StatusPage\SDK;

use Guzzle\Http\Client as GuzzleClient;
use Guzzle\Http\Curl\CurlVersion;
use StatusPage\SDK\Metrics\MetricsEndpoint;
use StatusPage\SDK\Subscribers\SubscribersEndpoint;

class Client
{
    protected $guzzleClient;

    public function __construct(GuzzleClient $guzzleClient, $pageId, $token)
    {
        $this->guzzleClient = $guzzleClient;
        $this->guzzleClient->setBaseUrl("https://api.statuspage.io/v1/pages/$pageId/");
        $this->guzzleClient->setDefaultOption('headers', array('Authorization' => 'OAuth '.$token));
        $this->guzzleClient->setUserAgent(sprintf(
            'statuspage-sdk-php/1.0 curl/%s PHP/%s',
                CurlVersion::getInstance()->get('version'),
                PHP_VERSION
        ));
    }

    public function send($endpoint, $method = 'GET', $headers = null, $body = null)
    {
        $request = $this->guzzleClient->createRequest($method, $endpoint, $headers, $body);
        $response = $request->send();

        return $response->json();
    }

    public function metrics()
    {
        return new MetricsEndpoint($this);
    }

    public function subscribers()
    {
        return new SubscribersEndpoint($this);
    }
}

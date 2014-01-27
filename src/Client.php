<?php
namespace StatusPage\SDK;

use Guzzle\Http\Client as GuzzleClient;
use StatusPage\SDK\Metrics\MetricsEndpoint;

class Client
{
    private $guzzleClient;

    public function __construct(GuzzleClient $guzzleClient, $pageId, $secretKey)
    {
        $this->guzzleClient = $guzzleClient;
        $this->guzzleClient->setBaseUrl('https://api.statuspage.io/v1/pages/'.$pageId.'/');
        $this->guzzleClient->setDefaultOption('headers', array('Authorization' => 'OAuth '.$secretKey));
        $this->guzzleClient->setUserAgent('statuspage-sdk-php/1.0');
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
}

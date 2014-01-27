<?php
namespace StatusPage\SDK;

use Guzzle\Http\Client as GuzzleClient;

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
      /*  if (in_array($method, array('PUT', 'POST', 'DELETE'))) {
            $request->setHeader('content-type', 'application/json');
        }*/
        //echo ((string) $request);
       $response = $request->send();
        return $response->json();
    }
}
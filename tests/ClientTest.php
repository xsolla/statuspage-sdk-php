<?php
namespace StatusPage\SDK\tests;

use StatusPage\SDK\Client;
use Guzzle\Http\Curl\CurlVersion;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    private $token = 'token';
    private $pageId = 'qwerty';

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    private $guzzleClientMock;

    /**
     * @var Client
     */
    private $statusPageClient;

    public function setUp()
    {
        $this->guzzleClientMock = $this->getMock('\Guzzle\Http\Client', array(), array(), '', false);
        $this->guzzleClientMock
            ->expects($this->once())
            ->method('setBaseUrl')
            ->with('https://api.statuspage.io/v1/pages/qwerty/');
        $this->guzzleClientMock
            ->expects($this->once())
            ->method('setDefaultOption')
            ->with('headers', array('Authorization' => 'OAuth token'));
        $this->guzzleClientMock
            ->expects($this->once())
            ->method('setUserAgent')
            ->with($this->logicalAnd(
                $this->stringContains('statuspage-sdk-php/'.Client::VERSION),
                $this->stringContains(CurlVersion::getInstance()->get('version')),
                $this->stringContains(PHP_VERSION)
            ));
        $this->statusPageClient = new Client($this->guzzleClientMock, $this->pageId, $this->token);
    }

    public function testMetrics()
    {
        $metricsEndpoint = $this->statusPageClient->metrics();
        $this->assertInstanceOf('StatusPage\SDK\Metrics\MetricsEndpoint', $metricsEndpoint);
        $this->assertAttributeSame($this->statusPageClient, 'client', $metricsEndpoint);
    }

    public function testSubscribers()
    {
        $subscribersEndpoint = $this->statusPageClient->subscribers();
        $this->assertInstanceOf('StatusPage\SDK\Subscribers\SubscribersEndpoint', $subscribersEndpoint);
        $this->assertAttributeSame($this->statusPageClient, 'client', $subscribersEndpoint);
    }

    public function testSend()
    {
        $requestMock = $this->getMock('\Guzzle\Http\Message\RequestInterface', array(), array(), '', false);
        $responseMock = $this->getMock('\Guzzle\Http\Message\Response', array(), array(), '', false);

        $json = '{"a":"b"}';
        $endpoint = '/test.json';
        $method = 'PUT';
        $headers = array('a' => 'b');
        $body = '1234';

        $this->guzzleClientMock->expects($this->once())
            ->method('createRequest')
            ->with($method, $endpoint, $headers, $body)
            ->will($this->returnValue($requestMock));
        $requestMock->expects($this->once())
            ->method('send')
            ->will($this->returnValue($responseMock));
        $responseMock->expects($this->once())
            ->method('json')
            ->will($this->returnValue($json));

        $this->assertSame($json, $this->statusPageClient->send($endpoint, $method, $headers, $body));
    }
}

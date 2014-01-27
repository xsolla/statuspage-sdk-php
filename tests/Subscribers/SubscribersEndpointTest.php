<?php
namespace StatusPage\SDK\Tests\Subscribers;

use StatusPage\SDK\Subscribers\Subscriber;
use StatusPage\SDK\Subscribers\SubscribersEndpoint;

class SubscribersEndpointTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SubscribersEndpoint
     */
    private $endpoint;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    private $clientSDKMock;

    public function setUp()
    {
        parent::setUp();
        $this->clientSDKMock = $this->getMock('\StatusPage\SDK\Client', array(), array(), '', false);
        $this->endpoint = new SubscribersEndpoint($this->clientSDKMock);
    }

    public function testSubmitData()
    {
        $subscriber = new \StatusPage\SDK\Subscribers\Subscriber();
        $subscriber->setEmail('example@xsolla.com');

        $this->clientSDKMock->expects($this->once())->method('send')
            ->with(
                'subscribers.json',
                'POST',
                array('Content-Type' => 'application/x-www-form-urlencoded'),
                array('subscriber' => array('email' => 'example@xsolla.com'))
            );

        $this->endpoint->addSubscriber($subscriber);
    }
}

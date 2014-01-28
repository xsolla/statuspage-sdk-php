<?php
namespace StatusPage\SDK\tests\Subscribers;

use StatusPage\SDK\Subscribers\Subscriber;
use StatusPage\SDK\Subscribers\SubscribersEndpoint;
use StatusPage\SDK\Tests\EndpointTestCase;

class SubscribersEndpointTest extends EndpointTestCase
{
    /**
     * @var SubscribersEndpoint
     */
    private $endpoint;

    public function setUp()
    {
        parent::setUp();
        $this->endpoint = new SubscribersEndpoint($this->clientMock);
    }

    public function testSubmitData()
    {
        $subscriber = new \StatusPage\SDK\Subscribers\Subscriber();
        $subscriber->setEmail('example@example.com');
        $subscriber->setPhoneCountry('RU');
        $subscriber->setPhoneNumber('79120000000');

        $this->clientMock->expects($this->once())->method('send')
            ->with(
                'subscribers.json',
                'POST',
                array('Content-Type' => 'application/x-www-form-urlencoded'),
                array('subscriber' => array(
                    'email' => 'example@example.com',
                    'phone_number' => '79120000000',
                    'phone_country' => 'RU',
                ))
            );

        $this->endpoint->addSubscriber($subscriber);
    }
}

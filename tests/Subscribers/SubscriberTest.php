<?php
namespace StatusPage\SDK\tests\Subscribers;

use StatusPage\SDK\Subscribers\Subscriber;

class SubscriberTest extends \PHPUnit_Framework_TestCase
{
    const EMAIL = 'aa@aa.aa';
    const PHONE_NUMBER = '9120000000';
    const PHONE_COUNTRY = '7';

    /**
     * @var Subscriber
     */

    protected $subscriber;

    public function setUp()
    {
        $this->subscriber = new Subscriber();
    }

    public function testAll()
    {
        $this->assertNull($this->subscriber->getEmail());
        $this->assertNull($this->subscriber->getPhoneNumber());
        $this->assertNull($this->subscriber->getPhoneCountry());
        $this->subscriber->setEmail(self::EMAIL);
        $this->subscriber->setPhoneNumber(self::PHONE_NUMBER);
        $this->subscriber->setPhoneCountry(self::PHONE_COUNTRY);
        $this->assertSame(self::EMAIL, $this->subscriber->getEmail());
        $this->assertSame(self::PHONE_NUMBER, $this->subscriber->getPhoneNumber());
        $this->assertSame(self::PHONE_COUNTRY, $this->subscriber->getPhoneCountry());
    }
}

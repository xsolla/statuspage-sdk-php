<?php
namespace StatusPage\SDK\tests;

abstract class EndpointTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $clientMock;

    public function setUp()
    {
        $this->clientMock = $this->getMock('\StatusPage\SDK\Client', array(), array(), '', false);
    }
}

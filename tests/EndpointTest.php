<?php
namespace StatusPage\SDK\tests;

abstract class EndpointTest extends \PHPUnit_Framework_TestCase
{
    private $clientMock;

    public function setUp()
    {
        $this->clientMock = $this->getMock('\StatusPage\SDK\Client', array(), array(), '', false);
    }
}

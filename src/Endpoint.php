<?php
namespace StatusPage\SDK;

abstract class Endpoint
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }


}
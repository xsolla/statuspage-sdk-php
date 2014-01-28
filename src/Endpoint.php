<?php
namespace StatusPage\SDK;

abstract class Endpoint
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }
}

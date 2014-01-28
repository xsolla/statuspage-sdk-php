<?php
namespace StatusPage\SDK\tests\Metrics;

use StatusPage\SDK\Metrics\MetricsEndpoint;
use StatusPage\SDK\Tests\EndpointTestCase;

class MetricsEndpointTest extends EndpointTestCase
{
    /**
     * @var MetricsEndpoint
     */
    private $metrics;

    private $metric_id = 'metric_id';
    private $data = array(
        'timestamp' => 1380568650,
        'value' => 100
    );

    public function setUp()
    {
        parent::setUp();
        $this->metrics = new MetricsEndpoint($this->clientMock);
    }

    public function testSubmitData()
    {
        $this->clientMock->expects($this->once())->method('send')
            ->with("metrics/{$this->metric_id}/data.json",
               'POST',
               null,
               array('data' => $this->data))
            ->will($this->returnValue($this->data));

        $this->assertSame($this->data, $this->metrics->submitData($this->metric_id, $this->data['timestamp'], $this->data['value']));
    }
}

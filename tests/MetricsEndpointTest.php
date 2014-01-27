<?php
namespace StatusPage\SDK\Tests;

use StatusPage\SDK\Metrics\MetricsEndpoint;

class MetricsEndpointTest extends EndpointTestCase
{
    private $metrics;
    private $clientSDKMock;

    private $metric_id = 'metric_id';
    private $data = array(
        'timestamp' => 1380568650,
        'value' => 100
    );

    public function setUp()
    {
        parent::setUp();
        $this->clientSDKMock = $this->getMock('\StatusPage\SDK\Client', array(), array(), '', false);
        $this->metrics = new MetricsEndpoint($this->clientSDKMock);
    }

    public function testSubmitData()
    {
        $this->clientSDKMock->expects($this->once())->method('send')
            ->with('metrics/'.$this->metric_id.'/data.json',
               'POST',
               null,
               array('data'=>$this->data))
            ->will($this->returnValue($this->data));

        $this->assertSame($this->data, $this->metrics->submitData($this->metric_id, $this->data['timestamp'], $this->data['value']));
    }

    public function testDeleteData()
    {
        $this->clientSDKMock->expects($this->once())->method('send')
            ->with('metrics/'.$this->metric_id.'/data.json',
                'DELETE',
                null,
                null);

        $this->metrics->deleteData($this->metric_id);
    }
}
 
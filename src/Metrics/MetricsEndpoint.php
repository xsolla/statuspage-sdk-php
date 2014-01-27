<?php

namespace StatusPage\SDK\Metrics;

use StatusPage\SDK\Endpoint;

class MetricsEndpoint extends Endpoint{

    public function submitData($metric_id, $timestamp, $value)
    {
        $data = array(
            'data' => array(
                'timestamp' => $timestamp,
                'value' => $value
            )
        );

        $result = $this->client->send('metrics/'.$metric_id.'/data.json','POST', null, $data);
        return $result;
    }

    public function deleteData($metric_id)
    {
        $result = $this->client->send('metrics/'.$metric_id.'/data.json','DELETE', null, null);
        return $result;
    }

    public function createMetric($params)
    {
        $data = array();
    }
}

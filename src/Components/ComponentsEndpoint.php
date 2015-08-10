<?php

namespace StatusPage\SDK\Components;

use StatusPage\SDK\Endpoint;

class ComponentsEndpoint extends Endpoint
{

    public function updateComponent($component_id, $status)
    {

        if (!in_array($status, ['', 'operational', 'degraded_performance', 'partial_outage', 'major_outage'])) {
            throw new \InvalidArgumentException('$status is not valid.');
        }

        $data = array(
            'component' => array(
                'status' => $status
            )
        );

        $result = $this->client->send("components/$component_id.json",'PATCH', null, $data);

        return $result;
    }

}

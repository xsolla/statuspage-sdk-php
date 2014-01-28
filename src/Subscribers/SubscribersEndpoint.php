<?php
namespace StatusPage\SDK\Subscribers;

use StatusPage\SDK\Endpoint;

class SubscribersEndpoint extends Endpoint
{
    public function addSubscriber(Subscriber $subscriber)
    {
        $body = array();

        $email = $subscriber->getEmail();
        $phone = $subscriber->getPhoneNumber();
        $country = $subscriber->getPhoneCountry();

        if (!empty($email)) {
            $body['email'] = $email;
        }
        if (!empty($phone)) {
            $body['phone_number'] = $phone;
        }
        if (!empty($country)) {
            $body['phone_country'] = $country;
        }

        return $this->client->send(
            'subscribers.json',
            'POST',
            array('Content-Type' => 'application/x-www-form-urlencoded'),
            array('subscriber' => $body)
        );
    }
}

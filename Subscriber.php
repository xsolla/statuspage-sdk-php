<?php
namespace StatusPage\SDK\Subscribers;

class Subscriber
{

    protected $email;
    protected $phone_number;
    protected $phone_country;

    /**
     * @param string $email
     */
    public function setSubscriberId($subscriber_id)
    {
        $this->subscriber_id = $subscriber_id;
    }

    /**
     * @return mixed
     */
    public function getSubscriberId()
    {
        return $this->subscriber_id;
    }    

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $phone_country
     */
    public function setPhoneCountry($phone_country)
    {
        $this->phone_country = $phone_country;
    }

    /**
     * @return string
     */
    public function getPhoneCountry()
    {
        return $this->phone_country;
    }

    /**
     * @param mixed $phone_number
     */
    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = $phone_number;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }
}

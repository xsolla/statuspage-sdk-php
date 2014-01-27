<?php
namespace StatusPage\SDK\Subscribers;

class Subscriber
{
    protected $email;
    protected $phone_number;
    protected $phone_country;
    protected $endpoint;
    protected $skip_confirmation_notification;

    public function __construct()
    {
    
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $endpoint
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    /**
     * @return mixed
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * @param mixed $phone_country
     */
    public function setPhoneCountry($phone_country)
    {
        $this->phone_country = $phone_country;
    }

    /**
     * @return mixed
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

    /**
     * @param mixed $skip_confirmation_notification
     */
    public function setSkipConfirmationNotification($skip_confirmation_notification)
    {
        $this->skip_confirmation_notification = $skip_confirmation_notification;
    }

    /**
     * @return mixed
     */
    public function getSkipConfirmationNotification()
    {
        return $this->skip_confirmation_notification;
    }


}
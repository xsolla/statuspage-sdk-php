<?php
namespace StatusPage\SDK\Incidents;

class Update
{

    protected $id;

    protected $body;

    protected $created_at;

    protected $display_at;

    protected $status;

    protected $twitter_updated_at;

    protected $updated_at;

    protected $wants_twitter_update;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    public function getDisplayAt()
    {
        return $this->display_at;
    }

    public function setDisplayAt($display_at)
    {
        $this->display_at = $display_at;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getTwitterUpdatedAt()
    {
        return $this->twitter_updated_at;
    }

    public function setTwitterUpdatedAt($twitter_updated_at)
    {
        $this->twitter_updated_at = $twitter_updated_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function getWantsTwitterUpdate()
    {
        return $this->wants_twitter_update;
    }

    public function setWantsTwitterUpdate($wants_twitter_update)
    {
        $this->wants_twitter_update = $wants_twitter_update;
    }
}
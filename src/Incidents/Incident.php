<?php
namespace StatusPage\SDK\Incidents;

class Incident
{

    protected $name;

    protected $status;

    protected $created_at;

    protected $updated_at;

    protected $monitoring_at;

    protected $resolved_at;

    protected $impact;

    protected $shortlink;

    protected $postmortem_ignored;

    protected $postmortem_body;

    protected $postmortem_body_last_updated_at;

    protected $postmortem_published_at;

    protected $postmortem_notified_subscribers;

    protected $postmortem_notified_twitter;

    protected $backfilled;

    protected $scheduled_for;

    protected $scheduled_until;

    protected $scheduled_remind_prior;

    protected $scheduled_reminded_at;

    protected $impact_override;

    protected $scheduled_auto_in_progress;

    protected $scheduled_auto_completed;

    protected $id;

    protected $updates = array();

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function getMonitoringAt()
    {
        return $this->monitoring_at;
    }

    public function setMonitoringAt($monitoring_at)
    {
        $this->monitoring_at = $monitoring_at;
    }

    public function getResolvedAt()
    {
        return $this->resolved_at;
    }

    public function setResolvedAt($resolved_at)
    {
        $this->resolved_at = $resolved_at;
    }

    public function getImpact()
    {
        return $this->impact;
    }

    public function setImpact($impact)
    {
        $this->impact = $impact;
    }

    public function getShortlink()
    {
        return $this->shortlink;
    }

    public function setShortlink($shortlink)
    {
        $this->shortlink = $shortlink;
    }

    public function getPostmortemIgnored()
    {
        return $this->postmortem_ignored;
    }

    public function setPostmortemIgnored($postmortem_ignored)
    {
        $this->postmortem_ignored = $postmortem_ignored;
    }

    public function getPostmortemBody()
    {
        return $this->postmortem_body;
    }

    public function setPostmortemBody($postmortem_body)
    {
        $this->postmortem_body = $postmortem_body;
    }

    public function getPostmortemBodyLastUpdatedAt()
    {
        return $this->postmortem_body_last_updated_at;
    }

    public function setPostmortemBodyLastUpdatedAt($postmortem_body_last_updated_at)
    {
        $this->postmortem_body_last_updated_at = $postmortem_body_last_updated_at;
    }

    public function getPostmortemPublishedAt()
    {
        return $this->postmortem_published_at;
    }

    public function setPostmortemPublishedAt($postmortem_published_at)
    {
        $this->postmortem_published_at = $postmortem_published_at;
    }

    public function getPostmortemNotifiedSubscribers()
    {
        return $this->postmortem_notified_subscribers;
    }

    public function setPostmortemNotifiedSubscribers($postmortem_notified_subscribers)
    {
        $this->postmortem_notified_subscribers = $postmortem_notified_subscribers;
    }

    public function getPostmortemNotifiedTwitter()
    {
        return $this->postmortem_notified_twitter;
    }

    public function setPostmortemNotifiedTwitter($postmortem_notified_twitter)
    {
        $this->postmortem_notified_twitter = $postmortem_notified_twitter;
    }

    public function getBackfilled()
    {
        return $this->backfilled;
    }

    public function setBackfilled($backfilled)
    {
        $this->backfilled = $backfilled;
    }

    public function getScheduledFor()
    {
        return $this->scheduled_for;
    }

    public function setScheduledFor($scheduled_for)
    {
        $this->scheduled_for = $scheduled_for;
    }

    public function getScheduledUntil()
    {
        return $this->scheduled_until;
    }

    public function setScheduledUntil($scheduled_until)
    {
        $this->scheduled_until = $scheduled_until;
    }

    public function getScheduledRemindPrior()
    {
        return $this->scheduled_remind_prior;
    }

    public function setScheduledRemindPrior($scheduled_remind_prior)
    {
        $this->scheduled_remind_prior = $scheduled_remind_prior;
    }

    public function getScheduledRemindedAt()
    {
        return $this->scheduled_reminded_at;
    }

    public function setScheduledRemindedAt($scheduled_reminded_at)
    {
        $this->scheduled_reminded_at = $scheduled_reminded_at;
    }

    public function getImpactOverride()
    {
        return $this->impact_override;
    }

    public function setImpactOverride($impact_override)
    {
        $this->impact_override = $impact_override;
    }

    public function getScheduledAutoInProgress()
    {
        return $this->scheduled_auto_in_progress;
    }

    public function setScheduledAutoInProgress($scheduled_auto_in_progress)
    {
        $this->scheduled_auto_in_progress = $scheduled_auto_in_progress;
    }

    public function getScheduledAutoCompleted()
    {
        return $this->scheduled_auto_completed;
    }

    public function setScheduledAutoCompleted($scheduled_auto_completed)
    {
        $this->scheduled_auto_completed = $scheduled_auto_completed;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUpdates()
    {
        return $this->updates;
    }

    public function addUpdate($id, $body, $created_at, $display_at, $status, $twitter_updated_at, $updated_at, $wants_twitter_update)
    {
        $update = new Update();

        $update->setID($id);
        $update->setBody($body);
        $update->setCreatedAt($created_at);
        $update->setDisplayAt($display_at);
        $update->setStatus($status);
        $update->setTwitterUpdatedAt($twitter_updated_at);
        $update->setUpdatedAt($updated_at);
        $update->setWantsTwitterUpdate($wants_twitter_update);

        $this->updates[] = $update;
    }
}
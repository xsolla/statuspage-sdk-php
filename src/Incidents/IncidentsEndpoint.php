<?php

namespace StatusPage\SDK\Incidents;

use StatusPage\SDK\Endpoint;

class IncidentsEndpoint extends Endpoint
{

    public function unresolved()
    {
        $results = $this->client->send('incidents/unresolved.json', 'GET');

        $incidents = array();

        foreach($results as $result) {

            $incident = new Incident();

            $incident->setName($result['name']);
            $incident->setStatus($result['status']);
            $incident->setCreatedAt($result['created_at']);
            $incident->setUpdatedAt($result['updated_at']);
            $incident->setMonitoringAt($result['monitoring_at']);
            $incident->setResolvedAt($result['resolved_at']);
            $incident->setImpact($result['impact']);
            $incident->setShortLink($result['shortlink']);
            $incident->setPostmortemIgnored($result['postmortem_ignored']);
            $incident->setPostmortemBody($result['postmortem_body']);
            $incident->setPostmortemBodyLastUpdatedAt($result['postmortem_body_last_updated_at']);
            $incident->setPostmortemPublishedAt($result['postmortem_published_at']);
            $incident->setPostmortemNotifiedSubscribers($result['postmortem_notified_subscribers']);
            $incident->setPostmortemNotifiedTwitter($result['postmortem_notified_twitter']);
            $incident->setBackfilled($result['backfilled']);
            $incident->setScheduledFor($result['scheduled_for']);
            $incident->setScheduledUntil($result['scheduled_until']);
            $incident->setScheduledRemindPrior($result['scheduled_remind_prior']);
            $incident->setScheduledRemindedAt($result['scheduled_reminded_at']);
            $incident->setImpactOverride($result['impact_override']);
            $incident->setScheduledAutoInProgress($result['scheduled_auto_in_progress']);
            $incident->setScheduledAutoCompleted($result['scheduled_auto_completed']);
            $incident->setId($result['id']);

            foreach($result['incident_updates'] as $result_update) {

                $incident->addUpdate(
                    $result_update['id'],
                    $result_update['body'],
                    $result_update['created_at'],
                    $result_update['display_at'],
                    $result_update['status'],
                    $result_update['twitter_updated_at'],
                    $result_update['updated_at'],
                    $result_update['wants_twitter_update']
                );
            }

            $incidents[] = $incident;
        }

        return $incidents;
    }

    public function createRealtime($name, $status, $message, $wants_twitter_update, $impact_override, $component_ids)
    {

        $data = array(
            'incident' => array(
                'name' => $name,
                'status' => $status,
                'message' => $message,
                'wants_twitter_update'=> $wants_twitter_update,
                'impact_override' => $impact_override,
                'component_ids' => $component_ids
            )
        );

        $result = $this->client->send("incidents.json", 'POST', null, $data);

        return $result;
    }

}

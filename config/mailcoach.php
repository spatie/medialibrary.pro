<?php

return [
    'throttling' => [
        'enabled' => true,
        'redis_connection_name' => 'default',
        'redis_key' => 'laravel-mailcoach',
        'allowed_number_of_jobs_in_timespan' => 5,
        'timespan_in_seconds' => 1,
        'release_in_seconds' => 1,
    ],

    'ses_feedback' => [
        'configuration_set' => 'mailcoach',
    ],
];

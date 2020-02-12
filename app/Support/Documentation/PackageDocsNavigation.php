<?php

namespace App\Support\Documentation;

class PackageDocsNavigation extends Navigation
{
    public function menuStructure(): array
    {
        return [
            'General' => [
                'Welcome',
                'Requirements',
                'Installation and setup',
                'Questions and issues'
            ],

            'Using the UI' => [
                'Introduction',
                'Authorizing users',
            ],

            'Working with lists' => [
                'Creating a list',
                'Subscribing to a list',
                'Using subscription forms',
                'Validating subscribers',
                'Unsubscribing from a list',
                'Using double opt-in',
            ],

            'Working with campaigns' => [
                'Creating a campaign',
                'Testing a campaign',
                'Sending a campaign',
                'Tracking clicks',
                'Tracking opens',
                'Viewing statistics of a sent campaign'
            ],

            'Handling feedback' => [
                'Introduction',
                'Amazon SES',
                'Sendgrid',
                'Mailgun',
            ],

            'Advanced usage' => [
                'Creating custom placeholders',
                'Throttling sends',
                'Handling events',
                'Displaying webviews',
                'Segmenting lists',
                'Troubleshooting errors during sending',
                'Using custom mailables',
                'Working with extra attributes on subscribers',
            ]
        ];
    }
}

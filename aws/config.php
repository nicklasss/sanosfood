<?php

return array(
    // Bootstrap the configuration file with AWS specific features
    'includes' => array('_aws'),
    'services' => array(
        // All AWS clients extend from 'default_settings'. Here we are
        // overriding 'default_settings' with our default credentials and
        // providing a default region setting.
        'default_settings' => array(
            'params' => array(
                'credentials' => array(
                    'key'    => 'AKIAI7ETK5CHQWGNNRFA',
                    'secret' => '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',
                )
                //'region' => 'us-west-1'
            )
        )
    )
);
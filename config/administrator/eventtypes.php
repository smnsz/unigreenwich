<?php

return array(
    'title' => 'Event Types',
    'single' => 'Event Type',
    'model' => 'Community\EventType',
    /**
     * The display columns
     */
    'columns' => array(
        'owner' => array(
            'title' => 'Owner',
            'select' => 'owner',
        ),
        'title' => array(
            'title' => 'Title',
            'select' => 'title',
        ),
        'description' => array(
            'title' => 'Description',
            'select' => 'description',
        ),
        'location' => array(
            'title' => 'Location',
            'select' => 'location',
        ),
        'capacity' => array(
            'title' => 'Capacity',
            'select' => 'capacity',
        )
    ),
    /**
     * The filter set
     */
    'filters' => array(
        'owner' => array(
            'title' => 'Owner',
            'type' => 'text'
        ),
        'title' => array(
            'title' => 'Title'
        ),
        'description' => array(
            'title' => 'Description'
        ),
        'location' => array(
            'title' => 'location'
        ),
        'capacity' => array(
            'title' => 'Capacity',
            'type' => 'number',
            'thousands_separator' => '',
            'decimal_separator' => '.',
        )
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'owner' => array(
            'title' => 'Owner',
            'type' => 'text',
        ),
        'title' => array(
            'title' => 'Title',
            'type' => 'text',
        ),
        'description' => array(
            'title' => 'Description',
            'type' => 'textarea',
        ),
        'location' => array(
            'title' => 'location',
            'type' => 'text',
        ),
        'capacity' => array(
            'title' => 'Capacity',
            'type' => 'number',
            'thousands_separator' => '',
            'decimal_separator' => '.',
        )
    ),
    
    'rules' => array(
        'owner' => 'integer',
    ),
    'messages' => array(
        'owner.integer' => 'Allow only integer value',
    )
);

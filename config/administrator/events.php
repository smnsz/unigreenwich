<?php

return array(
    'title' => 'Events',
    'single' => 'Events',
    'model' => 'Community\Event',
    /**
     * The display columns
     */
    'columns' => array(
        'host' => array(
            'title' => 'Host',
            'select' => 'host',
        ),
        'type' => array(
            'title' => 'Type',
            'select' => 'type',
        ),
        'title' => array(
            'title' => 'Title',
            'select' => 'title',
        ),
        'capacity' => array(
            'title' => 'Capacity',
            'select' => 'capacity',
        ),
        'description' => array(
            'title' => 'Description',
            'select' => 'description',
        ),
        'start_time' => array(
            'title' => 'Start Time',
            'select' => 'start_time',
        ),
        'end_time' => array(
            'title' => 'End time',
            'select' => 'end_time',
        )
    ),
    /**
     * The filter set
     */
    'filters' => array(
        'host' => array(
            'title' => 'Host'
        ),
        'type' => array(
            'title' => 'Type'
        ),
        'title' => array(
            'title' => 'Title'
        ),
        'capacity' => array(
            'title' => 'Capacity',
            'type' => 'number',
            'thousands_separator' => '',
            'decimal_separator' => '.',
        ),
        'description' => array(
            'title' => 'Description'
        ),
        'start_time' => array(
            'title' => 'Start time',
            'type' => 'text', //date
        ),
        'end_time' => array(
            'title' => 'End Time',
            'type' => 'text', //date
        )
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'host' => array(
            'title' => 'host',
            'type' => 'text',
        ),
        'type' => array(
            'title' => 'Type',
            'type' => 'text',
        ),
        'title' => array(
            'title' => 'Title',
            'type' => 'text',
        ),
        'capacity' => array(
            'title' => 'Capacity',
            'type' => 'number',
            'thousands_separator' => '',
            'decimal_separator' => '.',
        ),
        'description' => array(
            'title' => 'Description',
            'type' => 'text',
        ),
        'start_time' => array(
            'title' => 'Start   Date',
            'type' => 'datetime',
            'date_format' => 'yy-mm-dd', //optional, will default to this value
            'time_format' => 'HH:mm', //optional, will default to this value
        ),
        'end_time' => array(
            'title' => 'End Date',
            'type' => 'datetime',
            'date_format' => 'yy-mm-dd', //optional, will default to this value
            'time_format' => 'HH:mm', //optional, will default to this value
        )
    ),
    
    
    'rules' => array(
        'host' => 'integer',
        'type' => 'integer',
        
    ),
    'messages' => array(
        'host.integer' => 'Please enter integer value on host',
        'type.integer' => 'Please enter integer value on type',
    )
);

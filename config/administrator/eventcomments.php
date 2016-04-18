<?php

return array(
    'title' => 'Event Comments',
    'single' => 'Event Comments',
    'model' => 'Community\EventComments',
    /**
     * The display columns
     */
    'columns' => array(
        'comment' => array(
            'title' => 'Comment',
            'select' => 'comment',
        ),
        
        /*
        'event' => array(
            'title' => "Event",
            'relationship' => 'event', //this is the name of the Eloquent relationship method!
            'select' => "(:table).title",
        ),
        */
        'user' => array(
            'title' => "user",
            'relationship' => 'user', //this is the name of the Eloquent relationship method!
            'select' => "(:table).username",
        ),
        'created_at' => array(
            'title' => 'Created date',
            'select' => 'created_at',
        )
    ),
    /**
     * The filter set
     */
    'filters' => array(
        'comment' => array(
            'title' => 'Comment'
        ),
        'event' => array(
            'title' => 'Event',
            'type' => 'relationship',
            'name_field' => 'title',
        ),
        'user' => array(
            'title' => 'User',
            'type' => 'relationship',
            'name_field' => 'username',
        ),
        'created_at' => array(
            'title' => 'Created date',
            'type' => 'date'
        ),
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'comment' => array(
            'title' => 'Comment',
            'type' => 'textarea',
        ),
        'event' => array(
            'title' => 'Event',
            'type' => 'relationship',
            'name_field' => 'title',
        ),
        'user' => array(
            'title' => 'User',
            'type' => 'relationship',
            'name_field' => 'username',
        ),
    )
);

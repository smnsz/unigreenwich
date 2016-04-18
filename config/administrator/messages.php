<?php

return array(
    'title' => 'Messages',
    'single' => 'Messages',
    'model' => 'Community\Message',
    /**
     * The display columns
     */
    'columns' => array(
        'thread' => array(
            'title' => "Thread",
            'relationship' => 'thread', //this is the name of the Eloquent relationship method!
            'select' => "(:table).subject",
        ),
        'user' => array(
            'title' => "user",
            'relationship' => 'user', //this is the name of the Eloquent relationship method!
            'select' => "(:table).username",
        ),
        'body' => array(
            'title' => 'Body',
            'select' => 'body',
        )
    ),
    /**
     * The filter set
     */
    'filters' => array(
        'thread_id' => array(
            'title' => 'Thread',
        ),
        'user_id' => array(
            'title' => 'User',
        ),
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'thread' => array(
            'title' => 'Thread',
            'type' => 'relationship',
            'name_field' => 'subject',
        ),
        'user' => array(
            'title' => 'User',
            'type' => 'relationship',
            'name_field' => 'username',
        ),
        'body' => array(
            'title' => 'Body',
            'type' => 'textarea',
        ),
    )
);

<?php

return array(
    'title' => 'Participants',
    'single' => 'Participants',
    'model' => 'Community\Participant',
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
        'last_read' => array(
            'title' => 'Last Read',
            'select' => 'last_read',
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
        'last_read' => array(
            'title' => 'Last read',
        )
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
            'title' => 'user',
            'type' => 'relationship',
            'name_field' => 'username',
        )
    )
);

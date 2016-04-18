<?php

return array(
    'title' => 'User comments',
    'single' => 'User comments',
    'model' => 'Community\UserComments',
    /**
     * The display columns
     */
    'columns' => array(
        'comment' => array(
            'title' => 'Comment',
            'select' => 'comment',
        ),
        'profile' => array(
            'title' => "Profile",
            'relationship' => 'profile',
            'select' => "(:table).username",
        ),
        'user' => array(
            'title' => "User",
            'relationship' => 'user',
            'select' => "(:table).username",
        ),
        'email' => array(
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
        'profile_id' => array(
            'title' => 'Profile'
        ),
        'user_id' => array(
            'title' => 'User'
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
        'profile' => array(
            'title' => 'Profile',
            'type' => 'relationship',
            'name_field' => 'username',
        ),
        'user' => array(
            'title' => 'User',
            'type' => 'relationship',
            'name_field' => 'username',
        ),
    )
);

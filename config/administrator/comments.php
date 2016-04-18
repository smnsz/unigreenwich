<?php

return array(
    'title' => 'Comments',
    'single' => 'Comments',
    'model' => 'Community\Comments',
    /**
     * The display columns
     */
    'columns' => array(
        'comment' => array(
            'title' => 'Comment',
            'select' => 'comment',
        ),
        'post' => array(
            'title' => 'Post',
            'relationship' => 'post',
            'select' => "(:table).title",
        ),
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
        'post' => array(
            'title' => 'Post',
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
        'post' => array(
            'title' => 'Post',
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

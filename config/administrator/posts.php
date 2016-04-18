<?php

return array(
    'title' => 'Posts',
    'single' => 'Posts',
    'model' => 'Community\Posts',
    /**
     * The display columns
     */
    'columns' => array(
        'title' => array(
            'title' => 'Title',
            'select' => 'title',
        ),
        'content' => array(
            'title' => 'Content',
            'select' => 'content',
        ),
        'active' => array(
            'title' => 'Active',
            'select' => 'active',
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
        'title' => array(
            'title' => 'Title'
        ),
        'content' => array(
            'title' => 'Content'
        ),
        'active' => array(
            'title' => 'Active',
            'type' => 'bool',
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
        'title' => array(
            'title' => 'Title',
            'type' => 'text',
        ),
        'content' => array(
            'title' => 'content',
            'type' => 'textarea',
        ),
        'active' => array(
            'title' => 'active',
            'type' => 'bool',
        ),
        'user' => array(
            'title' => 'User',
            'type' => 'relationship',
            'name_field' => 'username',
        ),
        'markdown_content' => array(
            'title' => 'Markdown Content',
            'type' => 'textarea',
        )
    )
);

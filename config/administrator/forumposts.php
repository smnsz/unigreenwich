<?php

return array(
    'title' => 'Forum Posts',
    'single' => 'Forum Posts',
    'model' => 'Community\ForumPosts',
    /**
     * The display columns
     */
    'columns' => array(
        'thread' => array(
            'title' => "Thread",
            'relationship' => 'thread', //this is the name of the Eloquent relationship method!
            'select' => "(:table).subject",
        ),
        'author' => array(
            'title' => "Author",
            'relationship' => 'author', //this is the name of the Eloquent relationship method!
            'select' => "(:table).username",
        ),
        'content' => array(
            'title' => 'Content',
            'select' => 'content',
        ),
        'post_id' => array(
            'title' => 'Post',
            'select' => 'post_id',
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
        'thread' => array(
            'title' => 'Thread',
            'type' => 'relationship',
            'name_field' => 'subject',
        ),
        'author' => array(
            'title' => 'Author',
            'type' => 'relationship',
            'name_field' => 'username',
        ),
        'content' => array(
            'title' => 'Content'
        ),
        'weight' => array(
            'title' => 'Weight'
        ),
        'post_id' => array(
            'title' => 'Post'
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
        'thread' => array(
            'title' => 'Thread',
            'type' => 'relationship',
            'name_field' => 'subject',
        ),
        'author' => array(
            'title' => 'Author',
            'type' => 'relationship',
            'name_field' => 'username',
        ),
        'content' => array(
            'title' => 'content',
            'type' => 'textarea',
        ),
        'post_id' => array(
            'title' => 'Post',
            'type' => 'text',
        )
    )
);

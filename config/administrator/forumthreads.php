<?php

return array(
    'title' => 'Forum Threads',
    'single' => 'Forum Threads',
    'model' => 'Community\ForumThreads',
    /**
     * The display columns
     */
    'columns' => array(
        'category' => array(
            'title' => "Category",
            'relationship' => 'category',
            'select' => "(:table).title",
        ),
        'author' => array(
            'title' => "Author",
            'relationship' => 'author', //this is the name of the Eloquent relationship method!
            'select' => "(:table).username",
        ),
        'title' => array(
            'title' => 'Title',
            'select' => 'title',
        ),
        'pinned' => array(
            'title' => 'Pinned',
            'select' => 'pinned',
        ),
        'locked' => array(
            'title' => 'Locked',
            'select' => 'locked',
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
        'category_id' => array(
            'title' => 'Category'
        ),
        'author_id' => array(
            'title' => 'Author'
        ),
        'title' => array(
            'title' => 'Title'
        ),
        'pinned' => array(
            'title' => 'Pinned',
            'type' => 'bool',
        ),
        'locked' => array(
            'title' => 'Locked',
            'type' => 'bool',
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
        'category' => array(
            'title' => 'Category',
            'type' => 'relationship',
            'name_field' => 'title',
        ),
        'author' => array(
            'title' => 'Author',
            'type' => 'relationship',
            'name_field' => 'username',
        ),
        'title' => array(
            'title' => 'Title',
            'type' => 'text',
        ),
        'pinned' => array(
            'title' => 'Pinned',
            'type' => 'bool',
        ),
        'locked' => array(
            'title' => 'Locked',
            'type' => 'bool',
        )
    )
);





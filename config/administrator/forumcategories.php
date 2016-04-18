<?php

return array(
    'title' => 'Forum Categories',
    'single' => 'Forum Categories',
    'model' => 'Community\ForumCategories',
    /**
     * The display columns
     */
    'columns' => array(
        'category' => array(
            'title' => "Category",
            'relationship' => 'category',
            'select' => "(:table).title",
        ),
        'title' => array(
            'title' => 'Title',
            'select' => 'title',
        ),
        'description' => array(
            'title' => 'Description',
            'select' => 'description',
        ),
        'weight' => array(
            'title' => 'Weight',
            'select' => 'weight',
        ),
        'enable_threads' => array(
            'title' => 'Enable Threads',
            'select' => 'enable_threads',
        ),
        'private' => array(
            'title' => 'Private',
            'select' => 'private',
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
        'title' => array(
            'title' => 'Title'
        ),
        'description' => array(
            'title' => 'Description'
        ),
        'weight' => array(
            'title' => 'Weight'
        ),
        'enable_threads' => array(
            'title' => 'Enable threads',
            'type' => 'bool',
        ),
        'private' => array(
            'title' => 'Private',
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
        'title' => array(
            'title' => 'Title',
            'type' => 'text',
        ),
        'description' => array(
            'title' => 'Description',
            'type' => 'textarea',
        ),
        'weight' => array(
            'title' => 'Weight',
            'type' => 'text',
        ),
        'enable_threads' => array(
            'title' => 'Enable threads',
            'type' => 'bool',
        ),
        'private' => array(
            'title' => 'Private',
            'type' => 'bool',
        )
    )
);

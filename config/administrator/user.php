<?php

return array(
    'title' => 'User',
    'single' => 'User',
    'model' => 'Community\User',
    /**
     * The display columns
     */
    'columns' => array(
        
        'avatar' => array(
            'title' => 'Avatar',
            'output' => '<img src="/img/avatars/(:value)?w=80"  alt=""/>',
            'sortable' => false,
        ),
        
        'username' => array(
            'title' => 'Username',
            'select' => 'username',
        ),
        'year_of' => array(
            'title' => 'Year Of',
            'select' => 'year_of',
        ),
        'first_name' => array(
            'title' => 'First name',
            'select' => 'first_name',
        ),
        'last_name' => array(
            'title' => 'Last name',
            'select' => 'last_name',
        ),
        'email' => array(
            'title' => 'E-mail',
            'select' => 'email',
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
        'username' => array(
            'title' => 'Username'
        ),
        'year_of' => array(
            'title' => 'Year of'
        ),
        'first_name' => array(
            'title' => 'First name'
        ),
        'last_name' => array(
            'title' => 'Last name'
        ),
        'email' => array(
            'title' => 'E-mail'
        ),
        'bio' => array(
            'title' => 'Bio',
            'type' => 'text',
        ),
        'address' => array(
            'title' => 'Address',
            'type' => 'textarea',
        ),
        'latitude' => array(
            'title' => 'Latitude',
            'type' => 'text',
        ),
        'longitude' => array(
            'title' => 'Longitude',
            'type' => 'text',
        ),
        'available_for_help' => array(
            'title' => 'Available for help',
            'type' => 'bool',
        ), 'programming' => array(
            'title' => 'Programming',
            'type' => 'number',
            'thousands_separator' => '',
            'decimal_separator' => '.',
        ),
        'database' => array(
            'title' => 'Database',
            'type' => 'number',
            'thousands_separator' => '',
            'decimal_separator' => '.',
        ),
        'frontend' => array(
            'title' => 'Frontend',
            'type' => 'number',
            'thousands_separator' => '',
            'decimal_separator' => '.',
        ),
        'something' => array(
            'title' => 'Something',
            'type' => 'number',
            'thousands_separator' => '',
            'decimal_separator' => '.',
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
        'username' => array(
            'title' => 'Username',
            'type' => 'text',
        ),
        'year_of' => array(
            'title' => 'Year of',
            'type' => 'text',
        ),
        'first_name' => array(
            'title' => 'First Name',
            'type' => 'text',
        ),
        'last_name' => array(
            'title' => 'Last name',
            'type' => 'text',
        ),
        'email' => array(
            'title' => 'E-mail',
            'type' => 'text',
        ),
        'password' => array(
            'title' => 'Password',
            'type' => 'password',
        ),
        'avatar' => array(
            'title' => 'Image',
            'type' => 'image',
            'location' => storage_path() . '/app/img/avatars/',
            'naming' => 'random',
            'length' => 20,
            'size_limit' => 2
        ),
        'bio' => array(
            'title' => 'Bio',
            'type' => 'text',
        ),
        'address' => array(
            'title' => 'Address',
            'type' => 'textarea',
        ),
        'latitude' => array(
            'title' => 'Latitude',
            'type' => 'text',
        ),
        'longitude' => array(
            'title' => 'Longitude',
            'type' => 'text',
        ),
        'available_for_help' => array(
            'title' => 'Available for help',
            'type' => 'bool',
        ),
        'programming' => array(
            'title' => 'Programming',
            'type' => 'number',
            'thousands_separator' => '',
            'decimal_separator' => '.',
        ),
        'database' => array(
            'title' => 'Database',
            'type' => 'number',
            'thousands_separator' => '',
            'decimal_separator' => '.',
        ),
        'frontend' => array(
            'title' => 'Frontend',
            'type' => 'number',
            'thousands_separator' => '',
            'decimal_separator' => '.',
        ),
        'something' => array(
            'title' => 'Something',
            'type' => 'number',
            'thousands_separator' => '',
            'decimal_separator' => '.',
        ),
    )
);

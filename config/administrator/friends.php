<?php

return array(
    'title' => 'Friends',
    'single' => 'Friends',
    'model' => 'Community\Friends',
    /**
     * The display columns
     */
    'columns' => array(
        'user' => array(
            'title' => "User",
            'relationship' => 'user',
            'select' => "(:table).username",
        ),
        'friend' => array(
            'title' => "Friend",
            'relationship' => 'friend',
            'select' => "(:table).username",
        ),
        'accepted' => array(
            'title' => 'Status',
			'select' => "IF((:table).accepted, 'True', 'False')"
        )
    ),
    /**
     * The filter set
     */
    'filters' => array(
        'user_id' => array(
            'title' => 'user'
        ),
        'friend_id' => array(
            'title' => 'Friend'
        ),
        'accepted' => array(
            'title' => 'Status',
            'type' => 'bool',
						
        )
    ),
    /**
     * The editable fields
     */
    
    'edit_fields' => array(
        
        'user' => array(
            'title' => 'Username',
            'type' => 'relationship',
            'name_field' => 'username',
        ),
        'friend' => array(
            'title' => 'Friend',
            'type' => 'relationship',
            'name_field' => 'username',
        ),
        'accepted' => array(
            'title' => 'Status',
            'type' => 'bool',
        )
        
    )
);

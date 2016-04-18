<?php

return array(
    'title' => 'Tags',
    'single' => 'Tags',
    'model' => 'Community\Tags',
    /**
     * The display columns
     */
    'columns' => array(
        'name' => array(
            'title' => 'Name',
            'select' => 'name',
        ),
        'normalized' => array(
            'title' => 'Normalized',
            'select' => 'normalized',
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
        'name' => array(
            'title' => 'Name'
        ),
        'normalized' => array(
            'title' => 'Normalized'
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
        'name' => array(
            'title' => 'Name',
            'type' => 'text',
        ),
        'normalized' => array(
            'title' => 'Normalized',
            'type' => 'text',
        ),
    )
);

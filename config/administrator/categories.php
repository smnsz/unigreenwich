<?php

return array(
    'title' => 'Categories',
    'single' => 'Categories',
    'model' => 'Community\Categories',
    /**
     * The display columns
     */
    'columns' => array(
        'name' => array(
            'title' => 'Name',
            'select' => 'name',
        )
    ),
    /**
     * The filter set
     */
    'filters' => array(
        'name' => array(
            'title' => 'Name',
        )
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'name' => array(
            'title' => 'Name',
            'type' => 'text',
        )
    )
);

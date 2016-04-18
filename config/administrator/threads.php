<?php

return array(
    'title' => 'Threads',
    'single' => 'Threads',
    'model' => 'Community\Thread',
    /**
     * The display columns
     */
    'columns' => array(
        'subject' => array(
            'title' => 'subject',
            'select' => 'subject',
        )
    ),
    /**
     * The filter set
     */
    'filters' => array(
        'subject' => array(
            'title' => 'Subject',
        )
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'subject' => array(
            'title' => 'subject',
            'type' => 'text',
        ),
    )
);

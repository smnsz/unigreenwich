<?php

return array(
    'title' => 'Forum Threads Read',
    'single' => 'Forum Threads Read',
    'model' => 'Community\ForumThreadsRead',
    /**
     * The display columns
     */
    'columns' => array(
        'thread_id' => array(
            'title' => 'Thread',
            'select' => 'thread_id',
        ),
        'user_id' => array(
            'title' => 'User',
            'select' => 'user_id',
        )
    ),
    /**
     * The filter set
     */
    'filters' => array(
        'thread_id' => array(
            'title' => 'Thread'
        ),
        'user_id' => array(
            'title' => 'User'
        )
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'thread_id' => array(
            'title' => 'Thread',
            'type' => 'text',
        ),
        'user_id' => array(
            'title' => 'User',
            'type' => 'text',
        )
    )
);

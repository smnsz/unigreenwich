<?php

return array(
    'title' => 'Posts Tags',
    'single' => 'Posts Tags',
    'model' => 'Community\PostsTags',
    /**
     * The display columns
     */
    'columns' => array(
        'post_id' => array(
            'title' => 'Post',
            'select' => 'post_id',
        ),
        'tag_id' => array(
            'title' => 'Tag',
            'select' => 'tag_id',
        )
    ),
    /**
     * The filter set
     */
    'filters' => array(
        'post_id' => array(
            'title' => 'title'
        ),
        'tag_id' => array(
            'title' => 'content'
        )
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'post_id' => array(
            'title' => 'Post',
            'type' => 'text',
        ),
        'tag_id' => array(
            'title' => 'Tag',
            'type' => 'text',
        )
    )
);

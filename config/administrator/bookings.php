<?php

return array(
    'title' => 'Bookings',
    'single' => 'Bookings',
    'model' => 'Community\Booking',
    /**
     * The display columns
     */
    'columns' => array(
        'event' => array(
            'title' => 'Event',
            'select' => 'event',
        ),
        'booker' => array(
            'title' => 'Booker',
            'select' => 'booker',
        ),
        'note' => array(
            'title' => 'Note',
            'select' => 'note',
        ),
        'kicked' => array(
            'title' => 'Kicked',
            'select' => 'note',
        )
    ),
    /**
     * The filter set
     */
    'filters' => array(
        'event' => array(
            'title' => 'Event',
        ),
        'booker' => array(
            'title' => 'Booker',
        ),
        'note' => array(
            'title' => 'note',
        ),
        'kicked' => array(
            'title' => 'Kicked',
        )
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'event' => array(
            'title' => 'event',
            'type' => 'text',
        ),
        'booker' => array(
            'title' => 'booker',
            'type' => 'text'
        ),
        'note' => array(
            'title' => 'note',
            'type' => 'text'
        ),
        'kicked' => array(
            'title' => 'Kicked',
            'type' => 'text'
        )
    )
);

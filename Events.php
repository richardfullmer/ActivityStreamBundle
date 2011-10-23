<?php
/*
 *
 */

namespace Redpanda\Bundle\ActivityStreamBundle;

/**
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 */ 
final class Events
{
    /**
     * Event occurs when the action is persisted in the persistence layer
     */
    const onAction = 'activity_stream.action';
}

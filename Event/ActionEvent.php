<?php
/*
 *
 */

namespace Redpanda\Bundle\ActivityStreamBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Redpanda\Bundle\ActivityStreamBundle\Model\ActionInterface;

/**
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 */ 
class ActionEvent extends Event
{
    /**
     * @var \Redpanda\Bundle\ActivityStreamBundle\Model\ActionInterface
     */
    private $action;

    /**
     * @param \Redpanda\Bundle\ActivityStreamBundle\Model\ActionInterface $action
     */
    public function __construct(ActionInterface $action)
    {
        $this->action = $action;
    }

    /**
     * @return \Redpanda\Bundle\ActivityStreamBundle\Model\ActionInterface
     */
    public function getAction()
    {
        return $this->action;
    }


}

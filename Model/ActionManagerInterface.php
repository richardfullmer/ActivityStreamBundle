<?php
namespace Redpanda\Bundle\ActivityStreamBundle\Model;

use Redpanda\Bundle\ActivityStreamBundle\Model\ActionInterface;
use Redpanda\Bundle\ActivityStreamBundle\Streamable\StreamableInterface;
use FOS\UserBundle\Model\UserInterface;

interface ActionManagerInterface
{
    function createAction();
    
    function findStreamBy(array $criteria);
    
    function findStreamByActor(StreamableInterface $actor);
    
    function findStreamByTarget(StreamableInterface $target);

    function updateAction(ActionInterface $action);
    
    function getClass();
}
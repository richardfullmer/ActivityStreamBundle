<?php

namespace Redpanda\Bundle\ActivityStreamBundle\Model;

use Redpanda\Bundle\ActivityStreamBundle\Streamable\StreamableInterface;
use Symfony\Component\Security\Core\SecurityContext;

/**
 * @author Jimmy Leger <jimmy.leger@gmail.com>
 */
abstract class ActionManager implements ActionManagerInterface
{
    /**
     * @var \Symfony\Component\Security\Core\SecurityContext
     */
    protected $securityContext;

    /**
     * @param \Symfony\Component\Security\Core\SecurityContext $securityContext
     */
    public function __construct(SecurityContext $securityContext)
    {
        $this->securityContext = $securityContext;
    }
    
    /**
     * Returns an empty Action instance
     *
     * @return Action
     */
    public function createAction()
    {
        $class = $this->getClass();
        $action = new $class;

        return $action;
    }
    
    public function findStreamByActor(StreamableInterface $actor)
    {
        return $this->findStreamBy(array(
            'actorId' => $actor->getId(),
            'actorType' => get_class($actor)
        ));
    }
    
    public function findStreamByTarget(StreamableInterface $target)
    {
        return $this->findStreamBy(array(
            'targetId'   => $target->getId(),
            'targetType' => get_class($target)
        ));
    }
    
    public function send($verb, StreamableInterface $target = null, $actionObject = null)
    {
        $action = $this->createAction();

        $action->setVerb($verb);

        if (null === $actor = $this->securityContext->getToken()->getUser()) {
            throw new \LogicException('You must be logged');
        }

        $action->setActor($actor);

        if (null === $target) {
            throw new \LogicException('You must provide a target');
        }
        
        $action->setTarget($target);


        if (null !== $actionObject) {
            $action->setActionObject($actionObject);
        }

        $this->updateAction($action);
    }
}

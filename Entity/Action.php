<?php

namespace Redpanda\Bundle\ActivityStreamBundle\Entity;

use Redpanda\Bundle\ActivityStreamBundle\Model\Action as AbstractAction;

class Action extends AbstractAction
{
    public function setActor($actor)
    {
        $this->actorId = $actor->getId();

        $type = get_class($actor);
        $proxyClass = new \ReflectionClass($type);
        if ($proxyClass->implementsInterface('Doctrine\ORM\Proxy\Proxy')) {
            $type = $proxyClass->getParentClass()->getName();
        }

        $this->actorType = $type;
        $this->actor = $actor;
    }

    public function setTarget($target)
    {
        $this->targetId = $target->getId();

        $type = get_class($target);
        $proxyClass = new \ReflectionClass($type);
        if ($proxyClass->implementsInterface('Doctrine\ORM\Proxy\Proxy')) {
            $type = $proxyClass->getParentClass()->getName();
        }

        $this->targetType = $type;
        $this->target = $target;
    }

    public function setActionObject($actionObject)
    {
        $this->actionObjectId = $actionObject->getId();

        $type = get_class($actionObject);
        $proxyClass = new \ReflectionClass($type);
        if ($proxyClass->implementsInterface('Doctrine\ORM\Proxy\Proxy')) {
            $type = $proxyClass->getParentClass()->getName();
        }

        $this->actionObjectType = $type;
        $this->actionObject = $actionObject;
    }

}
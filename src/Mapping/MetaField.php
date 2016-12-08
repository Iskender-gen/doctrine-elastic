<?php

namespace DoctrineElastic\Mapping;

use Doctrine\ORM\Mapping\Annotation;

/**
 * @Annotation
 * @Target({"PROPERTY","ANNOTATION"})
 */
class MetaField implements Annotation {

    /** @var string */
    public $name;

    public function isValid() {
        return is_string($this->name);
    }

    public function getErrorMessage() {
        $baseMessage = "'%s' property wasn't set in %s annotation";

        if (!is_string($this->name)) {
            return sprintf($baseMessage, 'name', get_class($this));
        }

        return null;
    }
}
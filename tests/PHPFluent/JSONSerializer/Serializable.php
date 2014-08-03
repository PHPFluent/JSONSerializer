<?php
namespace PHPFluent\JSONSerializer\Test;

use PHPFluent\JSONSerializer\Serializer;

class Serializable extends Serializer
{
    /**
	 * @PHPFluent\JSONSerializer\Attribute
	 */
    private $name;
    /**
	 * @PHPFluent\JSONSerializer\Attribute
	 */
    private $related;

    public function setName($name)
    {
        $this->name = ucwords($name);

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setRelated(Related $related)
    {
        $this->related = $related;

        return $this;
    }

    public function getRelated()
    {
        return $this->related;
    }
}

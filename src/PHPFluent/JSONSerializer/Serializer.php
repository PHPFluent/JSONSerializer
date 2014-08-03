<?php
namespace PHPFluent\JSONSerializer;

use Notoj\ReflectionObject;

abstract class Serializer implements \JsonSerializable
{
    private $stdClass;

    private function serialize()
    {
        $this->stdClass = new \stdClass;
        $properties    = (new ReflectionObject($this))
                            ->getProperties();

        foreach ($properties as $property) {
            $data = $property->getAnnotations()
                             ->get('PHPFluent\JSONSerializer\Attribute');

            if ( count($data) == 0 || $data[0]['method'] != 'PHPFluent\JSONSerializer\Attribute') {
                continue;
            }

            $property->setAccessible(true);
            $this->stdClass->{$property->getName()} = $property->getValue($this);
        }
    }

    public function jsonSerialize()
    {
        $this->serialize();

        return $this->stdClass;
    }
}

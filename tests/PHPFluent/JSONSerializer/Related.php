<?php
namespace PHPFluent\JSONSerializer\Test;

use PHPFluent\JSONSerializer\Serializer;

class Related extends Serializer
{
	/**
	 * @PHPFluent\JSONSerializer\Attribute
	 */
	private $array;

	private $xuplau;

	public function setArray(array $array)
	{
		$this->array = $array;

		return $this;
	}

	public function getArray()
	{
		return $this->array;
	}
}
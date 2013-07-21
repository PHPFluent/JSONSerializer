<?php
require_once "vendor/autoload.php";

use PHPFluent\JSONSerializer\Serializer;

class Nested extends Serializer
{
	/**
	 * @PHPFluent\JSONSerializer\Attribute
	 */
	private $array;

	public function setArray(array $array)
	{
		$this->array = $array;

		return $this;
	}
}

class MyFancyClass extends Serializer
{
	/**
	 * @PHPFluent\JSONSerializer\Attribute
	 */
	private $email;

	/**
	 * @PHPFluent\JSONSerializer\Attribute
	 */
	private $nested;

	private $iWontBeSerialized;

	public function setEmail($email)
	{
		if ( ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
			throw new \InvalidArgumentException("Invalid email");
		}

		$this->email = $email;

		return $this;
	}

	public function setNested(Nested $nested)
	{
		$this->nested = $nested;

		return $this;
	}
}

$nested = (new Nested)->setArray(array(1, 2, 3));
$fancy  = (new MyFancyClass)->setEmail("foo@bar.com")->setNested($nested);

echo json_encode($fancy);

/*
$serialized = json_serialize(
	(new MyFancyClass)->setEmail("foo@bar.com")->setNested(
			(new Nested)->setArray(array(1, 2, 3))
		);
	);
*/

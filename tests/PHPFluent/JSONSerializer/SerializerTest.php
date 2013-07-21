<?php
/**
 * Copyright (c) 2013, PHPFluent.
 */
namespace PHPFluent\JSONSerializer\Test;

require_once "Related.php";
require_once "serializable.php";

/**
 * The Serializer Test
 *
 * @author Kinn Coelho Julião <kinncj@gmail.com>
 */
class SerializerTest extends \PHPUnit_Framework_TestCase
{
	public function testShouldSerialize()
	{
		$encode = json_encode(
			(new Serializable)->setName("Xuplau")
							  ->setRelated(
							  		(new Related)->setArray(array(1, 2, 3))
							  	)
		);
		
		$this->assertEquals('{"name":"Xuplau","related":{"array":[1,2,3]}}', $encode);
	}
}
JSONSerializer
=====

JSON Serializer implementation.
[![Build Status](https://api.travis-ci.org/PHPFluent/JSONSerializer.png)](https://travis-ci.org/PHPFluent/JSONSerializer)

Install:
  ```shell
  composer.phar require phpfluent/jsonserializer:dev-master
  ```
Usage:
  ```php
  <?php
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

  json_encode($fancy);
  /*
   $serialized = json_encode(
  	(new MyFancyClass)->setEmail("foo@bar.com")->setNested(
  			(new Nested)->setArray(array(1, 2, 3))
  		);
  	);
  */

  ```

Test:
  ```shell
  cd phpfluent/jsonserializer
  composer.phar install --dev
  make test
  ```

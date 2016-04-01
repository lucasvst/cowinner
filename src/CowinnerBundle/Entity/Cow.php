<?php

namespace CowinnerBundle\Entity;

use JMS\Serializer\Annotation\Type;

class Cow
{
	/**
	 * @var int $weight
	 *
	 * @Type("integer")
	 */
	protected $weight;
	
	/**
	 * @var int $age
	 *
	 * @Type("integer")
	 */
	protected $age;
	
	/**
	 * @var int $price
	 *
	 * @Type("double")
	 */
	protected $price;

	protected $lifeAverage = 20;
	protected $foodPerWeight;

	public function getWeight()
	{
		return $this->weight;
	}

	public function getAge()
	{
		return $this->age;
	}

	public function getPrice()
	{
		return $this->price;
	}

	public function setWeight($weight)
	{
		$this->weight = $weight;
		return $this;
	}

	public function setAge($age)
	{
		$this->age = $age;
		return $this;
	}

	public function setPrice($price)
	{
		$this->price = $price;
		return $this;
	}
}
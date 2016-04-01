<?php

namespace CowinnerBundle\Entity;

use JMS\Serializer\Annotation\Type;

class CowEntity implements ICowEntity
{
	/**
	 * @var $weight
	 *
	 * @Type("integer")
	 */
	protected $weight;
	
	/**
	 * @var $age
	 *
	 * @Type("integer")
	 */
	protected $age;
	
	/**
	 * @var $price
	 *
	 * @Type("double")
	 */
	protected $price;

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
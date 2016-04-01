<?php

namespace CowinnerBundle\Entity;

use Symfony\Component\Serializer\Annotation\Groups;

class Cow
{
	/**
	 * @Groups({"details"})
	 */
	protected $weight;
	
	/**
	 * @Groups({"details"})
	 */
	protected $age;
	
	/**
	 * @Groups({"details"})
	 */
	protected $price;

	protected $lifeAverage;
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
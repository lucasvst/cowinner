<?php

namespace CowinnerBundle\Entity;

use JMS\Serializer\Annotation\Type;
use Symfony\Component\Validator\Constraints as Assert;

class CowEntity implements ICowEntity
{
	protected $lifeTime = 20;
	protected $fatIndex = 0.03;

	/**
	 * @var $id
	 *
	 * @Type("integer")
	 */
	protected $id;

	/**
	 * @var $weight
	 *
	 * @Type("integer")
	 * @Assert\NotBlank
	 * @Assert\Type(
     *     type="integer"
     * )
	 */
	protected $weight;
	
	/**
	 * @var $age
	 * 
	 * @Type("integer")
	 * @Assert\NotBlank
	 * @Assert\LessThan(
	 * 		value = 20
	 * )
	 * @Assert\Type(
     *     type="integer"
     * )
	 */
	protected $age;
	
	/**
	 * @var $price
	 * @Assert\NotBlank
	 * @Assert\Type(
     *     type="double"
     * )
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

	public function getFatIndex()
	{
		return $this->fatIndex;
	}

	public function setLifeTime($lifeTime)
	{
		$this->lifeTime = $lifeTime;
		return $this;
	}

	public function getLifeTime()
	{
		return $this->lifeTime;
	}

	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}

	public function getId()
	{
		return $this->id;
	}
}
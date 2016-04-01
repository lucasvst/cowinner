<?php

namespace CowinnerBundle\Entity;

use JMS\Serializer\Annotation\Type;
use CowinnerBundle\Entity\ICostEntity;

class CostEntity implements ICostEntity
{
	/**
	 * @var int $grassPerWeight
	 *
	 * @Type("integer")
	 */
	protected $grassPerWeight;
	
	/**
	 * @var int $annualCost
	 *
	 * @Type("double")
	 */
	protected $annualCost;
	
	/**
	 * @var int $winner
	 *
	 * @Type("boolean")
	 */
	protected $winner;

	protected $cow;

	public function setCow($cow)
	{
		$this->cow = $cow;
	}

	public function getCow()
	{
		return $this->cow;
	}

	protected function getGrassPerWeight()
	{

	}

	protected function setGrassPerWeight()
	{

	}

	public function getAnnualCost()
	{
		
	}

	public function isWinner()
	{
		
	}
}
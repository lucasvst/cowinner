<?php

namespace CowinnerBundle\Entity;

use JMS\Serializer\Annotation\Type;

class CostEntity implements ICostEntity
{
	protected $grassPrice = 0.20;

	public function getGrassPrice()
	{
		return $this->grassPrice;
	}

	/**
	 * @var $grassPerWeight
	 *
	 * @Type("integer")
	 */
	protected $monthlyGrass;
	
	/**
	 * @var $annualCost
	 *
	 * @Type("double")
	 */
	protected $annualCost;
	
	/**
	 * @var $winner
	 *
	 * @Type("boolean")
	 */
	protected $winner;

	/**
	 * @var $annualCost
	 *
	 * @Type("double")
	 */
	protected $lifeCost;

	protected $cow;

	public function setCow($cow)
	{
		$this->cow = $cow;
		return $this;
	}

	public function getCow()
	{
		return $this->cow;
	}

	public function setMonthlyGrass($monthlyGrass)
	{
		$this->monthlyGrass = $monthlyGrass;
		return $this;
	}

	public function getMonthlyGrass()
	{
		return $this->monthlyGrass;
	}

	public function getAnnualCost()
	{
		return $this->annualCost;
	}

	public function setAnnualCost($annualCost)
	{
		$this->annualCost = $annualCost;
		return $this;
	}

	public function getLifeCost()
	{
		return $this->lifeCost;
	}

	public function setLifeCost($lifeCost)
	{
		$this->lifeCost = $lifeCost;
		return $this;
	}

	public function isWinner()
	{
		return $this->winner;
	}

	public function setWinner($bool)
	{
		$this->winner = $bool;
		return $this;
	}
}
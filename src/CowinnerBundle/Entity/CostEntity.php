<?php

namespace CowinnerBundle\Entity;

use JMS\Serializer\Annotation\Type;

class CostEntity implements ICostEntity
{
	/**
	 * @var $grassPerWeight
	 *
	 * @Type("integer")
	 */
	protected $grassPerWeight;
	
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

	public function setGrassPerWeight($grassPerWeight)
	{
		$this->grassPerWeight = $grassPerWeight;
		return $this;
	}

	public function getGrassPerWeight()
	{
		return $this->grassPerWeight;
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
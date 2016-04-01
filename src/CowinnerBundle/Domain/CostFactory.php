<?php

namespace CowinnerBundle\Domain;

use CowinnerBundle\Entity\CostEntity as Cost;
use CowinnerBundle\Entity\ICowEntity;

class CostFactory
{
	protected $cost;

	public function __construct()
	{
		$this->cost = new Cost();
	}

	public function build(ICowEntity $cow)
	{
		$this->cost->setCow($cow);

		$this->calculate();
		
		return $this->cost;
	}

	private function calculate()
	{
		$this->cost
			->setMonthlyGrass($this->calculateMonthlyGrass())
			->setAnnualCost($this->calculateAnnualCost())
			->setLifeCost($this->calculateLifeCost());
	}

	private function calculateMonthlyGrass()
	{
		$weight = $this->cost->getCow()->getWeight();
		$fatIndex = $this->cost->getCow()->getFatIndex();

		$monthlyGrass = ( $weight * $fatIndex ) * 30; //kg

		// echo $monthlyGrass;
		// exit;

		return $monthlyGrass;
	}

	private function calculateAnnualCost()
	{
		return ( $this->cost->getMonthlyGrass() * 12 ) * $this->cost->getGrassPrice(); // R$
	}

	private function calculateLifeCost()
	{
		return $this->cost->getAnnualCost() * ($this->cost->getCow()->getLifeTime() - $this->cost->getCow()->getAge());
	}
}
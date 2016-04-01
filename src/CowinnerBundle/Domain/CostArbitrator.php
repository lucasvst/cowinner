<?php

namespace CowinnerBundle\Domain;

class CostArbitrator
{
	protected $costs;

	public function arbitrate($costs)
	{
		$this->costs = $costs;
		$this->costs[0]->setWinner(true);
		return $this->costs;
	}
}
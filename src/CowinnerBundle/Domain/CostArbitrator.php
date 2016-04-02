<?php

namespace CowinnerBundle\Domain;

class CostArbitrator
{
	protected $costs;

	public function arbitrate($costs)
	{
		usort($costs, function($a,$b) {
            return strcmp($a->getLifeCost(), $b->getLifeCost());
        });

		$costs[0]->setWinner(true);
		
		return $costs;
	}
}
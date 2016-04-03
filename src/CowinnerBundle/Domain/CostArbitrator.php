<?php

namespace CowinnerBundle\Domain;

class CostArbitrator
{
	protected $costs;

	public function arbitrate($costs)
	{
		usort($costs, function($a,$b) {
            return ( $a->getLifeCost() + $a->getCow()->getPrice() ) > ( $b->getLifeCost() + $b->getCow()->getPrice() );
        });

		$costs[0]->setWinner(true);
		
		return $costs;
	}
}
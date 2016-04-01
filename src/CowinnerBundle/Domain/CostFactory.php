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
		
		return $this->cost;
	}
}
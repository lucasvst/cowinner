<?php

namespace CowinnerBundle\Traits;

trait LoggerTrait {

	protected function logMe($e)
    {
        $logger = $this->get('logger');
        $logger->error($e->getMessage() . ' : ' . $e->getCode());
        $logger->error($e->getTraceAsString());
    }
}
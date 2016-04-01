<?php

namespace CowinnerBundle\Service;

class ApiService
{
	public function fetchAll()
	{
		// aqui conecta http e traz o json

		$payload = [
		    [
		        'id' => 10,
		        'weight' => 200,
		        'age' => 200,
		        'price' => 1500
		    ],
		    [
		        'id' => 12,
		        'weight' => 180,
		        'age' => 15,
		        'price' => 1500
		    ],
		    [
		        'id' => 13,
		        'weight' => 250,
		        'age' => 19,
		        'price' => 800
		    ]
		];

		return $payload;
	}

	public function createCow(Cow $cow)
	{

	}
}
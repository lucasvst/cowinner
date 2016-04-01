<?php

namespace CowinnerBundle\Service;

use Symfony\Component\DependencyInjection\Container;

class CowService
{
	private $container;
	private $api;

	public function __construct(Container $c)
	{
		$this->container = $c;
		$this->api = $this->container->get('cow_api');
	}

	public function list()
	{
		$mock = "[\r\n    {\r\n        \"id\": 10,\r\n        \"weight\": 200,\r\n        \"age\": 200,\r\n        \"price\": 1500\r\n    },\r\n    {\r\n        \"id\": 12,\r\n        \"weight\": 180,\r\n        \"age\": 15,\r\n        \"price\": 1500\r\n    },\r\n    {\r\n        \"id\": 13,\r\n        \"weight\": 250,\r\n        \"age\": 19,\r\n        \"price\": 800\r\n    }\r\n]";

		return $mock;

		return $this->api->get('cows');
	}

	public function create($cow)
	{
		return $this->api->post('cows', $cow);
	}

	public function retrieve($id)
	{
		return $this->api->get("cows/{$id}");
	}

	public function update($id, $cow)
	{
		return $this->api->put("cows/{$id}", $cow);
	}

	public function delete($cow)
	{
		return $this->api->delete("cows/{$id}", $cow);
	}
}
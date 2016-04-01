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

	public function listCow()
	{
		$mock = "[\n\t{\n\t\t\"id\": 13,\n\t\t\"weight\": 250,\n\t\t\"age\": 19,\n\t\t\"price\": 800\n\t},\n\t{\n\t\t\"id\": 14,\n\t\t\"weight\": 254,\n\t\t\"age\": 17,\n\t\t\"price\": 300\n\t}\n]";
		// $mock = "{\n\t\t\"id\": 13,\n\t\t\"weight\": 250,\n\t\t\"age\": 19,\n\t\t\"price\": 800\n\t}";

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
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
		$res = $this->api->get('cows');
		// var_dump($res->getBody()->getContents());exit;

		return $res->getBody();
	}

	public function create($cow)
	{
		return $this->api->post('cows', [ 'json' => $cow ]);
	}

	public function delete($id)
	{
		return $this->api->delete("cows/{$id}");
	}
}
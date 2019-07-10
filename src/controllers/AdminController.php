<?php 

use Psr\Container\ContainerInterface;

use Model\User;
use Model\Post;

class AdminController 
{

	protected $container;

	public function __construct(ContainerInterface $container) 
	{
		$this->container = $container;
	}





}
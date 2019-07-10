<?php 

use Psr\Container\ContainerInterface;

use Model\User;

class AuthController 
{

	protected $container;

	public function __construct(ContainerInterface $container) 
	{
		$this->container = $container;
	}

	public function showForm($request, $response, $args) 
	{
        $name = $request->getAttribute('csrf_name');
        $value = $request->getAttribute('csrf_value');
		$this->container->view->render($response, 'pages/login.html', ['name' => $name, 'value' => $value]);
		return $response;
	}

	public function auth($request, $response, $args) 
	{
		$user = new User;
		$credentails = $request->getParams();

	    if ($user->checKUser($credentails['email'], $credentails['password'])) {
			setcookie('auth', 'true', strtotime('+7 days'), '/');
			setcookie('email', $credentails['email'], strtotime('+7 days'), '/');
			setcookie('secret', password_hash($credentails['password'], PASSWORD_DEFAULT), strtotime('+7 days'), '/');
			$this->container->logger->addInfo('success');
			return $response->withRedirect('/admin/posts');
	  	}
		
		$this->container->logger->addInfo('failed');

		return $response->withRedirect('/login');

	}

	public function logout($request, $response, $args) 
	{
		unset($_COOKIE['auth']);
		unset($_COOKIE['email']);
		unset($_COOKIE['secret']);
		setcookie('auth', '', time() - 3600, '/');
		setcookie('email', '', time() - 3600, '/');
		setcookie('secret', '', time() - 3600, '/');

		return $response->withRedirect('/login');
	}



}
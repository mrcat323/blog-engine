<?php 

use Psr\Container\ContainerInterface;

use \Model\Post;
use \Model\Comment;

class CommentController 
{

	protected $container;

	public function __construct(ContainerInterface $container) 
	{
		$this->container = $container;
	}


	public function store($request, $response, $args) 
	{
		$data = $request->getParams();
		$postId = $data['id'];
		$name = $data['name'];
		$email = $data['email'];
		$text = $data['comment'];
		
		$comment = new Comment([
			'name' => $name,
			'email' => $email,
			'comment' => $text
		]);
		$post = Post::find($postId);

		$post->comments()->save($comment);

		$router = $this->container->get('router');

		return $response->withRedirect($router->pathFor('post', ['id' => $postId]));
	}

}
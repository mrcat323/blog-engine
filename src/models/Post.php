<?php 

namespace Model;

use \Illuminate\Database\Eloquent\Model;


class Post extends Model 
{
	protected $table = 'stories';
	public $timestamps = false;
	protected $fillable = ['title', 'text', 'pub_date'];

	const CREATED_AT = 'pub_date';



}
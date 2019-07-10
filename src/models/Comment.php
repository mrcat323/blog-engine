<?php

namespace Model;

use \Illuminate\Database\Eloquent\Model;

class Comment extends Model 
{

	protected $table = 'comments';
	public $timestamps = false;

	protected $fillable = ['name', 'email', 'comment'];
	protected $guarded = ['id'];

}
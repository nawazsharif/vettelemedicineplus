<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryDoctor extends Model
{
	protected $table = 'categories_doctors';

	public function doctors()
	{
		return $this->hasMany('App\User', 'id');
	}
}
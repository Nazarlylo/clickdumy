<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clickdumy extends Model
{
	protected $fillable = [
		'user_id', 'group_id', 'name','url','protection','sort_image'
	];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	protected $fillable = [
		'clickdum_id', 'title','images','numb_img','sort_image'
	];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
	/**
	 * Table associated with model
	 * 
	 * @var string
	 */
	protected $table = 'data';

	/**
	 * Define fillable fields in table
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
	];
}

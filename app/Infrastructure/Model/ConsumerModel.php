<?php

namespace App\Infrastructure\Model;

use Illuminate\Database\Eloquent\Model;

class ConsumerModel extends Model
{
	protected $table = "consumer";

	protected $primaryKey = 'id';

	public $timestamps = true;
}
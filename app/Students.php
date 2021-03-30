<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    public function courses()
	{
		return $this->belongsToMany(Course::class)->withTimestamps();
	}
}

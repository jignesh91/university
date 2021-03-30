<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    public function students()
	{
		return $this->belongsToMany(Student::class)->withTimestamps();
	}

	public function teachers()
	{
		return $this->belongsToMany(Teacher::class)->withTimestamps();
	}
}

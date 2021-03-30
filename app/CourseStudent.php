<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Model
{
    protected $table = 'course_student';

	public function course()
	{
	    return $this->belongsTo(Course::class)->withTimestamps();
	}

	public function student()
	{
	    return $this->belongsTo(Student::class)->withTimestamps();
	}

	public function teachers()
	{
	    return $this->belongsToMany(Teacher::class, 'course_student_teacher')->withTimestamps();
	}
}

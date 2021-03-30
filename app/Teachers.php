<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
	public function courses()
  	{
    	return $this->belongsToMany(Course::class)->withTimestamps();
  	}

  	// Get Courses or Students which is taught by teacher.
  	public function courseStudents()
  	{
    	return $this->belongsToMany(CourseStudent::class, 'course_student_teacher')->withTimestamps();
  	}

  	// List Of Students Currently Taught For Different Courses
	public function allStudentsCurrentlyTaught()
	{
	    return $this->courseStudents()->get()->map(function($courseStudent) {
	       return $courseStudent->student;
	    })->unique('id');
	}

    // List Of Courses Currently Taught To Different Students
    public function coursesCurrentlyTaughtToStudents()
    {
        return $this->courseStudents()->get()->map(function($courseStudent) {
            return $courseStudent->course;
        })->unique('id');
    }

    // Get Particular course ( Student wise )
    public function coursesTaughtToAStudent($studentId)
    {
        return $this->courseStudents()->get()->where('student_id', $studentId)->map(function($courseStudent) {
            return $courseStudent->course;
        });
    }

    // Get specific Course wise Students.
    public function coursesTaughtForACourse($courseId)
    {
        return $this->courseStudents()->get()->where('course_id', $courseId)->map(function($courseStudent) {
            return $courseStudent->course;
        });
    }
}

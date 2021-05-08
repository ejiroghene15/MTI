<?php

namespace App\Http\Controllers;

use App\Models\AssignedCourse;
use App\Models\Courses;
use App\Models\Upcoming;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Admin extends Controller
{
    public function verify($password)
    {
        if ($password == "Pazzw0rd!") {
            session(['authenticated' => true]);
            echo "true";
        }
    }

    public function logs()
    {
        $users = User::all();
        $upcoming = Upcoming::all();
        return view('admin.index')->withUsers($users)->withUpcoming($upcoming);
    }

    public function createCourse(Request $request)
    {
        $course = new Courses;
        $course->course_title = $request->course_name;
        $course->excerpt = $request->excerpt;
        $course->image = $request->course_background;
        $course->slug =  Str::slug(Str::lower($request->course_name), '-');
        $course->tutor_id = $request->tutor;
        $course->course_description = $request->course_description;
        $course->save();
        return back()->withMessage("The course '$request->course_name' has been created and assigned to a tutor")->withType('success');
    }

    public function updateCourse(Request $request)
    {
        $course = Courses::find($request->course_id);
        $course->course_title = $request->course_title;
        $course->excerpt = $request->excerpt;
        $course->image = $request->course_background;
        $course->slug =  Str::slug(Str::lower($request->course_title), '-');
        $course->tutor_id = $request->tutor;
        $course->course_description = $request->course_description;
        $course->save();
        return back()->withMessage("Course has been updated")->withType('success');
    }

    public function deleteCourse(Request $request)
    {
        Courses::destroy($request->course_id);
        return back()->withMessage("Course '$request->course_name' has been deleted")->withType('success');
    }

    public function createClass(Request $request)
    {
        $event = new Upcoming;
        $event->name = $request->course_name;
        $event->excerpt = $request->excerpt;
        $event->tutor_id = $request->tutor;
        $event->image = $request->course_background;
        $event->link_id =  bin2hex($request->course_name);
        $event->description = $request->course_description;
        $event->save();
        return back()->withMessage("Upcoming class $request->course_name has been created")->withType('success');
    }

    public function deleteClass(Request $request)
    {
        Courses::destroy($request->course_id);
        return back()->withMessage("Class '$request->course_name' has been deleted")->withType('success');
    }
}

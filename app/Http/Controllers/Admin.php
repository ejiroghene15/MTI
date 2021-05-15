<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Courses;
use App\Models\Upcoming;
use App\Models\User;
use DateTime;
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
        $classes = Classes::all();
        return view('admin.index')->withUsers($users)->withUpcoming($upcoming)->withClasses($classes);
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

    public function createEvent(Request $request)
    {
        $event = new Upcoming;
        $event->type = $request->type;
        $event->price = $request->price;
        $event->name = $request->name;
        $event->tutor_id = $request->tutor;
        $event->link_id =  bin2hex($request->name);
        $event->image = $request->background;
        $event->excerpt = $request->excerpt;
        $event->description = $request->description;
        $event->save();
        return back()->withMessage("Upcoming event $request->name has been created")->withType('success');
    }

    public function updateEvent(Request $request)
    {
        $event = Upcoming::find($request->event_id);
        $event->type = $request->type;
        $event->price = $request->price;
        $event->name = $request->name;
        $event->tutor_id = $request->tutor;
        $event->link_id =  bin2hex($request->name);
        $event->image = $request->background;
        $event->excerpt = $request->excerpt;
        $event->description = $request->description;
        $event->save();
        return back()->withMessage("Event has been updated")->withType('success');
    }

    public function deleteEvent(Request $request)
    {
        Upcoming::destroy($request->event_id);
        return back()->withMessage("Event '$request->event_name' has been deleted")->withType('success');
    }

    public function createClass(Request $request)
    {
        // $exp_date = new DateTime($_POST['expiration']);
        // $expiration = $exp_date->getTimestamp();
        $class = new Classes;
        $class->name = $request->name;
        $class->price = $request->price;
        $class->original_price = $request->original_price;
        $class->link_id = bin2hex(trim($request->name) . random_bytes(5));
        $class->tutor_id = $request->tutor;
        $class->course_outline = $request->outline;
        $class->image = $request->background;
        $class->excerpt = $request->excerpt;
        $class->description = $request->description;
        $class->start = $request->start;
        $class->end = $request->end;
        $class->end_registration = $request->close_reg;
        $class->save();
        return back()->withMessage("Class $request->name has been created")->withType('success');
    }

    public function updateClass(Request $request)
    {
        // $exp_date = new DateTime($_POST['expiration']);
        // $expiration = $exp_date->getTimestamp();
        $class = Classes::find($request->class_id);
        $class->name = $request->name;
        $class->price = $request->price;
        $class->original_price = $request->original_price;
        $class->tutor_id = $request->tutor;
        $class->course_outline = $request->outline;
        $class->image = $request->background;
        $class->excerpt = $request->excerpt;
        $class->description = $request->description;
        $class->start = $request->start;
        $class->end = $request->end;
        $class->end_registration = $request->close_reg;
        $class->save();
        return back()->withMessage("Class $request->name has been updated")->withType('success');
    }

    public function deleteClass(Request $request)
    {
        Classes::destroy($request->class_id);
        return back()->withMessage("Class '$request->class_name' has been deleted")->withType('success');
    }
}

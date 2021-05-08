<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Upcoming;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class General extends Controller
{
    public function index()
    {
        $upcoming = Upcoming::all()->last();

        $blogs =  DB::connection('wordpress')->table('wpia_posts')->where(
            [
                ['post_type', '=', 'post'],
                ['post_status', '=', 'publish'],
            ]
        )->latest('post_date')->take(3)->get();

        $post_id = $blogs->map(function ($post) {
            return $post->ID;
        });

        $attachments =  DB::connection('wordpress')
            ->table('wpia_posts')
            ->where('post_type', '=', 'attachment')
            ->whereIn('post_parent', $post_id)->get();

        return view('index')->withUpcoming($upcoming)->withBlogposts($blogs)->withAttachment($attachments);
    }

    public function upcoming(Upcoming $upcoming)
    {
        return view('event')->withUpcoming($upcoming);
    }

    public function courses(Courses $course)
    {
        $more = Courses::where('id', '<>', $course->id)
            ->inRandomOrder()
            ->take(2)
            ->get();
        return view('pages.courses.course')->withCourse($course)->withMore($more);
    }
}

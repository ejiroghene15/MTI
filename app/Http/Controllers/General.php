<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Courses;
use App\Models\Payments;
use App\Models\Upcoming;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class General extends Controller
{

    public function index()
    {
        $upcoming_class = Classes::all()->last();

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

        return view('index')->withClass($upcoming_class)->withBlogposts($blogs)->withAttachment($attachments);
    }

    public function courses(Courses $course)
    {
        $more = Courses::where('id', '<>', $course->id)
            ->inRandomOrder()
            ->take(3)
            ->get();
        return view('pages.courses.course')->withCourse($course)->withMore($more);
    }

    public function upcoming(Upcoming $upcoming)
    {
        session(['prev-url' => url()->current()]);
        return view('event')->withUpcoming($upcoming);
    }

    public function classDetails(Classes $classes)
    {
        session(['prev-url' => url()->current()]);
        return view('class')->withClass($classes);
    }

    public function makePayment(Classes $classes)
    {
        $payment = new Payments;
        $tx_ref = bin2hex(random_bytes(20));
        $class = $classes;
        $payment->event_id = $class->id;
        $payment->event_type = "class";
        $payment->event_name = $class->name;
        $payment->event_link_id = $class->link_id;
        $payment->secret_key = $tx_ref;
        $payment->user = auth()->user()->email;
        $payment->amount = $class->price;
        $payment->save();
        return back()->withStatus('payment_initiated')->withToken($tx_ref);
    }

    public function confirmPayment(Request $request)
    {
        $tx_id = $request->query('transaction_id');
        $tx_ref = $request->query('tx_ref');
        $requery_payment_status = $this->requeryPayment($tx_id)->status;
        if ($requery_payment_status == "success") {
            $payment = Payments::where('secret_key', $tx_ref);
            $payment->update([
                'payment_status' => 1,
                'tx_id' => $tx_id
            ]);
            $pd = $payment->get()->first();
            return redirect()->route('class', $pd->event_link_id)->withMessage('Payment confirmed')->withType('success');
        }
    }

    public function requeryPayment($tx_id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/$tx_id/verify",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Bearer FLWSECK-b0151b21317e5df6e0a663553e042891-X"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }
}

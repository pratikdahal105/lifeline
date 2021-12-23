<?php

namespace App\Http\Controllers;

use App\Modules\About\Model\About;
use App\Modules\Booking\Model\Booking;
use App\Modules\Booking_info\Model\Booking_info;
use App\Modules\Message\Model\Message;
use App\Modules\Parking\Model\Parking;
use App\Modules\Privacy\Model\Privacy;
use App\Modules\Staff\Model\Staff;
use App\Modules\Term\Model\Term;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $page['title'] = 'Lifeline | Home';

        return view('frontend.home')->with(compact('page'));
    }

    public function about()
    {
        $page['title'] = 'Lifeline | About';

        $about = About::select('body')->first();
        return view('frontend.about')->with(compact('page', 'about'));
    }

    public function booking(\Illuminate\Http\Request $request)
    {
        if($request->isMethod('get')){
            $page['title'] = 'Lifeline | Book Staff';
            $parking_info = Parking::all();
            $staffs = Staff::all();
            return view('frontend.booking')->with(compact('page', 'parking_info', 'staffs'));
        }
        if($request->isMethod('post')){
            $booking = Booking::create([
                'full_name' => $request->full_name,
                'company_name' => $request->company_name,
                'postcode' => $request->postcode,
                'contact' => $request->contact,
                'email' => $request->email,
                'special_requirement' => $request->special_requirement,
                'parking_id' => $request->parking_id,
                'other' => $request->other,
            ]);
            $count = count($request->staff);
            $booking_info = new Booking_info();
            for ($i = 0; $i < $count; $i++) {
                $booking_info_data['booking_id'] = $booking->id;
                $booking_info_data['staff_id'] = $request->staff[$i];
                $booking_info_data['date'] = $request->date[$i];
                $booking_info_data['from'] = $request->from[$i];
                $booking_info_data['to'] = $request->to[$i];
                $booking_info->create($booking_info_data);
            }
            return redirect()->back()->with('success', 'Booking Successful!');
        }
    }

    public function contact(Request $request)
    {
        if($request->isMethod('get')){
            $page['title'] = 'Lifeline | Contact';
            return view('frontend.contact')->with(compact('page'));
        }
        if($request->isMethod('post')){
            $message = Message::create([
                'full_name' => $request->full_name,
                'email' => $request->email,
                'message' => $request->message,
            ]);

            return redirect()->back()->with('success', 'Message Successfully Sent!');
        }
    }

    public function terms()
    {
        $page['title'] = 'Lifeline | Terms and Conditions';

        $term = Term::select('body')->first();
        return view('frontend.terms')->with(compact('page', 'term'));
    }

    public function privacy()
    {
        $page['title'] = 'Lifeline | Privacy Policy';

        $privacy = Privacy::select('body')->first();
        return view('frontend.privacy')->with(compact('page', 'privacy'));
    }
}

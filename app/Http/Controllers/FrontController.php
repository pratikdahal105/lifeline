<?php

namespace App\Http\Controllers;

use App\Modules\About\Model\About;
use App\Modules\Booking\Model\Booking;
use App\Modules\Booking_info\Model\Booking_info;
use App\Modules\Job\Model\Job;
use App\Modules\Job_application\Model\Job_application;
use App\Modules\Message\Model\Message;
use App\Modules\Parking\Model\Parking;
use App\Modules\Privacy\Model\Privacy;
use App\Modules\Staff\Model\Staff;
use App\Modules\Team\Model\Team;
use App\Modules\Term\Model\Term;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /** test
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
        $staffs = Staff::all();
        return view('frontend.home')->with(compact('page', 'staffs'));
    }

    public function about()
    {
        $page['title'] = 'Lifeline | About';
        $teams = Team::all();
        $about = About::select('body')->first();
        return view('frontend.about')->with(compact('page', 'about', 'teams'));
    }

    public function booking(Request $request)
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
                'subject' => $request->subject,
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

    public function job()
    {
        $page['title'] = 'Lifeline | Career Opportunities';
        $checkTime = Carbon::now()->format('Y-m-d');
        $jobs_disable = Job::whereDate('till', '<=', $checkTime)->get();
        foreach ($jobs_disable as $job){
            $data['status'] = 0;
            $job->update($data);
        }

        $jobs = Job::where('status', 1)->get();
        return view('frontend.jobs')->with(compact('page', 'jobs'));
    }

    public function jobApplication(Request $request, $slug)
    {
        if($request->isMethod('get')){
            $job = Job::where('slug',$slug)->first();
            $page['title'] = 'Lifeline | Job Application';
            return view('frontend.apply_job')->with(compact('page', 'job'));
        }
        if($request->isMethod('post')){
            $request->validate([
                'cv' => 'required|mimes:pdf,docx,jpeg,png,jpg'
            ]);
            $application = new Job_application();
            $job = Job::where('slug', $slug)->first();
            $data = [
                'full_name' => $request->full_name,
                'phone' => $request->phone,
                'email' => $request->email,
                'no_of_days' => $request->no_of_days,
                'job_id' => $job->id,
                'drive' => $request->drive,
                'access_to_car' => $request->car,
                'postcode' => $request->post_code,

            ];
            if ($request->hasFile('cv')) {
                $file = $request->file('cv');
                $uploadPath = public_path('uploads/resume/');
                $data['cv'] = $this->fileUpload($file, $uploadPath);
            }
            if($application->create($data)){
                return redirect()->back()->with('success', 'Application Submitted Successfully!');
            }
            else{
                return redirect()->back()->with('error', 'Something went wrong please try again!');
            }
        }
    }

    public function fileUpload($file, $path){
        $ext = $file->getClientOriginalExtension();
        $imageName = md5(microtime()) . '.' . $ext;
        if (!$file->move($path, $imageName)) {
            return redirect()->back();
        }
        return $imageName;
    }
}

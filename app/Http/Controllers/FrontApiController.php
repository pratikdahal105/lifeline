<?php

namespace App\Http\Controllers;

use App\Modules\Booking\Model\Booking;
use App\Modules\Booking_info\Model\Booking_info;
use App\Modules\Job\Model\Job;
use App\Modules\Job_application\Model\Job_application;
use App\Modules\Message\Model\Message;
use App\Modules\Parking\Model\Parking;
use App\Modules\Privacy\Model\Privacy;
use App\Modules\Staff\Model\Staff;
use App\Modules\Term\Model\Term;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontApiController extends Controller
{
    public function booking(Request $request)
    {
        if ($request->isMethod('get')) {
            $parking_info = Parking::select('id', 'type')->get();
            $staffs = Staff::select('id', 'type')->get();
            $data = [
                'staffs' => $staffs,
                'parking_info' => $parking_info
            ];
            return json_encode($data);
        }
        if ($request->isMethod('post')) {
            try {
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
                $count = count($request->staff_id);
                $booking_info = new Booking_info();
                for ($i = 0; $i < $count; $i++) {
                    $booking_info_data['booking_id'] = $booking->id;
                    $booking_info_data['staff_id'] = $request->staff_id[$i];
                    $booking_info_data['date'] = $request->date[$i];
                    $booking_info_data['from'] = $request->from[$i];
                    $booking_info_data['to'] = $request->to[$i];
                    if ($booking_info->create($booking_info_data)) {
                        continue;
                    } else {
                        foreach ($booking_info->where('booking_id', $booking->id)->get() as $info) {
                            $info->delete();
                        }
                        $booking->delete();
                        return 'Failure';
                    }

                }
                return 'Success';
            } catch (\Exception $e) {
                return 'Failure';
            }
        }
    }

    public function contact(Request $request)
    {
        $message = Message::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->contact_message,
        ]);
        return 'Success';
    }

    public function terms()
    {
        $term = Term::select('body')->first();
        return json_encode($term);
    }

    public function privacy()
    {
        $privacy = Privacy::select('body')->first();
        return json_encode($privacy);
    }

    public function job()
    {
        $checkTime = Carbon::now()->format('Y-m-d');
        $jobs_disable = Job::whereDate('till', '<=', $checkTime)->get();
        foreach ($jobs_disable as $job){
            $data['status'] = 0;
            $job->update($data);
        }
        $jobs = Job::where('status', 1)->get();
        return json_encode($jobs);
    }

    public function jobApplication(Request $request, $slug)
    {
        if($request->isMethod('get')){
            $job = Job::where('slug',$slug)->select('slug')->first();
            return json_encode($job);
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
                return 'Success';
            }
            else{
                return 'Failure';
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

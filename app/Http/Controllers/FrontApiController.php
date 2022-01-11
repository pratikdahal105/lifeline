<?php

namespace App\Http\Controllers;

use App\Modules\Booking\Model\Booking;
use App\Modules\Booking_info\Model\Booking_info;
use App\Modules\Parking\Model\Parking;
use App\Modules\Staff\Model\Staff;
use Illuminate\Http\Request;

class FrontApiController extends Controller
{
    public function booking(Request $request)
    {
        if($request->isMethod('get')){
            $parking_info = Parking::select('id', 'type')->get();
            $staffs = Staff::select('id', 'type')->get();
            $data = [
                'staffs' => $staffs,
                'parking_info' => $parking_info
            ];
            return json_encode($data);
        }
        if($request->isMethod('post')){
            try{
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
                    if($booking_info->create($booking_info_data)){
                        continue;
                    }
                    else{
                        foreach ($booking_info->where('booking_id', $booking->id)->get() as $info){
                            $info->delete();
                        }
                        $booking->delete();
                        return 'Failure';
                    }

                }
                return 'Success';
            }catch (\Exception $e){
                return 'Failure';
            }
        }
    }
}

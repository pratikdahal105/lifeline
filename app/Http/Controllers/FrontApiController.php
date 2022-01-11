<?php

namespace App\Http\Controllers;

use App\Modules\Parking\Model\Parking;
use App\Modules\Staff\Model\Staff;
use Illuminate\Http\Request;

class FrontApiController extends Controller
{
    public function booking(Request $request)
    {
        if($request->isMethod('get')){
            $page['title'] = 'Lifeline | Book Staff';
            $parking_info = Parking::select('id', 'type')->get();
            $staffs = Staff::select('id', 'type')->get();
            $data = [
                'staffs' => $staffs,
                'parking_info' => $parking_info
            ];
            return json_encode($data);
        }
    }
}

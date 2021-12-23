<?php

namespace App\Modules\Booking_info\Model;
use App\Modules\Booking\Model\Booking;
use App\Modules\Staff\Model\Staff;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Model;

class Booking_info extends Model
{
    use SoftDeletes;
    public  $table = 'booking_info';

    protected $fillable = ['id','booking_id','staff_id','date','from','to','deleted_at','created_at','updated_at',];

    public function booking(){
        return $this->belongsTo(Booking::class, 'booking_id', 'id');
    }

    public function staff(){
        return $this->belongsTo(Staff::class, 'staff_id', 'id');
    }
}

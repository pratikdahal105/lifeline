<?php

namespace App\Modules\Booking\Model;
use App\Modules\Booking_info\Model\Booking_info;
use App\Modules\Parking\Model\Parking;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use SoftDeletes;
    public  $table = 'booking';

    protected $fillable = ['id','full_name','company_name','postcode','contact','email','special_requirement','parking_id','other','status','deleted_at','created_at','updated_at',];

    public function parking(){
        return $this->hasOne(Parking::class, 'id', 'parking_id');
    }

    public function booking_infos(){
        return $this->hasMany(Booking_info::class, 'booking_id', 'id');
    }
}

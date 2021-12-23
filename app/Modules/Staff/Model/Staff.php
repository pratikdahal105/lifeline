<?php

namespace App\Modules\Staff\Model;
use App\Modules\Booking_info\Model\Booking_info;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use SoftDeletes;
    public  $table = 'staff';

    protected $fillable = ['id','type','deleted_at','created_at','updated_at',];

    public function booking_infos(){
        return $this->hasMany(Booking_info::class, 'staff_id', 'id');
    }
}

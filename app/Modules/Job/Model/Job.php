<?php

namespace App\Modules\Job\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use SoftDeletes;
    public  $table = 'jobs';

    protected $fillable = ['id','position','number','requirements','till','status','deleted_at','created_at','updated_at',];
}

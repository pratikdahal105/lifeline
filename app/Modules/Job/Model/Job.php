<?php

namespace App\Modules\Job\Model;
use App\Modules\Job_application\Model\Job_application;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use Sluggable;
    use SoftDeletes;
    public  $table = 'jobs';

    protected $fillable = ['id','slug','position','number','requirements','till','status','deleted_at','created_at','updated_at',];

    public function job_applications(){
        return $this->hasMany(Job_application::class, 'job_id', 'id');
    }

    public function sluggable(){
        return  [
            'slug' => [
                'source' => 'position'
            ]
        ];
    }
}

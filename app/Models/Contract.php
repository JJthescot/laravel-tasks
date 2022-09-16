<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'desc'];//, 'job_idJob'];

    public function jobs(){
        return $this->hasMany( Job::class )->with('messages');
    }
    public function messages(){
        return $this->morphMany('App\Models\Message', 'messagable');
    }
/*
    public function messages(){
        return $this->hasMany( Message::class )->whereNull('messages.job_id');//->where('job_id', "=", "0");
    }
*/
}

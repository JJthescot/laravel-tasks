<?php

namespace App\Models;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = ['jobNumber', 'contract_id'];
    public function contract(){
        return $this->belongsTo(Contract::class);
    }
    public function messages(){
        return $this->morphMany('App\Models\Message', 'messagable');
    }

/*
    public function messages(){
        return $this->hasMany(Message::class)->where('job_id','=',$this->job_id);//->where('messages.job_id','=',$this->job_id);
    }
*/
}

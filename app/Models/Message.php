<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['messageContent', 'message_types_id', 'contract_id', 'jobs_id',];
    public function messagable(){
        return $this->morphTo();
    }
/*
    public function contracts()
    {
        return $this->morphedByMany(Contract::class, 'message_link');
    }
    public function jobs()
    {
        return $this->morphedByMany(Job::class, 'message_link');
    }
*/
/*    public function job(){
        return $this->belongsTo(Job::class);
    }
    public function contract(){
        return $this->belongsTo(Contract::class);
    }
*/
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $guarded = '';
    public function unit() {
        return $this->belongsTo('App\Models\Unit');
    }
    public function survey() {
        return $this->belongsTo('App\Models\Survey');
    }    
}

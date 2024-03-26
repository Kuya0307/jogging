<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogging extends Model
{
    use HasFactory;
    protected $table = 'jogging';
    protected $guarded = array('id');
    public static $rules = [
        'date' => 'required',
        'distance' => 'required',
    ];
    public static $messages =[
        'date.required' => '日付を入力してください',
        'distance.required' => '距離を入力してください',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function scopeDate($query,$date){
        return $query->where('date',$date);
    }
}

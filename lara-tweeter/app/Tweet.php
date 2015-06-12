<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model {

	//
    protected $fillable = ['content','user_id'];

//    protected $appends = ['human_date'];
//    protected $appends = ['performed_at_year_month'];
//
//    public function getPerformedAtYearMonthAttribute()
//    {
//        return 'hello';
////        if ( !empty( $this->attributes['created_at'] ) ) {
////            return Carbon::parse($this->attributes['created_at'])->format('Y-m');
////        }
//    }


    public function user(){

        return $this->belongsTo('App\User');
    }

    public function comment(){

        return $this->hasMany('App\Comment');
    }

    public function getDates()
    {
        return ['created_at'];
    }

}

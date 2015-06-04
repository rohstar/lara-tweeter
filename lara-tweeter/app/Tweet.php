<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model {

    protected $fillable = ['content','user_id'];

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

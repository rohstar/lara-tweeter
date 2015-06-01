<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model {


    protected $table = 'friends';

    protected $fillable = ['id', 'user_id'];

	public function user(){

        $this->belongsTo('App\User');

    }

}

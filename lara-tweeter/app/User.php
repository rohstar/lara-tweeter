<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    public function tweets(){

        return $this->hasMany('App\Tweet');

    }
/*

Handling Friendships

*/
    /**
     * get all friends associated with given User
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function friends()
    {
        return $this->belongsToMany('App\User','friends','user_id','friend_id');
    }

    public function addFriend($friendId)
    {
        $this->friends()->attach($friendId);
    }

    public function removeFriend($friendId)
    {
        $this->friends()->detach($friendId);
    }

    public function follows($friend_id){

        $friend_ = $this->friends->lists('id');
        //add User's id too
        $friend_[] = $this->id;
        if (in_array($friend_id, $friend_)) {
            return true;
        } else return false;
    }

    public function followers(){
        $user = $this->id;
        $followers = DB::table('friends')->where('friend_id', $user)->lists('user_id');
        return $followers;
    }

}

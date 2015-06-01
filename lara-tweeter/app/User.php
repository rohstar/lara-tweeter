<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Auth;

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
        return $this->hasMany('App\Friend');
    }

    public function follows($user_id, $friend_id){

        $friend = $this->friends()->where('user_id', $user_id)->where('friend_id',$friend_id);

        if($friend){return true;}
        return false;

    }

    public function loggedInFollows($friend_id){

        $friend = $this->friends()->where('user_id', Auth::user())->where('friend_id',$friend_id);

        if($friend){return true;}
        return false;

    }


}

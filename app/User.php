<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\User
 *
 */
class User extends Model {

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
	protected $fillable = ['id', 'first_name', 'last_name', 'info'];

}

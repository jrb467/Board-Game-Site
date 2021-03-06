<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as Authen;

/**
 * App\Player
 *
 * @property string $name
 * @property string $username
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $created_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Signup[] $signups
 * @method static \Illuminate\Database\Query\Builder|\App\Player whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Player whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Player whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Player whereCreatedAt($value)
 */
class Player extends Model implements Authen{
    use Authenticatable;

	//Represents a game player
    protected $fillable = ['id', 'name', 'email', 'password'];

    protected $table = 'players';

    public function signups(){
        return $this->hasMany('App\Signup', 'username');
    }
}

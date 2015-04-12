<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model {

	//Represents a game player
    protected $fillable = ['name', 'username'];

    public function signups(){
        return $this->hasMany('App\Signup', 'username');
    }
}

<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model {

	//
    protected $fillable = ['min_length', 'name', 'max_length', 'description', 'min_players','max_players'];
    protected $primaryKey = 'name';

    public function signups(){
        return $this->hasMany('App\Signup', 'game_name');
    }
}

<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Signup extends Model {

	//
    protected $fillable = ['game_name', 'start_time', 'first_time'];
    protected $primaryKey = 'signup_id';

    public function game(){
        return $this->belongsTo('App\Game', 'game_name');
    }

    public function player(){
        return $this->belongsTo('App\Player', 'username');
    }
}

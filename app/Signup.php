<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Signup
 *
 * @property \App\Player $player 
 * @property \App\Event $event 
 * @property boolean $first_time 
 * @method static \Illuminate\Database\Query\Builder|\App\Signup wherePlayer($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Signup whereEvent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Signup whereFirstTime($value)
 */
class Signup extends Model {

	//
    protected $fillable = ['player', 'event'];
    protected $primaryKey = ['player', 'event'];

    public function event(){
        return $this->belongsTo('App\Event', 'id');
    }

    public function player(){
        return $this->belongsTo('App\Player', 'username');
    }
}

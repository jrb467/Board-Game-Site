<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Event
 *
 * @property string $game_name 
 * @property \Carbon\Carbon $updated_at 
 * @property \Carbon\Carbon $created_at 
 * @property string $start_time 
 * @property integer $event_id 
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Signup[] $signups 
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereGameName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereStartTime($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereEventId($value)
 */
class Event extends Model {

	protected $fillable = ['game_name', 'start_time'];
    protected $primaryKey = 'event_id';

    public function signups(){
        return $this->hasMany('App\Signup', 'event_id');
    }
}

<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Game
 *
 * @property integer $min_length 
 * @property string $name 
 * @property boolean $min_players 
 * @property boolean $max_players 
 * @property string $description 
 * @property \Carbon\Carbon $updated_at 
 * @property \Carbon\Carbon $created_at 
 * @property integer $max_length 
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Event[] $events 
 * @method static \Illuminate\Database\Query\Builder|\App\Game whereMinLength($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Game whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Game whereMinPlayers($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Game whereMaxPlayers($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Game whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Game whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Game whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Game whereMaxLength($value)
 */
class Game extends Model {

	//
    protected $fillable = ['min_length', 'name', 'max_length', 'description', 'min_players','max_players'];
    protected $primaryKey = 'name';

    public function events(){
        return $this->hasMany('App\Event', 'game_name');
    }
}

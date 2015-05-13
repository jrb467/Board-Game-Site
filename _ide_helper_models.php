<?php
/**
 * An helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Signup
 *
 * @property string $username 
 * @property string $game_name 
 * @property \Carbon\Carbon $updated_at 
 * @property \Carbon\Carbon $created_at 
 * @property string $start_time 
 * @property boolean $first_time 
 * @property integer $signup_id 
 * @property-read \App\Game $game 
 * @property-read \App\Player $player 
 * @method static \Illuminate\Database\Query\Builder|\App\Signup whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Signup whereGameName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Signup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Signup whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Signup whereStartTime($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Signup whereFirstTime($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Signup whereSignupId($value)
 */
	class Signup {}
}

namespace App{
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
	class Player {}
}

namespace App{
/**
 * App\User
 *
 */
	class User {}
}

namespace App{
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Signup[] $signups 
 * @method static \Illuminate\Database\Query\Builder|\App\Game whereMinLength($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Game whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Game whereMinPlayers($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Game whereMaxPlayers($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Game whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Game whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Game whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Game whereMaxLength($value)
 */
	class Game {}
}


<?php namespace App\Http\Controllers;

use App\Player;
use App\Game;
use App\Signup;
use App\Event;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('index');
	}

	public function add_player(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:players|max:12',
            'name' => 'required|max:50',
        ]);
		$username = $request->input('username');
        $name = $request->input('name');
        $player = new Player;
        $player->username = $username;
        $player->name = $name;
        $player->save();
        return redirect()->back();
	}

    public function add_game(Request $request){
        $game = new Game();
        $game->name = $request->input('name');
        $game->description = $request->input('description');
        $game->min_length = $request->input('min_length');
        $game->max_length = $request->input('max_length');
        $game->min_players = $request->input('min');
        $game->max_players = $request->input('max');
        $game->save();
        return redirect()->back();
    }

    public function add_event(Request $request){
        $game = $request->input('game');
        $time = $request->input('time');
        /*
        if($request->has('first_time')){
            if($request->input('first_time') == "true"){
                $first = 1;
            }else{
                $first = 0;
            }
        }else{
            $first = 0;
        }
         * **/

        $event = new Event();
        $event->start_time = $time;
        /**
         * $event->username = $username;
         * NOTE: should also create a signup here too
         */
        $event->game_name = $game;
        $event->save();
        return redirect('/cal');
    }

	public function info()
	{
        return view('info');
	}

    public function event($id){
        $event = Event::whereEventId($id)->join('games', 'game_name', '=', 'name')->first();
        if(is_null($event)) return view('index');
        return view('event', ['event' => $event]);
    }

    public function event_signup(Request $request, $id){
        if($request->has('first_time')){
            if($request->input('first_time') == "true"){
                $first = 1;
            }else{
                $first = 0;
            }
        }else{
            $first = 0;
        }
        $signup = new Signup();
        $signup->player = Auth::user()->id;
        $signup->event = $id;
        $signup->first_time = $first;
        try{
            $signup->push();
        }catch (\ErrorException $fuckingbullshit){
            return redirect()->back();
        }catch (QueryException $a_much_more_reasonable_exception){
            abort(409);
        }
        return redirect()->back();
    }

    public function game($name){
        $game = Game::find($name);
        if(is_null($game)){
            return view('missing');
        }else{
            return view('game', ['game' => $game]);
        }
    }

    public function delete_event($event_id){
        Event::destroy([$event_id]);
        return redirect('/cal');
    }

    public function get_events(Request $request){
        if($request->has('start') && $request->has('end')){
            //prevent weird time periods (no more than a week)
            $diff = $request->get('end') - $request->get('start');
            if($diff > 605000 || $diff < 0){
                $response = new Response('', 401);
                return $response;
            }

            $start = new \DateTime();
            $start->setTimestamp($request->get('start'));
            $end = new \DateTime();
            $end->setTimestamp($request->get('end'));

            $query = \DB::table('events')->join('games', 'game_name', '=', 'name')->select(['event_id', 'start_time', 'game_name', 'min_length','max_length']);
            $times = $query->where('start_time', '<', $end)->where('start_time', '>', $start)->orderBy('start_time')->get();
            $content = json_encode($times);
            $response = new Response($content, 200);
            $response->header('Content-Type', 'application/json');
            return $response;
        }
        $response = new Response('', 401);
        return $response;
    }

}

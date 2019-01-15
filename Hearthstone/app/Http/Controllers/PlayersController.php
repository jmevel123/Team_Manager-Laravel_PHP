<?php

namespace App\Http\Controllers;

use App\Players;
use App\Teams;
use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players=Players::all();
        // $teams=teams::all();
        foreach($players as $player) {
           //get chaque team id pour chaque player
            $player->flag = Teams::find($player->team_id)->flag; // set pr chaque player un flag qui equivaut à teamflag
        }
        return view('players.index',compact('players'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams=DB::table('teams')->get();
        return view('players.create',['teams' => $teams]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|max:255', 'unique:players',
            'team_id' => 'required|max:255'
            ]);

        $username = $request->input('username');
        $team_id= $request->input('team_id');
        
        $players=DB::table('players')->insert([
            [
            'username'=> $username,
            'team_id'=> $team_id,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
            ]

        ]);


        return  redirect()->action('PlayersController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Players  $players
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $players = Players::findorFail($id);
        $players->flag = Teams::find($players->team_id)->flag; // set pr chaque player un flag qui equivaut à teamflag
        return view('players.show')->with('players', $players);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Players  $players
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teams=Teams::all();
        $player = Players::findOrFail($id);

        return view('players.edit',compact('player','teams'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Players  $players
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'username' => 'required|max:255',
            'team_id' => 'required|max:255',
        ]);

        $player = Players::findorFail($id);

        $player->username = $request->input('username');
        $player->team_id = $request->input('team_id');
        $player->save();

        //DB::table('teams')->where('id', $id)
        //        ->update(['team_name' => $team_name, 'country' => $country, 'flag' => $flag]);

        // $input = $request->all();
        // // $teams->update($input);

        // $teams->fill($teams)->save();

        // // $teams->update($request->all());


        return  redirect()->action('PlayersController@index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Players  $players
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteTeams = Players::findOrFail($id);
        $deleteTeams->delete();

        return redirect('/players');

    }

    public function userIndex()
    {
        echo 'Blablabla';
    }
}

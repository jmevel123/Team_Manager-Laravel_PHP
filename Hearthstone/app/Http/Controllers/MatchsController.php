<?php

namespace App\Http\Controllers;

use App\Matchs;
use App\Teams;
use Illuminate\Http\Request;
use DB;
use Carbon;

class MatchsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matchs=Matchs::all();

        foreach($matchs as $match) {
            $match->flag1 = Teams::find($match->team1_id)->flag;
            $match->flag2 = Teams::find($match->team2_id)->flag; 
         }

        return view('matchs.index',compact('matchs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams=DB::table('teams')->get();
        return view('matchs.create',['teams' => $teams]);
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
            'team1_id' => 'required|max:255',
            'team2_id' => 'required|max:255',
            'score_1' => '',
            'score_2' => '',
            'winner_id' => '',
            'placement' => 'required',
            ]);

     
        $match = new Matchs();
        $match->team1_id = $request->input('team1_id');
        $match->team2_id= $request->input('team2_id');
        $match->score_1= $request->input('score_1');
        $match->score_2= $request->input('score_2');
        $match->winner_id= $request->input('winner_id');
        $match->placement= $request->input('placement');
            $match->save();
        
        return  redirect()->action('MatchsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Matchs  $matchs
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $matchs = Matchs::findorFail($id);
        return view('matchs.show')->with('matchs', $matchs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Matchs  $matchs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teams=DB::table('teams')->get();

        $matchs = Matchs::findOrFail($id);

        return view('matchs.edit',compact('matchs'), ['teams' => $teams]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Matchs  $matchs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matchs $matchs)
    {
        $this->validate($request, [
            'team1_id' => 'required|max:255',
            'team2_id' => 'required|max:255',
            'score_1' => 'required|max:255',
            'score_2' => 'required|max:255',
            'placement' => 'required',
            'winner' => 'required',
        ]);

        $matchs = Matchs::findorFail($id);

        $matchs->team1_id= $request->input('team1_id');
        $matchs->team2_id= $request->input('team2_id');
        $matchs->score_1 = $request->input('score_1');
        $matchs->score_2 = $request->input('score_2');
        $matchs->placement = $request->input('placement');
        $matchs->winner = $request->input('winner');
        $matchs->save();

        return  redirect()->action('MatchsController@index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Matchs  $matchs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteMatchs = Matchs::findOrFail($id);
        $deleteMatchs->delete();

        //return view('bufashaccts.allAccounts', compact('bfaccounts'));
        return redirect('/matchs');
    }
}

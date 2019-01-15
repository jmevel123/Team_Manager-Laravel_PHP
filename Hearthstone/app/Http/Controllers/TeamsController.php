<?php

namespace App\Http\Controllers;

use App\Teams;
use Illuminate\Http\Request;
use DB;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams=Teams::all();
        return view('teams.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teams.create');
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
            'team_name' => 'required|max:255',
            'country' => 'required|max:255',
            'flag' => 'required',
            ]);


        $teams = new Teams();
        $teams->team_name = $request->team_name;
        $teams->country = $request->country;
        $teams->flag = $request->flag;
        
        $teams->save();

        return  redirect()->action('TeamsController@index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teams  $teams
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teams = Teams::findorFail($id);
        return view('teams.show')->with('teams', $teams);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teams  $teams
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teams = Teams::findOrFail($id);

        return view('teams.edit',compact('teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teams  $teams
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'team_name' => 'required|max:255',
            'country' => 'required|max:255',
            'flag' => 'required',
        ]);

        $teams = Teams::findorFail($id);

        $teams->team_name = $request->input('team_name');
        $teams->country = $request->input('country');
        $teams->flag = $request->input('flag');
        $teams->save();

        //DB::table('teams')->where('id', $id)
        //        ->update(['team_name' => $team_name, 'country' => $country, 'flag' => $flag]);

        // $input = $request->all();
        // // $teams->update($input);

        // $teams->fill($teams)->save();

        // // $teams->update($request->all());


        return  redirect()->action('TeamsController@index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teams  $teams
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteTeams = Teams::findOrFail($id);
        $deleteTeams->delete();

        //return view('bufashaccts.allAccounts', compact('bfaccounts'));
        return redirect('admin/teams');
    }


}

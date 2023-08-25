<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class TeamController extends Controller
{
    public function teamIndex()
    {
        $team = Team::all();
        return view('admin.interface.team.team', compact('team'));
    }

    public function teamDelete($id)
    {
        $team = Team::find($id);
        unlink('assets/images/team/'.$team->image);
        $team->delete();
        return redirect()->back()->withMsg('Successfully Deleted');
    }

    public function teamStore(Request $request)
    {
        $this->validate($request, array(
            'image' => 'mimes:jpeg,png,jpg,gif,svg|required',
            'name' => 'required',
            'designation' => 'required',
            'type' => 'required',
        ));


        $team = Team::create([
           'name' => $request->name,
           'designation' => $request->designation,
           'type' => $request->type,
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . 'jpg';
            $location = 'assets/images/team/'. $filename;
            Image::make($image)->resize(600,600)->save($location);
            $team->image =  $filename;
            $team->save();
        }
        return redirect()->back()->withMsg('Successfully Created');
    }

    public function teamUpdateUpdate(Request $request, $id)
    {
        $this->validate($request, array(
            'image' => 'mimes:jpeg,png,jpg',
            'name' => 'required',
            'designation' => 'required',
            'type' => 'required',
        ));

        $team = Team::find($id);

         Team::whereId($id)
            ->update([
           'name' => $request->name,
           'designation' => $request->designation,
           'type' => $request->type,
        ]);

        if ($request->hasFile('image'))
        {
            unlink('assets/images/team/'.$team->image);
            $image = $request->file('image');
            $filename = time() . '.' . 'jpg';
            $location = 'assets/images/team/'. $filename;
            Image::make($image)->resize(600,600)->save($location);
            $team->image = $filename;
            $team->save();
        }
        return redirect()->back()->withMsg('Successfully Updated');
    }
}

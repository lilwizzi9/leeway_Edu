<?php

namespace App\Http\Controllers;

use App\Testimonal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class TestimonalController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => 'logout']);
    }

    public function testIndex()
    {
        $test = Testimonal::all();
        return view('admin.interface.testimonial.index', compact('test')) ;
    }

    public function testStore(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'image' => 'required | image | mimes:jpg,png,jpeg,bmp,svg',
            'star' => 'required',
            'comment' => 'required',
        ]);
        $in = Input::except('_method','_token');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.'jpg';
            $location = 'assets/images/testimonial/' . $filename;
            Image::make($image)->resize(120,110)->save($location);
            $in['image'] = $filename;
        }
        Testimonal::create($in);
        return redirect()->back()->withMsg('Created Successfully');
    }

    public function testDelete($id)
    {
        $crew = Testimonal::find($id);
        unlink('assets/images/testimonial/'.$crew->image);
        $crew->delete();
        return redirect()->back()->withMsg('Deleted Successfully');
    }

    public function testEdit($id)
    {
        $test = Testimonal::find($id);
        return view('admin.interface.testimonial.edit', compact('test'));
    }

    public function testUpdate(Request $request,$id)
    {
        $general = Testimonal::find($id);
        $this->validate($request,array(
            'name' => 'required',
            'image' => 'mimes:png,jpeg,jpg',
            'star' => 'required',
            'comment' => 'required',
        ));
        $general->name = $request->input('name');
        $general->star = $request->input('star');
        $general->comment = $request->input('comment');

        if ($request->hasFile('image')) {
            unlink('assets/images/testimonial/'.$general->image);
            $image = $request->file('image');
            $filename = time() . '.' . 'jpg';
            $location = 'assets/images/testimonial/'. $filename;
            Image::make($image)->resize(120,110)->save($location);
            $general->image =  $filename;
        };

        $general->save();
        return redirect('admin/testimonial')->withMsg('Updated Package Successfully');
    }
}

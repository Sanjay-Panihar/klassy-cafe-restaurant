<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $foods = Food::all();

        return view('admin.food.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.food.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
      'title'       => 'required',
      'price'       => 'required',
      'description' => 'required',
      ]);

      if ($request->hasFile('image')) {
          $request->validate([
          'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        $path = 'public/images';
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $path = $request->file('image')->storeAs($path, $imageName);
      }

      $food = Food::create([
        'title'        => $request->title,
        'price'        => $request->price,
        'description'  => $request->description,
        'photo'        => $imageName,
      ]);
      return redirect()->back()->with('message', 'Food saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "<pre>"; print_r('show'); die;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo "<pre>"; print_r('test'); die;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Food::find($id)->delete();
      return redirect()->back()->with('message', 'Data deleted successfully');
    }
}

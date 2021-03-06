<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $user = User::where('id', $id)->first();
      
        return view('admin.users.edit', compact('user'));
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
      $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,'.$id,
        'password' => 'required|min:6',
        'password_confirmation' => 'required|same:password|min:6'
    ]);

      $userUpdate = User::findOrFail($id)->update([
        'name'        => $request->name,
        'email'       => $request->email,
        'password'    => $request->password,
      ]);

      return redirect()->back()->with('message', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::findOrFail($id)->delete();

      return redirect()->back()->with('message', 'Data deleted successfully.');
    }

    public function changeStatus(Request $request )
    {
      $user = User::findOrFail($request->id);
      if ($request->status == "true") {
          $user->update([
            'status' => 1
          ]);
    } else {
          $user->update([
            'status'  => 0
          ]);
    }
    Session::flash('message', 'Status changed successfully.');
        return response()->json([
          'message'  =>  'Status changed successfully.'
        ]);
    }
}

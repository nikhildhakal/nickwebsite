<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('manage.users.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
        ));

        if (!empty($request->password)) {
            $password = trim($request->password);
        }else {
          //Set the manual password
          $length = 10;
          $keyspace = '0123456789abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ';
          $str = '';
          $max = mb_strlen($keyspace, '8bit') - 1;  //length of string, 8-bit encoding
          for ($i=0; $i < $length; ++$i) {
              $str.$keyspace[random_int(0 , $max)];
          }
          $password = $str;
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($password);
        $user->save();

        return redirect()->route('users.show', $user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('manage.users.show')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('manage.users.edit')->withUser($user);
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
        $this->validate($request, array(
          'name' => 'required|min:4',
          'email' => 'required|email|unique:users,email,'.$id
        ));

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        // dd($request->name);
        if ($request->password_options == 'auto')
        {
          $length = 10;
          $keyspace = '0123456789abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ';
          $str = '';
          $max = mb_strlen($keyspace, '8bit') - 1;  //length of string, 8-bit encoding
          for ($i=0; $i < $length; ++$i) {
              $str.$keyspace[random_int(0 , $max)];
          }
          $user->password = Hash::make($str);

        }elseif ($request->password_options == 'manual')
        {
          $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('users.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

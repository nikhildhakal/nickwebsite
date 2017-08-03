<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('manage.roles.index')->withRoles($roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('manage.roles.create')->withPermissions($permissions);
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
        'display_name' => 'required|min:4|max:255',
        'name' => 'required|min:4|max:100|alpha_dash|unique:roles,name',
        'description' => 'sometimes|min:6|max:200',
      ));

      $role = new Role();
      $role->display_name = $request->display_name;
      $role->name = $request->name;
      $role->description = $request->description;
      $role->save();

      //For permissions associated to this role
      if ($request->permissions) {
        //Sync permissions with role after converting permissios into array
        $role->syncPermissions(explode(',' , $request->permissions));
      }

      $request->session()->flash('success', 'Succesfully Added the new '. $role->display_name . ' role in the database');
      return redirect()->route('roles.show', $role->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::where('id', $id)->with('permissions')->first();

        return view('manage.roles.show')->withRole($role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::where('id', $id)->with('permissions')->first(); //Get specific role along with eager loading all permissions
        $permissions = Permission::all();
        return view('manage.roles.edit')->withRole($role)->withPermissions($permissions);

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
          'display_name' => 'required|min:4|max:255',
          'description' => 'sometimes|min:6|max:150',
        ));

        $role = Role::findOrFail($id);
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();

        //For permissions associated to this role
        if ($request->permissions) {
          //Sync permissions with role after converting permissios into array
          $role->syncPermissions(explode(',' , $request->permissions));
        }

        $request->session()->flash('success', 'Succesfully Updated the '. $role->display_name . ' role in the database');
        return redirect()->route('roles.show', $id);
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

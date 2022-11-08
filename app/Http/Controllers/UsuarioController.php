<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Spatie\Permission\Models\Role;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $usuarios=User::all();
        return view('usuario.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles= Role::all();
        return view('usuario.crear',compact('roles'));
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
        //dd($request->all());
        $this->validate($request,[
            'name' =>'required',
            'email' =>'required|email|unique:users,email',
            'password' => 'required|same:conpassword',
            'rol' => 'required'
        ]);

        $input= $request->all();
        $input['password'] = Hash::make($input['password']);

        $user=User::create($input);
        $user->assignRole($request->input('rol'));


        return redirect()->route('usuarios.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $usuario=User::find($id);
        $roles=Role::all();
        return view('usuario.editar',compact('roles','usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario=User::find($id);

        if($request->input('password')){
            $this->validate($request,[
                'password' => 'same:conpassword',
            ]);
            $usuario->password=Hash::make($request->input('password'));
        }


        $usuario->name=$request->input('name');
        $usuario->email=$request->input('email');
        $usuario->save();
        DB::table('model_has_roles')->Where('model_id',$id)->delete();
        $usuario->assignRole($request->input('rol'));
        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::find($id)->delete();

        return redirect()->route('usuarios.index');
    }
}

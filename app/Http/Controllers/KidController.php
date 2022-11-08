<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KidController extends Controller
{
    //
    public function login(){

        return view('kid.login');
    }
    public function autenticacion(Request $request){
        //dd($request->all());
        $input = $request->all();

        $this->validate($request,[
            'code' => 'required',
        ]);
        /*if(Auth::guard('kids')->attempt(['nombre'=>'cmaripositas','codigo'=>$input['code']])){
            return redirect('/');
        }else{
            return redirect()->back()->with('error','Password  are wrong');
        }*/
        $team=Equipo::query()->where('codigo',$request->get('code'))->first();
        if($team){
            Auth::guard('kids')->login($team);
            return redirect()->route('concursos.index');
        }else{
            return redirect()->back()->with('error','Password  are wrong');
        }






        return redirect()->route('concursos.index');
    }
    public function logout(Request $request){
        //dd($request->all());
        Auth::guard('kids')->logout();
        return redirect()->route('kid.login');
    }
}

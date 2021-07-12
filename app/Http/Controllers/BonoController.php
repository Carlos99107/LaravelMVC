<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Bono;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\DB;

class BonoController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
            $bonos=Bono::join('users','users.id','bonos.id_user')
            ->select(['bonos.*','users.name as NameUser'])
            ->get();
            return view ('bono.index')->with('bonos',$bonos);
    }
    public function create(){
        $user=User::all();
         return view('bono.create')->with('user',$user);
    }

    public function store (Request $request){
        $bonos= new Bono();;
        $bonos->id_user=$request->get('id_user');
        $bonos->Tipo_bono=$request->get('Tipo_bono');
        $bonos->Descripcion=$request->get('Descripcion');
        $bonos->Valor=$request->get('Valor');
        $bonos->Fecha=$request->get('Fecha');
        $bonos->save();
        return redirect('/bono');
    }
    public function show($id_bono)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_bono)
    {
        $bonos = Bono::find($id_bono);
        $user=User::all();
        return view('bono.edit')->with('bono',$bonos)->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_bono)
    {
        $bonos = Bono::find($id_bono);
        $bonos->id_user=$request->get('id_user');
        $bonos->Tipo_bono=$request->get('Tipo_bono');
        $bonos->Descripcion=$request->get('Descripcion');
        $bonos->Valor=$request->get('Valor');
        $bonos->Fecha=$request->get('Fecha');
        $bonos->save();
        return redirect('/bono');
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_bono)
    {
        $bono = Bono::find($id_bono);
        $bono->delete();
        return redirect('/bono');
    }

    public function totales(Request $request){
        $total1=0;
        $total2=0;
        $fecha='';
        $fecha1='';
        $fecha2='';
        $fecha3='';
        return view('bono.totales')->with('total1', $total1)->with('total2', $total2)->with('fecha', $fecha)->with('fecha1', $fecha1)
        ->with('fecha2', $fecha2)->with('fecha3', $fecha3);
    }
    public function filtertotal(Request $request){
        $total1= Bono::where('fecha', '>=', $request->fechaInicial)->where('fecha','<=',$request->fechaFinal.' 23:59:59')->sum('Valor');
        $total2= Bono::where('fecha', '>=', $request->fechaInicial1)->where('fecha','<=',$request->fechaFinal2.' 23:59:59')->sum('Valor');
        $fecha=$request->fechaInicial;
        $fecha1=$request->fechaFinal;
        $fecha2= $request->fechaInicial1;
        $fecha3=$request->fechaFinal2;
        return view('bono.totales')->with('total1', $total1)->with('total2', $total2)->with('fecha', $fecha)->with('fecha1', $fecha1)
        ->with('fecha2', $fecha2)->with('fecha3', $fecha3);
    }
    public function usersbonos(){
        $nombrecliente=null;
        return view('bono.usersbonos')->with('nombrecliente', $nombrecliente);
    }
    public function filterusers(Request $request){
        $nombrecliente=Bono::where('fecha', '>=', $request->fechaInicial)->where('fecha','<=',$request->fechaFinal.' 23:59:59')
        ->join('users','users.id','=','bonos.id_user')->groupBy('users.name')
        ->select('users.name',DB::raw('count(*) as user_count,name'), DB::raw('SUM(Valor) as total_valor'))
        ->orderBy(DB::raw('SUM(Valor)'),'DESC')
        ->get();
        return view('bono.usersbonos')->with('nombrecliente', $nombrecliente);
    }

}

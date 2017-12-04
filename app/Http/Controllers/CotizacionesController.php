<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cotizaciones;
use GuzzleHttp;

class CotizacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cotizacion = Cotizaciones::find($id);
        return $cotizacion;
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
        //
    }

    public function getCotizacion(Request $request)
    {
      $cotizacion = Cotizaciones::where('base', $request->base)
                                 ->where('moneda', $request->moneda)
                                 ->orderBy('created_at','asc')
                                 ->first();
      //return $cotizacion->cotizacion;
      return response()->json([
          'cotizacion' => $cotizacion->cotizacion
      ]);
    }

    public function updateCotizaciones(Request $request)
    {
      $moneda = 'BOB';
      $client  =  new  GuzzleHttp\Client ([ 'base_uri'  => config('global.apiCotizacion')]);
      $response  =  $client -> request ( 'GET' , '?app_id='.config('global.idApiCotizacion'));
      $body  =  $response -> getBody ();
      $body = json_decode($body, true);
      $body = (object)$body;
      $cotizacion = new Cotizaciones();
      $cotizacion->base = $body->base;
      $cotizacion->moneda = $moneda;
      $cotizacion->cotizacion = $body->rates[$moneda];
      $cotizacion->save();
    }
}

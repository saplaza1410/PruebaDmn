<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Repartidor;
use DataTables;

class ManifiestoController extends Controller
{
    public function index()
    {
    	$repartidor = Repartidor::pluck('nombre','id');
    	return view('manifiesto.index')->with(['repartidor' => $repartidor]);
    }
	
	public function list($repartidor_id)
    {
        $query = DB::table('manifiesto')
        		->join('repartidor', 'repartidor.id', '=', 'manifiesto.repartidor_id')
        		->join('camion', 'camion.id', '=', 'manifiesto.camion_id')
        		->join('finca', 'finca.id', '=', 'manifiesto.finca_id')
        		->where('repartidor.id', '=', $repartidor_id)
                ->select([
                    'fecha_nomina',
                    DB::raw('repartidor.nombre AS repartidor_nombre'),
                    DB::raw('camion.id AS camion_nombre'),
                    DB::raw('finca.nombre AS finca_nombre'),
                    'cantidad_lotes',
                    'cantidad_lotes_entregados',
                    'cantidad_lotes_devuelto',
                    DB::raw('manifiesto.created_at AS created_at')
                ]);

        return DataTables::queryBuilder($query)->toJson();
    }

    public function nomina($repartidor_id)
    {
    	$query = DB::table('manifiesto')
        		->join('repartidor', 'repartidor.id', '=', 'manifiesto.repartidor_id')
        		->join('camion', 'camion.id', '=', 'manifiesto.camion_id')
        		->join('finca', 'finca.id', '=', 'manifiesto.finca_id')
        		->where('repartidor.id', '=', $repartidor_id)
                ->select([
                    DB::raw('count(*) AS total_numero_manifiesto'),
                    DB::raw('(count(*) * 50000) AS total_manifiesto'),
                    DB::raw('sum(cantidad_lotes_entregados) AS cantidad_lotes_entregados'),
                    DB::raw('(sum(cantidad_lotes_entregados) * 10000) AS total_cantidad_lotes_entregados'),
                    DB::raw('sum(cantidad_lotes_devuelto) AS cantidad_lotes_devuelto'),
                    DB::raw('(sum(cantidad_lotes_devuelto) * 5000) AS total_cantidad_lotes_devuelto')
                ])->get()->toArray();
        return json_encode($query);
    }
}

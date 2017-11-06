<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\log;
use Carbon\Carbon;
use DB;
use DataTables;

class logController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $log=log::all();
        $logs=log::join('logins','logins.id','=','logs.user')
        ->select('logins.username as name')
        ->get();

       $sql=DB::table('logs')->selectRaw('DISTINCT type')->where('type','<>','')->get();
        //  $sql=DB::Table('logs')
        //  ->distinct('logs.type','=','Department')
        //  ->get();  
        return view('admin.logs.log',compact('log','logs','sql')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //NULL,id,deleted_at,NULL'
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= DB::table('logs')->join('logins','logins.id','=','logs.user')
                        ->select('logs.ip_address','logs.type',
                            DB::raw('DATE_FORMAT(logs.created_at, "%M %d %Y") as create_date'),
                            'logins.username','logs.actions');

                        if ($type = $request->get('type')) {
                             $data->where('logs.type', 'like', "$type%");
                        }
                        if ($from = $request->get('from') && $to = $request->get('to')) {

                            $data->whereBetween('logs.created_at', [Carbon::createFromFormat('d/m/Y', $request->get('from'))->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $request->get('to'))->format('Y-m-d')]);
                        }

                        $datatable= DataTables::of($data);

                        return $datatable->make(true);
    }

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
        //
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
}

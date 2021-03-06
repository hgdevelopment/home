<?php

namespace App\Http\Controllers\hr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\hr_religion;
use DB;

class religionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    $religion=\DB::table('hr_religions')->whereNull('deleted_at')->get();
    return view('hr.master.religionmaster',compact('religion'));
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

    $religion = new hr_religion();
    $this->validate($request,[
     'religion_name'=>'required',           
    ]);
       $religion->religion_name = $request->religion_name;
       $religion->save();
       Session::flash('message', 'Religion Added Successfully!'); 
       return redirect('/hr/master/religionmaster');
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
       
        $religionmaster= hr_religion::all();
        $editreligion = hr_religion::find($id);
        return view('hr.master.editreligionmaster',compact('religionmaster','editreligion'));
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
        $religionmaster = hr_religion::find($id);
          $this->validate($request,[
            'religion_name'=>'required',
           
                      ]);
            $religionmaster->religion_name = $request->religion_name;
         
            $religionmaster->save();
            Session::flash('message', 'Religion Updated Successfully!'); 
            return redirect('/hr/master/religionmaster');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function destroy(Request $request, $id)
    {
        $religionmaster = hr_religion::find($id);
        $religionmaster->delete();
        Session::flash('message', 'Religion Deleted Successfully!'); 
        return redirect('/hr/master/religionmaster');

    }
}








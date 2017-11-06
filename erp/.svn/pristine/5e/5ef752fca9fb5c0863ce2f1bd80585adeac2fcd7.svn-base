<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\categorymaster;
use Auth;
class CategorymasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       // \DB::enableQueryLog();
        $categorymaster = categorymaster::all(); //dd(\DB::getQueryLog());
        return view('admin.category.categorymaster',compact('categorymaster'));

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
       $categorymaster = new categorymaster();
        $this->validate($request,[
            'category_name'=>'required',
            'employee_code'=>'required',
          
            ]);
       $categorymaster->category_name = $request->category_name;
       $categorymaster->employee_code= $request->employee_code;
       $categorymaster->save();
       Session::flash('message', 'Category Added Successfully!'); 
       return redirect('/admin/categorymaster');
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
       
        $categorymaster= categorymaster::all();
        $editcategory = categorymaster::find($id);
        return view('admin.category.editcategorymaster',compact('categorymaster','editcategory'));
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
        $categorymaster = categorymaster::find($id);
          $this->validate($request,[
            'category_name'=>'required',
            'employee_code'=>'required',
                      ]);
        $categorymaster->category_name= $request->category_name;
        $categorymaster->employee_code= $request->employee_code;
        $categorymaster->save();
        Session::flash('message', 'Category Updated Successfully!'); 
        return redirect('/admin/categorymaster');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $categorymaster = categorymaster::find($id);
        $categorymaster->delete();
        Session::flash('message', 'Category Deleted Successfully!'); 
        return redirect('/admin/categorymaster');

    }
}








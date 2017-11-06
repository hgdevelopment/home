<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\page;
use DB;
class userAccessController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $parents = page::where('parent_id','0')->orderby('parent_id')->get();
        $pages = page::orderBy('parent_id', 'ASC')->get();
        return view('admin.useraccess.pages',compact('parents','pages'));
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

        $this->validate($request,[
            'parent_id'=>'required',
            'menu_name'=>'required|unique:pages',
            'url'=>'required'
        ]);
        $page = new page;
        $page->parent_id=$request->module_id;
        $page->parent_id=$request->parent_id;
        $page->url=$request->url;
        $page->menu_name=$request->menu_name;
        $page->status='Active';
        $page->icon=$request->icon;
        /*$page->sort_order=$request->sort_order;
        $page->sort_in_order=$request->sort_in_order;*/
        $page->save();
        return redirect('/admin/useraccess');
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
        //
        $parents = page::where('parent_id','0')->get();
        $pages = page::all();
        $editpages = page::find($id);
        //return $editpages;
        return view('admin.useraccess.editpages',compact('parents','pages','editpages'));
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

        $page = page::find($id);
        if($page->menu_name!=$request->menu_name){
            $this->validate($request,[
                'menu_name'=>'unique:pages',
            ]);
        }
        $this->validate($request,[
            'parent_id'=>'required',
            'menu_name'=>'required',
            'url'=>'required'
        ]);

        $page->parent_id=$request->parent_id;
        $page->main_id=$request->module_id;
        $page->url=$request->url;
        $page->menu_name=$request->menu_name;
        $page->icon=$request->icon;
        $page->sort_order=$request->sort_order;
        $page->sort_in_order=$request->sort_in_order;
        $page->save();
        return redirect('/admin/useraccess');
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
        $page = page::find($id);
        $page->delete();

        $update1 = DB::table('useraccesss')->where('page_id', $id)->update(['status' => 'Deny']);

        return redirect('/admin/useraccess');
    }
    public function checkSortOrder(Request $request)
    {
        $value=$request->value;
        $page = page::where('sort_order', $value)->get();

        return count($page);

    }
    public function checkSortInOrder(Request $request)
    {
        $value=$request->value;
        $value1=$request->parent_id;
        $page = page::where('sort_in_order', $value)->where('parent_id',$value1)->get();
        return count($page);
    }
    public function fetchParent(Request $request)
    {
        $id = $request->value;
        $page = page::where('main_id', $id)->where('parent_id', 0)->get();
        $value = ' <option value="0">Parent</option>';
        foreach ($page as $key => $pages) {
            # code...
             $value .= '<option value="'. $pages["id"] .'">'. $pages["menu_name"] .'</option>';
        }
        echo $value;
    }


}

<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon;
use App\tcnmaster;
use App\bank;
use App\memberregistration;
use App\country;
class tcnmasterController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $tcnmaster = tcnmaster::all();
       return view('admin.tcn.tcnmaster.tcn',compact('tcnmaster'));
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
  
    $openOn='0000-00-00';    
    $closeOn='0000-00-00';    
//return $request->openStatus;

      $tcnmaster = new tcnmaster();
      //$this->commonValidate($request,'Store');
      $tcnmaster->tcnType = $request->tcnType;
      $tcnmaster->inr= $request->inr;
      $tcnmaster->aed = $request->aed;
      $tcnmaster->usd = $request->usd;
      $tcnmaster->sar = $request->sar;
      $tcnmaster->cad = $request->cad;
      $tcnmaster->openStatus  = $request->openStatus;
        if($request->openStatus!='Always Open')  
        {  
        $tcnmaster->openOn =date('Y-m-d',strtotime($request->openOn));
        $tcnmaster->closeOn =date('Y-m-d',strtotime($request->closeOn));
        }          
      $tcnmaster->lockingDuration  = $request->lockingDuration;
      $tcnmaster->benefitLockingDuration  = $request->benefitLockingDuration;      
      $tcnmaster->profitDeclaration  = $request->profitDeclaration;
      $tcnmaster->certificateDmcc  = '0';
      $tcnmaster->indianCertificate  = '0';
      $tcnmaster->header  = '0';
      $tcnmaster->save();
      return redirect('/admin/tcnmaster');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bank = tcnmaster::tcnmaster($id);
       return view('admin.tcn.tcnmaster.tcn',compact('tcnmaster'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return $id;
        $tcnmaster = tcnmaster::all()->whereNotIn('id',$id);
        $edittcnmaster = tcnmaster::find($id);
        return view('admin.tcn.tcnmaster.edittcnmaster',compact('tcnmaster','edittcnmaster'));
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
    $openOn=date('0000-00-00',strtotime($request->openOn));
    $closeOn='0000-00-00';    
    if($request->openStatus!='Always Open')  
    {  
    $openOn =date('Y-m-d',strtotime($request->openOn));
    $closeOn =date('Y-m-d',strtotime($request->closeOn));
    }          

        $tcnmaster = tcnmaster::find($id);
       // $this->commonValidate($request,'Update');
        // //header
        // if($request->header){
        // $header = time().'ah'.$id.'.'.$request->header->getClientOriginalExtension();
        // $request->header->move('img/tcnmaster', $header);}
        // //indianCertificate
        // if($request->indianCertificate){
        // $indianCertificate = time().'ic'.$id.'.'.$request->indianCertificate->getClientOriginalExtension();
        // $request->indianCertificate->move('img/tcnmaster', $indianCertificate);}
        // //indianCertificate
        // if($request->certificateDmcc){
        // $certificateDmcc = time().'dc'.$id.'.'.$request->certificateDmcc->getClientOriginalExtension();
        // $request->certificateDmcc->move('img/tcnmaster', $certificateDmcc);}

        $tcnmaster->tcnType = $request->tcnType;
        $tcnmaster->inr= $request->inr;
        $tcnmaster->aed = $request->aed;
        $tcnmaster->usd = $request->usd;
        $tcnmaster->sar = $request->sar;
        $tcnmaster->cad = $request->cad;
        $tcnmaster->openStatus  = $request->openStatus;
        if($request->openStatus!='Always Open')  
        {
        $tcnmaster->openOn =$openOn;
        $tcnmaster->closeOn =$closeOn;
        }
        $tcnmaster->lockingDuration  = $request->lockingDuration;
        $tcnmaster->benefitLockingDuration  = $request->benefitLockingDuration;      
        $tcnmaster->profitDeclaration  = $request->profitDeclaration;

        // if($request->header)
        // $tcnmaster->header  = $header;

        // if($request->indianCertificate)
        // $tcnmaster->indianCertificate  = $indianCertificate;

        // if($request->certificateDmcc)
        // $tcnmaster->certificateDmcc  = $certificateDmcc;
        $tcnmaster->save();
        return redirect('/admin/tcnmaster');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tcnmaster = tcnmaster::find($id);
        $tcnmaster->delete();
        return redirect('/admin/tcnmaster');
    }
    public function commonValidate($request,$type){

           $tcnmaster = new tcnmaster();

           if($type!='Update')
            $this->validate($request,[
                'tcnType' =>'required|unique:tcnmasters',
                ]);

            $this->validate($request,[
           
            'lockingDuration'=>'required|numeric',
            'benefitLockingDuration'=>'required|numeric',
            'inr'=>'required|numeric',
            'aed'=>'required|numeric',
            'usd'=>'required|numeric',
            'sar'=>'required|numeric',
            'cad'=>'required|numeric',
            'profitDeclaration'=>'required',
            'openOn'=>'required',
            'closeOn'=>'required|date'
            ]);

            if($type=='Update'){
            $this->validate($request,[
            'header'=>'image:jpg,png,jpeg',
            'indianCertificate'=>'image:jpg,png,jpeg',
            'certificateDmcc'=>'image:jpg,png,jpeg'
            ]);
            
        }
    }

 }
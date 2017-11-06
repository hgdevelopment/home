<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\tcnrequest;
use App\tcnmaster;
use App\bank;
use App\memberregistration;
use App\nominee;
use App\address;
use App\proofs;
use App\country;
use App\paymentdetails;
use Auth;
use PDF;


class tcnviewprintController extends Controller
{
    public function show($id){
        $tcnrequest = tcnrequest::where('id',$id)->first();    
     $pdf =PDF::loadView('admin.tcn.pdf.tcnapplication',compact('tcnrequest'));
     return $pdf->stream();
    }

    public function tcnpdf($id)
    {

        return view('admin.tcn.tcnApplication.tcnpdf',compact('id'));
    }
}

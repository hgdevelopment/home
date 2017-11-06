<?php

    # Benefit  Module

    # Line : 15
    Route::get('admin/benefit','benefitController@tcn'); 
    # return view('admin.benefit.benefit',compact('tcnmaster','tcnrequest'));

    # Line : 33
    Route::post('admin/benefit/add','benefitController@add'); 
    # Ajax function to add or update benefit

    # Line : 84
    Route::get('admin/benefit/check','benefitController@check'); 
    # Ajax function to fetch benefit

    # Line : 101
    Route::get('admin/benefit/view','benefitController@view'); 
    # return view('admin.benefit.view',compact('tcns')); Return all TCN Details (From TCN Master)(Phase 1)

    # Line : 109
    Route::post('admin/benefit/view','benefitController@choice');
    # return view('admin.benefit.view',compact('selected','bd','tcnid'));Return Selected TCN Details (Phase 2)

    # Line : 119
    Route::post('admin/benefit/details','benefitController@genarated');
    # return view('admin.benefit.view',compact('selected','datee','count'...etc)); Showing download for excel (Phase 3)

    # Line : 15
    Route::get('admin/benefit/generate','genrateController@tcn'); 
    # return view('admin.benefit.generate1',compact('tcnmaster','tcnrequest')); Return all TCN Details (From TCN Master)

    # Line : 33
    Route::get('admin/benefit/tobegenerate','genrateController@tobe');
    # Ajax function to Generate avilable benefit generation tiles

    # Line : 69
    Route::post('admin/benefit/generate','genrateController@store');
    # return redirect('admin/benefit/view'); Storing generated benefit in database

    # Line : 170
    Route::get('admin/benefit/excel','genrateController@excel');
    # Downloading excel will happen here

    # Partial Benefit  Module 

    # Line : 21
    Route::get('admin/partialbenefit/check','partialController@check'); 
    # Ajax function to fetch benefit

    # Line : 38
    Route::get('admin/partialbenefit/view','partialController@view'); 
    # return view('admin.partialbenefit.view',compact('tcns')); Return all TCN Details (Phase 1)

    # Line : 46
    Route::post('admin/partialbenefit/view','partialController@choice'); 
    # return view('admin.partialbenefit.view',compact('selected','bd','tcnid')); Return selected TCN (Phase 2)

    # Line : 56
    Route::post('admin/partialbenefit/details','partialController@genarated'); 
    #return view('admin.partialbenefit.view',compact('selected','bd'...etc)); Showing download for excel (Phase 3)

    # Line : 15
    Route::get('admin/partialbenefit/generate','partialgenrateController@tcn'); 
    # return view('admin.partialbenefit.generate1',compact('tcnmaster','tcnrequest')); Return all TCN Details

    # Line : 33
    Route::get('admin/partialbenefit/tobegenerate','partialgenrateController@tobe'); 
    # Ajax function to Generate avilable Parital benefit (Status 2) generation tiles

    # Line : 69
    Route::post('admin/partialbenefit/generate','partialgenrateController@store');
    # return redirect('admin/partialbenefit/view'); Storing generated Partial benefit in database

    # Line : 157
    Route::get('admin/partialbenefit/excel','partialgenrateController@excel'); 
    # Downloading excel will happen here

    #developed by aj 
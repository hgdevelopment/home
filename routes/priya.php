<?php
  
    Route::get('admin/dsa/pdf/{id}', 'admin\dsaController@pdfDsa'); //Edit pdf Value
    Route::get('admin/dsa/pdfview/{id}', 'admin\dsaController@viewpdf'); //pdf View in iFrame
    Route::get('admin/countryId','admin\dsaController@checkCountryId');//check country Id link
    Route::get('admin/dsa/captchavalidasion','admin\dsaController@captchavalidasion');//dsa request form page    
    Route::get('admin/checkAcc','admin\dsaController@checkAccount');//check heera account link
    Route::get('admin/viewDSA','admin\dsaController@showRequest');//view Dsa Request
    Route::get('admin/dsa/{id}/editReq','admin\dsaController@editReq');// Edit Dsa Request
    Route::post('admin/verification','admin\dsaController@verification');//View Dsa Verification update Page
    Route::get('admin/dsa/viewDsaRequest','admin\dsaController@show');//view Dsa Request afther Verification
    Route::get('admin/dsa/viewDsaDenied','admin\dsaController@Deniedshow');//view Denied Dsa
    Route::post('admin/dsa/app/approve','admin\dsaController@approve');//dsa Approve link
    Route::get('admin/dsa/app/editDsa/{id}','admin\dsaController@Dsaedit');//Dsa Request Edit afther Verification
    Route::post('admin/dsa/app/deny','admin\dsaController@deny'); //dsa Denied Link
    Route::get('admin/delete','admin\dsaController@destroy');//dsa request Delete

    Route::get('admin/dsaApprove/{id}/removeDsa','admin\dsaApproveController@removeDsa');//View Delete Dsa
    Route::get('admin/delete/blocklist','admin\dsaApproveController@destroy');//DSa approve delete
    Route::put('admin/dsaApprove/{id}','admin\dsaApproveController@update');// Edit With Update Dsa approve
    Route::get('admin/dsa/UpdateApproveDsa/{id}','admin\dsaApproveController@ApproveDsaEdit');// Update Dsa approve
    Route::get('admin/dsaApprove/{id}/edit','admin\dsaApproveController@edit');// Edit Dsa approve
    Route::get('admin/dsa/viewApproveDsa','admin\dsaApproveController@index');//View approve DSA
    Route::get('admin/dsa/viewRemoveDsa','admin\dsaApproveController@show');//View remove DSA
    Route::resource('admin/dsa','admin\dsaController');//dsa request form page

    Route::get('admin/dsaWithdraw/{id}/viewWithdrawn','admin\dsaWithdrawController@viewWithdrawn');
    Route::get('admin/dsaWithdraw/viewDsaWithdrawn','admin\dsaWithdrawController@showWithdrawn');//dsa withdrawn table
    Route::get('admin/withdraw/viewDsaWithdrawDetails','admin\dsaWithdrawController@show');//dsa withdraw request table
    Route::resource('admin/dsaWithdraw','admin\dsaWithdrawController');//dsa request form page

    Route::get('admin/dsaUpgrade/update','admin\dsaUpgradeController@update');//dsa withdraw request table
    Route::resource('admin/dsaUpgrade','admin\dsaUpgradeController');//dsa Upgrade form page

    





/// Hr Company Master ////
    

    Route::resource('hr/CompanyMaster','hr\CompanyMasterController');//Company Master
    Route::resource('hr/BranchMaster','hr\BranchMasterController');//Branch Master

    Route::resource('hr/shifts','hr\shiftController');// Shift Module





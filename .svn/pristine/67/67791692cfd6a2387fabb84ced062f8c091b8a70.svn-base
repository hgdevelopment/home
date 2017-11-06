<?php

//////////////          ADMIN          /////////////////////


     /*TCN  Module - Suresh*/
    Route::resource('admin/tcnmaster','admin\tcnmasterController');


    Route::get('admin/tcn_request_listDataTable','admin\tcnRequestController@listTcnNotConfirmDataTable');
    Route::resource('admin/tcnRequest','admin\tcnRequestController');


    Route::resource('admin/tcnApplicationForm','admin\tcnApplicationFormController');

    Route::resource('admin/tcnApprove','admin\tcnApproveController');


    Route::resource('admin/tcnviewprint','admin\tcnviewprintController');

    Route::resource('admin/tcnTransfer','admin\tcnTransferController');

    Route::resource('admin/tcnFullWithDrawal','admin\tcnFullWithDrawalController');

    Route::resource('admin/tcnmembership', 'admin\tcnMembershipController');   

    /*Reset DSA/MEM Password - Suresh*/
    Route::resource('admin/resetPassword', 'admin\resetPasswordController');

    /*User Access Module - Suresh/Dominic */
    Route::get('admin/checkSortInNo','admin\userAccessController@checkSortInOrder');
    Route::get('admin/checkSortNo','admin\userAccessController@checkSortOrder');
    Route::get('admin/useraccess/fetchParent','admin\userAccessController@fetchParent');// Shift Module
    Route::resource('admin/useraccess','admin\userAccessController');


    Route::resource('admin/accessRights','admin\accessRightsController');

    /*Change Password - Suresh*/
    Route::resource('admin/changePassword', 'admin\changePasswordController');   


    Route::get('admin/tcnviewprintpdf/{id}','admin\tcnviewprintController@tcnpdf');

    Route::post('admin/tcnFullWithDrawalExcel','admin\tcnFullWithDrawalController@Excel');

    Route::get('admin/tcnFullWithDrawalPDF/{id}','admin\tcnFullWithDrawalController@PDF');



//////////////          HR          /////////////////////

     /*Salary  Module - Suresh*/
    Route::resource('hr/salaryAllowance','hr\salaryAllowanceController');


    Route::resource('hr/salaryMaster','hr\salaryMasterController');


    Route::resource('hr/salaryDetails','hr\salaryDetailsController');

    Route::post('hr/salaryDetailsExcel','hr\salaryDetailsController@Excel');

<?php

//////////////          ADMIN          /////////////////////


     /*TCN  Module - Suresh*/
    Route::resource('admin/tcnmaster','admin\tcnmasterController');


    Route::get('admin/tcn_request_listDataTable','admin\tcnRequestController@listTcnNotConfirmDataTable');
    Route::resource('admin/tcnRequest','admin\tcnRequestController');


    Route::resource('admin/tcnApplicationForm','admin\tcnApplicationFormController');

    Route::resource('admin/tcnApprove','admin\tcnApproveController');

    Route::get('admin/tcnviewprintpdf/{id}','admin\tcnviewprintController@tcnpdf');

    Route::resource('admin/tcnviewprint','admin\tcnviewprintController');

    Route::resource('admin/tcnTransfer','admin\tcnTransferController');

    Route::resource('admin/tcnFullWithDrawal','admin\tcnFullWithDrawalController');

    Route::resource('admin/tcnmembership', 'admin\tcnMembershipController');   

    /*Withdrawal  Module - Suresh*/
    //Route::resource('admin/normalWithDraw','admin\normalWithDrawalController');

    /*Reset DSA/MEM Password - Suresh*/
    Route::resource('admin/resetPassword', 'admin\resetPasswordController');

    /*User Access Module - Suresh/Dominic */
    Route::resource('admin/useraccess','admin\userAccessController');

    Route::resource('admin/accessRights','admin\accessRightsController');

    /*Change Password - Suresh*/
    Route::resource('admin/changePassword', 'admin\changePasswordController');   





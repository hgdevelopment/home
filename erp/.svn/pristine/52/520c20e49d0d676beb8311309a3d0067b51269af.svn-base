
//////////////          WEB         /////////////////////

    Route::resource('web/tcnwithDrawal','web\tcnwithDrawalController');






//////////////          ADMIN          /////////////////////
    /*TCN  Module - Suresh*/
    Route::resource('admin/tcnmaster','admin\tcnmasterController');
    Route::GET('admin/tcnAjax','admin\tcnApplicationFormController@tcnAjax');
    Route::resource('admin/tcnApplicationForm','admin\tcnApplicationFormController');
    Route::GET('admin/tcnviewprint','admin\tcnviewprintController@tcnviewprint');

    /*Withdrawal  Module - Suresh*/
    Route::resource('admin/normalWithDraw','admin\normalWithDrawalController');
    Route::GET('admin/normalWithDrawtcnAjax','admin\normalWithDrawalController@Ajax');

    /*Reset DSA/MEM Password - Suresh*/
    Route::resource('admin/resetPassword', 'admin\resetPasswordController');   

    /*User Access Module - Suresh/Dominic */
    Route::resource('admin/useraccess','admin\userAccessController');
    Route::resource('admin/accessRights','admin\accessRightsController');

    

 <?php
    Route::resource('web/tcnwithDrawal','web\tcnwithDrawalController');



    /*Change Password - Suresh*/
    Route::get('web/changePassword', 'web\changePasswordController@showResetForm');   
    Route::post('web/changePassword', 'web\changePasswordController@reset');   
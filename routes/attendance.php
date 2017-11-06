<?php

    # Attendance  Module

    # Line : 15
    Route::get('admin/attendance/start','attendanceController@start'); 
    Route::post('admin/attendance/1','attendanceController@mng'); 
    Route::post('admin/attendance/2','attendanceController@bri'); 
    Route::post('admin/attendance/3','attendanceController@bro'); 
    Route::post('admin/attendance/4','attendanceController@ngt'); 
    Route::post('admin/attendance/4','attendanceController@ngt'); 

    Route::get('admin/attendance/report','attendancereportController@home'); 

    Route::post('admin/attendance/staff','attendancereportController@staff'); 
    Route::post('admin/attendance/department','attendancereportController@department'); 
    # Ajax submitting shift, initilize day

    Route::get('admin/attendance/review','reviewController@home');
    Route::post('admin/attendance/change','reviewController@change');
    Route::get('admin/attendance/verify','reviewController@verify');
    Route::post('admin/attendance/approve','reviewController@approve');

    Route::get('admin/attendance/import','importController@home');

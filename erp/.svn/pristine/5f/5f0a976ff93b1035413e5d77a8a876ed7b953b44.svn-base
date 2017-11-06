<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great! 
|
*/

Route::group(['middleware' => ['web']], function () 
{
    Route::get('/', 'auth\LoginController@showLoginForm');
    Route::post('/login', ['as'=>'login','uses'=>'auth\LoginController@login']);
    Route::get('/logout', ['as'=>'logout','uses'=>'auth\LoginController@logout']);   
   
    Route::get('dsa/create', 'web\dsaController@createdsa');
    Route::post('dsa/create', 'web\dsaController@store');

    Route::get('member/create/{id}','web\memberController@show'); 
    Route::get('member/{id}/edit','web\memberController@edit');
    Route::put('member/creates/{id}','web\memberController@update');
     Route::get('web/member/memberconfrim/{id}','web\memberController@viewcreated');
     Route::get('member/countryIds','web\memberController@checkCountryId');

    Route::resource('web/member/createMember', 'web\memberController');
     
});

Route::group(['middleware' => ['user']], function () 
{
    Route::get('web/profile', ['as'=>'web.profile','uses'=>'web\pageController@profile']);
    Route::get('web/dashboard', ['as'=>'web.dashboard','uses'=>'web\pageController@index']);

    Route::resource('web/tcnapplication', 'web\tcnController');
    Route::get('web/tcn', ['as'=>'web.tcninfo','uses'=>'web\pageController@tcn']);
    Route::get('web/tcndetails/{id}', ['as'=>'web.tcninfo.details','uses'=>'web\pageController@tcndetails']);
    Route::post('web/tcnmasterAjax', ['as'=>'web.ajax.tcnmaster','uses'=>'web\tcnController@tcnmasterAjax']);
    Route::resource('web/tcnwithDrawal','web\tcnwithDrawalController');

    Route::get('web/application', ['as'=>'web.application','uses'=>'web\pageController@application']);
    Route::post('web/changeimg', ['as'=>'web.changeimg','uses'=>'web\profileController@changeProfileImg']);

    Route::post('web/ajaxproof', ['as'=>'web.ajax.proof','uses'=>'web\tcnController@nomineeProofAjax']);
    Route::post('web/ajaxbank', ['as'=>'web.ajax.bank','uses'=>'web\tcnController@benifitAccountAjax']);
    Route::post('web/ajaxnominee', ['as'=>'web.ajax.nominee','uses'=>'web\tcnController@nomineeDetailsAjax']);
    Route::post('web/heeraAccountAjax', ['as'=>'web.ajax.heeraAccount','uses'=>'web\tcnController@heeraAccountAjax']);

    Route::resource('web/nominee','web\nomineeController');


   include'surezweb.php';

    Route::resource('web/dsa','web\dsaController');
    Route::resource('web/dsa/viewDsaRequest','web\dsaController@show');


    Route::get('web/member/viewMember', 'web\memberController@viewMemberList');
    Route::get('web/member/createdByOther', 'web\memberController@createdByOther');
    Route::post('web/member/createdByOther', 'web\memberController@createdByOther');
    Route::resource('web/member','web\memberController');

    Route::get('web/enquirysolving/{id}','web\enquiryregController@solveview');
    Route::post('web/enquirysolving','web\enquiryregController@insertsolve');
    Route::get('web/enquirysolveview','web\enquiryregController@solve');
    Route::resource('web/enquiryreg','web\enquiryregController');

});

Route::group(['middleware' => ['admin']], function () 
{

    Route::get('admin/dashboard', ['as'=>'admin.dashboard','uses'=>'admin\pageController@index']);


    /*Bank  Module - Priya*/
    Route::resource('admin/bankmaster','admin\bankmasterController');
    Route::post('admin/bankmasteradd','admin\bankmasterController@add');

    /*Benefit  Module - Akhil*/
    Route::get('admin/benefit','benefitController@tcn'); //Akhil
    Route::post('admin/benefit/add','benefitController@add'); //Akhil
    Route::get('admin/benefit/check','benefitController@check'); //Akhil
    Route::get('admin/benefit/generate','genrateController@tcn'); //Akhil
    Route::get('admin/benefit/tobegenerate','genrateController@tobe'); //Akhil
    Route::post('admin/benefit/generate','genrateController@store'); //Akhil
    Route::get('admin/benefit/view','benefitController@view'); 
    Route::post('admin/benefit/view','benefitController@choice'); 

    /*Enquiry  Module - Diniya*/
    Route::get('admin/viewsolvedenquiry','admin\enquiryregController@solvedview');
    Route::get('admin/enquiryregview','admin\enquiryregController@show');
    Route::get('admin/enquiryhandling/{id}','admin\enquiryregController@view');
    Route::post('admin/enquiryhandling','admin\enquiryregController@insert');
    Route::get('admin/enquirysolveview','admin\enquiryregController@solve');
    Route::get('admin/enquirysolving/{id}','admin\enquiryregController@solveview');
    Route::post('admin/enquirysolving','admin\enquiryregController@insertsolve');
    Route::post('admin/enquiry/enquiryreg/tcn','admin\enquiryregController@display');
    Route::get('admin/pending_tcn/{id}','admin\enquiryregController@pendingtcn');
    Route::get('admin/enquiry_report','admin\enquiryregController@report');
    Route::post('admin/enquiry_report/view','admin\enquiryregController@reportview');
    Route::resource('admin/enquiryreg','admin\enquiryregController');

    //Incentive  Module - Diniya
    Route::resource('admin/categorymaster','admin\categorymasterController');
    Route::resource('admin/incentivemaster','admin\incentivemasterController');


    //Partial Withdraw Module - Diniya

    Route::get('admin/partialWithdraw/viewdeny','admin\partialWithdrawalController@viewdeny'); 
    Route::get('admin/partialWithdraw/viewapprove','admin\partialWithdrawalController@viewapprove'); 
    Route::post('admin/partialWithdraw/approve', 'admin\partialWithdrawalController@action');  
    Route::get('admin/partialWithdrawview/{id}','admin\partialWithdrawalController@view');
    Route::get('admin/partialWithdraw/view','admin\partialWithdrawalController@test'); 
    Route::post('admin/partialWithdraw/viewData', 'admin\partialWithdrawalController@viewData');  
    Route::get('admin/partialWithdraw/{id}','admin\partialWithdrawalController@show');
    Route::post('admin/partialWithdraw/withdraw', 'admin\partialWithdrawalController@withdraw'); 
    Route::resource('admin/partialWithdraw', 'admin\partialWithdrawalController'); 
     
    Route::post('admin/reassigndsa/solve', 'admin\reassignDsaController@solve'); 
    Route::post('admin/reassigndsa/view', 'admin\reassignDsaController@view');  
    Route::resource('admin/reassigndsa', 'admin\reassignDsaController');

    Route::post('admin/reassignmember/solve', 'admin\reassignMemberController@solve'); 
    Route::post('admin/reassignmember/view', 'admin\reassignMemberController@view');  
    Route::resource('admin/reassignmember', 'admin\reassignMemberController');  
    
    Route::get('admin/tcn_generate_pdf/{id}','admin\tcnviewprintController@generate_tcn_pdf');

/////////////////////////////////////////////////////////////////////////////////////////////
    ########  Suresh Routes  ##############

//////////////                 /////////////////////

   include'surezadmin.php';

/////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////

    ########  Priya Routes  ##############
   include'priya.php';
////////////////    ///////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////////////////////
    ####################### Maneesha ##################
    include'maneesha.php';
  


  ///////////////////////////////////////////////////////////////////////////////////////////////  
});

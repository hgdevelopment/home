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

    Route::get('member/create', 'web\memberController@index');


    Route::get('dsa/create', 'web\dsaController@createdsa');
    Route::post('dsa/create', 'web\dsaController@store');
   
});


Route::group(['middleware' => ['user']], function () 
{
    
    Route::get('web/profile', ['as'=>'web.profile','uses'=>'web\pageController@profile']);
    Route::get('web/dashboard', ['as'=>'web.dashboard','uses'=>'web\pageController@index']);

    Route::resource('web/tcnapplication', 'web\tcnController');
    Route::get('web/tcn', ['as'=>'web.tcninfo','uses'=>'web\pageController@tcn']);
    Route::get('web/tcndetails/{id}', ['as'=>'web.tcninfo.details','uses'=>'web\pageController@tcndetails']);
    Route::post('web/tcnmasterAjax', ['as'=>'web.ajax.tcnmaster','uses'=>'web\tcnController@tcnmasterAjax']);

    Route::get('web/application', ['as'=>'web.application','uses'=>'web\pageController@application']);
    Route::post('web/changeimg', ['as'=>'web.changeimg','uses'=>'web\profileController@changeProfileImg']);

    Route::post('web/ajaxproof', ['as'=>'web.ajax.proof','uses'=>'web\tcnController@nomineeProofAjax']);
    Route::post('web/ajaxbank', ['as'=>'web.ajax.bank','uses'=>'web\tcnController@benifitAccountAjax']);
    Route::post('web/ajaxnominee', ['as'=>'web.ajax.nominee','uses'=>'web\tcnController@nomineeDetailsAjax']);
    Route::post('web/heeraAccountAjax', ['as'=>'web.ajax.heeraAccount','uses'=>'web\tcnController@heeraAccountAjax']);

    Route::resource('web/nominee','web\nomineeController');


    Route::resource('web/dsa','web\dsaController');
    Route::resource('web/dsa/viewDsaRequest','web\dsaController@show');

    Route::resource('web/member','web\memberController');
    Route::get('web/member/viewMember', 'web\memberController@viewMemberList');
    Route::get('web/member/createdByOther', 'web\memberController@createdByOther');
    Route::post('web/member/createdByOther', 'web\memberController@createdByOther');

});

Route::group(['middleware' => ['admin']], function () 
{

    Route::resource('admin/approve_member','admin\approvedMemberController');

    Route::get('admin/dashboard', ['as'=>'admin.dashboard','uses'=>'admin\pageController@index']);

    Route::resource('admin/tcnmaster','admin\tcnmasterController');
    Route::GET('admin/tcnAjax','admin\tcnApplicationFormController@tcnAjax');
    Route::resource('admin/tcnApplicationForm','admin\tcnApplicationFormController');

    Route::resource('admin/bankmaster','admin\bankmasterController');
    Route::post('admin/bankmasteradd','admin\bankmasterController@add');

    Route::resource('admin/benefit','admin\benefitController');
    Route::get('admin/viewBenefit','admin\benefitController@show');


    Route::resource('admin/enquiryreg','admin\enquiryregController');
    Route::get('admin/enquiryregview','admin\enquiryregController@show');
    Route::get('admin/enquirysolveview','admin\enquiryregController@solve');
    Route::resource('admin/categorymaster','admin\categorymasterController');
    Route::post('admin/enquiryhandling', 'admin\enquiryregController@insert');
    Route::get('admin/enquiryhandling/{id}','admin\enquiryregController@view');
    Route::post('admin/enquirysolving','admin\enquiryregController@insertsolve');
    Route::get('admin/enquirysolving/{id}','admin\enquiryregController@solveview');



    Route::resource('admin/useraccess','admin\userAccessController');
    Route::resource('admin/accessRights','admin\accessRightsController');

     Route::resource('admin/deniedMember','admin\deniedMemberController');
    Route::resource('admin/viewDeniedMemReq','admin\deniedMemberController');


    Route::resource('admin/approve_member','admin\approvedMemberController');
    
    Route::get('admin/member/memberCreate', 'admin\memberController@memberCreate');
    Route::post('admin/member/memberCreate', 'admin\memberController@memberCreate');
    Route::get('admin/member/viewMember', 'admin\memberController@viewMember');
    Route::post('admin/member/approveMember','admin\memberController@approveMember');
    Route::post('admin/member/denyMember','admin\memberController@denyMember');
    Route::resource('admin/member','admin\memberController');
    Route::post('admin/changeimg', ['as'=>'admin.changeimg','uses'=>'admin\profileController@changeProfileImg']);




   
    Route::resource('admin/resetPassword', 'admin\resetPasswordController');   
    Route::post('admin/partialWithdraw/viewData', 'admin\partialWithdrawalController@viewData');  
    Route::resource('admin/partialWithdraw', 'admin\partialWithdrawalController');  
    Route::resource('admin/incentivemaster','admin\incentivemasterController');

/////////////////////////////////////////////////////////////////////////////////////////////

    ########  Priya Routes  ##############

     //check heera account link
    Route::get('admin/checkAcc','admin\dsaController@checkAccount');
    //view Dsa Request
    Route::get('admin/viewDSA','admin\dsaController@showRequest');
    // Edit Dsa Request
    Route::get('admin/dsa/{id}/editReq','admin\dsaController@editReq');
    // Edit Dsa approve
    Route::get('admin/dsa/{id}/editApprove','admin\dsaController@editApprove');
    //View Dsa Verification update Page
    Route::post('admin/verification','admin\dsaController@verification');
    //view Dsa Request afther Verification
    Route::get('admin/dsa/viewDsaRequest','admin\dsaController@show');
    //view Denied Dsa
    Route::get('admin/dsa/viewDsaDenied','admin\dsaController@Deniedshow');
    //dsa Approve link
    Route::post('admin/dsa/app/approve','admin\dsaController@approve');
    //Dsa Request Edit afther Verification
    Route::get('admin/dsa/app/editDsa/{id}','admin\dsaController@Dsaedit');
    //dsa Denied Link
    Route::post('admin/dsa/app/deny','admin\dsaController@deny'); 
    //dsa request Delete
    Route::get('admin/delete','admin\dsaController@destroy');
    //View approve DSA
    Route::get('admin/dsa/viewApproveDsa','admin\dsaController@showApproveDsa');
    //dsa request form page
    Route::resource('admin/dsa','admin\dsaController');

///////////////////////////////////////////////////////////////////////////////////////////////


 });

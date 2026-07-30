<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\AutoCompleteController;
use App\Http\Controllers\Auth\WebLoginRegisterController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['register' => false]);

Route::get('auth/verify/{token}', 'AuthController@verify_email');
Route::post('auth/verifyStore/{token}', 'AuthController@store')->name("auth.confirm");

Route::group(['prefix' => 'panel', 'as' => 'panel.', 'namespace' => 'Admin', 'middleware' => ['auth','isVerified']], function () {
    Route::get('/dashboard', 'HomeController@index')->name('home');
    Route::resource('role-permissions', 'RoleHasPermissionsController');
    Route::resource('user-managment', 'UserController');
    Route::resource('supervisor', 'SupervisorController');
    Route::resource('sales-agent', 'SalesAgentController');
    Route::resource('enquiry', 'EnquiryController');
    Route::get('deals-revoke/{id}', 'DealController@revoke')->name('deals.revoke');
    Route::resource('deals', 'DealController');
    Route::get('deals/{slug}', 'DealController@show')->name('deals');
    Route::get('deals/{id}/offerletter', 'DealController@offerletter')->name('deals.offerletter');
    Route::put('deals/{id}/offerletter', 'DealController@offerletter_update')->name('deals.offerletter_update');
    Route::get('deals/{id}/offerletter/create-pdf-file', 'DealController@viewoffer')->name('deals.offerletter.create-pdf-file');
    Route::put('deals/{id}/offerletter/work-order-update', 'DealController@workorder_update')->name('deals.offerletter.work-order-update');
    Route::put('deals/{id}/offerletter/send-payment-link', 'DealController@send_payment_link')->name('deals.offerletter.send-payment-link');
    Route::get('/autocomplete-search', "AutoCompleteController@autocompletesearch")->name('autocomplete-search');
    Route::get('/dealstatusdata-ajax',"DealsTabFilterController@dealstatusdata")->name('dealstatusdata-ajax');
    Route::resource('blogs', 'BlogsController');
    Route::resource('partner-request', 'PartnerRequestController');
    Route::resource('reports', 'ReportsController');
    Route::resource('property', 'PropertyController');
    Route::put('property', 'PropertyController@uploadimages')->name('property.uploadimages');
    Route::get('property/delete-image/{id}', 'PropertyController@deleteimage')->name('delete-image');
    Route::post('property/upload-banner', 'PropertyController@upload_banner')->name('upload-banner');
    Route::get('change-user-password', 'UserController@showuserpassword')->name('change-user-password');
    Route::post('change-user-password', 'UserController@updateuserpassword')->name('change-user-password.updateuserpassword');
    Route::resource('seo-optimization', 'SeoOptimizationController');
    Route::resource('advance-report', 'AdvanceReportController');
    Route::resource('imtex-visitor', 'ImtexVisitorController');
    Route::resource('pmtx-visitor', 'PmtxVisitorController');
    Route::resource('seafood', 'SeaFoodController');
    
});


Route::group(['namespace' => 'Website'], function () {
    Route::get('/', "HomeController@index")->name('home');
    Route::get('/conference-organizer', "HomeController@conferencesMeeting")->name('conferences-meeting');
    Route::get('/wedding-planning', "HomeController@weddingService")->name('wedding-service');
    Route::get('/event-management', "HomeController@eventManagment")->name('event-managment');
    Route::get('/team-outing', "HomeController@dayouts")->name('dayouts-service');
    Route::get('/travel-planner', "HomeController@travelManagement")->name('travel-managment');
    Route::get('/tour-handling', "HomeController@tourHandling")->name('tour-handling');
    
    //Property detail
    Route::get('/property-detail/{propertyid}/{propertyslug}', "HomeController@propertyDetail")->name('property-detail');

    // hotel
    Route::get('/hotels', "HotelsController@index")->name('hotels.index');
    
    Route::get('blogs/{pagenumber?}', 'BlogController@index')->name('blogs.index');
    Route::get('blog/{id}', 'BlogController@show')->name('blogs.show');
    //Route::resource('blogs', 'BlogController');

    Route::post('/submit-enquiry', "EnqueryController@submit_enquiry")->name('submit-enquiry');
    Route::post('/submit-request', "EnqueryController@submit_request")->name('submit-request');
    Route::get('/search', "HomeController@search")->name('search-service');

    Route::get('/contact-us', "HomeController@contactUs")->name('contact-us');

    Route::get('/why-mice', "HomeController@whyMice")->name('why-mice');
    Route::get('/partner-with-us', "HomeController@partnerWithUs")->name('partner-with-us');
    Route::get('/inquery', "EnqueryController@index")->name('inquery.index');
    Route::get('/hotel-owners', "HomeController@partnerWithUs")->name('hotel-owners');
    Route::post('/subscriber', "SubscriberController@subscriber")->name('subscriber');
    Route::post('/getProperties', "HomeController@getProperties")->name('getProperties');
    Route::get('micehospitalitymap.xml', "SiteMapController@index");
    Route::get('imtex', "ImtexController@create");
    Route::post('imtex/imtexRegistration', "ImtexController@registrationStore")->name('registrationStore');

    Route::get('pmtx', "PmtxController@create");
    Route::post('pmtx/pmtxRegistration', "PmtxController@registrationSubmit")->name('registrationSubmit');
    Route::get('windergy', "ImtexController@wsfcCreate");
    Route::post('windergy/windergyRegistration', "ImtexController@registrationWindergyStore")->name('registrationWindergyStore');
    
    // sea food
    Route::get('seafood-congress', "ImtexController@seaFoodCreate");
    Route::post('seafood/seafoodRegistration', "ImtexController@registrationSeaFoodyStore")->name('registrationSeaFoodyStore');
    
    Route::get('brew-and-spirit', "ImtexController@brewSpiritCreate");
    Route::post('brew-and-spirit/brewAndSpiritRegistration', "ImtexController@registrationbrewSpiritStore")->name('registrationbrewSpiritStore');
});

Route::controller(WebLoginRegisterController::class)->group(function() {
    Route::get('web-login/profile', 'profile')->name('web-login.profile');
    Route::post('web-login/updatePersonalProfile', 'updatePersonalProfile')->name('web-login.updatePersonalProfile');
    Route::post('web-login/updateProfessionalProfile', 'updateProfessionalProfile')->name('web-login.updateProfessionalProfile');
    Route::get('web-login/inquirydetails-ajax', 'viewprofileinquiry')->name('web-login.inquirydetails-ajax');

    Route::post('web-login/updateuserpassword','updateuserpassword')->name('web-login.updateuserpassword');
    Route::get('web-login/postcomment-ajax', 'addcomments')->name('web-login.postcomment-ajax');
    Route::post('web-login/postworkorder-ajax', 'add_workorder_files')->name('web-login.postworkorder-ajax');
});
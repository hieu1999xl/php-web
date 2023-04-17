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

// Autho Routes
require __DIR__.'/auth.php';

// Atom/ RSS Feed Routes
//Route::feeds();

// Language Switch
Route::get('language/{language}', 'LanguageController@switch')->name('language.switch');

/**
 *
 *
 *  Permission Routes
 *
 */

Route::group(['prefix' => 'permissions', 'as' => 'backend.', 'middleware' => ['auth', 'can:view_backend']], function () {
    $module_name = 'permissions';
    $controller_name = 'PermissionController';

    //route
    Route::get('/', ['as' => "$module_name.index", 'uses' => "$controller_name@index"])->middleware('can:view_permission');
    Route::get("/index_data", ['as' => "$module_name.index_data", 'uses' => "$controller_name@index_data"]);
    Route::get("/create", ['as' => "$module_name.create", 'uses' => "$controller_name@create"])->middleware(['permission:create_permisions', 'can:create_permissions']);
    Route::get("/trashed", ['as' => "$module_name.trashed", 'uses' => "$controller_name@trashed"]);
    Route::get("/edit/{permission}", ['as' => "$module_name.edit", 'uses' => "$controller_name@edit"])->middleware(['permission:edit_permissions', 'can:edit_permissions']);
    Route::get("/show/{permission}", ['as' => "$module_name.show", 'uses' => "$controller_name@show"]);
    Route::post('/store', ['as' => "$module_name.store", 'uses' => "$controller_name@store"]);
    Route::patch('/update/{permission}', ['as' => "$module_name.update", 'uses' => "$controller_name@update"]);
    Route::delete('/destroy/{id}', ['as' => "$module_name.destroy", 'uses' => "$controller_name@destroy"])->middleware(['permission:delete_permissions', 'can:delete_permissions']);
});


/*
*
* Frontend Routes
*
* --------------------------------------------------------------------
*/

Route::group([
    'namespace' => 'Frontend',
    'as' => 'frontend.',
//    'where' => ['locale' => '[a-zA-Z]{2}'],
    'prefix' => LaravelLocalization::setLocale(),
'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function()   {
    // Route search home page
    Route::post('/api-search', 'FrontendController@searchHomePage')->name('searchHomePage');
    Route::get('/api-homepage', 'FrontendController@apiMutilangHomePage')->name('apiMutilangHomePage')->middleware('htmlMin');
    Route::get('/download/{post_id}', 'FrontendController@downloadFile')->name('downloadFile');
    Route::group(['middleware' => 'htmlMin'],function () {
        Route::get('/', 'FrontendController@index')->name('index');
        Route::get('home', 'FrontendController@index')->name('home');
        Route::get('convert-slug', 'FrontendController@convertSlug')->name('convert_slug');
        /////////////////////////////////////////////////////////////
        Route::get('privacy', 'FrontendController@privacy')->name('privacy');
        Route::get('terms', 'FrontendController@terms')->name('terms');

        Route::get('homepage-news-api', 'FrontendController@indexApi')->name('homeApi');
        // Route services
        Route::group(['prefix' => 'services', 'middleware' => 'activeMenu'],function (){
            Route::get('/', 'ServiceController@services')->name('services');
            Route::get('/mobile-solutions', 'ServiceController@services_detail')->name('mobile_app_development');
            Route::get('/offshore-dedicated-team', 'ServiceController@services_maintain')->name('services_maintain');
            Route::get('/on-site-resources', 'ServiceController@services_onsite')->name('services_onsite');
            Route::get('/legacy-system-migration', 'ServiceController@services_legacy')->name('services_legacy');
            Route::get('/custom-software-development', 'ServiceController@services_enterprise')->name('services_enterprise');
            Route::get('/testing-services', 'ServiceController@services_testing')->name('services_testing');
            Route::get('/outsourcing-services', 'ServiceController@outsourcing_services')->name('outsourcing_services');
            Route::get('/innovation-technologies', 'ServiceController@outsourcing_services')->name('outsourcing_services');
            Route::get('/staffing-augmentation', 'ServiceController@outsourcing_services')->name('outsourcing_services');
            Route::get('/clever', 'ServiceController@clever')->name('clever');
            Route::get('/foldio', 'ServiceController@foldio')->name('foldio');
        });

        // Route technology
        Route::group(['prefix' => 'technologies'],function (){
            Route::get('/{id?}', 'TechnologyController@index')->name('technology');
            Route::get('/case-study/{menuId}', 'TechnologyController@getCastudyTechnologies')->name('technology.getCaseStudy');
//            Route::get('/', 'TechnologyController@index')->name('technology');
            Route::get('/getMenuChildTechnologies/{parentId}', 'TechnologyController@getMenuChildTechnologiesByParentId')->name('technology.getMenuChild');
            Route::get('/java-script', 'FrontendController@technology_detail')->name('technology_detail');
            Route::get('/microsoft-platform', 'FrontendController@technology_micro')->name('technology_micro');
            Route::get('/open-source', 'FrontendController@technology_opensource')->name('technology_opensource');
            Route::get('/mobile-technology', 'FrontendController@technology_mobile')->name('technology_mobile');
            Route::get('/software-testing-quality-control', 'FrontendController@technology_QA')->name('technology_QA');
            Route::get('/front-end-development', 'FrontendController@technology_frontend')->name('technology_frontend');
        });

        // Route success
        // Route::get('case-studies', 'FrontendController@case-studies')->name('case-studies');
        Route::group(['prefix' => 'case-studies'],function (){
            Route::post('/', 'FrontendController@searchCaseStudies')->name('searchCaseStudies');
            Route::get('/{id}/{slug?}', 'CaseStudyController@getCaseStudyDetail')->name('case_study_detail')->middleware('activeMenu');
            Route::get('/', 'CaseStudyController@getCaseStudies')->name('case_studies')->middleware('activeMenu');
            Route::post('/', 'CaseStudyController@getCaseStudies')->name('case_studies')->middleware('activeMenu');
            Route::post('/addFilterSession','CaseStudyController@addFilterSession');
            Route::post('/destroySession','CaseStudyController@removeFilterSession');

        });
        Route::get('industries/{slug?}', 'IndustryController@industry_detail')->name('industry_detail')->middleware('activeMenu');

        // Route news
        Route::get('news', 'NewController@news')->name('news');
        Route::get('news/{id}/{slug?}', 'NewController@news_detail')->name('news_detail');
        Route::get('/news-category/{slug}', 'NewController@viewMoreNews')->name('viewMoreNews');


        Route::get('list-shareholder-document', 'FrontendController@getAllShareholderDocument')->name('load_list_doc');
        Route::get('list-shareholder-info', 'FrontendController@getAllShareholderInfoDis')->name('load_list_info');
        // get detail news

        // Route shareholder-page
        Route::get('shareholder-page', 'ShareholderController@shareholderPage')->name('shareholderPage');
        Route::get('shareholder-page/{id}/{slug?}', 'ShareholderController@shareholder_detail')->name('shareholder_detail');
        Route::get('shareholder-detail/{id}/{slug?}', 'ShareholderController@shareholder_detail')->name('shareholder_detail');

        // Route about us
        Route::get('about-us', 'AboutController@about_us')->name('about_us');
        Route::get('about-us/our-story', 'AboutController@our_story')->name('our_story');
        Route::get('about-us/tvj', 'AboutController@tvj')->name('tvj');
        //Route talent
        Route::get('talent-acquisition', 'TalentController@talent')->name('talent');
        Route::post('talent-acquisition/search', 'TalentController@searchTalent')->name('talent_search');
        Route::get('talent-acquisition/api-search', 'TalentController@apiSearchTalent')->name('api_search_talent');
        Route::get('talent-acquisition/{id}/{slug?}', 'TalentController@talent_detail')->name('talent_detail');
        // Route 404
//        Route::get('404', 'FrontendController@not_found')->name('not_found');
        // Route privacy
        Route::get('privacy', 'FrontendController@privacy')->name('privacy');
        // Route contact us contact_us
        Route::get('about-us/contact-us', 'AboutController@contact_us')->name('contact_us');
        Route::post('about-us/contact-us', 'FrontendController@sendMail')->name('sendMail');
        // Route thank-you
        Route::get('thank-you', 'FrontendController@submit_email')->name('submit_email');
    });
    // api search
    Route::post('search-api', 'FrontendController@searchAPI')->name('search_api');
    // Route rearch result
    // Route::get('result', 'FrontendController@search_result')->name('search_result');
    Route::get('search', 'FrontendController@searchHomePage')->name('search_result');
    Route::get('global-composer', 'FrontendController@globalComposer')->name('global_composer');
    //
    Route::group(['middleware' => ['auth']], function () {
        /*
        *
        *  Users Routes
        *
        * ---------------------------------------------------------------------
        */
        $module_name = 'users';
        $controller_name = 'UserController';
        Route::get("profile/{id}", ['as' => "$module_name.profile", 'uses' => "$controller_name@profile"]);
        Route::get('profile/{id}/edit', ['as' => "$module_name.profileEdit", 'uses' => "$controller_name@profileEdit"]);
        Route::patch('profile/{id}/edit', ['as' => "$module_name.profileUpdate", 'uses' => "$controller_name@profileUpdate"]);
        Route::get("$module_name/emailConfirmationResend/{id}", ['as' => "$module_name.emailConfirmationResend", 'uses' => "$controller_name@emailConfirmationResend"]);
        Route::get("profile/changePassword/{username}", ['as' => "$module_name.changePassword", 'uses' => "$controller_name@changePassword"]);
        Route::patch("profile/changePassword/{username}", ['as' => "$module_name.changePasswordUpdate", 'uses' => "$controller_name@changePasswordUpdate"]);
        Route::delete('users/userProviderDestroy', ['as' => 'users.userProviderDestroy', 'uses' => 'UserController@userProviderDestroy']);
    });
});

//Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
//    Route::get('/', 'FrontendController@index')->name('index');
//    Route::get('home', 'FrontendController@index')->name('home');
//
//});

/*
*
* Backend Routes
* These routes need view-backend permission
* --------------------------------------------------------------------
*/
Route::group(['namespace' => 'Backend', 'prefix' => LaravelLocalization::setLocale() . '/admin', 'as' => 'backend.', 'middleware' => ['auth', 'can:view_backend']], function () {

    /**
     * Backend Dashboard
     * Namespaces indicate folder structure.
     */
    Route::get('/', 'BackendController@index')->name('home');
    Route::get('dashboard', 'BackendController@index')->name('dashboard');

    /*
     *
     *  Settings Routes
     *
     * ---------------------------------------------------------------------
     */
    Route::group(['middleware' => ['permission:edit_settings']], function () {
        $module_name = 'settings';
        $controller_name = 'SettingController';
        Route::get("$module_name", "$controller_name@index")->name("$module_name")->middleware('can:view_settings');
        Route::post("$module_name", "$controller_name@store")->name("$module_name.store");
    });

    /*
    *
    *  Notification Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'notifications';
    $controller_name = 'NotificationsController';
    Route::get("$module_name", ['as' => "$module_name.index", 'uses' => "$controller_name@index"])->middleware('can:view_notifications');
    Route::get("$module_name/markAllAsRead", ['as' => "$module_name.markAllAsRead", 'uses' => "$controller_name@markAllAsRead"]);
    Route::delete("$module_name/deleteAll", ['as' => "$module_name.deleteAll", 'uses' => "$controller_name@deleteAll"]);
    Route::get("$module_name/{id}", ['as' => "$module_name.show", 'uses' => "$controller_name@show"]);

    /*
    *
    *  Backup Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'backups';
    $controller_name = 'BackupController';
    Route::get("$module_name", ['as' => "$module_name.index", 'uses' => "$controller_name@index"])->middleware('can:view_backups');
    Route::get("$module_name/create", ['as' => "$module_name.create", 'uses' => "$controller_name@create"])->middleware(['can:create_backups']);
    Route::get("$module_name/download/{file_name}", ['as' => "$module_name.download", 'uses' => "$controller_name@download"]);
    Route::get("$module_name/delete/{file_name}", ['as' => "$module_name.delete", 'uses' => "$controller_name@delete"]);

    /*
    *
    *  Roles Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'roles';
    $controller_name = 'RolesController';
    Route::resource("$module_name", "$controller_name")->middleware(['can:view_roles', 'permission:edit_roloes|add_roles|delete_roles|view_roles']);


    /*
    *
    *  Users Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'users';
    $controller_name = 'UserController';
    Route::get("$module_name/profile/{id}", ['as' => "$module_name.profile", 'uses' => "$controller_name@profile"])->middleware(['can:view_users create_users']);
    Route::get("$module_name/profile/{id}/edit", ['as' => "$module_name.profileEdit", 'uses' => "$controller_name@profileEdit"])->middleware(['can:edit_users']);
    Route::patch("$module_name/profile/{id}/edit", ['as' => "$module_name.profileUpdate", 'uses' => "$controller_name@profileUpdate"]);
    Route::get("$module_name/emailConfirmationResend/{id}", ['as' => "$module_name.emailConfirmationResend", 'uses' => "$controller_name@emailConfirmationResend"]);
    Route::delete("$module_name/userProviderDestroy", ['as' => "$module_name.userProviderDestroy", 'uses' => "$controller_name@userProviderDestroy"]);
    Route::get("$module_name/profile/changeProfilePassword/{id}", ['as' => "$module_name.changeProfilePassword", 'uses' => "$controller_name@changeProfilePassword"]);
    Route::patch("$module_name/profile/changeProfilePassword/{id}", ['as' => "$module_name.changeProfilePasswordUpdate", 'uses' => "$controller_name@changeProfilePasswordUpdate"]);
    Route::get("$module_name/changePassword/{id}", ['as' => "$module_name.changePassword", 'uses' => "$controller_name@changePassword"]);
    Route::patch("$module_name/changePassword/{id}", ['as' => "$module_name.changePasswordUpdate", 'uses' => "$controller_name@changePasswordUpdate"]);
    Route::get("$module_name/trashed", ['as' => "$module_name.trashed", 'uses' => "$controller_name@trashed"]);
    Route::patch("$module_name/trashed/{id}", ['as' => "$module_name.restore", 'uses' => "$controller_name@restore"]);
    Route::get("$module_name/index_data", ['as' => "$module_name.index_data", 'uses' => "$controller_name@index_data"]);
    Route::get("$module_name/index_list", ['as' => "$module_name.index_list", 'uses' => "$controller_name@index_list"]);
    Route::resource("$module_name", "$controller_name");
    Route::patch("$module_name/{id}/block", ['as' => "$module_name.block", 'uses' => "$controller_name@block", 'middleware' => ['permission:block_users']]);
    Route::patch("$module_name/{id}/unblock", ['as' => "$module_name.unblock", 'uses' => "$controller_name@unblock", 'middleware' => ['permission:block_users']]);
});

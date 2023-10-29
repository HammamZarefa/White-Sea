<?php

use Illuminate\Support\Facades\Route;

Route::get('/clear', function () {
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
});



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


// User Support Ticket
Route::prefix('ticket')->group(function () {
    Route::get('/', 'TicketController@supportTicket')->name('ticket');
    Route::get('/new', 'TicketController@openSupportTicket')->name('ticket.open');
    Route::post('/create', 'TicketController@storeSupportTicket')->name('ticket.store');
    Route::get('/view/{ticket}', 'TicketController@viewTicket')->name('ticket.view');
    Route::post('/reply/{ticket}', 'TicketController@replyTicket')->name('ticket.reply');
    Route::get('/download/{ticket}', 'TicketController@ticketDownload')->name('ticket.download');
});


/*
|--------------------------------------------------------------------------
| Start Admin Area
|--------------------------------------------------------------------------
*/

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::namespace('Auth')->group(function () {
        Route::get('/', 'LoginController@showLoginForm')->name('login');
        Route::post('/', 'LoginController@login')->name('login');
        Route::get('logout', 'LoginController@logout')->name('logout');
        // Admin Password Reset
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
        Route::post('password/reset', 'ForgotPasswordController@sendResetLinkEmail');
        Route::post('password/verify-code', 'ForgotPasswordController@verifyCode')->name('password.verify-code');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.change-link');
        Route::post('password/reset/change', 'ResetPasswordController@reset')->name('password.change');
    });

    Route::middleware('admin')->group(function () {
        Route::get('search', 'AdminController@search')->name('search');
        Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
        Route::get('profile', 'AdminController@profile')->name('profile');
        Route::post('profile', 'AdminController@profileUpdate')->name('profile.update');
        Route::get('password', 'AdminController@password')->name('password');
        Route::post('password', 'AdminController@passwordUpdate')->name('password.update');
        Route::middleware('can:admin')->group(function () {
            Route::get('notification/read/{id}', 'AdminController@notificationRead')->name('notification.read');
            Route::get('notifications', 'AdminController@notifications')->name('notifications');

            Route::get('/migrate', function () {
                \Artisan::call('migrate');
                dd('migrated!');
            });
            // Users Admins
            Route::get('admins', 'AdminController@admins')->name('admins.all');
            Route::get('admin/detail/{id}', 'AdminController@details')->name('admin.detail');
            Route::post('admin/update/{id}', 'AdminController@update')->name('admin.update');
            Route::post('admin/create', 'ManageUsersController@addSubBalance')->name('users.addSubBalance');
            Route::post('passwords/{id}', 'AdminController@adminPasswordUpdate')->name('admin.password');
            Route::post('admin/delete/{id}', 'AdminController@destroy')->name('admin.destroy');
            // Subscriber
            Route::get('subscriber', 'SubscriberController@index')->name('subscriber.index');
            Route::get('subscriber/send-email', 'SubscriberController@sendEmailForm')->name('subscriber.sendEmail');
            Route::post('subscriber/remove', 'SubscriberController@remove')->name('subscriber.remove');
            Route::post('subscriber/send-email', 'SubscriberController@sendEmail')->name('subscriber.sendEmail');

            // Manage Banner
            Route::get('banner', 'BannerController@index')->name('banner');
            Route::get('banner/create', 'BannerController@create')->name('banner.create');
            Route::post('banner/create', 'BannerController@store')->name('banner.store');
            Route::get('banner/edit/{id}', 'BannerController@edit')->name('banner.edit');
            Route::post('banner/edit/{id}', 'BannerController@update')->name('banner.update');
            Route::post('banner/destroy/{id}', 'BannerController@destroy')->name('banner.destroy');

            // Admin Support
            Route::get('tickets', 'SupportTicketController@tickets')->name('ticket');
            Route::get('tickets/pending', 'SupportTicketController@pendingTicket')->name('ticket.pending');
            Route::get('tickets/closed', 'SupportTicketController@closedTicket')->name('ticket.closed');
            Route::get('tickets/answered', 'SupportTicketController@answeredTicket')->name('ticket.answered');
            Route::get('tickets/view/{id}', 'SupportTicketController@ticketReply')->name('ticket.view');
            Route::post('ticket/reply/{id}', 'SupportTicketController@ticketReplySend')->name('ticket.reply');
            Route::get('ticket/download/{ticket}', 'SupportTicketController@ticketDownload')->name('ticket.download');
            Route::post('ticket/delete', 'SupportTicketController@ticketDelete')->name('ticket.delete');


            // Language Manager
            Route::get('/language', 'LanguageController@langManage')->name('language.manage');
            Route::post('/language', 'LanguageController@langStore')->name('language.manage.store');
            Route::post('/language/delete/{id}', 'LanguageController@langDel')->name('language.manage.del');
            Route::post('/language/update/{id}', 'LanguageController@langUpdatepp')->name('language.manage.update');
            Route::get('/language/edit/{id}', 'LanguageController@langEdit')->name('language.key');
            Route::post('/language/import', 'LanguageController@langImport')->name('language.import_lang');
            Route::get('/auto-translate', 'LanguageController@searchForStrings')->name('lang.translate');

            Route::post('language/store/key/{id}', 'LanguageController@storeLanguageJson')->name('language.store.key');
            Route::post('language/delete/key/{id}', 'LanguageController@deleteLanguageJson')->name('language.delete.key');
            Route::post('language/update/key/{id}', 'LanguageController@updateLanguageJson')->name('language.update.key');

            // General Setting
            Route::get('general-setting', 'GeneralSettingController@index')->name('setting.index');
            Route::post('general-setting', 'GeneralSettingController@update')->name('setting.update');
            Route::post('exchange_rate', 'GeneralSettingController@exchange_rate')->name('setting.exchange_rate');

            // Logo-Icon
            Route::get('setting/logo-icon', 'GeneralSettingController@logoIcon')->name('setting.logo_icon');
            Route::post('setting/logo-icon', 'GeneralSettingController@logoIconUpdate')->name('setting.logo_icon');

            // Plugin
            Route::get('extensions', 'ExtensionController@index')->name('extensions.index');
            Route::post('extensions/update/{id}', 'ExtensionController@update')->name('extensions.update');
            Route::post('extensions/activate', 'ExtensionController@activate')->name('extensions.activate');
            Route::post('extensions/deactivate', 'ExtensionController@deactivate')->name('extensions.deactivate');
            // SEO
            Route::get('seo', 'FrontendController@seoEdit')->name('seo');

            //Shipment
            Route::post('shipment/status/{id}', 'ShipmentController@status')->name('shipment.status');
            Route::resource('shipments', 'ShipmentController');
// Frontend
            Route::name('frontend.')->prefix('frontend')->group(function () {
                Route::get('templates', 'FrontendController@templates')->name('templates');
                Route::post('templates', 'FrontendController@templatesActive')->name('templates.active');
                Route::get('frontend-sections/{key}', 'FrontendController@frontendSections')->name('sections');
                Route::post('frontend-content/{key}', 'FrontendController@frontendContent')->name('sections.content');
                Route::get('frontend-element/{key}/{id?}', 'FrontendController@frontendElement')->name('sections.element');
                Route::post('remove', 'FrontendController@remove')->name('remove');

                // Page Builder
                Route::get('manage-pages', 'PageBuilderController@managePages')->name('manage.pages');
                Route::post('manage-pages', 'PageBuilderController@managePagesSave')->name('manage.pages.save');
                Route::post('manage-pages/update', 'PageBuilderController@managePagesUpdate')->name('manage.pages.update');
                Route::post('manage-pages/delete', 'PageBuilderController@managePagesDelete')->name('manage.pages.delete');
                Route::get('manage-section/{id}', 'PageBuilderController@manageSection')->name('manage.section');
                Route::post('manage-section/{id}', 'PageBuilderController@manageSectionUpdate')->name('manage.section.update');
            });
            Route::post('items/status/{id}', 'ItemController@destroy')->name('item.status');
            Route::get('items/print/{id}', 'ItemController@printItem')->name('item.print');
            Route::get('shipmentexport/{id}', 'ItemController@export')->name('shipment.item.export');
        });


        //Items

        Route::get('shipmentitems/{id}', 'ItemController@shipmentItems')->name('shipment.items');
        Route::get('shipment/{id}', 'ItemController@create')->name('shipment.item.create');
        Route::get('shipmentsearch/{id}', 'ItemController@search')->name('shipment.item.search');
        Route::get('itemsearch', 'ItemController@searchItem')->name('shipment.items.search');


//        Route::post('shipment/status/{id}','ShipmentController@status')->name('shipment.status');
        Route::resource('items', 'ItemController');
//
//        //Shipment
//        Route::post('shipment/status/{id}','ShipmentController@status')->name('shipment.status');
//        Route::resource('shipments', 'ShipmentController');

        Route::get('status', 'ShippingStatusController@index')->name('status.index');
        Route::post('status', 'ShippingStatusController@store')->name('status.store');
        Route::post('status/{status}', 'ShippingStatusController@update')->name('status.update');
        Route::post('status-active/{status}', 'ShippingStatusController@changeStatus')->name('status.status');
    });
});


/*
|--------------------------------------------------------------------------
| Start User Area
|--------------------------------------------------------------------------
*/


Route::name('user.')->group(function () {
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register')->middleware('regStatus');

    Route::group(['middleware' => ['guest']], function () {
        Route::get('register/{reference}', 'Auth\RegisterController@referralRegister')->name('refer.register');
    });
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/code-verify', 'Auth\ForgotPasswordController@codeVerify')->name('password.code_verify');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/verify-code', 'Auth\ForgotPasswordController@verifyCode')->name('password.verify-code');

});

Route::name('user.')->prefix('user')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('authorization', 'AuthorizationController@authorizeForm')->name('authorization');
        Route::get('resend-verify', 'AuthorizationController@sendVerifyCode')->name('send_verify_code');
        Route::post('verify-email', 'AuthorizationController@emailVerification')->name('verify_email');
        Route::post('verify-sms', 'AuthorizationController@smsVerification')->name('verify_sms');
        Route::post('verify-g2fa', 'AuthorizationController@g2faVerification')->name('go2fa.verify');

        Route::middleware(['checkStatus'])->group(function () {
            Route::get('dashboard', 'UserController@home')->name('home');

            Route::get('profile-setting', 'UserController@profile')->name('profile-setting');
            Route::post('profile-setting', 'UserController@submitProfile');
            Route::get('change-password', 'UserController@changePassword')->name('change-password');
            Route::post('change-password', 'UserController@submitPassword');

            //2FA
            Route::get('twofactor', 'UserController@show2faForm')->name('twofactor');
            Route::post('twofactor/enable', 'UserController@create2fa')->name('twofactor.enable');
            Route::post('twofactor/disable', 'UserController@disable2fa')->name('twofactor.disable');
        });
    });
});

Route::post('subscribe', 'SiteController@subscribe')->name('subscribe');

Route::get('/api/documentation', 'SiteController@apiDocumentation')->name('api.documentation');

Route::get('/contact', 'SiteController@contact')->name('contact');
Route::post('/contact', 'SiteController@contactSubmit')->name('contact.send');
Route::get('/change/{lang?}', 'SiteController@changeLanguage')->name('lang');

Route::get('blog/{id}/{slug}', 'SiteController@blogDetails')->name('blog.details');
Route::get('extra/{id}/{slug}', 'SiteController@extraDetails')->name('extra.details');

Route::get('placeholder-image/{size}', 'SiteController@placeholderImage')->name('placeholderImage');

//Route::get('/{slug}', 'SiteController@pages')->name('pages');
//Route::get('/', 'Auth\LoginController@showLoginForm')->name('home');
Route::get('/', 'SiteController@index')->name('home');
Route::get('query', 'SiteController@query');
Route::post('query', 'SiteController@queryResult')->name('query');



<?php

// Controllers
use App\Http\Controllers\BadWord\BadWordController;
use App\Http\Controllers\Device\DeviceController;
use App\Http\Controllers\Device\DeviceNotificationController;
use App\Http\Controllers\Device\DeviceOperationController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Incident\IncidentController;
use App\Http\Controllers\Incident\IncidentNotificationController;
use App\Http\Controllers\Security\PermissionController;
use App\Http\Controllers\Security\RoleController;
use App\Http\Controllers\Security\RolePermission;
use App\Http\Controllers\Service\ServiceController;
use App\Http\Controllers\Service\ServiceNotificationController;
use App\Http\Controllers\Setting\SettingController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// Packages

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

require __DIR__.'/auth.php';

Route::get('/storage', function () {
    Artisan::call('storage:link');
});

Route::prefix('tokens')->group(function () {
    Route::get('csrf', function () {
        return response()->json(['csrf-token' => csrf_token()]);
    });
});

// UI Pages
/**
 * Route for displaying UI components
 * Name: uisheet
 */


// Extra Pages
/**
 * Route for the Privacy Policy page
 * Name: pages.privacy-policy
 */
Route::get('privacy-policy', [HomeController::class, 'privacypolicy'])->name('pages.privacy-policy');

/**
 * Route for the Terms of Use page
 * Name: pages.term-of-use
 */
Route::get('terms-of-use', [HomeController::class, 'termsofuse'])->name('pages.term-of-use');

// Authentication Pages Routes
Route::group(['prefix' => 'auth'], function() {
    /**
     * Route for the Sign-In page
     * Name: auth.signin
     */
    Route::get('signin', [HomeController::class, 'signin'])->name('auth.signin');

    /**
     * Route for the Sign-Up page
     * Name: auth.signup
     */
    Route::get('signup', [HomeController::class, 'signup'])->name('auth.signup');

    /**
     * Route for the Email Confirmation page
     * Name: auth.confirmmail
     */
    Route::get('confirmmail', [HomeController::class, 'confirmmail'])->name('auth.confirmmail');

    /**
     * Route for the Lock Screen page
     * Name: auth.lockscreen
     */
    Route::get('lockscreen', [HomeController::class, 'lockscreen'])->name('auth.lockscreen');

    /**
     * Route for the Password Recovery page
     * Name: auth.recoverpw
     */
    Route::get('recoverpw', [HomeController::class, 'recoverpw'])->name('auth.recoverpw');

    /**
     * Route for the User Privacy Settings page
     * Name: auth.userprivacysetting
     */
    Route::get('userprivacysetting', [HomeController::class, 'userprivacysetting'])->name('auth.userprivacysetting');
});

// Routes that require user authentication
Route::group(['middleware' => 'auth'], function () {

    /**
     * User Management Module
     * Uses resource routing for CRUD operations on users.
     */
    Route::resource('users', UserController::class);

    /**
     * Role and Permission Management Module
     */
    Route::get('/role-permission', [RolePermission::class, 'index'])->name('role.permission.list'); // Role-Permission list page
    Route::resource('permission', PermissionController::class); // Resource routes for permissions
    Route::resource('role', RoleController::class); // Resource routes for roles
});

// Dashboard, Incident, Device, Configuration, and System Routes
Route::group(['middleware' => 'auth'], function () {

    // Dashboard Page Route
    /**
     * Route for the Dashboard page
     * Name: dashboard
     */
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Incident Management Module
    Route::group(['prefix' => 'incidents'], function () {
        /**
         * Route for viewing incident notifications
         * Name: incidents.notifications
         */
        Route::get('notifications', [IncidentNotificationController::class, 'index'])->name('incidents.notifications');

        /**
         * Route for filtering incidents by priority
         * Placeholder: {filterPriority}
         * Name: incidents.filter
         */
        Route::get('{filterPriority}', [IncidentController::class, 'index'])->name('incidents.filter');
    });

    // Device Management Module
    Route::group(['prefix' => 'devices'], function () {
        /**
         * Route for viewing the devices list
         * Name: devices.devices
         */
        Route::get('devices', [DeviceController::class, 'index'])->name('devices.devices');

        /**
         * Route for viewing device operations
         * Name: devices.operations
         */
        Route::get('operations', [DeviceOperationController::class, 'index'])->name('devices.operations');

        /**
         * Route for viewing device notifications
         * Name: devices.notifications
         */
        Route::get('notifications', [DeviceNotificationController::class, 'index'])->name('devices.notifications');
    });

    // Configuration Module
    Route::group(['prefix' => 'configurations'], function () {
        /**
         * Route for managing bad words (e.g., for filtering)
         * Name: configurations.bad-words
         */
        Route::get('bad-words', [BadWordController::class, 'index'])->name('configurations.bad-words');
    });

    // System Management Module
    Route::group(['prefix' => 'system'], function () {
        /**
         * Route for managing system settings
         * Name: system.settings
         */
        Route::get('settings', [SettingController::class, 'index'])->name('system.settings');

        /**
         * Route for viewing system events
         * Name: system.events
         */
        Route::get('services', [ServiceController::class, 'index'])->name('system.services');

        /**
         * Route for viewing notifications for system events
         * Name: system.events.notifications
         */
        Route::get('services/notifications', [ServiceNotificationController::class, 'index'])->name('system.services.notifications');
    });


});

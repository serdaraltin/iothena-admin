<?php

use App\Http\Controllers\Api\BadWord\BadWordController;
use App\Http\Controllers\Api\Device\DeviceController;
use App\Http\Controllers\Api\Device\DeviceStatusController;
use App\Http\Controllers\Api\Incident\IncidentBadWordController;
use App\Http\Controllers\Api\Incident\IncidentController;
use App\Http\Controllers\Api\Service\ServiceController;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Prefix 'v1' for versioning API routes
Route::prefix('v1')->group(function () {

    // Token Routes - Handle user token generation for access
    Route::prefix('tokens')->group(function () {
        // Generate an access token for a specific user
        Route::get('access', function () {
            $user = User::find(1); // Find a user (user ID: 1)
            return $user->createToken('datakapan')->accessToken; // Return the access token
        });
    });

    // Notification Routes - Handling different types of notifications
    Route::prefix('notifications')->group(function () {
        // Incident Notification Route
        Route::post('/incident', [IncidentController::class, 'notification']);

        // Device Notification Route
        Route::post('/device', [DeviceController::class, 'notification']);

        // Event Notification Route
        Route::post('/service', [ServiceController::class, 'notification']);
    });

    // CRUD Lambda - Function to define standard CRUD routes
    $defineCrudRoutes = function ($prefix, $controller) {
        // Define a set of CRUD routes for a given controller and prefix
        Route::prefix($prefix)->group(function () use ($controller) {
            Route::post('/show', [$controller, 'show']); // Show specific resource
            Route::get('/', [$controller, 'index']); // Get a list of resources
            Route::post('/', [$controller, 'store']); // Store a new resource
            Route::put('/', [$controller, 'update']); // Update an existing resource
            Route::delete('/', [$controller, 'destroy']); // Delete a resource
        });
    };

    // Bad Words Routes - Handle CRUD for bad words
    $defineCrudRoutes('bad-words', BadWordController::class);

    // Devices Routes - Handle CRUD operations for devices and related actions
    Route::prefix('devices')->group(function () use ($defineCrudRoutes) {
        // Device CRUD
        $defineCrudRoutes('/', DeviceController::class); // Devices CRUD

        // Device Status CRUD
        $defineCrudRoutes('/statuses', DeviceStatusController::class); // Statuses CRUD

        // Device Notifications CRUD
        $defineCrudRoutes('/notifications', DeviceNotificationController::class); // Notifications CRUD
    });

    // Events Routes - Handle CRUD operations for events and related notifications
    Route::prefix('events')->group(function () use ($defineCrudRoutes) {
        // Event CRUD
        $defineCrudRoutes('/', EventController::class); // Events CRUD

        // Event Notifications CRUD
        $defineCrudRoutes('/notifications', EventNotificationController::class); // Notifications CRUD
    });

    // Incidents Routes - Handle CRUD operations for incidents and related actions
    Route::prefix('incidents')->group(function () use ($defineCrudRoutes) {
        // Incident CRUD
        $defineCrudRoutes('/', IncidentController::class); // Incidents CRUD

        // Incident Notifications CRUD
        $defineCrudRoutes('/notifications', IncidentNotificationController::class); // Notifications CRUD

        // Incident Bad Words CRUD
        $defineCrudRoutes('/bad-words', IncidentBadWordController::class); // Bad Words CRUD
    });

});



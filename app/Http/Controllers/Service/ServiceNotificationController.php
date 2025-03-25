<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;

class ServiceNotificationController extends Controller
{
    public function index()
    {
        return view('systems.service.notifications');
    }
}
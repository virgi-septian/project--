<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function success()
    {
        return view('asset.notification.success');
    }

    public function deleted()
    {
        return view('asset.notification.delete');
    }
}

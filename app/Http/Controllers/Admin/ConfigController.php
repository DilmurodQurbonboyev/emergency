<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SiteConfig;

class ConfigController extends Controller
{
    public function index()
    {
        $configs = SiteConfig::query()->get();
        return view('admin.configs.index', compact('configs'));
    }
}

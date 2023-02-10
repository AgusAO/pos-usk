<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class profileManageController extends Controller
{
    public function viewProfile()
    {
        // $activity = Activity::where('id_user', Auth::id())
        //     ->latest()
        //     ->take(3)
        //     ->get();
        // $activities = Activity::where('id_user', Auth::id())
        //     ->latest()
        //     ->get();
        $masuk = Auth::user();
        return view('profile', compact('masuk'));
    }
}

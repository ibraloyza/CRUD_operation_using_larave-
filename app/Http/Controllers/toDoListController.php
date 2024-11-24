<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Add this line
use App\Models\listItem;
class toDoListController extends Controller
{
    public function saveItem(Request $request)
    {
        Log::info(json_encode($request->all())); // Log the request data
        return view('welcome');
    }
}

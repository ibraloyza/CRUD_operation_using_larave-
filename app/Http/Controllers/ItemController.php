<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);
    
        try {
            Item::create([
                'name' => $request->name,
            ]);
            return redirect()->back()->with('success', 'Item added successfully!');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Halkan ayuu error-ka ku soo muuqanayaa
        }
    }

    public function index()
    {
        // Sooqaado xogta 'items'
        $items = Item::all();

        // U dir xogta view-ga 'welcome.blade.php'
        return view('welcome', compact('items'));
    }
    
}
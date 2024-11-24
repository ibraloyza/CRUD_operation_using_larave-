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

    public function edit($id)
    {
        $item = Item::findOrFail($id); // Raadso item-ka id-ga saxda ah
        return view('items.edit', compact('item')); // U dir xogta view-ga edit
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255', // Validation
        ]);

        $item = Item::findOrFail($id);
        $item->name = $request->name; // Update name
        $item->save(); // Save changes

        return redirect()->route('home')->with('success', 'Item updated successfully!');
    }


    
}
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

    // public function edit($id)
    // {
    //     $item = Item::findOrFail($id); // Raadso item-ka id-ga saxda ah
    //     return view('items.edit', compact('item')); // U dir xogta view-ga edit
    // }

    public function update(Request $request, $id)
    {
        // Hel item-ka la cusbooneysiinayo
        $item = Item::findOrFail($id);
    
        // Cusbooneysii xogta
        $item->name = $request->input('name');
        
        // Keydi xogta cusub
        $item->save();
    
        // Dib ugu noqo bogga oo ku dar fariin guul ah
        return redirect()->back()->with('success', 'Item updated successfully!');
    }
    
    
    public function destroy($id)
    {
        // Hel item-ka la tirtirayo
        $item = Item::findOrFail($id);

        // Tirtir item-ka
        $item->delete();

        // Dib ugu noqo bogga oo ku dar fariin guul ah
        return redirect()->back()->with('success', 'Item deleted successfully!');
    }


    
}
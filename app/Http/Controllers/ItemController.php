<?php


namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ItemController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', // Waxaad ka dhigtay "string" si loo xaqiijiyo in magaca uu yahay qoraal
        ]);
    
        try {
            Item::create([
                'name' => $request->name,
            ]);
            return redirect()->back()->with('success', 'Item added successfully!');
        } catch (\Exception $e) {
            Log::error($e->getMessage()); // Log-ga qaladka
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function index()
    {
        $items = Item::all();
        return view('crud', compact('items')); // U dir xogta view-ga 'crud.blade.php'
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id); // Raadso item-ka id-ga saxda ah
    
        $item->name = $request->input('name'); // Cusbooneysii magaca
        $item->save(); // Keydi xogta cusub
    
        return redirect()->back()->with('success', 'Item updated successfully!');
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete(); // Tirtir item-ka

        return redirect()->back()->with('success', 'Item moved to Recycle Bin!');
    }

    public function recycleBin()
    {
        $items = Item::onlyTrashed()->get(); // Hel dhammaan xogta la tirtiray
        return view('recycle-bin', compact('items'));
    }

    public function restore($id)
    {
        $item = Item::withTrashed()->findOrFail($id); // Hel xogta la tirtiray
        $item->restore(); // Dib u soo celi xogta

        return redirect()->route('items.recycle-bin')->with('success', 'Item restored successfully!');
    }

    public function forceDelete($id)
    {
        $item = Item::withTrashed()->findOrFail($id); // Hel xogta la tirtiray
        $item->forceDelete(); // Si joogto ah uga tirtir database-ka

        return redirect()->route('items.recycle_bin')->with('success', 'Item permanently deleted!');
    }
}

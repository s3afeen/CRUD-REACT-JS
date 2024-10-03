<?php
namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return Item::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        $item = Item::create($request->all());
    
        return response()->json($item, 201);
    }


    public function show(Item $item)
    {
        return $item;
    }

    public function update(Request $request, Item $item)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $item->update($request->all());

    return response()->json($item, 200);
}


    public function destroy(Item $item)
    {
        $item->delete();
        return response()->json(null, 204);
    }
}

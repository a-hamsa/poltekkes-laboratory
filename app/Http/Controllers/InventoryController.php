<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryClinics;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $query = InventoryClinics::query();

        // Searching
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Sorting
        if ($request->filled('sort_by')) {
            $query->orderBy($request->sort_by, $request->sort_direction ?? 'asc');
        }

        // Filtering (e.g., by condition)
        if ($request->filled('condition')) {
            $query->where('condition', $request->condition);
        }

        $inventories = $query->paginate(10);

        return view('inventory', compact('inventories'));
    }

}

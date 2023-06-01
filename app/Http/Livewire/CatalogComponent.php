<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogComponent extends Component
{
    public function render()
    {
        $data_catalog = Product::all();
        return view('livewire.catalog-component', ['data' => $data_catalog]);
    }

    public function filter_catalog(Request $request)
    {
        $data_catalog = Product::where('category', '=', $request->category)->get();
        // dd($data_catalog);
        return view('livewire.catalog-component', [
            'data' => $data_catalog,
            'category' => $request->category,
        ]);
    }
}

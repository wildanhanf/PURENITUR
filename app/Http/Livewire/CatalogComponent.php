<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class CatalogComponent extends Component
{
    public function render()
    {
        $data_catalog = Product::all();
        return view('livewire.catalog-component', ['data' => $data_catalog]);
    }
}

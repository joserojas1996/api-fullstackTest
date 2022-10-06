<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResources;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $per_page = request('per_page') ?? null;
        $query =  Product::name(request('search'));
        $data = $per_page ? $query->paginate($per_page) : $query->get();

        return ProductResources::collection($data);
    }
}

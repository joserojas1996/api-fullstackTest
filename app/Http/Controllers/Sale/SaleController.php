<?php

namespace App\Http\Controllers\Sale;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Sales\SalesRequest;
use App\Http\Resources\SaleResources;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    /**
     * It returns a collection of `SaleResources` that are paginated by `` and filtered by
     * `request('search')`
     * 
     * @return A collection of SaleResources
     */
    public function index()
    {
        $per_page = request('per_page') ?? 10;

        $data =  Sale::name(request('search'))
            ->with('products')
            ->paginate($per_page);

        return SaleResources::collection($data);
    }

    /**
     * It creates a sale, then it loops through the products and attaches them to the sale
     * 
     * @param Request request The request object.
     * 
     * @return The sale object
     */
    public function store(Request $request)
    {

        $total = 0;
        foreach ($request->product as $object) {
            $total += Product::findOrFail(decrypt($object['id']))->price * $object['quantity'];
        }
  
        $sale = Sale::create([
            'user_id'       => Auth::user()->id,
            'client_id'     => decrypt($request->client),
            'total'         => $total
        ]);

            foreach ($request->product as $item) {
                $producId = decrypt($item['id']);
                $unitPrice  = Product::findOrFail($producId)->price;

                $sale->products()->attach($producId,[
                    'quantity'  => $item['quantity'],
                    'subTotal' => $unitPrice * $object['quantity'],
                    'price'     => $unitPrice,
                ]);
            }

        return $sale;
    }
}

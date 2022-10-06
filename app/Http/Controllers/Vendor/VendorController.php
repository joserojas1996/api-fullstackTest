<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\VendorResources;
use App\Models\User;

class VendorController extends Controller
{
    public function index()
    {
        $per_page = request('per_page') ?? 10;

        $data =  User::name(request('search'))
            ->with('info')
            ->paginate($per_page);

        return VendorResources::collection($data);
    }
}

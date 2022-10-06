<?php

namespace App\Http\Controllers\Provider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProviderResource;
use App\Models\Provider;

class ProviderController extends Controller
{
    public function index()
    {
        $per_page = request('per_page') ?? 10;

        $data =  Provider::name(request('search'))
            ->with('info')
            ->paginate($per_page);

        return ProviderResource::collection($data);
    }
}

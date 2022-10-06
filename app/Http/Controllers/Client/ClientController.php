<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResources;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $per_page = request('per_page') ?? 10;

        $data =  Client::name(request('search'))
            ->with('info')
            ->paginate($per_page);

        return ClientResources::collection($data);
    }
}

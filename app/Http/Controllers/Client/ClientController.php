<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Clients\ClientRequest;
use App\Http\Resources\ClientResources;
use App\Models\Address;
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

    public function store(ClientRequest $request)
    {

        $client = Client::firstOrCreate(['created_at' => now()]);

        $data = Address::firstOrCreate([
            'street'        => $request->street,
            'nro'           => $request->nro,
            'commune_id'    => decrypt($request->commune)
        ]);

        $client->info()->firstOrCreate([
            'rut'           => $request->rut,
            'name'          => $request->name,
            'lastname'      => $request->lastname,
            'phone'         => $request->phone,
            'address_id'    => $data->id
        ]);
        
        return ClientResources::make($client);
    }

    public function update(ClientRequest $request, $id)
    {
        $data = Client::findOrFail(decrypt($id));

        $data->info()->update([
            'rut'       => $request->rut,
            'name'      => $request->name,
            'lastname'  => $request->lastname,
            'phone'     => $request->phone,
        ]);


        $data->info->address()->update([
            'street'        => $request->street,
            'nro'           => $request->nro,
            'commune_id'    => decrypt($request->commune)
        ]);

        return ClientResources::make($data);
    }
}

<?php

namespace App\Http\Controllers\Subsidiary;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubsidiaryResources;
use App\Models\Subsidiary;

class SubsidiaryController extends Controller
{
    public function index()
    {
        $per_page = request('per_page') ?? null;
        $query =  Subsidiary::name(request('search'));
        $data = $per_page ? $query->paginate($per_page) : $query->get();

        return SubsidiaryResources::collection($data);
    }
}

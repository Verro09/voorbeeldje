<?php

namespace App\Http\Controllers;

use App\Http\Resources\InformationResource;
use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function index()
    {
        return InformationResource::collection(Information::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'      => ['required'],
            'key'       => ['required'],
            'price'     => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ]);

        return new InformationResource(Information::create($data));
    }

    public function show(Information $information)
    {
        return new InformationResource($information);
    }

    public function update(Request $request, Information $information)
    {
        $data = $request->validate([
            'name'      => ['required'],
            'key'       => ['required'],
            'price'     => ['nullable', 'integer'],
            'is_active' => ['boolean'],
        ]);

        $information->update($data);

        return new InformationResource($information);
    }

    public function destroy(Information $information)
    {
        $information->delete();

        return response()->json();
    }
}

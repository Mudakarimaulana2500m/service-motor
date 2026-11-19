<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class BaseApiController extends Controller
{
    protected string $model;

    abstract protected function rules($id = null): array;

    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => $this->model::all(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->model::create(
            $request->validate($this->rules())
        );

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditambahkan',
            'data' => $data,
        ], 201);
    }

    public function show($id)
    {
        return response()->json([
            'success' => true,
            'data' => $this->model::findOrFail($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $item = $this->model::findOrFail($id);

        $item->update(
            $request->validate($this->rules($id))
        );

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diperbarui',
            'data' => $item,
        ]);
    }

    public function destroy($id)
    {
        $this->model::findOrFail($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus',
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;

class UserController extends Controller
{

    /**
     * @param StoreUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreUserRequest $request) {
        try {
            $user = User::createUser($request->all());
            return response()->json(["status" => "success", "data" => $user], 201);
        } catch (Throwable $th) {
            report($th->getMessage());
            return response()->json(["status" => "error", "data" => $th->getMessage()], 422);
        }
    }
}

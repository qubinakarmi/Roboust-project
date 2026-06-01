<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $user = User::find($id);
        if (is_null($user)) {
            $response = [
                'message' => 'User not found',
                'status' => 0,
            ];
        } else {
            $response = [   
                'message' => 'User found',
                'status' => 1,
                'data' => $user,
            ];
        }
        return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
{
    $user = User::find($id);

    if (!$user) {
        return response()->json([
            'message' => 'User not found',
            'status' => 0
        ], 404);
    }

    try {
        DB::beginTransaction();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();

        DB::commit();

        return response()->json([
            'status' => 1,
            'message' => 'User updated successfully'
        ], 200);

    } catch (\Exception $err) {

        DB::rollback();

        return response()->json([
            'status' => 0,
            'message' => 'Internal server error',
            'error' => $err->getMessage()
        ], 500);
    }
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::find($id);
        if (is_null($user)) {
            $response = [
                'message' => " user not found",
                'status' => 0,
            ];
            $responseCode = 404;
        } else {
            DB::beginTransaction();
            try {
                $user->delete();
                DB::commit();

                $response = [
                    'message' => " User has been deleted successfully",
                    'status' => 1,
                ];
                $responseCode = 200;
            } catch (\Exception $err) {
                DB::rollback();
                $response = [
                    'messsage' => " Internal server error",
                    'status' => 0,
                ];
                $responseCode = 500;
            }
        }
        return response()->json($response, $responseCode);
    }
}

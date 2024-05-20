<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class testController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/test",
     *     tags={"Testing"},
     *     summary="Retrieve hello world message",
     *     description="This endpoint returns a simple hello world message.",
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Hello World")
     *         )
     *     )
     * )
     */
    function test()
    {
        $user = User::all();
        return response()->json($user);
    }

    /**
     * @OA\Post(
     *     path="/api/r",
     *     tags={"Testing_Request"},
     *     summary="Retrieve hello world message",
     *     description="This endpoint returns a simple hello world message.",
     *     @OA\Parameter(
     *         name="String1",
     *         in="query",
     *         description="An example query parameter",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="String2",
     *         in="query",
     *         description="An example query parameter",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="R",
     *                 type="object",
     *                 description="The entire request object as received",
     *                 example={ "exampleParam": "value", "anotherParam": "value" }
     *             )
     *         )
     *     )
     * )
     */
    function returnRequest(Request $request)
    {
        return response()->json([
            $request->String1 . " " . $request->String2,
        ]);
    }
}

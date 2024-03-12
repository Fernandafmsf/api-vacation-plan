<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHolidayPlanRequest;
use App\Models\Holiday_plan;
use Illuminate\Http\Request;

class ApiHolidayController extends Controller
{
   
    public function index() : \Illuminate\Http\JsonResponse
    {
        $holiday_plans= Holiday_plan::all();

        return response()->json([
            'status' => true,
            'holiday_plans' => $holiday_plans
        ]);

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $holiday_plan = Holiday_plan::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "Plan Created successfully!",
            'holiday_plan' => $holiday_plan
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): \Illuminate\Http\Response | \Illuminate\Http\JsonResponse
    {
        if(Holiday_plan::where('id', $id)->exists()){
            $holiday_plan = Holiday_plan::where('id', $id)->first();
            return response($holiday_plan, 200);

        }else{
            return response()->json([
                "message" => "Holiday plan not found"
            ], 400);
        }

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): \Illuminate\Http\JsonResponse
    {
        if(!Holiday_plan::where('id', $id)->exists()){
            return response()->json([
                "message" => "Holiday plan not found"
            ], 404);   

        }

        $holiday_plan = $request->all();
        Holiday_plan::find($id)->update($holiday_plan);

        return response()->json([
            "message" => "Records updated successfully"
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        if (!Holiday_plan::where('id', $id)->exists()) {
            return response()->json([
                "message" => "Holiday plan not found"
            ], 404);
        }

        $holiday_plan=Holiday_plan::find($id);
        $holiday_plan->delete();

        return response()->json([
            "message"=> "Plan deleted"
        ],202);

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Holiday_plan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class PDFController extends Controller
{
    //Function to generate de PDF holding Holiday Plans informations
    public function generate(int $id): \Illuminate\Http\Response | \Illuminate\Http\JsonResponse
    {
        if (!Holiday_plan::where('id', $id)->exists()){
            return response()->json([
                "message" => "Holiday plan not found"
            ], 404); 
        }

        $holiday_plan = Holiday_plan::where('id', $id)->first();


        $data = [
            'title' => $holiday_plan->title,
            'description' => $holiday_plan->description,
            'date' => $holiday_plan->date,
            'location' => $holiday_plan->location
        ];

        $pdf = Pdf::loadView('plans', $data);
        return $pdf->stream();      
        
    }
}

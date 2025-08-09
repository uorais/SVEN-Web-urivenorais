<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'frequency' => 'required|string|in:one-time,recurring',
            'start_date' => 'required|date|after_or_equal:today',
            'days' => 'required|array|min:1',
            'days.*' => 'string',
            'times' => 'required|array|min:1',
            'times.*' => 'string',
            'note' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $appointment = Appointment::create([
            'frequency' => $request->frequency,
            'start_date' => $request->start_date,
            'days' => json_encode($request->days),
            'times' => json_encode($request->times),
            'note' => $request->note,
        ]);

        return response()->json([
            'message' => 'Success',
            'appointment' => $appointment
        ], 201);
    }
}

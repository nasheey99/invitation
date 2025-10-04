<?php

namespace App\Http\Controllers;

use App\Models\RsvpCode;
use Illuminate\Http\Request;

class RsvpController extends Controller
{
     public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'name'       => 'required|string|max:255',
            'phone'      => 'nullable|string|max:20',
            'code'       => 'required|string|max:20',
            'attending'  => 'required|in:yes,no',
        ]);

        // Check if code exists and hasn't been used
        $rsvp = RsvpCode::where('code', $request->code)
                         ->where('used', false)
                         ->first();

        if (!$rsvp) {
            return response()->json([
                'message' => 'Invalid or already used code'
            ], 400);
        }

        // Save RSVP details
        $rsvp->update([
            'guest_name' => $request->name,
            'phone'      => $request->phone,
            'attending'  => $request->attending,
            'used'       => true,
        ]);

        return response()->json([
            'message' => 'RSVP submitted successfully!'
        ]);
    }
}

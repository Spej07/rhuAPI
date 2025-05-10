<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationControllere extends Controller
{
   public function getReservations()
    {
        $reservations = ClinicReservation::with('clinic')->get(); // if you have a 'clinic' relation

        return response()->json(['reservations' => $reservations]);
    }

    public function addReservation(Request $request)
    {
        $request->validate([
            'patient_name' => ['required', 'string', 'max:255'],
            'clinic_id' => ['required', 'exists:clinics,id'],
            'appointment_date' => ['required', 'date'],
            'appointment_time' => ['required', 'string'],
            'reason' => ['nullable', 'string', 'max:500'],
        ]);

        $reservation = ClinicReservation::create([
            'patient_name' => $request->patient_name,
            'clinic_id' => $request->clinic_id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'reason' => $request->reason,
        ]);

        return response()->json(['message' => 'Clinic reservation added successfully', 'reservation' => $reservation]);
    }

    public function editReservation(Request $request, $id)
    {
        $request->validate([
            'patient_name' => ['required', 'string', 'max:255'],
            'clinic_id' => ['required', 'exists:clinics,id'],
            'appointment_date' => ['required', 'date'],
            'appointment_time' => ['required', 'string'],
            'reason' => ['nullable', 'string', 'max:500'],
        ]);

        $reservation = ClinicReservation::find($id);

        if (!$reservation) {
            return response()->json(['message' => 'Reservation not found'], 404);
        }

        $reservation->update([
            'patient_name' => $request->patient_name,
            'clinic_id' => $request->clinic_id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'reason' => $request->reason,
        ]);

        return response()->json(['message' => 'Reservation updated successfully', 'reservation' => $reservation]);
    }

    public function deleteReservation($id)
    {
        $reservation = ClinicReservation::find($id);

        if (!$reservation) {
            return response()->json(['message' => 'Reservation not found'], 404);
        }

        $reservation->delete();

        return response()->json(['message' => 'Reservation deleted successfully']);
    }
}


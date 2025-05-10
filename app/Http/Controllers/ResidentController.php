<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resident;

class ResidentController extends Controller
{
    public function getResidents(){
        $Residents = getResidentsdent::with('course', 'yearLevel', 'section')->get();

        return response()->json(['Residents' => $residents]);
    }  

    public function addResident(Request $request){
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'Barangay_id' => ['nullable', 'string', 'max:255', 'unique:students'],
        
        ]);

        $resident = Resident::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'Barangay_id' => $request->id_number,
           
        ]);

        return response()->json(['message' => 'Resident added successfully', 'resident' => $resident]);
    }

    public function editResident(Request $request, $id){
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'Barangay_id' => ['nullable', 'string', 'max:255', 'unique:residents,baranga_id,' . $id],
        
        ]);

        $resident = Resident::find($id);

        if(!$resident){
            return response()->json(['message' => 'Resident not found'], 404);
        }

        $student->update([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'Barangay_id' => $request->barangay_id,
         
        ]);

        return response()->json(['message' => 'Student updated successfully', 'student' => $student ]);
    }   

    public function deleteResident($id){
        $student = Resident::find($id);

        if(!$resident){
            return response()->json(['message' => 'Resident not found'], 404);
        }

        $student->delete();

        return response()->json(['message' => 'Resident deleted successfully']);
    }
}
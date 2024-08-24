<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TensimeterResource;
use App\Models\Patient;
use App\Models\Tensimeter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TensimeterController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'patient_id' => 'required',
                'bpm'   => 'required',
                'systolic'   => 'required',
                'diastolic'   => 'required',
            ]);
    

            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            $patient = Patient::findOrFail($request->patient_id);

            if ($patient != NULL) {
                $tensimeter = Tensimeter::create([
                    'patient_id' => $patient->id,
                    'bpm' => $request->bpm,
                    'systolic' => $request->systolic,
                    'diastolic' => $request->diastolic,
                ]);

                $now = Carbon::now();
                $bday = Carbon::parse($patient->date_of_birth);
                $age = $bday->diffInYears($now);

                $data = [
                    'bpm' => $request->bpm,
                    'systolic' => $request->systolic,
                    'diastolic' => $request->diastolic,
                ];

                if ($age >= 6 && $age <= 12) {
                    
                } else if ($age >= 13 && $age <= 18) {

                } else if ($age > 18) {
                    if ($request->systolic < 90 && $request->diastolic < 60) {
                        $data['status'] = 'Hipotensi';
                    } else if ($request->systolic >= 90 && $request->systolic <= 120 && $request->diastolic >= 60 && $request->diastolic <= 80) {
                        $data['status'] = 'Normal';
                    } else if ($request->systolic > 120 && $request->systolic <= 129 && $request->diastolic >= 60 && $request->diastolic <= 80) {
                        $data['status'] = 'Pra Hipertensi';
                    } else if ($request->systolic >= 130 && $request->systolic <= 139 || $request->diastolic > 80 && $request->diastolic <= 89) {
                        $data['status'] = 'Hipertensi Tingkat 1';
                    } else if ($request->systolic >= 140 && $request->systolic <= 180 || $request->diastolic >= 90 && $request->diastolic <= 120) {
                        $data['status'] = 'Hipertensi Tingkat 2';
                    } else if ($request->systolic > 180 || $request->diastolic > 120) {
                        $data['status'] = 'Hipertensi Krisis';
                    }
                }

                $patient->update($data);
            }

            return new TensimeterResource(true, 'You\'ve Successfully Registered', $tensimeter);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

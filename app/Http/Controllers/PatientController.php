<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class PatientController extends Controller
{
    public function index()
    {
        $title = "Patient - Data";

        return view('master.patient.index', compact('title'));
    }

    public function create()
    {
        $title = "Patient - Create";

        return view('master.patient.create', compact('title'));
    }

    public function store(StorePatientRequest $request)
    {
        try {
            Patient::create([
                'name' => $request->name,
                'place_of_birth' => $request->place_of_birth,
                'date_of_birth' => $request->date_of_birth,
                'family_history' => $request->family_history,
                'history_of_smoking' => $request->history_of_smoking,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'password' => Hash::make($request->password),
            ])->assignRole('Patient');

            Alert::success('Congrats', 'You\'ve Successfully Registered');
            return redirect()->route('patient.index');
        } catch (\Exception $Excep) {
            Alert::error('Error', $Excep->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        try {
            Patient::findOrFail($id)->delete();

            Alert::success('Congrats', 'You\'ve Successfully Deleted');
            return redirect()->route('patient.index');
        } catch (\Exception $Excep) {
            Alert::error('Error', $Excep->getMessage());
            return redirect()->route('patient.index');
        }
    }

    public function ajax()
    {
        if (request()->ajax()) {
            $data = Patient::latest()->get();

            return DataTables::of($data)
                            ->addIndexColumn()
                            ->editColumn('phone', function($item) {
                                return '+' . $item->phone;
                            })->editColumn('bpm', function($item) {
                                return number_format($item->bpm, 2) . ' BPM';
                            })->editColumn('systolic', function($item) {
                                return number_format($item->systolic, 2) . ' mmHg';
                            })->editColumn('diastolic', function($item) {
                                return number_format($item->diastolic, 2) . ' mmHg';
                            })->addColumn('action', 'master.patient.action')
                            ->rawColumns(['action'])
                            ->make(true);
        }
    }
}

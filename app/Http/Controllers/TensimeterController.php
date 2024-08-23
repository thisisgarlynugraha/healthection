<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Tensimeter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TensimeterController extends Controller
{
    public function index(string $id)
    {
        $title = "Tensimeter";
        $data = Patient::findOrFail($id);

        return view('master.patient.tensimeter.index', compact('title', 'data'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
        //
    }

    public function ajax(string $id)
    {
        if (request()->ajax()) {
            $data = Tensimeter::latest()->where('patient_id', $id)->get();

            return DataTables::of($data)
                            ->addIndexColumn()
                            ->addColumn('date', function($item) {
                                return Carbon::parse($item->created_at)->format('M d, Y');
                            })->addColumn('time', function($item) {
                                return Carbon::parse($item->created_at)->format('H:i') . ' WIB';
                            })->editColumn('bpm', function($item) {
                                return number_format($item->bpm, 2) . ' BPM';
                            })->editColumn('systolic', function($item) {
                                return number_format($item->systolic, 2) . ' mmHg';
                            })->editColumn('diastolic', function($item) {
                                return number_format($item->diastolic, 2) . ' mmHg';
                            })->rawColumns(['date', 'time'])
                            ->make(true);
        }
    }
}

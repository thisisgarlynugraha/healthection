<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOperatorRequest;
use App\Http\Requests\UpdateOperatorRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class OperatorController extends Controller
{
    public function index()
    {
        $title = "Operator - Data";

        return view('master.operator.index', compact('title'));
    }

    public function create()
    {
        $title = "Operator - Create";

        return view('master.operator.create', compact('title'));
    }

    public function store(StoreOperatorRequest $request)
    {
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ])->assignRole('Operator');

            Alert::success('Congrats', 'You\'ve Successfully Registered');
            return redirect()->route('operator.index');
        } catch (\Exception $Excep) {
            Alert::error('Error', $Excep->getMessage());
            return redirect()->route('operator.index');
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $title = "Edit Operator";
        $data = User::findOrFail($id);

        return view('master.operator.edit', compact('title', 'data'));
    }

    public function update(UpdateOperatorRequest $request, string $id)
    {
        try {
            $data = User::findOrFail($id);

            $data->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            Alert::success('Congrats', 'You\'ve Successfully Updated');
            return redirect()->route('operator.index');
        } catch (\Exception $Excep) {
            Alert::error('Error', $Excep->getMessage());
            return redirect()->route('operator.index');
        }
    }

    public function destroy(string $id)
    {
        try {
            User::findOrFail($id)->delete();

            Alert::success('Selamat', 'Anda telah berhasil menghapus data');
            return redirect()->route('operator.index');
        } catch (\Exception $Excep) {
            Alert::error('Error', $Excep->getMessage());
            return redirect()->route('operator.index');
        }
    }

    public function ajax()
    {
        if (request()->ajax()) {
            $data = User::join('model_has_roles', 'model_has_roles.model_uuid', '=', 'users.id')
                        ->join('roles', 'roles.uuid', '=', 'model_has_roles.role_id')
                        ->select('users.*')
                        ->where('roles.name', 'Operator')
                        ->get();

            return DataTables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', 'master.operator.action')
                            ->rawColumns(['action'])
                            ->make(true);
        }
    }
}

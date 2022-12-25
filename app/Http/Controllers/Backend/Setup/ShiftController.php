<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Model\StudentShift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function view()
    {
        $data['allData'] = StudentShift::all();
        return view('backend.setup.shift.view-shift', $data);
    }

    public function add()
    {
        return view('backend.setup.shift.add-shift');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:student_shifts,name'
        ]);

        $data = new StudentShift();
        $data->name = $request->name;
        $data->save();

        return redirect()->route('setups.student.shift.view')->with('success', 'Data Inserted Successfully');
    }

    public function edit($id)
    {
        $data['editData'] = StudentShift::find($id);
        return view('backend.setup.shift.add-shift', $data);
    }

    public function update(Request $request, $id)
    {
        $data = StudentShift::find($id);

        $this->validate($request, [
            'name' => 'required|unique:student_shifts,name,' . $data->id
        ]);

        $data->name = $request->name;
        $data->save();

        return redirect()->route('setups.student.shift.view')->with('success', 'Data Updated Successfully');
    }

    public function delete(Request $request)
    {
        $data = StudentShift::find($request->id);
        $data->delete();

        return redirect()->route('setups.student.shift.view')->with('success', 'Data Deleted Successfully');
    }
}

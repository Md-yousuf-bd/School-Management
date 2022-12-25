<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Model\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function view()
    {
        $data['allData'] = Designation::all();
        return view('backend.setup.designation.view-designation', $data);
    }

    public function add()
    {
        return view('backend.setup.designation.add-designation');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:designations,name'
        ]);

        $data = new Designation();
        $data->name = $request->name;
        $data->save();

        return redirect()->route('setups.designation.view')->with('success', 'Data Inserted Successfully');
    }

    public function edit($id)
    {
        $data['editData'] = Designation::find($id);
        return view('backend.setup.designation.add-designation', $data);
    }

    public function update(Request $request, $id)
    {
        $data = Designation::find($id);

        $this->validate($request, [
            'name' => 'required|unique:designations,name,' . $data->id
        ]);

        $data->name = $request->name;
        $data->save();

        return redirect()->route('setups.designation.view')->with('success', 'Data Updated Successfully');
    }

    public function delete(Request $request)
    {
        $data = Designation::find($request->id);
        $data->delete();

        return redirect()->route('setups.designation.view')->with('success', 'Data Deleted Successfully');
    }
}

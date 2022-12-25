<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Model\StudentGroup;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function view()
    {
        $data['allData'] = StudentGroup::all();
        return view('backend.setup.group.view-group', $data);
    }

    public function add()
    {
        return view('backend.setup.group.add-group');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:student_groups,name'
        ]);

        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();

        return redirect()->route('setups.student.group.view')->with('success', 'Data Inserted Successfully');
    }

    public function edit($id)
    {
        $data['editData'] = StudentGroup::find($id);
        return view('backend.setup.group.add-group', $data);
    }

    public function update(Request $request, $id)
    {
        $data = StudentGroup::find($id);

        $this->validate($request, [
            'name' => 'required|unique:student_groups,name,' . $data->id
        ]);

        $data->name = $request->name;
        $data->save();

        return redirect()->route('setups.student.group.view')->with('success', 'Data Updated Successfully');
    }

    public function delete(Request $request)
    {
        $data = StudentGroup::find($request->id);
        $data->delete();

        return redirect()->route('setups.student.group.view')->with('success', 'Data Deleted Successfully');
    }
}

<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Model\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function view()
    {
        $data['allData'] = Subject::all();
        return view('backend.setup.subject.view-subject', $data);
    }

    public function add()
    {
        return view('backend.setup.subject.add-subject');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:subjects,name'
        ]);

        $data = new Subject();
        $data->name = $request->name;
        $data->save();

        return redirect()->route('setups.subject.view')->with('success', 'Data Inserted Successfully');
    }

    public function edit($id)
    {
        $data['editData'] = Subject::find($id);
        return view('backend.setup.subject.add-subject', $data);
    }

    public function update(Request $request, $id)
    {
        $data = Subject::find($id);

        $this->validate($request, [
            'name' => 'required|unique:subjects,name,' . $data->id
        ]);

        $data->name = $request->name;
        $data->save();

        return redirect()->route('setups.subject.view')->with('success', 'Data Updated Successfully');
    }

    public function delete(Request $request)
    {
        $data = Subject::find($request->id);
        $data->delete();

        return redirect()->route('setups.subject.view')->with('success', 'Data Deleted Successfully');
    }
}

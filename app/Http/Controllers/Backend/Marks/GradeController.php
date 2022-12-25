<?php

namespace App\Http\Controllers\Backend\Marks;

use App\Http\Controllers\Controller;
use App\Model\MarksGrade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function view()
    {
        $data['allData'] = MarksGrade::all();
        return view('backend.marks.grade-marks-view', $data);
    }

    public function add()
    {
        return view('backend.marks.grade-marks-add');
    }

    public function store(Request $request)
    {
        $data = new MarksGrade();
        $data->grade_name = $request->grade_name;
        $data->grade_point = $request->grade_point;
        $data->start_mark = $request->start_mark;
        $data->end_marks = $request->end_marks;
        $data->start_point = $request->start_point;
        $data->end_point = $request->end_point;
        $data->remarks = $request->remarks;
        $data->save();
        return redirect()->route('marks.grade.view')->with('success', 'Data Saved Successfully!');
    }

    public function edit($id)
    {
        $data['editData'] = MarksGrade::find($id);
        return view('backend.marks.grade-marks-add', $data);
    }

    public function update(Request $request, $id)
    {
        $data = MarksGrade::find($id);
        $data->grade_name = $request->grade_name;
        $data->grade_point = $request->grade_point;
        $data->start_mark = $request->start_mark;
        $data->end_marks = $request->end_marks;
        $data->start_point = $request->start_point;
        $data->end_point = $request->end_point;
        $data->remarks = $request->remarks;
        $data->save();
        return redirect()->route('marks.grade.view')->with('success', 'Data Updated Successfully!');
    }

}

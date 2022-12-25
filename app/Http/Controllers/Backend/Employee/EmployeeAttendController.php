<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\User;
use App\Model\Designation;
use App\Model\EmployeeAttendance;
use App\Model\EmployeeLeavve;
use App\Model\EmployeeSalaryLog;
use App\Model\LeavePurpose;
use Illuminate\Http\Request;
use DB;
use PDF;

class EmployeeAttendController extends Controller
{
    public function view()
    {
        $data['allData'] = EmployeeAttendance::select('date')->groupBy('date')->orderBy('id', 'DESC')->get();
        return view('backend.employee.attendance.view-attendance', $data);
    }

    public function add()
    {
        $data['employees'] = User::where('usertype', 'employee')->get();
        return view('backend.employee.attendance.add-attendance', $data);
    }

    public function store(Request $request)
    {
        EmployeeAttendance::where('date',date('Y-m-d', strtotime($request->date)))->delete();
        $countemployee = count($request->employee_id);
        for ($i=0; $i <$countemployee; $i++) {
            $attend_status = 'attend_status'.$i;
            $attend = new EmployeeAttendance();
            $attend->date = date('Y-m-d', strtotime($request->date));
            $attend->employee_id = $request->employee_id[$i];
            $attend->attend_status = $request->$attend_status;
            $attend->save();
        }

        return redirect()->route('employees.attendance.view')->with('success', 'Employee Leave has been created Successfully');
    }

    public function edit($date)
    {
        $data['editData'] = EmployeeAttendance::where('date', $date)->get();
        $data['employees'] = User::where('usertype', 'employee')->get();
        return view('backend.employee.attendance.add-attendance', $data);
    }

    public function details($date)
    {
        $data['details'] = EmployeeAttendance::where('date', $date)->get();
        return view('backend.employee.attendance.details-attendance', $data);
    }


}

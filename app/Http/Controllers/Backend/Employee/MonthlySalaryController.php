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


class MonthlySalaryController extends Controller
{
    public function view()
    {
        return view('backend.employee.monthly_salary.view-salary');
    }

    public function getSalary(Request $request)
    {
        $date = date('Y-m', strtotime($request->date));
        if ($date != '') {
            $where[] = ['date', 'like', $date . '%'];
        }

        $data = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();
        $html['thsource'] = '<th>SL</th>';
        $html['thsource'] .= '<th>ID No</th>';
        $html['thsource'] .= '<th>Employee Name</th>';
        $html['thsource'] .= '<th>Basic Salary</th>';
        $html['thsource'] .= '<th>Salary (This Month)</th>';
        $html['thsource'] .= '<th>Action</th>';

        foreach ($data as $key => $attend) {
            $totalattend = EmployeeAttendance::with(['user'])->where($where)->where('employee_id', $attend->employee_id)->get();
            $absentcount = count($totalattend->where('attend_status','Absent'));
            $color = 'success';

            $html[$key]['tdsource'] = '<td>' . ($key + 1) . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $attend['user']['id_no'] . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $attend['user']['name'] . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $attend['user']['salary']  . '</td>';
            $salary = (float)$attend['user']['salary'];
            $salaryperday = (float)$salary/30;
            $totalsalaryminus = (float)$absentcount * (float)$salaryperday;
            $totalsalary = (float)$salary - (float)$totalsalaryminus;

            $html[$key]['tdsource'] .= '<td>' . $totalsalary . 'Tk' . '</td>';
            $html[$key]['tdsource'] .= '<td>';
            $html[$key]['tdsource'] .= ' <a class="btn btn-sm btn-' . $color . '"title=Payslip" target="_blank" href="' . route("employees.monthly.salary.payslip", $attend->employee_id).'">Pay Slip</a>';
            $html[$key]['tdsource'] .= '</td>';
        }
        return response()->json(@$html);
    }


    public function paySlip($employee_id)
    {
        $id = EmployeeAttendance::where('employee_id', $employee_id)->first();
        $date = date('Y-m', strtotime($id->date));
        if ($date !='') {
            $where[] = ['date', 'like', $date . '%'];
        }
        $data['totalattendgroupbyid'] = EmployeeAttendance::with(['user'])->where($where)->where('employee_id', $id->employee_id)->get();
        $pdf = PDF::loadView('backend.employee.monthly_salary.employee-pay-slip-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}

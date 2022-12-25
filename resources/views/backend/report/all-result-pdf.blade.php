<!DOCTYPE html>
<html lang="en">
<head>
    <title>Students Result</title>
    <style type="text/css">
        table{
            border-collapse: collapse;
        }
        h2, h3 {
            margin: 0;
            padding: 0;
        }
        .table {
            width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
        }
        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }
        .table tbody + tbody {
            border-top: 2px solid #dee2e6;
        }
        .table .table {
            background-color: #fff;
        }
        .table-bordered {
            border: 1px solid #dee2e6;
        }
        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }
        .table-bordered thead th,
        .table-bordered thead td {
            border-bottom-width: 2px
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        table tr td {
            padding: 5px;
        }
        .table-bordered thead th, .table-bordered td, .table-bordered th {
            border: 1px solid black !important;
        }
        .table-bordered thead th {
            background-color: #cacaca;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table width="80%">
                    <tr>
                        <td width="33%" class="text-center">School logo</td>
                        <td class="text-center" width="63%">
                            <h4><strong>ABC School</strong></h4>
                            <h5><strong>Dhaka - 1219</strong></h5>
                            <h6><strong>www.abcschool</strong></h6>
                        </td>
                        <td class="text-center">

                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-12 text-center">
                <h5 style="font-weight:bold;">Results of {{ @$allData[0]['exam_type']['name'] }}</h5>
            </div>
            <div class="col-md-12">
                <hr style="border: solid 1px; width: 100%; color: #DDD; margin-bottom: 0px;">
                <table border="0" width="100%" cellpadding="1" cellspacing="2" class="text-center">
                    <tbody>
                        <tr>
                            <td><strong>Year/Session : </strong>{{ @$allData[0]['year']['name'] }}</td>
                            <td></td>
                            <td></td>
                            <td><strong>Class : </strong>{{ @$allData[0]['student_Class']['name'] }}</td>
                        </tr>
                    </tbody>
                </table>

                <i style="font-size: 10px; float: right;">Print Date: {{ date("d M Y") }}</i>
            </div> <br>
            <div class="col-md-12">
                <table border="1" width="100%" class="text-center">
                    <thead>
                        <tr>
                            <th Width="5%">SL</th>
                            <th>Student Name</th>
                            <th>ID No</th>
                            <th Width="10%">Letter Grade</th>
                            <th Width="10%">Grade Point</th>
                            <th Width="15%">Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allData as $key => $data)
                        @php
                            $allMarks = App\Model\StudentMark::where('year_id', $data->year_id)->where('class_id', $data->class_id)->where('exam_type_id', $data->exam_type_id)->where('student_id', $data->student_id)->get();
                            $total_marks = 0;
                            $total_point = 0;

                            foreach ($allMarks as $value) {
                                $count_fail = App\Model\StudentMark::where('year_id', $value->year_id)->where('class_id', $value->class_id)->where('exam_type_id', $value->exam_type_id)->where('student_id', $value->student_id)->where('marks', '<', '33')->get()->count();
                                $get_mark = $value->marks;
                                $grade_marks = App\Model\MarksGrade::where([['start_mark', '<=', (int)$get_mark],['end_marks', '>=', (int)$get_mark]])->first();
                                $grade_name = $grade_marks->grade_name;
                                $grade_point = number_format((float)$grade_marks->grade_point,2);
                                $total_point = (float)$total_point+(float)$grade_point;
                            }
                        @endphp
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $data['student']['name'] }}</td>
                                <td>{{ $data['student']['id_no'] }}</td>
                                @php
                                    $total_subject = App\Model\StudentMark::where('year_id', $data->year_id)->where('class_id', $data->class_id)->where('exam_type_id', $data->exam_type_id)->where('student_id', $data->student_id)->get()->count();
                                    $total_grade = 0;
                                    $point_for_letter_grade = (float)$total_point/(float)$total_subject;
                                    $total_grade = App\Model\MarksGrade::where([['start_point', '<=',$point_for_letter_grade],['end_point', '>=',$point_for_letter_grade]])->first();
                                    $grade_point_avg = (float)$total_point/(float)$total_subject;
                                @endphp
                                <td>
                                    @if ($count_fail > 0)
                                        F
                                    @else
                                    {{ $total_grade->grade_name }}
                                    @endif
                                </td>
                                <td>
                                    @if ($count_fail > 0)
                                        0.00
                                    @else
                                    {{ number_format((float)$grade_point_avg,2) }}
                                    @endif
                                </td>
                                <td>
                                    @if ($count_fail > 0)
                                        Fail
                                    @else
                                    {{ $total_grade->remarks }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><br>
        </div> <br>
        <div class="col-md-12">
            <table border="0" width="100%">
                <tbody>
                    <tr>
                        <td style="width: 30%"></td>
                        <td style="width: 30%"></td>
                        <td style="width: 40%; text-align: center;">
                            <hr style="border: solid 1px; width: 60%; color: #000; margin-bottom: 0px">
                            <p style="text-align: center;">Principan/Headmaster</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <hr style="border: dashed 1px; width: 96%; color: #DDD; margin-bottom: 50px">
    </div>

</body>
</html>

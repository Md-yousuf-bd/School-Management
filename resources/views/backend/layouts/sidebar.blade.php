@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp

<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @if (Auth::user()->role=='Admin')
            <li class="nav-item has-treeview {{ ($prefix=='/users')?'menu-open':'' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Manage User
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('users.view') }}" class="nav-link {{ ($route=='users.view'?'active':'') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View User</p>
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        <li class="nav-item has-treeview {{ ($prefix=='/profiles')?'menu-open':'' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Manage Profile
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('profiles.view') }}" class="nav-link {{ ($route=='profiles.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Your Profile</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('profiles.password.view') }}" class="nav-link {{ ($route=='profiles.password.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Change Password</p>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item has-treeview {{ ($prefix=='/setups')?'menu-open':'' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Manage Setup
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('setups.student.class.view') }}" class="nav-link {{ ($route=='setups.student.class.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Student Class</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('setups.student.year.view') }}" class="nav-link {{ ($route=='setups.student.year.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Year</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('setups.student.group.view') }}" class="nav-link {{ ($route=='setups.student.group.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Student Group</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('setups.student.shift.view') }}" class="nav-link {{ ($route=='setups.student.shift.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Student Shift</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('setups.fee.category.view') }}" class="nav-link {{ ($route=='setups.fee.category.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Fee Category</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('setups.fee.amount.view') }}" class="nav-link {{ ($route=='setups.fee.amount.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Fee Category Amount</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('setups.exam.type.view') }}" class="nav-link {{ ($route=='setups.exam.type.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Exam Type</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('setups.subject.view') }}" class="nav-link {{ ($route=='setups.subject.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Subject View</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('setups.assign.subject.view') }}" class="nav-link {{ ($route=='setups.assign.subject.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Assign Subject</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('setups.designation.view') }}" class="nav-link {{ ($route=='setups.designation.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Designation</p>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item has-treeview {{ ($prefix=='/students')?'menu-open':'' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Manage Students
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('students.registration.view') }}" class="nav-link {{ ($route=='students.registration.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Student Registration</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('students.roll.view') }}" class="nav-link {{ ($route=='students.roll.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Roll Generate</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('students.reg.fee.view') }}" class="nav-link {{ ($route=='students.reg.fee.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Registration Fee</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('students.monthly.fee.view') }}" class="nav-link {{ ($route=='students.monthly.fee.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Monthly Fee</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('students.exam.fee.view') }}" class="nav-link {{ ($route=='students.exam.fee.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Exam Fee</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item has-treeview {{ ($prefix=='/employees')?'menu-open':'' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Manage Employee
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('employees.registration.view') }}" class="nav-link {{ ($route=='employees.registration.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Employee Registration</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('employees.salary.view') }}" class="nav-link {{ ($route=='employees.salary.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Employee Salary</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('employees.leave.view') }}" class="nav-link {{ ($route=='employees.leave.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Employee Leave</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('employees.attendance.view') }}" class="nav-link {{ ($route=='employees.attendance.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Employee Attendance</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('employees.monthly.salary.view') }}" class="nav-link {{ ($route=='employees.monthly.salary.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Employee Monthly Salary</p>
                    </a>
                </li>
            </ul>

        </li>

        <li class="nav-item has-treeview {{ ($prefix=='/marks')?'menu-open':'' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Manage Marks
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>

            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('marks.add') }}" class="nav-link {{ ($route=='marks.add'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Marks Entry</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('marks.edit') }}" class="nav-link {{ ($route=='marks.edit'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Marks Edit</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('marks.grade.view') }}" class="nav-link {{ ($route=='marks.grade.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Grade Point</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item has-treeview {{ ($prefix=='/accounts')?'menu-open':'' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Manage Accounts
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>

            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('accounts.fee.view') }}" class="nav-link {{ ($route=='accounts.fee.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Students Fee</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('accounts.salary.view') }}" class="nav-link {{ ($route=='accounts.salary.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Employee Salary</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('accounts.cost.view') }}" class="nav-link {{ ($route=='accounts.cost.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Others Cost</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item has-treeview {{ ($prefix=='/reports')?'menu-open':'' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Manage Report
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>

            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('reports.profit.view') }}" class="nav-link {{ ($route=='reports.profit.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Monthly Profit</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('reports.marksheet.view') }}" class="nav-link {{ ($route=='reports.marksheet.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Marks Sheet</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('reports.attendance.view') }}" class="nav-link {{ ($route=='reports.attendance.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Attendance Report</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('reports.result.view') }}" class="nav-link {{ ($route=='reports.result.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Student Result</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('reports.id-card.view') }}" class="nav-link {{ ($route=='reports.id-card.view'?'active':'') }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Student ID Card</p>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</nav>
<!-- /.sidebar-menu -->

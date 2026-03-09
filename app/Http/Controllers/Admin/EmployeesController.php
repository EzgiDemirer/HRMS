<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Branche;
use App\Models\Department;
use App\Models\jobs_categorie;
use App\Models\Qualification;
use App\Models\Shifts_type;

class EmployeesController extends Controller
{
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $data = get_cols_where_p(new Employee(), array("*"), array("com_code" => $com_code), "id", "DESC", PC);

        return view("admin.Employees.index", ['data' => $data]);
    }

    public function create()
    {
        $com_code = auth()->user()->com_code;

        $other = [];
        $other['branches'] = get_cols_where(new Branche(), array("id", "name"), array("com_code" => $com_code, "active" => 1));
        $other['departments'] = get_cols_where(new Department(), array("id", "name"), array("com_code" => $com_code, "active" => 1));
        $other['jobs'] = get_cols_where(new jobs_categorie(), array("id", "name"), array("com_code" => $com_code, "active" => 1));
        $other['qualifications'] = get_cols_where(new Qualification(), array("id", "name"), array("com_code" => $com_code, "active" => 1));
        $other['shifts_types'] = get_cols_where(
            new Shifts_type(),
            array("id", "type", "from_time", "to_time", "total_hour"),
            array("active" => 1, "com_code" => $com_code),
            'id',
            'ASC'
        );

        return view("admin.Employees.create", ['other' => $other]);
    }

    public function store(Request $request)
    {
        $com_code = auth()->user()->com_code;

        $request->validate([
            'zketo_code' => 'required',
            'emp_name' => 'required|string|max:300',
            'emp_gender' => 'required|integer',
            'branch_id' => 'required|integer',
            'emp_email' => 'nullable|email|max:100',
            'emp_home_tel' => 'nullable|string|max:50',
            'emp_work_tel' => 'nullable|string|max:50',
            'staies_address' => 'nullable|string|max:300',
            'notes' => 'nullable|string',
            'emp_start_date' => 'nullable|date',
            'Functiona_status' => 'nullable|integer',
            'emp_Departments_code' => 'required|integer',
            'emp_jobs_id' => 'required|integer',
            'shift_type_id' => 'required|integer',
            'emp_sal' => 'nullable|numeric',
        ]);

        $data = $request->only([
            'zketo_code',
            'emp_name',
            'emp_gender',
            'branch_id',
            'emp_email',
            'emp_home_tel',
            'emp_work_tel',
            'staies_address',
            'notes',
            'emp_start_date',
            'Functiona_status',
            'emp_Departments_code',
            'emp_jobs_id',
            'shift_type_id',
            'emp_sal',
        ]);

        $data['employees_code'] = Employee::max('employees_code')
            ? Employee::max('employees_code') + 1
            : 1;

        $data['emp_sal'] = !empty($data['emp_sal']) ? $data['emp_sal'] : 0;
        $data['Functiona_status'] = isset($data['Functiona_status']) ? $data['Functiona_status'] : 1;

        $data['does_has_ateendance'] = 1;
        $data['is_has_fixced_shift'] = 1;
        $data['daily_work_hour'] = null;
        $data['MotivationType'] = 0;
        $data['Motivation'] = 0;
        $data['isSocialnsurance'] = 0;
        $data['ismedicalinsurance'] = 0;
        $data['sal_cach_or_visa'] = 1;
        $data['is_active_for_Vaccation'] = 0;
        $data['children_number'] = 0;

        $data['com_code'] = $com_code;
        $data['added_by'] = auth()->user()->id;
        $data['updated_by'] = auth()->user()->id;
        $data['date'] = date('Y-m-d');

        Employee::create($data);

        return redirect()->route('Employees.index')->with(['success' => 'Employee added successfully']);
    }

    public function edit($id)
    {
        $com_code = auth()->user()->com_code;

        $data = Employee::where('com_code', $com_code)->find($id);

        if (empty($data)) {
            return redirect()->route('Employees.index')->with(['error' => 'Employee not found']);
        }

        $other = [];
        $other['branches'] = get_cols_where(new Branche(), array("id", "name"), array("com_code" => $com_code, "active" => 1));
        $other['departments'] = get_cols_where(new Department(), array("id", "name"), array("com_code" => $com_code, "active" => 1));
        $other['jobs'] = get_cols_where(new jobs_categorie(), array("id", "name"), array("com_code" => $com_code, "active" => 1));
        $other['qualifications'] = get_cols_where(new Qualification(), array("id", "name"), array("com_code" => $com_code, "active" => 1));
        $other['shifts_types'] = get_cols_where(
            new Shifts_type(),
            array("id", "type", "from_time", "to_time", "total_hour"),
            array("active" => 1, "com_code" => $com_code),
            'id',
            'ASC'
        );

        return view("admin.Employees.edit", ['data' => $data, 'other' => $other]);
    }

    public function update($id, Request $request)
    {
        $com_code = auth()->user()->com_code;

        $employee = Employee::where('com_code', $com_code)->find($id);

        if (empty($employee)) {
            return redirect()->route('Employees.index')->with(['error' => 'Employee not found']);
        }

        $request->validate([
            'zketo_code' => 'required',
            'emp_name' => 'required|string|max:300',
            'emp_gender' => 'required|integer',
            'branch_id' => 'required|integer',
            'emp_email' => 'nullable|email|max:100',
            'emp_home_tel' => 'nullable|string|max:50',
            'emp_work_tel' => 'nullable|string|max:50',
            'staies_address' => 'nullable|string|max:300',
            'notes' => 'nullable|string',
            'emp_start_date' => 'nullable|date',
            'Functiona_status' => 'nullable|integer',
            'emp_Departments_code' => 'required|integer',
            'emp_jobs_id' => 'required|integer',
            'shift_type_id' => 'required|integer',
            'emp_sal' => 'nullable|numeric',
        ]);

        $data = $request->only([
            'zketo_code',
            'emp_name',
            'emp_gender',
            'branch_id',
            'emp_email',
            'emp_home_tel',
            'emp_work_tel',
            'staies_address',
            'notes',
            'emp_start_date',
            'Functiona_status',
            'emp_Departments_code',
            'emp_jobs_id',
            'shift_type_id',
            'emp_sal',
        ]);

        $data['emp_sal'] = !empty($data['emp_sal']) ? $data['emp_sal'] : 0;
        $data['Functiona_status'] = isset($data['Functiona_status']) ? $data['Functiona_status'] : 1;

        $data['does_has_ateendance'] = 1;
        $data['is_has_fixced_shift'] = 1;
        $data['daily_work_hour'] = null;
        $data['MotivationType'] = 0;
        $data['Motivation'] = 0;
        $data['isSocialnsurance'] = 0;
        $data['ismedicalinsurance'] = 0;
        $data['sal_cach_or_visa'] = 1;
        $data['is_active_for_Vaccation'] = 0;
        $data['children_number'] = 0;

        $data['updated_by'] = auth()->user()->id;
        $data['com_code'] = $com_code;
        $data['date'] = date('Y-m-d');

        $employee->update($data);

        return redirect()->route('Employees.index')->with(['success' => 'Employee updated successfully']);
    }

    public function destroy($id)
    {
        $com_code = auth()->user()->com_code;

        $data = Employee::where('com_code', $com_code)->find($id);

        if (empty($data)) {
            return redirect()->route('Employees.index')->with(['error' => 'Employee not found']);
        }

        if (!empty($data->emp_photo) && file_exists(public_path('uploads/employees/' . $data->emp_photo))) {
            unlink(public_path('uploads/employees/' . $data->emp_photo));
        }

        if (!empty($data->emp_CV) && file_exists(public_path('uploads/employees/' . $data->emp_CV))) {
            unlink(public_path('uploads/employees/' . $data->emp_CV));
        }

        $data->delete();

        return redirect()->route('Employees.index')->with(['success' => 'Employee deleted successfully']);
    }
}
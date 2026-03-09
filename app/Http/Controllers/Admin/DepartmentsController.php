<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use App\Models\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DepartmentsRequest;
use Illuminate\Support\Facades\DB;

class DepartmentsController extends Controller
{
    public function index()
    {
        $com_code = auth()->user()->com_code;
        $data = get_cols_where_p(new Department(), array("*"), array('com_code' => $com_code), 'id', 'DESC', PC);
        return view('admin.Departments.index', ['data' => $data]);
    }

    public function create()
    {
        return view('admin.Departments.create');
    }

    public function store(DepartmentsRequest $request)
    {
        try {
            $com_code = auth()->user()->com_code;
            $CheckExsists = get_cols_where_row(new Department(), array('id'), array("com_code" => $com_code, 'name' => $request->name));

            if (!empty($CheckExsists)) {
                return redirect()->back()->with(['error' => 'Department name already exists!'])->withInput();
            }

            DB::beginTransaction();

            $dataToinsert['name'] = $request->name;
            $dataToinsert['phones'] = $request->phones;
            $dataToinsert['notes'] = $request->notes;
            $dataToinsert['active'] = $request->active;
            $dataToinsert['added_by'] = auth()->user()->id;
            $dataToinsert['com_code'] = $com_code;

            insert(new Department(), $dataToinsert);

            DB::commit();

            return redirect()->route('departments.index')->with(['success' => 'Data inserted successfully']);
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Sorry, something went wrong: ' . $ex->getMessage()])->withInput();
        }
    }

    public function edit($id)
    {
        $com_code = auth()->user()->com_code;
        $data = get_cols_where_row(new Department(), array("*"), array('com_code' => $com_code, 'id' => $id));

        if (empty($data)) {
            return redirect()->route('departments.index')->with(['error' => 'Unable to access the requested data!']);
        }

        return view('admin.Departments.edit', ['data' => $data]);
    }

    public function update($id, DepartmentsRequest $request)
    {
        try {
            $com_code = auth()->user()->com_code;
            $data = get_cols_where_row(new Department(), array("*"), array('com_code' => $com_code, 'id' => $id));

            if (empty($data)) {
                return redirect()->route('departments.index')->with(['error' => 'Unable to access the requested data!']);
            }

            $CheckExsists = Department::select("id")
                ->where('com_code', '=', $com_code)
                ->where('name', '=', $request->name)
                ->where('id', '!=', $id)
                ->first();

            if (!empty($CheckExsists)) {
                return redirect()->back()->with(['error' => 'Department name already exists!'])->withInput();
            }

            DB::beginTransaction();

            $dataToUpdate['name'] = $request->name;
            $dataToUpdate['phones'] = $request->phones;
            $dataToUpdate['notes'] = $request->notes;
            $dataToUpdate['active'] = $request->active;
            $dataToUpdate['updated_by'] = auth()->user()->id;

            update(new Department(), $dataToUpdate, array('com_code' => $com_code, 'id' => $id));

            DB::commit();

            return redirect()->route('departments.index')->with(['success' => 'Data updated successfully']);
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Sorry, something went wrong: ' . $ex->getMessage()])->withInput();
        }
    }

public function destroy($id)
{
    try {
        $com_code = auth()->user()->com_code;

        $data = get_cols_where_row(new Department(), array("*"), array('com_code' => $com_code, 'id' => $id));

        if (empty($data)) {
            return redirect()->route('departments.index')->with(['error' => 'Unable to access the requested data!']);
        }

        // Bu departmana bağlı employee var mı kontrol et
        $checkEmployee = Employee::where('emp_Departments_code', $id)->count();

        if ($checkEmployee > 0) {
            return redirect()->back()->with([
                'error' => 'This department cannot be deleted because it is linked to employee data'
            ]);
        }

        DB::beginTransaction();

        destroy(new Department(), array('com_code' => $com_code, 'id' => $id));

        DB::commit();

        return redirect()->route('departments.index')->with(['success' => 'Data deleted successfully']);

    } catch (\Exception $ex) {

        DB::rollBack();

        return redirect()->back()->with([
            'error' => 'Sorry, something went wrong: ' . $ex->getMessage()
        ])->withInput();
    }
}
}
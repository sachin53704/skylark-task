<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\EmployeeService;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $employees = $this->employeeService->index();

            return response()->json([
                'data' => $employees
            ]);
        }

        return view('employee.index');
    }

    public function store(EmployeeRequest $request)
    {
        if ($request->ajax()) {
            $employee = $this->employeeService->store($request);

            if ($employee) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Employee Created Successfully'
                ]);
            } else {
                return response()->json([
                    'status' => 203,
                    'message' => 'Something Went Wrong'
                ]);
            }
        }
    }

    public function edit(Request $request, $id)
    {
        if ($request->ajax()) {
            $employee = $this->employeeService->edit($id);

            return response()->json([
                'status' => 200,
                'employee' => $employee
            ]);
        }
    }

    public function update(EmployeeRequest $request)
    {
        if ($request->ajax()) {
            $employee = $this->employeeService->update($request);

            if ($employee) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Employee Updated Successfully'
                ]);
            } else {
                return response()->json([
                    'status' => 203,
                    'message' => 'Something Went Wrong'
                ]);
            }
        }
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $employee = $this->employeeService->destroy($id);

            if ($employee) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Employee remove Successfully'
                ]);
            } else {
                return response()->json([
                    'status' => 203,
                    'message' => 'Something Went Wrong'
                ]);
            }
        }
    }
}

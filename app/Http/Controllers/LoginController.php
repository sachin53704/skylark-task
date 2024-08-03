<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserLoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Service\EmployeeService;
use App\Http\Requests\RegisterEmployeeRequest;

class LoginController extends Controller
{
    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function login()
    {
        return view('login');
    }

    public function postLogin(UserLoginRequest $request)
    {
        $username = $request->username;
        $password = $request->password;
        $remember_me = $request->has('remember_me') ? true : false;

        try {
            $user = User::where('email', $username)->first();

            if (!$user)
                return response()->json(['error' => 'No user found with this username']);

            if ($user->active_status == '0' && !$user->roles)
                return response()->json(['error' => 'You are not authorized to login, contact HOD']);

            if (!auth()->attempt(['email' => $username, 'password' => $password], $remember_me))
                return response()->json(['error' => 'Your entered credentials are invalid']);

            $user = auth()->user();

            return response()->json(['success' => 'login successful', 'user' => $user]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info("login error:" . $e);
            return response()->json(['error' => 'Something went wrong while validating your credentials!']);
        }
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }

    public function register()
    {
        return view('register');
    }

    public function postRegister(RegisterEmployeeRequest $request)
    {
        if ($request->ajax()) {
            $employee = $this->employeeService->store($request);

            if ($employee) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Employee register Successfully'
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

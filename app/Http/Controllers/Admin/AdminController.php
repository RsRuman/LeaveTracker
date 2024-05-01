<?php

namespace App\Http\Controllers\Admin;

use AllowDynamicProperties;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateEmployeeStatusRequest;
use App\Interfaces\AdminInterface;
use App\Models\EmployeeLeave;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Validator;

#[AllowDynamicProperties]
class AdminController extends Controller
{
    public function __construct(AdminInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function index(Request $request): View
    {
        $statusCounts = EmployeeLeave::query()
            ->groupBy('status')
            ->selectRaw('status, count(*) as count')
            ->get();

        return view('admin.index', compact('statusCounts'));
    }

    public function employeeList(Request $request): View
    {
        $perPage = $request->query('per_page', 10);

        $employees = $this->adminRepository->getEmployees($perPage);

        return view('admin.employee', compact('employees'));
    }

    public function updateEmployeeStatus(UpdateEmployeeStatusRequest $request, $id): RedirectResponse
    {
        $validator = Validator::make($request->all(), $request->rules());

        try {
            if (!$validator->fails()) {
                $updateUser = $this->adminRepository->updateEmployeeStatus($id, $request->input('status'));
                if (!$updateUser) {
                    throw new Exception("Error Processing Request", HttpResponse::HTTP_UNPROCESSABLE_ENTITY);
                }
                return redirect()->route('admin.employee.list')->with('success', 'Employee status updated successfully.')->setStatusCode(HttpResponse::HTTP_OK);
            }
        } catch (Exception $exception) {
            return redirect()->route('admin.employee.list')->with('error', $exception->getMessage())->setStatusCode(HttpResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        return redirect()->route('admin.employee.list')->with('error', 'Could not update. Please try later.')->setStatusCode(HttpResponse::HTTP_UNPROCESSABLE_ENTITY);
    }
}

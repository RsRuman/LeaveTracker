<?php

namespace App\Http\Controllers\Admin;

use AllowDynamicProperties;
use App\Http\Controllers\Controller;
use App\Interfaces\AdminInterface;
use App\Models\EmployeeLeave;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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
}

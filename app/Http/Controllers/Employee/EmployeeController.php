<?php

namespace App\Http\Controllers\Employee;

use AllowDynamicProperties;
use App\Http\Controllers\Controller;
use App\Http\Requests\LeaveRequest;
use App\Interfaces\EmployeeLeaveInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Auth;

#[AllowDynamicProperties]
class EmployeeController extends Controller
{
    public function __construct(EmployeeLeaveInterface $employeeLeaveRepository)
    {
        $this->employeeLeaveRepository = $employeeLeaveRepository;
    }

    /**
     * Employee dashboard
     * @return View
     */
    public function index(): View
    {
        $statusCounts = Auth::user()->employeeLeaves()
            ->groupBy('status')
            ->selectRaw('status, count(*) as count')
            ->get();

        return view('employee.index', compact('statusCounts'));
    }

    /**
     * Leave request form
     * @return View
     */
    public function createLeaveRequest(): View
    {
        return view('employee.leave_request_form');
    }

    /**
     * Store leave request
     * @param LeaveRequest $request
     * @return RedirectResponse
     */
    public function storeLeaveRequest(LeaveRequest $request): RedirectResponse
    {
        $data            = $request->only('type', 'start_date', 'end_date', 'reason');
        $data['user_id'] = Auth::user()->id;

        $employeeLeave = $this->employeeLeaveRepository->store($data);

        if (!$employeeLeave) {
            return redirect()->back()->with('error', 'Could not create leave request.')->setStatusCode(HttpResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        return redirect()->route('employee.dashboard')->with('success', 'Leave request created successfully.')->setStatusCode(HttpResponse::HTTP_CREATED);
    }

    /**
     * Get all leave histories
     * @param Request $request
     * @return View
     */
    public function leaveRequestHistories(Request $request): View
    {
        $perPage        = $request->query('per_page', 2);

        $employeeLeaves = $this->employeeLeaveRepository->histories($request, $perPage);

        return view('employee.leave_request_history', compact('employeeLeaves'));
    }
}

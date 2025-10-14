<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use App\Services\AccountService;
use Illuminate\Http\JsonResponse;

// Request
use App\Http\Requests\Admin\AccountListRequest;
use App\Http\Requests\Admin\UpdateUserStatusRequest;

class StudentController extends Controller
{
    const PATH_VIEW = 'admin.account.student.';

    protected AccountService $accountService;

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    public function index(AccountListRequest $request)
    {
        $roleId = $request->input('id', 3);
        $datas  = $this->accountService->getAll($roleId);

        return view(self::PATH_VIEW . __FUNCTION__, compact('datas', 'roleId'));
    }

    public function updateStatus(UpdateUserStatusRequest $request): JsonResponse
    {
        $success = $this->accountService->updateStatus(
            $request->id,
            $request->isActive
        );

        return response()->json([
            'success' => $success,
            'message' => $success ? 'User status updated successfully.' : 'Update failed or user deleted.'
        ]);
    }
}

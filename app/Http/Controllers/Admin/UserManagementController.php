<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Traits\ApiResponseTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class UserManagementController extends Controller
{
    use ApiResponseTrait;

    protected $exceptionMessage;
    protected $data;

    public function __construct()
    {
        $this->exceptionMessage = "Something went wrong. Please try again later.";

        $this->data = [];
        $this->data['route'] = 'user-management';
        $this->data['path'] = 'User-Management';
        $this->data['title'] = 'User Management';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {
            if ($request->wantsJson()) {
                $query = User::query();

                if ($request->has('status'))
                    $query = $query->where('status', $request->status);
                if ($request->has('from_date'))
                    $query = $query->whereDate('created_at', $request->from_date);

                $userManagements = $query->latest()->get();

                return Datatables::of($userManagements)->make(true);
            }
            $data = $this->data;
            $data['userTypes'] = (object)[1 => 'Super Admin', 2 => 'Account', 3 => 'Sub Admin', 4 => 'Basic User'];//super-admin,account,sub-admin,basic
            if ($request->from_date) $data['from_date'] = $request->from_date;
            if (isset($request->status)) $data['status'] = $request->status;
            return view('admin.user-management', $data);
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return $this->exceptionResponse($this->exceptionMessage);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Http\JsonResponse
     */
    public function store(UserStoreRequest $request)
    {
        try {
            $userManagement = User::create($this->generateData($request));

            return $this->successResponse('Exam pack stored successfully', $userManagement);
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return $this->exceptionResponse($this->exceptionMessage);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Http\JsonResponse
     */
    public function update(UserStoreRequest $request, User $user)
    {
        try {
            $user->update($this->generateData($request));
            return $this->successResponse('User stored successfully', $user);
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return $this->exceptionResponse($this->exceptionMessage);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Http\JsonResponse
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return $this->successResponse('User deleted successfully', null);
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return $this->exceptionResponse($this->exceptionMessage);
        }
    }

    protected function generateData(Request $request)
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'mobile_no' => $request->mobile_no,
            'address' => $request->address,
            'type' => $request->type ?? 0,
            'status' => !!$request->status,
            'password' => bcrypt($request->password),
        ];
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserTypes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\Refund;
use App\Traits\ApiResponseTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
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
            $data['userTypes'] = (object)[UserTypes::SUPERADMIN => 'Super Admin', UserTypes::ADMIN => 'Admin', UserTypes::ACCOUNTANT => 'Accountant'];
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
            $request['password'] = '123456';
            $userManagement = User::create($this->generateData($request));

            return $this->successResponse('User Added successfully', $userManagement);
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
    public function update(UserUpdateRequest $request)
    {
        try {
            $user = User::findOrFail($request->id);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Http\JsonResponse
     */
    public function balanceAdjust(Request $request, int $id)
    {
        try {
            if (auth()->user()->type != 1) return $this->unauthorizedResponse('You are not authorized person! please don\'t disturb :)');
            $validator = Validator::make($request->all(), [
                'amount' => 'required|integer|not_in:0',
                'reason' => 'required|string|min:5',
            ]);

            if ($validator->fails()) {
                return $this->invalidResponse($validator->errors()->first());
            }
            DB::beginTransaction();
            $user = User::findOrFail($id);
            $last_balace = $user->balance + $request->amount;
            $user->update(['balance' => $last_balace]);
            Refund::create([
                'amount' => $request->amount,
                'reason' => $request->reason,
                'user_id' => $id,
                'refunded_by' => auth()->user()->id
            ]);
            DB::commit();
            return $this->successResponse('Balance Adjustment updated. Last Balance: ' . $last_balace, null);
        } catch (\Exception $ex) {
            DB::rollBack();
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
    public function passwordReset(Request $request, int $id)
    {
        try {
            $validation = Validator::make($request->all(), [
                'password' => 'required|min:6',
                'password_confirmation' => 'required|same:password',
            ]);

            if ($validation->fails()) {
                return $this->invalidResponse($validation->errors()->first());
            }

            if (auth()->user()->type != UserTypes::SUPERADMIN)
                return $this->unauthorizedResponse('You are not authorized to reset password!');

            User::findOrFail($id)->update(['password' => bcrypt($request->password)]);

            return $this->successResponse('User password has been reset successfully', null);
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return $this->exceptionResponse($this->exceptionMessage);
        }
    }

    protected function generateData(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'mobile_no' => $request->mobile_no,
            'address' => $request->address,
            'type' => $request->type ?? UserTypes::ADMIN,
            'status' => !!$request->status
        ];

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        return $data;
    }
}

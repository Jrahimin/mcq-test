<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Services\V1\AboutService;
use App\Traits\ApiResponseTrait;
use App\Traits\UserLogTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class AboutController extends Controller
{
    use ApiResponseTrait, UserLogTrait;

    private $aboutService;

    public function __construct(AboutService $aboutService)
    {
        $this->aboutService = $aboutService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {

            if ($request->ajax()) {
//                return Datatables::of(About::all())->rawColumns(['description_en', 'description_bn', 'image'])->make(true);
            }
            return view('page-configurations.about', ['title' => 'Dynamic Configuration', 'path' => ['Dynamic'], 'route' => 'about']);
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            if ($request->ajax())
                return $this->exceptionResponse('Something went wrong!');
            abort(500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Http\JsonResponse
     */
    public function create()
    {
        try {
            abort(403);
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return $this->exceptionResponse('Something went wrong!');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Http\JsonResponse
     */
    public function store(AboutRequest $request)
    {
        try {
            $about = $this->aboutService->storeAbout($request);
            if ($about) {
//                $this->userId(isset(auth()->user->id) ? auth()->user->id : null)->tableName('App\model\About')->previousData(json_encode([]))->currentData($about)->remarks('')->operation('created')->save();
                return $this->successResponse('About data store successfully', $about);
            }
            return $this->invalidResponse('Something went wrong when try to store data');
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return $this->exceptionResponse('Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            abort(403);
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return $this->exceptionResponse('Something went wrong!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        try {
            abort(403);
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return $this->exceptionResponse('Something went wrong!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param About $abou
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Http\JsonResponse
     */
    public function update(AboutRequest $request, $id)
    {
        try {
            $about = $this->aboutService->updateAbout($request, $id);
            if ($about) {
                //                $this->userId(isset(auth()->user->id) ? auth()->user->id : null)->tableName('App\model\About')->previousData(json_encode([]))->currentData($about)->remarks('')->operation('created')->save();
                return $this->successResponse('Updated successfully', $about);
            }

        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return $this->exceptionResponse('Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            if ($this->aboutService->deleteAbout($id)) {
                //                $this->userId(isset(auth()->user->id) ? auth()->user->id : null)->tableName('App\model\About')->previousData(json_encode([]))->currentData($about)->remarks('')->operation('created')->save();
                return $this->successResponse('Delete successfully');
            }
            return $this->invalidResponse('Unable to delete right now! try again later');
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return $this->exceptionResponse('Something went wrong!');
        }
    }
}

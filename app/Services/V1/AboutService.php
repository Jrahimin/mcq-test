<?php


namespace App\Services\V1;


use App\models\About;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class AboutService
{
    use FileUpload;

    public function storeAbout(Request $request)
    {
        $about = About::create([
            'description_en' => $request->description_en,
            'description_bn' => $request->description_bn,
            'status' => $request->status === true || $request->status === 1 || $request->status === '1' || $request->status === 'true' ? true : false,
            'menu_id' => $request->menu_id,
        ]);

        return $about ? $about : false;
    }

    public function deleteAbout(int $id)
    {
        $about = About::find($id);
        if ($about->delete()) {
            return true;
        }
        return false;

    }

    public function updateAbout(Request $request, $id)
    {
        $about = About::find($id);
        $abt = $about->update([
            'description_en' => $request->description_en,
            'description_bn' => $request->description_bn,
            'status' => $request->status === true || $request->status === 1 || $request->status === '1' || $request->status === 'true' ? true : false,
            'menu_id' => $request->menu_id,
        ]);
        $about = About::find($id);
        if ($abt) return $about;
        return false;
    }
}

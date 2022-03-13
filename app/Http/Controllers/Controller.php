<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $NoImage = 'NoImageA.png';

    protected function SaveFile (Request $request, $key, $publicPath = 'assets/img/cars') {

        if ($request->hasFile($key)) {

            $imageName = uniqid() . "_" .  $request->file($key)->getClientOriginalName();
            $request->file($key)->move(public_path($publicPath), $imageName);

        } else {
            $imageName = $this->NoImage;
        }

        return $imageName;
    }

    protected function DeleteFile ($ImageName, $publicPath = 'assets/img/cars/') {
        $imagePath = public_path ($publicPath . $ImageName);
        if (File::exists($imagePath) and $ImageName != $this->NoImage) {
            File::delete($imagePath);
        }
    }

}

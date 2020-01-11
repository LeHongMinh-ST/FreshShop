<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
//        $file = Storage::disk('local')->get('file.txt');
//        dd($file);
//        return view('frontend.page.home');
//         return Storage::download('file.txt');
//        Storage::copy('file.txt','new/file.txt');
//        Storage::copy('file.txt','new/file2.txt');
//        Storage::delete('new/file.txt','new/file2.txt');
        $file = Storage::files('new');
        dd($file);
    }


    public function about()
    {
        return view('frontend.page.about');
    }

    public function contact()
    {
        return view('frontend.page.contact');
    }
}

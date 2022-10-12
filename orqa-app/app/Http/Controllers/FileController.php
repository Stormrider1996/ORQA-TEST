<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index() {
        return view('files', [
            'files' => File::all()
        ]);
    }

    public function create() {
        return view('newFile');
    }

    public function store(Request $request){
        
            $request->validate(['file' => 'required']);
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $fileSize = round($file->getSize() * pow(10,-6), 2);
            $path = $file->store('files', 'public');
            
            $formFields = [
                'file' => $path,
                'fileName' => $fileName,
                'fileSize' => $fileSize,
            ];
     
       
        
        File::create($formFields);
        
        return redirect('/');
    }
}

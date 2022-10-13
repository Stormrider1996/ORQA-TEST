<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Exists;

class FileController extends Controller
{
    public function index() {
        return view('files', [
            'files' => DB::table('files')->latest()->simplePaginate(5)
        ]);
    }

    public function create() {
        return view('newFile');
    }

    public function store(Request $request){
        
            $request->validate(['file' => 'required']);
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $fileExtension = $file->extension();
            $fileSize = round($file->getSize() * pow(10,-6), 2);
            $path = $file->store('files', 'public');
            
            $formFields = [
                'file' => $path,
                'fileName' => $fileName,
                'fileExtension'=>$fileExtension,
                'fileSize' => $fileSize
            ];
     
       
        
        File::create($formFields);
        
        return redirect('/');
    }

    public function destroy(File $file){
        
        if(Storage::disk('public')->exists($file->file)){
            Storage::disk('public')->delete($file->file);
        }else{
            $file->delete();
            return redirect('/')->with('message', 'File doesn not exist');
        }
        $file->delete();
        return redirect('/')->with('message', 'File Deleted Succesfully');
    }

    public function retrieve(File $file){
        if(Storage::disk('public')->exists($file->file)){
            $content = "\\".basename($file->file);
            $url = public_path().'\storage\files'.$content;
            return response()->download($url); 
        }
        else{
            $file->delete();
            return redirect('/')->with('message', 'File doesn not exist');
        }
    }
}

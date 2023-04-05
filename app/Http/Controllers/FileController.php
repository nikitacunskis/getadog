<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function show($filename)
    {
        $filePath = 'uploads/' . $filename;
    
        if (Storage::disk('public')->exists($filePath)) {
            $file = Storage::disk('public')->get($filePath);
            return response($file, 200)->header('Content-Type', Storage::disk('public')->mimeType($filePath));
        } else {
            return response()->json([
                'message' => 'File not found'
            ], 404);
        }
    }

    public function delete($filename)
    {
        $filePath = 'uploads/' . $filename; // assuming the file is stored in the public/uploads directory
    
        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
            return response()->json([
                'message' => 'File deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'File not found'
            ], 404);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    function upload(Request $request) {
        // $image = $request->file('image');
        
        // if ($request->hasFile('image')) {
        //     $new_name = rand() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('/uploads/images'), $new_name);
        //     return response()->json($new_name);
        // } else {
        //     return response()->json('Image is null');
        // }

        $images = $request->file('image');
        $imageName = "";

        foreach ($images as $image) {
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/uploads/images'), $new_name);
            $imageName .= $new_name . ",";
        }

        $imagedb = rtrim($imageName, ','); // Remove trailing comma if needed
        return response()->json(['images' => $imagedb]);

    }
    
}

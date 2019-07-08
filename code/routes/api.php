<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/upload/file',function(Request $request){
    if ( $request->hasFile('image') ){
        $name = md5(microtime()).'.jpg';
        $request->file('image')->storeAs('posts/images', $name);
        return response()->json([
            'success'   => true,
            'message'   => 'File Uploaded',
            'data'      => $name
        ]);
    }
    return response()->json([
        'success'   => false,
        'message'   => 'No File received',
    ]);
});
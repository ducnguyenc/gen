<?php

use App\Exceptions\InvalidOrderException;
use App\Http\Controllers\a;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return Storage::response('clean_code.docx.txt');

    $a = '';
    $handle = fopen(Storage::path("clean_code.docx.txt"), "r");
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            $a .= $line;
        }

        fclose($handle);
    }
    return view('a', ['b' => $a]);
});

Route::get('a', [a::class, 'b']);

Route::get('c', function () {
    1/0;
    throw new InvalidOrderException();
});

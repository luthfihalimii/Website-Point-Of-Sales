<?php

use Illuminate\Support\Facades\Route;
use App\Exports\TemplateExport;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/download-template', function() {
    return Excel::download(new TemplateExport, 'template.xlsx');
})->name('download-template');
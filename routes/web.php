<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CourseController::class, "index"]);
    
Route::post("/enroll",[ApplicationController::class, "new_application"]);

Route::get("/admin", [AdminController::class, "index"]);

Route::get("/application/{id_application}/confirm", [ApplicationController::class, "confirm"]);

Route::post("course/create", [CourseController::class, "create"]);

Route::post("category/create", [CategoryController::class, "createCategory"]);

Route::post("/reg", [UserController::class, "reg"]);
// ссылка в форме, название функции в контроллере

Route::get('reg',[UserController::class, "index"]);

Route::post("auth", [UserController::class, "auth"]);

Route::get('auth',[UserController::class, "index_auth"]);





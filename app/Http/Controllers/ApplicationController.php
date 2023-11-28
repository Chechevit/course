<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function new_application(Request $request)
    {
        // dd($request->all()); - показывает все данные которые отправил юзер
        // слева-бд, справа- name в форме инпутов
        $application_info = $request->all();
        Application::create([
            "email" => $application_info["email"],
            "name" => $application_info["name"],
            "course_id" => $application_info["course"],
        ]);
        return redirect("/");
    }

    public function confirm($id_application)
    {
        $application = Application::find($id_application);

        $application->is_confirm = 1;
        $application->save();
        return redirect("/admin");
    }
}

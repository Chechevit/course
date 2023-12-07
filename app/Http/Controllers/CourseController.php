<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{

    public function validates(Request $request){
        $request-> validate([
            "title"=>"required",
            "description"=>"reqiured",
            "cost"=>"reqiured",
            "duration"=>"reqiured",
        ],[
            "title.reqiured"=>"Обязательно нужно название",
            "description.reqiured"=>"Нужно описание",
            "cost.reqiured"=>"Это не благотворительность",
            "duration.reqiured"=>"Введите длительность в неделях",
        ]);
    }
    public function index()
    {
        $courses = Course::paginate(4);
        return view("index", [
            "courses" => $courses
        ]);
    }

    // запись в бд от формы
    public function create(Request $request)
    {
        $course_info = $request->all();

        // расширение файла
        // dd($file->getClientOriginalExtension());

        // отправка фото
        $file = $request->file("image");
        // кэширование фотки
        $file_name = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();

        Storage::putFileAs("public/img", $file, $file_name);
        Course::create([
            // Слева - бд, справа - name  в форме
            "title" => $course_info["title"],
            "description" => $course_info["description"],
            "duration" => $course_info["duration"],
            "cost" => $course_info["cost"],
            "image" => $file_name,

            "category_id" => $course_info["category"],
        ]);
        return redirect()->back();

        
    }
    
}
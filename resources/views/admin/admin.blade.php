<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <style>
        a>img {
            width: 25px;
        }
    </style>
</head>

<body>
    <!-- навигация -->
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Школа информатики для ведьм</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin">Панель админа</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/">Выход</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <section>
            <div class="container">
                <h2 class="m-3">
                    Список заявок на курсы информатики для ведьм
                </h2>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Имя</th>
                            <th scope="col">Курс</th>
                            <th scope="col">Дата заявки</th>
                            <th scope="col">Статус</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_applications as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>
                                {{$item->email}}
                            </td>
                            <td>
                                {{$item->name}}
                            </td>
                            <td>
                                {{$item->course_id}}
                            </td>
                            <td>{{$item->created_at}}
                            </td>

                            <td>
                                {{ $item->is_confirm==0 ? 'Не обработано' : 'Подтверждено';}}

                                @if($item->is_confirm == 0)
                            <td>
                                <a href="/application/{{$item->id}}/confirm">
                                    <img src="storage/img/47810a27-7365-4666-bde4-a7f44b4a6bfb.jpg" alt="agree">
                                </a>
                            </td>
                            @else <td></td>

                            @endif
                        </tr>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </section>


        <section>
            <div class="container">
                <h2 class="m-3">
                    Создание курса
                </h2>
                <form action="/course/create" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Название курса</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Описание курса</label>
                        <textarea class="form-control" id="description" rows="2" name="description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="cost" class="form-label">Стоимость курса</label>
                        <input type="text" class="form-control" id="cost" name="cost">
                    </div>
                    <div class="mb-3">
                        <label for="duration" class="form-label">Длительность курса (в неделях)</label>
                        <input type="number" class="form-control" id="duration" name="duration">
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Изображение курса</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="duration" class="form-label">Категория</label>
                        <select class="form-select" name="category">
                            <option selected>Категория курса</option>
                            @foreach ($categories as $item)
                            <option value="{{$item->id}}">{{$item->title}}</option>
                            @endforeach

                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </section>

        <section>
        <div class="container">
        <h2 class="m-3">Создание категорий</h2>
                <form action="/category/create" method="post">
                @csrf
                    <div class="mb-3">
                        <label for="category_title" class="form-label">Название категории</label>
                        <input type="text" class="form-control" id="category_title" name="category_title">
                    </div>
                    <button type="submit" class="btn btn-primary">Создать категорию</button>

                </form>
            </div>
        </section>
    </main>
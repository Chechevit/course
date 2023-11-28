<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>

<style>
    .hero {
        height: 75vh;
        width: 100%;
        overflow: hidden;
        background-image: url('storage/img/1673746.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: 50% 20%;
    }
</style>

<body>
    <!-- навигация -->
    <div class="header">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Школа информатики для ведьм</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#about">О нас</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#courses">Курсы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#enroll">Записаться</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="reg">Регистрация</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="auth">Авторизация</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('category') }}">Категории</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>


    <main>
        <section id="hero" class="hero d-flex justify-content-center align-items-center text-white ">
            <h1>Онлайн курсы - это круто!</h1>
        </section>

        <!-- карточки во первых -->
        <section id="about">
            <div class="container">
                <h1 class="">Онлайн курсы - это круто!</h1>
                <div class="row mb-3">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Во первых</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Во вторых</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">В третьих</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">В четвертых</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Карточки курсов -->
        <section id="courses">
            <div class="container">
                <div class="d-flex flex-wrap justify-content-between">
                    @foreach ($courses as $item)
                    <div class="card" style="width: 18rem; margin:10px 0px">
                        <img src="storage/img/{{ $item->image }}" class="card-img-top" alt="..." style="height: 200px; object-fit:cover">
                        <div class="card-body">
                            <h5 class="card-title">{{$item->title}}</h5>

                            <p class="card-text">{{$item->description}}</p>
                            <p class="card-text">{{$item->cost}} ₽</p>
                            <p class="card-text">{{$item->duration}} недель</p>
                            <a href="#" class="btn btn-primary">Не записаться на курс</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{ $courses-> withQueryString()-> links('pagination::bootstrap-5') }}
            </div>
        </section>


        <!-- Записаться на курс -->
        <section id="enroll">
            <div class="container">
                <form method="post" action="/enroll">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Ваш email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Ваше имя</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Выберите курс</label>
                        <select class="form-select" name="course">

                            @foreach ($courses as $item)
                            <option value="{{$item->id}}">{{$item->title}}</option>
                            @endforeach

                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Оставить заявку</button>
                </form>
            </div>
        </section>
        <!--  -->

    </main>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</html>
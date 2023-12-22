<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NEWS API</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            font-family: "Poppins";
        }

        body {
            background: #f4f4f4;
        }

        .container {
            margin-top: 50px;
        }

        .img {
            border-radius: 5px;
        }

        .container .team {
            width: auto;
            display: flex;
            justify-content: center;
            text-align: center;
            flex-wrap: wrap;
        }

        .container .team .member {
            width: 500px;
            margin: 10px;
            background: #fff;
            border-radius: 6px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.07);
            padding: 15px;
        }

        .container .team .member .img {
            width: 100%;
            height: 200px;
        }

        .container .team .member h3 {
            color: #444;
        }

        .container .team .member span {
            font-size: 12px;
            color: #999;
        }

        .container .team .member p {
            margin: 15px 0;
            font-weight: 400;
            color: #999;
            font-size: 15px;
            text-align: justify;
        }

        .container .team .member .btn a {
            background: #ddd;
            display: block;
            float: right;
            width: 430px;
            margin: 0 10px;
            padding: 10px;
            border-radius: 6px;
            color: #444;
            text-transform: capitalize;
            transition: all 0.3s ease;
        }

        .container .team .member .btn a:hover {
            background: #ab94ff;
            color: #fff;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand text-danger" href="#"><strong><i>NEWS <span
                            class="text-success">API</span></i></strong></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"><u>Home</u></a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://contenthub-static.grammarly.com/blog/wp-content/uploads/2022/08/BMD-3398.png"
                    class="d-block w-100" height="500" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://cdn.pixabay.com/photo/2016/02/01/00/56/news-1172463_640.jpg" class="d-block w-100"
                    height="500" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container">

        <div class="team">
            @foreach ($response as $value)
                <div class="member">
                    @if ($value['urlToImage'] == null)
                        <img src="https://www.fda.gov/files/CDER-whatsnew.png" class="img" alt="Fix Image">
                    @else
                        <img class="img" src="{{ $value['urlToImage'] }}" alt="member_image">
                    @endif
                    <h6 class="mt-2">{{ \Illuminate\Support\Str::limit($value['title'], 50) }}</h6>
                    <span>Author : {{ $value['author'] }}</span>
                    <p>{{ \Illuminate\Support\Str::limit($value['description'], 100) }}</p>
                    <div class="btn">
                        <a href="{{ $value['url'] }}"><i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <footer class="card d-flex justify-content-center">
        <p>NEWS API <a href="#">copyright</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>

<!doctype html>
<html lang="en">

<head>
    <base href="/public">
    <!-- Required meta tags -->
    @stack('title')
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="shortcut icon" href="favicon.ico">
</head>

<body>
    <header>
        <div class="title-text-div">
            <div class="title-todo">
                <a href="{{ url('/') }}">
                    <h2>TODO APP</h2>
                </a>
            </div>
            <form action="{{url('/search')}}">
                <div class="search-bar">
                    <input type="search" name="search" placeholder="Search by Date or Tasks..."  />
                    <span class="search-icon">&#128269;</span>
                    <button>Search</button>
                </div>
            </form>
            <div class="calender">
                <div class="calender-out">
                    {{ date('l') }}
                </div>
                <div class="calender-in">
                    {{ date('d-M') }}
                </div>
            </div>
        </div>
    </header>

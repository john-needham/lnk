@extends('layout')


@section('content')

    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
        <header class="masthead">
            <div class="inner">
                <h3 class="masthead-brand">Lnk</h3>
                <nav class="nav nav-masthead justify-content-center">
                </nav>
            </div>
        </header>

        <main role="main" class="">
            <h1 class="cover-heading">Lets make a link.</h1>
            <form method="POST">
                @csrf
                <div class="form-group">
                    <label for="url">Link</label>
                    <input name="url" type="url" class="form-control" id="url" placeholder="url">
                </div>
                <button type="submit" class="btn btn-lg btn-primary">Submit</button>
            </form>
        </main>
    </div>
@endsection

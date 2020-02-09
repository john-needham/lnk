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
            <div class="form-group">
                <label for="url">Link</label>
                <input name="url" type="url" class="form-control" id="url" value="{{ $link->shortlink }}">
            </div>
        </main>
    </div>
@endsection

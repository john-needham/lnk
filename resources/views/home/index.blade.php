@extends('layout')


@section('content')
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
@endsection

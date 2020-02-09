@extends('layout')


@section('content')
    <main role="main" class="">
        <div class="form-group">
            <label for="url">Link</label>
            <input name="url" type="url" class="form-control" id="url" value="{{ $link->shortlink }}">
        </div>
    </main>
@endsection

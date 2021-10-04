@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add new Todo</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('admin.todos.store') }}">
                        @csrf

                        Name:
                        <input type="text" name="name" class="form-control" />

                        <br />

                        <input type="submit" value="Save" class="btn btn-primary" />

                    
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

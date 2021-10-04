@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todos</div>

                <div class="card-body">

                    <a href="{{ route('admin.todos.create') }}" class="btn btn-sm btn-primary">Add new Todo</a>
                    <br /><br />

                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @forelse($todos as $todo)
                            @if ($todo->status == $todo::STATUS_SUCCESS)
                                {{-- this todo succes, set the row background to green --}}
                                <tr class="bg-success">
                            @elseif ($todo->status == $todo::STATUS_FAIL)
                                {{-- this todo failed, set the row background to red --}}
                                <tr class="bg-danger">
                            @else
                                <tr>
                            @endif
                                <td>{{ $todo->name }}</td>
                                <td>
                                    <form method="POST" action="{{ route('admin.todos.update', $todo->id) }}">
                                        @csrf
                                        {{ method_field('PUT') }}
                                        <select name="status" class="form-select" onchange="this.form.submit()">
                                            @foreach($todo::STATUSES as $key=>$item)
                                                <option value="{{ $key }}" {{$todo->status == $key  ? 'selected' : ''}}>{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('admin.todos.edit', $todo->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <form method="POST" action="{{ route('admin.todos.destroy', $todo->id) }}">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input type="submit" value="Delete" onclick="return confirm('Are you sure to delete this Todo?')"
                                            class="btn btn-sm btn-warning" />
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">No todos</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('app')
@section('content')

<body>
  <div class="container mt-5 d-flex flex-column align-items-center p-1">
    <h1>Edit Task</h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="mt-3">
      @csrf
      @method('PUT')
      @include('tasks.partials.form')
      <button type="submit" class="btn btn-primary waves-effect waves-light my-3">Update Task</button>
    </form>
  </div>
</body>
@endsection
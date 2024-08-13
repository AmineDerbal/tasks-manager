@extends('app')
@section('content')


<div class="container mt-5 d-flex flex-column align-items-center p-1 ">
  <h1>Create New Task</h1>
  <form action="{{ route('tasks.store') }}" method="POST" class="mt-3">
    @csrf
    @include('tasks.partials.form')
    <button type="submit" class="btn btn-primary waves-effect waves-light my-3">Create Task</button>
  </form>
</div>


@endsection
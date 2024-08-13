@extends('app')
@section('content')

<div>
  <div class="container mt-5 d-flex flex-column align-items-center p-1">
    <h1 class="">Tasks List</h1>
    <!-- Base Buttons -->

    <a href="{{ route('tasks.create') }}" class="btn btn-primary waves-effect waves-light m-3">Create New Task</a>
    <ul id="task-list" class="list-group ">
      @foreach($tasks as $task)
      <li data-id="{{ $task->id }}" data-priority="{{ $task->priority }}"
        class="list-group-item m-3 d-flex justify-content-between align-items-center gap-3" style="cursor: pointer;">
        {{ $task->name }} <code>(Priority: {{ $task->priority }}) </code>
        <a href="{{ route('tasks.edit', $task->id) }}">Edit</a>
        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline-block;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger waves-effect waves-light">Delete</button>
        </form>
      </li>
      @endforeach
    </ul>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>
  var taskList = document.getElementById('task-list');
  new Sortable(taskList, {
    animation: 150,
    onEnd: function(evt) {
      var order = [];
      taskList.querySelectorAll('li').forEach(function(item, index) {
        order.push({
          id: item.getAttribute('data-id'),
          priority: index + 1
        });
      });

      axios.post('{{ route("tasks.reorder") }}', {
          order: order
        }, {
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          }
        })
        .then(response => {
          console.log(response.data)
          order.forEach(function(taskOrder) {
            var item = document.querySelector('li[data-id="' + taskOrder.id + '"]');
            item.setAttribute('data-priority', taskOrder.priority);
            item.innerHTML = item.innerHTML.replace(/\(Priority: \d+\)/,
              `(Priority: ${taskOrder.priority})`);
          });

        }).catch(error => console.error('Error:', error));

    }
  });
  </script>
</div>
@endsection
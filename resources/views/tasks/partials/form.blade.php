<div class="form-group">
  <label for="name">Name</label>
  <input type="text" class="form-control" name="name" id="name" value="{{ old('title', $task->name ?? '') }}" required>
</div>
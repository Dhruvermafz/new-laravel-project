<!DOCTYPE html>
<html>

<head>
    <title>Task Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-5">

    <h1>📝 Task Manager</h1>

    <form method="POST" action="{{ route('tasks.store') }}" class="mb-4">
        @csrf
        <div class="mb-2">
            <input type="text" name="title" class="form-control" placeholder="Task title" required>
        </div>
        <div class="mb-2">
            <textarea name="description" class="form-control" placeholder="Description (optional)"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Task</button>
    </form>

    <ul class="list-group">
        @forelse ($tasks as $task)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <strong>{{ $task->title }}</strong><br>
                <small>{{ $task->description }}</small>
            </div>
            <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Delete</button>
            </form>
        </li>
        @empty
        <li class="list-group-item">No tasks yet!</li>
        @endforelse
    </ul>

</body>

</html>
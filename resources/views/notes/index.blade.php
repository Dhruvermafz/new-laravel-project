<!DOCTYPE html>
<html>

<head>
    <title>Notes App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-5">

    <h1 class="mb-4">📒 Notes App with Categories</h1>

    <form method="POST" action="{{ route('notes.store') }}" class="mb-4">
        @csrf
        <div class="mb-2">
            <input name="title" class="form-control" placeholder="Note title" required>
        </div>
        <div class="mb-2">
            <textarea name="body" class="form-control" placeholder="Note body (optional)"></textarea>
        </div>
        <div class="mb-2">
            <select name="category_id" class="form-select" required>
                <option value="">Choose category</option>
                @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary">Add Note</button>
    </form>

    <form method="GET" class="mb-4">
        <select name="category" onchange="this.form.submit()" class="form-select w-25">
            <option value="">All Categories</option>
            @foreach($categories as $cat)
            <option value="{{ $cat->id }}" {{ $selected == $cat->id ? 'selected' : '' }}>
                {{ $cat->name }}
            </option>
            @endforeach
        </select>
    </form>

    @foreach($notes as $note)
    <div class="card mb-3">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <h5>{{ $note->title }}</h5>
                <p>{{ $note->body }}</p>
                <small class="text-muted">Category: {{ $note->category->name }}</small>
            </div>
            <form method="POST" action="{{ route('notes.destroy', $note->id) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Delete</button>
            </form>
        </div>
    </div>
    @endforeach

</body>

</html>
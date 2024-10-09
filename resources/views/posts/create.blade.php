<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Post</title>
</head>
<body>
    <h1>Create a New Blog Post</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ old('title') }}" required>

        <label for="content">Content:</label>
        <textarea id="content" name="content" required>{{ old('content') }}</textarea>

        <button type="submit">Submit</button>
    </form>

    <a href="{{ route('posts.index') }}">Back to All Posts</a>
</body>
</html>
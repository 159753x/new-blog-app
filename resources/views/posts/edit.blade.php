<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
</head>
<body>
    <h1>Edit Blog Post</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required>

        <label for="content">Content:</label>
        <textarea id="content" name="content" required>{{ old('content', $post->content) }}</textarea>

        <button type="submit">Update</button>
    </form>

    <a href="{{ route('posts.index') }}">Back to All Posts</a>
</body>
</html>
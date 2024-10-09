<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
</head>
<body>
<x-app-layout>
    <div class="ml-4">
        <h1 class="text-xl font-semibold">{{ $post->title }}</h1>
        <br><br>
        <p>{{ $post->content }}</p>
        <br>
        <p>Posted by {{ $post->user->name }} on {{ $post->created_at->format('d M Y') }}</p>

        <br><br>
        <h2 class="text-xl font-semibold">Comments</h2>
        <br>
        
        @if ($post->comments->isEmpty())
            <p>No comments yet.</p>
        @else
            <ul>
        @foreach ($post->comments as $comment)
        <div class="comment border rounded ">
            <p class="w7">{{ $comment->comment }}</p>
            <small>By {{ $comment->user->name }} on {{ $comment->created_at }}</small>

            <br><br>

            <!-- Show Delete Button Only If Authorized -->
            @if (auth()->check() && (auth()->user()->id === $comment->user_id || auth()->user()->id === $post->user_id))
                {{-- <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display:inline;"> --}}
                <form action="{{ url('/comments/' . $comment->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-primary-button class="btn-red" type="submit" onclick="return confirm('Are you sure you want to delete this comment?');">Delete</x-primarybutton>
                </form>
            @endif
        </div>
        <br>
        @endforeach
            </ul>
        @endif
        
        <br><br>
        <h3>Add a Comment</h3>
        <form action="{{ url('/posts/' . $post->id . '/comments') }}" method="POST" class="mb-6">
            @csrf
            <textarea name="comment" rows="4" cols="35" placeholder="Write your comment here..." 
                    class="ml-3 border border-gray-300 rounded-lg p-4 focus:outline-none focus:ring focus:ring-indigo-300" required></textarea>
            <x-primary-button type="submit" class="mt-2 bg-indigo-600 text-black px-4 py-2 rounded hover:bg-indigo-700 transition duration-300">
                Post Comment
            </x-primary-button>
        </form>

        {{-- Edit and Delete Buttons --}}
        @if (auth()->check() && auth()->user()->id === $post->user_id)
            <div>
                <x-primary-button><a href="{{ route('posts.edit', $post->id) }}">Edit Post</a></x-primary-button>
                
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <x-primary-button type="submit" onclick="return confirm('Are you sure you want to delete this post?');">Delete Post</x-primary-button>
                </form>
            </div>
        @endif
        <br>
        <a class="text-cyan-800 underline" href="{{ route('posts.index') }}"> &#8592; Back to All Posts</a>
    </div>
</x-app-layout>
</body>
</html>

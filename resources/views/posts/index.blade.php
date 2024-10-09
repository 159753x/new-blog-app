<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
</head>
{{-- <body>
    <h1>All Blog Posts</h1>

    @if ($posts->isEmpty())
        <p>No posts available.</p>
    @else
        <ul>
            @foreach ($posts as $post)
                <li>
                    <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                    <p>Posted by {{ $post->user->name }} on {{ $post->created_at->format('d M Y') }}</p>
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('posts.create') }}">Create New Post</a>
</body> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
        <br>
        <a href="{{ route('posts.create') }}"> + Create New Post...</a>
    </x-slot>

@if ($posts->isEmpty())
    <p>No posts available.</p>
@else
<div class="container mx-auto py-8">
    {{-- <h1 class="text-4xl font-bold text-center mb-8">All Posts</h1> --}}
    
    <div class="grid gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
        <!-- Loop through the posts -->
        @foreach($posts as $post)
        <a href="{{ route('posts.show', $post->id) }}">
            <div class="bg-indigo-100 border border-indigo-300 rounded-lg shadow-md overflow-hidden p-6 transition-colors duration-300 hover:bg-indigo-200">
                <h2 class="text-2xl font-semibold mb-2 text-gray-800 font-serif">
                    <p class="text-blue-600 hover:text-blue-400">
                        {{ $post->title }}
                    </p>
                </h2>

                <!-- Edit and Delete Buttons -->
                {{-- @if (auth()->check() && auth()->user()->id === $post->user_id)
                    <div class="flex space-x-2">
                        <a href="{{ route('posts.edit', $post->id) }}">
                            <button class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition duration-300">Edit</button>
                        </a>

                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition duration-300">
                                Delete
                            </button>
                        </form>
                    </div>
                @endif --}}
                
                <p class="text-gray-600 text-sm mb-4">By {{ $post->user->name }} on {{ $post->created_at->format('F j, Y') }}</p>
                
                <p class="text-gray-700 mb-4">
                    {{ Str::limit($post->content, 100) }}
                </p>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endif
</x-app-layout>
</html> 
<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    @if ($posts && $posts->count())
        @foreach ($posts as $post)
            <article class="py-8 max-w-screen-md border-b border-gray-300">
                <a href="/posts/{{ $post->author->username }}" class="hover:underline">
                    <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h2>
                </a>
                <div>
                    By
                    <a class="hover:underline text-base text-gray-500"
                        href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a>
                    in
                    <a href="/categories/{{ $post->category->slug }}"
                        class="hover:underline text-base text-gray-500">{{ $post->category->name }}</a> |
                    {{ $post->created_at->diffForHumans() }}
                </div>
                <p class="my-4 font-light">{{ Str::limit($post['body'], 150) }}</p>
                <a href="/posts/{{ $post['slug'] }}" class="font-medium text-blue-500 hover:underline">Read More
                    &raquo;</a>
            </article>
        @endforeach
    @else
        <p class="text-center">No posts available.</p>
    @endif
</x-layout>

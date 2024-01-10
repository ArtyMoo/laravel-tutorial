@extends('components.layout')
@section('content')
    <x-settings heading="Manage posts">
        <div class="min-w-full bg-white shadow-md rounded-lg">
            <table class="min-w-full leading-normal">
                <thead>
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Author</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"> </th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"> </th>
                </tr>
                </thead>
                <tbody class="text-gray-900">
                @foreach($posts as $post)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
    {{--                            <div class="flex-shrink-0 h-10 w-10">--}}
    {{--                                <img class="h-10 w-10 rounded-full" src="https://placekitten.com/100/100" alt="Avatar">--}}
    {{--                            </div>--}}
                                <div class="ml-4">
                                    <a class="text-sm font-medium" href="/{{ $post->slug }}">
                                        {{ $post->title }}
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap"><span class="border pt-1 pb-1 pl-3 pr-3 rounded-xl border-green-200 bg-green-100 text-green-900">Published</span></td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $post->author->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="/admin/{{ $post->id }}/edit">
                                <span class="text-blue-500 hover:underline cursor-pointer">Edit</span>
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <form id="delete-post" action="/admin/{{ $post->id }}/delete" method="post">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="text-red-500 hover:underline cursor-pointer">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </x-settings>
@endsection

@extends('components.layout')
@section('content')
    <x-settings heading="Edit post">
        <form action="/admin/{{ $post->id }}/edit" method="post" enctype="multipart/form-data">
            @csrf
            <x-form.input label="title" name="title" type="text" value="{{ $post->title }}"></x-form.input>
            <x-form.input label="slug" name="slug" type="text" value="{{ $post->slug }}"></x-form.input>
            <x-form.textarea label="Excerpt" name="excerpt" cols="50" rows="4" value="{{ $post->excerpt }}"></x-form.textarea>
            <x-form.select label="category" name="category_id" current="{{ $post->category->name }}">
                @foreach (\App\Models\Category::all() as $category)
                    <option
                        {{ $category->name === $post->category->name ? 'selected' : '' }}
                        value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}
                    >{{ ucwords($category->name) }}</option>
                @endforeach
            </x-form.select>
            <x-form.textarea label="Edit the article" name="body" cols="50" rows="4" value="{{ $post->body }}"></x-form.textarea>
            <x-form.submit name="Save changes"></x-form.submit>
            <a href="{{ url()->previous() }}" class="text-red-900">Cancel</a>
        </form>
    </x-settings>
@endsection

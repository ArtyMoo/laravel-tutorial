@extends('components.layout')
@section('content')

    <x-settings heading="Create a new post!">
        <form action="/admin/posts/store" method="post" enctype="multipart/form-data">
            @csrf
            <x-form.input label="title" name="title" type="text"></x-form.input>
            <x-form.select label="category" name="category_id">
                <option disabled selected value>-- Select an option --</option>
                @foreach (\App\Models\Category::all() as $category)
                    <option
                        value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}
                    >{{ ucwords($category->name) }}</option>
                @endforeach
            </x-form.select>
            <x-form.input label="thumbnail" name="thumbnail" type="file"></x-form.input>
            <x-form.input label="slug" name="slug"></x-form.input>
            <x-form.input label="excerpt" name="excerpt"></x-form.input>
            <x-form.textarea label="Start writing here" name="body" cols="50" rows="4"></x-form.textarea>
            <x-form.submit name="Create"></x-form.submit>
        </form>
    </x-settings>

@endsection

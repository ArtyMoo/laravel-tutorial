@extends('components.layout')
@section('content')
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-200 p-10 rounded-xl">
            <h1 class="text-center font-bold text-xl">Log into your account</h1>
            <form class="mt-10" method="POST" action="/login">
                @csrf
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="username"
                    >Username
                    </label>

                    <input class="borer border-gray-400 p-2 w-full"
                           type="text"
                           name="username"
                           id="username"
                           value="{{ old('username')  }}"
                           required
                    />
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="password"
                    >Password
                    </label>

                    <input class="borer border-gray-400 p-2 w-full"
                           type="password"
                           name="password"
                           id="password"
                           required
                    />
                </div>
                <div class="mb-6">
                    @foreach($errors->all() as $error)
                        <p class="text-red-500 text-xs mt-1">{{ $error }}</p>
                    @endforeach
                </div>
                <div class="mb-6">
                    <button type="submit" class="bg-blue-700 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Login
                    </button>
                </div>
            </form>
        </main>
    </section>
@endsection()

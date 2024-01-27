<x-layout>
    <h2 class="mb-3 text-4xl font-extrabold dark:text-white">Login</h2>
    <form action="{{route("auth.authenticate")}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email:</label>
            <input type="text" id="email" class="@error("email") input-error @else form-input @enderror" name="email" value="{{old("email")}}">
            @error("email")
            <p class="message_error">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password:</label>
            <input type="password" id="password" class="@error("password") input-error @else form-input @enderror" name="password" value="{{old("password")}}">
            @error("password")
            <p class="message_error">{{$message}}</p>
            @enderror
        </div>
        <div class="flex items-center mb-5">
            <input id="default-checkbox" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="remember">
            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Signin</button>
    </form>
</x-layout>

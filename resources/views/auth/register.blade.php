<x-layout>
    <h2 class="mb-3 text-4xl font-extrabold dark:text-white">Register</h2>
    <form action="{{route("auth.store")}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name:</label>
            <input type="text" id="name" class="@error("name") input-error @else form-input @enderror" name="name" value="{{old("name")}}">
            @error("name")
            <p class="message_error">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email:</label>
            <input type="text" id="email" class="@error("email") input-error @else form-input @enderror" name="email" value="{{old("email")}}">
            @error("email")
            <p class="message_error">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Image:</label>
            <input class="@error("image") form-input_file_error @else form-input_file @enderror" id="file_input" type="file" name="image">
            @error("image")
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
        <div class="mb-5">
            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password Confirmation:</label>
            <input type="password" id="password_confirmation" class="form-input" name="password_confirmation" value="{{old("password_confirmation")}}">
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Signup</button>
    </form>
</x-layout>

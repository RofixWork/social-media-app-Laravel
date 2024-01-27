<x-layout>
    <h2 class="mb-3 text-4xl font-extrabold dark:text-white">Create a new Post</h2>
    <form action="{{route("posts.store")}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-5">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title:</label>
            <input type="text" id="title" class="@error("title") input-error @else form-input @enderror" name="title" value="{{old("title")}}">
            @error("title")
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
            <label for="desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description:</label>
            <textarea id="desc" rows="4" class="@error("description") input-error @else form-textarea @enderror" name="description">{{old("description")}}</textarea>
            @error("description")
            <p class="message_error">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">URL:</label>
            <input type="text" id="url" class="@error("url") input-error @else form-input @enderror" placeholder="https://example.com" name="url" value="{{old("url")}}">
            @error("url")
            <p class="message_error">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags:</label>
            <input type="text" id="title" class="@error("tags") input-error @else form-input @enderror" placeholder="react, javascript, html..." name="tags" value="{{old("tags")}}">
            @error("tags")
                <p class="message_error">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="mb-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
    </form>
</x-layout>

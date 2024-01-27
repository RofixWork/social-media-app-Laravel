<x-layout>
{{--    modals--}}
    @foreach($posts as $post)
        <x-modal :id="$post->id" />
    @endforeach
{{--    modals--}}
    <h2 class="mb-3 text-sm text-gray-400">{{count($posts)}} Posts</h2>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-3 py-3">
                    Created_at
                </th>
                <th scope="col" class="px-6 py-3">
                    Tags
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-xs text-gray-900 dark:text-white">
                        {{$post->title}}
                    </th>
                    <td class="px-3 text-xs py-4">
                        {{$post->created_at->format('Y-m-d')}}
                    </td>
                    <td class="px-6 py-4 text-xs">
                        {{$post->tags}}
                    </td>
                    <td class="px-6 py-4 flex space-x-2">
                        <a href="{{route("posts.show", $post->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Show</a>
                        <a href="{{route("posts.edit", $post->id)}}" class="font-medium text-purple-600 dark:text-purple-500 hover:underline">Edit</a>
                        <button type="button" data-modal-target="popup-modal-{{$post->id}}" data-modal-toggle="popup-modal-{{$post->id}}" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</x-layout>

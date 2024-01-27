@props(["post", "desc"])
<x-modal :id="$post->id"/>
<div class="mb-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
{{--    @dd($post)--}}
    <div class="py-2 px-3 flex items-center justify-between">
        <a href="{{route("users.profile", $post->user_id)}}" class="flex items-center gap-x-[5px]">
            <img class="w-10 h-10 rounded-full" src="{{asset("storage/{$post->user->image}")}}" alt="Rounded avatar">
            <div class="">
                <h3 class="text-sm">{{$post->user->name}}</h3>
                <h4 class="text-xs text-gray-400">{{$post->created_at->format("d-m-Y h:i a")}}</h4>
            </div>
        </a>

{{--        actions (delete and update post)--}}
        @if($post->user_id === auth()->id())
            <div class="">
                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown-{{$post->id}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px- text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdown-{{$post->id}}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="{{route("posts.edit", $post->id)}}" class="flex items-center space-x-1 px-2 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                                <span>Update</span>
                            </a>
                        </li>
                        <li>
                            <button data-modal-target="popup-modal-{{$post->id}}" data-modal-toggle="popup-modal-{{$post->id}}" class="w-full flex items-center space-x-1 px-2 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                                <span>Delete</span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        @endif
    </div>
{{--post content --}}
    <a href="{{route("posts.show", $post->id)}}">
        <img class="w-full"  src="{{asset("storage/{$post->image}")}}" alt="" />
    </a>
    <div class="py-3 px-3">
        <a href="{{route("posts.show", $post->id)}}">
            <h5 class="capitalize mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{$post->title}}</h5>
        </a>
        <p class="mb-3 font-normal text-sm text-gray-700 dark:text-gray-400">
            @if($desc === "short")
                @php
                    $description = substr($post->description, 0, 100);
                @endphp
                {{strlen($post->description) > 100 ? $description . "..." : $post->description}}
            @elseif($desc === "long")
                {{$post->description}}
            @endif
        </p>
        @unless(is_null($post->url))
            <div class="mb-5">
                <span>Link:</span>
                <a class="font-medium text-xs text-blue-600 dark:text-blue-500 hover:underline" target="_blank" href="{{$post->url}}">{{$post->url}}</a>
            </div>
        @endunless
        <div class="flex space-x-1">
            @foreach(explode(",", $post->tags) as $tag)
                <a class="font-medium text-xs text-blue-600 dark:text-blue-500 hover:underline" href="">#{{trim($tag)}}</a>
            @endforeach
        </div>
    </div>
    {{--    show all comment--}}
    <div class="max-h-[200px] overflow-y-auto">
        @foreach($post->comments as $comment)
           <x-comment :comment="$comment" />
        @endforeach
    </div>
    {{--    show all comment--}}
{{--    comment section--}}
    <div>
        <x-commentInput :postId="$post->id" />
    </div>
</div>

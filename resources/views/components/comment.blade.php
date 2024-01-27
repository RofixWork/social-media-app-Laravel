@props(['comment'])
<x-commentUpdate :comment="$comment" />
<div class="p-3">
    <div class="flex items-center justify-between">
        <a href="{{route("users.profile", $comment->user_id)}}" class="flex items-center space-x-2">
            <img class="w-8 h-8 rounded-full" src="{{asset("/storage/{$comment->user->image}")}}" alt="Rounded avatar">
            <p class="font-semibold text-sm text-gray-900 dark:text-white">{{$comment->user->name}}</p>
            <p class="text-sm text-gray-500 dark:text-gray-400">{{$comment->comment}}</p>
        </a>
        <p class="text-xs text-gray-500 dark:text-gray-400">{{$comment->created_at->format("d/m/y h:i a")}}</p>
    </div>
    @if($comment->user->id === auth()->id())
        <div class="flex items-center justify-end space-x-3 mt-1">
            <button data-modal-target="crud-modal-{{$comment->id}}" data-modal-toggle="crud-modal-{{$comment->id}}" class="text-xs text-gray-500 dark:text-gray-400">Edit</button>
            <form  action="{{route("comments.destroy", $comment->id)}}" method="post">
                @csrf
                @method("DELETE")
                <button type="submit" class="text-xs text-red-500 dark:text-red-400">Delete</button>
            </form>
        </div>
    @endif
</div>

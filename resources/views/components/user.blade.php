@props(['user'])
<div class="mt-4 flex items-center space-x-2">
    <div >
        <img class="w-[80px] h-[80px] rounded-full ring-2 ring-gray-300 dark:ring-gray-500" src="{{asset("storage/" . $user->image)}}" alt="">
    </div>
    <div>
        <h3 class="text-xl font-bold dark:text-white">{{$user->name}}</h3>
        <h4 class="text-sm text-gray-700 font-normal dark:text-white">{{$user->email}}</h4>
    </div>
</div>
<hr class="h-1 mx-auto my-4 bg-gray-200 border-0 rounded md:my-10 dark:bg-gray-700">

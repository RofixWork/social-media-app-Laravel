<x-layout>
{{--    user info (name, email, image)--}}
    <x-user :user="$user" />
        {{--        user posts --}}
    <div>
        <x-posts :posts="$posts" />
    </div>
</x-layout>

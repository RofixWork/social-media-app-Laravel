<x-layout>
    @session("message")
         <x-alert :message="session()->get('message')" />
    @endsession
    <x-posts :posts="$posts" />
</x-layout>

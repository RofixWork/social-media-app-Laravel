<x-layout>
{{--    alert--}}
    @session("message")
        <x-alert :message="session()->get('message')" />
    @endsession
    <x-post :post="$post" desc="long" />
</x-layout>

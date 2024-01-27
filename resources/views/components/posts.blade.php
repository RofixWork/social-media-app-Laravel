@foreach($posts as $post)
    <x-post :post="$post" desc="short" />
@endforeach

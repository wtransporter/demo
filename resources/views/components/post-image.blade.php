@props(['post'])

<div {{ $attributes->merge(['class' => 'flex-1 flex justify-center w-full overflow-hidden rounded-xl']) }}>
    <img class="max-h-96 object-cover bg-center transition w-full ease-in-out duration-500 transform hover:scale-110"
        src="{{ asset('storage/images/' . $post->id . '/' . $post->image) }}"
        alt="{{ $post->title }}">
</div>
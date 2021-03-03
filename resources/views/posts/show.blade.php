<div class="w-full text-gray-600">
    @foreach ($post->steps as $step)
        <div class="flex items-center w-full py-4">
            <img class="h-40 w-full object-cover bg-center rounded-md" src="images/potatoe.jpeg" alt="Image">
            <p class="px-4">
                {!! $step->body !!}
            </p>
        </div>
    @endforeach
</div>
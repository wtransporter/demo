<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;

class CreatePost extends Component
{
    use WithFileUploads;

    public $description;
    public $body;
    public $title;
    public $category_id;
    public $image;
    public $postSteps = [];
    public $post = null;
    public bool $createing = true;

    protected $rules = [
        'category_id' => 'required|exists:categories,id',
        'title' => 'required',
        'description' => 'required|min:10',
        'body' => 'sometimes|required|min:10',
        'image' => 'sometimes|required|image',
    ];
    
    protected $messages = [
        'category_id.required' => 'Morate izabrati kategoriju.',
        'title.required' => 'Polje naslov je obavezno.',
        'description.required' => 'Polje opis je obavezno.',
        'body.required' => 'Polje tekst je obavezno.',
    ];

    protected $validationAttributes = [
        'body' => 'text'
    ];

    public function mount()
    {
        $this->postSteps = [
            ['body' => '', 'image' => '']
        ];
    }
    
    public function addStep()
    {
        $this->postSteps[] = ['body' => '', 'image' => ''];
    }

    public function render()
    {
        return view('livewire.create-post');
    }

    public function update($postId)
    {
        $post = Post::findOrFail($postId);

        $attributes = $this->validate();

        $imageHashName = $this->image->hashName();

        $attributes = array_merge($attributes, [
            'user_id' => Auth()->id(),
            'image' => $imageHashName
        ]);

        $post->update($attributes);
    }

    public function removeStep($index)
    {
        unset($this->postSteps[$index]);
        $this->postSteps = array_values($this->postSteps);
    }

    public function save()
    {
        $attributes = $this->validate();
        
        $imageHashName = $this->image->hashName();

        $attributes = array_merge($attributes, [
                'user_id' => Auth()->id(),
                'image' => $imageHashName
            ]);

        $post = Post::create($attributes);

        $this->storeImage($post, $this->image, $imageHashName);
 
        foreach ($this->postSteps as $step) {
            $stepAttributes = [];

            $imageHashName = $step['image'] ? $step['image']->hashName() : '';

            $stepAttributes = array_merge($stepAttributes, [
                'body' => $step['body'],
                'image' => $imageHashName
            ]);

            $post->steps()->create($stepAttributes);

            if ($step['image']) {
                $this->storeImage($post, $step['image'], $imageHashName);
            }
        }
        
        $this->reset();
        session()->flash('message', 'Recept je uspešno dodat.');
    }

    public function storeImage($post, $image, $imageHashName)
    {
        $image->store('public/images/' . $post->id);

        if (!File::exists(storage_path('app/public/images/' . $post->id))) {
            File::makeDirectory(storage_path('app/public/images/' . $post->id), 0777);
        }

        if (!File::exists(storage_path('app/public/images/thumbs/' . $post->id))) {
            File::makeDirectory(storage_path('app/public/images/thumbs/' . $post->id), 0777);
        }
        $manager = new ImageManager();
        $image = $manager->make('storage/images/' . $post->id . '/' . $imageHashName)
            ->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            });

        $image->save('storage/images/thumbs/' . $post->id . '/' . $imageHashName);
    }
}

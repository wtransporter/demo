<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Step;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;

class CreatePost extends Component
{
    use WithFileUploads;

    public $modelId;
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
        if ($this->modelId) {
            $this->loadModel();
            $this->createing = false;
        } else {
            $this->postSteps = [
                ['body' => '', 'image' => '']
            ];
        }
    }
    
    public function addStep()
    {
        $this->postSteps[] = ['body' => '', 'image' => ''];
    }

    public function render()
    {
        return view('livewire.create-post');
    }

    public function updateForm($id)
    {
        $this->modelId = $id;
    }

    public function loadModel()
    {
        $data = Post::find($this->modelId);

        $this->category_id = $data->category_id;
        $this->title = $data->title;
        $this->description = $data->description;
        $this->body = $data->body;
        $this->image = $data->image;

        foreach ($data->steps as $step) {
            $this->postSteps[] = [
                'id' => $step->id,
                'post_id' => $this->modelId,
                'body' => $step->body,
                'image' => $step->image
            ];
        }
    }

    public function modelData()
    {
        return [
            'category_id' => $this->category_id,
            'title' => $this->title,
            'description' => $this->description,
            'body' => $this->body,
            'image' => $this->image
        ];
    }

    public function update()
    {
        $this->validate();

        $imageHashName = is_string($this->image) ? $this->image : $this->image->hashName();

        $attributes = array_merge($this->modelData(), [
            'user_id' => Auth()->id(),
            'image' => $imageHashName
        ]);

        $post = Post::find($this->modelId);
        $post->update($attributes);

        if ($this->image !== $post->image) {
            $this->storeImage($post, $this->image, $imageHashName);
        }

        foreach ($this->postSteps as $step) {
            $post->steps()->where('id', $step['id'])->update($step);
        }
        session()->flash('message', 'Recept je uspešno azuriran.');
    }

    public function removeStep($index)
    {
        $stepId = $this->postSteps[$index]['id'];
        unset($this->postSteps[$index]);
        $this->postSteps = array_values($this->postSteps);
        Step::find($stepId)->delete();
    }

    public function save()
    {
        $attributes = $this->validate();
        
        $imageHashName = empty($this->image) ? '' : $this->image->hashName();

        $attributes = array_merge($attributes, [
                'user_id' => Auth()->id(),
                'image' => $imageHashName
            ]);

        $post = Post::create($attributes);

        if (!empty($this->image)) {
            $this->storeImage($post, $this->image, $imageHashName);
        }
 
        $this->createStep($post);
        
        $this->reset();
        session()->flash('message', 'Recept je uspešno dodat.');
    }

    public function createStep($post)
    {
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

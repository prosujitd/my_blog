<?php

namespace App\Http\Livewire;

use App\Http\Traits\UploadFileTrait;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPost extends Component
{
    use UploadFileTrait;
    use WithFileUploads;

    public $categories;
    public $user_id;
    public $post_id;
    public $slug;

    public $title;
    public $content;
    public $category_id;
    public $status;
    public $thumbnail;
    public $oldImage;
    public $tags;

    public $model;

    public function updateMyData()
    {
        $this->model->title = $this->title;

        $this->model->content = $this->content;
        $this->model->category_id = $this->category_id;

        $this->model->tags = $this->tags;
        $this->model->status = $this->status;
        $this->model->user_id = $this->user_id;

        $tags = explode(",", $this->tags);
        $this->model->save();
        $this->model->retag($tags);

//        dd($this->model);
    }

    public function resetThumbnail()
    {
//        $e.preventDefault();
        $this->thumbnail = '';

//        die();
    }

    public function mount($post_id)
    {
        $this->post_id = $post_id;
        $this->model = Post::find($post_id);
        $this->oldImage = $this->model->thumbnail;
        $this->categories = Category::all();

        $this->title = $this->model->title;
        $this->user_id = $this->model->user_id;
        $this->content = $this->model->content;
        $this->category_id = $this->model->category_id;
        $this->status = $this->model->status;

        foreach ($this->model->tags as $tag) {
            $this->tags = $this->tags . ',' . $tag->name;
        }
        $this->tags = trim($this->tags, ',');
//        dd($this->model);

//        $this->thumbnail = $this->post->thumbnail;
    }


    public function render()
    {

        return view('livewire.edit-post', ['thumbnail']);
    }


    protected $rules = [
        'title' => 'required|string|max:250',
        'content' => 'required|string',
        'category_id' => 'required|numeric|min:0',
        'status' => 'required|numeric|in:0,1',
        'tags' => 'required|string|max:250',
//        'thumbnail' => 'image|max:1024',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedThumbnail($propertyName)
    {
        $this->validate([
            'thumbnail' => 'required|image|max:1024'
        ]);
    }


    public function submit()
    {
        $this->validate();

        // Updating with new image and deleting old if exist
        $this->model->thumbnail = $this->uploadUsingStorage($this->thumbnail,'public/thumbnail',$this->model->thumbnail);
        $this->oldImage = $this->model->thumbnail;
        $this->thumbnail = '';

//        if ($this->thumbnail) {
//            $validatedData['thumbnail'] = $this->thumbnail->store('public/thumbnail');
////            dd($validatedData['thumbnail']);
//            $oldTableImage = $this->model->thumbnail;
//            $this->oldImage = $validatedData['thumbnail'];
//            $this->thumbnail = '';
//            $this->model->thumbnail = $validatedData['thumbnail'];
//
//            Storage::delete($oldTableImage);
//        }
        $this->updateMyData();

        $result = $this->model->save();

        if ($result) {
            session()->flash('success', 'Post Updated successfully');

        } else {
            session()->flash('fail', 'Unable to update your post');
        }
    }
}

<?php

namespace App\Http\Livewire;

use App\Http\Traits\UploadFileTrait;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;
    use UploadFileTrait;



    public  $categories;
    public  $user_id;
    public  $slug;

    public  $title;
    public  $content;
    public  $category_id;
    public  $status;
    public  $thumbnail;
    public  $tags;

    public $allPosts;


    protected $rules =[
        'title' => 'required|string|max:250',
        'content' => 'required|string',
        'category_id' => 'required|numeric|min:0',
        'status' => 'required|numeric|in:0,1',
        'tags' => 'required|string|max:250',
        'thumbnail' => 'nullable|image|max:1024',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function updatedThumbnail($propertyName){
        $this->validate([
            'thumbnail' => 'required|image|max:1024'
        ]);
    }


    public function mount($allPosts){
//        dd($allPosts);
        $this->allPosts = $allPosts;
    }


    public function render()
    {

        $this->categories = Category::orderBy('name','asc')->get();
        return view('livewire.create-post');
    }

    public function createPost(){
        return redirect()->route('backend.post.create');
    }


    public function submit(){

        $validatedData = $this->validate();

        $validatedData['thumbnail'] = $this->uploadUsingStorage($this->thumbnail,'public/thumbnail');
        $validatedData['user_id'] = auth()->user()->id;

        $tags = explode(",",$this->tags);
        $post = Post::create($validatedData);
        $post->tag($tags);
        if($post){
            session()->flash('success','Post added successfully');
            $this->reset();
            $this->content='';
        }else{
            session()->flash('fail','Unable to add your post');
        }
    }


}

<?php

namespace App\Http\Livewire;

use App\Http\Traits\UploadFileTrait;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPost extends Component
{
    use WithPagination;
    use UploadFileTrait;

    public $deleteId = '';
    public $search;
    protected $posts = '';
    public $allPosts = '';




    public function render()
    {
        $this->allPosts = Post::all();
        $posts = $this->posts = Post::where('title','like','%'.$this->search.'%')
            ->orWhere('tags','like','%'.$this->search.'%')
            ->simplePaginate(3);
        return view('livewire.index-post',['posts'=>$this->posts]);
    }


    public function deleteId($id)
    {

        $this->deleteId = $id;
    }


    public function delete()
    {
        $p = Post::find($this->deleteId);
        $this->deleteUsingStorage($p->thumbnail);
        $result= $p->delete();

        if($result){
            session()->flash('success','Post deleted successfully');
            $this->reset();
            $this->content='';
        }else{
            session()->flash('fail','Unable to delete your post');
        }

    }

}

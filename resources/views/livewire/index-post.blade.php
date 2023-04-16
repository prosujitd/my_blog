<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Posts</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Post</a></li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card">
                        <div class="card-header">

                            <p style="display: flex;float: right">
                                <input type="search" wire:model="search" class="form-control float-end mx-2"
                                       style="width: 400px">

                                <i type="button" data-toggle="modal" data-target="#createModal"

                                   class="btn btn-primary float-end">Create Post</i>

                            </p>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <table class="table">
                            <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Thumbnail</th>
                                <th>Tags</th>
                                <th>Author</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $p)
                                <tr>
                                    <td>{{$p->id}}</td>
                                    <td>{{$p->title}}</td>
                                    <td>{{$p->category->name}}</td>
                                    <td>
                                        @if($p->thumbnail)
                                            <img style="width: 50px"
                                                 src="{{\Illuminate\Support\Facades\Storage::url($p->thumbnail)}}"></td>
                                    @else
                                        <span>NA</span>
                                    @endif
                                    <td>
                                        @foreach($p->tags as $tag)
                                            <span class="alert-default-primary">{{$tag->name}}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        {{$p->user->name}}
                                    </td>
                                    <td>
                                        <a href="{{route('backend.post.edit',$p->id)}}">

                                            <i style="color: green"
                                               class="fas fa-edit"></i></a>
                                        |


                                        <i type="button" data-toggle="modal" data-target="#deleteModal"
                                           wire:click="deleteId({{ $p->id }})" style="color: red"
                                           class="fas fa-trash"></i>
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>


                    </div>

                    <div class="form-group">
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @elseif(session()->has('fail'))
                            <div class="alert alert-warning">
                                {{session('fail')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div>{{$posts->links()}}</div>

                {{--        Modal Box Create   --}}
                <div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            @livewire('create-post',['allPosts'=>$allPosts])


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close
                                </button>

                            </div>
                        </div>
                    </div>
                </div>


                {{--        Modal Box Delete   --}}
                <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true close-btn">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure want to delete?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close
                                </button>
                                <button type="button" wire:click.prevent="delete()" class="btn btn-danger close-modal"
                                        data-dismiss="modal">Yes, Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>

@section('my-style')
    @livewireStyles
@endsection

@section('my-script')
    @livewireScripts
@endsection

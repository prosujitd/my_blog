<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Posts</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Post</a></li>
                        <li class="breadcrumb-item active">Edit</li>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Post</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="get" role="form" wire:submit.prevent="submit">
                            <div class="card-body">
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

                                <div class="form-group">
                                    <label for="title">Title*</label>
                                    <input wire:model="title" type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror" id="title"
                                           placeholder="Enter title of your post">
                                    @error('title') <span class="error-message"> {{$message}}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="content">Content*</label>
                                    <textarea wire:model="content" name="content" rows="10"
                                              class="form-control ckeditor @error('content') is-invalid @enderror" id="content"
                                              placeholder="Enter Content of your post"></textarea>
                                    @error('content') <span class="error-message"> {{$message}}</span> @enderror

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Thumbnail</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input wire:model="thumbnail" type="file" name="thumbnail"
                                                   class="@error('thumbnail') is-invalid @enderror"
                                                   id="thumbnail">
                                            {{--                                            <label class="custom-file-label" for="thumbnail">Choose file</label><input/>--}}
                                        </div>
                                        <div class="input-group-append">
                                            <button type="reset" wire:click="resetThumbnail" class="input-group-text" id="">Reset Thumbnail</button>
                                        </div>
                                    </div>
                                    @error('thumbnail') <span class="error-message"> {{$message}}</span> @enderror
                                    <div class="input-group align-items-center">



                                        @if(isset($oldImage) && !empty($oldImage))
                                                <span>Old Image:</span>
                                            <img   class="img-preview"
                                                   src="{{\Illuminate\Support\Facades\Storage::url($oldImage)}}">
                                        @endif

                                            @if(isset($thumbnail) && !empty($thumbnail))
                                                <span>New Image:</span> <img  class="img-preview" src="{{$thumbnail->temporaryUrl()}}">
                                            @endif

                                    </div>

                                </div>


                                <div class="form-group">
                                    <label for="category_id">Categories*</label>
                                    <select required wire:model="category_id" id="category_id"
                                            class="form-control @error('category_id') is-invalid @enderror"
                                            name="category_id">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id') <span class="error-message"> {{$message}}</span> @enderror
                                </div>


                                <div class="form-group">

                                    <label for="tags">Tags*</label>
                                    <input wire:model="tags" type="text" name="tags" value="123456"
                                           class="form-control  @error('tags') is-invalid @enderror"
                                           id="tags"
                                           placeholder="Enter relevant tags of your post separated by commas(,)">
                                    @error('tags') <span class="error-message"> {{$message}}</span> @enderror
                                </div>


                                <div class="form-group">
                                    <label for="status">Status*</label>
                                    <select wire:model="status" id="status"
                                            class="form-control  @error('status') is-invalid @enderror" name="status">
                                        <option value="">Select Status</option>
                                        <option value="1">Display</option>
                                        <option value="0">Hidden</option>
                                    </select>
                                    @error('status') <span class="error-message"> {{$message}}</span> @enderror

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
                            <!-- /.card-body -->

                            <div class="card-footer">

                                <input type="submit" class="btn btn-primary"/>

                            </div>


                        </form>
                    </div>

                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>

@section('my-script')
    @livewireScripts
@endsection

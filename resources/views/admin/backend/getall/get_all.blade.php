@extends('admin.admin_master')
@section('admin')
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<div class="content">
    <div class="container-xxl">

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        <div class="tab-pane pt-4" id="profile_setting" role="tabpanel" aria-labelledby="setting_tab">
                            <div class="row">
                                <div class="col-lg-6 col-xl-6">
                                    <div class="card border mb-0">

                                        <div class="card-header">
                                            <h4 class="card-title mb-0">GET ALL</h4>
                                        </div>

                                        <form action="{{ route('update.getall') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $getall->id }}">

                                            <div class="card-body">

                                                <div class="form-group mb-3 row">
                                                    <label class="form-label">Title</label>
                                                    <div class="col-lg-12 col-xl-12">
                                                        <input class="form-control" type="text" name="title" value="{{ $getall->title }}">
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3 row">
                                                    <label class="form-label">Description</label>
                                                    <div class="col-lg-12 col-xl-12">
                                                        <textarea name="description" class="form-control" rows="5">{{ $getall->description }}</textarea>
                                                    </div>
                                                </div>
                                                
                                                 <div class="form-group mb-3 row">
                                                    <label class="form-label"> tab Title</label>
                                                    <div class="col-lg-12 col-xl-12">
                                                        <input class="form-control" type="text" name="title" value="{{ $getall->tab_title }}">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label class="form-label"> tab Description</label>
                                                    <div class="col-lg-12 col-xl-12">
                                                        <textarea name="description" class="form-control" rows="5">{{ $getall->tab_description }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                        <label class="form-label">icon</label>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <input class="form-control" type="text" name="icon" value="{{$getall->icon}}">
                                                        </div>
                                                </div>


                                                <div class="form-group mb-3 row">
                                                    <label class="form-label">Image</label>
                                                    <div class="col-lg-12 col-xl-12">
                                                        <input class="form-control" type="file" name="image" id="image">
                                                    </div>
                                                </div>

                                                @if($getall->image)
                                                <div class="form-group mb-3 row">
                                                    <div class="col-lg-12 col-xl-12">
                                                        <img id="showImage" src="{{ asset($getall->image) }}" class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image profile">
                                                    </div>
                                                </div>
                                               

                                                @endif
                                                 <h5 class="mt-4">Tabs</h5>
                                            


                                                <button type="submit" class="btn btn-primary">SAVE CHANGES</button>

                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>

@endsection

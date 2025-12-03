@extends('admin.admin_master')
@section('admin')
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<div class="content">


<div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
           
        </div>
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        

                           
                           

                           

                            <div class="tab-pane pt-4" id="profile_setting" role="tabpanel" aria-labelledby="setting_tab">
                                <div class="row">

                                    <div class="row">
                                        <div class="col-lg-6 col-xl-6">
                                            <div class="card border mb-0">

                                                <div class="card-header">
                                                    <div class="row align-items-center">
                                                        <div class="col">                      
                                                            <h4 class="card-title mb-0">EDIT SLIDER</h4>                      
                                                        </div><!--end col-->                                                       
                                                    </div>
                                                </div>
                                                <form action="{{route('update.slider')}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$slider->id}}">

                                                <div class="card-body">
                                                    <div class="form-group mb-3 row">
                                                        <label class="form-label"> title</label>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <input class="form-control" type="text" name="title" value="{{$slider->title}}" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label class="form-label"> link</label>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <input class="form-control" type="text" name="link"  value="{{$slider->link}}">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group mb-3 row">
                                                        <label class="form-label"> description</label>
                                                        <div class="col-lg-12 col-xl-12">
                                                            <textarea name="description" class="form-control"> value="{{$slider->description}}"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label class="form-label"> slider Photo</label>
                                                        
                                                        <input class="form-control" type="file" name="image" id="image">
                                                        
                                                    </div>

                                                   
                                                    <div class="form-group mb-3 row">
                                                        <label class="form-label"> </label>
                                                    
                                                        <div class="col-lg-12 col-xl-12">
                                                            <img  id="showImage" src="{{asset($slider->image)}}" class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image profile">

                                                        </div>
                                                    </div>
                                                     <button type="submit" class="btn btn-primary">SAVE CHANGES</button>


</form>

                                                        </div><!--end card-body-->
                                                    </div>
                                                </div>
         </div>
        </div>

                                            </div>
                                        </div>
                                    </div> <!-- end education -->

                            </div>
                        </div>
                    </div>
                </div>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#image').change(function(e){
                    var reader=new FileReader();
                    reader.onload=function(e){
                        $('#showImage').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                })
            })

        </script>
        @endsection
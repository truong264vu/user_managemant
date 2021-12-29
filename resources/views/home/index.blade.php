@extends('layout.index')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid ">
      <div class="collapse navbar-collapse  d-flex justify-content-center" id="navbarNav">
        <ul class="navbar-nav">

        <ul class="nav nav-tabs d-flex justify-content-center  " id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-page"  role="tab" aria-controls="profile" aria-selected="false">Home</a>      
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="" id="admin-tab" data-bs-toggle="tab" data-bs-target="#admin-page"  role="tab" aria-controls="profile" aria-selected="false">Admin Page</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link " id="image-tab" data-bs-toggle="tab" data-bs-target="#image-page"  role="tab" aria-controls="profile" aria-selected="false">Image</a>
            </li>
        </ul>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img width="20px" height="20px" src="{{asset(auth()->user()->avatar_url)}}" alt="">
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <form method="post" enctype="multipart/form-data" action="{{route('user.update_avatar')}}">  
                @csrf
               <li><input type="file" name="image" id="image"></li>
               <li class="preview-upload mt-2 mb-2">
                     <img class="d-none" width="100px" height="100px" id='imgPreview'/>
                </li>
               <li><input class="d-none" type="submit" id="update-avatar" value="Update"></li>
            </form>
            
            </ul>
        </li>
          
        </ul>
      </div>
    </div>
</nav>

<div class="tab-content mt-5" id="myTabContent">
    <div class="tab-pane fade show active" id="home-page" role="tabpanel" aria-labelledby="home-tab">@include('home.home_page')</div>
    <div class="tab-pane fade" id="admin-page" role="tabpanel" aria-labelledby="profile-tab">@include('home.admin_page')</div>
    <div class="tab-pane fade" id="image-page" role="tabpanel" aria-labelledby="profile-tab">@include('home.image_storage')</div>
</div>



@endsection
@include('layout.script')
<script>
    $(document).ready(function(){
        $('#image').on('change', function(){
        const file = this.files[0];
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
            $('#imgPreview').attr('src', event.target.result);
            $('#imgPreview').removeClass('d-none');
            $('#update-avatar').removeClass('d-none');
          }
          reader.readAsDataURL(file);
        }
      });
    });
</script>
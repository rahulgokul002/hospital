<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.css')

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')

        <!-- partial -->

        <div class="container-fluid page-body-wrapper">
        <div class="container" align="center" style="padding: 100px"> 
            @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" >x</button>
                {{session()->get('message')}}
            </div>
            @endif
            <form action="{{url('editdoctor',$data->id)}}" method="POST" enctype="multipart/form-data">                
                @csrf
                 <div style="padding: 15px">                    
                     <label for="">Doctor Name</label>
                     <input type="text" style="color:black" name="name" placeholder="Name" value="{{$data->name}}">  
                 </div>
                 <div style="padding: 15px">                    
                     <label for="">Phone</label>
                     <input type="text" style="color:black" name="number" placeholder="Phone" value="{{$data->phone}}">  
                 </div>
                 <div style="padding: 15px">                    
                     <label for="">Speciality</label>
                     <input type="text" style="color:black" name="speciality" placeholder="Speciality" value="{{$data->speciality}}">  

                 </div>
                 <div style="padding: 15px">                    
                     <label for="">Room No</label>
                     <input type="text" style="color:black" name="room" placeholder="Room No" value="{{$data->room}}">  
                 </div>
                 <div style="padding: 15px">                    
                    <label for="">Doctor Image</label>
                    <input type="file" style="color:black" name="file">  
                </div><div style="padding: 15px">                    
                    <label for="">Old Image</label>
                    <img height="75" src="doctorimage/{{$data->image}}" alt="">                </div>
                 <div style="padding: 15px">                    
                     <input type="submit" class="btn btn-success" >  
                 </div>
             </form>
        </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')

    <!-- End custom js for this page -->
  </body>
</html>
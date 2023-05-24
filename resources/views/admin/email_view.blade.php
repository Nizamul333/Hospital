
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
      <style>
          label{
            display: inline-block;
              width: 300px
          }
      </style>
      @include('admin.css');

  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      
          @include('admin.sidebar')       
            
          
        
      <!-- partial-->
      @include('admin.navbar')
        <!-- partial -->
        
        <div class="container-fluid page-body-wrapper"  style="margin: auto;padding-top:100px" align="center">
        


            <div class="container">
              @if(session()->has('message'))
              <div class="alert alert-success">
                <button type="button" class="btn-close" data-bs-dismiss="alert" >x</button>
       {{session()->get('message')}}
              </div>
            @endif
   <form action="{{url('sendemail',$data->id)}}" method="POST" >
    @csrf
   <div style="padding: 20px">
       <label for="name">Greeting</label>
       <input class="bg-dark" type="text" name="greeting" style="color:white)">
   </div>
   <div style="padding: 20px">
    <label for="name">Body</label>
    <input class="bg-dark" type="text" name="body"   style="color:white)">
</div>

<div style="padding: 20px">
    <label for="name"> Actiontext</label>
    <input class="bg-dark" type="text" name="actiontext"   style="color:white)">
</div>



<div style="padding: 20px">
    <label for="name"> Action Url</label>
    <input class="bg-dark" type="text" name="actionurl"   style="color:white)">
</div>
<div style="padding: 20px">
    <label for="name"> End part</label>
    <input class="bg-dark" type="text" name="endpart"   style="color:white)">
</div>

<div style="padding: 20px">
    
    <button type="submit" class="btn btn-success">Submit</button>
     
</div>
  </form>

            </div>
            </div>
  <!--js-->
  @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>



<!DOCTYPE html>
<html lang="en">
  <head>
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
        
        <div class="container-fluid page-body-wrapper"  style="margin: auto;padding-top:100px">
            <div  style="padding: 5px"  style="margin:50px ">
                <table class="bg-dark" style="font-size:10px;margin-right:150px">
                    <tr style="color: aliceblue" align="center">
                        <th style="padding: 5px">Customer Name</th>
                        <th style="padding: 5px">Email</th>
                        <th style="padding: 5px">Phone No</th>
                        <th style="padding: 5px">Doctor Name</th>
                        <th style="padding: 5px">Date</th>
                        <th style="padding: 5px">Message</th>
                        <th style="padding: 5px">Status</th>
                        <th style="padding: 5px">Approved</th>
                        <th style="padding: 5px">Cancel appointment</th>
                        <th style="padding: 5px">send Email</th>
                        
                        
                  </tr>
                  @foreach ($appoint as $item)
                  <tr align="center">
                      <td style="color: aliceblue">{{$item->name}}</td>
                      <td style="color: aliceblue">{{$item->email}}</td>
                      <td style="color: aliceblue">{{$item->phone}}</td>
                      <td style="color: aliceblue">{{$item->doctor}}</td>
                      <td style="color: aliceblue">{{$item->date}}</td>
                      <td style="color: aliceblue">{{$item->message}}</td>
                      <td style="color: aliceblue">{{$item->status}}</td>
                      <td style="color: aliceblue"><a onclick="return confirm('are you sure to approve')" href="{{url('approved',$item->id)}}" 
                        class="btn btn-danger" >Approve</a></td>
                      <td style="color: aliceblue"><a onclick="return confirm('are you sure to cancel')" href="{{url('canceled',$item->id)}}" 
                        class="btn btn-danger" >cancel</a></td>
                        <td style="color: aliceblue"><a onclick="return confirm('are you sure to approve')" href="{{url('emailview',$item->id)}}" 
                            class="btn btn-danger" style="width: 120px; height:40px">Send mail</a></td>
                  </tr> 
                  @endforeach
                  
                </table>
            </div>
            </div>
  <!--js-->
  @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
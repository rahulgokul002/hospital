<!DOCTYPE html>
<html lang="en">
  <head>
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
            <div align="center" style="padding: 100px">
                <table>
                    <tr style="background-color: black">
                        <th style="padding: 10px">Customer Name</th>
                        <th style="padding: 10px">Email</th>
                        <th style="padding: 10px">Phone</th>
                        <th style="padding: 10px">Doctor</th>
                        <th style="padding: 10px">Date</th>
                        <th style="padding: 10px">Message</th>
                        <th style="padding: 10px">Status</th>
                        <th style="padding: 10px">Approve</th>
                        <th style="padding: 10px">Cancel</th>
                    </tr>
                    @foreach($data as $d)
                    <tr align="center" style="background-color: skyblue;">
                        <td>{{$d->name}}</td>
                        <td>{{$d->email}}</td>
                        <td>{{$d->phone}}</td>
                        <td>{{$d->doctor}}</td>
                        <td>{{$d->date}}</td>
                        <td>{{$d->message}}</td>
                        <td>{{$d->status}}</td>
                        <td><a class="btn btn-success" href="{{url('approved',$d->id)}}">Approved</a></td>
                        <td><a class="btn btn-danger" href="{{url('canceled',$d->id)}}">Canceled</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
      
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')

    <!-- End custom js for this page -->
  </body>
</html>
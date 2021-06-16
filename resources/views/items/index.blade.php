@extends('layouts.app', [
  'class' => 'Customer',
    'namePage' => 'Items',
    'activePage' => 'Items',
    'activeNav' => '',
])

@section('content')
<body class="sidebar-mini clickup-chrome-ext_installed">
 <!-- Navbar -->

  <!-- End Navbar --> <div class="panel-header">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
              <a class="btn btn-primary btn-round text-white pull-right" href="{{ route('user.add') }}">Import</a>
            <h4 class="card-title">Items</h4>
            <div class="col-12 mt-2">
                                        </div>
          </div>
          <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                <th>No. </th>
                  <th>Name</th>
                  <!-- <th>quantity</th>
                  <th>price</th>
                  <th>amount</th> -->
                  <th>Creation date</th>
                  <th class="disabled-sorting text-right">Unactivate</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No. </th>
                  <th>Name</th>
                  <!-- <th>quantity</th>
                  <th>price</th>
                  <th>amount</th> -->
                  <th>Creation date</th>
                  <th class="disabled-sorting text-right">Unactivate</th>
                </tr>
              </tfoot>
              <tbody>
              @foreach($items as $key => $data)

                                  <tr>
                                  <td>{{$data->id}}</td>
                    <td>{{$data->name}}</td>
                    <!-- <td>{{$data->quantity}}</td>
                    <td>{{$data->price}}</td>
                    <td>{{$data->amount}}</td> -->
                    <td>{{$data->created_at}}</td>
             
                                             <td class="text-right">
                                             <a type="button" href="{{ route('item.unactive',[$data->id]) }}" rel="tooltip" class="btn btn-danger btn-icon btn-sm " data-original-title="" title="">

                        <i class="now-ui-icons media-1_button-power"></i>
                      </a>                   </td>
                  </tr>@endforeach

                              </tbody>
            </table>
          </div>
          <!-- end content-->
        </div>
        <!--  end card  -->
      </div>
      <!-- end col-md-12 -->
    </div>

    <!-- end row -->
  </div>
    <footer class="footer">

</footer></div>                    </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('assets') }}/js/core/jquery.min.js"></script>
  <script src="{{ asset('assets') }}/js/core/popper.min.js"></script>
  <script src="{{ asset('assets') }}/js/core/bootstrap.min.js"></script>
  <script src="{{ asset('assets') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="{{ asset('assets') }}/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets') }}/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets') }}/js/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('assets') }}/demo/demo.js"></script>
  @stack('js')
</body>
@endsection

</html>
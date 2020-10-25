@extends('layouts.customer', [
    'namePage' => '',
    'class' => 'sidebar-mini ',
    'activePage' => 'customerBooking',
    'backgroundImage' => asset('assets') . "/img/bg14.png",
])

@section('pikkerStyleLink')
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

@endsection
@section('pikkerStyle')
<style>
span.input-group-append{
  display:none;
}
.input-group .form-control:first-child, .input-group-btn:first-child>.dropdown-toggle, .input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle) {
  border-right: 0 none;
    border: 1px grey solid;
    border-radius: 18px;
}
ul.timeline {
    list-style-type: none;
    position: relative;
}
.card {
    border-radius: 35px;
}
.col-md-8{
    margin-left: auto;
    margin-right: auto;
}
.col-xs-4,
.col-xs-5,.col-md-7,.row
{
  
}
ul.timeline:before {
    content: ' ';
    background: #d4d9df;
    display: inline-block;
    position: absolute;
    left: 29px;
    width: 2px;
    height: 100%;
    z-index: 400;
}
ul.timeline > li {
    margin: 20px 0;
    padding-left: 20px;
}
ul.timeline > li:before {
    content: ' ';
    background: white;
    display: inline-block;
    position: absolute;
    border-radius: 50%;
    border: 3px solid #22c0e8;
    left: 20px;
    width: 20px;
    height: 20px;
    z-index: 400;
}
option{
  border-radius: 31px;
    margin: 5px;
    height: 17px;
    width: 35px;
    padding-left: 17px;
    padding-right: 0px;
}
select:-internal-list-box option:checked {
    background-color: red !important;
    color: rgb(16, 16, 16) !important;

}

.officeSelect{ margin-left: 16px;}

    </style>

@endsection
@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  
  <div class="content">
    <div class="row">


      <div class="col-md-8">
        <div class="card">
        <div class="card-header">
              <a class="btn btn-primary btn-round text-white pull-right" href="/customerLogin">Add Reservations</a>
            <h4 class="card-title">Reservations</h4>
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
                  <th>#</th>
                  <th>Room</th>
                  <th>From</th>
                  <th>To</th>
                  <th>Reservation date</th>
                  <th>Status</th>

                  <!-- <th class="disabled-sorting text-right">Actions</th> -->
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Room</th>
                  
                  <th>From</th>
                  <th>To</th>
                  <th>Reservation date</th>
                  <th>Status</th>
                  <!-- <th class="disabled-sorting text-right">Actions</th> -->
                </tr>
              </tfoot>
              <tbody>
              @foreach($reservations as $key => $data)

                                  <tr>
                                  <td>{{$data->customerRes->name}}</td>

                    <td>{{$data->roomRes->room_name}}</td>
                    <td>{{$data->date_in}}</td>
                    <td>{{$data->date_out}}</td>
                    <td>{{$data->created_at}}</td>
                    <?php switch ($data->status) {
                        case 'pending':
                            echo ' <td  style="color:grey">Pending</td>';
                             break;
                        
                             case 'cancel':
                                echo ' <td  style="color:red">Canceld</td>';
                                 break;
                             
                                 case 'approve':
                                    echo ' <td style="color:green">Approved</td>';
                                     break;
                                 
                        default:
                            # code...
                            break;
                    } ?>
                   
              
                      <!-- <td class="text-right">
                      <a type="button" href="{{ route('user.edit',[1]) }}" rel="tooltip" class="btn btn-success btn-icon btn-sm " data-original-title="" title="">
                        <i class="now-ui-icons ui-2_settings-90"></i>
                      </a>
                                                              </td> -->
                  </tr>@endforeach

                              </tbody>
            </table>
          </div>
          <!-- end content-->
    </div>
      <div class="col-md-4">
      
    </div>
  </div>
@endsection

  @section('pikkerDateScript')
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

  <script>
        $('#input_11').datetimepicker({
            format: 'yyyy-mm-dd HH:MM:ss',
            uiLibrary: 'bootstrap4',
            modal: true,
            footer: true
        });
        $('#input_22').datetimepicker({
            format: 'yyyy-mm-dd HH:MM:ss',
            uiLibrary: 'bootstrap4',
            modal: true,
            footer: true
        });
    </script>
  @endsection


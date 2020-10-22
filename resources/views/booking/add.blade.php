@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Add Booking',
    'activePage' => 'newBooking',
    'activeNav' => '2',
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
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__("Add Booking")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('booking.add') }}" autocomplete="off"
            enctype="multipart/form-data">
              @csrf
              @method('post')
              @include('alerts.success')
              <div class="row">
              </div>
             
                <div class="row">
                <div class="col-md-7 pr-1">
                    <div class="form-group">
                    <label for="exampleInputEmail1">{{__(" Office")}}</label>
                     <div class="row">
                      <div class="col-xs-5 officeSelect">
                        <select onchange="getRoom()" name="office_id" id="officeSelect" class="form-control">
                        <option value="">Select Office</option>
                        @foreach($offices as $key => $data)
                          <option value="{{$data->id}}">{{$data->officeLang->office_name}}</option>
                          @endforeach
                        </select>
                      </div>


                      <div class="col-xs-4 officeSelect">
                        <select  onchange="getTable()" name="room_id" id="roomSelect" class="form-control">
                          <option value="">Select Room</option>
                        </select>
                      </div>
                  



                    <div class="col-xs-4 officeSelect">
                        <select  onchange="getReservations()"   name="table_id" id="tableSelect" class="form-control">
                          <option value="">Select Table</option>
                        </select>
                      </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__("Table Name")}}</label>

                                <input id="input_11" type="text"  name="date_in" class="form-control" placeholder="2020-10-15 08:03:38">

                                @include('alerts.feedback', ['field' => 'name'])
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__("Table Name")}}</label>

                                <input  id="input_22"  type="text" name="date_out" class="form-control" placeholder="2020-10-18 11:03:38">

                                @include('alerts.feedback', ['field' => 'name'])
                        </div>
                    </div>
                </div>
               



	<div class="row">
		<div class="col-md-8 ">
			<h4>Reservations</h4>
			<ul class="timeline" id="timeline">
		
			</ul>
		</div>
	</div>

          <input hidden type="number" name="customer_id" value="{{$customer_id}}">
                                                
              
              <div class="card-footer ">
                <button type="submit" class="btn btn-primary btn-round">{{__('Add')}}</button>
              </div>
              <hr class="half-rule"/>
            </form>
          </div>
       
       
      </div>
    </div>
      <div class="col-md-4">
      
    </div>
  </div>
@endsection

  @section('pikkerDateScript')
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

  <script>
        $('#input_11').datetimepicker({
          format: 'yyyy-dd-mm HH:MM',
            uiLibrary: 'bootstrap4',
            modal: true,
            footer: true
        });
        $('#input_22').datetimepicker({
          format: 'yyyy-dd-mm HH:MM',
            uiLibrary: 'bootstrap4',
            modal: true,
            footer: true
        });
    </script>
  @endsection

<script>

function getRoom() {
  var x = document.getElementById("officeSelect").value;
 // document.getElementById("demo").innerHTML = "You selected: " + x;
  //alert(x);
    $.ajax({
      url: "/api/getRooms?id="+x,
      context: document.body
    }).done(function(e) {
      $("#roomSelect").html('<option value="">Select Room</option>');
     // console.log(e[0]['id_province']);
      e.forEach(element => {
        $("#roomSelect").append("<option value='"+element['id']+"'>"+element['room_lang']['room_name']+"</option>");
       // console.log(element['province_lang']['name']);
      });
   //   alert("d");
     // $( this ).addClass( "done" );
    });
}

function getTable() {
  var x = document.getElementById("roomSelect").value;
   // alert(x);

 // document.getElementById("demo").innerHTML = "You selected: " + x;
  //alert(x);
    $.ajax({
      url: "/api/getTables?id="+x,
      context: document.body
    }).done(function(e) {
      $("#tableSelect").html('<option value="">Select Table</option>');
     // console.log(e[0]['id_province']);
      e.forEach(element => {
        $("#tableSelect").append("<option value='"+element['id']+"'>"+element['table_lang']['table_name']+"</option>");
       // console.log(element['province_lang']['name']);
      });
   //   alert("d");
     // $( this ).addClass( "done" );
    });
}


function getReservations() {
  var x = document.getElementById("tableSelect").value;
   // alert(x);

 // document.getElementById("demo").innerHTML = "You selected: " + x;
  //alert(x);
    $.ajax({
      url: "/api/getReservations?id="+x,
      context: document.body
    }).done(function(e) {
      $("#timeline").html('');
     // console.log(e[0]['id_province']);
      e.forEach(element => {
        $("#timeline").append('<li><a href="#">'+element['date_in']+'</a><a href="#" class="float-right">'+element['date_out']+'</a>		</li>');
       // console.log(element['province_lang']['name']);
      });
   //   alert("d");
     // $( this ).addClass( "done" );
    });
}
</script>
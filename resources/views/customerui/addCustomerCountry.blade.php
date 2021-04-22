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
    text-align: center;
    margin-left: auto;
    margin-right: auto;
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
            <h5 class="title">{{__("Add Booking")}}</h5>
          </div>
          <div class="card-body">
            <form method="get" action="{{ route('customer.saveProvince') }}" autocomplete="off"
            enctype="multipart/form-data">
              @csrf
              @method('get')
              @include('alerts.success')
              <div class="row">
              </div>
                <div class="row">
                <div class="col-md-7 pr-1">
                    <div class="form-group">
                    <label for="exampleInputEmail1">{{__(" Country")}}</label>
                     <div class="row">
                      <div class="col-xs-5 officeSelect">
                        <select name="province_id" id="provinceSelect" class="form-control">
                        <option value="">Select Country</option>
                        @foreach($province as $key => $data)
                          <option value="{{$data->id_province}}">{{$data->provinceLang->name}}</option>
                          @endforeach
                        </select>
                      </div>


                  



                    </div>
                    </div>


          
                <input   type="text" name="customer_id" hidden value="{{$id}}">
               



                                                
              
              <div class="card-footer ">
                <button type="submit" class="btn btn-primary btn-round">{{__('Save')}}</button>
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
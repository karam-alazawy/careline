@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Add Booking',
    'activePage' => 'newBooking',
    'activeNav' => '2',
])

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
                            <label>{{__("Table Name")}}</label>

                                <input type="text" name="name" class="form-control" value="">

                                @include('alerts.feedback', ['field' => 'name'])
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-7 pr-1">
                    <div class="form-group">
                    <label for="exampleInputEmail1">{{__(" Office")}}</label>
                     <div class="row">
                      <div class="col-xs-5 officeSelect">
                        <select onchange="getRoom()" name="office" id="officeSelect" class="form-control">
                        <option value="">Select Office</option>
                        @foreach($offices as $key => $data)
                          <option value="{{$data->id}}">{{$data->officeLang->office_name}}</option>
                          @endforeach
                        </select>
                      </div>


                      <div class="col-xs-4 officeSelect">
                        <select  onchange="getTable()" name="room" id="roomSelect" class="form-control">
                          <option value="">Select Room</option>
                        </select>
                      </div>
                  



                    <div class="col-xs-4 officeSelect">
                        <select   name="table" id="tableSelect" class="form-control">
                          <option value="">Select Table</option>
                        </select>
                      </div>
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
<style>
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
</script>
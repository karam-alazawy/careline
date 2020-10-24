@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Add Office',
    'activePage' => 'newOffice',
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
            <h5 class="title">{{__("Add Office")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('office.add') }}" autocomplete="off"
            enctype="multipart/form-data">
              @csrf
              @method('post')
              @include('alerts.success')
              <div class="row">
              </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__("Office Name")}}</label>
                                <input type="text" name="name" class="form-control" value="">
                                @include('alerts.feedback', ['field' => 'name'])
                        </div>
                    </div>
                </div>
                <div class="row">
                
                              
                <div class="col-md-7 pr-1">
                <div class="form-group">
                    <label for="exampleInputEmail1">{{__(" Country and Province")}}</label>
                     <div class="row">
                     <div class="col-xs-4 officeSelect">
                        <select onchange="getProvince()" name="country" id="CountrySelect" class="form-control">
                        <option value="">Select Country</option>
                        @foreach($country as $key => $data)
                          <option value="{{$data->id_country}}">{{$data->countryLang->name}}</option>
                          @endforeach
                        </select>
                      </div>
                      
                      <br>
                      <div class="col-xs-4 officeSelect">
                        <select name="province" id="province" class="form-control">
                          <option value="">Select Province</option>
                        </select>
                      </div>
                      
                      
                      
                    </div>
                    </div>
                                                
              
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
function getProvince() {
  var x = document.getElementById("CountrySelect").value;
 // document.getElementById("demo").innerHTML = "You selected: " + x;
  //alert(x);
    $.ajax({
      url: "/api/getProvince?id="+x,
      context: document.body
    }).done(function(e) {
        $("#province").html(' <option value="">Select Province</option>');

     // console.log(e[0]['id_province']);
      e.forEach(element => {
        $("#province").append("<option value='"+element['id_province']+"'>"+element['province_lang']['name']+"</option>");
        console.log(element['province_lang']['name']);
      });
   //   alert("d");
     // $( this ).addClass( "done" );
    });
}
</script>
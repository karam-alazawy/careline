@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Add Table',
    'activePage' => 'newTable',
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
            <h5 class="title">{{__("Add Table")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('table.add') }}" autocomplete="off"
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
                            <label>{{__("Open At")}}</label>

                                <input  type="time" name="open_at" class="form-control" value="">

                                @include('alerts.feedback', ['field' => 'open_at'])
                        </div>
                    </div>
                </div>
             

                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__("Close At")}}</label>

                                <input type="time" name="close_at" class="form-control" value="">

                                @include('alerts.feedback', ['field' => 'close_at'])
                        </div>
                    </div>
                </div>
             
                                 
               
<input hidden type="text" name="room_id" value="{{$room_id}}">
                                                
              
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




@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Add Room',
    'activePage' => 'newRoom',
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
            <h5 class="title">{{__("Add Room")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('room.add') }}" autocomplete="off"
            enctype="multipart/form-data">
              @csrf
              @method('post')
              @include('alerts.success')
              <div class="row">
              </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__("Room Name")}}</label>

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
                        <select name="office" id="officeSelect" class="form-control">
                        @foreach($offices as $key => $data)

                          <option value="{{$data->id}}">{{$data->officeLang->office_name}}</option>

                          @endforeach
                        </select>
                      </div>
                    </div>
                    </div>
                                                  
                    <div class="form-group">
                    <label for="exampleInputEmail1">{{__(" Room Type")}}</label>
                     <div class="row">
                      <div class="col-xs-5 officeSelect">
                        <select name="roomType" id="officeSelect" class="form-control">
                        <option value="1">Type 1</option>
                        <option value="2">Type 2</option>
                        </select>
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
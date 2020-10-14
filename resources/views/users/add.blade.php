@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Add User',
    'activePage' => 'newUser',
    'activeNav' => '',
])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__("Add User")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('user.add') }}" autocomplete="off"
            enctype="multipart/form-data">
              @csrf
              @method('post')
              @include('alerts.success')
              <div class="row">
              </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label>{{__(" Name")}}</label>
                                <input type="text" name="name" class="form-control" value="">
                                @include('alerts.feedback', ['field' => 'name'])
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-7 pr-1">
                    <div class="form-group">
                      <label for="exampleInputEmail1">{{__(" Email address")}}</label>
                      <input type="email" name="email" class="form-control" placeholder="Email" value="">
                      @include('alerts.feedback', ['field' => 'email'])
                    </div>
                  </div>
                </div>                
                <div class="row">
                  <div class="col-md-7 pr-1">
                    <div class="form-group">
                      <label for="exampleInputEmail1">{{__(" Password")}}</label>
                      <input type="password" name="password" class="form-control" placeholder="******" value="">
                      @include('alerts.feedback', ['field' => 'Password'])
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
                          <option value="{{$data->id}}">{{$data->office_name}}</option>
                          @endforeach
                        </select>
                      </div>
                      
                    </div>
                    </div>
                  </div>
                  <div class="col-md-7 pr-1">
                    <div class="form-group">
                    <label for="exampleInputEmail1">{{__(" Permissions")}}</label>
                     <div class="row">
                      <div class="col-xs-5 multiselect">
                        <select name="from[]" id="multiselect" class="form-control" size="8" multiple="multiple">
                          <option value="addUser">Add User</option>
                          <option value="dataEntery">Data Entery</option>
                          <option value="2">Item</option>
                        </select>
                      </div>
                      
                    </div>
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
    width: 15px;
    padding-left: 17px;
    padding-right: 0px;
}
select:-internal-list-box option:checked {
    background-color: red !important;
    color: rgb(16, 16, 16) !important;

}
#multiselect{    
  text-align: center;
  height: 103px;
}
.multiselect{    
    margin-left: 16px;
    margin-right: auto;
    width: 200px;
  
  }
  .officeSelect{ margin-left: 16px;}
    </style>
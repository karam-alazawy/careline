@extends('layouts.app', [
    'class' => 'Subscriptions',
    'namePage' => 'Add Subscription',
    'activePage' => 'newSubscription',
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
            <h5 class="title">{{__("Add Subscription")}}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('user.addNewSubscription') }}" autocomplete="off"
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
                      <label for="exampleInputEmail1">{{__(" Price")}}</label>
                      <input type="text" name="price" class="form-control" placeholder="Price" value="">
                      @include('alerts.feedback', ['field' => 'Price'])
                    </div>
                  </div>
                </div> 
                <div class="row">
                <div class="form-group">
                         
                <div class="col-xs-5 officeSelect">
                <label for="exampleInputEmail1">{{__(" Type")}}</label>

                        <select name="type" id="officeSelect" class="form-control">
                       
                        <option value="daily">Daily</option>
                        <option value="monthly">Monthly</option>
                        <option value="weekly">Weekly</option>
                        <option value="yearly">Yearly</option>
                         
                        </select>
                        <label for="exampleInputEmail1">{{__(" Period")}}</label>

                      <input type="text" name="period" class="form-control" placeholder="Period" value="">
                     
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
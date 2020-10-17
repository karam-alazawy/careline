<div class="sidebar" data-color="orange">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
  <div class="logo">
    <a href="http://www.creative-tim.com" class="simple-text logo-mini">
      {{ __('UM') }}
    </a>
    <a href="http://www.creative-tim.com" class="simple-text logo-normal">
      {{ __('Space') }}
    </a>
  </div>
  <div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
      <li class="@if ($activePage == 'home') active @endif">
        <a href="{{ route('home') }}">
          <i class="now-ui-icons design_app"></i>
          <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li>
        <a data-toggle="collapse" href="#laravelExamples">
            <i class="now-ui-icons  users_circle-08"></i>
          <p>
            {{ __("users") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExamples">
          <ul class="nav">
          <li class="@if ($activePage == 'newUser') active @endif">
              <a href="{{ route('user.add') }}">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("Add User") }} </p>
              </a>
              </li>  
            <!-- 
               <li class="@if ($activePage == 'profile') active @endif">
              <a href="{{ route('profile.edit') }}">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("User Profile") }} </p>
              </a>
            </li> -->
            <li class="@if ($activePage == 'Users') active @endif">
              <a href="{{ route('user.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("Users Management") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'inactiveUsers') active @endif">
              <a href="{{ route('user.inactive') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("Inactive Users") }} </p>
              </a>
            </li>
          </ul>
        </div>
        </li>


        <li>
        <a data-toggle="collapse" href="#Subscription">
            <i class="now-ui-icons business_bank"></i>
          <p>
            {{ __("Subscription") }}
            <b class="caret"></b>
          </p>
        </a>
        
        <div class="collapse show" id="Subscription">
          <ul class="nav">
          <li class="@if ($activePage == 'newSubscription') active @endif">
          <a href="{{ route('user.addSubscription') }}">
                <i class="now-ui-icons objects_key-25"></i>
                <p> {{ __("Add Subscription") }} </p>
              </a>
          </li>  
            <!-- 
               <li class="@if ($activePage == 'profile') active @endif">
              <a href="{{ route('profile.edit') }}">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("User Profile") }} </p>
              </a>
            </li> -->
            <li class="@if ($activePage == 'subscriptions') active @endif">
              <a href="{{ route('user.addSubscription') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("Subscriptions Management") }} </p>
              </a>
            </li>
          </ul>
        </div>
        </li>



        <li>
        <a data-toggle="collapse" href="#Offices">
            <i class="now-ui-icons business_bank"></i>
          <p>
            {{ __("Offices") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="Offices">
          <ul class="nav">
          <li class="@if ($activePage == 'newOffice') active @endif">
              <a href="{{ route('office.add') }}">
                <i class="now-ui-icons objects_key-25"></i>
                <p> {{ __("Add Office") }} </p>
              </a>          
              </li>  

            <!-- 
               <li class="@if ($activePage == 'profile') active @endif">
              <a href="{{ route('profile.edit') }}">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("User Profile") }} </p>
              </a>
            </li> -->
            <li class="@if ($activePage == 'Offices') active @endif">
              <a href="{{ route('office.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("Offices Management") }} </p>
              </a>
            </li>
          </ul>
        </div>
      
        </li>



        <li>
        <a data-toggle="collapse" href="#rooms">
            <i class="now-ui-icons business_bank"></i>
          <p>
            {{ __("Rooms") }}
            <b class="caret"></b>
          </p>
        </a>
        
        <div class="collapse show" id="rooms">
          <ul class="nav">
          <li class="@if ($activePage == 'newRoom') active @endif">
              <a href="{{ route('room.add') }}">
                <i class="now-ui-icons objects_key-25"></i>
                <p> {{ __("Add Room") }} </p>
              </a>
          </li>  
            <!-- 
               <li class="@if ($activePage == 'profile') active @endif">
              <a href="{{ route('profile.edit') }}">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("User Profile") }} </p>
              </a>
            </li> -->
            <li class="@if ($activePage == 'Rooms') active @endif">
              <a href="{{ route('room.getOffice') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("Rooms Management") }} </p>
              </a>
            </li>
          </ul>
        </div>
        </li>
      <!-- <li class="@if ($activePage == 'icons') active @endif">
        <a href="{{ route('page.index','icons') }}">
          <i class="now-ui-icons education_atom"></i>
          <p>{{ __('Icons') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'maps') active @endif">
        <a href="{{ route('page.index','maps') }}">
          <i class="now-ui-icons location_map-big"></i>
          <p>{{ __('Maps') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'notifications') active @endif">
        <a href="{{ route('page.index','notifications') }}">
          <i class="now-ui-icons ui-1_bell-53"></i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'table') active @endif">
        <a href="{{ route('page.index','table') }}">
          <i class="now-ui-icons design_bullet-list-67"></i>
          <p>{{ __('Table List') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'typography') active @endif">
        <a href="{{ route('page.index','typography') }}">
          <i class="now-ui-icons text_caps-small"></i>
          <p>{{ __('Typography') }}</p>
        </a>
      </li>
      <li class = "@if ($activePage == 'upgrade') active @endif active-pro">
        <a href="{{ route('page.index','upgrade') }}" class="color-ev">
          <i class="now-ui-icons arrows-1_cloud-download-93"></i>
          <p>{{ __('Upgrade to PRO') }}</p>
        </a>
      </li> -->
    </ul>
  </div>
</div>
<style>
#ofBar {
    display:none!important;
}
.main-panel {
/* display: none !important; */
}
li.active-pro {
    display: none!important;
}
</style>
<div class="sidebar" data-color="orange">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
  <div class="logo">
    <a class="simple-text logo-mini">
      {{ __('UM') }}
    </a>
    <a  class="simple-text logo-normal">
      {{ __('Carelines') }}
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

  

 
        <li class = "@if ($activePage == 'newUser') active @endif">
        <a href="{{ route('user.add') }}">
          <i class="now-ui-icons location_map-big"></i>
          <p>{{ __('Import Excel') }}</p>
        </a>
      </li>

      <!-- <li class = "@if ($activePage == 'typography') active @endif">
        <a href="{{ route('page.index','typography') }}">
          <i class="now-ui-icons text_caps-small"></i>
          <p>{{ __('Items') }}</p>
        </a>
      </li> -->

      <li class="@if ($activePage == 'Items') active @endif">
              <a href="{{ route('user.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("Items Management") }} </p>
              </a>
            </li>




      

    </ul>
  </div>
</div>
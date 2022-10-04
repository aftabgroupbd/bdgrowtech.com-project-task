<aside class="app-sidebar">
    <div class="app-sidebar__user">
      <div>
        <p class="app-sidebar__user-name">{{auth()->user()->username}}</p>
      </div>
    </div>
    <ul class="app-menu">
      <li>
        <a class="app-menu__item active" href="{{route('currency')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Currency List</span>
        </a>
      </li>
    </ul>
  </aside>
<div id="sidebar" class="sidebar" style="background-color: #003366">
      <div data-scrollbar="true" data-height="100%">
        <ul class="nav text-center">
          <li class="nav-profile">
            <div class="info">
              <a href="{{route('home')}}" style="text-decoration: none; font-size: 15px; color: #ddd;">{{Auth::user()->name}}</a>
              
              <small>{{Auth::user()->username}}</small>
            </div>
          </li>
        </ul>
        
        <ul class="nav" style="text-transform: uppercase;">
          <li class="@if(request()->path() == 'home') active @endif">
            <a href="{{route('home')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
          </li>
           <li class="@if(request()->path() == 'home/transaction-log') active @endif">
              <a href="{{route('transaction.log')}}"><i class="fa fa-exchange" aria-hidden="true"></i> <span>Transaction Log</span></a>
           </li>

          <li class="@if(request()->path() == 'home/deposit') active @endif"><a href="{{route('deposit')}}"><i class="fa fa-plus" aria-hidden="true"></i> <span>Deposit Bitcoin</span></a>
          </li>
           <li class="@if(request()->path() == 'home/withdraw-btc') active @endif"><a href="{{route('user.withdrawbtc')}}"><i class="fa fa-share" aria-hidden="true"></i> <span>Withdraw Bitcoin</span></a>
              </li>
          <li class="@if(request()->path() == 'home/refered') active @endif"><a href="{{route('refered')}}"><i class="fa fa-users" aria-hidden="true"></i> <span>Reference log</span></a></li>          
            <li class="@if(request()->path() == 'change/password') active @endif">
                <a href="{{route('changepass')}}"><i class="fa fa-lock" aria-hidden="true"></i> <span>Password</span></a>
            </li>
             <li class="@if(request()->path() == 'home/document') active @endif">
                <a href="{{route('document')}}"><i class="fa fa-file-text" aria-hidden="true"></i> <span> Document </span></a>
            </li> 
            <li class="@if(request()->path() == 'home/g2fa') active @endif">
              <a href="{{route('go2fa')}}"><i class="fa fa-shield" aria-hidden="true"></i> <span>Security</span></a>
            </li>

            <li>
              <a href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i>
              <span>SIGN OUT</span>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
          </li>
                 
              <!-- begin sidebar minify button -->
          <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
              <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
      </div>
      <!-- end sidebar scrollbar -->
    </div>
    <div class="sidebar-bg"></div>
    <!-- end #sidebar -->
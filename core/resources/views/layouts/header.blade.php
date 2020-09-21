        <div id="header" class="header navbar navbar-default navbar-fixed-top">
            <!-- begin container-fluid -->
            <div class="container-fluid" style="background-color: #006666;">
                <!-- begin mobile sidebar expand / collapse button -->
                <div class="navbar-header">
                    <a href="{{route('home')}}" class="navbar-brand">
                        <img class="img-responsive" src="{{ asset('assets/images/logo/logo.png') }}" style="max-width: 150px; max-height: 50px;">
                    </a>
                    <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                       <a href="#" style="font-size: 20px; color:#fff; margin-right: 20px;">BITCOIN Balance = {{round(Auth::user()->balance, $gnl->decimal)}} BTC</a>
                    </li>
                    <li class="dropdown">
                       <a href="#" style="font-size: 20px; color:#fff; margin-right: 20px;"> 1 BTC = ${{round($btcrate, $gnl->decimal)}}</a>
                    </li>
                    
                </ul>
                
            </div>
            <!-- end container-fluid -->
        </div>
        <!-- end #header -->




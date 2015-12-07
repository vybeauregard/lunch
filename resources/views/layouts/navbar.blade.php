<!-- Static navbar -->
<nav class="navbar">
  <div class="container-fluid">
    <div class="navbar-header">
        <div class="navbar-brand">
          <a class="navbar-logo" href="{{ url('') }}"></a>
          <div class="site-info">
              <p class="nrl-name" href="{{ url('') }}">Zurka Interactive</p>
              <a class="site-name" href="{{ url('') }}">Lunch</a>
          </div>
      </div>
    </div>
    <div id="navbar">
        <ul class="nav navbar-nav navbar-right">
            <li class="user-name menu-toggle"><a href="#"><i class="fa fa-angle-right"></i>User Name</a>
                <ul class="user-menu menu-content">
                    <li>
                        <i class="fa fa-fw fa-lg fa-cogs"></i>
                        <a href="#">Preferences</a>
                    </li>
                    <li>
                        <i class="fa fa-fw fa-lg fa-info"></i>
                        <a href="#">About This Site</a>
                    </li>
                    <li>
                        <i class="fa fa-fw fa-lg fa-sign-out"></i>
                        <a href="#">Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li class="nav-alerts menu-toggle new-alerts">
                <a href="#" title="View Your Alerts">
                    <span class="badge">
                        <i class="fa fa-angle-right"></i><span class="alert-count">3</span></span>
                </a>
                <ul class="alerts-menu menu-content">
                    <li>
                        <i class="fa fa-fw fa-lg fa-exclamation-triangle new-alert"></i>
                        <a class="alert-link" href="#">Alert 1 here</a>
                    </li>
                    <li>
                        <i class="fa fa-fw fa-lg fa-envelope new-alert"></i>
                        <a class="alert-link" href="#">Alert 2 over here</a>
                    </li>
                    <li>
                        <i class="fa fa-fw fa-lg fa-comment new-alert"></i>
                        <a class="alert-link" href="#">Alert 3 might be over here</a>
                    </li>
                    <div class="alerts-content-footer">
                        <a class="alert-clear" href="#">Clear All</a>
                        <a class="alert-all" href="#">View All</a>
                    </div>
                </ul>
            </li>
        </ul>

        <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search">
        </form>
    </div>
  </div><!--/.container-fluid -->
</nav>

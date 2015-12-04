      <!-- Static navbar -->
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="{{ url('') }}">Lunch</a>
          </div>
        </div><!--/.container-fluid -->
      </nav>

<div id="site-sidebar-wrapper" style="min-height: 4715px;">
    <div id="site-sidebar" class="sidebar">
        <ul class="nav nav-sidebar">
            <li class="sidebar-toggler-wrapper"><i class="fa fa-2x fa-angle-double-left"></i></li>
            <li class="{{ Request::is('/calendar*') ? 'active' : ''}}"><a href="{{ url('/')}}">Home</a></li>
            <li class="{{ Request::is('location*') ? 'active' : ''}}"><a href="{{ url('location')}}">Places</a></li>
            <li class="{{ Request::is('cuisine*') ? 'active' : ''}}"><a href="{{ url('cuisine')}}">Cuisine</a></li>
        </ul>
    </div>
</div>

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

            <a class="navbar-brand" href="#">Lunch</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="{{ Request::is('/') ? 'active' : ''}}"><a href="{{ url('/')}}">Home</a></li>
              <li class="{{ Request::is('location*') ? 'active' : ''}}"><a href="{{ url('location')}}">Places</a></li>
              <li class="{{ Request::is('cuisine*') ? 'active' : ''}}"><a href="{{ url('cuisine')}}">Cuisine</a></li>

            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
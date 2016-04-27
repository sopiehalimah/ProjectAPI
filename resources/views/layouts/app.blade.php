<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="{{ url('http://fonts.googleapis.com/icon?family=Material+Icons') }}" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="{{ url('css/materialize.min.css') }} "  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
  
        <nav>
          <div class="nav-wrapper">
            <a href="{{ url('/') }}" class="brand-logo center">Project API </a>
            <ul class="right hide-on-med-and-down">
              <li><a href="{{ url('master/currency') }}">Currency</a></li>
              <li><a href="{{ url('master/country') }}">Country</a></li>
              <li><a href="{{ url('master/lang') }}">Language</a></li>
              
            </ul>
          </div>
        </nav>
                
        
    @yield('content')
    
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="{{ url('https://code.jquery.com/jquery-2.1.1.min.js') }}"></script>
      <script type="text/javascript" src="{{ url('js/materialize.min.js') }}"></script>
    </body>
  </html>

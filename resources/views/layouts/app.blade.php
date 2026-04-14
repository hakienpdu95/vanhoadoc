<!doctype html>
<html @php(language_attributes())>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @php(do_action('get_header'))
    @php(wp_head())

    @vite([
      'resources/css/icon.min.css',
      'resources/css/app.css',
      'resources/css/main.scss',
      'resources/js/jquery.js',
      'resources/js/app.js'
    ])
  </head>

  <body @php(body_class())>
    @php(wp_body_open())
    @include('partials.body-common')
    
    @include('sections.header')
    <div id="app" class="">
      <main id="main" class="main">
        <div class="container">
          <div class="w-full inline-block clear-both mt-4 mb-5">
            @if (has_nav_menu('primary_navigation'))
            <nav class="main-menu">
              {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
            </nav>
            @endif
          </div>
      </div>
      @yield('content')
    </main>
    </div>
    @include('sections.footer')
    @php(do_action('get_footer'))
    @php(wp_footer())
    @yield('scripts')
  </body>
</html>

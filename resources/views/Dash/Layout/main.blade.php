<!DOCTYPE html>
<html lang="en">

<head>
  @include('Dash.Layout.partials.head')
</head>

<body class="fixed-sn white-skin">

  <!-- Main Navigation -->
 @include('Dash.Layout.partials.nav')
  <!-- Main Navigation -->
  <main>

    <div class="container-fluid">

      <!-- Section: Intro -->
      <section class="mt-md-4 pt-md-2 mb-5 pb-4">
   @yield('content')

</section>
</div>
</main>

  <!-- Footer -->
 @include('Dash.Layout.partials.footer')
  <!-- Footer -->


  <!-- SCRIPTS -->
  <!-- JQuery -->
  @include('Dash.Layout.partials.scripts')

</body>

</html>

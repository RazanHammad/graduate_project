@extends('Dash.Layout.main')
@section('content')
 
     <center>
     <h1 style="color: blue">Home</h1>
     <h3>Our System Capabilities</h3>
     </center>
      <div class="row">

        <!-- Grid column -->
          <div class="col-xl-3 col-md-6 mb-4">

            <!-- Card -->
            <div class="card">

              <!-- Card Data -->
              <div class="row mt-3">

                <div class="col-md-5 col-5 text-left pl-4">
                  <a type="button" class="btn-floating btn-lg red accent-2 ml-4"><i class="fas fa-database"
                      aria-hidden="true"></i></a>
                </div>

                <div class="col-md-7 col-7 text-right pr-5">
               
                  <p class="font-small grey-text">Control Rules</p>
                </div>

              </div>
              <!-- Card Data -->

              <!-- Card content -->
              <div class="row my-3">

                <div class="col-md-7 col-7 text-left pl-4">
                  <p class="font-small font-up ml-4 font-weight-bold">Add ,Edit and Delete Rules.</p>
                </div>

              

              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->

          </div>
         
          <div class="col-xl-3 col-md-6 mb-4">

            <!-- Card -->
            <div class="card">

              <!-- Card Data -->
              <div class="row mt-3">

                <div class="col-md-5 col-5 text-left pl-4">
                  <a type="button" class="btn-floating btn-lg red accent-2 ml-4"><i class="fas fa-database"
                      aria-hidden="true"></i></a>
                </div>

                <div class="col-md-7 col-7 text-right pr-5">
                 
                  <p class="font-small grey-text">Cloud Broker</p>
                </div>

              </div>
              <!-- Card Data -->

              <!-- Card content -->
              <div class="row my-3">

                <div class="col-md-7 col-7 text-left pl-4">
                  <p class="font-small font-up ml-4 font-weight-bold">Intercept User Http Request.</p>
                </div>

               

              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->

          </div>

         <div class="col-xl-3 col-md-6 mb-4">

            <!-- Card -->
            <div class="card">

              <!-- Card Data -->
              <div class="row mt-3">

                <div class="col-md-5 col-5 text-left pl-4">
                  <a type="button" class="btn-floating btn-lg red accent-2 ml-4"><i class="fas fa-database"
                      aria-hidden="true"></i></a>
                </div>

                <div class="col-md-7 col-7 text-right pr-5">
                 
                  <p class="font-small grey-text">IPS Plugin</p>
                </div>

              </div>
              <!-- Card Data -->

              <!-- Card content -->
              <div class="row my-3">

                <div class="col-md-7 col-7 text-left pl-4">
                  <p class="font-small font-up ml-4 font-weight-bold">Take Action For Malicious Traffic.</p>
                </div>

               

              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->

          </div>

     </div> 	
@endsection
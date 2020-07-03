 <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th> </th>
                <th></th>
                    <th></th>
                  </tr>
                </tfoot>
                 
                <tbody>
                 @foreach($role as $rol)
                  <tr>
               {{$rol[0]}}
                   
                  </tr>
                @endforeach
                </tbody>
                
              </table>
            </div>
          </div>
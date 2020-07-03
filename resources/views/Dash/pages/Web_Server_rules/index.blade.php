
@extends('Dash.Layout.main')


@section('content')
<div class="row">
  <div class="col-12">

    <div class="card mb-3">

      <div class="card-header">
        <i class="fas fa-table"></i>
          View All Web Server Rules
      </div>
      <div class="card-body">
        <div class="table-responsive" style="overflow-x:auto;">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Rule message</th>
                <th>Rule Content</th>
                <th>Rule Reference</th>
                <th>Rule Class Type</th>
                <th>Rule sid</th> 
                <th>Rule rev</th>
                <th>Rule meta data</th>                   
                <th><a class="btn btn-success btn-sm" href="/webRoles/create" role="button">Create Rule +</a></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($web_server_roles as $rr)
              <tr>
                  <td>{{$rr->msg}}</td>
                  <td>{{$rr->content}}</td>
                  <td>{{$rr->ref}}</td>
                  <td>{{$rr->class_type}}</td>
                  <td>{{$rr->sid}}</td>
                  <td>{{$rr->rev}}</td>
                  <td>{{$rr->meta_data}}</td>
                  <td><a class="btn btn-primary btn-sm" href="/webRoles/{{$rr->id}}" role="button">Details</a></td>  
                
              </tr>
              @endforeach
            </tbody>     
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection 
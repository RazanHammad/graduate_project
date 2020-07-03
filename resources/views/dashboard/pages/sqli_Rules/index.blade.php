
@extends('dashboard.pages.tables')

@section('title')
View All Sqli Rules

@endsection

@section('head')
View All Sqli Rules

@endsection

@section('table')


   <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           View All Sqli Rules</div>
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
                          <th><a class="btn btn-success" href="/rules/create" role="button">Create Sqli_Rule +</a></th>
                  </tr>
                </thead>
             
                  @foreach ($sqli_rules as $rr)
                <tbody>
                
                  <tr>
                        <td>{{$rr->msg}}</td>
                        <td>{{$rr->content}}</td>
                         <td>{{$rr->ref}}</td>
                        <td>{{$rr->class_type}}</td>
                        <td>{{$rr->sid}}</td>
                        <td>{{$rr->rev}}</td>
                         <td>{{$rr->meta_data}}</td>
                        <td><a class="btn btn-primary" href="/rules/{{$rr->id}}" role="button">Details</a></td>  
                   
                  </tr>
               
                </tbody>
               @endforeach
              </table>
            </div>
          </div>
          
        </div>
@endsection

@extends('dashboard.pages.tables')

@section('table')


   <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Show Sqli Rules</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>msg</th>
                    <th>content</th>
                    <th>ref</th>
                    <th>class_type</th>
                    <th>sid</th>
                    <th>rev</th>
                    <th>meta_data</th>
                    <th>Delete sqli_rule || Edit </th>
                    
                  	<th> <a class="btn btn-primary" href="/rules" role="button">Back</a></th>
                    
                  </tr>
                </thead>
            
                <tbody>
                
                  <tr>
                    <td>{{$rules[0]->msg}}</td>
                    <td>{{$rules[0]->content}}</td>
                    <td>{{$rules[0]->ref}}</td>
                    <td>{{$rules[0]->class_type}}</td>
                     <td>{{$rules[0]->sid}}</td>
                    <td>{{$rules[0]->rev}}</td>
                    <td>{{$rules[0]->meta_data}}</td>
                    
                    <td>
                       <script>

                          function ConfirmDelete()
                          {
                          var x = confirm("Are you sure you want to delete?");
                          if (x)
                            return true;
                          else
                            return false;
                          }

                        </script>
                                             

                          {{ Form::open(['action' => ['rulesController@destroy' ,$rules[0]->id],'onsubmit' => 'return ConfirmDelete()', 'method' => 'post']) }}
                           

                          {{Form::hidden('_method','delete')}}
                          {{Form::submit('Delete',['class'=>'btn btn-danger' ,'role'=>'button'])}}
                        
                           <a class="btn btn-success" href="/rules/{{$rules[0]->id}}/edit" role="button">Edit</a>
                            
                          {{ Form::close() }}


           </td>
                
                  </tr>
                   
                </tbody>

              </table>
            </div>
          </div>
          
        </div>
@endsection
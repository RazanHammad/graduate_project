@extends('Dash.Layout.main')

@section('content')

{{ Form::open(['action' => 'sqliControllerv2@store' , 'method' => 'post','enctype'=>'multipart/form-data']) }}
 <div class="container-fluid">
  <div class="card mb-4">
 <div class="card-header">
    <i class="fas fa-table"></i>
      View All Sqli Rules
  </div>
              <div class="card-body">
 
 <div class="row">
  <div class="col-lg-4 col-md-12">
     
        
        {{Form::label('msg', 'Rule message')}}
          <br>
         {{Form::text('msg','',['placeholder'=>'msg','class'=>'form-control'])}}
                  <br>
          {{Form::label('content', 'Content')}}
          <br>
           {{Form::text('content','',['placeholder'=>'content','class'=>'form-control'])}}
          <br>
                {{Form::label('ref', 'Reference')}}
          <br>
            {{Form::text('ref','',['placeholder'=>'Reference','class'=>'form-control'])}}
          <br>
             {{Form::label('class_type', 'Class Type')}}
           <br>
           {{Form::text('class_type','',['placeholder'=>'class_type','class'=>'form-control'])}}
        </div>
      
        <div class="col-lg-4 col-md-12">
      
         {{Form::label('sid', 'Sid')}}
         <br>
         {{Form::text('sid','',['placeholder'=>'sid','class'=>'form-control'])}}
         <br>
           {{Form::label('rev', 'Rev')}}

           <br>
           {{Form::text('rev','',['placeholder'=>'rev','class'=>'form-control'])}}
           <br>
             {{Form::label('meta_data', 'Meta Data')}}

           <br>
           {{Form::text('meta_data','',['placeholder'=>'meta_data','class'=>'form-control'])}}
           <br>
           <br>
     {{Form::submit('Create',['class'=>'btn btn-primary btn-sm'])}}
      <a class="btn btn-primary btn-sm" href="/sqli" role="button">Back</a>
</div>
    </div>
  
</div>
</div>
</div>
  {{ Form::close() }}
@endsection
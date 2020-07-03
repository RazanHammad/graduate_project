@extends('dashboard.pages.index')

@section('title')
Create RoomRating

@endsection

@section('subtitle')

Create RoomRating

@endsection

@section('head')
Create RoomRating

@endsection
@section('content')

{{ Form::open(['action' => 'rulesController@store' , 'method' => 'post','enctype'=>'multipart/form-data']) }}
   <div class="row container">
 
  <div class="panel panel-default">
    
    <div class="panel-body">
  
      
        
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
        <br>
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
      <a class="btn btn-primary btn-sm" href="/rules" role="button">Back</a>

    </div>
  </div>
</div>
  {{ Form::close() }}
@endsection
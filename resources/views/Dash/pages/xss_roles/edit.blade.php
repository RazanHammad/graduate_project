@extends('Dash.Layout.main')

@section('content')

{{ Form::open(['action' => ['xssControllerv2@update' ,$rules[0]->id], 'method' => 'post','enctype'=>'multipart/form-data']) }}
 <div class="container-fluid">
 <div class="card mb-4">
 <div class="card-header">
    <i class="fas fa-table"></i>
      Edit XSS Rule
  </div>
              <div class="card-body">
 <div class="row">
  <div class="col-lg-4 col-md-12">

       {{Form::label('msg', 'Rule message')}}
          <br>
         {{Form::text('msg',$rules[0]->msg,['placeholder'=>'msg','class'=>'form-control'])}}
                  <br>
          {{Form::label('content', 'Content')}}
          <br>
           {{Form::text('content',$rules[0]->content,['placeholder'=>'content','class'=>'form-control'])}}
          <br>
                {{Form::label('ref', 'Reference')}}
          <br>
            {{Form::text('ref',$rules[0]->ref,['placeholder'=>'Reference','class'=>'form-control'])}}
          <br>
             {{Form::label('class_type', 'Class Type')}}
           <br>
           {{Form::text('class_type',$rules[0]->class_type,['placeholder'=>'class_type','class'=>'form-control'])}}
        <br>
         </div>
          <div class="col-lg-4 col-md-12">
         {{Form::label('sid', 'Sid')}}
         <br>
         {{Form::text('sid',$rules[0]->sid,['placeholder'=>'sid','class'=>'form-control'])}}
         <br>
           {{Form::label('rev', 'Rev')}}

           <br>
           {{Form::text('rev',$rules[0]->rev,['placeholder'=>'rev','class'=>'form-control'])}}
           <br>
             {{Form::label('meta_data', 'Meta Data')}}

           <br>
           {{Form::text('meta_data',$rules[0]->meta_data,['placeholder'=>'meta_data','class'=>'form-control'])}}
           
                  

        <br>
        <br>
              {{Form::hidden('_method','PUT')}}
     {{Form::submit('Update',['class'=>'btn btn-primary btn-sm'])}}
      <a class="btn btn-primary btn-sm" href="/xss" role="button">Back</a>
      <br>

    </div>
    

  </div>
</div>
</div>
</div>



  {{ Form::close() }}
@endsection
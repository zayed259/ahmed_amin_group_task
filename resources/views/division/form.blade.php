@include('partial.flash')
@include("partial.error")

<div class="form-group pb-3">
    {!! Form::label('name', 'Name', ['class' => 'form-label']); !!}
    {!! Form::text('name', null, ['required', 'class'=>'form-control', 'id'=>'name', 'placeholder'=>'Division Name']) !!}
</div>

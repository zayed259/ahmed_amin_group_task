@include('partial.flash')
@include("partial.error")

<div class="form-group pb-3">
    {!! Form::label('division_id', 'Division', ['class' => 'form-label']); !!}
    {!! Form::select('division_id', $divisions, null, ['required', 'class'=>'form-control', 'id'=>'division_id', 'placeholder'=>'Select Division']) !!}
</div>
<div class="form-group pb-3">
    {!! Form::label('name', 'Name', ['class' => 'form-label']); !!}
    {!! Form::text('name', null, ['required', 'class'=>'form-control', 'id'=>'name', 'placeholder'=>'Division Name']) !!}
</div>

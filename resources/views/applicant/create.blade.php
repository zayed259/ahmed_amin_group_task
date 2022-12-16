<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AA Group</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="card card-hover shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-info">Applicant Form</h6>
            </div>
            <div class="card-body">
                @include('partial.flash')
                @include("partial.error")
                {{Form::open(['route' => 'applicant.store','class'=>'user','enctype'=>'multipart/form-data'])}}
                <div class="form-group row mb-3">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}
                        {!! Form::text('name', null, ['required', 'class'=>'form-control', 'id'=>'name', 'placeholder'=>'Name']) !!}    
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
                        {!! Form::email('email', null, ['required', 'class'=>'form-control', 'id'=>'email', 'placeholder'=>'Email']) !!}
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <p>Address:</p>
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        {!! Form::label('division_id', 'Division', ['class' => 'form-label']) !!}
                        {!! Form::select('division_id', $divisions, null, ['required', 'class'=>'form-control', 'id'=>'division_id', 'placeholder'=>'Select Division']) !!}
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        {!! Form::label('district_id', 'District', ['class' => 'form-label']) !!}
                        {!! Form::select('district_id', $districts, null, ['required', 'class'=>'form-control', 'id'=>'district_id', 'placeholder'=>'Select District']) !!}
                    </div>
                    <div class="col-sm-4">
                        {!! Form::label('upozila_id', 'Upazila', ['class' => 'form-label']) !!}
                        {!! Form::select('upozila_id', $upozilas, null, ['required', 'class'=>'form-control', 'id'=>'upozila_id', 'placeholder'=>'Select Upazila']) !!}
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        {!! Form::label('address', 'Address Details', ['class' => 'form-label']) !!}
                        {!! Form::textarea('address', null, ['required', 'class'=>'form-control', 'id'=>'address', 'placeholder'=>'Address']) !!}
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                    <p>Programming Language:</p>
                    {!! Form::checkbox('language', 'php', false, ['class'=>'form-check-input language', 'id' => 'php']) !!}
                    {!! Form::label('php', 'PHP', ['class' => 'form-label']) !!}
                
                    {!! Form::checkbox('language', 'python', false, ['class'=>'form-check-input language', 'id' => 'python']) !!}
                    {!! Form::label('python', 'Python', ['class' => 'form-label']) !!}
                
                    {!! Form::checkbox('language', 'java', false, ['class'=>'form-check-input language', 'id' => 'java']) !!}
                    {!! Form::label('java', 'Java', ['class' => 'form-label']) !!}
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <p>Educational Qualification:</p>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        {!! Form::label('exam', 'Exam', ['class' => 'form-label']) !!}
                        {!! Form::select('exam[]', 
                        [
                            'ssc' => 'SSC',
                            'hsc' => 'HSC',
                            'honours' => 'Honours',
                            'masters' => 'Masters',
                        ]
                        , null, ['required', 'class'=>'form-control exam', 'placeholder'=>'Select']) !!}   
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        {!! Form::label('university', 'University', ['class' => 'form-label']) !!}
                        {!! Form::select('university[]', 
                        [
                            'du' => 'Dhaka University',
                            'ru' => 'Rajshahi University',
                            'ku' => 'Khulna University',
                            'cu' => 'Chittagong University',
                            'nu' => 'National University',
                        ]
                        , null, ['required', 'class'=>'form-control university', 'placeholder'=>'Select']) !!}   
                    </div>
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        {!! Form::label('board', 'Board', ['class' => 'form-label']) !!}
                        {!! Form::select('board[]', 
                        [
                            'dha' => 'Dhaka',
                            'raj' => 'Rajshahi',
                            'chu' => 'Chittagong',
                            'com' => 'Comilla',
                            'din' => 'Dinajpur',
                            'bar' => 'Barisal',
                            'syl' => 'Sylhet',
                            'jess' => 'Jessore',
                        ]
                        , null, ['required', 'class'=>'form-control board', 'placeholder'=>'Select']) !!}   
                    </div>
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        {!! Form::label('gpa', 'GPA', ['class' => 'form-label']) !!}
                        {!! Form::text('gpa[]', null, ['required', 'class'=>'form-control gpa', 'placeholder'=>'gpa']) !!}
                    </div>
                    <div class="col-sm-2">
                        {!! Form::label('action', 'Action', ['class' => 'form-label']) !!}
                        <a class="btn btn-primary" id="addMoreButton">+ Add More</a>
                    </div>
                </div>
                <div id="addMore"></div>
                {{-- <div class="form-group row mb-3">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        {!! Form::label('photo', 'Applicant Photo', ['class' => 'form-label']) !!}
                        {!! Form::file('photo', null, ['required', 'class'=>'form-control', 'id'=>'photo', 'placeholder'=>'Photo', 'accept'=>"image/x-png,image/gif,image/jpeg"]) !!}   
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('cv', 'Applicant CV', ['class' => 'form-label']) !!}
                        {!! Form::file('cv', null, ['required', 'class'=>'form-control', 'id'=>'cv', 'placeholder'=>'CV', 'accept'=>"application/pdf,application/msword"]) !!}
                    </div>
                </div> --}}
                <div class="form-group row mb-3">
                    <div class="col-sm-12 mt-3 mb-sm-0">
                        <p>Training:</p>
                        {{ Form::radio('training', 'yes', '', ['class'=>'form-check-input training', 'id' => 'yes']) }}
                        {{ Form::label('yes', 'Yes', ['class' => 'form-check-labe ']) }}
                    
                        {{ Form::radio('training', 'no', '', ['class'=>'form-check-input training', 'id' => 'no']) }}
                        {{ Form::label('no', 'No', ['class' => 'form-check-label']) }}
                    </div>
                </div>
                <div class="form-group row mb-3" id="training">
                    <div class="col-sm-5 mb-3 mb-sm-0">
                        {!! Form::label('training_name', 'Training Name', ['class' => 'form-label']) !!}
                        {!! Form::text('training_name', null, ['required', 'class'=>'form-control', 'placeholder'=>'Training Name']) !!}
                    </div>
                    <div class="col-sm-5 mb-3 mb-sm-0">
                        {!! Form::label('training_details', 'Training Details', ['class' => 'form-label']) !!}
                        {!! Form::text('training_details', null, ['required', 'class'=>'form-control', 'placeholder'=>'Training Details']) !!}
                    </div>
                    <div class="col-sm-2">
                        {!! Form::label('action', 'Action', ['class' => 'form-label']) !!}
                        <a class="btn btn-primary" id="addMoreTraining">+ Add More</a>
                    </div>
                </div>
                <div id="addTraining"></div>

                <div class="form-group">
                    {!! Form::submit('Submit Form', ['class'=>'btn btn-info btn-block', 'id'=>'submit']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{url('assets/js/jquery-3.6.0.min.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(document).ready(function(){
            function createselect(ob){
                $("#district_id").html("");
                let html = "";
                for (const key in ob) {
                    if (Object.hasOwnProperty.call(ob, key)) {
                        // const element = ob[key];
                        html += `<option value="${key}">${ob[key]}</option>`;
                    }
                }
                $("#district_id").html(html);
            }
            $("#division_id").change(function(){
                let URL = "{{url('get-districts')}}";
                $.ajax({
                    type : "GET",
                    url: URL + "/" + $(this).val(),
                    data : "data",
                    dataType: "json",
                    success: function (response) {
                        createselect(response);
                    }
                });
            });
            function createupazila(ob){
                $("#upozila_id").html("");
                let html = "";
                for (const key in ob) {
                    if (Object.hasOwnProperty.call(ob, key)) {
                        // const element = ob[key];
                        html += `<option value="${key}">${ob[key]}</option>`;
                    }
                }
                $("#upozila_id").html(html);
            }
            $("#district_id").change(function(){
                let URL = "{{url('get-upozilas')}}";
                $.ajax({
                    type : "GET",
                    url: URL + "/" + $(this).val(),
                    data : "data",
                    dataType: "json",
                    success: function (response) {
                        createupazila(response);
                    }
                });
            });
        });
        // add more button
        $(document).ready(function(){
            var i = 1;
            $("#addMoreButton").click(function(){
                i++;
                $("#addMore").append(`
                    <div class="form-group row mb-3" id="row${i}">
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            {!! Form::select('exam[]', 
                            [
                                'ssc' => 'SSC',
                                'hsc' => 'HSC',
                                'honours' => 'Honours',
                                'masters' => 'Masters',
                            ]
                            , null, ['required', 'class'=>'form-control exam', 'placeholder'=>'Select']) !!}
                        </div>
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            {!! Form::select('university[]', 
                            [
                                'du' => 'Dhaka University',
                                'ru' => 'Rajshahi University',
                                'ku' => 'Khulna University',
                                'cu' => 'Chittagong University',
                                'nu' => 'National University',
                            ]
                            , null, ['required', 'class'=>'form-control university', 'placeholder'=>'Select']) !!}   
                        </div>
                        <div class="col-sm-2 mb-3 mb-sm-0">
                            {!! Form::select('board[]', 
                            [
                                'dha' => 'Dhaka',
                                'raj' => 'Rajshahi',
                                'chu' => 'Chittagong',
                                'com' => 'Comilla',
                                'din' => 'Dinajpur',
                                'bar' => 'Barisal',
                                'syl' => 'Sylhet',
                                'jess' => 'Jessore',
                            ]
                            , null, ['required', 'class'=>'form-control board', 'placeholder'=>'Select']) !!}   
                        </div>
                        <div class="col-sm-2 mb-3 mb-sm-0">
                            {!! Form::text('gpa[]', null, ['required', 'class'=>'form-control gpa', 'placeholder'=>'gpa']) !!}
                        </div>
                        <div class="col-sm-2">
                            <button class="btn btn-danger remove" id="${i}">- Remove</button>
                        </div>
                    </div>
                `);
            });
            $(document).on('click', '.remove', function(){
                var button_id = $(this).attr("id");
                $("#row"+button_id+"").remove();
            });
        });
        // yes button click
        $(document).ready(function(){
            $("#training").hide();
            $("#yes").click(function(){
                $("#training").show();
            });
            $("#no").click(function(){
                $("#training").hide();
            });
        });
        // add more training
        $(document).ready(function(){
            var i = 1;
            $("#addMoreTraining").click(function(){
                i++;
                $("#addTraining").append(`
                    <div class="form-group row mb-3" id="row${i}">
                        <div class="col-sm-5 mb-3 mb-sm-0">
                        {!! Form::text('training_name', null, ['required', 'class'=>'form-control', 'placeholder'=>'Training Name']) !!}
                    </div>
                    <div class="col-sm-5 mb-3 mb-sm-0">
                        {!! Form::text('training_details', null, ['required', 'class'=>'form-control', 'placeholder'=>'Training Details']) !!}
                    </div>
                        <div class="col-sm-2">
                            <button class="btn btn-danger remove" id="${i}">- Remove</button>
                        </div>
                    </div>
                `);
            });
            $(document).on('click', '.remove', function(){
                var button_id = $(this).attr("id");
                $("#row"+button_id+"").remove();
            });
        });

        // education qualification table value insert into database
        $(document).ready(function(){
            $("#submit").click(function(){
                // checkbox value get
                var language = [];
                $.each($("input[name='language']:checked"), function(){
                    language.push($(this).val());
                });
                // checkbox value get
                var training = [];
                $.each($("input[name='training']:checked"), function(){
                    training.push($(this).val());
                });
                // alert($("#division_id").val());
                var id = [];
                var exam = [];
                var university = [];
                var board = [];
                var gpa = [];
                $('.id').each(function(){
                    id.push($(this).val());
                });
                $('.exam').each(function(){
                    exam.push($(this).val());
                });
                $('.university').each(function(){
                    university.push($(this).val());
                });
                $('.board').each(function(){
                    board.push($(this).val());
                });
                $('.gpa').each(function(){
                    gpa.push($(this).val());
                });
                // alert(gpa);
                $.ajax({
                    url: "{{url('education-qualification')}}",
                    type: "POST",
                    data: {
                        name : $("#name").val(),
                        email : $("#email").val(),
                        division : $("#division_id").val(),
                        district : $("#district_id").val(),
                        upozila : $("#upozila_id").val(),
                        address : $("#address").val(),
                        language : language,
                        // photo : $("#photo").val(),
                        // cv : $("#cv").val(),
                        training : training,
                        exam:exam,
                        university:university,
                        board:board,
                        gpa:gpa,
                    },
                    success: function(response){
                        console.log(response);
                        location.reload();
                    },
                    error: function(response){
                        console.log(response);
                    }
                });
            });
        });


    </script>
</body>
</html>
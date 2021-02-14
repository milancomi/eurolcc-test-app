@extends('layouts.app')

@section('content')
    @if (Session::has('userData') && Session::has('projectData'))

        <div class="container mt-5">
            <h1 class="text-center">Declare tasks for <b>{{ Session::get('userData')->name }}</b><br /> in <b>
                    {{ Session::get('projectData')->name }} </b>project.
            </h1>
        </div>
    @endif
    <div class="container w-50 mt-3">
        <div class="bg-white p-5">
            <div class="form align-items-center">


                <div class="container">
                    <form method="POST" action="{{ route('task.store') }}">

                        {{ csrf_field() }}
                        @if (Session::has('error'))
                            <div class="alert alert-danger">
                                Select all necessary informations.
                            </div>
                        @endif
                        @if (Session::has('userData') && Session::has('projectAssignmentData'))
                            <input type="hidden" id="user_id" name="user_id" value="{{ Session::get('userData')->id }}">
                            <input type="hidden" id="project_assignment_id" name="project_assignment_id"
                                value="{{ Session::get('projectIdData') }}">
                        @endif
                        @foreach ($tasks as $task)
                            <div class="form-check mt-3">
                                <input type="checkbox" class="form-check-input mr-4 checks" id="idCheck{{ $task->id }}"
                                    name="tasks[]" value='{{ $task->id }}' />
                                <label class="form-check-label ml-3"
                                    for="idCheck{{ $task->id }}">{{ $task->name }}</label>
                            </div>
                        @endforeach
                        <div class="form-group row mt-3">
                            <div class="col-sm-10">
                                <button type="submit" id="submit" class="btn btn-primary mx-auto d-block "
                                    style="letter-spacing: 1px;">Assign tasks</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script>
$('#submit').prop("disabled", true);
$('input:checkbox').click(function() {
 if ($(this).is(':checked')) {
 $('#submit').prop("disabled", false);
 } else {
 if ($('.checks').filter(':checked').length < 1){
 $('#submit').attr('disabled',true);}
 }
});
    </script>
@endsection

@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <h1 class="text-center">Assign project to worker:</h1>
    </div>

    <div class="container w-50 mt-3">
        <div class="bg-white p-5">
            <div class="form align-items-center">

                <form method="POST" action="{{ route('asssignment.store') }}">
                    {{ csrf_field() }}
                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            Select all necessary informations.
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="user">Workers</label>
                        <select class="form-control" name="user" id="user">
                            <option value="0">-- Pick worker --</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="project">Projects</label>
                        <select class="form-control" name="project" id="project">
                            <option value=0>-- Choose project --</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}">Job in : &nbsp;&nbsp;{{ $project->name }}</option>
                            @endforeach
                        </select>
                        <div class="form-group row mt-3">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary mx-auto d-block "
                                    style="letter-spacing: 1px;">Assign job</button>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>

@endsection

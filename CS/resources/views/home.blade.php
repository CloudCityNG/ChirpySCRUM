@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col m2">
            <div class="input-field">
                <input type="text" id="cs-global-search">
                <label for="cs-global-search">Search</label>
            </div>
        </div>

        <div class="col m10">
            <task-module></task-module>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'Laravel API - update pet')

@section('content')
    @if($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
        <div class="col-auto">
            <br>
            <br>
           <form id="petForm" method="post">
            @csrf
            @method('PUT') 
                <label for="jsonText">JSON Data:</label>
                <textarea id="jsonText" name="json_data" rows="10" cols="40" placeholder="Enter your JSON data here..."
                required>@if(!empty($jsonText)){{ $jsonText }}@endif</textarea>
        
                <button type="submit" style="border-color: white">Ok</button>
            </form>
        </div>
        <br><br>
        Response:
        @if(!empty($data))
                {{ $data }}
        @endif
    @endsection

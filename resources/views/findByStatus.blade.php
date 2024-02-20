@extends('layouts.app')

@section('title', 'Laravel API - find by status')
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
                <form id="petForm" method="get">
                    <label for="status">Select status</label>
                    
                    <select multiple class="" id="status" name="status[]">
                        <option value="available">available</option>
                        <option value="pending">pending</option>
                        <option value="sold">sold</option>
                    </select>
                    <button type="submit" style="border-color: white">Ok</button>
                </form>
            </div>
            <br><br>
            Response:
            @if(!empty($data))
                 {{ $data }}
            @endif
    @endsection

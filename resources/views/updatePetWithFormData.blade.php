@extends('layouts.app')

@section('title', 'Laravel API - update pet with form data')

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
        <form method="post">
            @csrf
            @method('PUT') 
            <tr data-param-name="petId " data-param-in="formData">
                <td class="parameters-col_description">
                    <div class="markdown">
                        <p>petId</p>
                    </div><input type="number" class="" title="" name="petId" id="petId" value="@if(!empty($petId)){{ $petId }}@endif" required>
                </td>
            </tr>
            <tr data-param-name="additionalMetadata" data-param-in="formData">
                <td class="parameters-col_description">
                    <div class="markdown">
                        <p>Name</p>
                    </div><input type="text" class="" title="" name="name" id="name" value="@if(!empty($name)){{ $name }}@endif">

                </td>
            </tr>
            <tr data-param-name="file" data-param-in="formData">
                <td class="parameters-col_description">
                    <div class="markdown">
                        <p>Status</p>
                    </div><input type="text" class="" id="status" name="status" title="">
                </td>
            </tr>

            <button type="submit" style="border-color: white">Ok</button>
        </form>
    </div>
        <br><br>
        Response:
        @if(!empty($data))
                {{ $data }}
        @endif
@endsection

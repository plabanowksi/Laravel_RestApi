@extends('layouts.app')

@section('title', 'Laravel API - upload image')

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
        <form method="post" enctype="multipart/form-data">
            @csrf
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
                        <p>Additional data to pass to server</p>
                    </div><input type="text" class="" title="" name="additionalMetadata" id="additionalMetadata" value="@if(!empty($additionalMetadata)){{ $additionalMetadata }}@endif">

                </td>
            </tr>
            <tr data-param-name="file" data-param-in="formData">
                <td class="parameters-col_description">
                    <div class="markdown">
                        <label for="file" class="form-label">Choose a file</label>
                    </div>
                    <input type="file" class="form-control" id="file" name="file">
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

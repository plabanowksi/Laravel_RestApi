@extends('layouts.app')

@section('title', 'Laravel API - delete pet')

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
               <form id="petForm" method="delete">
                <label for="petId">Insert Pet Id for Delete:</label>
                <input type="number" id="petId" name="petId" value="@if(!empty($petId)){{ $petId }}@endif" required>
                <!-- Move the button inside the form -->
                <button type="submit" style="border-color: white">Ok</button>
               </form>
          </div>
          <br><br>
          Response:
          @if(!empty($data))
               {{ $data }}
          @endif
    @endsection


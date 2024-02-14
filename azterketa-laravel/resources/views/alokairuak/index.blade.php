@extends('app')


@section('content')


Pertsonak
<form action="{{route('alokairua.store')}}" method="POST">
@csrf


@if (session('success'))
  <h6 class="alert alert-success">{{session('success')}}</h6>
@endif


@error('izena')
<h6 class="alert alert-success">{{$message}}</h6>
@enderror


  <div class="mb-3">
    <label for="alokIzena" class="form-label">Alokatzaile izena:</label>
    <input type="text" class="form-control" name="alokIzena">

    <label for="yatea" class="form-label">Lana:</label>
<select name="yate_id" class="form-control">
  @foreach ($yateak as $yatea)
    <option value="{{ $yatea->id }}">{{ $yatea->izena }}</option>
  @endforeach
</select>

  </div>
  <button type="submit" class="btn btn-primary">Gehitu</button>
</form>


<div>
    @foreach ($alokairuak as $alokairua)
    <div class="row py-1">
        <div class="col-md-9 d-flex align-items-center">
            <p class="info"><a href="{{ route('alokairua.show', ['id' => $alokairua->id]) }}">{{ $alokairua->alokIzena }}</a><p>
        </div>
        
        <div class="col-md-3 d-flex justify-content-end">
            <form action="{{ route('alokairua.destroy', [$alokairua->id]) }}" method="POST">
              @method('DELETE')
              @csrf
              <button class="btn btn-danger btn-sm">Ezabatu</button>
            </form>
        </div>
    </div>
    @endforeach
</div>





@endsection

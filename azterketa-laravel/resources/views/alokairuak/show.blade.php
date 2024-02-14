@extends('app')


@section('content')


<div>
    <form action="{{ route('alokairua.update', $alokairua->id) }}" method="POST">
    @method('PATCH')
    @csrf


    @if (session('success'))
      <h6 class="alert alert-success">{{session('success')}}</h6>
    @endif


    @error('izena')
    <h6 class="alert alert-success">{{$message}}</h6>
    @enderror
    <div class="mb-3">
      <label for="alokIzena" class="form-label">Alokatzaile izena: </label>
      <input type="text" class="form-control" name="alokIzena" value="{{$alokairua->alokIzena}}">

    <label for="yatea" class="form-label">Lana:</label>
<select name="yate_id" class="form-control">
    @foreach ($yateak as $yatea)
        <option value="{{ $yatea->id }}" @if ($yatea->id == $alokairua->yate_id) selected @endif>{{ $yatea->izena }}</option>
    @endforeach
</select>
    
      
    </div>
    <button type="submit" class="btn btn-primary">Eguneratu</button>
  </form>
</div>
@endsection

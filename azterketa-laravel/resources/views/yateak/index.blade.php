@extends('app')

@section('content')

<form action="/yateak" method="POST">
  @csrf

  @if (session('success'))
    <h6 class="alert alert-success">{{ session('success') }}</h6>
  @endif

  @error('izena')
    <h6 class="alert alert-danger">{{ $message }}</h6>
  @enderror

  <div class="mb-3">
    <label for="izena">Yatearen izena: </label>
    <input type="text" class="form-control" name="izena">
    <label for="fabUrtea">Fabrikazio urtea: </label>
    <input type="text" class="form-control" name="fabUrtea">
    <label for="pertsonaKop">Pertsona kopuru maximoa: </label>
    <input type="text" class="form-control" name="pertsonaKop">
  </div>
  <button type="submit" class="btn btn-primary">Sortu yatea</button>
</form>

<div>
  @foreach ($yateak as $yatea)
    <div class="row py-1">
      <div class="col-md-3 d-flex align-items-center">
        <a href="{{ route('yateak.update', ['id' => $yatea->id]) }}">{{ $yatea->izena }}</a>
      </div>

      <div class="col-md-3 d-flex justify-content-end">
        <form action="{{ route('yateak.destroy', ['id' => $yatea->id]) }}" method="POST">
          @method('DELETE')
          @csrf
          <button class="btn btn-danger btn-sm">Ezabatu</button>
        </form>
      </div>
    </div>
  @endforeach
</div>
@endsection

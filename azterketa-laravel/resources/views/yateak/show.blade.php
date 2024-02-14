@extends('app')

@section('content')

<div class="container w-25 border p-4 mt-4">
    <form action="{{ route('yateak.update', ['id' => $yatea->id]) }}" method="POST">
        @method('PATCH')
        @csrf
      
        @if (session('success'))
          <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
      
        @error('izena')
        <h6 class="alert alert-danger">{{ $message }}</h6>
        @enderror
      
        <div class="mb-3">
            <label for="izena" class="form-label">  Yatearen izena: </label>
            <input type="text" class="form-control" name="izena" value="{{ $yatea->izena }}">
            <label for="fabUrtea" class="form-label">Fabrikazio urtea: </label>
            <input type="number" class="form-control" name="fabUrtea" value="{{ $yatea->fabUrtea }}">
            <label for="pertsonaKop" class="form-label">Pertsona kopuru maximoa: </label>
            <input type="number" class="form-control" name="pertsonaKop" value="{{ $yatea->pertsonaKop }}">
        </div>
        <button type="submit" class="btn btn-primary">Yatea eguneratu</button>
    </form>
</div>

@endsection

@extends('layouts.app')
@section('title','Filmek')
@section('content')
<h1>Filmek</h1>
<a href="{{ route('films.create') }}">Új film</a>
<table border=1>
  <thead><tr><th>FKOD</th><th>Cím</th><th>Műfaj</th><th>Hossz</th><th>Műveletek</th></tr></thead>
  <tbody>
    @foreach($films as $f)
      <tr>
        <td>{{ $f->fkod }}</td>
        <td><a href="{{ route('films.show', $f) }}">{{ $f->filmcim }}</a></td>
        <td>{{ $f->mufaj }}</td>
        <td>{{ $f->hossz }}</td>
        <td>
          <a href="{{ route('films.edit',$f) }}">Edit</a>
          <form action="{{ route('films.destroy',$f) }}" method="POST" style="display:inline">
            @csrf @method('DELETE')
            <button type="submit">Töröl</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
{{ $films->links() }}
@endsection

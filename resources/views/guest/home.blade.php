@extends('layouts.guest')

@section('content')
<section class="container mt-5">
  <h1>{{ $title }}</h1>

  <div class="row rows-col-5 g-3">

    @forelse($projects as $project)
      <div class="col">
        @if (!empty($project))
          <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-start">{{ $project->title }} {!! $project->getCategoryBadge() !!}
            </div>
            <div class="card-body">
              {{ $project->getAbstract(150) }}
            </div>

            <div class="card-footer">
              <a class="btn btn-primary" href="{{ route('guest.projects.detail', $project->id) }}"> vedi</a>
            </div>
          </div>
        @endif
      </div>
    @empty
      <div class="col-12">
        <h2>Non ci sono ancora progetti pubblicati</h2>
      </div>
    @endforelse
  </div>

  <a href="{{ route('guest.projects.all') }}">Vedi tutti</a>

  {{-- {{ $posts->links('pagination::bootstrap-5') }} --}}

</section>
<section class="container mt-5">
  <h1>Altra sezione...</h1>



</section>
@endsection
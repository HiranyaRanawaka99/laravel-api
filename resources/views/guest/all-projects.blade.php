@extends('layouts.guest')

@section('content')
  @dump($projects)
  <section class="container mt-5">
    <h1>{{ $title }}</h1>

    <div class="row g-3">

      @forelse($projects as $project)
        <div class="col-4">
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
          <h2>Non ci sono ancora dei projetti pubblicati</h2>
        </div>
      @endforelse
    </div>

    {{ $projects->links('pagination::bootstrap-5') }}

  </section>
@endsection

@extends('layouts.app')

@section('content')
<div id="colorlib-project" class="colorlib-project">
    <div class="colorlib-narrow-content">
        <div class="row animate-box" data-animate-effect="fadeInLeft">
            <div class="col-md-6 col-md-offset-3 col-md-pull-3 text-center">
                <span class="heading-meta">Projek</span>
                <h2 class="colorlib-heading">Melayani Pembuatan</h2>
            </div>
        </div>

        <div class="row row-bottom-padded-md">
            @foreach($projects as $project)
                <div class="col-md-4 col-sm-6 animate-box" data-animate-effect="fadeInUp">
                    <div class="project" style="background-image: url('{{ asset('storage/' . $project->image) }}');">
                        <div class="desc">
                            <div class="con">
                                <h3><a href="#">{{ $project->title }}</a></h3>
                                <span>{{ $project->category ?? 'Tanpa Kategori' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-md-12 text-center animate-box">
                {{ $projects->links() }}
            </div>
        </div>
    </div>
</div>

@include('partials.get_in_touch')
@endsection

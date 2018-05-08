@extends('template.main', ['title' => 'Dashboard'])
@section('content')
<div class="container" id="dashboardApp">
    <h3>Dashboard<hr /></h3>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-content="page">Dashboard</li>
        </ol>
    </nav>

    <div class="row">
        {{-- Sidebar --}}
        <div class="col-xs-12 col-sm-3 col-md-3">
            {{-- Clients --}}
            <ul class="list-group">
                <li v-for="client in clientList" :key="client.id" class="list-group-item">
                    @{{client.name}}
                </li>
            </ul>
        </div>

        {{-- Main content list --}}
        <div class="col-xs-12 col-sm-9 col-md-9">
            <em class="text-muted">// TODO: Overview, recent entries</em>
        </div>
    </div>
</div>
@endsection

{{-- Javascript --}}
@push('javascript')
<script src="{{ asset('js/dashboard.js') }}"></script>
@endpush
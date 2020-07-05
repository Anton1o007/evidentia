@extends('layouts.app')

@section('title', 'Gestionar evidencias de '.Auth::user()->coordinator->comittee->name)

@section('title-icon', 'fas fa-clipboard-check')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/{{$instance}}">Home</a></li>
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('content')

    <x-evidencelistcoordinator />

    <div class="row">
        <div class="col-lg-12 mt-3">

            <x-status/>

            <div class="card">

                <div class="card-body">
                    <table id="dataset" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Título</th>
                            <th>Alumna/o</th>
                            <th>Horas</th>
                            <th>Recibida</th>
                            <th>Estado</th>
                            <th>Herramientas</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($evidences as $evidence)
                            <tr>
                                <td>
                                    <a href="{{route('coordinator.evidence.view',
                                                ['instance' => $instance, 'id' => $evidence->id])}}">
                                        {{$evidence->title}}
                                    </a>
                                </td>
                                <td>{{$evidence->user->surname}}, {{$evidence->user->name}}</td>
                                <td>{{$evidence->hours}}</td>
                                <td> {{ \Carbon\Carbon::parse($evidence->created_at)->diffForHumans() }} </td>
                                <td>
                                    <x-evidencestatus :evidence="$evidence"/>
                                </td>

                                <td>
                                    <x-evidenceoptionscoordinator :evidence="$evidence"/>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>

            </div>

            {{ $evidences->links() }}

        </div>
    </div>

@endsection

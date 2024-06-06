@extends('layouts.auth-app')
@section('link')
    <link href="{{ asset('assets/css/table.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Categories</h1>
        <nav>
            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Categories</li>

            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <div class="card pt-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">

                <a href=""><button type="button" class="btn btn-primary">Create Press Release</button></a>
            </div>

            <table class="table table-bordered border-primary">
                <thead>
                    <tr>
                        <th >#</th>
                        <th >Name</th>


                        <th  style="width: 80px !important">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ctegories as $category)
                    <tr>
                        <th scope="row">{{++$i}}</th>
                        <td>
                           {{ $category->name}}
                        </td>

                        <td class="px-1">
                            <div class="d-flex justify-content-between">
                                <a href="">
                                    <i class="bi bi-pencil-square action_i"></i>
                                </a>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End Primary Color Bordered Table -->
        </div>
    </div>

    <div class="card-body d-flex justify-content-center">
        <nav aria-label="...">
            <ul class="pagination">
                {{ $ctegories->links() }}
            </ul>
        </nav>
    </div>

    @extends('layouts.modal')
@endsection
@section('js-scripts')
    <script src="{{ asset('assets/back/js/modal.js') }}"></script>
@endsection
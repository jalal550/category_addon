
@extends('dashboard.master')
@section("title")
    <title> Category List</title>
@endsection

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4> Category Management</h4>
                <h6> Category  List</h6>
            </div>
            <div class="page-btn">
                <a href="{{ route('categories.create') }}" class="btn btn-added">
                    <img src="{{ asset('resources/assets/img/icons/plus.svg') }}" class="me-1" alt="img">Add New
                </a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-top">
                    <div class="search-set">
                        <div class="search-path">

                        </div>
                        <div class="search-input">

                            <a class="btn btn-searchset" ><img
                                        src="{{ asset('resources/assets/img/icons/search-white.svg') }}" alt="img"></a>
                        </div>
                    </div>

                </div>
                <div class="table-responsive">
                    <table class="table datanewAjax" id="example">
                        <thead>
                        <tr>

                            <th width="60px">Serial No.</th>
                            <th class="no-sort" data-orderable="false">Name</th>

                            <th class="no-sort" data-orderable="false"> Description </th>


                            <th width="100px" class="no-sort">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>
                                    <div class="d-flex justify-content-between">

                                        <a title="edit" class="edit-btn  me-3" href="{{ route('categories.show', $category->id) }}">
                                            <i class="fas fa-eye fa-lg text-warning"></i>
                                        </a>
                                        <a title="edit" class="edit-btn me-3" href="{{ route('categories.edit', $category->id) }}">
                                            <i class="fas fa-edit fa-lg text-primary"></i>
                                        </a>
                                        <a title="delete" href="{{ route('categories.destroy', $category->id) }}" class="delete-btn">
                                        <i class="fas fa-trash fa-lg text-danger"></i>
                                        </a>
                                    </div>'

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('script')


@endsection







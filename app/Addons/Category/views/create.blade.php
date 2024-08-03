
@extends('dashboard.master')
@section("title")
    <title> Category Create</title>
@endsection

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4> Category Management</h4>
                <h6> Category  Create</h6>
            </div>
        </div>
        <div class="card">
            <div class="card-body">


                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter category name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description" rows="3" placeholder="Enter category description" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>



@endsection
@section('script')


@endsection







@extends('admin.master')
@section('main-content')
    <div class="row">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="well">
                @if($message=Session::get('message'))
                    <h3 class="text-center text-success">{{$message}}</h3>
                @endif
                <h3 class="text-center text-success">Update Category</h3>
                <form name="editCategoryForm" class="form-horizontal" method="post" action="{{url('/category/updateCategory')}}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2">Category Name</label>
                        <div class="col-sm-10">
                            <input type="text" value="{{$category_info->category_name}}" name="category_name" class="form-control">
                            <input type="hidden" value="{{$category_info->id}}" name="category_id" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2">Category Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="10" name="category_description">{{$category_info->category_description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2">Publication Status</label>
                        <div class="col-sm-10">
                            <select name="publication_status"  class="form-control">
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2"></label>
                        <div class="col-sm-10">
                            <input type="submit" class="btn btn-success btn-block" name="btn" value=" Update Category Info">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.forms['editCategoryForm'].elements['publication_status'].value='{{$category_info->publication_status}}';
    </script>
@endsection
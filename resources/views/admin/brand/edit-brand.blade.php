@extends('admin.master')
@section('main-content')
    <div class="row">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="well">
                @if($message=Session::get('message'))
                    <h3 class="text-center text-success">{{$message}}</h3>
                @endif
                <h3 class="text-center text-success">Update Brand</h3>
                <form name="editbBrandorm" class="form-horizontal" method="post" action="{{url('/brand/updateBrand')}}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2">Brand Name</label>
                        <div class="col-sm-10">
                            <input type="text" value="{{$BrabdInfo->brand_name}}" name="brand_name" class="form-control">
                            <input type="hidden"  value="{{$BrabdInfo->id}}" name="brand_id" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2">Brand Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="10" name="brand_description">{{$BrabdInfo->brand_description}}</textarea>
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
                            <input type="submit" class="btn btn-success btn-block" name="btn" value=" Update Brand Info">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>

        document.forms['editbBrandorm'].elements['publication_status'].value='{{$BrabdInfo->publication_status}}';
    </script>
@endsection
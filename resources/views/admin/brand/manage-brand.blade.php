@extends('admin.master');

@section('main-content')

    <div class="row" >
        <div class="col-sm-offset-2 panel panel-default">
            <h2 class="text-center text-warning">Manage Brand</h2>
            @if($message=Session::get('message'))
                <h3 class="text-success text-center">{{$message}}</h3>
            @endif

            <div class="panel-body">
                <table class=" table table-bordered table-hover">
                    <tr>
                        <th>Brand ID</th>
                        <th>Brand Name</th>
                        <th>Brand Description</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach($manageBrand as $brand)
                        <tr>
                            <td>{{$brand->id}}</td>
                            <td>{{$brand->brand_name}}</td>
                            <td>{{$brand->brand_description}}</td>
                            <td>{{$brand->publication_status==1 ? 'Published' : 'Unpublished' }}</td>
                            <td>
                                <a href="{{url('/brand/edit-brand/'.$brand->id)}}" class="btn btn-success">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                @if($brand->publication_status==1)
                                <a href="{{url('/brand/unpublished-brand/'.$brand->id)}}" class="btn btn-info">
                                    <span class="glyphicon glyphicon-arrow-up"></span>
                                </a>
                                @else
                                    <a href="{{url('/brand/published-brand/'.$brand->id)}}" class="btn btn-warning">
                                        <span class="glyphicon glyphicon-arrow-down"></span>
                                    </a>
                                    @endif
                                <a data-target="#myModal"  data-whatever="{{$brand->id}}"   data-toggle="modal"   class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>


    {{--**/delete Modal/**--}}
    < <link rel="stylesheet" href="{{asset('/admin')}}/css/style.css.php">

    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="material-icons"><span class="glyphicon glyphicon-remove"></span></i>
                    </div>
                    <h4 class="modal-title">Are you sure?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <form id="modal_form"  method="post" action="{{route('brand/delete-brand')}}">
                    {{csrf_field()}}
    <div class="modal-body">
        <p>Do you really want to delete these records? This process cannot be undone.</p>

        <input type="text" style="display:none"   id="ba_id" name="brand_id" value="" >
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <input type="submit"  class="btn btn-danger" value="Delete" />
    </div>
    </form>
    </div>
    </div>
    </div>



    <script>
        

        $('#myModal').on('show.bs.modal', function (event){
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            var modal = $(this)
            modal.find('.modal-body input').val(recipient)
        })

    </script>

@endsection
@extends('backend.layout.master')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Product View</h3>
                        </div>
                        <script src="//code.jquery.com/jquery-1.12.3.js"></script>
                        <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
                        <script
                                src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
                        <link rel="stylesheet"
                              href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
                        <link rel="stylesheet"
                              href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
                        <!-- /.box-header -->
                        <div class="box-body">

                            <script>
                                $(document).ready(function() {
                                    $('#table').DataTable;
                                } );
                            </script>

                            <table class="table table-striped table-hover table-bordered" id="table">
                                <thead>
                                <tr>
                                    <th> S. No. </th>
                                    <th> Category Name</th>
                                    <th> Status </th>
                                    <th> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($category)>0)
                                    @forelse($category as $key=>$newCategory)
                                        <tr>
                                            <td> {{++$key}} </td>
                                            <td> {{$newCategory->name}} </td>
                                            <td class="center">{{$newCategory->status}} </td>
                                            <td>
                                                <div class="col-md-12 pull-right">
                                                    <div class="col-md-2">
                                                        <a href="{{route('category.show',$newCategory->id)}}" class="btn btn-default"><i class="fa fa-eye"></i></a>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="{{route('category.edit',$newCategory->id)}}" class="btn btn-default"><i class="fa fa-edit"></i></a>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <form action="{{route('category.destroy',$newCategory->id)}}" method="post">
                                                            {{csrf_field()}}
                                                            {{method_field('DELETE')}}
                                                            <button class="btn btn-default" title="Delete"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                @endif
                                </tbody>
                            </table>

                        </div>

                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>


    </div>

@endsection
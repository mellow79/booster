@extends('app')
@section('content')
    <!-- Call to Action Well -->
    <div class="text-center">
        <div class="card-body">

            @if(isset($data))
                <div class="rating-demo">
                <table class="table table-striped table-bordered table-condensed">
                    <thead>
                    <tr>
                        <th>Fundraiser Name</th>
                        <th>Review</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>
                                <h6 class="text-primary">{{ $item->fundraiser_name }}</h6>
                                <div id="fundraiser-{{ $item->id }}">
                                    <input type="hidden" name="rating" id="rating" value="{{ $item->rating }}"/>
                                    <ul>
                                        @for($i=1;$i<=5;$i++)
                                            @php $selected = "" @endphp
                                            @if(!empty($item->rating) && $i<= $item->rating)
                                                @php $selected = "selected" @endphp
                                            @endif
                                            <li class='{{ $selected }}'>★
                                            </li>
                                        @endfor
                                    </ul>
                                </div>
                            </td>
                            <td><a class="btn btn-link" href="{{ url('/review/'.$item->id) }}">Review and Comment</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            @endif
        </div>
    </div>

    <!-- Call to Action Well -->
    <div class="card bg-dark my-4 text-center">
        <div class="card-body">
            <p class="text-white m-0">Don't see your a fundraiser you'd like to review?
                <a href="#myModal" role="button" class="btn btn-large btn-primary" data-toggle="modal">CREATE A FUNDRAISER</a>
            </p>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body wrapper">
                    <img class="img-responsive" src="{{asset('/images/tent-2.jpg')}}" >
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">More Info</a>
                </div>
            </div>
        </div>
        <!-- /.col-md-4 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body wrapper">
                    <img class="img-responsive" src="{{asset('/images/tech-2.jpg')}}" >
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">More Info</a>
                </div>
            </div>
        </div>
        <!-- /.col-md-4 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body wrapper">
                    <img class="img-responsive" src="{{asset('/images/HIW-char-1.jpg')}}" >
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">More Info</a>
                </div>
            </div>
        </div>
        <!-- /.col-md-4 -->

    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>

                </div>
                <h4 class="modal-title text-center">NEW FUNDRAISER</h4>
                <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                    <form id="new_fundraiser_form" class="form-horizontal">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="col-xs-3 control-label">Fundraiser Name</label>
                            <div class="col-xs-5">
                                <input type="text" class="form-control" name="new_fundraiser" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-5 col-xs-offset-3 pull-left">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" value="Save">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
@endsection
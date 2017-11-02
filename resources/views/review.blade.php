@extends('app')
@section('content')
    <!-- Call to Action Well -->
    <div class="rating-demo">
        @if(isset($sql_data))

            @foreach($sql_data as $data)
                @if(count($sql_data))

                    @php $rate_times = $data->total_reviews @endphp
                    @php $rate_value = round($data->rating/$rate_times,1) @endphp
                    @php $rate_bg = (($rate_value)/5)*100 @endphp

                @else
                    @php $rate_times = 0 @endphp
                    @php $rate_value = 0 @endphp
                    @php $rate_bg = 0 @endphp
                @endif
                <h3 class="text-primary">{{ $data->fundraiser_name }}</h3>
                <div id="fundraiser-{{ $data->id }}">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <input type="hidden" name="rating" id="rating" value="{{ $data->rating }}"/>
                    <ul onMouseOut="resetRating({{ $data->id }})">
                        @for($i=1;$i<=5;$i++)
                            @php $selected = "" @endphp
                            @if(!empty($rate_value) && $i<= $rate_value)
                                @php $selected = "selected" @endphp
                            @endif
                            <li class='{{ $selected }}' onmouseover="highlightStar(this,'{{ $data->id }}');"
                                onmouseout="removeHighlight('{{ $data->id }}');"
                                onClick="addRating(this,'{{ $data->id }}');"><i class="fa fa-star"></i>
                            </li>
                        @endfor
                    </ul>
                </div>
                <hr>
                <div class="box-result-cnt">

                    <hr>
                    <h3>This Fundraiser has been rated <strong>{{ $rate_times }}</strong> times.</h3>
                    <hr>
                    <h3>The average rating is <strong>{{ $rate_value }}</strong> stars.</h3>
                    <hr>
                        @endforeach
                    <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div id="commentContainer">
                                    <p>Leave a review/comment on what you thought of the fundraiser</p>
                                    <form id="comment-form">
                                        <textarea name="review"
                                                  required
                                                  class="form-control"
                                                  id="review"
                                                  placeholder="Write a Review...">
                                        </textarea>
                                        <div style="display: block;">
                                            <div id="">
                                                <fieldset>
                                                    <div class="form-group">
                                                    <label for="reviewer_email">Email (Required)</label>
                                                    <input type="email"
                                                           name="reviewer_email"
                                                           required
                                                           class="form-control"
                                                           id="reviewer_email">
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="form-group">
                                                    <label for="reviewer_name">Name (Required)</label>
                                                    <input type="text"
                                                           required
                                                           name="reviewer_name"
                                                           class="form-control"
                                                           id="reviewer_name">
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <input type="submit" name="submit" class="form-button"
                                                   id="submit" value="Post Comment">
                                            <span id="jp-carousel-comment-form-spinner">&nbsp;</span>
                                        </div>
                                    </form>
                                </div><!-- /rate-result-cnt -->
                            </div>
                        </div>


                </div><!-- /tuto-cnt -->

        @endif
    </div>
    <!-- /.row -->
@endsection
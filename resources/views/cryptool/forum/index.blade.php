@extends('cryptool.forum.layout')

@section('content')
    @foreach($lastMessages as $message)
        <div class="container-fluid mt-100 col-lg-6 pt-5">
            <div class="row pt-5">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="media flex-wrap w-100 align-items-center">
                                <div class="media-body ml-3"> <h5  data-abc="true">{{$message->user->name}}</h5>
                                    <div class="text-muted small">{{$message->created_at}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>{{$message->message}}</p>
                        </div>
                        <div class="card-footer d-flex flex-wrap justify-content-between align-items-center px-0 pt-0 pb-3">
                            <div class="px-4 pt-3"> <p class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> <i class="fa fa-heart text-danger"></i>&nbsp; <span class="align-middle">445</span> </p> <span class="text-muted d-inline-flex align-items-center align-middle ml-4"> </span> </div>
                            <div class="px-4 pt-3"> <button type="button" class="btn btn-primary"><i class="ion ion-md-create"></i>&nbsp; Add Comment</button> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card my-4">
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="comment">Leave a comment:</label>
                                <textarea class="form-control" rows="3" id="comment"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

                <div class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" src="https://via.placeholder.com/50x50" alt="">
                    <div class="media-body">
                        <h5 class="mt-0">Username</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                    </div>
                </div>

                <div class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" src="https://via.placeholder.com/50x50" alt="">
                    <div class="media-body">
                        <h5 class="mt-0">Username</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                    </div>
                </div>

                <!-- Add more comments here -->

            </div>
        </div>
    </div>

@stop

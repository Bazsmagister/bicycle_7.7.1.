@extends('layouts.app')

@section('content')



<form class="text-center border border-light p-5" action="/users" method="POST">
    @csrf
    <p class="h4 mb-4">Edit User</p>

    <div class="form-row mb-4">
        <div class="col">
            <!-- First name -->
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="Name">
        </div>

    </div>

    <!-- E-mail -->
    <label for="email">Email</label>
    <input type="email" id="email" name="email" class="form-control mb-4" placeholder="E-mail"
        value="{{ old('email') }}">

    <!-- Password -->
    <label for="password">Password</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password"
        value="{{ old('password') }}" aria-describedby="defaultRegisterFormPasswordHelpBlock">
    <small id="password" class="form-text text-muted mb-4">
        At least 8 characters and 1 digit
    </small>

    <!-- Phone number -->
    <label for="phone">Phone</label>
    <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone number"
        value="{{ old('phone') }}" aria-describedby="defaultRegisterFormPhoneHelpBlock">
    <small id="phone" class="form-text text-muted mb-4">
        Optional - for two step authentication
    </small>

    {{-- <!-- Newsletter -->
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="defaultRegisterFormNewsletter">
        <label class="custom-control-label" for="defaultRegisterFormNewsletter">Subscribe to our newsletter</label>
    </div> --}}

    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Submit</button>

    <!-- Social register -->
    {{-- <p>or sign up with:</p>

    <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-twitter light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-github light-blue-text"></i></a> --}}

    <hr>

    <!-- Terms of service -->
    {{-- <p>By clicking
        <em>Sign up</em> you agree to our
        <a href="" target="_blank">terms of service</a> --}}

</form>



<span data-toggle="tooltip" data-original-title="Click To Upload Picture">
    <a class="btn btn-info btn-block text-white" data-toggle="modal" data-target="#upload-picture{{ $user->id }}"
        data-original-title="Picture">
        <b>Upload My Picture</b>
    </a>
</span>

<div class="modal fade" id="upload-picture{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('update_picture',['id'=>$user->id])}}" method="post" id="update-picture-form"
                enctype="multipart/form-data">

                {{ csrf_field() }}
                @method('PUT')
                <div class="modal-header">
                    Self-Review Comment
                </div>
                <div class="col-md-12">
                    <div class="text-center">

                        @if($user->user_image != '')
                        <input type="image" src="{{ URL::to('/') }}/public/storage/users/image/{{ $user->user_image }}"
                            class="profile-user-img img-fluid img-circle" id="wizardPicturePreview" title="" width="150"
                            height="165" disabled />
                        <!--<input  type="file" name="user_image" id="wizard-picture" class="" hidden>-->
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <input type="file" name="user_image" id="wizard-picture" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                </div>
                            </div>
                        </div>
                        @else
                        <input type="image" {{-- src="{{asset('theme/adminlte3/dist/img/default.png')}}" --}}
                            class="profile-user-img img-fluid img-circle" id="wizardPicturePreview" title="" width="150"
                            height="150" disabled />
                        <!--<input  type="file" name="user_image" id="wizard-picture" class="" hidden>-->
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <input type="file" name="user_image" id="wizard-picture" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="upload_pic_btn-submit" class="btn btn-success btn-ok">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

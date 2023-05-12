<x-app-layout>
    @livewireStyles
    @vite('resources/css/profile.css')
    @vite('resources/css/status.css')
    <div style="padding-top: 130px">
        <div class="container rounded bg-white mb-5">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        @livewire('photo', ['user' => $user])
                        <span class="font-weight-bold"> {{$user->full_name}} </span>
                        <span class="text-black-50"> {{$user->email}} </span>
                    </div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">{{ __('cryptool.profile.title') }}</h4>
                            </div>

                            <div class="col-md-12">
                                <label class="labels">{{ __('cryptool.profile.full_name') }}</label>
                                <input type="text" class="form-control" placeholder="cryptool.profile.full_name" value="{{ $user->full_name }}">
                            </div>

                            <div class="col-md-12">
                                <label class="labels">{{ __('cryptool.profile.email') }}</label>
                                <input type="text" class="form-control" value="{{ $user->email }}" readonly>
                            </div>


                            <br>
                        </div>

                        <div>
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">Personal Information</h4>
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">{{ __('cryptool.profile.label.institute') }}</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">{{ __('cryptool.profile.department') }}</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">{{ __('cryptool.profile.course') }}</label>
                                    <input type="number" min="1" max="5" class="form-control" value="">
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @livewireScripts
</x-app-layout>


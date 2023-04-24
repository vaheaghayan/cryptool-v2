<x-app-layout>
    @vite('resources/css/profile.css')
    @vite('resources/css/status.css')
    <div style="padding-top: 130px">
        <div class="container rounded bg-white mb-5">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">Edogaru</span><span class="text-black-50">edogaru@mail.com.my</span><span> </span></div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">{{ __('cryptool.profile.title') }}</h4>
                            </div>

                            <div class="col-md-12">
                                <label class="labels">{{ __('cryptool.profile.full_name') }}</label>
                                <input type="text" class="form-control" placeholder="additional details" value="">
                            </div>

                            <div class="col-md-12">
                                <label class="labels">{{ __('cryptool.profile.label.email') }}</label>
                                <input type="text" class="form-control" placeholder="experience" value="">
                            </div>
                            <div class="col-md-12">
                                <br>
                                <label class="labels">{{ __('crypSettingstool.profile.label.status') }}</label>
                                <p class="status open">Verified</p>
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
                                    <input type="text" class="form-control" placeholder="experience" value="">
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">{{ __('cryptool.profile.department') }}</label>
                                    <input type="text" class="form-control" placeholder="additional details" value="">
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">{{ __('cryptool.profile.course') }}</label>
                                    <input type="number" min="1" max="5" class="form-control" placeholder="additional details" value="">
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

{{--<x-app-layout>--}}
{{--    @vite('resources/css/profile.css')--}}
{{--    <div style="padding-top: 5%" class="container rounded bg-white">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-3 border-right">--}}
{{--                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">Edogaru</span><span class="text-black-50">edogaru@mail.com.my</span><span> </span></div>--}}
{{--            </div>--}}
{{--            <div class="col-md-5 border-right">--}}
{{--                <div class="p-3 py-5">--}}
{{--                    <div class="d-flex justify-content-between align-items-center mb-3">--}}
{{--                        <h4 class="text-right">Profile Settings</h4>--}}
{{--                    </div>--}}
{{--                    <div class="row mt-2">--}}
{{--                        <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" placeholder="first name" value=""></div>--}}
{{--                    </div>--}}
{{--                    <div class="row mt-3">--}}
{{--                        <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" value=""></div>--}}
{{--                        <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text" class="form-control" placeholder="enter address line 1" value=""></div>--}}
{{--                        <div class="col-md-12"><label class="labels">Address Line 2</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>--}}
{{--                        <div class="col-md-12"><label class="labels">Postcode</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>--}}
{{--                        <div class="col-md-12"><label class="labels">State</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>--}}
{{--                        <div class="col-md-12"><label class="labels">Area</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>--}}
{{--                        <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value=""></div>--}}
{{--                        <div class="col-md-12"><label class="labels">Education</label><input type="text" class="form-control" placeholder="education" value=""></div>--}}
{{--                    </div>--}}
{{--                    <div class="row mt-3">--}}
{{--                        <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value=""></div>--}}
{{--                        <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="state"></div>--}}
{{--                    </div>--}}
{{--                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-4">--}}
{{--                <div class="p-3 py-5">--}}
{{--                    <div class="d-flex justify-content-between align-items-center experience">--}}
{{--                        <span>{{ __('cryptool.profile.edit_email_or_full_name') }}</span>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-12">--}}
{{--                        <label class="labels">{{ __('cryptool.profile.label.email') }}</label>--}}
{{--                        <input type="text" class="form-control" placeholder="experience" value="">--}}
{{--                    </div>--}}
{{--                    <br>--}}
{{--                    <div class="col-md-12">--}}
{{--                        <label class="labels">{{ __('cryptool.profile.full_name') }}</label>--}}
{{--                        <input type="text" class="form-control" placeholder="additional details" value="">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</x-app-layout>--}}


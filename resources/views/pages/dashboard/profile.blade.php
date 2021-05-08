<div class="text-center mt-5">
    <h3>{{ "$user->first_name $user->last_name" }}<span class="font-weight-light"></span>
    </h3>
    <div class="h6 font-weight-300 text-lowercase"><i class="ni location_pin mr-2"></i>{{ $user->email }}
    </div>
    <div class="h6 mt-4 heading"><i class="ni business_briefcase-24 mr-2"></i>
        Course of Interest
    </div>
    <div style="font-weight: 600"><i class="ni education_hat mr-2"></i>{{ $user->course }}</div>
</div>
<div class="mt-5 py-5 border-top text-center">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <p>{{ $user->bio ?? "Your bio will be displayed here. Edit your bio in the profile section, tell us something interesting about yourself." }}</p>
            {{-- <a href="javascript:;">Show more</a> --}}
        </div>
    </div>
</div>

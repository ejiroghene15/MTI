<div class="form-wrapper">

    <form method="POST" action="{{ route('update_profile') }}" class="form-row">
        @csrf
        <div class="col-md-6">
            <div class="form-group">
                <label for="">First Name</label>
                <input type="text" class="form-control form-control-alternative" name="fname"
                    value="{{ $user->first_name }}" autocomplete="off">
                @error('fname') <p class="form-error">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="">Last Name</label>
                <input type="text" class="form-control form-control-alternative" name="lname"
                    value="{{ $user->last_name }}" autocomplete="off">
                @error('lname') <p class="form-error">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="">Email Address</label>
                <input class="form-control form-control-alternative" value="{{ $user->email }}" readonly>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="">Phone Number</label>
                <input type="text" class="form-control form-control-alternative" name="phone"
                    value="{{ $user->phone_number }}" autocomplete="off">
                @error('phone') <p class="form-error">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="">Bio</label>
                <textarea rows="6" class="form-control form-control-alternative" name="bio"
                    placeholder="A bit about yourself"> {{ $user->bio }} </textarea>
            </div>
        </div>

        <div class="form-group w-100 text-center py-4">
            <button class="btn btn-default text-capitalize">Update Profile</button>
        </div>

    </form>

</div>

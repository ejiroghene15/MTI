<div class="form-wrapper">

    <form action="{{ route('upload_profile_pix') }}" method="post" enctype="multipart/form-data" class="mb-5">
        @csrf
        <h5 class="mb-3">Change your profile image</h5>
        <div class="form-group">
            <label for="">Profile Picture</label>
            <input type="file" class="form-control dropify" name="profilepix" accept="image/*"
                data-default-file="https://res.cloudinary.com/https-midastouchacademy-com/image/upload/v1618693692/mti_logo.jpg">
            @error('profilepix') <p class=" form-error text-danger">{{ $message }}</p> @enderror
        </div>

        <button class="btn btn-default text-capitalize">Change image</button>

    </form>

    <form method="POST" action="{{ route('update_password') }}" class="form-row">
        @csrf
        <h5 class="mb-3">Change your password</h5>
        <div class="col-md-12">
            <div class="form-group">
                <label for="">Enter old password</label>
                <input type="password" class="form-control form-control-alternative" name="old_password">
                @error('old_password') <p class="form-error">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="">New Password</label>
                <input type="password" class="form-control form-control-alternative" name="password">
                @error('new_password') <p class="form-error">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="">Confirm New Password</label>
                <input type="password" class="form-control form-control-alternative" name="confirm_password">
                @error('confirm_password') <p class="form-error">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="form-group w-100 pb-3">
            <button class="btn btn-default text-capitalize">Change password</button>
        </div>

    </form>

</div>

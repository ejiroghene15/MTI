<div class="table-responsive">
    <table class="dt table table-striped table-bordered w-100">
        <thead class="bg-default text-light">
            <tr>
                <th></th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Course</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td><a href="javascript:;" class="avatar avatar-lg rounded-circle">
                        <img alt="Image placeholder"
                            src="{{ $user->picture ?? 'https://res.cloudinary.com/https-midastouchacademy-com/image/upload/v1618693692/mti_logo.jpg'}}"
                            width="58" height="58">
                    </a></td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->course }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

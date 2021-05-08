<section>
    <div class=" btn btn-primary mb-3" data-toggle="modal" data-target="#new_course">Add a course</div>
    <div class="modal fade" id="new_course" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">
                        Add a Course
                    </h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <form method="POST" action="{{ route('create_course') }}" class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Course Name </label>
                        <input type="text" name="course_name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Course background image </label>
                        <input type="text" name="course_background" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Assign Tutor</label>
                        <select name="tutor" class="form-control form-control-alternative" required>
                            @foreach ($users as $user)
                            @if (Str::lower($user->role) == "tutor")
                            <option value="{{ $user->id }}">{{ "$user->first_name $user->last_name" }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Excerpt </label>
                        <textarea name="excerpt" class=" form-control" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Course Description (little summary about the course) </label>
                        <textarea name="course_description" class=" form-control" rows="5" required></textarea>
                    </div>

                    <button class="btn btn-success mt-3">Add Course</button>
                </form>

            </div>
        </div>
    </div>
</section>

<div class="row">
    <div class="table-responsive">
        <table class="dt table table-striped table-bordered w-100">
            <thead class="bg-default text-light">
                <tr>
                    <th>Course</th>
                    <th>Course Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->course_title}}</td>
                    <td>{{ Str::words($course->course_description, 20)  }}</td>
                    <td class="d-flex">
                        <button class="btn btn-sm btn-default text-capitalize" style="white-space: nowrap"
                            data-toggle="modal" data-target="#editcourse{{ $course->id  }}">Edit Course</button>
                        <form action="{{ route('delete_course') }}" method="post" class="d-inline-block">
                            @csrf
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <input type="hidden" name="course_name" value="{{ $course->course_title }}">
                            <button class="btn btn-sm btn-warning text-capitalize delete_course"
                                style="white-space: nowrap">Delete Course</button>
                        </form>

                        <div class="modal fade" id="editcourse{{ $course->id  }}" tabindex="-1" role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title" id="modal-title-default">
                                            {{ $course->course_title }}
                                        </h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>

                                    <form method="post" action="{{ route('update_course') }}" class="modal-body">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Course Name </label>
                                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                                            <input type="text" name="course_title" class="form-control"
                                                value="{{ $course->course_title }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Course background image </label>
                                            <input type="text" name="course_background" class="form-control"
                                                value="{{ $course->image }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Assign Tutor</label>
                                            <select name="tutor" class="form-control form-control-alternative" required>
                                                @foreach ($users as $user)
                                                @if (Str::lower($user->role) == "tutor")
                                                <option value="{{ $user->id }}" @if($course->tutor_id == $user->id)
                                                    selected @endif >{{ "$user->first_name $user->last_name" }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Excerpt </label>
                                            <textarea name="excerpt" class=" form-control"
                                                rows="3">{{ $course->excerpt }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Course Description (little summary about the course) </label>
                                            <textarea name="course_description" class=" form-control"
                                                rows="10">{{ $course->course_description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success">Save</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</div>

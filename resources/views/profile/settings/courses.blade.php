<div class="table-responsive my-4">
    <table class="dt table table-striped table-bordered w-100 overflow-auto">
        <thead class="bg-default text-light">
            <tr>
                <th>Courses Registered</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses_registered as $course)
            @foreach ($user->class_info->where('link_id', $course->event_link_id) as $cd)

            <tr>
                <td class="pl-0">
                    <div class="d-flex">
                        <img src="{{ $cd->image }}" alt="" height="100" width="150"
                            class="d-none d-lg-block d-md-block">
                        <div class="d-flex flex-column justify-content-around ml-3">
                            <span>
                                <strong>{{ $cd->name}} </strong>
                            </span>

                            <span class="d-block pt-2">{{ $cd->excerpt}}</span>

                            <div>
                                <a href="{{ $cd->course_outline }}" target="_blank"
                                    class="btn btn-sm btn-secondary text-capitalize d-inline-block mt-3">
                                    <i class="fa fa-book mr-2"></i>Course Outline
                                </a>
                                <a href="{{ config('app.url') }}/class/{{ $cd->link_id }}" target="_blank"
                                    class="btn btn-sm btn-default text-capitalize d-inline-block mt-3">
                                    View Class Details
                                </a>
                            </div>
                            <p class="mb-0 mt-3 d-inline-block btn btn-sm btn-success text-capitalize" style="width: fit-content; margin-top: 1em">Zoom Class Link: {{ $cd->class_link }}</p>
                        </div>

                    </div>
                </td>
            </tr>
            @endforeach
            @endforeach
        </tbody>
    </table>
</div>

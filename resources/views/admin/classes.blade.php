<section>
    <div class=" btn btn-primary mb-3" data-toggle="modal" data-target="#new-class">New Class</div>
    <div class="modal fade" id="new-class" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">
                        Add a New Class
                    </h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <form method="POST" action="{{ route('create_class') }}" class="modal-body">
                    @csrf

                    <div class="form-group">
                        <label for="">Price </label>
                        <input type="text" name="price" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Original Price </label>
                        <input type="text" name="original_price" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Class Name Eg: (Graphic Design Basics) </label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Tutor</label>
                        <select name="tutor" class="form-control form-control-alternative" required>
                            @foreach ($users as $user)
                            @if (Str::lower($user->role) == "tutor")
                            <option value="{{ $user->id }}">{{ "$user->first_name $user->last_name" }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Class background image </label>
                        <input type="text" name="background" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Class Course Outline </label>
                        <input type="text" name="outline" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Class Start </label>
                        <input type="date" name="start" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Class End </label>
                        <input type="date" name="end" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Closing Date for registration
                        </label>
                        <input type="date" name="close_reg" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Excerpt </label>
                        <textarea name="excerpt" class=" form-control" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Description </label>
                        <textarea name="description" class=" form-control" rows="5" required></textarea>
                    </div>

                    <button class="btn btn-success mt-3">Save</button>
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
                    <th>Classes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classes as $class)
                <tr>
                    <td>
                        <div class="d-flex">
                            <img src="{{ $class->image }}" alt="" height="100" width="150">
                            <div class="d-flex flex-column justify-content-around ml-3">
                                <span class="btn btn-sm btn-info text-capitalize mb-2 align-self-start">Price:
                                    {{ $class->price }} <s>{{ $class->original_price }}</s></span>
                                <span>
                                    <strong>{{ $class->name}} </strong>
                                </span>
                                <span class="d-block py-2">{{ $class->excerpt}}</span>

                                <div>
                                    <button class="btn btn-sm btn-default text-capitalize" data-toggle="modal"
                                        data-target="#editclass{{ $class->id  }}">
                                        Edit Class
                                    </button>
                                    <form action="{{ route('delete_class') }}" method="post" class="d-inline-block">
                                        @csrf
                                        <input type="hidden" name="event_id" value="{{ $class->id }}">
                                        <input type="hidden" name="event_name" value="{{ $class->name }}">
                                        <button class="btn btn-sm btn-warning text-capitalize delete_course"
                                            style="white-space: nowrap">Delete Class</button>
                                    </form>
                                    <a href="{{ $class->course_outline }}" target="_blank"
                                        class="btn btn-sm btn-success text-capitalize">
                                        Course Outline
                                    </a>
                                    <a href="{{ config('app.url') }}/class/{{ $class->link_id }}" target="_blank"
                                        class="btn btn-sm btn-dark text-capitalize">
                                        View Class
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="editclass{{ $class->id  }}" tabindex="-1" role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title" id="modal-title-default">
                                            {{ $class->name }}
                                        </h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>

                                    <form method="POST" action="{{ route('update_class') }}" class="modal-body">
                                        @csrf
                                        <input type="hidden" name="class_id" value="{{ $class->id }}">

                                        <div class="form-group">
                                            <label for="">Price </label>
                                            <input type="text" name="price" class="form-control"
                                                value="{{ str_replace(',', '', $class->price) }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Original Price </label>
                                            <input type="text" name="original_price" class="form-control"
                                                value="{{ str_replace(',', '', $class->original_price) }}">
                                        </div>

                                        <div class="form-group">
                                            <label for=""> Name </label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $class->name }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Tutor</label>
                                            <select name="tutor" class="form-control form-control-alternative" required>
                                                @foreach ($users as $user)
                                                @if (Str::lower($user->role) == "tutor")
                                                <option value="{{ $user->id }}">
                                                    {{ "$user->first_name $user->last_name" }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Class Image </label>
                                            <input type="text" name="background" class="form-control"
                                                value="{{ $class->image }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Class Course Outline </label>
                                            <input type="text" name="outline" value="{{ $class->course_outline }}"
                                                class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Class Start </label>
                                            <input type="date" name="start" value="{{ $class->start }}"
                                                class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Class End </label>
                                            <input type="date" name="end" value="{{ $class->end }}"
                                                class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Closing Date for registration
                                            </label>
                                            <input type="date" name="close_reg" class="form-control" value="{{ $class->end_registration }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Excerpt </label>
                                            <textarea name="excerpt" class=" form-control"
                                                rows="3">{{ $class->excerpt }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Event Details </label>
                                            <textarea name="description" class=" form-control" rows="5"
                                                required>{{ $class->description }}</textarea>
                                        </div>
                                        <button class="btn btn-success mt-3">Save</button>
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
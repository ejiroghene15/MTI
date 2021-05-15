<section>
    <div class=" btn btn-primary mb-3" data-toggle="modal" data-target="#up">New Event</div>
    <div class="modal fade" id="up" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">
                        Add an Event. Eg: (An upcoming class)
                    </h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <form method="POST" action="{{ route('create_event') }}" class="modal-body">
                    @csrf

                    <div class="form-group">
                        <label for="">Type (Eg, A class, seminar/discussion)</label>
                        <select name="type" class="form-control form-control-alternative" required>
                            <option value="class">Class</option>
                            <option value="seminar">Seminar</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Price (should be filled only if the event is an upcoming class) </label>
                        <input type="text" name="price" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Event Name Eg: (Graphic Design Basics) </label>
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
                        <label for="">Event background image </label>
                        <input type="text" name="background" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Excerpt </label>
                        <textarea name="excerpt" class=" form-control" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Event Details </label>
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
                    <th>Events</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($upcoming as $event)
                <tr>
                    <td>
                        <div class="d-flex">
                            <img src="{{ $event->image }}" alt="" height="100" width="150">
                            <div class="d-flex flex-column justify-content-around ml-3">
                                <span
                                    class="badge badge-info text-capitalize mb-2 align-self-start">{{ $event->type }}</span>
                                <span>
                                    <strong>{{ $event->name}} </strong>
                                </span>
                                <span class="d-block py-2">{{ $event->excerpt}}</span>
                                <div>
                                    <button class="btn btn-sm btn-default text-capitalize" data-toggle="modal"
                                        data-target="#editevent{{ $event->id  }}">
                                        Edit
                                        Event</button>
                                    <form action="{{ route('delete_event') }}" method="post" class="d-inline-block">
                                        @csrf
                                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                                        <input type="hidden" name="event_name" value="{{ $event->name }}">
                                        <button class="btn btn-sm btn-warning text-capitalize delete_course"
                                            style="white-space: nowrap">Delete Event</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="editevent{{ $event->id  }}" tabindex="-1" role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title" id="modal-title-default">
                                            {{ $event->name }}
                                        </h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>

                                    <form method="POST" action="{{ route('update_event') }}" class="modal-body">
                                        @csrf
                                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                                        <div class="form-group">
                                            <label for="">Type (Eg, A class, seminar/discussion)</label>
                                            <select name="type" class="form-control form-control-alternative" required>
                                                <option value="class" @if($event->type == "class") selected @endif>Class
                                                </option>
                                                <option value="seminar" @if($event->type == "seminar") selected
                                                    @endif>Seminar</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Price (should be filled only if the event is an upcoming
                                                class) </label>
                                            <input type="text" name="price" class="form-control"
                                                value="{{ $event->price ?? null }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Event Name Eg: (Graphic Design Basics) </label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $event->name }}" required>
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
                                            <label for="">Event background image </label>
                                            <input type="text" name="background" class="form-control"
                                                value="{{ $event->image }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Excerpt </label>
                                            <textarea name="excerpt" class=" form-control"
                                                rows="3">{{ $event->excerpt }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Event Details </label>
                                            <textarea name="description" class=" form-control" rows="5"
                                                required>{{ $event->description }}</textarea>
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

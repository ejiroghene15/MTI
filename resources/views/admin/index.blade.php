@extends('layout.master')
@section('title', 'Admin')
@section('styles')
@parent
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/bs4/dt-1.10.24/r-2.2.7/sb-1.0.1/sp-1.2.2/datatables.min.css" />
@endsection
@if (session('authenticated'))

@section('body')
@include('partials.admin_nav')

<main id="admin_page">

    <div class="container-fluid my-3">
        <div class="row">
            <div class="col">
                <!-- Tabs with icons -->
                <div class="mb-3">
                    <h5 class="text-uppercase font-weight-bold">Site Statictics</h5>
                </div>

                @if (session('message'))
                <x-alert :type="session('type')" :message="session('message') " />
                @endif

                <div class="nav-wrapper">
                    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0 active" data-toggle="tab" href="#users" role="tab"
                                aria-selected="true">
                                <i class="fa fa-users mr-2"></i>Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                href="#tutors" role="tab">
                                <i class="fa fa-user mr-2"></i>
                                Tutors
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0" data-toggle="tab" href="#courses" role="tab"
                                aria-selected="false"><i class="fa fa-book mr-2"></i>Courses
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab"
                                href="#tabs-icons-text-3" role="tab" aria-selected="false"><i
                                    class="ni ni-money-coins mr-2"></i>Payments</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab"
                                href="#upcoming-courses" role="tab" aria-selected="false">
                                <i class="fa fa-calendar-plus-o mr-2"></i>Upcoming Courses</a>
                        </li>
                    </ul>
                </div>

                <div class="card shadow">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="users" role="tabpanel">
                                @include('admin.users')
                            </div>
                            <div class="tab-pane fade" id="tutors" role="tabpanel">
                                @include('admin.tutors')
                            </div>
                            <div class="tab-pane fade" id="courses" role="tabpanel">
                                @include('admin.courses')
                            </div>
                            <div class="tab-pane fade" id="upcoming-courses" role="tabpanel">
                                @include('admin.upcoming')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
@endsection

@endif


@section('js')
@parent
<script type="text/javascript"
    src="https://cdn.datatables.net/v/bs4/dt-1.10.24/r-2.2.7/sb-1.0.1/sp-1.2.2/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('.dt').DataTable();

        $(".delete_course").on("click", function(e){
            e.preventDefault();
            let _form = $(this).parent();
            swal({
                title: "Are you sure?",
                text: "This action is irreversible.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    console.log(willDelete);
                    _form.submit();
                } else {
                    return null
                }
            });
        })
    });
</script>
@if (!session('authenticated'))
<script>
    swal({
    text: '4 pix 1 word and some spaces in between',
    content: {
        element: "input",
        attributes: {
            type: "password",
        },
  },
    button: {
        text: "Verify",
        closeModal: false,
    },
    }).then(password => {
        if (!password) throw null;
         fetch(`/api/verify/${password}`).then(res => res.text()).then(res => {
            console.log(res);

             if(res == "true"){
                location.reload(true)
             }else{
                swal(`Wrong Answer, redirecting you in 3sec`, {
                    buttons: false,
                });
                setTimeout(() => {
                    window.location = 'https://midastouchacademy.com';
                }, 5000);
             }
         });
    })
</script>
@endif
@endsection

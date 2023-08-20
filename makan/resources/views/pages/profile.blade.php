@extends('layouts.detail')

@section('title')
    Makan - Profile
@endsection

@section('content')

<div class="container mt-lg-5">
    <div class="main-body">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://ui-avatars.com/api/?name={{ $user->name }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                            <div class="mt-3">
                                <h4>{{$user->name}}</h4>
                                <p class="text-black-50 mb-1">{{$user->roles}}</p>

                                <div class="h5 text-black-50">Member</div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <ul class="list-group list-group-flush">

                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram me-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                                <span class="text-black-50">bootdey</span>
                            </li>
                            
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                                {{-- <img src="" alt="" srcset=""> --}}
                                <span class="text-black-50">bootdey</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsectionp

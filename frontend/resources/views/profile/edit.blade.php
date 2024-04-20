@extends('layouts.app')

@section('content')

    <div class="py-12 card">
        <div class="card-body">
            <h2 class="font-semibold text-xl text-black leading-tight mb-5">
                {{ __('Profile') }}
            </h2>
            <div class="max-w-7xl mx-auto flex items-start gap-5">
                <div class="bg-white text-black">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
    
                <div class="bg-white text-black">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
    
                <div class="bg-white text-black">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection

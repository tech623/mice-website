@if($currentStep == 1)
<div class="card">
    <div class="card-body login-card-body mb-5">
        <div class="text-center login-box-msg-header mb-3">Welcome! 👋</div>
        <p class="login-box-msg">Please enter your email address</p>

        <div class="input-group mb-3">
            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email" autofocus wire:model.defer="email" placeholder="Enter your Email Id" />
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <button wire:click="firstStepSubmit" wire:loading.attr="disabled" class="btn-block btnRounded">
            <span wire:loading.remove>Proceed</span>
            <span wire:loading>Processing..</span>
        </button>
        <br/>
        <button data-toggle="modal" data-target="#registerModel" id="clickRegisterModel" class="btn-block btn-white">
            Sign Up
        </button>
        @include('partials.login-with-social')
    </div>
</div>
@elseif($currentStep == 2)
<div class="card">
    <div class="card-body login-card-body mb-5">
        <h6 class="text-center login-box-msg-header">Good to see you again!</h6>
        <p class="login-box-msg">Please log in</p>
        @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        <div class="input-group mb-3">
            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" autocomplete="password" autofocus wire:model.defer="password" placeholder="Enter your Password" />
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            
        </div>
        <button type="button" wire:click="submitForm" id="sadasd" wire:loading.attr="disabled" class="btn-block btnRounded">
            <span wire:loading.remove>Proceed</span>
            <span wire:loading>Please wait...</span>
        </button>

        <button wire:click="back(1)" id="saasdasdasd" wire:loading.attr="disabled" class="btn-block btn-white">
            <span wire:loading.remove><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M12.5264 7.3364H5.07969L8.33302 4.08306C8.59302 3.82306 8.59302 3.3964 8.33302 3.1364C8.20847 3.01156 8.03937 2.94141 7.86302 2.94141C7.68668 2.94141 7.51758 3.01156 7.39302 3.1364L2.99969 7.52973C2.73969 7.78973 2.73969 8.20973 2.99969 8.46973L7.39302 12.8631C7.65302 13.1231 8.07302 13.1231 8.33302 12.8631C8.59302 12.6031 8.59302 12.1831 8.33302 11.9231L5.07969 8.66973H12.5264C12.893 8.66973 13.193 8.36973 13.193 8.00306C13.193 7.6364 12.893 7.3364 12.5264 7.3364Z" fill="black" />
                </svg> Go Back</span>
            <span wire:loading>Please wait...</span>
        </button>
    </div>
</div>
@elseif($currentStep == 3)
<div class="card">    
    <script>
        window.location.href = "{{ route('web-login.profile') }}";
    </script>
    <div class="card-body login-card-body mb-5 text-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="81" viewBox="0 0 80 81" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M40.0013 7.16797C21.6013 7.16797 6.66797 22.1013 6.66797 40.5013C6.66797 58.9013 21.6013 73.8346 40.0013 73.8346C58.4013 73.8346 73.3346 58.9013 73.3346 40.5013C73.3346 22.1013 58.4013 7.16797 40.0013 7.16797ZM40.0013 67.168C25.3013 67.168 13.3346 55.2013 13.3346 40.5013C13.3346 25.8013 25.3013 13.8346 40.0013 13.8346C54.7013 13.8346 66.668 25.8013 66.668 40.5013C66.668 55.2013 54.7013 67.168 40.0013 67.168ZM33.3346 47.7346L52.9346 28.1346C54.2346 26.8346 56.368 26.8346 57.668 28.1346C58.968 29.4346 58.968 31.5346 57.668 32.8346L35.7013 54.8013C34.4013 56.1013 32.3013 56.1013 31.0013 54.8013L22.368 46.168C21.068 44.868 21.068 42.768 22.368 41.468C22.9907 40.8438 23.8362 40.493 24.718 40.493C25.5997 40.493 26.4452 40.8438 27.068 41.468L33.3346 47.7346Z" fill="#F47E27" />
        </svg>
        <h6 class="text-center login-box-msg-header">Success</h6>
        <p class="login-box-msg">You are being redirected...</p>
    </div>
</div>
@endif

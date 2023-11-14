@vite(['public/bootstrap.min.css','public/bootstrap.min.js','resources/testSid/showStyle.css'])
<div class="row align-items-center justify-content-center g-0 min-vh-100 forgotDiv">
    <div class="col-lg-5 col-md-8 py-8 py-xl-0">
        <!-- Card -->
        <div class="card shadow">
            <!-- Card body -->
            <div class="card-body p-6">
                <div class="mb-4">
                    <img src="public/images/forgot-password.png" class="mb-4" >
                    <h1 class="mb-1 fw-bold">Forgot Password</h1>
                    <p>Fill the form to reset your password.</p>
                </div>
                    <!-- Form -->
                <form method="POST" action="{{route('forgotPasswordPost')}}">
                    @csrf
                        <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" id="email" class="form-control" name="email" placeholder="Enter Your Email " >
                        @error('email')
                          <p class=" text-danger">{{ $message }}</p>
                            @enderror
                    </div>
                        <!-- Button -->
                    <div class="mb-3 d-grid">
                        <button type="submit" class="btn btn-primary forgot">
                            Send Resest Link
                        </button>
                    </div>
                    <span>Return to <a href="{{ route('login') }}">sign in</a></span>
                </form>
            </div>
        </div>
    </div>
</div>

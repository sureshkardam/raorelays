@extends('layouts.front.app')

@section('content')

    <section class="form-box login">
        <div class="form-internal">
           
            <div class="form-content ">
                <h2>Sign Into Your Account</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-field input-group">
					
				
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						
               
                        <input id="email" type="email" class="form-css @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                    </div>
                    <div class="form-field input-group">
				
						<span class="input-group-addon"><i class="fa fa-key"></i></span>
						
                        <input id="password" type="password" class="form-css @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                    </div>

                   



                    <div class="form-field">

                        <input type="submit" class="sub-btn" value="Login">
                    </div>
                    
					
					<div class="form-field">
                        <!--<p><a href="">Forget Password ?</a></p>-->
                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection

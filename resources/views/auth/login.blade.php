

@include('Dashboard.Layouts.header')

<!-- Page content -->
<div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content d-flex justify-content-center align-items-center">

            <!-- Login card -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="card-body">
                    <div class="text-center mb-3">
                        <i class="icon-people icon-2x text-warning-400 border-warning-400 border-3 rounded-round p-3 mb-3 mt-1"></i>
                        <h5 class="mb-0">{{__('auth.login_title')}}</h5>
                        <span class="d-block text-muted">{{__('auth.Your_credentials')}}</span>
                    </div>




                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input type="text" class="form-control" placeholder="Email"
                               type="email" name="email" :value="old('email')" required autofocus>
                        <div class="form-control-feedback">
                            <i class="icon-user text-muted"></i>
                        </div>
                    </div>

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input type="password" class="form-control" placeholder="Password"
                               name="password"
                               required autocomplete="current-password" >
                        <div class="form-control-feedback">
                            <i class="icon-lock2 text-muted"></i>
                        </div>
                    </div>

                    <div class="form-group d-flex align-items-center">
                        <a href="{{ route('password.request') }}" class="ml-auto">{{__('auth.forget_password')}}</a>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">{{__('auth.sign_in')}} <i class="icon-circle-left2 ml-2"></i></button>
                    </div>



                </div>
            </form>
            <!-- /login card -->

        </div>
        <!-- /content area -->


        <!-- Footer -->


    </div>
    <!-- /main content -->

</div>
<!-- /page content -->

</body>
</html>

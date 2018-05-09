        <nav class="navbar navbar-light bg-faded">
            <div class="container">
                <a class="navbar-brand" href="home">HEALTH CARE</a>
                <ul class="nav navbar-nav">
                    <li class="nav-item active">
                        <a class="home" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('predict')}}">Chuẩn đoán bệnh</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('search')}}">Tra cứu bệnh</a>
                    </li>
                </ul>
                {{-- <form class="form-inline navbar-form">
                    <input class="form-control" type="text" placeholder="Search">
                    <button class="btn btn-success-outline" type="submit">Search</button>
                </form> --}}

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        {{-- <p class="navbar-text">Already have an account?</p> --}}
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b id="info-login">Login</b> <span class="caret"></span></a>
                        <ul id="login-dp" class="dropdown-menu">
                            <li>
                                <div class="row" id="form-login">
                                    <div class="col-md-12" >
                                        Login via
                                        <div class="social-buttons">
                                            <a href="#" class="btn btn-fb" onclick="login();" id="btn-fb-login"><i class="fa fa-facebook"></i> Facebook</a>
                                            <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
                                        </div>
                                        or
                                        <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                                            <div class="form-group">
                                                <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                                <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="exampleInputPassword2">Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                                <div class="help-block text-right"><a href="">Forget the password ?</a></div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> keep me logged-in
                                                </label>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="bottom text-center">
                                        New here ? <a href="#"><b>Join Us</b></a>
                                    </div>
                                </div>

                                <div class="row" id="form-logout" hidden>
                                    <div class="col-md-12">
                                        Tài khoản đã đăng nhập:
                                        <br/>
                                        <a href="{{route('account')}}" id="username"></a>
                                        <br/>
                                        <a href="#" class="btn btn-fb" onclick="logout();" id="btn-fb-login"><i class="fa fa-facebook"></i> Logout</a>
                                    </div>
                                    

                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
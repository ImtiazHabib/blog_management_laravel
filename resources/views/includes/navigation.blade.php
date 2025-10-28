 <section class="navigation_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navigation_inner">
                        <nav class="navbar navbar-expand-lg bg-body-tertiary">
                            <div class="container-fluid">
                                <a class="navbar-brand" href="#">Blog Management system</a>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item">
                                            <a class="nav-link " aria-current="page" href="{{ route('index.name') }}">Home</a>
                                        </li>
                                     
                                            <li class="nav-item">
                                            <a class="nav-link" href="{{ route('manage_post') }}">All Posts</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('create_post_page') }}">Add New Post</a>
                                        </li>
                                         <li class="nav-item">
                                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                                        </li>
                                        
                                              <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login_page') }}">Login</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register_page') }}">Register</a>
                                        </li>
                                       
                                        
                                        

                                      
                                        
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </section>
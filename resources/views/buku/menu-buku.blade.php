@include('dashboard.header')
@include('dashboard.menu')
    <div class="py-4">
        <div class="container-xl">
            <div class="col-xl-12 col-md-12">
            <?php if (Session::get('alert-success-karyawan')): ?>
                    <div class="alert alert-danger alert-dismissible">
                        <strong class="alert-login-success">Info! </strong> {{Session::get('alert-success-karyawan')}}
                    </div>
                <?php endif ?>
                <div class="card">
                    <ul class="nav nav-tabs" data-bs-toggle="tabs">

                        

                        <?php if ($key == 'buku'): ?>
                            <li class="nav-item ">
                                <a href="{{route('buku', 'buku')}}" class="nav-link <?php  echo ($key=='buku' ? 'active' : '');?> ">Buku</a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{route('buku', 'data-buku')}}" class="nav-link <?php  echo ($key=='data-buku' ? 'active' : '');?> ">Data Buku</a>
                            </li>
                        <?php elseif ($key == 'data-buku'): ?>
                            <li class="nav-item ">
                                <a href="{{route('buku', 'buku')}}" class="nav-link <?php  echo ($key=='buku' ? 'active' : '');?> ">Buku</a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{route('buku', 'data-buku')}}" class="nav-link <?php  echo ($key=='data-buku' ? 'active' : '');?> ">Data Buku</a>
                            </li>
                        <?php endif ?>

                       


                    </ul>
                    <div class="card-body">
                        <div class="tab-content">

                            <?php if ($key == 'buku'): ?>
                                <div class="tab-pane active show" id="tidak">
                                    @include('buku.data-buku')
                                </div>
                            <?php elseif ($key == 'data-buku'): ?>
                                <div class="tab-pane active show" id="tidak">
                                    @include('buku.data-buku')
                                </div>
                            <?php endif ?>

                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.footer')
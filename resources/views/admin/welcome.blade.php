@extends('admin.app')
@section('content')
<div class="row">

    <div class="col-lg-12">
        <!-- Daily sales -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h6 class="panel-title">Daily sales stats</h6>
                <div class="heading-elements">
                    <span class="heading-text">Balance: <span class="text-bold text-danger-600 position-right">$4,378</span></span>
                    <ul class="icons-list">
                        <li class="dropdown text-muted">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#"><i class="icon-sync"></i> Update data</a></li>
                                <li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>
                                <li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="panel-body">
                <div id="sales-heatmap"></div>
            </div>
            <div class="table-responsive">
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th>Application</th>
                            <th>Time</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="media-left media-middle">
                                    <a href="#" class="btn bg-primary-400 btn-rounded btn-icon btn-xs">
                                        <span class="letter-icon"></span>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <a href="#" class="letter-icon-title">Sigma application</a>
                                    </div>
                                    <div class="text-muted text-size-small"><i class="icon-checkmark3 text-size-mini position-left"></i> New order</div>
                                </div>
                            </td>
                            <td>
                                <span class="text-muted text-size-small">06:28 pm</span>
                            </td>
                            <td>
                                <h6 class="text-semibold no-margin">$49.90</h6>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="media-left media-middle">
                                    <a href="#" class="btn bg-danger-400 btn-rounded btn-icon btn-xs">
                                        <span class="letter-icon"></span>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <a href="#" class="letter-icon-title">Alpha application</a>
                                    </div>
                                    <div class="text-muted text-size-small"><i class="icon-spinner11 text-size-mini position-left"></i> Renewal</div>
                                </div>
                            </td>
                            <td>
                                <span class="text-muted text-size-small">04:52 pm</span>
                            </td>
                            <td>
                                <h6 class="text-semibold no-margin">$90.50</h6>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="media-left media-middle">
                                    <a href="#" class="btn bg-indigo-400 btn-rounded btn-icon btn-xs">
                                        <span class="letter-icon"></span>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <a href="#" class="letter-icon-title">Delta application</a>
                                    </div>
                                    <div class="text-muted text-size-small"><i class="icon-lifebuoy text-size-mini position-left"></i> Support</div>
                                </div>
                            </td>
                            <td>
                                <span class="text-muted text-size-small">01:26 pm</span>
                            </td>
                            <td>
                                <h6 class="text-semibold no-margin">$60.00</h6>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="media-left media-middle">
                                    <a href="#" class="btn bg-success-400 btn-rounded btn-icon btn-xs">
                                        <span class="letter-icon"></span>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <a href="#" class="letter-icon-title">Omega application</a>
                                    </div>
                                    <div class="text-muted text-size-small"><i class="icon-lifebuoy text-size-mini position-left"></i> Support</div>
                                </div>
                            </td>
                            <td>
                                <span class="text-muted text-size-small">11:46 am</span>
                            </td>
                            <td>
                                <h6 class="text-semibold no-margin">$55.00</h6>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="media-left media-middle">
                                    <a href="#" class="btn bg-danger-400 btn-rounded btn-icon btn-xs">
                                        <span class="letter-icon"></span>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <a href="#" class="letter-icon-title">Alpha application</a>
                                    </div>
                                    <div class="text-muted text-size-small"><i class="icon-spinner11 text-size-mini position-left"></i> Renewal</div>
                                </div>
                            </td>
                            <td>
                                <span class="text-muted text-size-small">10:29 am</span>
                            </td>
                            <td>
                                <h6 class="text-semibold no-margin">$90.50</h6>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /daily sales -->
        <!-- My messages -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h6 class="panel-title">My messages</h6>
                <div class="heading-elements">
                    <span class="heading-text"><i class="icon-history text-warning position-left"></i> Jul 7, 10:30</span>
                    <span class="label bg-success heading-text">Online</span>
                </div>
            </div>
            <!-- Numbers -->
            <div class="container-fluid">
                <div class="row text-center">
                    <div class="col-md-4">
                        <div class="content-group">
                            <h6 class="text-semibold no-margin"><i class="icon-clipboard3 position-left text-slate"></i> 2,345</h6>
                            <span class="text-muted text-size-small">this week</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="content-group">
                            <h6 class="text-semibold no-margin"><i class="icon-calendar3 position-left text-slate"></i> 3,568</h6>
                            <span class="text-muted text-size-small">this month</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="content-group">
                            <h6 class="text-semibold no-margin"><i class="icon-comments position-left text-slate"></i> 32,693</h6>
                            <span class="text-muted text-size-small">all messages</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /numbers -->
            <!-- Area chart -->
            <div id="messages-stats"></div>
            <!-- /area chart -->
            <!-- Tabs -->
            <ul class="nav nav-lg nav-tabs nav-justified no-margin no-border-radius bg-indigo-400 border-top border-top-indigo-300">
                <li class="active">
                    <a href="#messages-tue" class="text-size-small text-uppercase" data-toggle="tab">
                        Tuesday
                    </a>
                </li>
                <li>
                    <a href="#messages-mon" class="text-size-small text-uppercase" data-toggle="tab">
                        Monday
                    </a>
                </li>
                <li>
                    <a href="#messages-fri" class="text-size-small text-uppercase" data-toggle="tab">
                        Friday
                    </a>
                </li>
            </ul>
            <!-- /tabs -->
            <!-- Tabs content -->
            <div class="tab-content">
                <div class="tab-pane active fade in has-padding" id="messages-tue">
                    <ul class="media-list">
                        <li class="media">
                            <div class="media-left">
                                <img src="images/face10.jpg" class="img-circle img-xs" alt="">
                                <span class="badge bg-danger-400 media-badge">8</span>
                            </div>
                            <div class="media-body">
                                <a href="#">
                                    James Alexander
                                    <span class="media-annotation pull-right">14:58</span>
                                </a>
                                <span class="display-block text-muted">The constitutionally inventoried precariously...</span>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-left">
                                <img src="images/face3.jpg" class="img-circle img-xs" alt="">
                                <span class="badge bg-danger-400 media-badge">6</span>
                            </div>
                            <div class="media-body">
                                <a href="#">
                                    Margo Baker
                                    <span class="media-annotation pull-right">12:16</span>
                                </a>
                                <span class="display-block text-muted">Pinched a well more moral chose goodness...</span>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-left">
                                <img src="assets/images/demo/users/face24.jpg" class="img-circle img-xs" alt="">
                            </div>
                            <div class="media-body">
                                <a href="#">
                                    Jeremy Victorino
                                    <span class="media-annotation pull-right">09:48</span>
                                </a>
                                <span class="display-block text-muted">Pert thickly mischievous clung frowned well...</span>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-left">
                                <img src="assets/images/demo/users/face4.jpg" class="img-circle img-xs" alt="">
                            </div>
                            <div class="media-body">
                                <a href="#">
                                    Beatrix Diaz
                                    <span class="media-annotation pull-right">05:54</span>
                                </a>
                                <span class="display-block text-muted">Nightingale taped hello bucolic fussily cardinal...</span>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-left">
                                <img src="images/face25.jpg" class="img-circle img-xs" alt="">
                            </div>
                            <div class="media-body">
                                <a href="#">
                                    Richard Vango
                                    <span class="media-annotation pull-right">01:43</span>
                                </a>
                                <span class="display-block text-muted">Amidst roadrunner distantly pompously where...</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane fade has-padding" id="messages-mon">
                    <ul class="media-list">
                        <li class="media">
                            <div class="media-left">
                                <img src="images/face2.jpg" class="img-circle img-sm" alt="">
                            </div>
                            <div class="media-body">
                                <a href="#">
                                    Isak Temes
                                    <span class="media-annotation pull-right">Tue, 19:58</span>
                                </a>
                                <span class="display-block text-muted">Reasonable palpably rankly expressly grimy...</span>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-left">
                                <img src="images/face7.jpg" class="img-circle img-sm" alt="">
                            </div>
                            <div class="media-body">
                                <a href="#">
                                    Vittorio Cosgrove
                                    <span class="media-annotation pull-right">Tue, 16:35</span>
                                </a>
                                <span class="display-block text-muted">Arguably therefore more unexplainable fumed...</span>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-left">
                                <img src="images/face18.jpg" class="img-circle img-sm" alt="">
                            </div>
                            <div class="media-body">
                                <a href="#">
                                    Hilary Talaugon
                                    <span class="media-annotation pull-right">Tue, 12:16</span>
                                </a>
                                <span class="display-block text-muted">Nicely unlike porpoise a kookaburra past more...</span>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-left">
                                <img src="images/face14.jpg" class="img-circle img-sm" alt="">
                            </div>
                            <div class="media-body">
                                <a href="#">
                                    Bobbie Seber
                                    <span class="media-annotation pull-right">Tue, 09:20</span>
                                </a>
                                <span class="display-block text-muted">Before visual vigilantly fortuitous tortoise...</span>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-left">
                                <img src="images/face8.jpg" class="img-circle img-sm" alt="">
                            </div>
                            <div class="media-body">
                                <a href="#">
                                    Walther Laws
                                    <span class="media-annotation pull-right">Tue, 03:29</span>
                                </a>
                                <span class="display-block text-muted">Far affecting more leered unerringly dishonest...</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane fade has-padding" id="messages-fri">
                    <ul class="media-list">
                        <li class="media">
                            <div class="media-left">
                                <img src="images/face15.jpg" class="img-circle img-sm" alt="">
                            </div>
                            <div class="media-body">
                                <a href="#">
                                    Owen Stretch
                                    <span class="media-annotation pull-right">Mon, 18:12</span>
                                </a>
                                <span class="display-block text-muted">Tardy rattlesnake seal raptly earthworm...</span>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-left">
                                <img src="images/face12.jpg" class="img-circle img-sm" alt="">
                            </div>
                            <div class="media-body">
                                <a href="#">
                                    Jenilee Mcnair
                                    <span class="media-annotation pull-right">Mon, 14:03</span>
                                </a>
                                <span class="display-block text-muted">Since hello dear pushed amid darn trite...</span>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-left">
                                <img src="images/face22.jpg" class="img-circle img-sm" alt="">
                            </div>
                            <div class="media-body">
                                <a href="#">
                                    Alaster Jain
                                    <span class="media-annotation pull-right">Mon, 13:59</span>
                                </a>
                                <span class="display-block text-muted">Dachshund cardinal dear next jeepers well...</span>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-left">
                                <img src="images/face24.jpg" class="img-circle img-sm" alt="">
                            </div>
                            <div class="media-body">
                                <a href="#">
                                    Sigfrid Thisted
                                    <span class="media-annotation pull-right">Mon, 09:26</span>
                                </a>
                                <span class="display-block text-muted">Lighted wolf yikes less lemur crud grunted...</span>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-left">
                                <img src="images/face17.jpg" class="img-circle img-sm" alt="">
                            </div>
                            <div class="media-body">
                                <a href="#">
                                    Sherilyn Mckee
                                    <span class="media-annotation pull-right">Mon, 06:38</span>
                                </a>
                                <span class="display-block text-muted">Less unicorn a however careless husky...</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /tabs content -->
        </div>
        <!-- /my messages -->
        <!-- Daily financials -->

        <!-- /daily financials -->
    </div>
</div>
@endsection

@section('pageTitle')
Admin Dashboard
@endsection

@section('addtional_css')
@endsection

@section('jscript')
<script type="text/javascript" src="{{ asset('/assets/admin/js/d3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/d3_tooltip.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/switchery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/uniform.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/bootstrap_multiselect.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/daterangepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/dashboard.js') }}"></script>
@endsection
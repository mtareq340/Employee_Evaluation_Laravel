<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('uploads/user_images/' . auth()->user()->image) }}" class="img-circle" alt="">
            </div>
            <div class="pull-left info">    
                <p>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-th"></i><span style="font-size: 15px;">الرئيسية</span></a></li>
                <li><a href="{{ route('dashboard.stores.index') }}"><i class="fa fa-th"></i><span style="font-size: 15px;">الفروع</span></a></li>
                <li><a href="{{ route('dashboard.technicals.index') }}"><i class="fa fa-th"></i><span style="font-size: 15px;">كل الفنيين</span></a></li>
                <li><a href="{{ route('dashboard.managers.index') }}"><i class="fa fa-th"></i><span style="font-size: 15px;">كل المديرين</span></a></li>
                <li><a href="{{ route('dashboard.employees.index') }}"><i class="fa fa-th"></i><span style="font-size: 15px;">كل الموظفين</span></a></li>
                <li><a href="{{ route('dashboard.visitnumbers.index') }}"><i class="fa fa-th"></i><span style="font-size: 15px;">عدد مرات الزيارة في الشهر</span></a></li>
                <li class="nav-item">
                     <a ><i class="fa fa-th"></i>
                    <span style="font-size: 15px;" class="menu-title" data-i18n="nav.dash.main">التقارير </span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2"></span>
                    </a>
                    <ul class="menu-content" style="">   
                   <a>
                   <li style="margin-bottom:15px;" class="nav-item"><a  href="{{ route('dashboard.technicals.reports') }}" class="menu-item" > - تقارير الفنيين </a>
                    </li>
                   </a> 
                   <a>
                   <li class="nav-item"><a class="menu-item" href="{{ route('dashboard.managers.reports') }}"> - تقارير المديرين</a>
                    </li>
                   </a>
                    
                    </ul>
                </li>                
                <li><a href="{{ route('dashboard.users.index') }}"><i class="fa fa-th"></i><span style="font-size: 15px;">المستخدمين</span></a></li>

            {{--<li><a href="{{ route('dashboard.categories.index') }}"><i class="fa fa-book"></i><span style="font-size: 15px;">@lang('site.categories')</span></a></li>--}}
            {{----}}
            {{----}}
            {{--<li><a href="{{ route('dashboard.users.index') }}"><i class="fa fa-users"></i><span style="font-size: 15px;">@lang('site.users')</span></a></li>--}}

            {{--<li class="treeview">--}}
            {{--<a href="#">--}}
            {{--<i class="fa fa-pie-chart"></i>--}}
            {{--<span>الخرائط</span>--}}
            {{--<span class="pull-right-container">--}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
            {{--<li>--}}
            {{--<a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</li>--}}
        </ul>

    </section>

</aside>


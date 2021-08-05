@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>اضافة احصائيات للمديرين <small style="font-size:bold;">{{ $store->name}}</small></h1>

            <ol class="breadcrumb">
            <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="{{ route('dashboard.stores.visits', $store->id) }}"><i class="fa fa-dashboard"></i> الزيارات</a></li>
                <li class="active">اضافة احصائيات للمديرين</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">


                    <form action="{{ route('dashboard.managers.index') }}" method="get">

                        <div class="row">

                        <div class="col-md-4">
                                    <a href="{{ route('dashboard.managers.results', [$store->id, $visit_id]) }}" class="btn btn-primary"><i class=""></i>نتيجة الزيارة للمديرين الذين تم تقييمهم</a>
                        </div>


                     
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($managers->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                   
                                <th>الاجراءات</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            @foreach ($managers as $index=>$manager)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $manager->name }}</td>
                               
                                    <td>
                                         @if ($manager->hasVisit($visit_id))
                                         <a href="#" class="btn btn-primary btn-sm disabled"><i class="fa fa-edit"></i> اضافة احصائية </a>
                                        @else
                                        <a href="{{ route('dashboard.managers.probertymanagers', [$store->id, $visit_id, $manager->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> اضافة احصائية </a>

                                        @endif
                                    </td>
                                </tr>
                            
                            @endforeach
                            </tbody>

                        </table><!-- end of table -->
                        
                        
                    @else
                        
                        <h2>لا توجد صفوف</h2>
                        
                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection

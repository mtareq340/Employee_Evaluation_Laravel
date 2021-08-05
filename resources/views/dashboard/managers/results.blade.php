@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1> نتيجة الزيارة للمديرين <small style="font-size:bold;"></small></h1>

            <ol class="breadcrumb">
            <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{ route('dashboard.stores.visits', $store->id) }}"><i class="fa fa-dashboard"></i> الزيارات</a></li>
            <li><a href="{{ route('dashboard.visits.managers', [$store->id, $visit_id]) }}"><i class="fa fa-dashboard"></i> المديرين</a></li>
            <li class="active">عرض نتيجة الزيارة للمديرين</li>
            </ol>
        </section>
    
        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">


                    <form action="{{ route('dashboard.managers.index') }}" method="get">

                        <div class="row">

                    
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($managers->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>نتيجة الزيارة</th>
                   
                            </tr>
                            </thead>
                            
                            <tbody>
                            @foreach ($managers as $index=>$manager)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $manager->name }}</td>
                                    <td> % {{ $manager->pivot->result }}</td>
                               
                                 
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

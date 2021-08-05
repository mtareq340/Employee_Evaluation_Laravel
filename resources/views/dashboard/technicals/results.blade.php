@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1> نتيجة الزيارة للفنين <small style="font-size:bold;"></small></h1>

            <ol class="breadcrumb">
            <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{ route('dashboard.stores.visits', $store->id) }}"><i class="fa fa-dashboard"></i> الزيارات</a></li>
            <li><a href="{{ route('dashboard.visits.technicals', [$store->id, $visit_id]) }}"><i class="fa fa-dashboard"></i> الفنيين</a></li>
                <li class="active">عرض نتيجة الزيارة للفنين</li>
            </ol>
        </section>
    
        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">


                    <form action="{{ route('dashboard.technicals.index') }}" method="get">

                        <div class="row">

                    
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($technicals->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>نتيجة الزيارة</th>
                   
                            </tr>
                            </thead>
                            
                            <tbody>
                            @foreach ($technicals as $index=>$technical)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $technical->name }}</td>
                                    <td> % {{ $technical->pivot->result }}</td>
                                 
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

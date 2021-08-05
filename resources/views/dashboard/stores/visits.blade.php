@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>زيارات فرع <small style="font-size:bold;">{{ $store->name}}</small></h1>

            <ol class="breadcrumb">
            <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{ route('dashboard.stores.index') }}"><i class="fa fa-dashboard"></i> الفروع</a></li>
            <li class="active">الزيارات</li>

            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">


                    <form action="{{ route('dashboard.technicals.index') }}" method="get">

                        <div class="row">

                          

                        <div class="col-md-4">
                                <!-- <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')</button> -->
                                    <a href="{{ route('dashboard.visits.create', $store->id) }}" class="btn btn-primary"><i class="fa fa-plus"></i> اضف</a>
                            </div>

                        </div>
                        
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($visits->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>التاريخ</th>
                                <th>ترتيب الزيارة</th>
                                <th>الاجراءات</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            @foreach ($visits as $index=>$visit)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $visit->visit_date }}</td>
                                    <td>{{ $visit->visitNumber['name'] }}</td>
                                    <td>
                                            <a href="{{ route('dashboard.visits.technicals', [$store->id, $visit->id]) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> اضافة احصائيات للفنيين</a>
                                            <a href="{{ route('dashboard.visits.managers', [$store->id, $visit->id]) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> اضافة احصائيات للمديرين</a>
                                            <!-- <a href="" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> تعديل</a> -->
                                            <form action="{{ route('dashboard.visits.destroy', $visit->id ) }}" method="post" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i>مسح</button>
                                            </form><!-- end of form -->
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

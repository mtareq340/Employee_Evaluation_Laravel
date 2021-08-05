@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>التقييمات</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li class="active">التقييمات</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">


                    <form action="{{ route('dashboard.proberties.index') }}" method="get">

                        <div class="row">

                          

                            <div class="col-md-4">
                                <!-- <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')</button> -->
                                    <a href="{{ route('dashboard.proberties.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> اضف</a>
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($proberties->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>الاجراءات</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            @foreach ($proberties as $index=>$proberty)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $proberty->name }}</td>
                                    <!-- <td><a href="{{ route('dashboard.products.index', ['category_id' => $proberty->id]) }}" class="btn btn-info btn-sm">@lang('site.related_products')</a></td> -->
                                    <td>
                                            <a href="{{ route('dashboard.proberties.edit', $proberty->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> تعديل</a>
                                            <form action="{{ route('dashboard.proberties.destroy', $proberty->id) }}" method="post" style="display: inline-block">
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

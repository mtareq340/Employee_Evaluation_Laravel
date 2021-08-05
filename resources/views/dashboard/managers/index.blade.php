@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>المديرين</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li class="active">المديرين</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">


                    <form action="{{ route('dashboard.managers.index') }}" method="get">

                        <div class="row">

                          
                        <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')</button>
                                    <a href="{{ route('dashboard.managerproberties.index') }}" class="btn btn-primary"><i class=""></i>خصائص المديرين</a>
                            </div>

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
                                <th>الكود</th>
                                <th>العنوان</th>
                                <th>التليفون</th>
                                <th>الفرع</th>
                                <th>الوظيفة</th>
                                <!-- <th>الاجراءات</th> -->
                            </tr>
                            </thead>
                            
                            <tbody>
                            @foreach ($managers as $index=>$manager)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $manager->name }}</td>
                                    <td>{{ $manager->code }}</td>
                                    <td>{{ $manager->address }}</td>
                                    <td>{{ $manager->phone }}</td>
                                    <td>{{ $manager->store['name'] }}</td>
                                    <td>{{ $manager->title['name'] }}</td>
                                    <!-- <td>
                                            <a href="{{ route('dashboard.managers.edit', $manager->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> تعديل</a>
                                            <form action="{{ route('dashboard.managers.destroy', $manager->id) }}" method="post" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i>مسح</button>
                                            </form>
                                    </td> -->
                                </tr>
                            
                            @endforeach
                            </tbody>

                        </table><!-- end of table -->
                        
                        {{ $managers->appends(request()->query())->links() }}
                        
                    @else
                        
                        <h2>لا توجد صفوف</h2>
                        
                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection

@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>الفروع</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="{{ route('dashboard.stores.index') }}">الفروع</a></li>
                <li class="active">اضف</li>
            </ol>
        </section>
      
     
        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">اضف</h3>
                </div><!-- end of box header -->
                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.stores.store') }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('post') }}

                            <div class="form-group">
                                <label>الاسم</label>
                                <input type="text" name="name" class="form-control" value="">
                            </div>
                           
                            <div class="form-group">
                                <label>البريد الالكتروني</label>
                                <input type="text" name="email" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label>العنوان</label>
                                <input type="text" name="address" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label>رقم الموبيل</label>
                                <input type="text" name="phone" class="form-control" value="">
                            </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>اضف</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection

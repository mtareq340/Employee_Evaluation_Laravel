@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
        <h1>تقييمات الزيارة للفني <small style="font-size:bold;">{{ $technical->name}}</small></h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li><a href="{{ route('dashboard.visits.technicals', [$store_id, $visit_id]) }}"><i class="fa fa-dashboard"></i> فنيين الزيارة</a></li>
                <li><a href="">التقييمات</a></li>
            </ol>
        </section>
      
     
        <section class="content">

            <div class="box box-primary">

                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.technicals.marks') }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('post') }}

                        @if ($proberties->count() > 0)
                        <input style="display:none; " type="text" name="technical_id" value="{{ $technical_id }}">
                        <input style="display:none; " type="text" name="visit_id" value="{{ $visit_id }}">
                        <input style="display:none; " type="text" name="store_id" value="{{ $store_id }}">
                    <table class="table table-hover">

                        <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>التقييم</th>
                    
                            <!-- <th>الاجراءات</th> -->
                        </tr>
                        </thead>
                        
                        <tbody>
                        @foreach ($proberties as $index=>$proberty)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $proberty->name }}</td>
                                <td><input type="number" min="0" value="0" name="proberties[{{$proberty->id}}][mark]" max="10"></td>
                            
                         
                            </tr>
                        
                        @endforeach
                        </tbody>

                    </table><!-- end of table -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>اضف</button>
                        </div>
                    @else

                    <h2>لا توجد صفوف</h2>

                    @endif

                     

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection

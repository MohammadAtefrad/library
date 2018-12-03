@extends('layoutmain')
@section('content')
<div class="row">
    <!-- main -->
    <div class="col-8 col-md-9 text-right">
        <div class="d-flex flex-column">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <a href="#"><img class="float-left shadow" src="/img/blog/book.jpg" alt="img"></a>
                    </div>
                    <div class="col-12 col-md-6">
                        <h1 class="display-5">{{ $book->name }}</h1>
                        <p class="font-weight-bold">ناشر : {{ $book->publisher }}</p>
                        <p class="font-weight-bold">نویسنده : {{ $book->author }}</p>
                        <p class="font-weight-bold">تاریخ انتشار : {{ jdate($book->published_date)->format('%d %B %Y') }}</p>
                        <p class="font-weight-bold" >وضعیت کتاب : {{ $book->book_status }}</p>    
                    </div>
                </div>                
                <hr class="my-4 shadow">
                <p class="lead">{{ $book->description }}.</p>
                <a class="btn btn-success btn-lg" href="#" role="button">سفارش کتاب</a>
            </div>
            <hr>
            <!-- Comments -->
            @if (auth()->check())
            <div class="well">
                @include('layouts.errors')
                <h4>ارسال کامنت :</h4>
                <hr>
                <form role="form" method="POST" action="{{ route('comment.add' , ['article'=>$article->slug]) }}">
                    {{ csrf_field() }}
                    <label for="body">متن :</label>
                    <div class="form-group">
                        <textarea name="body" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">ارسال</button>
                </form>
            </div>
            @else
            <a href="/register">برای ارسال کامنت باید عضو وبسایت باشید</a>
            @endif
            <hr>
            <!-- Posted Comments -->
            @foreach ($comments as $comment)
            <div class="media">
                <div class="media-body">
                    <h4 class="media-heading">{{$comment->user->name}}
                        <small>ارسال شده در تاریخ {{ jdate($comment->created_at)->format('%d %B، %Y') }}</small>
                    </h4>
                    {{$comment->body}}
                </div>
            </div>
            @endforeach
        </div>
    </div><!-- End main -->

    <!-- Sidebar -->
    <div class="col-4 col-md-3 border-left border top text-right">
        <div class="d-flex flex-column mr-4">
            <ul class="list-unstyled">
                <h3 class="my-4">:دسترسی به کتاب ها</h3>
                <li>
                    <h4>بر اساس حروف الفبا</h4>
                </li>
                <div class="d-flex flex-wrap flex-row-reverse justify-content-start my-2" style="font-size:0.8rem !important">
                    <a href="#" class="btn m-1" style="background: #50c058">آ</a>
                    <a href="#" class="btn m-1" style="background: #50c058">ب</a>
                    <a href="#" class="btn m-1" style="background: #50c058">پ</a>
                    <a href="#" class="btn m-1" style="background: #50c058">ت</a>
                    <a href="#" class="btn m-1" style="background: #50c058">ث</a>
                    <a href="#" class="btn m-1" style="background: #50c058">ج</a>
                    <a href="#" class="btn m-1" style="background: #50c058">چ</a>
                    <a href="#" class="btn m-1" style="background: #50c058">ح</a>
                    <a href="#" class="btn m-1" style="background: #50c058">خ</a>
                    <a href="#" class="btn m-1" style="background: #50c058">د</a>
                    <a href="#" class="btn m-1" style="background: #50c058">ذ</a>
                    <a href="#" class="btn m-1" style="background: #50c058">ر</a>
                    <a href="#" class="btn m-1" style="background: #50c058">ز</a>
                    <a href="#" class="btn m-1" style="background: #50c058">س</a>
                    <a href="#" class="btn m-1" style="background: #50c058">ش</a>
                    <a href="#" class="btn m-1" style="background: #50c058">ص</a>
                    <a href="#" class="btn m-1" style="background: #50c058">ض</a>
                    <a href="#" class="btn m-1" style="background: #50c058">ط</a>
                    <a href="#" class="btn m-1" style="background: #50c058">ظ</a>
                    <a href="#" class="btn m-1" style="background: #50c058">ع</a>
                    <a href="#" class="btn m-1" style="background: #50c058">غ</a>
                    <a href="#" class="btn m-1" style="background: #50c058">ف</a>
                    <a href="#" class="btn m-1" style="background: #50c058">ق</a>
                    <a href="#" class="btn m-1" style="background: #50c058">ک</a>
                    <a href="#" class="btn m-1" style="background: #50c058">گ</a>
                    <a href="#" class="btn m-1" style="background: #50c058">ل</a>
                    <a href="#" class="btn m-1" style="background: #50c058">م</a>
                    <a href="#" class="btn m-1" style="background: #50c058">ن</a>
                    <a href="#" class="btn m-1" style="background: #50c058">و</a>
                    <a href="#" class="btn m-1" style="background: #50c058">ه</a>
                    <a href="#" class="btn m-1" style="background: #50c058">ی</a>
                </div>
                <li>
                    <h4>بر اساس دسته بندی</h4>
                </li>
                <div class="d-flex flex-wrap flex-row-reverse justify-content-between my-2">
                    @foreach ($categories=[] as $category)
                    <a href="#" class="btn m-1" style="background: #50c058">ی</a>
                    @endforeach
                </div>
                <li>
                    <h4>بیشترین جستجوها</h4>
                </li>
                <div class="d-flex flex-wrap flex-row-reverse justify-content-between my-2">
                    @foreach ($categories=[] as $category)
                    <a href="#" class="btn m-1" style="background: #50c058">ی</a>
                    @endforeach
                </div>
            </ul>
        </div>
    </div>
</div>
@endsection
@extends('layout')

@section('content')
    <div class="col-lg-12" id="drugDetails">
        <nav aria-label="breadcrumb" class="p-0 pb-2">
            <ol class="breadcrumb bg-primary mb-0">
                <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}" class="text-white">
                        <i class="ri-home-4-line mr-1 float-left"></i>Anasayfa</a>
                </li>
                <li class="breadcrumb-item active text-white" aria-current="page">{{ $drug->name }}</li>
            </ol>
        </nav>
        <div class="card">

            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">{{ $drug->name }}</h4>
                </div>

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="nav flex-column nav-pills text-start" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            @foreach ($drug->titles as $title)
                                <a @class(['active' => $loop->first, 'nav-link']) id="v-pills-{{ $title->id }}-tab" data-toggle="pill"
                                    role="tab" aria-controls="v-pills-{{ $title->id }}"
                                    href="#v-pills-{{ $title->id }}" aria-selected="false">{{ $title->title }}</a>
                            @endforeach

                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="tab-content mt-0" id="v-pills-tabContent">
                            @foreach ($drug->titles as $content)
                                <div @class(['show active' => $loop->first, 'tab-pane fade']) id="v-pills-{{ $content->id }}" role="tabpanel"
                                    aria-labelledby="v-pills-{{ $content->id }}-tab">
                                    <p>{!! $content->content !!}</p>

                                    @if ($content->source && $content->source != '')
                                        <div class="sources">
                                            @php
                                                $kaynaklar = explode(',', $content->source);
                                            @endphp
                                            <strong class="mb-3 text-danger">Kaynaklar:</strong>
                                            @foreach ($kaynaklar as $kaynak)
                                                <li class="list-group-item">{{ $kaynak }}</li>
                                            @endforeach
                                        </div>
                                    @endif

                                </div>
                            @endforeach

                        </div>
                    </div>

                    @if ($drug->description && $drug->description != '')
                        <div class="col-md-12 mt-3">
                            <h5 class="mb-3">Notlar</h5>
                            <hr />
                            <p>{{ $drug->description }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

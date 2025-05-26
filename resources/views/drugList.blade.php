@extends('layout')

@section('content')
    <div class="container-fluid note-details">
        <div class="desktop-header">
            <div class="card card-block topnav-left">
                <div class="card-body write-card">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="iq-note-callapse-menu col-12">
                            <input type="text" class="form-control" placeholder="İlaç veya protokol içeriği ara"
                                v-model="search" @input="searchDrug">
                            <span class="hide-note-button d-none"><i class="las la-folder pr-2"></i>Folder</span>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card topnav-right">
                <div class="card-body card-content-right">
                    <ul class="list-inline m-0 p-0 d-flex align-items-center justify-content-around">
                        <li class="nav-item nav-icon" style="font-weight: bold">{{ date('d.m.Y') }}</li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-block card-stretch">
                    <div class="card-body custom-notes-space">
                        <h3 class="">İlaç Protokol Listesi</h3>
                        <div class="iq-tab-content">
                            <div class="d-flex flex-wrap align-items-top justify-content-between">
                                <ul class="d-flex nav nav-pills text-center note-tab mb-3" id="note-pills-tab"
                                    role="tablist">
                                  
                                </ul>

                            </div>
                            <div class="note-content tab-content">
                                <div id="note1" class="tab-pane fade active show">
                                    <div class="icon active animate__animated animate__fadeIn i-grid">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6" v-for="(drug, index) in drugListFiltered"
                                                :key="index">
                                                <div class="card card-block card-stretch card-height note-detail"
                                                    :class="drug.class">
                                                    <div class="card-header d-flex justify-content-between pb-1">
                                                        <div class="icon iq-icon-box-2 icon-border-info rounded">
                                                            <svg width="23" height="23" class="svg-icon"
                                                                id="iq-main-01" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                            </svg>
                                                        </div>
                                                        <div class="card-header-toolbar d-flex align-items-center">

                                                        </div>
                                                    </div>
                                                    <div class="card-body rounded">
                                                        <h4 class="card-title">[[drug.name]]</h4>
                                                        <ul class="list">
                                                            <li v-for="(title,id) in drug.titles" :key="id">
                                                                [[title.title]]
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between note-text note-text-info">
                                                            <a href="#" class="">
                                                                <i
                                                                    class="las la-arrow-circle-right font-size-20 text-primary"></i>
                                                                <button class="btn btn-sm btn-success"
                                                                    @click="openDrugDetail(drug.id)">Detay</button>


                                                            </a>
                                                            <a href="#" class="">
                                                                <i class="las la-calendar mr-2 font-size-20"></i>
                                                                <span class="font-size-12">[[drug.date]]</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
@endsection

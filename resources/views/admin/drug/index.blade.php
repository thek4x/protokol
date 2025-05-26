@extends('admin.app')

@section('sub_title', $sub_title)
@section('page_title', $page_title)



@section('content')
    <!-- general form elements -->
    <div class="col-md-12 text-end mb-3 ">
        <a class="btn btn-danger btn-md" href="{{ route('admin.drugs.create') }}">
            <i class="bi bi-plus-circle"></i> Yeni İlaç Ekle
        </a>
    </div>
    <div class="col-md-6 m-auto">
        <div class="input-group input-group-lg">
            <input type="search" class="form-control form-control-lg" placeholder="Search ..." v-model="searchDList"
                @input="filterDrugs" />

            <div class="input-group-append">
            </div>
        </div>
    </div>
    <div class="col-md-12 mt-5">
        <div class="row" v-if="listByFiltered.length">
            <div class="col-md-3" v-for="(list, index) in listByFiltered" :key="index">
                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">[[ list.name ]]</h3>
                        <div class="card-tools" style="cursor:pointer">
                            <i class="bi bi-pencil-square" @click="goLink('/admin/drugs/'+list.id+'/edit')"></i> &nbsp;
                            <i class="bi bi-trash" @click="goLink('/admin/drugs/'+list.id+'/delete')"></i>

                        </div>
                    </div>
                    <div class="card-body">
                        The body of the card
                    </div>
                </div>
            </div>
        </div>

        <div v-else>
            <div class="alert alert-primary col-md-4 m-auto text-center" role="alert">
                Hiç ilaç kaydı bulunamadı.
            </div>
        </div>


        <!-- /.col -->
    </div>
@endsection

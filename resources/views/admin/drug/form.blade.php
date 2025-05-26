   <div class="col-md-6">
       <div class="card card-primary">
           <div class="card-header">
               <h3 class="card-title">Bu alandan ilaç adı ve içeriği hakkında bilgi girebilirsin</h3>
           </div>
           <!-- /.card-header -->
           <div class="card-body" style="min-height:450px;">
               <div v-if="form1">
                   <form @submit.prevent="ilacSubmit">
                       <div class="form-group">
                           <label for="ilac_ad">İlaç Adı</code></label>
                           <input type="text" class="form-control form-control-border" placeholder="" v-model="name">
                       </div>
                       <div class="form-group mt-2">
                           <label for="ilac_ad">İlaç İçeriği</code></label>
                           <textarea class="form-control" v-model="description" ref="editor" style="height:200px"></textarea>
                       </div>
                       <div class="form-group m-auto text-center mt-5">
                           <button type="submit" class="btn btn-success col-md-5">[[ pageStatus == 'update' ?
                               'GÜNCELLE' : 'İLERLE' ]]</button>
                       </div>

                   </form>
               </div>
               <div v-if="formEnd">
                   <div class="alert alert-success alert-dismissible">
                       <h5><i class="icon fas fa-check"></i> Başarılı!</h5>
                       İlaç Kaydını başarıyla eklediniz
                   </div>
               </div>
               <div v-if="form2">
                   <div class="copyTo mb-3" v-for="(ilac, index) in ilacList" :key="index">
                       <div class="row">
                           <div class="form-group col-md-6">
                               <label>Başlık</label>
                               <input type="text" class="form-control" v-model="ilac.title" />
                           </div>

                           <div class="form-group col-md-6">
                               <label>Kaynağı</label>
                               <input type="text" class="form-control" v-model="ilac.source" />
                           </div>

                           <div class="form-group col-md-12">
                               <label>Değeri</label>
                               <textarea class="summernote" :id="'summer-' + index" name="editordata">[[ilac.content]]</textarea>
                           </div>
                           <div class="form-group col-md-12 text-end mt-3 mb-3">
                               <button type="button" class="btn btn-danger" @click="deleteTitle(ilac.id,index)">
                                   <i class="bi bi-trash me-2"></i>
                                   DELETE
                               </button>
                           </div>
                       </div>
                       <hr />
                   </div>

                   <div class="row m-4">
                       <div class="form-group col-md-12 text-end">
                           <button type="button" class="btn btn-success" @click="addIlac()"> <i
                                   class="bi bi-bag-plus pe-2"></i>Yeni Başlık Ekle</button>
                       </div>
                       <div class="form-group col-md-12 text-center mt-5">
                           <button type="button" class="btn btn-danger col-md-5" @click="saveTitles()">
                               <i class="bi bi-bookmark-plus"></i>
                               [[ pageStatus == 'update' ? 'GÜNCELLE' : 'İLERLE' ]]
                           </button>
                       </div>
                   </div>
               </div>
           </div>

           <!-- /.card-body -->
       </div>
       <!-- /.card -->
   </div>

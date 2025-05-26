   <div class="col-md-6">
       <div class="card card-primary">
           <div class="card-header">
               <h3 class="card-title">Bu alandan girdiğin ilac'ın nasıl görüneceğini görebilirsin</h3>
           </div>
           <!-- /.card-header -->
           <div class="card-body" style="min-height:450px;">
               <div class="m-auto" v-if="name!=''">
                   <div class="callout callout-success text-center">
                       <h5>[[name.toUpperCase()]]</h5>
                   </div>
                   <table class="table table-bordered" v-if="ilacList.length>0 && ilacList[0].title!=''">
                       <tbody>

                           <tr v-for="(ilac, index) in ilacList" :key="index">
                               <td class="col-3">[[ilac.title]]</td>
                               <td class="col-9"><div v-html="ilac.content"></div>
                                   <div class="subcontent text-end">
                                       <button type="button" class="btn btn-secondary btn-danger btn-sm tool"
                                           data-toggle="tooltip" data-placement="bottom"
                                           :title="ilac.content">Kaynaklar</button>
                                   </div>
                               </td>
                           </tr>

                       </tbody>
                   </table>

                   <p style="text-align: center;width: 650px;margin: 20px auto;padding: 10px;border: dashed 2px dimgrey;" v-if="description">
                       <code>[[description]]</code>
                   </p>

               </div>
           </div>

           <!-- /.card-body -->
       </div>
       <!-- /.card -->
   </div>

   @push('scripts')
       <script>
           $(document).ready(function() {

           });
       </script>
   @endpush

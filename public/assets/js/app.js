axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

const app = Vue.createApp({
    delimiters: ['[[', ']]'],
    data() {
        return {
            name: '',
            description: '',
            pageStatus: 'save',
            form1: true,
            form2: false,
            insertID: 0,
            formEnd: false,
            ilacList: [
                { title: '', content: '', source: '', }
            ],
            editors: [],
            listBy: [],
            listByFiltered: [],
            searchDList: '',
            updateID: 0,
        }
    },
    methods: {
        ilacSubmit() {
            if (this.name == '') {
                alert('İlaç adı boş olamaz');
                return;
            }
            this.loadEditor();
            const formData = new FormData();
            formData.append('name', this.name);
            formData.append('description', this.description);
            if (this.pageStatus == 'save') {
                this.saveIlac(formData);
            } else if (this.pageStatus == 'update') {
                this.updateIlac(formData);
            }

        },
        saveIlac(formData) {
            axios.post('/admin/drugs', formData)
                .then(response => {
                    this.form1 = false;
                    this.form2 = true;
                    this.insertID = response.data.drug_id;

                    // Handle success
                })
                .catch(error => {
                    console.error(error);
                    // Handle error
                });
        },
        updateIlac(formData) {
            axios.post('/admin/drugs/update/' + this.updateID, formData)
                .then(response => {
                    this.form1 = false;
                    this.form2 = true;
                    this.insertID = response.data.drug_id;

                    // Handle success
                })
                .catch(error => {
                    console.error(error);
                    // Handle error
                });
        },
        addIlac() {
            this.ilacList.push({ title: '', content: '', source: '' });
            this.loadEditor();
        },
        loadEditor() {
            setTimeout(() => {                
                $('.summernote').summernote();
            }, 1500);
        },
        saveTitles() {

            this.ilacList.forEach((ilac, index) => {
                const selector = `#summer-${index}`;
                let content = $(selector).summernote('code'); // ilk değer yükleme
                this.ilacList[index].content = content;

            });

            if (this.pageStatus == 'save') {
                axios.post('/admin/titles', { ilaclar: this.ilacList, drugId: this.insertID })
                    .then(response => { this.form1 = false; this.form2 = false; this.formEnd = true; })
                    .catch(error => { console.error('Hata:', error); alert('Kayıt sırasında bir hata oluştu.'); });
            } else {
                axios.post('/admin/titles/update', { ilaclar: this.ilacList, drugId: this.updateID })
                    .then(response => { this.form1 = false; this.form2 = false; this.formEnd = true; })
                    .catch(error => { console.error('Hata:', error); alert('Kayıt sırasında bir hata oluştu.'); });
            }
        },
        listDrugs() {
            axios.get('/admin/drugs/listBy')
                .then(response => {
                    this.listBy = response.data;
                    this.listByFiltered = this.listBy;
                })
                .catch(error => {

                });
        },
        ilacUpdate(path) {
            console.log(path);
        },
        filterDrugs() {
            const keyword = this.searchDList.toLowerCase();
            this.listByFiltered = this.listBy.filter(drug =>
                drug.name.toLowerCase().includes(keyword) ||
                (drug.description && drug.description.toLowerCase().includes(keyword))
            );
        },
        goLink(link) {
            location.href = link;
        },
        getByID(id) {
            axios.get('/admin/drugs/' + id + '')
                .then(response => {
                    let res = response.data;
                    this.name = res.drug.name;
                    this.description = res.drug.description;

                    this.ilacList = res.titles;
                })
                .catch(error => {

                });
        },
        deleteTitle(id) {
            if (confirm('Silmek istediğinize emin misiniz?')) {
                axios.delete('/admin/titles/' + id)
                    .then(response => {
                        this.ilacList = this.ilacList.filter(ilac => ilac.id !== id);
                    })
                    .catch(error => {
                        console.error('Hata:', error);
                        alert('Kayıt silinirken bir hata oluştu.');
                    });
            }
        }


    }, mounted() {
        if (window.location.pathname.search('admin/drugs') >= 0) {
            this.listDrugs();
        }

        if (window.location.pathname.search('edit') >= 0) {
            let drugID = window.location.pathname.match(/\/admin\/drugs\/(\d+)\/edit/);
            this.updateID = drugID[1];
            this.pageStatus = 'update';
            this.getByID(drugID[1]);
            this.loadEditor();

        }


    },
    updated() {

    }
}).mount('#app');

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

const app = Vue.createApp({
    delimiters: ['[[', ']]'],
    data() {
        return {
            search: '',
            searchText: 'İlaç Ara',
            drugList: [],
            drugListFiltered: [],
        }
    },
    methods: {
        getDrugList() {
            axios.get('/home/listBy')
                .then(response => {
                    this.drugList = response.data.data;
                    this.drugListFiltered = this.drugList;
                    console.log(this.drugList);
                })
                .catch(error => {
                    console.error(error);
                });
        },
        searchDrug() {
            let searchKey = this.search.toLowerCase();

            this.drugListFiltered = this.drugList.filter(drug => {
                let drugName = drug.name.toLowerCase();
                return drugName.includes(searchKey); // ✅ doğru değişkenle eşleşme
            });
        },
        openDrugDetail(drugId) {
            window.location.href = '/home/details/' + drugId;
        }

    },
    mounted() {
        this.getDrugList();
    },
}).mount('#app');
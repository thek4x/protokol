const app = Vue.createApp({
    data() {
        return {
            name: '',
            description: ''
        }
    },
    methods: {
        submit() {
            const formData = new FormData();
            formData.append('name', this.name);
            formData.append('description', this.description);

            axios.post('/admin/drug/store', formData)
                .then(response => {
                    console.log(response.data);
                    // Handle success
                })
                .catch(error => {
                    console.error(error);
                    // Handle error
                });
        }
    }
});
<!DOCTYPE html>
<html>

<head>
    <title>Slide Navbar</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>
    <div id="app">
        <div class="main">
            <input type="checkbox" id="chk" aria-hidden="true">
            <div class="signup">
                <form method="POST" @submit.prevent="login">
                    {{ csrf_field() }}
                    <label for="chk" aria-hidden="true">Giriş Yap</label>
                    <input type="text" name="email" placeholder="E-Posta Adresiniz" v-model="form.email">
                    <input type="password" name="password" placeholder="Şifreniz" v-model="form.password">
                    <button>Sign up</button>
                    <label for="error" aria-hidden="true" class="error"
                        v-if="formError">[[formErrorMessage]]</label>
                </form>
            </div>

            <div class="login">
                <form>
                    <label for="chk" aria-hidden="true">Erciyes Üniversitesi</label>
                </form>
            </div>
        </div>
    </div>

    <script>
        axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
        axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute(
            'content')

        const app = Vue.createApp({
            delimiters: ['[[', ']]'], // <<< burası önemli
            data() {
                return {
                    form: {
                        email: '',
                        password: ''
                    },
                    formError: false,
                    formErrorMessage: 'Hatalı Kullanıcı adı veya şifre.',
                }
            },
            methods: {
                login() {
                    if (this.form.email === '' || this.form.password === '') {
                        this.formError = true;
                        this.formErrorMessage = 'Lütfen tüm alanları doldurun.';
                    } else {


                        axios.post('/login', this.form)
                            .then(response => {
                                let res = response.data;
                                console.log(res);
                                this.formError = false;
                                location.href = res.redirect;
                            })
                            .catch(error => {
                                this.formError = true;
                                this.formErrorMessage = 'Hatalı Kullanıcı adı veya şifre.';
                            });

                    }


                }
            }
        }).mount('#app');
    </script>

</body>

</html>

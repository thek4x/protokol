<template>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">
        <div class="signup">
            <form method="POST" @submit.prevent="submit">
                {{ csrf_field() }}
                <label for="chk" aria-hidden="true">Giriş Yap</label>
                <input type="text" name="email" placeholder="E-Posta Adresiniz" required=""
                    v-model="form.email">
                <input type="password" name="password" placeholder="Şifreniz" required="" v-model="form.password">
                <button>Sign up</button>
            </form>
        </div>

        <div class="login">
            <form>
                <label for="chk" aria-hidden="true">Erciyes Üniversitesi</label>

            </form>
        </div>
    </div>
</template>

<script>
console.log("test");
</script>


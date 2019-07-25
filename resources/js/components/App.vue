<template>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<template v-if="isLogin">
					<div class="brand text-center">
						<p>Login to access admin panel.</p>
					</div>
					<formLogin :errors="errorLogin" :flag="flagLogin" @justLogin="Login"></formLogin>
					<div class="link text-center">
						<a href="/login" @click.prevent="change">Register</a>
					</div>
				</template>
				<template v-else>
					<div class="brand text-center">
						<p>Create an free account.</p>
					</div>
					<formRegister :errors="errorRegister" :flag="flagRegister" @justRegister="Register"></formRegister>
					<div class="link text-center">
						<a href="/login" @click.prevent="change">Login</a>
					</div>
				</template>
			</div>
		</div>
	</div>
</template>

<script>
	import FormRegister from "./FormRegister";
	import FormLogin from "./FormLogin";
	export default {
		data: function() {
			return {
				isLogin: true,
				flagLogin: null,
				flagRegister: null,
				errorLogin: null,
				errorRegister: null
			};
		},
		methods: {
			Login: function(info) {
                this.reset();
				axios
					.post("/api/login", info)
					.then(response => (this.flagLogin = response.data))
					.catch(error => (this.errorLogin = error.response.data.errors));
			},
			Register: function(info) {
                this.reset();
				axios
					.post("/api/register", info)
					.then(response => (this.flagRegister = response.data))
					.catch(
						error => (this.errorRegister = error.response.data.errors)
					);
			},
			change: function() {
                this.isLogin = !this.isLogin;
                this.reset();
			},
			reset: function() {
				this.flagLogin = null;
				this.flagRegister = null;
				this.errorLogin = null;
				this.errorRegister = null;
			}
		},
		components: {
			formLogin: FormLogin,
			formRegister: FormRegister
		}
	};
</script>
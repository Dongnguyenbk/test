<template>
	<div class="content">
		<form>
			<div v-if="flag == true" class="alert alert-success">Dang ky tai khoan thanh cong</div>

			<div class="form-group">
				<label class="control-label" for="fullname">Fullname</label>
				<input
					class="form-control"
					type="text"
					id="fullname"
					v-model="info.fullname"
					placeholder="Enter fullname"
				/>
				<div v-if="errors != null">
					<div v-for="error in errors['fullname']" :key="error.key">{{ error }}</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label" for="email">Email</label>
				<input
					class="form-control"
					type="text"
					id="email"
					v-model="info.email"
					placeholder="Enter email"
				/>
				<div v-if="errors != null">
					<div v-for="error in errors['email']" :key="error.key">{{ error }}</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label" for="password">Password</label>
				<input
					class="form-control"
					type="password"
					id="password"
					v-model="info.password"
					placeholder="Enter password"
				/>
				<div v-if="errors != null">
					<div v-for="error in errors['password']" :key="error.key">{{ error }}</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label" for="re_password">Re password</label>
				<input
					class="form-control"
					type="password"
					id="re_password"
					v-model="info.re_password"
					placeholder="Re enter password"
				/>
				<div v-if="errors != null">
					<div v-for="error in errors['re_password']" :key="error.key">{{ error }}</div>
				</div>
			</div>
			<button class="btn btn-primary" @click.prevent="$emit('justRegister', info)">Register</button>
		</form>
	</div>
</template>

<script>
	export default {
		data: function() {
			return {
				info: {
					fullname: "",
					email: "",
					password: "",
					re_password: ""
				}
			};
		},
		props: ["flag", "errors"]
	};
</script>
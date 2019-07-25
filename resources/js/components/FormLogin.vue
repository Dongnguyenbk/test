<template>
	<div class="content">
		<form>
			<div v-if="flag == true" class="alert alert-success">Dang nhap thanh cong</div>
			<div v-else-if="flag == false" class="alert alert-danger">Sai tai khoan hoac mat khau</div>

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
			<button class="btn btn-primary" @click.prevent="$emit('justLogin', info)">Login</button>
		</form>
	</div>
</template>

<script>
	export default {
		data: function() {
			return {
				info: {
					email: "",
					password: ""
				}
			};
		},
		props: ["flag", "errors"],
	};
</script>
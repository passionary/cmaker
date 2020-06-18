<template>
	<div class="register">
		<h3 class="center-align">Register</h3>
		<form action="" @submit.prevent="">
			<div class="input-field">
				<input type="text" id="name" v-model="name">
				<label for="name">Name</label>
			</div>
			<div class="input-field">
				<input type="text" id="email" v-model="email">
				<label for="email">Email</label>
			</div>
			<div class="input-field">
				<input type="password" id="password" v-model="password">
				<label for="password">Password</label>
			</div>
			<input type="submit" class="btn submit" @click.prevent="register">
		</form>
	</div>	
</template>
<style scoped>
	.register {
		width: 80%;
		margin: 0 auto;
		margin-top: 140px;
	}
</style>
<script>
	export default {
		data: () => ({
			name:'',
			email:'',
			password:''
		}),
		methods: {
			register() {
				const reg = {
					name: this.name,
					email: this.email,
					password: this.password
				}
				axios.post('http://127.0.0.1:8000/api/registr',reg)
				.then(res => {
					const token = res.data.token
					document.cookie = `token=${token}; max-age=420`
					this.$router.push('/')
				})
			}
		}
	}
</script>
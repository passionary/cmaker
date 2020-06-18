<template>
	<div class="login">
		<h3 class="center-align">Login</h3>
		<form action="" @submit.prevent="">
			<div class="input-field">
				<input type="email" id="email" v-model="email">
				<label for="email">Email</label>
			</div>
			<div class="input-field">
				<input type="text" id="password" v-model="password">
				<label for="password">Password</label>
			</div>
			<input type="submit" class="btn submit" @click.prevent="submitHandler">
		</form>
		<router-link to="/register">register</router-link>
	</div>	
</template>
<style scoped>
	h3 {		
	}
	.login {
		width: 80%;
		margin: 0 auto;
		margin-top: 140px;
	}
</style>
<script>
	export default {
		data: () => ({
			email:'',
			password:''
		}),
		methods: {
			submitHandler() {
				const log = {
					email: this.email,
					password: this.password
				}

				axios.post('http://127.0.0.1:8000/api/login',log)
				.then(res => {
					console.log(res)
					document.cookie = `token=${res.data.token}`
					this.$router.push('/')
				})
			}
		}
	}
</script>
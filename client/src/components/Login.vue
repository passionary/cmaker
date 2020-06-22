<template>
	<div class="login">
		<h3 class="center-align">LOGIN</h3>
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
			<router-link class="reg" to="/register">register</router-link>
		</form>		
	</div>	
</template>
<style scoped>
	.reg{
		margin-left: 15px;
		font-size: 18px;
	}
	h3 {
		letter-spacing: 3px;
		margin-bottom: 30px;
	}
	.login {
		width: 80%;
		margin: 0 auto;
		margin-top: 135px;
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
					if(res.data.errors && res.data.errors.length) {
						M.toast({html: res.data.errors[0]})
						return
					}
					document.cookie = `token=${res.data.token}`
					M.toast({html: 'you are logged success'})
					this.$router.push('/')
				})
				.catch(e => {
					M.toast({html: e.message})
				})
			}
		}
	}
</script>
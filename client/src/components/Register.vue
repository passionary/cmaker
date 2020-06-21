<template>
	<div class="register">
		<h3 class="center-align">REGISTER</h3>
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
			<router-link class="log" to="/login">login</router-link>
		</form>
	</div>	
</template>
<style scoped>
	.register {
		width: 80%;
		margin: 0 auto;
		margin-top: 135px;
	}
	h3 {
		letter-spacing: 3px;
		font-size: 43px;
		margin-bottom: 30px;
	}
	.log{
		margin-left: 15px;
		font-size: 18px;
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
					if(res.data.errors && res.data.errors.length) {
						M.toast({html: res.data.errors[0]})
						return
					}
					const token = res.data.token
					document.cookie = `token=${token}; max-age=420`
					M.toast({html: 'you are registered success'})
					this.$router.push('/')
				})
				.catch(e => {
					M.toast({html: e.message})
				})
			}
		}
	}
</script>
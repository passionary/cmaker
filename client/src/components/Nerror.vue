<template>
	<div class="root center-align materialize-red lighten-3" v-if="error">
    <span>{{error}}</span>
  </div>
</template>
<style scoped="">
	.root {
		width: 100%;
		margin: 0 auto;
		margin-bottom: 30px;
		padding: 14px 0 14px 0;		
	}
	.root span {
		color: red;
	}
</style>
<script>
	export default {
		props: ['error']
	}
</script>
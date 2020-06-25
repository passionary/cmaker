<template>
	<div class="root center-align green lighten-4" v-if="nmessage">
    <span class="">{{nmessage}}</span>
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
		color: gray;
	}
</style>
<script>
	export default {
		props: ['nmessage']
	}
</script>
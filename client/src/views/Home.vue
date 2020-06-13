<template>
  <div class="container-fluid">      	
  	<header>
  		<h3 class="text-left"><span>B</span>ookmaker</h3>
  	</header>
  	<div class="d-flex content">
  		<aside>  			
  			<p v-for="item in navItems">
  				<router-link :to="item.path" :class="{'current-link':item.path == $route.path}">{{item.name}}</router-link>
  			</p>  			
	  	</aside>
	  	<main>	  		
	  		<router-view />
	  	</main>
  	</div>  	
  </div>	
</template>
<style scoped>
	a{
		text-decoration: none !important;
	}
	main{
		background: #fff;				
		height: inherit;
		width: 100%;
	}
	.content{
		min-height: 565px;
	}
	.current-link{
		color:yellow;
	}
	.container-fluid{		
		position: relative;
		z-index: 10;				
		padding: 10px 10px 0 10px;
	}
	header{				
		height: 50px;
		border-radius: 2px;
		z-index: 20;	
		padding-top: 12px;	
		background: #33393A;
	}	
	h3{
		letter-spacing: 1px;
		margin-left: 26px;
		color: #fff;
		font-style: italic;
		margin-top: -4px;
		font-size: 19px;
	}		
	aside p{		
		width: 95%;				
		padding: 20px 0 10px 0;
		border-bottom: 2px solid white;
		text-align: right;
	}			
	aside p:after{
		content:'';
		display: inline-block;
		width: 20px;
		height: 2px;
		background: #fff;
		position: relative;
		z-index: 1;
		-webkit-transform: rotate(-4deg);
		-ms-transform: rotate(-45deg);
		-o-transform: rotate(-45deg);
		transform: rotate(-30deg);
		top:15px;
		left: 19px;
	}
	aside p a{
		color: #fff;
		letter-spacing: .7px;
		margin-right: -5px;
		font-size: 18px;		
	}	
	aside{	
		border-bottom-left-radius:2px;
		border-top-left-radius:2px;
		padding-top: 35px;						
		min-width: 276px;
		background: #64B1C1;
	}	
	h3 span{
		color: #f0f68b;
		font-size: 30px;		
	}
</style>
<script>
// @ is an alias to /src
export default {
  name: 'home',
  data:() => ({
  	navItems:
	  	[
		  	{name:'HOME',path:'/'},
		  	{name:'WATCH YOUR BOOKS',path:'/self-books'},
		  	{name:'WATCH YOUR ARTICLES',path:'/self-articles'},
		  	{name:'WATCH YOUR VIDEOS',path:'/self-videos'},
	  	]	
  }),
  mounted(){  	
  }
}
</script>

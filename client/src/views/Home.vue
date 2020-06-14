<template>
  <div class="root">  		
		<div class="row">
			<main class="col s8 m8">
				<div class="title">
					<p class="center-align"><i>App for content making</i></p>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam expedita nisi fugit odit ipsa consequatur, omnis rerum, soluta laudantium ab in ea libero. Hic praesentium, aperiam, perspiciatis at voluptatibus nesciunt accusamus sunt placeat rem esse fuga sint velit. Delectus beatae ex at illo earum perspiciatis consectetur, blanditiis modi voluptas nulla?
					</p>					
				</div>
	  		<router-view />
	  	</main>
	  	<div class="wrapper col s4 m4 red lighten-2">
	  		<p class="right-align logo"><a href="/" class="l-text white-text"></a><i class="material-icons white-text">book</i></p>
	  		<nav class="nav-wrapper">  				  		
	  			<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>  			
	  			<ul id="nav-mobile" class="center hide-on-med-and-down">
	  				<li v-for="item in navItems" :class="{'active':item.path == $route.path}">
	  					<router-link tag="a" :to="item.path">
		  					{{item.name}}
		  				</router-link>
	  				</li>
	  			</ul>
	  		</nav>
	  	</div>	  	
		</div>  	
  </div>	
</template>
<style scoped>
	.title {
		width: 60%;
		margin: 0 auto;
		font-family: VarelaRound-Regular;
	}
	.title i {
		border-bottom: 1px solid #000;
	}
	.active {
		text-transform: uppercase;
		background: #616161;
	}	
	.active a {
		color: #fff;
		opacity: 1;
	}
	ul li a {
		font-family: VarelaRound-Regular;		
		font-size: 1.4rem;
		letter-spacing: 2px;
		opacity: 0.6;
	}
	.row {
		min-height: inherit;
	}
	.logo i{
		font-size: 17px;
		margin-right: 3px;
		margin-top: 3px;
	}	
	.l-text {
		vertical-align: top;
		/*font-family: VarelaRound-Regular;*/
		font-size: 14px;
		margin-right: 2px;
	}	
	.wrapper {
		min-height: inherit;	
	}
	.nav-wrapper{
		min-height: inherit;		
	}
	main {
		min-height: inherit;
	}
	#nav-mobile {
		display: -webkit-flex;
		display: -moz-flex;
		display: -ms-flex;
		display: -o-flex;
		display: flex;
		flex-direction: column;
	}
	.root {
		min-height: 100vh;
	}
	.brand-logo {
		margin-left: 5rem;
	}
</style>
<script>
export default {
  name: 'home',
  data:() => ({
  	navItems:
	  	[
		  	{name:'home',path:'/'},
		  	{name:'your books',path:'/self-books'},
		  	{name:'your articles',path:'/self-articles'},
		  	{name:'your videos',path:'/self-videos'},
	  	]	
  }),
  mounted(){
  	 $(document).ready(function(){
	    $('.sidenav').sidenav();
	  });
  }
}
</script>

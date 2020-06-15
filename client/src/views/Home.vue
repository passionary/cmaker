<template>
  <div class="root">  		
		<div class="row">
			<main class="col s9 m9">
				<div class="title">
					<p class="center-align"></p>					
				</div>
	  		<router-view />
  	</main>  		
  		<nav class="nav-wrapper col s3">
  			<div class="top-wrapper">
  				<span class="top-side">
	  				<span>
	  					<i class="menu-icon material-icons">book</i>
	  					<span>Cmaker</span>
	  				</span>  				
	  			</span>
	  			<div class="desc" @click="show($event)">
	  				<span>app for content making</span>
	  				<i class="material-icons">info_outline</i>
	  			</div>	  			
  			</div>  			
  			<div class="full-desc">
  				<h5 class="center-align">
  					<button class="btn hiddler" @click="hide($event)">hide</button>Description
  					<i class="material-icons" @click="show($event)">info</i>
  				</h5>
  				<span>
						This is a application for content making.
						What a content you want make?
						That may be: <b>books,</b> <b>articles</b> and <b>video</b>.						
  				</span>
  			</div>  			
  			<ul id="nav-mobile" class="center">
  				<li v-for="item in navItems" :class="{'active':item.path == $route.path}">
  					<router-link tag="a" :to="item.path">
	  					{{item.name}}
	  				</router-link>
  				</li>
  			</ul>  			
  		</nav>
		</div>  	
  </div>	
</template>
<style scoped>
	.menu-icon {
		font-size: 17px;
		margin-left: 10px;
	}	
	.top-side {
		display: -webkit-flex;
		display: -moz-flex;
		position: relative;
		display: -ms-flex;
		background: #fff;
		height: 100%;
		width: 38.5%;
		display: -o-flex;
		justify-content: space-between;
		padding-right: 15px;
		display: flex;
	}	
	.desc {
		width: 61.5%;
		height: 100%;
		background: #e8e8e8;
		cursor: pointer;
		position: relative;
	}
	.hiddler {
		position: absolute;
		left:0;
	}
	.desc > span {
		position: absolute;
		top:-5px;
		margin: 0;
		font-family: TitilliumWeb-LightItalic;
		color: #000;
		font-size: 16px;
		left:8%;
	}
	.desc i {		
		position: absolute;
		color: #000;
		font-size: 17px;
		right:10px;
	}
	.top-wrapper > em {
		position: absolute;
		top:-12px;
		font-size: 12px;
		left:62%;
		text-decoration: underline;
	}
	.top-wrapper {
		position: relative;
		display: -webkit-flex;
		display: -moz-flex;
		display: -ms-flex;
		height: 53px;
		display: -o-flex;
		display: flex;		
		justify-content: space-between;
	}
	.full-desc {
		margin-bottom: 20px;
		font-family: AlegreyaSans-Thin;		
		margin-top: 4px;
		padding: 0 20px 0 24px;
		height: 183.5px;
		overflow: hidden;
		line-height: 1.5;
	}
	.full-desc span {
		font-size: 21px;		
		overflow: hidden;
		text-overflow: hidden;
		letter-spacing: 1px;
	}
	.full-desc h5 {
		position: relative;
		font-weight: bold;
		margin-top: 22px;
		letter-spacing: 2px;
		padding-bottom: 5px;
	}
	.full-desc h5 > i{
		position: relative;
		top:-64px;
		height: 0;
		font-size: 21px;
		opacity: 0.5;
	}
	.top-side > span > span {
		margin-left: 3px;
		font-family: JosefinSans-Regular;
		margin-top: -1px;
	}
	.top-side > span {
		position: absolute;
		top:-4px;
		left:8.5px;
		font-size: 15px;
		color: #000;
		letter-spacing: 2px;
		display: -webkit-flex;
		display: -moz-flex;
		display: -ms-flex;
		display: -o-flex;
		display: flex;
	}
	.top-side > span > i {
		color: #000;
		margin-top: 3px;
		margin-left: 13px;
		font-size: 14px;
	}	
	.title {
		width: 60%;
		margin: 0 auto;
		font-family: VarelaRound-Regular;
	}
	.title i {
		border-bottom: 1px solid #000;
	}
	.active {
		box-shadow: none;
		background: #f6f6f6;		
	}
	.active a {
		color: #000;
		opacity: 1;
	}	
	ul li a:hover {
		text-transform: uppercase;
	}
	ul li a {
		padding-top: 5.5%;
		text-transform: uppercase;
		font-family: AlegreyaSans-Regular;
		font-size: 1.4rem;
		height: 100%;
		letter-spacing: 2px;
	}
	ul li {
		background: #c5c5c5;
		box-shadow: 0 0 2px inset #fff;
		/*opacity: .8;*/
	}
	ul li:hover {
		box-shadow:none;
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
		font-size: 14px;
		margin-right: 2px;
	}	
	.wrapper {
		min-height: inherit;	
	}
	.nav-wrapper{
		box-shadow: -1px 1px 5px #737373;
		padding: 0;
		position: relative;
		background: #c5c5c5;
		min-height: inherit;		
	}
	main {
		min-height: inherit;
	}
	#nav-mobile {
		position: absolute;
		height: 63%;
		width: 100%;
		border-bottom: 1px solid #fff;
		display: -webkit-flex;
		display: -moz-flex;
		display: -ms-flex;
		display: -o-flex;
		display: flex;
		flex-direction: column;
	}
	#nav-mobile li {
		height: 24%;
	}
	.root {
		min-height: 100vh;
	}
	.brand-logo {
		margin-left: 5rem;
	}	
	@media screen and (max-width: 1125px) {
		.full-desc span {
			font-size: 17px;
		}
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
  methods: {
  	hide(e){
  		if(parseInt($('#nav-mobile').css('top')) > 200){
  			$('#nav-mobile').animate({
	  			top: '-=207'
	  		})
		  	$('#nav-mobile li').animate({height:'148px'},'ease')
		  	$('#nav-mobile li a').animate({paddingTop:'15%'},'ease')
  		}  		
  	},
  	show(e){  		
  		if(parseInt($('#nav-mobile').css('top')) < 260){
  			$('#nav-mobile li').animate({height:'97px'})
  			$('#nav-mobile li a').animate({paddingTop:'5.5%'},'ease')
  			$('#nav-mobile').animate({
	  			top: '+=207'
	  		})
  		}  		
  	}
  },
  mounted(){
  	$(document).ready(function(){
	    $('.m-toggle').click(function(){
	    	if($('#nav-mobile').css('opacity') == 0) {
	    		$('#nav-mobile').css('opacity',1)
	    	}
	    	else $('#nav-mobile').css('opacity',0)
	    })
	  });
  }
}
</script>

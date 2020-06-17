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
	  					<span><b>C</b>maker</span>
	  				</span>  				
	  			</span>
	  			<div class="desc" @click="show($event)">
	  				<span>app for content making</span>
	  				<i class="material-icons">info_outline</i>
	  			</div>	  			
  			</div>  			
  			<div class="full-desc" @click="hide($event)">
  				<span class="">
						<i class="material-icons hiddler">
							done
						</i> 						
					</span>
  				<h5 class="center-align">  					
  					Description
  					<i class="material-icons">terrain</i>
  				</h5>
  				<span>
						This is a application for content making.
						What a content you want make?
						That may be: <span>books,</span> <span>articles</span> and <span>video</span>.						
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
	.top-side > span > span {
		font-family: AlegreyaSans-Thin;;
		margin-top: -1px;
		margin-left: 23px;
		font-size: 13px;
	}
	.top-side > span b {
		color: #000;
		margin-right: 1px;
	}
	.desc {
		width: 61.5%;
		height: 100%;
		background: #eeeeee;
		cursor: pointer;
		position: relative;
	}
	.hiddler {
		position: absolute;
		animation:hidder 1s ease infinite alternate;
		bottom:2.4%;
		opacity: 0.8;
		right:24px;
		color: #fff;
		font-size: 30px;
	}	
	.desc > span {
		position: absolute;
		top:-6px;
		margin: 0;
		font-family: AlegreyaSans-Thin;
		letter-spacing: .4px;
		color: #000;
		font-size: 13px;
		left:6.4%;
	}
	.desc i {		
		position: absolute;
		color: #777777;
		font-size: 22px;
		top:-2px;
		right:8px;
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
		height: 54px;
		display: -o-flex;
		display: flex;		
		justify-content: space-between;
	}
	.full-desc {
		position: relative;
		font-family: AlegreyaSans-Thin;
		cursor: pointer;
		padding: 0 22px 0 28px;
		height: 176.5px;
		overflow: hidden;
		line-height: 1.5;
	}
	.full-desc span {
		font-size: 16px;		
		overflow: hidden;
		color: #fff;
		text-overflow: hidden;
		letter-spacing: 1px;
	}	
	.full-desc span > span {
		font-style: italic;
	}
	.full-desc h5 {
		color: #fff;		
		position: relative;
		margin-top:19px;
		text-transform: uppercase;
		margin-bottom: 14px;
		font-size: 16px;
		padding-bottom: 5px;
		letter-spacing: 2px;
	}
	.full-desc h5 > i{
		position: relative;
		top:-18px;
		left: -1%;
		color: #fff;
		height: 0;		
		font-size: 15px;
		opacity: 0.6;
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
		background: #ffffff;
	}
	.active a {
		color: #000;
		opacity: 1;
	}	
	ul li a:hover {
		text-transform: uppercase;
	}
	ul li a {
		padding-top: 14%;
		text-transform: uppercase;
		font-family: AlegreyaSans-Regular;
		font-size: 1.4rem;
		height: 100%;
		letter-spacing: 2px;
	}
	ul li {
		background: #bebebe;
		box-shadow: 0 0 2px inset #fff;
		height: 25%;
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
		padding: 0;
		position: relative;
		background: #b9baba;
		min-height: 646px;
	}
	main {
		min-height: inherit;
	}
	#nav-mobile {
		position: absolute;
		height: 92.2%;
		width: 100%;
		top: 53px;
		border-bottom: 1px solid #fff;
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
	@media screen and (max-width: 1125px) {
		.full-desc span {
			font-size: 17px;
		}
	}
	@keyframes hidder {
		0%{
			-webkit-transform: scale(1,1);
			-ms-transform: scale(1,1);
			-o-transform: scale(1,1);
			transform: scale(1,1);
		}
		100% {
			-webkit-transform: scale(1.1,1.1);
			-ms-transform: scale(1.1,1.1);
			-o-transform: scale(1.1,1.1);
			transform: scale(1.1,1.1);
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
	  			top: '-=171'
	  		},function(){
	  			$('.top-wrapper').css('borderBottom','.6px solid rgba(58,58,58,0.01)')
	  		})	  		
		  	$('#nav-mobile').animate({height:'92.2%'},'ease')
		  	$('#nav-mobile li a').animate({paddingTop:'14%'},'ease')
  		}  		
  	},
  	show(e){
  		if(parseInt($('#nav-mobile').css('top')) < 200){
  			$('#nav-mobile').animate({
	  			top: '+=171'
	  		},700,'linear',function(){
	  			$('#nav-mobile').animate({height:'425px'})
	  			$('#nav-mobile li a').animate({paddingTop:'5.5%'})
	  		})
  		}  		
  	}
  },
  mounted(){
  	setTimeout(() => {this.show()},2000)
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

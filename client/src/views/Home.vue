<template>
  <div class="root">  	
		<div class="row">			
			<main class="col s9 m9">
				<div class="logout" @click="logout">

					<p>{{user.username}}</p>
					<font-awesome-icon icon="sign-out-alt" />
				</div>				
				<div class="title">
					<p class="center-align"></p>					
				</div>
	  		<router-view />
  		</main>
  		<div class="nav-container col s3">
	  		<nav class="nav-wrapper">
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
							It may be: <span>books,</span> <span>articles</span> and <span>video</span>.						
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
  </div>	
</template>
<style scoped>
	.logout {
		display: -webkit-flex;
		display: -moz-flex;
		display: -ms-flex;
		display: -o-flex;
		display: flex;
		justify-content: space-between;
		position: absolute;
		right:25px;
		z-index: 100;
		min-width: 72px;
		cursor: pointer;
		top: 18px;
		border-bottom: 1px solid rgba(0,0,0,0.17);
	}
	.logout p{
		margin: 0 0 5px 0;
		margin-top: -4px;
		font-family: AlegreyaSans-Thin;
		font-size: 19px;
	}
	.fa-sign-out-alt {
		color: #00bcd4;
		vertical-align: baseline;
		font-size: 21px;		
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
	.top-side > span {
		position: absolute;
		top:-4px;
		left:10%;
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
		font-family: AlegreyaSans-Thin;
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
	.nav-container {
		position: fixed;
		right: 0 !important;
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
		display: -o-flex;
		display: flex;
		display: none;
		height: 54px;			
		justify-content: space-between;
	}
	.full-desc {
		position: relative;
		border-bottom: 1px solid rgba(123,125,125,1);
		border-top: 1px solid rgba(255,255,255,0.6);
		font-family: AlegreyaSans-Thin;
		cursor: pointer;
		padding: 0 15px 0 24px;
		height: 192px;
		overflow: hidden;
		line-height: 1.5;
	}
	.full-desc span {
		font-size: 17px;		
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
		margin-top:23px;
		margin-bottom: 20px;
		font-size: 18px;
		font-weight: bold;
		padding-bottom: 5px;
		letter-spacing: 2.4px;
	}
	.hiddler {
		position: absolute;
		animation:hidder 1s ease infinite alternate;
		bottom:0.4%;
		opacity: 0.8;
		right:20px;
		color: #99e2e5;
		font-size: 28px;
	}
	.full-desc h5 > i{
		position: relative;
		top:-18px;
		left: -1.8%;
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
		border-top: 1px solid rgba(0,0,0,0.1) !important;
		border-bottom: none !important;
		background: #fff !important;
	}
	.active a {
		color: #000;
		opacity: 1;
	}	
	#nav-mobile {
		position: absolute;
		height: 70.4%;
		width: 100%;
		top: 29.7%;
		display: -webkit-flex;
		display: -moz-flex;
		display: -ms-flex;
		display: -o-flex;
		display: flex;
		flex-direction: column;
	}	
	#nav-mobile li a:hover {
		text-transform: uppercase;
	}
	#nav-mobile li a {
		padding-top: 8%;
		text-transform: uppercase;
		font-family: AlegreyaSans-Regular;
		font-size: 1.4rem;
		height: 100%;
		letter-spacing: 2px;
	}
	#nav-mobile li {
		position: relative;
		background: #a1a1a1;
		border-bottom: 1px solid #7b7d7d;
		border-top: 1px solid rgba(255,255,255,0.6);
		height: 25%;
	}
	#nav-mobile li:hover {
		box-shadow:none;
	}
	.row {
		margin-bottom: 0;
		position: relative;
		min-height: inherit;
	}
	.col {
		padding: 0;
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
		width: 100%;
		padding: 0;
		position: relative;
		background: #a1a1a1;
		min-height: 646px;
	}
	main {
		position: relative;
		min-height: inherit;
	}	
	.root {
		min-height: 100vh;
	}	
	.brand-logo {
		margin-left: 5rem;
	}	
	@media screen and (max-width: 1200px) {
		.full-desc span {
			font-size: 15px;
		}
		.desc {
			width: 20%;
		}
		.top-side {
			width: 80%;
		}
		.top-side span {
			left: 20%;			
		}
		.desc span {
			display: none;
		}
		.hiddler {
			bottom:-4%;
		}
	}
	@media screen and (max-width: 1090px) {
		.full-desc span {
			font-size: 14px;
		}
		.hiddler {
			bottom:-4%;
		}
	}
	@media screen and (max-width: 1000px) {
		.full-desc h5 {
			margin-top: 15px;
			font-size: 16px;
			margin-bottom: 10px;
		}
		.hiddler {
			bottom:-4%;
		}
	}
	@media screen and (max-width: 830px) {
		.full-desc h5 {
			margin-top: 15px;
			font-size: 15px;
			margin-bottom: 10px;
		}
		.hiddler {
			bottom:-4%;
		}
	}
	@media screen and (max-width: 784px) {
		.full-desc {
			display: none;
		}
		.top-wrapper {
			display: -webkit-flex;
			display: -moz-flex;
			display: -ms-flex;
			display: -o-flex;
			display: flex;
		}
		.desc {
			width: 30%;
		}
		.top-side {
			width: 70%;
		}
		.top-side span {
			left:10%;
		}
		.desc span {
			display: none;		
		}
		.desc i {
			right:30%;
		}
		#nav-mobile {
			height: 92%;
			top:54px;
		}
		#nav-mobile li a{
			padding-top: 22.5%;
			font-size: 1.2rem;
		}
	}
	@media screen and (max-width: 640px) {
		#nav-mobile li a {
			font-size: 1rem;
			padding: 0;
			padding-top: 27%;
		}
	}
	@media screen and (max-width: 572px) {
		#nav-mobile li a {
			font-size: .8rem !important;
			padding-top: 34% !important;
		}
	}
	@media screen and (max-width: 500px) {
		#nav-mobile li a {
			font-size: .7rem !important;
			padding-top: 34% !important;
		}
	}
	@media screen and (max-width: 467px) {
		#nav-mobile li a {
			font-size: .9rem !important;			
			padding-top: 55% !important;
		}
		#nav-mobile li {
			line-height: 2;
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
import $ from 'jquery'
import { mapActions, mapGetters } from 'vuex'
import { getCookie,deleteCookie } from '@/modules'
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
  computed: {
    ...mapGetters(['user'])
  },
  methods: {
  	...mapActions(['auth']),
  	logout() {
  		const token = getCookie('token')

  		fetch(`http://127.0.0.1:8000/api/logout?token=${token}`)
  		.then(res => res.json())
  		.then(res => {
  			M.toast({html: res.message})
  		})
  		.then(() => {
  			deleteCookie('token')
  			this.$router.push('/login')
  		})
  	},
  	hide(e){
  		$('.top-wrapper').css('display','flex')
  		if(parseInt($('#nav-mobile').css('top')) > 190){
  			$('#nav-mobile').animate({
	  			top: '-=139'
	  		},function(){
	  			$('.top-wrapper').css('borderBottom','.6px solid rgba(58,58,58,0.01)')
	  		})	  		
		  	$('#nav-mobile').animate({height:'93%'},'ease')
		  	$('#nav-mobile li a').animate({paddingTop:'14%'},'ease')
  		}  		
  	},
  	show(e){
  		if(parseInt($('#nav-mobile').css('top')) < 1000){
  			$('.top-wrapper').hide();
  			$('#nav-mobile').animate({
	  			top: '+=139'
	  		},700,'linear',function(){
	  			$('#nav-mobile').animate({height:'464.5px'})
	  			$('#nav-mobile li a').animate({paddingTop:'7.5%'})
	  		})
  		}  		
  	}
  },
  async mounted(){
  	await this.auth()
    this.username = this.user.name
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

<template>
  <div class="root"> 	
		<div class="row">
			<main class="col s12 m12">
				<div class="header">
					<div class="navigation">
						<span><router-link to="/">Home</router-link></span>
						<span class="delimiter">|</span>
						<span><router-link to="/about">About app</router-link></span>
					</div>
					<div class="title">
						<h2>Content Maker</h2>
					</div>
					<div class="logout">
						<span>{{user.username}}</span>
						<div @click="logout" class="logout-icon"></div>
					</div>
				</div>
	  		<router-view />
  		</main>
  		<div class="nav-container">
				<svg width="125" height="260" viewBox="0 0 125 260" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				<g clip-path="url(#clip0_23_19)">
				<ellipse rx="113.687" ry="129.592" transform="matrix(0.995094 0.098933 -0.0889945 0.996032 10.0161 130.089)" fill="#E5E7F0" fill-opacity="0.29"/>
				<path d="M122.648 141.286C116.297 212.362 60.6731 264.846 -1.47231 258.668C-63.6177 252.489 -108.966 189.966 -102.615 118.891C-96.2647 47.815 -40.6408 -4.66938 21.5046 1.50916C83.65 7.6877 128.998 70.2107 122.648 141.286Z" stroke="#3A3A3A" stroke-opacity="0.15"/>
				<g filter="url(#filter0_d_23_19)">
				<ellipse cx="45.6229" cy="202.775" rx="29.9041" ry="31.1003" transform="rotate(3.47125 45.6229 202.775)" fill="white"/>
				</g>
				<g filter="url(#filter1_d_23_19)">
				<circle cx="81.4497" cy="128.976" r="30.9394" transform="rotate(3.47125 81.4497 128.976)" fill="white"/>
				</g>
				<g filter="url(#filter2_d_23_19)">
				<circle cx="43.6213" cy="54.2976" r="31.9493" transform="rotate(3.47125 43.6213 54.2976)" fill="white"/>
				</g>
				<rect x="27.7037" y="38.1603" width="33.2273" height="33.2273" transform="rotate(2.14563 27.7037 38.1603)" fill="url(#pattern0)"/>
				<rect x="63.2252" y="108.504" width="37.1272" height="37.1272" transform="rotate(3.47125 63.2252 108.504)" fill="url(#pattern1)"/>
				<rect x="26.5918" y="184.252" width="35.8849" height="35.8849" transform="rotate(0.666888 26.5918 184.252)" fill="url(#pattern2)"/>
				<circle cx="0.5" cy="129.5" r="27.5" fill="#FDFDFD"/>
				<circle cx="0.5" cy="129.5" r="27" stroke="#3A3A3A" stroke-opacity="0.15"/>
				</g>
				</svg>
							
				<router-link tag="div" to="/self-articles" class="nav-articles" />
				<router-link tag="div" to="/self-books" class="nav-books" />
				<router-link tag="div" to="/self-videos" class="nav-videos" />
  		</div>
		</div>  	
  </div>	
</template>
<style scoped>
	.header {
    display: flex;
    justify-content: space-between;
  }
  .navigation {
    font-family: GroteskThin;
    padding: 40px 0 0 60px;
  }
  .navigation span {
    font-size: 28px;
    margin-right: 35px;
  }
	.navigation a {
		color: #555;
	}
	.navigation .delimiter {
		font-size: 23px;
	}
  .title {
    font-family: Brich;
    font-style: italic;
    font-weight: 100;
    margin-right: 190px;
  }
	.title h2 {
		font-size: 36px;
	}
  .logout {
    display: flex;
    padding: 40px 40px 0 0;
  }
  .logout span {
    font-style: italic;
    margin-right: 38px;
  }
  .logout-icon {
    cursor: pointer;
    width: 20px;
    height: 20px;
    background: url(/images/logout.png) no-repeat;
    background-size: cover;
  }
	.nav-articles {
		position: absolute;
		left: 9px;
		transition: transform .4s ease;
		top: 26px;
		width: 64px;
		height: 64px;
		cursor: pointer;
		border-radius: 50%;
		background: #FFFFFF;
		/* border: 2px solid #F0F0F0; */
		box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.5);
		text-align: center;
	}
	.nav-articles::after {
		content: '';
		display: inline-block;
		margin-top: 12px;
		width: 40px;
		height: 40px;
		background: url(/images/nav-article.jpg) no-repeat;
		background-size: 100% 100%;
		background-position: center;
	}
	.nav-books {
		transition: transform .4s ease;
		position: absolute;
		left: 48px;
		top: 97px;
		width: 64px;
		cursor: pointer;
		height: 64px;
		border-radius: 50%;
		background: #FFFFFF;
		/* border: 2px solid #F0F0F0; */
		box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.5);
		text-align: center;
	}
	.nav-books::after {
		content: '';
		display: inline-block;
		margin-top: 16px;
		width: 34px;
		height: 34px;
		background: url(/images/nav-book.jfif) no-repeat;
		background-size: cover;
		background-position: center;
	}
	.nav-videos {
		transition: transform .4s ease;
		cursor: pointer;
		position: absolute;
		left: 9px;
		top: 167px;
		width: 64px;
		height: 64px;
		border-radius: 50%;
		background: #FFFFFF;
		/* border: 2px solid #F0F0F0; */
		box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.5);
		text-align: center;
	}
	.nav-books:hover, .nav-videos:hover, .nav-articles:hover {
		box-shadow: 0px 0px 3px #73a2d1;
		transform: scale(1.1, 1.1);
	}
	.nav-videos::after {
		content: '';
		display: inline-block;
		margin-top: 12px;
		width: 40px;
		height: 40px;
		background: url(/images/nav-video.jpg) no-repeat;
		background-size: cover;
		background-position: center;
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
		left: 0 !important;
		top: 34%;
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
				$('#nav-mobile').animate({height:'464.5px'})
				$('#nav-mobile li a').animate({paddingTop:'7.5%'})
  			$('#nav-mobile').animate({
	  			top: '+=139'
	  		},700,'linear',function(){
	  			
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

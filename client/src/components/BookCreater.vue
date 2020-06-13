<template>
  <div class="books" ref="books">
  	<button class="save btn btn-primary my-2" @click="show">save</button>
  	<div class="alert alert-danger" v-if="error">
  		<p>{{error}}</p>
  	</div>
  	<input type="text" class="form-control w-50 mx-auto my-3" placeholder="book-name" v-model="name">
  	<div class="articles d-flex justify-content-between flex-wrap">
  		<div class="form-group article d-flex justify-content-between flex-wrap" v-for="list in lists" ref="article" :key="list.page">
	    	<div class="top w-100 h-25 d-flex justify-content-between">
	    		<input type="text" :name="list.page" placeholder="title" @change="save">
	    		<p>{{list.page}}</p>	
	    	</div>    	
	    	<textarea :name="list.page" id="" cols="30" rows="10" class="form-control h-75" placeholder="description" @change="save($event)"></textarea>   
	    </div>
  	</div>    
    <button class="adder btn btn-success" @click="addPages">add pages</button>
  </div>
</template>

<style scoped>
	.adder{
		position: fixed;		
		bottom:4%;
		right: 2%;
	}
	.articles{
		width: 80%;
		margin: 0 auto;
	}
	.article{
		opacity: 0;
		transition: opacity 1.5s ease;
		width: 27%;
		height:240px;
	}
	.appearing{
		opacity: 1;
	}
	.form-group{
		border: 1px solid #000;		
	}
	.save{
		position: relative;
		left: 84%;
		letter-spacing: 3px;
		text-transform: uppercase;
		font-size: 14px;
		width: 100px;
	}
</style>

<script>
export default {
  name: 'HelloWorld',
  data:() => ({
  	lists:[{page:1},{page:2},{page:3}],  	
  	bookData:[],
  	lastIndex:3,
  	sendData:[],
  	error:'',
  	lev:false,
  	name:''  	  	
  }),  
  methods:{ 
  	addPages(){
  		this.bookData.push(new Map())
  		this.lists.push({page:++this.lastIndex})  	
  		setTimeout(() => {
  			this.$refs.article[this.$refs.article.length - 1].classList.add('appearing')
  		},100)	  		
  		let bottom = document.documentElement.scrollHeight - document.documentElement.scrollHeight >= 1200 ? 1000 : 400;  		  		
  		if (!this.lev) {
  			let timer = setInterval(() => {  			
	  			if (bottom >= document.documentElement.scrollHeight - 600) {	  				
	  				clearTimeout(timer);
	  				this.lev = false;
	  				return;
	  			}
	  			this.lev = true;
	  			bottom+=16;
	  			window.scrollTo(0,bottom)
	  		},1000/60)
  		}  				  	
  	},	
  	save(event){
  	 	let key = event.target.placeholder == 'description' ? '2' : '1';  	 	
  		this.bookData[+event.target.name - 1].set(key,{cont:event.target.value,page:event.target.name});  		 	
  	},
  	show(){  		  		  	  			  	
  		this.bookData.forEach((item,i) => {
  			this.sendData.push(Object.fromEntries(item.entries()))
  		})	  		
  		localStorage.setItem(this.name,JSON.stringify(this.sendData))	  	
  	},
  	bookFuller(){
  		for(let i=0;i<this.lists.length;i++){
	    	this.bookData.push(new Map());
	    	this.$refs.article[i].classList.add('appearing');
	    }
  	}
  },
  mounted(){  	
   	this.bookFuller();    
  }
}
</script>

<style scoped>

</style>

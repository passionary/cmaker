<template>
  <div class="books" ref="books">
  	<button class="save btn cyan" @click="show">save</button>
  	<div class="green lighten-3" v-if="message">
  		<p class="center-align white-text">{{message}}</p>
  	</div>
    <div class="input-field">
      <input id="name" type="text" class="validate" placeholder="Book name" v-model="name">
    </div>  	
  	<div class="articles d-flex justify-content-between flex-wrap">
  		<div class="article" v-for="list in lists" ref="article" :key="list.page">
        <div class="input-field">
          <textarea id="first" class="materialize-textarea" :name="list.page" placeholder="left page" @change="save($event)"></textarea>
        </div>
        <div class="input-field">
          <textarea id="second" class="materialize-textarea" :name="list.page" placeholder="right page" @change="save($event)"></textarea>
        </div>
	    </div>      
  	</div>
    <button class="adder btn cyan" @click="addPages">add pages</button>
  </div>
</template>

<style scoped>
	.adder{
    position: relative;
    margin-top: 40px;
    margin-bottom: 40px;
    left:80%;
	}
  .input-field {
    width: 89%;
    margin: 0 auto;
  }
	.articles{
		width: 80%;
    border-top: 1px solid rgba(0,0,0,0.4);
		margin: 0 auto;
    position: relative;
    margin-top: 50px;
	}
	.article{
		opacity: 0;
		transition: opacity 1.5s ease;
		width: 100%;
    margin-top: 10%;
    min-height: 200px;
    border-bottom: 1px solid rgba(0,0,0,0.4);
	}
	.appearing{
		opacity: 1;
	}
	.save{
		position: relative;
		left: 85.7%;
    top:20px;
		letter-spacing: 3px;
		text-transform: uppercase;
		font-size: 14px;
		width: 88px;
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
  	message:'',
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
  	},	
  	save(event){
  	 	let key = event.target.placeholder == 'left page' ? '1' : '2';
  		this.bookData[+event.target.name - 1].set(key,{cont:event.target.value,page:event.target.name});  		 	
  	},
  	show(){  		  		  	  			  	
  		this.bookData.forEach((item,i) => {
  			this.sendData.push(Object.fromEntries(item.entries()))
  		})
  		localStorage.setItem(this.name,JSON.stringify(this.sendData))
      if(this.sendData.length)
      this.message = 'your book saved'
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

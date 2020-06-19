<template>
  <div class="books" ref="books">
  	<button class="save btn cyan" @click="show">save</button>
  	<div class="green lighten-3" v-if="message">
  		<p class="center-align white-text">{{message}}</p>
  	</div>
    <div class="input-field">
      <input id="name" :value="$route.params.bk.n" type="text" class="validate" placeholder="Book name" v-if="$route.params.bk && $route.params.bk.n">
      <input type="text" id="name" class="validate" placeholder="Book name" v-else>
    </div>  	
  	<div class="articles d-flex justify-content-between flex-wrap">
  		<div class="article" v-for="(list,index) in bookData" ref="article">
        <div class="input-field">
          <textarea v-if="$route.params.bk && $route.params.bk.c" id="first" class="materialize-textarea" :name="index" placeholder="left page" @change="save($event)" :value="list.get && list.get('0') ? list.get('0').cont : ''"></textarea>
          <textarea id="first" class="materialize-textarea" :name="index" placeholder="left page" @change="save($event)" v-else></textarea>
        </div>
        <div class="input-field">
          <textarea v-if="$route.params.bk && $route.params.bk.c" id="second" class="materialize-textarea" :name="index" placeholder="right page" @change="save($event)" :value="list.get && list.get('1') ? list.get('1').cont : ''"></textarea>
          <textarea id="second" class="materialize-textarea" :name="index" placeholder="right page" @change="save($event)" v-else></textarea>
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
  		setTimeout(() => {
  			this.$refs.article[this.$refs.article.length - 1].classList.add('appearing')
  		},100)
  	},
  	save(event){      
  	 	let key = event.target.placeholder == 'left page' ? 0 : 1;
      let page
      page = key === 0 ? +event.target.name + (+event.target.name + 1)
      : +event.target.name + (+event.target.name + 2)
  		this.bookData[+event.target.name].set(key,{cont:event.target.value,page});
  	},
  	show(){  		  		  	  			  	
  		this.bookData.forEach((item,i) => {
  			this.sendData.push(Object.fromEntries(item.entries()))
  		})
      localStorage.setItem(`type=book,name=${document.querySelector('#name').value}`,JSON.stringify(this.sendData))
      if(this.sendData.length)
      this.message = 'your book saved'
  	},
  	bookFuller(){
  		for(let i=0;i<3;i++){
	    	this.bookData.push(new Map());
	    }
  	}
  },
  mounted(){
    if(this.$route.params.bk) {
      this.name = this.$route.params.bk.n;
      this.bookData = this.$route.params.bk.c.map((e,i) => new Map(
        Object.entries(e))
      )
      setTimeout(() => {
        this.$refs.article.forEach(e => e.classList.add('appearing'))
      },100)
    }
   	else {
      this.bookFuller();
      setTimeout(() => {
        this.$refs.article.forEach(e => e.classList.add('appearing'))
      },100)
    }
  }
}
</script>

<style scoped>

</style>

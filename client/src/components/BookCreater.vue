<template>
  <div class="container" ref="books">
    <router-link v-if="$route.params.bk" to="/self-books" class="text"><i class="material-icons">arrow_back</i></router-link>
  	<nmessage :nmessage="nmessage" />
    <nerror :error="error" />
    <div class="input-field name-field">
      <input id="name" :value="$route.params.bk.book.name" type="text" class="validate form-control" placeholder="Book name" v-if="$route.params.bk && $route.params.bk.book" disabled="true">
      <input v-model="name" type="text" id="name" class="validate form-control" placeholder="Book name" v-else>
    </div>  	
  	<div class="articles d-flex justify-content-between flex-wrap">
  		<div class="article" v-for="(list,index) in bookData" ref="article" :key="index">
        <div class="input-field">
          <textarea v-if="$route.params.bk && $route.params.bk.book" id="first" class="materialize-textarea form-control" :name="index" placeholder="left page" @change="save($event)" :value="list.left.get('content') ? list.left.get('content') : ''"></textarea>
          <textarea id="first" class="materialize-textarea form-control" :name="index" placeholder="left page" @change="save($event)" v-else></textarea>
        </div>
        <div class="input-field">
          <textarea v-if="$route.params.bk && $route.params.bk.book" id="second" class="materialize-textarea form-control" :name="index" placeholder="right page" @change="save($event)" :value="list.right.get('content') ? list.right.get('content') : ''"></textarea>
          <textarea id="second" class="materialize-textarea form-control" :name="index" placeholder="right page" @change="save($event)" v-else></textarea>
        </div>
	    </div>      
  	</div>
    <div class="submit-controls">
      <button class="adder btn cyan" @click="addPages">add pages</button>
      <button class="save btn" @click="show">save</button>
    </div>
  </div>
</template>

<style scoped>
  .form-control {
    margin-top: 20px !important;
  }
  .container {
    position: relative;
    padding: 20px 0 100px 0;
  }
  .submit-controls {
    width: 100%;
    display: flex;
    justify-content: flex-end;
  }
	.adder{
    margin: 40px 25px 40px 0;
	}
  .save{
    margin: 40px 0 40px 0;
	}
  .text {
  }
  .name-field {
    margin-top: 1.6rem !important;
  }
  .input-field {
    width: 100%;
    margin: 0 auto;
  }
	.articles{
		width: 100%;
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
</style>

<script>
import { mapActions, mapGetters, mapMutations } from 'vuex'
export default {
  name: 'HelloWorld',
  data:() => ({
  	bookData:[],
    name:'',
    created:[],
  	name:''  	  	
  }),
  computed: {
    ...mapGetters(['user','error','nmessage'])
  },
  methods:{
    ...mapActions(['auth']),
    ...mapMutations(['setError','setMessage']),
  	addPages(){
      this.bookData.push({left:new Map(),right:new Map()})
  		setTimeout(() => {
  			this.$refs.article[this.$refs.article.length - 1].classList.add('appearing')
  		},100)
  	},
  	save(event){      
  	 	let key = event.target.placeholder == 'left page' ? 'left' : 'right';
      let page      
  		this.bookData[+event.target.name][key].set("content",event.target.value);
  	},
  	show(){
      let sendData = []
  		this.bookData.forEach((item,i) => {
        let jitem = []
        jitem.push(item.left.get('content') ? {content:item.left.get('content')} : {content:""},item.right.get('content') ? {content:item.right.get('content')} : {content:""})
        sendData.push(jitem)
  		})
      console.log(sendData,this.bookData)
      if(this.$route.params.bk || this.created[0]) {
        axios.post('http://127.0.0.1:8000/api/save-book', {
          id:this.created[0] ? this.created[1] : this.$route.params.bk.book.id,
          pages:JSON.stringify(sendData)
        })
        .then(res => {
          console.log(res)
          if(res.data.errors || res.data.errors2) {
            this.setError(Object.values(res.data.errors)[0] && Object.values(res.data.errors)[0][0] || Object.values(res.data.errors2)[0] && Object.values(res.data.errors2)[0][0])
            return
          }
          this.setMessage(res.data.message || "")
        })
        return
      }
      if(!this.name) {
        this.setError('book must have a name')
        return
      }
      fetch('http://127.0.0.1:8000/api/create-book', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify({
          user_id: this.user.id,
          name: this.name,
          pages:JSON.stringify(sendData)
        })
      })
      .then(res => res.json())
      .then(res => {
        console.log(res)
        if(res.errors || res.errors2) {
          this.setError(Object.values(res.errors)[0] && Object.values(res.errors)[0][0] || Object.values(res.errors2)[0] && Object.values(res.errors2)[0][0])
          return
        }
        this.setMessage("your book created successfully")
        this.created[0] = true
        this.created[1] = res.id
      })      
  	},
  	bookFuller(){
  		for(let i=0;i<3;i++){
	    	this.bookData.push({left:new Map(),right:new Map()});
	    }
  	}
  },
  async mounted(){
    await this.auth()
    if(this.$route.params.bk) {
      this.name = this.$route.params.bk.book.name;
      this.bookData = this.$route.params.bk.book.pages
      .map((e,i) => new Map(Object.entries(e)))
      let pages = []
      for(let i=0;i<this.bookData.length;i++) {
        const b = this.bookData[i]
        const b2 = this.bookData[i+1]
        if(b2) {
          pages.push({
            'left': b,
            'right': b2
          })
          i++
          continue
        }
      }
      this.bookData = pages
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

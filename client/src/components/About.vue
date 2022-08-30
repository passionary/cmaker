<template>
  <div class="bb-custom-wrapper">
  	<h3 class="center-align">About application "Content Maker"</h3>
    <p>This application is for content making. As the content may be books or articles or videos.</p>
    <p>For book creation you need past text for every page and count this pages. Then you can see your book in preview</p>
    <p>In preview you get your text on interactive book reader. You can list pages and read your book by page.</p>
    <p>For article creation you are getting a spicial editor that gives you all tools for writing of article. </p>
    <p>For video creation you just need past your video in accessable format by file input.</p>
    <p>And what is a purpose of this all ?</p>
    <p>Generally, you can send your content by request on our portal by form submitting in this app.</p>
    <p>Then, administrator will see your request and ,perhaps, you will get some email from administrator.</p>
    <p>In this email we will give you an answer about your sended content.</p>
    <p>Do you want to become a great person that makes cool content ?</p>
    <p>Then we wait for your great request ! The world need for your cool content !</p>
  </div>
</template>

<style scoped>  
  .content{
    position: absolute;
    padding: 0 20px 0 20px;
  }
  .edit {
    position: absolute;
    left:1%;
    display: -webkit-flex;
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: flex;
    justify-content: space-between;
    min-width: 68px;
    top: 25px;
  }
  .edit p {
    text-transform: uppercase;
    margin-top: -1px;
    font-size: 16px;
    letter-spacing: 2px;
    font-family: TitilliumWeb-LightItalic;
  }
  .edit i {
    font-size: 20px;
  }
  .bb-custom-wrapper nav a {
    background: #00bcd4;
  }
  h3 {
    margin-top: 2rem;
    margin-bottom: 3rem;
  }
  form {
    margin-top: 3rem;
  }
  .bb-custom-wrapper {
    width:80%;
  }
  .send {
    margin-top: 20px;
  }
  #bb-bookblock {
    height: 73vh;
    margin-top: 2.5rem;
    width: 100%;
  }
  .left-content{
    width: 48%;
    left:0;
  }
  nav {
    background: none;
    box-shadow: none;
    margin-top: 3rem;
  }
  .right-content{
    width: 48%;
    left:50%;
  }    
  .page{
    position: absolute;
    bottom:2%;
    left:4%;
  }
  .page2{
    position: absolute;
    bottom:2%;
    right:4%;
  }
</style>

<script>
export default {

}
</script>

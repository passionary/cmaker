<template>
  <div id="app">
    <router-view />
  </div>
</template>

<style>
  /* fallback */
@font-face {
  font-family: 'Material Icons';
  font-style: normal;
  font-weight: 400;
  src: url(https://fonts.gstatic.com/s/materialicons/v52/flUhRq6tzZclQEJ-Vdg-IuiaDsNc.woff2) format('woff2');
}
@font-face {
  font-family: 'TitilliumWeb-LightItalic';
  src: url(/fonts/static/JosefinSans-ThinItalic.ttf);
}
@font-face {
  font-family: 'JosefinSans-Regular';
  src: url(/fonts/prompt/Prompt-Regular.ttf);
}
@font-face {
  font-family: 'AlegreyaSans-Regular';
  src: url(/fonts/alegra/AlegreyaSans-Regular.ttf);
}
@font-face {
  font-family: 'AlegreyaSans-Thin';
  src: url(/fonts/monserat/Montserrat-ExtraLight.ttf);
}
@font-face {
  font-family: 'LibreBaskerville-Regular';
  src: url(/fonts/basker/LibreBaskerville-Regular.ttf);
}
@font-face {
  font-family: Brich;
  src: url(/fonts/brich/BrichRegular.otf);
}
@font-face {
  font-family: GroteskThin;
  src: url(/fonts/grotesk/StudioGroteskThin.ttf);
}
.modal-overlay {
  background: none;
}
.material-icons {
  font-family: 'Material Icons';
  font-weight: normal;
  font-style: normal;
  font-size: 24px;
  line-height: 1;
  letter-spacing: normal;
  text-transform: none;
  display: inline-block;
  white-space: nowrap;
  word-wrap: normal;
  direction: ltr;
  -webkit-font-feature-settings: 'liga';
  -webkit-font-smoothing: antialiased;
}
div[data-glide-el=controls] {
  position:absolute;
  left:0;
  right:0;
  top:40%;
}
button[data-glide-dir="<"] {
  height: 80px;
  left: -40px;
}
button[data-glide-dir="<"], button[data-glide-dir=">"] {
    position: absolute;
    border: 0;
    outline: 0;
    padding: 10px;
    border-radius: 3px;
    background-color: #73a2d1;
    color: #fff;
    cursor: pointer;
}
button[data-glide-dir=">"] {
  height: 80px;
  right: -40px;
}
.glide__arrows, .glide__bullets {
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
.glide__bullets {
    text-align: center;
}
.glide__bullet {
    background-color: #eee;
    border: 0;
    outline: 0;
    width: 15px;
    height: 15px;
    border-radius: 100%;
    cursor: pointer;
}
.glide__bullet:hover {
    background-color: #d5d5d5;
}
.glide__bullet--active, .glide__bullet--active:hover {
    background-color: #73a2d1;
}

.glide__bullet+.glide__bullet {
    margin-left: 10px;
}
.glide__bullet:focus {
  outline: none;
  background-color: #73a2d1;
}
.glide__slides {
  min-width: 1000px;
  justify-content: center;
}
.glide__slide--active .card {
  border: 2px solid #73a2d1;
}
</style>

<script>
	export default {		
	}
</script>
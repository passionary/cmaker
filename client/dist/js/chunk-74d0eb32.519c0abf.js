(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-74d0eb32"],{"0411":function(e,t,a){"use strict";var r=a("785a"),s=a.n(r);s.a},"07ac":function(e,t,a){var r=a("23e7"),s=a("6f53").values;r({target:"Object",stat:!0},{values:function(e){return s(e)}})},"5eb7":function(e,t,a){"use strict";a.r(t);var r=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{ref:"videos",staticClass:"videos"},[a("nmessage",{attrs:{nmessage:e.nmessage}}),a("nerror",{attrs:{error:e.error}}),a("div",{staticClass:"input-field",attrs:{id:"name"}},[a("label",{attrs:{for:"name-field"}},[e._v("Name")]),a("input",{directives:[{name:"model",rawName:"v-model",value:e.name,expression:"name"}],attrs:{type:"text",name:"item[name]",id:"name-field",placeholder:"name"},domProps:{value:e.name},on:{input:function(t){t.target.composing||(e.name=t.target.value)}}})]),a("h5",{staticClass:"form-title center-align"},[e._v("FORM SUBMIT")]),a("form",{staticClass:"form-group mx-auto",attrs:{id:"form",enctype:"multipart/form-data",action:"http://127.0.0.1:8000/api/request",method:"post"},on:{submit:function(t){return t.preventDefault(),e.submitHandler(t)}}},[a("input",{attrs:{type:"hidden",name:"request[type]",value:"video"}}),a("textarea",{directives:[{name:"model",rawName:"v-model",value:e.message,expression:"message"}],staticClass:"materialize-textarea",attrs:{name:"request[message]",placeholder:"message"},domProps:{value:e.message},on:{input:function(t){t.target.composing||(e.message=t.target.value)}}}),a("input",{directives:[{name:"model",rawName:"v-model",value:e.author,expression:"author"}],staticClass:"form-control",attrs:{type:"text",name:"request[author]",placeholder:"author"},domProps:{value:e.author},on:{input:function(t){t.target.composing||(e.author=t.target.value)}}}),a("input",{staticClass:"form-control",attrs:{type:"hidden",name:"item[name]",placeholder:"name"},domProps:{value:e.name}}),a("input",{key:e.created[0],attrs:{type:"hidden",name:"video_id"},domProps:{value:e.$route.params.video&&e.$route.params.video.video.id||e.created[0]&&e.created[1]||""}}),a("input",{attrs:{type:"hidden",name:"user_id"},domProps:{value:e.user.id}}),a("input",{directives:[{name:"model",rawName:"v-model",value:e.user.email,expression:"user.email"}],staticClass:"form-control",attrs:{type:"hidden",name:"request[email]",placeholder:"name"},domProps:{value:e.user.email},on:{input:function(t){t.target.composing||e.$set(e.user,"email",t.target.value)}}}),a("input",{attrs:{type:"hidden",name:"MAX_FILE_SIZE",value:"3000000000"}}),e._m(0),a("input",{directives:[{name:"model",rawName:"v-model",value:e.tags,expression:"tags"}],staticClass:"form-control",attrs:{type:"text",name:"item[tags]",placeholder:"tags"},domProps:{value:e.tags},on:{input:function(t){t.target.composing||(e.tags=t.target.value)}}}),a("input",{staticClass:"btn submit-btn cyan",attrs:{type:"submit"}})])],1)},s=[function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"file-field input-field"},[a("div",{staticClass:"btn"},[a("span",[e._v("File")]),a("input",{attrs:{type:"file",name:"file"}})]),a("div",{staticClass:"file-path-wrapper"},[a("input",{staticClass:"file-path validate",attrs:{type:"text"}})])])}],n=(a("d3b7"),a("07ac"),a("96cf"),a("1da1")),i=a("5530"),o=a("2f62"),u={data:function(){return{name:"",message:"",created:[],author:"",tags:""}},methods:Object(i["a"])(Object(i["a"])(Object(i["a"])({},Object(o["b"])(["auth"])),Object(o["d"])(["setError","setMessage"])),{},{submitHandler:function(){var e=this;fetch("http://127.0.0.1:8000/api/request",{method:"POST",body:new FormData(form)}).then((function(e){return e.json()})).then((function(t){console.log(t),t.errors||t.errors2||t.errors3?e.setError(Object.values(t.errors)[0]&&Object.values(t.errors)[0][0]||Object.values(t.errors2)[0]&&Object.values(t.errors2)[0][0]||t.errors3.length&&t.errors3[0]):(e.setMessage(t.message||""),e.created[0]=!0,e.created[1]=t.id)}))}}),computed:Object(i["a"])({},Object(o["c"])(["user","error","nmessage"])),mounted:function(){var e=this;return Object(n["a"])(regeneratorRuntime.mark((function t(){var a,r,s,n;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return M&&M.updateTextFields&&M.updateTextFields(),t.next=3,e.auth();case 3:if(e.$route.params.video){for(s in a=e.$route.params.video.video,r=e.$route.params.video.request,a)s in e&&(e[s]=a[s]);for(n in r)n in e&&(e[n]=r[n])}case 4:case"end":return t.stop()}}),t)})))()}},m=u,l=(a("0411"),a("2877")),c=Object(l["a"])(m,r,s,!1,null,"f3b4a480",null);t["default"]=c.exports},"6f53":function(e,t,a){var r=a("83ab"),s=a("df75"),n=a("fc6a"),i=a("d1e7").f,o=function(e){return function(t){var a,o=n(t),u=s(o),m=u.length,l=0,c=[];while(m>l)a=u[l++],r&&!i.call(o,a)||c.push(e?[a,o[a]]:o[a]);return c}};e.exports={entries:o(!0),values:o(!1)}},"785a":function(e,t,a){}}]);
//# sourceMappingURL=chunk-74d0eb32.519c0abf.js.map
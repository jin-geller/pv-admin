var N=(i,d,l)=>new Promise((c,u)=>{var g=a=>{try{p(l.next(a))}catch(s){u(s)}},r=a=>{try{p(l.throw(a))}catch(s){u(s)}},p=a=>a.done?c(a.value):Promise.resolve(a.value).then(g,r);p((l=l.apply(i,d)).next())});import{_ as X}from"./form.vue_vue_type_script_setup_true_lang-CJEhgyYk.js";import{a2 as Y,n as y,q as Z,b as m,aj as q,z as f,F as E,r as w,P as H,aV as ee,aW as te,K as ne,R as ae,aD as h,be as ie}from"./index-BA19eJmX.js";import{g as le,m as se,a as ce}from"./menu-O0iCQE_R.js";import{u as ue}from"./hooks-Wm5s6Ksc.js";import"./index-_Lri3Guu.js";import"./index-B0VZpnkE.js";function pe(i){return typeof i=="function"||Object.prototype.toString.call(i)==="[object Object]"&&!ie(i)}function ye(){const i=Y({title:""}),d=y(),l=y([]),c=y(!0),u=(t,e=!1)=>{switch(t){case 0:return e?"菜单":"primary";case 1:return e?"iframe":"warning";case 2:return e?"外链":"danger";case 3:return e?"按钮":"info"}},g=[{label:"菜单名称",prop:"title",align:"left",cellRenderer:({row:t})=>m(E,null,[m("span",{class:"inline-block mr-1"},[q(ue(t.icon),{style:{paddingTop:"1px"}})]),m("span",null,[f(t.title)])])},{label:"菜单类型",prop:"menuType",width:100,cellRenderer:({row:t,props:e})=>{let n;return m(w("el-tag"),{size:e.size,type:u(t.menuType),effect:"plain"},pe(n=u(t.menuType,!0))?n:{default:()=>[n]})}},{label:"路由路径",prop:"path"},{label:"组件路径",prop:"component",formatter:({path:t,component:e})=>H(e)?t:e},{label:"权限标识",prop:"auth_code"},{label:"排序",prop:"rank",width:100},{label:"隐藏",prop:"showLink",formatter:({showLink:t})=>t?"否":"是",width:100},{label:"操作",fixed:"right",width:210,slot:"operation"}];function r(t){}function p(t){t&&(t.resetFields(),a())}function a(){return N(this,null,function*(){c.value=!0;const{data:t}=yield le({page_type:0});let e=t.list;H(i.title)||(e=e.filter(n=>f(n.title).includes(i.title))),l.value=ee(e),setTimeout(()=>{c.value=!1},500)})}function s(t){if(!t||!t.length)return;const e=[];for(let n=0;n<t.length;n++)t[n].title=f(t[n].title),s(t[n].children),e.push(t[n]);return e}function K(t="新增",e){var n,b,v,k,I,R,_,o,S,D,M,j,F,O,P,x,$,z,C,V,A;te({title:`${t}菜单`,props:{formInline:{menuType:(n=e==null?void 0:e.menuType)!=null?n:0,higherMenuOptions:s(ne(l.value)),parentId:(b=e==null?void 0:e.parentId)!=null?b:0,title:(v=e==null?void 0:e.title)!=null?v:"",name:(k=e==null?void 0:e.name)!=null?k:"",path:(I=e==null?void 0:e.path)!=null?I:"",component:(R=e==null?void 0:e.component)!=null?R:"",rank:(_=e==null?void 0:e.rank)!=null?_:99,redirect:(o=e==null?void 0:e.redirect)!=null?o:"",icon:(S=e==null?void 0:e.icon)!=null?S:"",extraIcon:(D=e==null?void 0:e.extraIcon)!=null?D:"",enterTransition:(M=e==null?void 0:e.enterTransition)!=null?M:"",leaveTransition:(j=e==null?void 0:e.leaveTransition)!=null?j:"",activePath:(F=e==null?void 0:e.activePath)!=null?F:"",auth_code:(O=e==null?void 0:e.auth_code)!=null?O:"",frameSrc:(P=e==null?void 0:e.frameSrc)!=null?P:"",frameLoading:(x=e==null?void 0:e.frameLoading)!=null?x:!0,keepAlive:($=e==null?void 0:e.keepAlive)!=null?$:!1,hiddenTag:(z=e==null?void 0:e.hiddenTag)!=null?z:!1,fixedTag:(C=e==null?void 0:e.fixedTag)!=null?C:!1,showLink:(V=e==null?void 0:e.showLink)!=null?V:!0,showParent:(A=e==null?void 0:e.showParent)!=null?A:!1}},width:"45%",draggable:!0,fullscreen:ae(),fullscreenIcon:!0,closeOnClickModal:!1,contentRenderer:()=>q(X,{ref:d}),beforeSure:(B,{options:G})=>{const J=d.value.getRef(),T=G.props.formInline;t=="修改"&&Reflect.set(T,"id",e.id);function Q(){h(`您${t}了菜单名称为${f(T.title)}的这条数据`,{type:"success"}),B(),a()}J.validate(U=>{U&&se(T).then(L=>{L.code==200?Q():h(L.error,{type:"error"})})})}})}function W(t){ce({id:t.id}).then(e=>{e.code==200?(h(`您删除了菜单名称为${f(t.title)}的这条数据`,{type:"success"}),a()):h(e.error,{type:"error"})})}return Z(()=>{a()}),{form:i,loading:c,columns:g,dataList:l,onSearch:a,resetForm:p,openDialog:K,handleDelete:W,handleSelectionChange:r}}export{ye as useMenu};

import{R as r}from"./index-C2Miptc4.js";import{d as b,n as k,r as t,o as s,g as p,h as e,b as l,u as m,c as w,F as x,t as g,f as C,y}from"./index-BgaAjVjm.js";const N=b({__name:"role",props:{formInline:{default:()=>({username:"",nickname:"",roleOptions:[],ids:[]})}},setup(i){const n=k(i.formInline);return(F,a)=>{const d=t("el-input"),u=t("el-form-item"),_=t("el-option"),f=t("el-select"),c=t("el-row"),v=t("el-form");return s(),p(v,{model:n.value,"label-width":"80px"},{default:e(()=>[l(c,{gutter:30},{default:e(()=>[l(m(r),null,{default:e(()=>[l(u,{label:"姓名",prop:"username"},{default:e(()=>[l(d,{modelValue:n.value.username,"onUpdate:modelValue":a[0]||(a[0]=o=>n.value.username=o),disabled:""},null,8,["modelValue"])]),_:1})]),_:1}),l(m(r),null,{default:e(()=>[l(u,{label:"昵称",prop:"nickname"},{default:e(()=>[l(d,{modelValue:n.value.nickname,"onUpdate:modelValue":a[1]||(a[1]=o=>n.value.nickname=o),disabled:""},null,8,["modelValue"])]),_:1})]),_:1}),l(m(r),null,{default:e(()=>[l(u,{label:"关联角色",prop:"ids"},{default:e(()=>[l(f,{modelValue:n.value.ids,"onUpdate:modelValue":a[2]||(a[2]=o=>n.value.ids=o),placeholder:"请选择",class:"w-full",clearable:"",multiple:""},{default:e(()=>[(s(!0),w(x,null,g(n.value.roleOptions,(o,V)=>(s(),p(_,{key:V,value:o.id,label:o.name},{default:e(()=>[C(y(o.name),1)]),_:2},1032,["value","label"]))),128))]),_:1},8,["modelValue"])]),_:1})]),_:1})]),_:1})]),_:1},8,["model"])}}});export{N as _};
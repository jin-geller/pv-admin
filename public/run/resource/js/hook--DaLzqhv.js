import{n as k,a2 as h,aU as t,J as W,K as x,q as y,b as H,r as Y,aO as A,aV as L,aW as M}from"./index-BgaAjVjm.js";import{_ as O}from"./form.vue_vue_type_script_setup_true_lang-DcTSsGDZ.js";import{d as i,s as z}from"./staff-BEEyWxoY.js";import{u as F,f as N}from"./viewsPublic-BlInyJTa.js";import"./index-C2Miptc4.js";import"./base-C5PwI6TN.js";function K(a){const{tagStyle:c}=F(),l=k(),r=h({list:i.list,fields:i.fields,save:i.save,delete:i.delete}),g=h({list:!0,create:t("add"),update:t("edit"),delete:t("delete"),batchDelete:t("delete"),import:t("import"),export:t("export"),download:t("download"),auth:t("auth")}),v=[{label:"部门名称",prop:"name",width:180,align:"left"},{label:"排序",prop:"sort",minWidth:70},{label:"状态",prop:"status",minWidth:100,cellRenderer:({row:e,props:s})=>H(Y("el-tag"),{size:s.size,style:c.value(e.status)},{default:()=>[e.status===1?"启用":"停用"]})},{label:"创建时间",minWidth:200,prop:"create_time",formatter:({create_time:e})=>e?A(e).format("YYYY-MM-DD HH:mm:ss"):""},{label:"备注",prop:"remark",minWidth:320},{label:"操作",fixed:"right",width:210,slot:"operation"}],D=W({form:O,props:{formInline:e=>{var s,n,d,p,m,u,f,o;return{higherDeptOptions:N(x(a.value.dataList)),pid:(s=e==null?void 0:e.pid)!=null?s:0,name:(n=e==null?void 0:e.name)!=null?n:"",staff_id:(e==null?void 0:e.staff_id)!=0?e==null?void 0:e.staff_id:null,phone:(d=e==null?void 0:e.phone)!=null?d:"",email:(p=e==null?void 0:e.email)!=null?p:"",sort:(m=e==null?void 0:e.sort)!=null?m:0,status:(u=e==null?void 0:e.status)!=null?u:1,remark:(f=e==null?void 0:e.remark)!=null?f:"",staffList:l.value,id:(o=e==null?void 0:e.id)!=null?o:0}}}});function _(e){return L(e,"id","pid")}function b(e){a.value&&M(a.value.openDialog)?a.value.openDialog(!0,{pid:e.id}):console.error("openDialog method is not defined on the child component")}return y(()=>{z.list({page_type:0}).then(e=>{e.code==200&&(l.value=e.data.list)})}),{api:r,auth:g,resultFormat:_,columns:v,editForm:D,openDialog:b}}export{K as useDept};
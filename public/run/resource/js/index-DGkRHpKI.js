import{d as E,n as y,r as p,j as I,o as a,c as A,b as f,h as o,w as r,g as s,u as e,f as c,D as P,z,_ as F}from"./index-BA19eJmX.js";import{useMenu as M}from"./hook-BXeRAfKq.js";import{P as N}from"./index-DaM9kZQk.js";import{u as m}from"./hooks-Wm5s6Ksc.js";import{A as b,E as V,D as j}from"./add-circle-line-CoQjCwv9.js";import"./form.vue_vue_type_script_setup_true_lang-CJEhgyYk.js";import"./index-_Lri3Guu.js";import"./index-B0VZpnkE.js";import"./menu-O0iCQE_R.js";import"./sortable.esm-DUfXNDJ2.js";import"./epTheme-DMNTQLh-.js";const L={class:"main"},O=E({name:"Menus",__name:"index",setup(q){y();const u=y(),{form:G,loading:k,columns:C,dataList:x,onSearch:R,resetForm:H,openDialog:d,handleDelete:D,handleSelectionChange:$}=M();return(J,_)=>{var h;const l=p("el-button"),B=p("el-popconfirm"),S=p("pure-table"),i=I("auth");return a(),A("div",L,[f(e(N),{title:"菜单管理",columns:e(C),isExpandAll:!1,tableRef:(h=u.value)==null?void 0:h.getTableRef(),onRefresh:e(R)},{buttons:o(()=>[r((a(),s(l,{type:"primary",icon:e(m)(e(b)),onClick:_[0]||(_[0]=n=>e(d)())},{default:o(()=>[c(" 新增菜单 ")]),_:1},8,["icon"])),[[i,"add"]])]),default:o(({size:n,dynamicColumns:T})=>[f(S,{ref_key:"tableRef",ref:u,adaptive:"",adaptiveConfig:{offsetBottom:45},"align-whole":"center","row-key":"id",showOverflowTooltip:"","table-layout":"auto",loading:e(k),size:n,data:e(x),columns:T,"header-cell-style":{background:"var(--el-fill-color-light)",color:"var(--el-text-color-primary)"},onSelectionChange:e($)},{operation:o(({row:t})=>{var v;return[r((a(),s(l,{class:"reset-margin",link:"",type:"primary",size:n,icon:e(m)(e(V)),onClick:g=>e(d)("修改",t)},{default:o(()=>[c(" 修改 ")]),_:2},1032,["size","icon","onClick"])),[[i,"edit"]]),r((a(),s(l,{class:"reset-margin",link:"",type:"primary",size:n,icon:e(m)(e(b)),onClick:g=>e(d)("新增",{parentId:t.id})},{default:o(()=>[c(" 新增 ")]),_:2},1032,["size","icon","onClick"])),[[P,t.menuType!==3],[i,"add"]]),f(B,{title:`是否确认删除菜单名称为${e(z)(t.title)}的这条数据${((v=t==null?void 0:t.children)==null?void 0:v.length)>0?"。注意下级菜单也会一并删除，请谨慎操作":""}`,onConfirm:g=>e(D)(t)},{reference:o(()=>[r((a(),s(l,{class:"reset-margin",link:"",type:"primary",size:n,icon:e(m)(e(j))},{default:o(()=>[c(" 删除 ")]),_:2},1032,["size","icon"])),[[i,"delete"]])]),_:2},1032,["title","onConfirm"])]}),_:2},1032,["loading","size","data","columns","header-cell-style","onSelectionChange"])]),_:1},8,["columns","tableRef","onRefresh"])])}}}),ne=F(O,[["__scopeId","data-v-0fd42250"]]);export{ne as default};
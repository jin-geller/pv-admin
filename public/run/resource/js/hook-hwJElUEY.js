var c=(s,l,a)=>new Promise((o,p)=>{var r=t=>{try{n(a.next(t))}catch(i){p(i)}},u=t=>{try{n(a.throw(t))}catch(i){p(i)}},n=t=>t.done?o(t.value):Promise.resolve(t.value).then(r,u);n((a=a.apply(s,l)).next())});import{aM as b,aN as w,a2 as g,n as f,q as y,aO as v,b as S,r as z,S as L}from"./index-BA19eJmX.js";import{u as _}from"./publicStyle-21uR1UcM.js";import{g as C}from"./staff-CNd9j2Aq.js";const M=s=>b.request("post",w("admin/staff_login/list"),{data:s});function k(){const s=g({username:"",ip:"",type:"",create_time:"",staff_id:""}),l=f([]),a=f([]),o=f(!0),{tagStyle:p}=_(),r=g({total:0,pageSize:10,currentPage:1,background:!0}),u=[{label:"编号",prop:"id",width:70},{label:"账号",prop:"username",width:90},{label:"登录时间",width:200,prop:"create_time",formatter:({create_time:e})=>e?v(e).format("YYYY-MM-DD HH:mm:ss"):""},{label:"类型",prop:"type",width:80,cellRenderer:({row:e,props:h})=>S(z("el-tag"),{size:h.size,style:p.value(e.type>0?0:1)},{default:()=>[e.type===0?"成功":"错误"]})},{label:"类型提示",prop:"type_str",width:180},{label:"ip",prop:"ip",width:100},{label:"归属地",prop:"address",width:230},{label:"操作系统",prop:"os",width:120},{label:"浏览器",prop:"browser",width:160},{label:"user-agent",prop:"user_agent",minWidth:220}];function n(e){}function t(e){}function i(e){}function d(){return c(this,null,function*(){o.value=!0;const{data:e}=yield M(L(s));l.value=e.list,r.total=e.total,r.pageSize=e.pageSize,r.currentPage=e.currentPage,setTimeout(()=>{o.value=!1},500)})}const m=e=>{e&&(e.resetFields(),d())};return y(()=>c(this,null,function*(){const{data:e}=yield C();a.value=e.list,d()})),{form:s,loading:o,columns:u,dataList:l,staffList:a,pagination:r,onSearch:d,resetForm:m,handleUpdate:n,handleSizeChange:t,handleCurrentChange:i}}export{k as useUser};
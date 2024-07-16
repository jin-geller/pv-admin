var P=(U,s,u)=>new Promise((f,r)=>{var c=n=>{try{m(u.next(n))}catch(g){r(g)}},k=n=>{try{m(u.throw(n))}catch(g){r(g)}},m=n=>n.done?f(n.value):Promise.resolve(n.value).then(c,k);m((u=u.apply(U,s)).next())});import{M as p}from"./motion-S4vcz2cB.js";import{d as E,B as N,n as h,a2 as T,r as _,o as F,g as I,h as o,b as l,u as e,z as y,a3 as w,e as A,f as V,y as v,aD as B,aC as M}from"./index-BgaAjVjm.js";import{u as W}from"./rule-C1DTaG1O.js";import{d as j,u as R}from"./iphone-BaSFno6E.js";import{u as x}from"./hooks-KDYNtrFv.js";import{d as S}from"./lock-fill-BZPnsoM7.js";import{d as q}from"./user-3-fill-xIOYikcN.js";const G={class:"w-full flex justify-between"},Z=E({__name:"LoginRegist",setup(U){const{t:s}=N(),u=h(!1),f=h(!1),r=T({username:"",phone:"",verifyCode:"",password:"",repeatPassword:""}),c=h(),{isDisabled:k,text:m}=R(),n=[{validator:(b,a,d)=>{a===""?d(new Error(y(w("login.passWordSureReg")))):r.password!==a?d(new Error(y(w("login.passWordDifferentReg")))):d()},trigger:"blur"}],g=b=>P(this,null,function*(){f.value=!0,b&&(yield b.validate(a=>{a?u.value?setTimeout(()=>{B(y(w("login.registerSuccess")),{type:"success"}),f.value=!1},2e3):(f.value=!1,B(y(w("login.tickPrivacy")),{type:"warning"})):f.value=!1}))});function $(){R().end(),M().SET_CURRENTPAGE(0)}return(b,a)=>{const d=_("el-input"),i=_("el-form-item"),C=_("el-button"),z=_("el-checkbox"),D=_("el-form");return F(),I(D,{ref_key:"ruleFormRef",ref:c,model:r,rules:e(W),size:"large"},{default:o(()=>[l(e(p),null,{default:o(()=>[l(i,{rules:[{required:!0,message:e(y)(e(w)("login.usernameReg")),trigger:"blur"}],prop:"username"},{default:o(()=>[l(d,{modelValue:r.username,"onUpdate:modelValue":a[0]||(a[0]=t=>r.username=t),clearable:"",placeholder:e(s)("login.username"),"prefix-icon":e(x)(e(q))},null,8,["modelValue","placeholder","prefix-icon"])]),_:1},8,["rules"])]),_:1}),l(e(p),{delay:100},{default:o(()=>[l(i,{prop:"phone"},{default:o(()=>[l(d,{modelValue:r.phone,"onUpdate:modelValue":a[1]||(a[1]=t=>r.phone=t),clearable:"",placeholder:e(s)("login.phone"),"prefix-icon":e(x)(e(j))},null,8,["modelValue","placeholder","prefix-icon"])]),_:1})]),_:1}),l(e(p),{delay:150},{default:o(()=>[l(i,{prop:"verifyCode"},{default:o(()=>[A("div",G,[l(d,{modelValue:r.verifyCode,"onUpdate:modelValue":a[2]||(a[2]=t=>r.verifyCode=t),clearable:"",placeholder:e(s)("login.smsVerifyCode"),"prefix-icon":e(x)("ri:shield-keyhole-line")},null,8,["modelValue","placeholder","prefix-icon"]),l(C,{disabled:e(k),class:"ml-2",onClick:a[3]||(a[3]=t=>e(R)().start(c.value,"phone"))},{default:o(()=>[V(v(e(m).length>0?e(m)+e(s)("login.info"):e(s)("login.getVerifyCode")),1)]),_:1},8,["disabled"])])]),_:1})]),_:1}),l(e(p),{delay:200},{default:o(()=>[l(i,{prop:"password"},{default:o(()=>[l(d,{modelValue:r.password,"onUpdate:modelValue":a[4]||(a[4]=t=>r.password=t),clearable:"","show-password":"",placeholder:e(s)("login.password"),"prefix-icon":e(x)(e(S))},null,8,["modelValue","placeholder","prefix-icon"])]),_:1})]),_:1}),l(e(p),{delay:250},{default:o(()=>[l(i,{rules:n,prop:"repeatPassword"},{default:o(()=>[l(d,{modelValue:r.repeatPassword,"onUpdate:modelValue":a[5]||(a[5]=t=>r.repeatPassword=t),clearable:"","show-password":"",placeholder:e(s)("login.sure"),"prefix-icon":e(x)(e(S))},null,8,["modelValue","placeholder","prefix-icon"])]),_:1})]),_:1}),l(e(p),{delay:300},{default:o(()=>[l(i,null,{default:o(()=>[l(z,{modelValue:u.value,"onUpdate:modelValue":a[6]||(a[6]=t=>u.value=t)},{default:o(()=>[V(v(e(s)("login.readAccept")),1)]),_:1},8,["modelValue"]),l(C,{link:"",type:"primary"},{default:o(()=>[V(v(e(s)("login.privacyPolicy")),1)]),_:1})]),_:1})]),_:1}),l(e(p),{delay:350},{default:o(()=>[l(i,null,{default:o(()=>[l(C,{class:"w-full",size:"default",type:"primary",loading:f.value,onClick:a[7]||(a[7]=t=>g(c.value))},{default:o(()=>[V(v(e(s)("login.definite")),1)]),_:1},8,["loading"])]),_:1})]),_:1}),l(e(p),{delay:400},{default:o(()=>[l(i,null,{default:o(()=>[l(C,{class:"w-full",size:"default",onClick:$},{default:o(()=>[V(v(e(s)("login.back")),1)]),_:1})]),_:1})]),_:1})]),_:1},8,["model","rules"])}}});export{Z as default};

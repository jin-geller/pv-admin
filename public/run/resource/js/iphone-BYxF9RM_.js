var E=(i,r,e)=>new Promise((g,n)=>{var d=t=>{try{p(e.next(t))}catch(v){n(v)}},f=t=>{try{p(e.throw(t))}catch(v){n(v)}},p=t=>t.done?g(t.value):Promise.resolve(t.value).then(d,f);p((e=e.apply(i,r)).next())});import{a2 as R,z as o,a3 as s,aC as P,aT as C,n as w,aU as V}from"./index-BA19eJmX.js";const h=/^\d{6}$/,y=/^(?![0-9]+$)(?![a-z]+$)(?![A-Z]+$)(?!([^(0-9a-zA-Z)]|[()])+$)(?!^.*[\u4E00-\u9FA5].*$)([^(0-9a-zA-Z)]|[()]|[a-z]|[A-Z]|[0-9]){8,18}$/,I=R({password:[{validator:(i,r,e)=>{r===""?e(new Error(o(s("login.purePassWordReg")))):y.test(r)?e():e(new Error(o(s("login.purePassWordRuleReg"))))},trigger:"blur"}],verifyCode:[{validator:(i,r,e)=>{r===""?e(new Error(o(s("login.pureVerifyCodeReg")))):P().verifyCode!==r?e(new Error(o(s("login.pureVerifyCodeCorrectReg")))):e()},trigger:"blur"}]}),A=R({phone:[{validator:(i,r,e)=>{r===""?e(new Error(o(s("login.purePhoneReg")))):C(r)?e():e(new Error(o(s("login.purePhoneCorrectReg"))))},trigger:"blur"}],verifyCode:[{validator:(i,r,e)=>{r===""?e(new Error(o(s("login.pureVerifyCodeReg")))):h.test(r)?e():e(new Error(o(s("login.pureVerifyCodeSixReg"))))},trigger:"blur"}]}),W=R({phone:[{validator:(i,r,e)=>{r===""?e(new Error(o(s("login.purePhoneReg")))):C(r)?e():e(new Error(o(s("login.purePhoneCorrectReg"))))},trigger:"blur"}],verifyCode:[{validator:(i,r,e)=>{r===""?e(new Error(o(s("login.pureVerifyCodeReg")))):h.test(r)?e():e(new Error(o(s("login.pureVerifyCodeSixReg"))))},trigger:"blur"}],password:[{validator:(i,r,e)=>{r===""?e(new Error(o(s("login.purePassWordReg")))):y.test(r)?e():e(new Error(o(s("login.purePassWordRuleReg"))))},trigger:"blur"}]}),u=w(!1),a=w(null),l=w(""),x=()=>({isDisabled:u,timer:a,text:l,start:(e,g,n=60)=>E(void 0,null,function*(){if(!e)return;const d=V(n,!0);yield e.validateField(g,f=>{f&&(clearInterval(a.value),u.value=!0,l.value=`${n}`,a.value=setInterval(()=>{n>0?(n-=1,l.value=`${n}`):(l.value="",u.value=!1,clearInterval(a.value),n=d)},1e3))})}),end:()=>{l.value="",u.value=!1,clearInterval(a.value)}}),H={width:1024,height:1024,body:'<path fill="currentColor" d="M224 768v96.064a64 64 0 0 0 64 64h448a64 64 0 0 0 64-64V768H224zm0-64h576V160a64 64 0 0 0-64-64H288a64 64 0 0 0-64 64v544zm32 288a96 96 0 0 1-96-96V128a96 96 0 0 1 96-96h512a96 96 0 0 1 96 96v768a96 96 0 0 1-96 96H256zm304-144a48 48 0 1 1-96 0a48 48 0 0 1 96 0z"/>'};export{W as a,H as d,I as l,A as p,x as u};

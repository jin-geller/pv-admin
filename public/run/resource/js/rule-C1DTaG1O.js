import{a2 as g,z as o,a3 as i,aC as d,aX as n}from"./index-BgaAjVjm.js";const t=/^\d{6}$/,f=/^(?![0-9]+$)(?![a-z]+$)(?![A-Z]+$)(?!([^(0-9a-zA-Z)]|[()])+$)(?!^.*[\u4E00-\u9FA5].*$)([^(0-9a-zA-Z)]|[()]|[a-z]|[A-Z]|[0-9]){8,18}$/,l=g({password:[{validator:(s,r,e)=>{r===""?e(new Error(o(i("login.passWordReg")))):f.test(r)?e():e(new Error(o(i("login.passWordRuleReg"))))},trigger:"blur"}],verifyCode:[{validator:(s,r,e)=>{r===""?e(new Error(o(i("login.verifyCodeReg")))):d().verifyCode!==r?e(new Error(o(i("login.verifyCodeCorrectReg")))):e()},trigger:"blur"}]}),E=g({phone:[{validator:(s,r,e)=>{r===""?e(new Error(o(i("login.phoneReg")))):n(r)?e():e(new Error(o(i("login.phoneCorrectReg"))))},trigger:"blur"}],verifyCode:[{validator:(s,r,e)=>{r===""?e(new Error(o(i("login.verifyCodeReg")))):t.test(r)?e():e(new Error(o(i("login.verifyCodeSixReg"))))},trigger:"blur"}]}),p=g({phone:[{validator:(s,r,e)=>{r===""?e(new Error(o(i("login.phoneReg")))):n(r)?e():e(new Error(o(i("login.phoneCorrectReg"))))},trigger:"blur"}],verifyCode:[{validator:(s,r,e)=>{r===""?e(new Error(o(i("login.verifyCodeReg")))):t.test(r)?e():e(new Error(o(i("login.verifyCodeSixReg"))))},trigger:"blur"}],password:[{validator:(s,r,e)=>{r===""?e(new Error(o(i("login.passWordReg")))):f.test(r)?e():e(new Error(o(i("login.passWordRuleReg"))))},trigger:"blur"}]});export{f as R,l,E as p,p as u};

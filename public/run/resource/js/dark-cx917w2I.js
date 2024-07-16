var ie=Object.defineProperty;var F=Object.getOwnPropertySymbols;var ce=Object.prototype.hasOwnProperty,de=Object.prototype.propertyIsEnumerable;var j=(t,e,a)=>e in t?ie(t,e,{enumerable:!0,configurable:!0,writable:!0,value:a}):t[e]=a,O=(t,e)=>{for(var a in e||(e={}))ce.call(e,a)&&j(t,a,e[a]);if(F)for(var a of F(e))de.call(e,a)&&j(t,a,e[a]);return t};var W=(t,e,a)=>new Promise((o,n)=>{var i=s=>{try{d(a.next(s))}catch(f){n(f)}},v=s=>{try{d(a.throw(s))}catch(f){n(f)}},d=s=>s.done?o(s.value):Promise.resolve(s.value).then(i,v);d((a=a.apply(t,e)).next())});import{ag as I,p,aF as fe,a9 as Y,B as X,l as me,O as L,a1 as x,m as C,R as he,s as ge,n as E,aG as pe,Z as V,aH as ee,aI as ve,i as be,aJ as Te,aK as ye,L as $e,a4 as Ce,ae as Se,P as Z,aC as B,z as q,a8 as we,aL as Me,Y as ke,G as Be,an as Le,o as N,c as R,e as A}from"./index-BgaAjVjm.js";import{u as H}from"./epTheme-K8uHCORF.js";import{u as Ae}from"./user-DNtD0Fqa.js";const nt={width:24,height:24,body:'<path fill="currentColor" d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10Zm0-2a8 8 0 1 0 0-16a8 8 0 0 0 0 16ZM11 7h2v2h-2V7Zm0 4h2v6h-2v-6Z"/>'};function xe(){const{$storage:t,$config:e}=I(),a=()=>{var i,v,d,s,f,g,S,w,y,T,u,r,h,b,m,$,M;fe().multiTagsCache&&(!t.tags||t.tags.length===0)&&(t.tags=Y),t.locale||(t.locale={locale:(i=e==null?void 0:e.Locale)!=null?i:"zh"},X().locale.value=(v=e==null?void 0:e.Locale)!=null?v:"zh"),t.layout||(t.layout={layout:(d=e==null?void 0:e.Layout)!=null?d:"vertical",theme:(s=e==null?void 0:e.Theme)!=null?s:"light",darkMode:(f=e==null?void 0:e.DarkMode)!=null?f:!1,sidebarStatus:(g=e==null?void 0:e.SidebarStatus)!=null?g:!0,epThemeColor:(S=e==null?void 0:e.EpThemeColor)!=null?S:"#409EFF",themeColor:(w=e==null?void 0:e.Theme)!=null?w:"light",overallStyle:(y=e==null?void 0:e.OverallStyle)!=null?y:"light"}),t.configure||(t.configure={grey:(T=e==null?void 0:e.Grey)!=null?T:!1,weak:(u=e==null?void 0:e.Weak)!=null?u:!1,hideTabs:(r=e==null?void 0:e.HideTabs)!=null?r:!1,hideFooter:(h=e.HideFooter)!=null?h:!0,showLogo:(b=e==null?void 0:e.ShowLogo)!=null?b:!0,showModel:(m=e==null?void 0:e.ShowModel)!=null?m:"smart",multiTagsCache:($=e==null?void 0:e.MultiTagsCache)!=null?$:!1,stretch:(M=e==null?void 0:e.Stretch)!=null?M:!1})},o=p(()=>t==null?void 0:t.layout.layout),n=p(()=>t.layout);return{layout:o,layoutTheme:n,initStorage:a}}const He=me({id:"pure-app",state:()=>{var t,e,a,o;return{sidebar:{opened:(e=(t=L().getItem(`${x()}layout`))==null?void 0:t.sidebarStatus)!=null?e:C().SidebarStatus,withoutAnimation:!1,isClickCollapse:!1},layout:(o=(a=L().getItem(`${x()}layout`))==null?void 0:a.layout)!=null?o:C().Layout,device:he()?"mobile":"desktop",viewportSize:{width:document.documentElement.clientWidth,height:document.documentElement.clientHeight}}},getters:{getSidebarStatus(t){return t.sidebar.opened},getDevice(t){return t.device},getViewportWidth(t){return t.viewportSize.width},getViewportHeight(t){return t.viewportSize.height}},actions:{TOGGLE_SIDEBAR(t,e){const a=L().getItem(`${x()}layout`);t&&e?(this.sidebar.withoutAnimation=!0,this.sidebar.opened=!0,a.sidebarStatus=!0):!t&&e?(this.sidebar.withoutAnimation=!0,this.sidebar.opened=!1,a.sidebarStatus=!1):!t&&!e&&(this.sidebar.withoutAnimation=!1,this.sidebar.opened=!this.sidebar.opened,this.sidebar.isClickCollapse=!this.sidebar.opened,a.sidebarStatus=this.sidebar.opened),L().setItem(`${x()}layout`,a)},toggleSideBar(t,e){return W(this,null,function*(){yield this.TOGGLE_SIDEBAR(t,e)})},toggleDevice(t){this.device=t},setLayout(t){this.layout=t},setViewportSize(t){this.viewportSize=t},setSortSwap(t){this.sortSwap=t}}});function te(){return He(ge)}const z={outputDir:"",defaultScopeName:"",includeStyleWithColors:[],extract:!0,themeLinkTagId:"theme-link-tag",themeLinkTagInjectTo:"head",removeCssScopeName:!1,customThemeCssFileName:null,arbitraryMode:!1,defaultPrimaryColor:"",customThemeOutputPath:"D:/phpstudy_pro/WWW/pvadmin-front/node_modules/.pnpm/@pureadmin+theme@3.2.0/node_modules/@pureadmin/theme/setCustomTheme.js",styleTagId:"custom-theme-tagid",InjectDefaultStyleTagToHtml:!0,hueDiffControls:{low:0,high:0},multipleScopeVars:[{scopeName:"layout-theme-light",varsContent:`
        $subMenuActiveText: #000000d9 !default;
        $menuBg: #fff !default;
        $menuHover: #f6f6f6 !default;
        $subMenuBg: #fff !default;
        $subMenuActiveBg: #e0ebf6 !default;
        $menuText: rgb(0 0 0 / 60%) !default;
        $sidebarLogo: #fff !default;
        $menuTitleHover: #000 !default;
        $menuActiveBefore: #4091f7 !default;
      `},{scopeName:"layout-theme-default",varsContent:`
        $subMenuActiveText: #fff !default;
        $menuBg: #001529 !default;
        $menuHover: rgb(64 145 247 / 15%) !default;
        $subMenuBg: #0f0303 !default;
        $subMenuActiveBg: #4091f7 !default;
        $menuText: rgb(254 254 254 / 65%) !default;
        $sidebarLogo: #002140 !default;
        $menuTitleHover: #fff !default;
        $menuActiveBefore: #4091f7 !default;
      `},{scopeName:"layout-theme-saucePurple",varsContent:`
        $subMenuActiveText: #fff !default;
        $menuBg: #130824 !default;
        $menuHover: rgb(105 58 201 / 15%) !default;
        $subMenuBg: #000 !default;
        $subMenuActiveBg: #693ac9 !default;
        $menuText: #7a80b4 !default;
        $sidebarLogo: #1f0c38 !default;
        $menuTitleHover: #fff !default;
        $menuActiveBefore: #693ac9 !default;
      `},{scopeName:"layout-theme-pink",varsContent:`
        $subMenuActiveText: #fff !default;
        $menuBg: #28081a !default;
        $menuHover: rgb(216 68 147 / 15%) !default;
        $subMenuBg: #000 !default;
        $subMenuActiveBg: #d84493 !default;
        $menuText: #7a80b4 !default;
        $sidebarLogo: #3f0d29 !default;
        $menuTitleHover: #fff !default;
        $menuActiveBefore: #d84493 !default;
      `},{scopeName:"layout-theme-dusk",varsContent:`
        $subMenuActiveText: #fff !default;
        $menuBg: #2a0608 !default;
        $menuHover: rgb(225 60 57 / 15%) !default;
        $subMenuBg: #000 !default;
        $subMenuActiveBg: #e13c39 !default;
        $menuText: rgb(254 254 254 / 65.1%) !default;
        $sidebarLogo: #42090c !default;
        $menuTitleHover: #fff !default;
        $menuActiveBefore: #e13c39 !default;
      `},{scopeName:"layout-theme-volcano",varsContent:`
        $subMenuActiveText: #fff !default;
        $menuBg: #2b0e05 !default;
        $menuHover: rgb(232 95 51 / 15%) !default;
        $subMenuBg: #0f0603 !default;
        $subMenuActiveBg: #e85f33 !default;
        $menuText: rgb(254 254 254 / 65%) !default;
        $sidebarLogo: #441708 !default;
        $menuTitleHover: #fff !default;
        $menuActiveBefore: #e85f33 !default;
      `},{scopeName:"layout-theme-mingQing",varsContent:`
        $subMenuActiveText: #fff !default;
        $menuBg: #032121 !default;
        $menuHover: rgb(89 191 193 / 15%) !default;
        $subMenuBg: #000 !default;
        $subMenuActiveBg: #59bfc1 !default;
        $menuText: #7a80b4 !default;
        $sidebarLogo: #053434 !default;
        $menuTitleHover: #fff !default;
        $menuActiveBefore: #59bfc1 !default;
      `},{scopeName:"layout-theme-auroraGreen",varsContent:`
        $subMenuActiveText: #fff !default;
        $menuBg: #0b1e15 !default;
        $menuHover: rgb(96 172 128 / 15%) !default;
        $subMenuBg: #000 !default;
        $subMenuActiveBg: #60ac80 !default;
        $menuText: #7a80b4 !default;
        $sidebarLogo: #112f21 !default;
        $menuTitleHover: #fff !default;
        $menuActiveBefore: #60ac80 !default;
      `}]},_e="./",Ee="assets",ae=t=>{let e=t.replace("#","").match(/../g);for(let a=0;a<3;a++)e[a]=parseInt(e[a],16);return e},oe=(t,e,a)=>{let o=[t.toString(16),e.toString(16),a.toString(16)];for(let n=0;n<3;n++)o[n].length==1&&(o[n]=`0${o[n]}`);return`#${o.join("")}`},ze=(t,e)=>{let a=ae(t);for(let o=0;o<3;o++)a[o]=Math.floor(a[o]*(1-e));return oe(a[0],a[1],a[2])},Ie=(t,e)=>{let a=ae(t);for(let o=0;o<3;o++)a[o]=Math.floor((255-a[o])*e+a[o]);return oe(a[0],a[1],a[2])},U=t=>`(^${t}\\s+|\\s+${t}\\s+|\\s+${t}$|^${t}$)`,Q=({scopeName:t,multipleScopeVars:e})=>{const a=Array.isArray(e)&&e.length?e:z.multipleScopeVars;let o=document.documentElement.className;new RegExp(U(t)).test(o)||(a.forEach(n=>{o=o.replace(new RegExp(U(n.scopeName),"g"),` ${t} `)}),document.documentElement.className=o.replace(/(^\s+|\s+$)/g,""))},J=({id:t,href:e})=>{const a=document.createElement("link");return a.rel="stylesheet",a.href=e,a.id=t,a},Ne=t=>{const e=O({scopeName:"theme-default",customLinkHref:i=>i},t),a=e.themeLinkTagId||z.themeLinkTagId;let o=document.getElementById(a);const n=e.customLinkHref(`${_e.replace(/\/$/,"")}${`/${Ee}/${e.scopeName}.css`.replace(/\/+(?=\/)/g,"")}`);if(o){o.id=`${a}_old`;const i=J({id:a,href:n});o.nextSibling?o.parentNode.insertBefore(i,o.nextSibling):o.parentNode.appendChild(i),i.onload=()=>{setTimeout(()=>{o.parentNode.removeChild(o),o=null},60),Q(e)};return}o=J({id:a,href:n}),Q(e),document[(e.themeLinkTagInjectTo||z.themeLinkTagInjectTo||"").replace("-prepend","")].appendChild(o)};function lt(){var y,T;const{layoutTheme:t,layout:e}=xe(),a=E([{color:"#ffffff",themeColor:"light"},{color:"#1b2a47",themeColor:"default"},{color:"#722ed1",themeColor:"saucePurple"},{color:"#eb2f96",themeColor:"pink"},{color:"#f5222d",themeColor:"dusk"},{color:"#fa541c",themeColor:"volcano"},{color:"#13c2c2",themeColor:"mingQing"},{color:"#52c41a",themeColor:"auroraGreen"}]),{$storage:o}=I(),n=E((y=o==null?void 0:o.layout)==null?void 0:y.darkMode),i=E((T=o==null?void 0:o.layout)==null?void 0:T.overallStyle),v=document.documentElement;function d(u,r,h){const b=h||document.body;let{className:m}=b;m=m.replace(r,"").trim(),b.className=u?`${m} ${r}`:m}function s(u=(h=>(h=C().Theme)!=null?h:"light")(),r=!0){var m,$;t.value.theme=u,Ne({scopeName:`layout-theme-${u}`});const b=o.layout.themeColor;if(o.layout={layout:e.value,theme:u,darkMode:n.value,sidebarStatus:(m=o.layout)==null?void 0:m.sidebarStatus,epThemeColor:($=o.layout)==null?void 0:$.epThemeColor,themeColor:r?u:b,overallStyle:i.value},u==="default"||u==="light")g(C().EpThemeColor);else{const M=a.value.find(_=>_.themeColor===u);g(M.color)}}function f(u,r,h){document.documentElement.style.setProperty(`--el-color-primary-${u}-${r}`,n.value?ze(h,r/10):Ie(h,r/10))}const g=u=>{H().setEpThemeColor(u),document.documentElement.style.setProperty("--el-color-primary",u);for(let r=1;r<=2;r++)f("dark",r,u);for(let r=1;r<=9;r++)f("light",r,u)};function S(u){i.value=u,H().epTheme==="light"&&n.value?s("default",!1):s(H().epTheme,!1),n.value?document.documentElement.classList.add("dark"):(o.layout.themeColor==="light"&&s("light",!1),document.documentElement.classList.remove("dark"))}function w(){pe(),L().clear();const{Grey:u,Weak:r,MultiTagsCache:h,EpThemeColor:b,Layout:m}=C();te().setLayout(m),g(b),V().multiTagsCacheChange(h),d(u,"html-grey",document.querySelector("html")),d(r,"html-weakness",document.querySelector("html")),ee.push("/login").then(()=>{location.reload()}),V().handleTags("equal",[...Y]),ve()}return{body:v,dataTheme:n,overallStyle:i,layoutTheme:t,themeColors:a,onReset:w,toggleClass:d,dataThemeChange:S,setEpThemeColor:g,setLayoutThemeColor:s}}function Re(t){return{all:t=t||new Map,on:function(e,a){var o=t.get(e);o?o.push(a):t.set(e,[a])},off:function(e,a){var o=t.get(e);o&&(a?o.splice(o.indexOf(a)>>>0,1):t.set(e,[]))},emit:function(e,a){var o=t.get(e);o&&o.slice().map(function(n){n(a)}),(o=t.get("*"))&&o.slice().map(function(n){n(e,a)})}}}const K=Re(),Pe="The current routing configuration is incorrect, please check the configuration";function De(){var P,D;const t=te(),e=be().options.routes,{isFullscreen:a,toggle:o}=Te(),{wholeMenus:n}=ye($e()),i=(D=(P=C())==null?void 0:P.TooltipEffect)!=null?D:"light",v=p(()=>({width:"100%",display:"flex",alignItems:"center",justifyContent:"space-between",overflow:"hidden"})),d=p(()=>{var l,c;return Z((l=B())==null?void 0:l.avatar)?Ae:(c=B())==null?void 0:c.avatar}),s=p(()=>{var l,c,k;return Z((l=B())==null?void 0:l.nickname)?(c=B())==null?void 0:c.username:(k=B())==null?void 0:k.nickname}),f=p(()=>(l,c)=>({background:l===c?H().epThemeColor:"",color:l===c?"#f4f4f5":"#000"})),g=p(()=>(l,c)=>l===c?"":"dark:hover:!text-primary"),S=p(()=>s.value?{marginRight:"10px"}:""),w=p(()=>!t.getSidebarStatus),y=p(()=>t.getDevice),{$storage:T,$config:u}=I(),r=p(()=>{var l;return(l=T==null?void 0:T.layout)==null?void 0:l.layout}),h=p(()=>u.Title);function b(l){const c=C().Title;c?document.title=`${q(l.title)} | ${c}`:document.title=q(l.title)}function m(){B().logOut()}function $(){var l;ee.push((l=we())==null?void 0:l.path)}function M(){K.emit("openPanel")}function _(){t.toggleSideBar()}function ne(l){l==null||l.handleResize()}function le(l){var G;if(!l.children)return console.error(Pe);const c=/^http(s?):\/\//,k=(G=l.children[0])==null?void 0:G.path;return c.test(k)?l.path+"/"+k:k}function ue(l){n.value.length===0||re(l)||K.emit("changLayoutRoute",l)}function re(l){return Me.includes(l)}function se(){return new URL(""+new URL("../../logo.svg",import.meta.url).href,import.meta.url).href}return{title:h,device:y,layout:r,logout:m,routers:e,$storage:T,isFullscreen:a,Fullscreen:Ce,ExitFullscreen:Se,toggle:o,backTopMenu:$,onPanel:M,getDivStyle:v,changeTitle:b,toggleSideBar:_,menuSelect:ue,handleResize:ne,resolvePath:le,getLogo:se,isCollapse:w,pureApp:t,username:s,userAvatar:d,avatarsStyle:S,tooltipEffect:i,getDropdownItemStyle:f,getDropdownItemClass:g}}function ut(t){const{$storage:e,changeTitle:a,handleResize:o}=De(),{locale:n,t:i}=X(),v=ke();function d(){e.locale={locale:"zh"},n.value="zh",t&&o(t.value)}function s(){e.locale={locale:"en"},n.value="en",t&&o(t.value)}return Be(()=>n.value,()=>{a(v.meta)}),Le(()=>{var f,g;n.value=(g=(f=e.locale)==null?void 0:f.locale)!=null?g:"zh"}),{t:i,route:v,locale:n,translationCh:d,translationEn:s}}const Ge={xmlns:"http://www.w3.org/2000/svg",width:"1em",height:"1em","aria-hidden":"true",class:"globalization",viewBox:"0 0 512 512"},Fe=A("path",{fill:"currentColor",d:"m478.33 433.6-90-218a22 22 0 0 0-40.67 0l-90 218a22 22 0 1 0 40.67 16.79L316.66 406h102.67l18.33 44.39A22 22 0 0 0 458 464a22 22 0 0 0 20.32-30.4zM334.83 362 368 281.65 401.17 362zm-66.99-19.08a22 22 0 0 0-4.89-30.7c-.2-.15-15-11.13-36.49-34.73 39.65-53.68 62.11-114.75 71.27-143.49H330a22 22 0 0 0 0-44H214V70a22 22 0 0 0-44 0v20H54a22 22 0 0 0 0 44h197.25c-9.52 26.95-27.05 69.5-53.79 108.36-31.41-41.68-43.08-68.65-43.17-68.87a22 22 0 0 0-40.58 17c.58 1.38 14.55 34.23 52.86 83.93.92 1.19 1.83 2.35 2.74 3.51-39.24 44.35-77.74 71.86-93.85 80.74a22 22 0 1 0 21.07 38.63c2.16-1.18 48.6-26.89 101.63-85.59 22.52 24.08 38 35.44 38.93 36.1a22 22 0 0 0 30.75-4.9z"},null,-1),je=[Fe];function Oe(t,e){return N(),R("svg",Ge,[...je])}const rt={render:Oe},We={xmlns:"http://www.w3.org/2000/svg",width:"16",height:"16",viewBox:"0 0 24 24"},Ve=A("path",{fill:"none",d:"M0 0h24v24H0z"},null,-1),Ze=A("path",{d:"M12 18a6 6 0 1 1 0-12 6 6 0 0 1 0 12M11 1h2v3h-2zm0 19h2v3h-2zM3.515 4.929l1.414-1.414L7.05 5.636 5.636 7.05zM16.95 18.364l1.414-1.414 2.121 2.121-1.414 1.414zm2.121-14.85 1.414 1.415-2.121 2.121-1.414-1.414 2.121-2.121zM5.636 16.95l1.414 1.414-2.121 2.121-1.414-1.414zM23 11v2h-3v-2zM4 11v2H1v-2z"},null,-1),qe=[Ve,Ze];function Ue(t,e){return N(),R("svg",We,[...qe])}const st={render:Ue},Qe={xmlns:"http://www.w3.org/2000/svg",width:"16",height:"16",viewBox:"0 0 24 24"},Je=A("path",{fill:"none",d:"M0 0h24v24H0z"},null,-1),Ke=A("path",{d:"M11.38 2.019a7.5 7.5 0 1 0 10.6 10.6C21.662 17.854 17.316 22 12.001 22 6.477 22 2 17.523 2 12c0-5.315 4.146-9.661 9.38-9.981"},null,-1),Ye=[Je,Ke];function Xe(t,e){return N(),R("svg",Qe,[...Ye])}const it={render:Xe};export{ut as a,lt as b,te as c,nt as d,K as e,st as f,rt as g,it as h,xe as i,Ne as t,De as u};

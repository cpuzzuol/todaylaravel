if(!self.define){let e,s={};const n=(n,r)=>(n=new URL(n+".js",r).href,s[n]||new Promise((s=>{if("document"in self){const e=document.createElement("script");e.src=n,e.onload=s,document.head.appendChild(e)}else e=n,importScripts(n),s()})).then((()=>{let e=s[n];if(!e)throw new Error(`Module ${n} didn’t register its module`);return e})));self.define=(r,i)=>{const o=e||("document"in self?document.currentScript.src:"")||location.href;if(s[o])return;let l={};const t=e=>n(e,o),c={module:{uri:o},exports:l,require:t};s[o]=Promise.all(r.map((e=>c[e]||t(e)))).then((e=>(i(...e),l)))}}define(["./workbox-03ef139c"],(function(e){"use strict";e.setCacheNameDetails({prefix:"todayvue"}),self.addEventListener("message",(e=>{e.data&&"SKIP_WAITING"===e.data.type&&self.skipWaiting()})),e.precacheAndRoute([{url:"/css/app.8d316f1d.css",revision:null},{url:"/css/chunk-vendors.f0f6722a.css",revision:null},{url:"/index.html",revision:"3e2c7d52442c9f05deacc56230b11449"},{url:"/js/app.5ad582e9.js",revision:null},{url:"/js/chunk-vendors.b4dc8358.js",revision:null},{url:"/js/webfontloader.d284e791.js",revision:null},{url:"/manifest.json",revision:"1f4d23a4f979bdb93b9173c1abf0ee5d"},{url:"/robots.txt",revision:"b6216d61c03e6ce0c9aea6ca7808f7ca"}],{})}));
//# sourceMappingURL=service-worker.js.map

var f=Object.create,e=Object.defineProperty,g=Object.getPrototypeOf,h=Object.prototype.hasOwnProperty,i=Object.getOwnPropertyNames,j=Object.getOwnPropertyDescriptor;var k=a=>e(a,"__esModule",{value:!0});var n=(a,b)=>()=>(b||a((b={exports:{}}).exports,b),b.exports),o=(a,b)=>{for(var c in b)e(a,c,{get:b[c],enumerable:!0})},l=(a,b,c)=>{if(b&&typeof b=="object"||typeof b=="function")for(let d of i(b))!h.call(a,d)&&d!=="default"&&e(a,d,{get:()=>b[d],enumerable:!(c=j(b,d))||c.enumerable});return a},p=a=>l(k(e(a!=null?f(g(a)):{},"default",a&&a.__esModule&&"default"in a?{get:()=>a.default,enumerable:!0}:{value:a,enumerable:!0})),a);export{n as a,o as b,p as c};
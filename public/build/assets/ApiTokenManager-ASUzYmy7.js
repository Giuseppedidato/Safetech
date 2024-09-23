import{o as a,c as N,w as s,a as o,r as b,T as _,d as w,e as m,b as l,f as y,g as n,u as i,F as $,h as C,n as A,t as x}from"./app-B6l3p7nW.js";import{_ as L}from"./ActionMessage-BP5UTEC_.js";import{_ as z,a as U,b as T}from"./DialogModal-0wen_8d4.js";import{_ as S}from"./Checkbox-BXKIUnZl.js";import{_ as W}from"./DangerButton-DggNrGWm.js";import{_ as E}from"./FormSection-C5VFii-M.js";import{_ as H,a as Y}from"./TextInput-_EUuFzbe.js";import{_ as B}from"./InputLabel-2ZykCe71.js";import{_ as I}from"./PrimaryButton-CcFt1vmT.js";import{_ as P}from"./SecondaryButton-DaINDqG4.js";import{S as q}from"./SectionBorder-oU4a_y4p.js";import"./SectionTitle-CtMamTv9.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const G={class:"bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4"},J={class:"sm:flex sm:items-start"},K={class:"mt-3 text-center sm:mt-0 sm:ms-4 sm:text-start"},O={class:"text-lg font-medium text-gray-900"},Q={class:"mt-4 text-sm text-gray-600"},R={class:"flex flex-row justify-end px-6 py-4 bg-gray-100 text-end"},X={__name:"ConfirmationModal",props:{show:{type:Boolean,default:!1},maxWidth:{type:String,default:"2xl"},closeable:{type:Boolean,default:!0}},emits:["close"],setup(d,{emit:h}){const r=h,u=()=>{r("close")};return(p,c)=>(a(),N(z,{show:d.show,"max-width":d.maxWidth,closeable:d.closeable,onClose:u},{default:s(()=>[o("div",G,[o("div",J,[c[0]||(c[0]=o("div",{class:"mx-auto shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10"},[o("svg",{class:"h-6 w-6 text-red-600",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor"},[o("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"})])],-1)),o("div",K,[o("h3",O,[b(p.$slots,"title")]),o("div",Q,[b(p.$slots,"content")])])])]),o("div",R,[b(p.$slots,"footer")])]),_:3},8,["show","max-width","closeable"]))}},Z={class:"col-span-6 sm:col-span-4"},ee={key:0,class:"col-span-6"},se={class:"mt-2 grid grid-cols-1 md:grid-cols-2 gap-4"},te={class:"flex items-center"},oe={class:"ms-2 text-sm text-gray-600"},le={key:0},ne={class:"mt-10 sm:mt-0"},ie={class:"space-y-6"},ae={class:"break-all"},re={class:"flex items-center ms-2"},me={key:0,class:"text-sm text-gray-400"},de=["onClick"],ue=["onClick"],pe={key:0,class:"mt-4 bg-gray-100 px-4 py-2 rounded font-mono text-sm text-gray-500 break-all"},ce={class:"grid grid-cols-1 md:grid-cols-2 gap-4"},fe={class:"flex items-center"},ve={class:"ms-2 text-sm text-gray-600"},Se={__name:"ApiTokenManager",props:{tokens:Array,availablePermissions:Array,defaultPermissions:Array},setup(d){const r=_({name:"",permissions:d.defaultPermissions}),u=_({permissions:[]}),p=_({}),c=w(!1),v=w(null),k=w(null),F=()=>{r.post(route("api-tokens.store"),{preserveScroll:!0,onSuccess:()=>{c.value=!0,r.reset()}})},V=f=>{u.permissions=f.abilities,v.value=f},j=()=>{u.put(route("api-tokens.update",v.value),{preserveScroll:!0,preserveState:!0,onSuccess:()=>v.value=null})},D=f=>{k.value=f},M=()=>{p.delete(route("api-tokens.destroy",k.value),{preserveScroll:!0,preserveState:!0,onSuccess:()=>k.value=null})};return(f,e)=>(a(),m("div",null,[l(E,{onSubmitted:F},{title:s(()=>e[9]||(e[9]=[n(" Create API Token ")])),description:s(()=>e[10]||(e[10]=[n(" API tokens allow third-party services to authenticate with our application on your behalf. ")])),form:s(()=>[o("div",Z,[l(B,{for:"name",value:"Name"}),l(H,{id:"name",modelValue:i(r).name,"onUpdate:modelValue":e[0]||(e[0]=t=>i(r).name=t),type:"text",class:"mt-1 block w-full",autofocus:""},null,8,["modelValue"]),l(Y,{message:i(r).errors.name,class:"mt-2"},null,8,["message"])]),d.availablePermissions.length>0?(a(),m("div",ee,[l(B,{for:"permissions",value:"Permissions"}),o("div",se,[(a(!0),m($,null,C(d.availablePermissions,t=>(a(),m("div",{key:t},[o("label",te,[l(S,{checked:i(r).permissions,"onUpdate:checked":e[1]||(e[1]=g=>i(r).permissions=g),value:t},null,8,["checked","value"]),o("span",oe,x(t),1)])]))),128))])])):y("",!0)]),actions:s(()=>[l(L,{on:i(r).recentlySuccessful,class:"me-3"},{default:s(()=>e[11]||(e[11]=[n(" Created. ")])),_:1},8,["on"]),l(I,{class:A({"opacity-25":i(r).processing}),disabled:i(r).processing},{default:s(()=>e[12]||(e[12]=[n(" Create ")])),_:1},8,["class","disabled"])]),_:1}),d.tokens.length>0?(a(),m("div",le,[l(q),o("div",ne,[l(U,null,{title:s(()=>e[13]||(e[13]=[n(" Manage API Tokens ")])),description:s(()=>e[14]||(e[14]=[n(" You may delete any of your existing tokens if they are no longer needed. ")])),content:s(()=>[o("div",ie,[(a(!0),m($,null,C(d.tokens,t=>(a(),m("div",{key:t.id,class:"flex items-center justify-between"},[o("div",ae,x(t.name),1),o("div",re,[t.last_used_ago?(a(),m("div",me," Last used "+x(t.last_used_ago),1)):y("",!0),d.availablePermissions.length>0?(a(),m("button",{key:1,class:"cursor-pointer ms-6 text-sm text-gray-400 underline",onClick:g=>V(t)}," Permissions ",8,de)):y("",!0),o("button",{class:"cursor-pointer ms-6 text-sm text-red-500",onClick:g=>D(t)}," Delete ",8,ue)])]))),128))])]),_:1})])])):y("",!0),l(T,{show:c.value,onClose:e[3]||(e[3]=t=>c.value=!1)},{title:s(()=>e[15]||(e[15]=[n(" API Token ")])),content:s(()=>[e[16]||(e[16]=o("div",null," Please copy your new API token. For your security, it won't be shown again. ",-1)),f.$page.props.jetstream.flash.token?(a(),m("div",pe,x(f.$page.props.jetstream.flash.token),1)):y("",!0)]),footer:s(()=>[l(P,{onClick:e[2]||(e[2]=t=>c.value=!1)},{default:s(()=>e[17]||(e[17]=[n(" Close ")])),_:1})]),_:1},8,["show"]),l(T,{show:v.value!=null,onClose:e[6]||(e[6]=t=>v.value=null)},{title:s(()=>e[18]||(e[18]=[n(" API Token Permissions ")])),content:s(()=>[o("div",ce,[(a(!0),m($,null,C(d.availablePermissions,t=>(a(),m("div",{key:t},[o("label",fe,[l(S,{checked:i(u).permissions,"onUpdate:checked":e[4]||(e[4]=g=>i(u).permissions=g),value:t},null,8,["checked","value"]),o("span",ve,x(t),1)])]))),128))])]),footer:s(()=>[l(P,{onClick:e[5]||(e[5]=t=>v.value=null)},{default:s(()=>e[19]||(e[19]=[n(" Cancel ")])),_:1}),l(I,{class:A(["ms-3",{"opacity-25":i(u).processing}]),disabled:i(u).processing,onClick:j},{default:s(()=>e[20]||(e[20]=[n(" Save ")])),_:1},8,["class","disabled"])]),_:1},8,["show"]),l(X,{show:k.value!=null,onClose:e[8]||(e[8]=t=>k.value=null)},{title:s(()=>e[21]||(e[21]=[n(" Delete API Token ")])),content:s(()=>e[22]||(e[22]=[n(" Are you sure you would like to delete this API token? ")])),footer:s(()=>[l(P,{onClick:e[7]||(e[7]=t=>k.value=null)},{default:s(()=>e[23]||(e[23]=[n(" Cancel ")])),_:1}),l(W,{class:A(["ms-3",{"opacity-25":i(p).processing}]),disabled:i(p).processing,onClick:M},{default:s(()=>e[24]||(e[24]=[n(" Delete ")])),_:1},8,["class","disabled"])]),_:1},8,["show"])]))}};export{Se as default};

import{i as u,p as i,o as t,f as s,b as c,t as d,r as m,A as p,m as _,k as f,B as g}from"./app-kcLDpQLQ.js";const k={class:"text-sm text-red-600 dark:text-red-400"},S={__name:"InputError",props:{message:{type:String}},setup(e){return(a,r)=>u((t(),s("div",null,[c("p",k,d(e.message),1)],512)),[[i,e.message]])}},x={class:"block font-medium text-sm text-gray-700 dark:text-gray-300"},y={key:0},v={key:1},V={__name:"InputLabel",props:{value:{type:String}},setup(e){return(a,r)=>(t(),s("label",x,[e.value?(t(),s("span",y,d(e.value),1)):(t(),s("span",v,[m(a.$slots,"default")]))]))}},B={__name:"TextInput",props:{modelValue:{type:String,required:!0},modelModifiers:{}},emits:["update:modelValue"],setup(e,{expose:a}){const r=p(e,"modelValue"),o=_(null);return f(()=>{o.value.hasAttribute("autofocus")&&o.value.focus()}),a({focus:()=>o.value.focus()}),(b,n)=>u((t(),s("input",{class:"border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm","onUpdate:modelValue":n[0]||(n[0]=l=>r.value=l),ref_key:"input",ref:o},null,512)),[[g,r.value]])}};export{V as _,B as a,S as b};

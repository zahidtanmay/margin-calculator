(window.webpackJsonp=window.webpackJsonp||[]).push([["app"],{"0lO1":function(t,e,r){},gYqe:function(t,e,r){"use strict";var n=r("0lO1");r.n(n).a},ng4s:function(t,e,r){"use strict";r.r(e);var n=r("oCYn"),a=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",[r("h2",{staticClass:"center"},[t._v("Margin Calculator")]),t._v(" "),r("div",{staticClass:"center"},[r("button",{staticClass:"action-button",on:{click:function(e){return t.addAction()}}},[t._v("Add")]),t._v(" "),r("button",{staticClass:"action-button",on:{click:function(e){return t.getMarginProfit()}}},[t._v("Calculate Profit")])]),t._v(" "),t.profit?r("h4",{staticClass:"center"},[t._v("Margin Profit: "+t._s(t.profit))]):t._e(),t._v(" "),t._l(t.actionList,(function(e,n){return[r("div",{staticClass:"wrapper"},[r("validation-provider",{attrs:{rules:"required|positive"},scopedSlots:t._u([{key:"default",fn:function(n){var a=n.errors;return[r("div",{staticClass:"box"},[r("label",{attrs:{for:"quantity"}},[t._v("Quantity:")]),t._v(" "),r("input",{directives:[{name:"model",rawName:"v-model",value:e.quantity,expression:"action.quantity"}],attrs:{type:"number",disabled:1===e.status},domProps:{value:e.quantity},on:{input:function(r){r.target.composing||t.$set(e,"quantity",r.target.value)}}}),t._v(" "),r("div",[r("span",{staticClass:"error"},[t._v(t._s(a[0]))])])])]}}],null,!0)}),t._v(" "),r("validation-provider",{attrs:{rules:"required|positive"},scopedSlots:t._u([{key:"default",fn:function(a){var i=a.errors;return[r("div",{staticClass:"box"},[r("label",{attrs:{for:"price"}},[t._v("Price:")]),t._v(" "),r("input",{directives:[{name:"model",rawName:"v-model",value:e.price,expression:"action.price"}],attrs:{type:"number",disabled:1===e.status},domProps:{value:e.price},on:{input:function(r){r.target.composing||t.$set(e,"price",r.target.value)}}}),t._v(" "),r("div",[r("span",{staticClass:"error"},[t._v(t._s(i[0]))]),t._v(" "),t.customError&&n===t.actionList.length-1?r("span",{staticClass:"error"},[t._v(t._s(t.customError))]):t._e()])])]}}],null,!0)}),t._v(" "),e.status?[r("div",{staticClass:"box action-box"},[r("span",{staticClass:"action-text"},[t._v(t._s(1===e.type?"Purchased":"Sold"))])])]:[r("div",{staticClass:"box action-box"},[r("button",{staticClass:"submit-button",on:{click:function(e){return t.submitAction(n,1)}}},[t._v("Buy")]),t._v(" "),r("button",{staticClass:"submit-button",on:{click:function(e){return t.submitAction(n,2)}}},[t._v("Sell")])])]],2)]})),t._v(" "),r("div",{staticClass:"center"},[r("span",{staticClass:"error"},[t._v(t._s(t.responseError))])])],2)};a._withStripped=!0;r("pNMO"),r("TeQF"),r("QWBl"),r("HRxU"),r("eoL8"),r("5DmW"),r("27RR"),r("tkto"),r("07d7"),r("4l63"),r("5s+n"),r("FZtP"),r("ls82");var i=r("e7F3"),o=r("TJPC"),s=r("vDqi"),c=r.n(s);function u(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,n)}return r}function p(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?u(Object(r),!0).forEach((function(e){l(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):u(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}function l(t,e,r){return e in t?Object.defineProperty(t,e,{value:r,enumerable:!0,configurable:!0,writable:!0}):t[e]=r,t}function f(t,e,r,n,a,i,o){try{var s=t[i](o),c=s.value}catch(t){return void r(t)}s.done?e(c):Promise.resolve(c).then(n,a)}function v(t){return function(){var e=this,r=arguments;return new Promise((function(n,a){var i=t.apply(e,r);function o(t){f(i,n,a,o,s,"next",t)}function s(t){f(i,n,a,o,s,"throw",t)}o(void 0)}))}}function b(t){return d.apply(this,arguments)}function d(){return(d=v(regeneratorRuntime.mark((function t(e){return regeneratorRuntime.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.prev=0,t.next=3,c.a.get("".concat(e));case 3:return t.abrupt("return",t.sent);case 6:return t.prev=6,t.t0=t.catch(0),t.abrupt("return",t.t0.response);case 9:case"end":return t.stop()}}),t,null,[[0,6]])})))).apply(this,arguments)}function m(t,e){return g.apply(this,arguments)}function g(){return(g=v(regeneratorRuntime.mark((function t(e,r){return regeneratorRuntime.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.prev=0,t.next=3,c.a.post("".concat(e),p({},r));case 3:return t.abrupt("return",t.sent);case 6:return t.prev=6,t.t0=t.catch(0),t.abrupt("return",t.t0.response);case 9:case"end":return t.stop()}}),t,null,[[0,6]])})))).apply(this,arguments)}function y(t,e,r,n,a,i,o){try{var s=t[i](o),c=s.value}catch(t){return void r(t)}s.done?e(c):Promise.resolve(c).then(n,a)}function h(t){return function(){var e=this,r=arguments;return new Promise((function(n,a){var i=t.apply(e,r);function o(t){y(i,n,a,o,s,"next",t)}function s(t){y(i,n,a,o,s,"throw",t)}o(void 0)}))}}function O(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,n)}return r}function _(t,e,r){return e in t?Object.defineProperty(t,e,{value:r,enumerable:!0,configurable:!0,writable:!0}):t[e]=r,t}Object(i.b)("required",function(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?O(Object(r),!0).forEach((function(e){_(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):O(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}({},o.a,{message:"This field is required"})),Object(i.b)("positive",(function(t){return t>0||"This field must be a greater than 1"}));var w={data:function(){return{actionList:[],stock:0,profit:null,customError:null,buttonDisabled:!1,responseError:"",inputDisable:!0}},methods:{addAction:function(){this.actionList.push({quantity:1,price:1,status:0})},submitAction:function(t,e){var r=this;return h(regeneratorRuntime.mark((function a(){var i,o;return regeneratorRuntime.wrap((function(a){for(;;)switch(a.prev=a.next){case 0:if(r.errors&&console.log(r.errors),!(2===e&&r.actionList[t].quantity>r.stock)){a.next=5;break}n.a.set(r,"customError","Current available stock is ".concat(r.stock)),a.next=22;break;case 5:return n.a.set(r,"customError",null),"/api/transaction",i={quantity:parseInt(r.actionList[t].quantity),price:parseInt(r.actionList[t].price),type:e},a.next=10,m("/api/transaction",i);case 10:if(o=a.sent,console.log("action response",o),"error"!==o.data.status){a.next=16;break}n.a.set(r,"responseError",o.data.error.message),a.next=22;break;case 16:return a.next=18,n.a.set(r.actionList[t],"status",1);case 18:return a.next=20,n.a.set(r.actionList[t],"type",e);case 20:return a.next=22,r.getStock();case 22:case"end":return a.stop()}}),a)})))()},getTransactions:function(){var t=this;return h(regeneratorRuntime.mark((function e(){var r;return regeneratorRuntime.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return"/api/transaction",e.next=3,b("/api/transaction",{});case 3:r=e.sent,n.a.set(t,"actionList",r.data);case 5:case"end":return e.stop()}}),e)})))()},getMarginProfit:function(){var t=this;return h(regeneratorRuntime.mark((function e(){var r;return regeneratorRuntime.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return"/api/transaction/profit",e.next=3,b("/api/transaction/profit",{});case 3:r=e.sent,n.a.set(t,"profit",r.data.marginProfit);case 5:case"end":return e.stop()}}),e)})))()},getStock:function(){var t=this;return h(regeneratorRuntime.mark((function e(){var r;return regeneratorRuntime.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return"/api/transaction/stock",e.next=3,b("/api/transaction/stock",{});case 3:r=e.sent,n.a.set(t,"stock",r.data.stock);case 5:case"end":return e.stop()}}),e)})))()}},mounted:function(){this.getTransactions(),this.getStock()},components:{ValidationProvider:i.a}},P=(r("gYqe"),r("KHd+")),k=Object(P.a)(w,a,[],!1,null,null,null);k.options.__file="assets/js/components/App.vue";var x=k.exports;r("sZ/o");new n.a({el:"#app",render:function(t){return t(x)}})},"sZ/o":function(t,e,r){}},[["ng4s","runtime",0]]]);
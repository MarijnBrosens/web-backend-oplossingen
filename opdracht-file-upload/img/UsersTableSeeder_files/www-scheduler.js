(function(){var e=this;function f(a){a=a.split(".");for(var b=e,c;c=a.shift();)if(null!=b[c])b=b[c];else return null;return b}function g(a,b,c){return a.call.apply(a.bind,arguments)}function k(a,b,c){if(!a)throw Error();if(2<arguments.length){var d=Array.prototype.slice.call(arguments,2);return function(){var c=Array.prototype.slice.call(arguments);Array.prototype.unshift.apply(c,d);return a.apply(b,c)}}return function(){return a.apply(b,arguments)}}
function l(a,b,c){l=Function.prototype.bind&&-1!=Function.prototype.bind.toString().indexOf("native code")?g:k;return l.apply(null,arguments)}var m=Date.now||function(){return+new Date};function n(a,b){var c=a.split("."),d=e;c[0]in d||!d.execScript||d.execScript("var "+c[0]);for(var h;c.length&&(h=c.shift());)c.length||void 0===b?d[h]?d=d[h]:d=d[h]={}:d[h]=b}
Function.prototype.bind=Function.prototype.bind||function(a,b){if(1<arguments.length){var c=Array.prototype.slice.call(arguments,1);c.unshift(this,a);return l.apply(null,c)}return l(this,a)};function p(){this.t=this.t;this.A=this.A}p.prototype.t=!1;p.prototype.dispose=function(){this.t||(this.t=!0,this.D())};p.prototype.D=function(){if(this.A)for(;this.A.length;)this.A.shift()()};function t(){p.call(this);this.d=[];this.d[3]=[];this.d[2]=[];this.d[1]=[];this.d[0]=[];this.j={};this.o=t.d;this.F=this.v=0;this.C=this.B=!1;this.k=[];this.G=l(this.H,this)}(function(){var a=t;function b(){}b.prototype=p.prototype;a.I=p.prototype;a.prototype=new b;a.base=function(a,b,h){for(var q=Array(arguments.length-2),r=2;r<arguments.length;r++)q[r-2]=arguments[r];return p.prototype[b].apply(a,q)}})();t.o="hidden";t.k=1E3/60;t.j=3;t.d=t.k-t.j;
function u(a,b,c){++a.F;var d=a.F;a.j[d]=b;a.B?a.k.push({id:d,priority:c}):(a.d[c].push(d),a.C||a.start());return d}function v(a){a.k.length=0;for(var b=3;0<=b;b--)a.d[b].length=0;a.j={};a.stop()}function w(a){try{a()}catch(b){(a=f("yt.www.errors.log"))&&a(b)}}
t.prototype.H=function(){this.stop();this.B=!0;for(var a=m()+this.o,b=this.d[3];b.length;){var c=this.j[b.shift()];c&&w(c)}for(b=2;0<=b;b--){for(var c=a,d=this.d[b];d.length&&m()<c;){var h=d.shift(),q=this.j[h];delete this.j[h];q&&w(q)}if(!(m()<c))break}this.B=!1;b=0;for(c=this.k.length;b<c;b++)d=this.k[b],this.d[d.priority].push(d.id);this.o=t.d;(a<=m()||this.k.length)&&this.start();this.k.length=0};t.prototype.start=function(){this.C=!1;0==this.v&&(this.v=window.setTimeout(this.G,1))};
t.prototype.pause=function(){this.stop();this.C=!0};t.prototype.stop=function(){window.clearTimeout(this.v);this.v=0};t.prototype.D=function(){v(this);this.stop();t.I.D.call(this)};function x(){var a=f("yt.scheduler.instance.instance_");if(!a||a.t)a=new t,n("yt.scheduler.instance.instance_",a);return a}function y(){var a=f("yt.scheduler.instance.instance_");a&&(a&&"function"==typeof a.dispose&&a.dispose(),n("yt.scheduler.instance.instance_",null))}function z(){v(x())}var A=f("yt.scheduler.instance.timerIdMap_")||{};function B(a,b,c){if(0==c)return-u(x(),a,b);var d=window.setTimeout(function(){var c=u(x(),a,b);A[d]=c},c);return d}
function C(a){var b=x(),c=m();w(a);a=m()-c;b.o-=a}function D(a){var b=x();if(0>a)delete b.j[-a];else{var c=A[a];c?(delete b.j[c],delete A[a]):window.clearTimeout(a)}}function E(){x().start()}function F(){x().pause()};function G(){}G.getInstance=function(){return G.d?G.d:G.d=new G};G.prototype.addTask=function(a){return B(a,2,0)};G.prototype.cancelTask=function(a){D(a)};if(!f("yt.scheduler.initialized")){n("yt.scheduler.instance.dispose",y);n("yt.scheduler.instance.addJob",B);n("yt.scheduler.instance.addImmediateJob",C);n("yt.scheduler.instance.cancelJob",D);n("yt.scheduler.instance.cancelAllJobs",z);n("yt.scheduler.instance.start",E);n("yt.scheduler.instance.pause",F);n("yt.scheduler.SpfScheduler.instance",G.getInstance());var H=G.getInstance(),I=G.getInstance().addTask;H.addTask=I;var J=G.getInstance(),K=G.getInstance().cancelTask;J.cancelTask=K;n("yt.scheduler.initialized",
!0)};})();

!function(a){function e(n){if(r[n])return r[n].exports;var o=r[n]={i:n,l:!1,exports:{}};return a[n].call(o.exports,o,o.exports,e),o.l=!0,o.exports}var r={};e.m=a,e.c=r,e.d=function(a,r,n){e.o(a,r)||Object.defineProperty(a,r,{configurable:!1,enumerable:!0,get:n})},e.n=function(a){var r=a&&a.__esModule?function(){return a.default}:function(){return a};return e.d(r,"a",r),r},e.o=function(a,e){return Object.prototype.hasOwnProperty.call(a,e)},e.p="",e(e.s=0)}([function(a,e,r){r(1),r(2),r(3),r(4),r(5),r(6),r(7),r(8),r(9),r(10),r(11),r(12),r(13),r(14),a.exports=r(15)},function(a,e){!function(a){a("#stats").length&&new Morris.Bar({element:"stats",data:[{y:"2006",a:100},{y:"2007",a:75},{y:"2008",a:50},{y:"2009",a:75},{y:"2010",a:50},{y:"2011",a:75},{y:"2012",a:100},{y:"2013",a:200},{y:"2014",a:300},{y:"2015",a:260},{y:"2016",a:40}],xkey:"y",ykeys:["a"],labels:["Sales"],barColors:[colors["chart-primary"]],barShape:"soft",xLabelMargin:10,resize:!0}),a("#line1").length&&new Morris.Line({element:"line1",data:[{y:"2008",a:150,b:50},{y:"2009",a:75,b:90},{y:"2010",a:200,b:120},{y:"2011",a:75,b:340},{y:"2012",a:130,b:60}],xkey:"y",ykeys:["a","b"],labels:["New","Resolved"],lineColors:[colors["chart-primary"],colors["chart-secondary"]],resize:!0}),a("#bar2").length&&new Morris.Bar({element:"bar2",data:[{y:"2006",a:100},{y:"2007",a:75},{y:"2008",a:50},{y:"2009",a:75},{y:"2010",a:50},{y:"2011",a:75},{y:"2012",a:100},{y:"2013",a:200},{y:"2014",a:300},{y:"2015",a:260},{y:"2016",a:40}],xkey:"y",ykeys:["a"],labels:["Sales"],barColors:[colors["chart-primary"]],barShape:"soft",xLabelMargin:10,resize:!0}),a("#bar").length&&new Morris.Bar({element:"bar",data:[{y:"January",a:100},{y:"February",a:75},{y:"March",a:50},{y:"April",a:75},{y:"May",a:90},{y:"June",a:50},{y:"July",a:75},{y:"August",a:100},{y:"September",a:200},{y:"October",a:300},{y:"November",a:260},{y:"December",a:40}],xkey:"y",ykeys:["a"],labels:["Sales"],barColors:[colors["chart-primary"]],barShape:"soft",xLabelMargin:10,resize:!0}),a("#line").length&&new Morris.Line({element:"line",data:[{y:"2008",a:150,b:50},{y:"2009",a:75,b:90},{y:"2010",a:200,b:120},{y:"2011",a:75,b:340},{y:"2012",a:130,b:60},{y:"2013",a:75,b:340},{y:"2014",a:50,b:260},{y:"2015",a:130,b:160},{y:"2016",a:210,b:180}],xkey:"y",ykeys:["a","b"],labels:["New","Resolved"],lineColors:[colors["chart-primary"],colors["chart-secondary"]],resize:!0}),a("#area").length&&new Morris.Area({element:"area",data:[{y:"2006",a:340},{y:"2007",a:750},{y:"2008",a:652},{y:"2009",a:1231},{y:"2010",a:544},{y:"2011",a:753},{y:"2012",a:1533}],xkey:"y",ykeys:["a"],labels:["Series A"],lineColors:[colors["chart-primary"]],fillOpacity:.3,grid:.1,gridTextColor:"000",resize:!0}),a("#donut").length&&new Morris.Donut({element:"donut",data:[{label:"Download Sales",value:12},{label:"In-Store Sales",value:30},{label:"Mail-Order Sales",value:20}],colors:[colors["chart-primary"],colors["chart-secondary"],colors["chart-third"]],resize:!0}),a("#donut2").length&&new Morris.Donut({element:"donut2",data:[{label:"Red Team",value:54},{label:"Green Team",value:26},{label:"Blue Team",value:34},{label:"Orange Team",value:16}],colors:["#EF5350","#66BB6A","#03A9F4","#FFA726"],resize:!0})}(jQuery)},function(a,e){},function(a,e){},function(a,e){},function(a,e){},function(a,e){},function(a,e){},function(a,e){},function(a,e){},function(a,e){},function(a,e){},function(a,e){},function(a,e){},function(a,e){},function(a,e){}]);
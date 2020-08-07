//依赖2-require.js数据,修改名称后引出
// 两个src都要命名，否则报错
define('m1',['m2'],function(a){
    a.say();
    return "这也是requires1";
});



// //依赖2-require.js数据引出
// define(['./2-require.js'],function(a){
//     a.say();
//     return "这也是requires1";
// });


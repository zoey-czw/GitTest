// require.config 同时引入多组数据；--->src都要命名！！！
// define修改名称通过该方式引入！！！
require.config({
    baseUrl: '../js',
    paths: {
        'm1': '1-require',//固定名称，不允许修改
        'm2': '2-require',
    }
});

// require 引入 两个模块数据
require(['m1','m2'],function(a,b){
    console.log(a,b);//代表两个模块对象
});


// // require 引入 两个模块数据
// require(['../js/1-require.js','../js/2-require.js'],function(a,b){
//     console.log(a,b);//代表两个模块对象
// });


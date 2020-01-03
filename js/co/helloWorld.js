//require('./gen.js');

function co(gen) {
    var it = gen();
    //console.log(it.next());
    var ret = it.next();
    console.log(ret)
    ret.value.then(function(res) {
        console.log(it.next(res));
    });

    //付加此行会改变输出顺序，Promise会在主进程完成后执行所以会先输入world
    //console.log(it.next());
}
function sayhello() {
    return Promise.resolve('hello').then(function(hello) {
        console.log(hello);
    });
}

function sayhello1() {
    console.log('hello1');
}
co(function *helloworld() {
    //yield sayhello1();
    yield sayhello();
    console.log('world');
});

// console.log(sayhello());
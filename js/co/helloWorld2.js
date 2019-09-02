function sayHello() {
    return Promise.resolve('hello').then(function (data) {
        console.log(data);
    })
}

function sayWorld() {
    return Promise.resolve('world').then(function (data) {
        console.log(data);
    })
}

function sayBey() {
    return Promise.resolve('bey').then(function (data) {
        console.log(data);
    })
}

function co(gen) {
    var it = gen();
    console.log(it);
    // while (ret = it.next()){
    //     console.log(ret.value);
    //     ret.value.then(function (data) {
    //         it.next(ret);
    //     })
    // }

    var ret = it.next();
    ret.value.then(function (data) {
        ret = it.next(ret);
    })
    ret.value.then(function (data) {
        it.next(ret);
    })
}

co(function* () {
    yield sayHello();
    yield sayWorld();
    yield sayBey();
})
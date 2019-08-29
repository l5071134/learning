function sayhello() {
    return Promise.resolve('hello').then(function(hello) {
        console.log(hello);
    });
}
function helloworld() {
    sayhello();
    console.log('world');
}
helloworld();
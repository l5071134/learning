//function关键字后面有个*号，函数体内可以使用yield语句进行流程控制。
function* gen() {
    yield 'hello';
    yield 'world';
    return true;
}


var iter = gen();
console.log(typeof iter.next().value)
var a = iter.next();
console.log(a); // {value:'hello', done:false}
var b = iter.next();
console.log(b); // {value:'world', done:false}
var c = iter.next();
console.log(c); // {value:true, done:true}
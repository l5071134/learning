function add(a,b) {
    return a + b;
}

function sub(a,b) {
    return a - b;
}


console.log(add.call(null,1,3));


var array = [1, 2, 3];
var max = Math.max.apply(null, array);
console.log(max);//3



function test(a, b) {
    var slice = Array.prototype.slice;
    console.log(arguments);
    var args = slice.call(arguments,1);
    console.log(args);
}

test(2,3);
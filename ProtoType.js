const person = new Object({
    name: 'Max',
    age_: 26,
    greet: function (){
        console.log('Greet');
    }
})

Object.prototype.sayHello = function (){
    console.log('proto Hi');
}

person.sayHello();
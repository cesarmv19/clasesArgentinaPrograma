
let nombre = "María"
var inverso = [];
let elementos = ["Hola", 10, nombre, , "Messi", 34.5];
for (let i = elementos.length-1; i >= 0; i--) {

    inverso.unshift(elementos[i]);
}
console.log(elementos);

console.log(inverso);

// console.log(elementos[3]);
// console.log(elementos[elementos.length-1]);
// elementos.push(prompt("Ingrese un dato"));
// console.log(elementos);
// elementos.pop();
// console.log(elementos);


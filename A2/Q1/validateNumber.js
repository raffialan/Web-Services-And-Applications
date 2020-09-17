// ------------------------------------------------------------------------------
// Assignment 2
// Written by: (Raffi Alan Bezirjian) -> 123456
// For SOEN 287 Section A – Summer 2019
// -----------------------------------------------------------------------------

function validateNumber() {

    var number = document.getElementById("number").value;

    if (isNaN(number)) {
        alert("Please enter numeric value");
    }
    else {
        var result = isPrimeNumber(number);
        if (result) {
            reverseNumber(number);
        } else {
            alert("This is not a prime number");
        }
    }
}

function isPrimeNumber(number) {

    if (number <= 1)
        return false;
    if (number % 2 == 0 && number > 2) return false;
    let s = Math.sqrt(number);
    for (let i = 3; i <= s; i++) {
        if (number % i === 0) return false;
    }
    return true;

}

function reverseNumber(number) {

    var reverseArr = [];

    for (var i = 0; i < number.length; i++) {
        reverseArr[i] = number.charAt(i);
    }
    reverseArr.reverse();


    alert("This is a prime number and reverse is : " + reverseArr.join(""));

}
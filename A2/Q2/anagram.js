// ------------------------------------------------------------------------------
// Assignment 2
// Written by: (Raffi Alan Bezirjian) -> 123456
// For SOEN 287 Section A – Summer 2019
// -----------------------------------------------------------------------------

var entry;
var invalidCount = 0;
var info = [];

function checkAnagrams() {
  

    while (entry != -1) {
        if(invalidCount==5){
            document.getElementById("statsOut").innerHTML = "You have exceeded invalid entry limit.<br />";
            break;
        }

        entry = prompt("Please enter a valid string pairs value.\n\nWhen you are finished just enter -1.\n");

        if (/^[A-Za-z ]+$/.test(entry)) {

            if (isEmpty(entry)) {
                alert("Hey! your previous entry \"" + entry + "\" is not a valid string pairs and will be discarded");
                invalidCount++;
            } else {

                var stringArray = entry.trim().split(" ");

                if (stringArray.length == 2) {
                    invalidCount = 0;
                    var input1 = stringArray[0].toLowerCase().split("").sort().join("");
                    var input2 =  stringArray[1].toLowerCase().split("").sort().join("");

                    if(input1===input2){
                        info.push("Pairs "+stringArray[0]+" and "+stringArray[1]+" are anagrams.");
                    }else{
                        info.push("Pairs "+stringArray[0]+" and "+stringArray[1]+" are not anagrams.");
                    }

                } else {
                    alert("Hey! your previous entry \"" + entry + "\" is not a valid string pairs and will be discarded");
                    invalidCount++;
                }

            }


        }
        else if ((!/^[A-Za-z ]+$/.test(entry)) && (entry != -1)) {
            alert("Hey! your previous entry \"" + entry + "\" is not a valid string pairs and will be discarded");
            invalidCount++;
        }
        else {
            break;
        }
    }


    document.getElementById("statsOut").innerHTML += "You have entered below mentioned string pairs.<br />";
    for (count = 0; count < info.length; count++) {
        document.getElementById("statsOut").innerHTML += info[count] + "<br />";
    }

}


function isEmpty(str) {
    return (!str || /^\s*$/.test(str));

}
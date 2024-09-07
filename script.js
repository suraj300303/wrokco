function onlyLetter(evt){
    var ascii = (evt.which) ? evt.which : evkeyCode
    if ((ascii>=65 && ascii<=90) || (ascii>=97 && ascii<=122) || ascii==32)
        return true;
    return false;
}
function onlyNumber(evt){
    var ASCIICode = (evt.which) ? evt.which : evkeyCode
    if (ASCIICode > 31 && (ASCIICode < 48 |ASCIICode > 57))
        return false;
    return true;
}

// function updateDestination(selectedValue) {
//     const destinationSelect = document.getElementById("dest");
//     for (let option of destinationSelect.options) {
//         if (option.value === selectedValue) {
//             option.disabled = true;
//         } else {
//             option.disabled = false;
//         }
//     }
// }

// function updateSource(selectedValue) {
//     const sourceSelect = document.getElementById("source");
//     for (let option of sourceSelect.options) {
//         if (option.value === selectedValue) {
//             option.disabled = true;
//         } else {
//             option.disabled = false;
//         }
//     }
// }
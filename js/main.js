/*// Information to reach API
const url = 'https://api.datamuse.com/words';
const queryParams = '?sl=';

// Selects page elements
const inputField = document.querySelector('#input');
const submit = document.querySelector('#submit');
const responseField = document.querySelector('#responseField');

// AJAX function
const getSuggestions = () => {
  const wordQuery = inputField.value;
  const endpoint = `${url}${queryParams}${wordQuery}`;
  
  fetch(endpoint, {cache: 'no-cache'}).then(response => {
    if (response.ok) {
      return response.json();
    }
    throw new Error('Request failed!');
  }, networkError => {
    console.log(networkError.message)
  }).then(jsonResponse => {
    renderResponse(jsonResponse);
  })
}

// Clears previous results and display results to webpage
const displaySuggestions = (event) => {
  event.preventDefault();
  while(responseField.firstChild){
    responseField.removeChild(responseField.firstChild);
  }
  getSuggestions();
};

submit.addEventListener('click', displaySuggestions);

*/


const _ = {

  clamp(number, lowerBound, upperBound){
  /*
  if(number < lowerBound || number < upperBound) {
      return Math.max(number,lowerBound);
    } else (number > upperBound ) 
      return Math.min(number, upperBound)
    */
  let lowerClampedValue = Math.max(number, lowerBound);
  let clampedValue = Math.min(lowerClampedValue, upperBound);
  
  return clampedValue;
  },
  
  inRange(number, startVal, endVal){
  
      if(endVal === "null" || endVal === undefined){
        endVal = startVal;
        startVal = 0;
        
      } if (startVal > endVal){
        let temp = endVal;
        endVal = startVal;
        startVal = temp;
      } 
      var isInRange = startVal <= number && number < endVal;
  
    return isInRange;
    },
  
  words(string){
      var words = string.split(" ");
  
      return words;
    }, 
  
  pads(string, targetlength){
    if(targetlength.length > string.length){
       return string;
       }
  
       let stringLength = targetlength.length - string.length;
   
  
  
  }
  
  
  
  
  };
  
  
  // Do not write or modify code below this line.
  module.exports = _;
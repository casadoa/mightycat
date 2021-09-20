/* This is for clicking on the photo in the contact photo and it changing to Zara, Luna, Mimi, Bella, Elle*/


/*
function newStyle() {
  let newColor = '';
  let newFont = ''; 
  let x = Math.floor(Math.random()*4); 
  switch (x){
    case 0:
      //newColor = 'red';
      newpic = ;//put image url here??; 
      break;
    case 1: 
      newColor = 'blue';
      newFont = 'Florence, cursive'; 
      break;
    case 2:
      newColor = 'yellow';
      newFont = 'Verdana';
      break; 
    case 3:
      newColor= 'purple';
      newFont = 'Courier New';
      break
    case 4:
      newColor = 'cyan';
      newFont = 'Georgia'; 
      break;
    case 5:
        newColor = 'maroon';
        newFont = 'Palatino';
        break;
    case 6: 
        newColor = 'lime';
        newFont = 'Impact';
        break;
  }
  var elem = document.getElementById('logo');
  elem.style.color = newColor;
  elem.style.fontFamily = newFont; 
}


/************************************** */


/************************************* */
/* change fonts of safety data sheets to different font when clicked */
/*
let element = document.querySelector("article");

function changeFont (){
  element.style.fontFamily = 'Courier';
}

element.onclick = changeFont;
/* works but it changes all the fonts not the one specifically chosen yet */




/***************************************** */


let emp = document.getElementById('employee');
let k = document.getElementById('kitties');
let l = document.getElementById('employeeTitle');


// This function programs the "Reset" button to return the boxes to their default styles
let resetTwo = function() {
  emp.style.width = '';
  emp.style.height = '';
  emp.style.backgroundColor = '';
  l.style.height = '';
  k.style.visibility = '';
  emp.style.textDecoration = '';
};
resetButton.onclick = resetTwo;



function changeTwo() {
  emp.style.width = '80%';
  k.style.visibility = 'visible';
  l.style.height = '325px';
  emp.style.textDecoration = 'none';
  
}


let start = Date.now();

let timer = setInterval(function() {

  let timePassed = Date.now() - start;

  if(timePassed >= 3000){
    clearInterval(timer);
    return;
  }
  draw(timePassed);
}, 20);

function draw(timePassed){
  //l.style.height = timePassed / 10 + 'px';
}


//emp.addEventListener('mouseover', changeTwo);
l.onmouseover = changeTwo;
emp.onmouseout = resetTwo;
l.onmouseout = resetTwo;
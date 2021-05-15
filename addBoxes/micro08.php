<!doctype html>
<html>
  <head>
    <title>Micro 08</title>
    <style>
      .box {
        width: 25px;
        height: 25px;
        border: 1px solid black;
        float: left;
      }
      .yellow {
        background-color: yellow;
      }
      .green {
        background-color: green;
      }
      .blue {
        background-color: blue;
      }
      .orange {
        background-color: orange;
      }
      .red {
        background-color: red;
      }
      .pink {
        background-color: pink;
      }
    </style>

  </head>

  <body>
    <h1>Micro 08</h1>

    Pick a box color:
    <select id="colordropdown">
      <option value="yellow">Yellow</option>
      <option value="green">Green</option>
      <option value="blue">Blue</option>
      <option value="orange">Orange</option>
      <option value="red">Red</option>
      <option value="pink">Pink</option>
    </select>
    <button id="add">Add a new box</button>

    <div id="boxes"></div>

    <!-- bring in the jQuery library -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <!-- our custom code -->
    <script>

      // DOM references to our HTML elements
      let btn = document.getElementById('add');
      let boxes = document.getElementById('boxes')
      let color = document.getElementById('colordropdown')
      
 

      // jQuery document ready handler
      // (all code should go inside of this function)
      $(document).ready(function() {

        $.ajax({

          type: "GET",
          url: "data/boxes.txt",
          data:{

          },
          success: function(data, status){
              
              let index;

              let arr = data.split('\n');
              console.log(arr);

              for (let i = 0; i < arr.length-1; i++){
                console.log(i);
                let currentdiv = document.createElement('div');
                boxes.appendChild(currentdiv);
                currentdiv.classList.add('box');
                currentdiv.classList.add(arr[i]);
              }
          },
          error: function(request, data, status){
            console.log("ERROR");

          }
        })


        btn.onclick = function(event){
          let colorvalue = color.value;
  
          $.ajax({

            type: 'GET',
            url: 'savebox.php',
            data: {

              'color' : colorvalue 

            },
            success: function(data, status){
              console.log(data);
              let currentdiv = document.createElement('div');
              boxes.appendChild(currentdiv);
              currentdiv.classList.add('box');
              currentdiv.classList.add(colorvalue);
              
            },
            error: function(request, data, status){
              boxes.innerHTML += "Error!";
            }

          })

        }

        // Task #1 -  when the page loads you should initiate
        // an AJAX request to load the contents of the 'boxes.txt'
        // file directly and obtain the previously added colors.
        // Once this information has been loaded you should create
        // divs for each one of these boxes and add them to the page.
        // This will have the effect of making the page "sticky" and
        // all boxes will exist forever, as long as they are represented
        // in the 'boxes.txt' file
        //
        // Hint: when you bring in the data from this file it will be
        // one giant string. You will need to parse this string.
        //
        // Hint 2: when accessing a data file directly using AJAX the
        // browser may decide that you've accessed it fairly recently
        // and it will pull the data from its cache rather than go back
        // out to the server.  You can get around this by adjusting the
        // URL to look different by forcing a 'GET' variable into the
        // link - for example, 'boxes.txt?nocache=12345' will be seen
        // as a different link than 'boxes.txt?nocache=67890'
        // -- use a random number and append this to the end of the
        // URL to implement this kind of 'cache-prevention' system







        // Task #2 - when the button is pressed initiate
        // an AJAX request to 'savebox.php' - send it
        // the current value of the drop down list and it
        // will save that file for you in the 'data' folder
        // of the project (on the server).  Ensure that you've set up the
        // file path in 'config.php' to make this work.
        //
        // If the server returns a successful message then
        // you should create a new div on the page with the
        // class of 'box' and another class of whatever color
        // the user selected and add it to the 'boxes' div.






      })


    </script>

  </body>

</html>
